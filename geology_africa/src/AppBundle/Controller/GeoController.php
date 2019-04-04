<?php

// src/AppBundle/Controller/GeoController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Dsample;
use AppBundle\Entity\Dsamminerals;
use AppBundle\Entity\Dsammagsusc;
use AppBundle\Entity\Dsamgranulo;
use AppBundle\Entity\Lminerals;
use AppBundle\Entity\Dsamheavymin;
use AppBundle\Entity\Dsamheavymin2;
use AppBundle\Entity\Dcontribution;
use AppBundle\Entity\Dcontributor;
use AppBundle\Entity\Dlinkcontribute;
use AppBundle\Form\DsampleType;
use AppBundle\Form\DsampleEditType;
use AppBundle\Form\LmineralsType;
use AppBundle\Form\LmineralsEditType;
use AppBundle\Form\DcontributionType;
use AppBundle\Form\DcontributionEditType;

use AppBundle\Form\EntityManager;

//debug 
use Symfony\Component\HttpFoundation\Response;

class GeoController extends Controller
{
    public function indexAction(Request $request){
		return $this->render('@App/home.html.twig');
    }
	
	public function addsampleAction(Request $request){
		$dsample = new Dsample();
		$dcontribution = new Dcontribution();
		
		//$dsample->setIdsample(1000);
		$em = $this->getDoctrine()->getManager();

		/*$sammineral1 = new Dsamminerals();
        $sammineral1->setGrade(1);
        $dsample->getSamminerals()->add($sammineral1);*/
		
		$form = $this->createForm(DsampleType::class, $dsample, array('entity_manager' => $em,));
		$form2 = $this->createForm(DcontributionType::class, $dcontribution, array('entity_manager' => $em,));
		
		if ($request->isMethod('POST')) {
			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				try {
					$em->persist($dsample);
					$em->flush();
					return $this->redirectToRoute('app_edit_sample', array('pk' => $dsample->getPk()));
				} catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
					echo "<script type='text/javascript'>alert('Record already exists with these values of collection and ID !');</script>";
					//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction already exist" );
				} catch(\Doctrine\DBAL\Exception\ConstraintViolationException $e ) {
					echo "<script type='text/javascript'>alert('There is a constraint violation with that transaction !');</script>";
					//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Bad request on Transaction" );
				} catch(\Doctrine\DBAL\Exception\TableNotFoundException $e ) {
					echo "<script type='text/javascript'>alert('Table not found !');</script>";
					//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
				} catch(\Doctrine\DBAL\Exception\ConnectionException $e ) {
					echo "<script type='text/javascript'>alert('Problem of connection with database !');</script>";
					//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
				} catch(\Doctrine\DBAL\Exception\DriverException $e ) {
					echo "<script type='text/javascript'>alert('There is a syntax error with one field !');</script>";
					//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
				}
			}elseif ($form->isSubmitted() && !$form->isValid() ){
				echo "<script type='text/javascript'>alert('error in form');</script>";
			}
		}
		
        return $this->render('@App/addsample.html.twig', array(
            'form' => $form->createView(),
			'form2' => $form2->createView(),
		//	'Mineral_form' => $form2->createView(),
			'originaction'=>'add_beforecommit'
        ));
    }
	
	public function savecontributors($idcontrib,$actionscontribstr,$request){
		//return new Response('<html><body>'.print_r($actionscontribstr).print_r($actionscontribstr).'</body></html>' );
		$actionscontrib[] = null;
		$idcontribs[] = null;
		$idcontributors[]= null;
		$origin_error = "In contributors, ";
		$em = $this->getDoctrine()->getManager();				
						
		if ($actionscontribstr != ""){
			
			$arrayid_contrids =  explode(",", $actionscontribstr); 
			$elem =array();
			$i=0;
			foreach($arrayid_contrids as $e) {
				if ($e != ""){
					$elem = explode("-", $e);
					$idline[$i] = $elem[0];
					$idcontribs[$i] = $elem[1];
					$actionscontrib[$i] = $elem[2];
					$i++;
				}
			} 
		}
		
		$RAW_QUERYcontributors = "SELECT * FROM dlinkcontribute where idcontribution = '".$idcontrib."';";
		$statement = $em->getConnection()->prepare($RAW_QUERYcontributors);
		$statement->execute();
		$linkcontribs = $statement->fetchAll();
		foreach($linkcontribs as $linkcontrib_obj){
			$idcontributors[]=$linkcontrib_obj['idcontributor'];
		}
		
		$RAW_QUERYcontributors = "SELECT idcontributor FROM dcontributor;";
		$statement = $em->getConnection()->prepare($RAW_QUERYcontributors);
		$statement->execute();
		$contributors = $statement->fetchAll();
		foreach($contributors as $contributors_obj){
			$idallcontributors[]=$contributors_obj['idcontributor'];
		}
		
		for ($y = 0; $y < sizeof($actionscontrib); $y++) {
			if ($idcontribs[$y]!= ""){
				if ($actionscontrib[$y] != "D"){
					$actionscontrib[$y] = "I";
					$role = $request->get('inp_addnewcontributorRole'.$idline[$y]);
					$order = $request->get('inp_addnewcontributorOrder'.$idline[$y]);
					if ($order == ""){
						$order = "0";
					}
					$people = $request->get('inp_addnewcontributorName'.$idline[$y]);
					$function = $request->get('inp_addnewcontributorFunction'.$idline[$y]);
					$title = $request->get('inp_addnewcontributorTitle'.$idline[$y]);
					$statut = $request->get('inp_addnewcontributorStatus'.$idline[$y]);
					$institut = $request->get('inp_addnewcontributorInstitut'.$idline[$y]);
					for ($z = 0; $z < count($idcontributors); $z++) {
						if($idcontributors[$z] == $idcontribs[$y]){
								$actionscontrib[$y] = "U";
								break;
						}
					}
					
					$actionscontributor[$y] = "I";
					for ($z = 0; $z < count($idallcontributors); $z++) {
						if($idallcontributors[$z] == $idcontribs[$y]){
								$actionscontributor[$y] = "U";
								break;
						}
					}
				}
				
				if ($actionscontributor[$y] == "U"){
					$RAW_QUERYdcontributor = "UPDATE dcontributor SET people = '".$people."',peoplefonction = '".$function."',peopletitre = '".$title."',peoplestatut = '".$statut."',institut = '".$institut."' WHERE idcontributor = ".$idcontribs[$y].";";
					
				}   
				if ($actionscontributor[$y] == "I"){
					$RAW_QUERYdcontributor = "INSERT INTO dcontributor (idcontributor, people, peoplefonction, peopletitre, peoplestatut, institut) VALUES (".$idcontribs[$y].",'".$people."','".$function."','".$title."','".$statut."','".$institut."');";
				}

				if ($actionscontributor[$y] == "I" | $actionscontributor[$y] == "U"){
					//echo "<script type='text/javascript'>alert('RAW_QUERYdcontributor= $RAW_QUERYdcontributor');</script>";
					$statement = $em->getConnection()->prepare($RAW_QUERYdcontributor);
					$statement->execute();
				}
//return new Response('<html><body>'.print_r($RAW_QUERYdcontributor).'</body></html>' );
				
				if ($actionscontrib[$y] == "U"){
					$RAW_QUERY = "UPDATE dlinkcontribute SET contributorrole = '".$role."',contributororder = ".$order." WHERE idcontribution = ".$idcontrib." AND idcontributor = ".$idcontribs[$y].";";
				}
				if ($actionscontrib[$y] == "I"){
					$RAW_QUERY = "INSERT INTO dlinkcontribute (idcontribution, idcontributor, contributorrole, contributororder) VALUES (".$idcontrib.",".$idcontribs[$y].",'".$role."',".$order.");";
				}
				if ($actionscontrib[$y] == "D"){
					$RAW_QUERY = "DELETE FROM dlinkcontribute WHERE idcontribution = '".$idcontrib."' and idcontributor = ".$idcontribs[$y]." ;";
				}
				if ($actionscontrib[$y] == "I" | $actionscontrib[$y] == "U" | $actionscontrib[$y] == "D"){
					//echo "<script type='text/javascript'>alert('RAW_QUERY= $RAW_QUERY');</script>";
					$statement = $em->getConnection()->prepare($RAW_QUERY);
					$statement->execute();
				}
			}
		}
	}
	
	public function addcontributionAction(Request $request){
		$dcontribution = new Dcontribution();
			
		$em = $this->getDoctrine()->getManager();
		$form = $this->createForm(DcontributionType::class, $dcontribution, array('entity_manager' => $em,));
		
		if ($request->isMethod('POST')) {
			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				try {
					$em->persist($dcontribution);
					$em->flush();

					$m=0;
					$idcontrib = $dcontribution->getIdcontribution();
				
					if ($idcontrib != ""){	
						$actionscontribstr = $request->get('newcontributors');
						//return new Response('<html><body>'.print_r($actionscontribstr).'</body></html>' );
						$this->savecontributors($idcontrib,$actionscontribstr,$request);
					}  
					
					$this->addFlash('success', 'DATA RECORDED IN DATABASE!');
				
					return $this->redirectToRoute('app_edit_contribution', array('pk' => $dcontribution->getPk()));
				} catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
					echo "<script type='text/javascript'>alert('Record already exists with these values !');</script>";
				} catch(\Doctrine\DBAL\Exception\ConstraintViolationException $e ) {
					echo "<script type='text/javascript'>alert('There is a constraint violation with that transaction !');</script>";
				} catch(\Doctrine\DBAL\Exception\TableNotFoundException $e ) {
					echo "<script type='text/javascript'>alert('Table not found !');</script>";
				} catch(\Doctrine\DBAL\Exception\ConnectionException $e ) {
					echo "<script type='text/javascript'>alert('Problem of connection with database !');</script>";
				} catch(\Doctrine\DBAL\Exception\DriverException $e ) {
					echo "<script type='text/javascript'>alert('There is a syntax error with one field !');</script>";
				}
			}elseif ($form->isSubmitted() && !$form->isValid() ){
				echo "<script type='text/javascript'>alert('error in form');</script>";
			}
		}
		
        return $this->render('@App/addcontribution.html.twig', array(
            'form2' => $form->createView(),
			'originaction'=>'add_beforecommit'
        ));
    }
	
	public function addmineralAction(Request $request){
		$lminerals = new Lminerals();

		$em = $this->getDoctrine()->getManager();

		$form = $this->createForm(LmineralsType::class, $lminerals, array('entity_manager' => $em,));
		
		if ($request->isMethod('POST')) {
			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				try {
					$em->persist($lminerals);
					$em->flush();
					return $this->redirectToRoute('app_edit_mineral', array('pk' => $lminerals->getPk()));
				} catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
					$lminerals->setPk(0);
					echo "<script type='text/javascript'>alert('Record already exists with these values !');</script>";
					//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction already exist" );
				} catch(\Doctrine\DBAL\Exception\ConstraintViolationException $e ) {
					$lminerals->setPk(0);
					echo "<script type='text/javascript'>alert('There is a constraint violation with that transaction !');</script>";
					//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Bad request on Transaction" );
				} catch(\Doctrine\DBAL\Exception\TableNotFoundException $e ) {
					$lminerals->setPk(0);
					echo "<script type='text/javascript'>alert('Table not found !');</script>";
					//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
				} catch(\Doctrine\DBAL\Exception\ConnectionException $e ) {
					$lminerals->setPk(0);
					echo "<script type='text/javascript'>alert('Problem of connection with database !');</script>";
					//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
				}
			}elseif ($form->isSubmitted() && !$form->isValid() ){
				$lminerals->setPk(0);
				echo "<script type='text/javascript'>alert('error in form');</script>";
			}
		}

        return $this->render('@App/addmineral.html.twig', array(
			'lminerals' => $lminerals,
            'Mineral_form' => $form->createView(),
        ));
    }
	
	public function editsampleAction(Dsample $dsample, Request $request){				
		if (!$dsample) {
			throw $this->createNotFoundException('No sample found' );
		}else{
			$RAW_QUERY = "";
			$grades[]=null;
			$ids[]=null;
			$idsHM[]=null;
			$mins[]=null;
			$HMnames[]=null;
			$actions[] = null;
			$actionsHM[] = null;
			$actionheavymin = "";
			$grades_originals[]=null;
			$ids_originals[]=null;
			$newgrades = "";
			$arraylminerals[]=null;
			$heavymin[]=null;
			$samheavymin2 =null;
			$origin_error = "";
			$em = $this->getDoctrine()->getManager();
			
			$idcol = $dsample->getIdcollection();
			$idsamp = $dsample->getIdsample();
							
			//Minerals
			$sammineral = $this->getDoctrine()
			->getRepository(Dsamminerals::class)
			 ->findBy(array('idcollection' => $idcol, 
							'idsample' => $idsamp
						   ));
			
			foreach($sammineral as $dsammineral_obj){
				$grades_originals[]=$dsammineral_obj->getGrade();
				$ids_originals[]=$dsammineral_obj->getIdMineral()->getIdMineral();
				$lminerals = $this->getDoctrine()
				->getRepository(Lminerals::class)
				->findBy(array(	'idmineral' => $dsammineral_obj->getIdMineral()	));
				$arraylminerals[]=$lminerals;
			}
			
			//Suscept. magnet.
			$sammagsusc = $this->getDoctrine()
			->getRepository(Dsammagsusc::class)
			 ->findBy(array('idcollection' => $idcol, 
							'idsample' => $idsamp
						   ));
			if ($sammagsusc != null){
				$actionmagsusc = "U";
			}else{
				$actionmagsusc = "I";
			}
			
			//granulo
			$samgranulo = $this->getDoctrine()
			->getRepository(Dsamgranulo::class)
			 ->findBy(array('idcollection' => $idcol, 
							'idsample' => $idsamp
						   ));
			if ($samgranulo != null){
				$actiongranulo = "U";
			}else{
				$actiongranulo = "I";
			}

			//HeavyMinerals
			//$weight_exist = true;
			$samheavymin = $this->getDoctrine()
			->getRepository(Dsamheavymin::class)
			 ->findBy(array('idcollection' => $idcol, 
							'idsample' => $idsamp
						   ));
						   
			if (count($samheavymin) > 0 ){
				foreach($samheavymin as $samheavymin_obj){
					if ($samheavymin_obj->getWeighthm() == null){
						$actionheavymin = "I";
						//$weight_exist = false;
					}else{
						$actionheavymin = "U";

						$RAW_QUERY = "SELECT * FROM dsamheavymin2 where idcollection = '".$idcol."' AND idsample = ".$idsamp.";";
						$statement = $em->getConnection()->prepare($RAW_QUERY);
						$statement->execute();
						$samheavymin2 = $statement->fetchAll();
						
						foreach($samheavymin2 as $samheavymin2_obj){
							$HMnames[]=$samheavymin2_obj['mineral'];
						}
					}
				}
			}else{
				$actionheavymin = "I";
			}
			
			$dcontribution = new Dcontribution();
			$form = $this->createForm(DsampleEditType::class, $dsample, array('entity_manager' => $em,));
			$form2 = $this->createForm(DcontributionType::class, $dcontribution, array('entity_manager' => $em,));
			
			if ($request->isMethod('POST')) {
				$form->handleRequest($request);
				//return new Response('<html><body>'.print_r($request->request->keys()).' '.$request->get('newgrades').'</body></html>' );
				if ($form->isSubmitted() && $form->isValid()) {
					//return new Response('<html><body>'.print_r ("poids=".$request->get('inp_mmagsuscWeight')).'</body></html>' );

					try {
						
						$em->flush();
						
						$id_grades = $request->get('newgrades');
						$arrayid_grades =  explode(",", $id_grades); 
						$elem =array();
						$i=0;
						foreach($arrayid_grades as $e) {
							if ($e != ""){
								$elem = explode("-", $e);
								$ids[$i] = $elem[0];
								$grades[$i] = $elem[1];
								$actions[$i] = $elem[2];
								$i++;
							}
						} 
						$m=0;
						$n=0;

						for ($y = 0; $y < sizeof($ids); $y++) {
							if ($actions[$y] == "U"){
								$RAW_QUERY = "UPDATE dsamminerals SET grade = ".$grades[$y]." WHERE idmineral = ".$ids[$y]." AND idcollection = '".$idcol."' AND idsample = ".idsamp.';';
							}
							if ($actions[$y] == "I"){
								$RAW_QUERY = "INSERT INTO dsamminerals (idcollection,idsample,idmineral,grade) VALUES ('".$idcol."',".$idsamp.",".$ids[$y].",".$grades[$y].');';
							}
							if ($actions[$y] == "D"){
								$RAW_QUERY = "DELETE FROM dsamminerals WHERE idcollection = '".$idcol."' and idsample = ".$idsamp." and idmineral = ".$ids[$y]." ;";
							}
							if ($actions[$y] == "I" | $actions[$y] == "U" | $actions[$y] == "D"){
								$statement = $em->getConnection()->prepare($RAW_QUERY);
								$statement->execute();
								
							}
						}
						
						if ($request->get('inp_granuloWeightTot') > 0){	
							$origin_error = "In granulometry, ";						
							$weightTot = $request->get('inp_granuloWeightTot');
							$weightsand = $request->get('inp_granuloWeightSand');
							$wAbove2000 = $request->get('inp_granulop2000');
							$w2000 = $request->get('inp_granulo-2000');
							$w1400 = $request->get('inp_granulo-1400');
							$w1000 = $request->get('inp_granulo-1000');
							$w710 = $request->get('inp_granulo-710');
							$w500 = $request->get('inp_granulo-500');
							$w355 = $request->get('inp_granulo-355');
							$w250 = $request->get('inp_granulo-250');
							$w180 = $request->get('inp_granulo-180');
							$w125 = $request->get('inp_granulo-125');
							$w90 = $request->get('inp_granulo-90');
							$w63 = $request->get('inp_granulo-63');
							$description = $request->get('inp_granuloDescr');
							$date = $request->get('inp_granuloDate');
							
							if ($actiongranulo == "U"){
								$RAW_QUERY = "UPDATE dsamgranulo SET weighttot = ".$weightTot.",weightsand = ".$weightsand.",w_above_2000 = ".$wAbove2000.",w_2000 = ".$w2000.",w_1400 = ".$w1400.",w_1000 = ".$w1000.",w_710 = ".$w710.",w_500 = ".$w500.",w_355 = ".$w355.",w_250 = ".$w250.",w_180 = ".$w180.",w_125 = ".$w125.",w_90 = ".$w90.",w_63 = ".$w63.",description = '".$description."', date = '".$date." 00:00:00' WHERE idcollection = '".$idcol."' AND idsample = ".$idsamp.';';
							}
							if ($actiongranulo == "I"){
								$RAW_QUERY = "INSERT INTO dsamgranulo (idcollection,idsample,weighttot,weightsand,w_above_2000,w_2000,w_1400,w_1000,w_710,w_500,w_355,w_250,w_180,w_125,w_90,w_63,description,date) VALUES ('".$idcol."',".$idsamp.",".$weightTot.",".$weightsand.",".$wAbove2000.",".$w2000.",".$w1400.",".$w1000.",".$w710.",".$w500.",".$w355.",".$w250.",".$w180.",".$w125.",".$w90.",".$w63.",'".$description."','".$date."');";
							}
							if ($actiongranulo == "I" | $actiongranulo == "U" ){ 
								//return new Response('<html><body>'.print_r($RAW_QUERY).'</body></html>' );
								$statement = $em->getConnection()->prepare($RAW_QUERY);
								$statement->execute();
							}
						}
						
						if ($request->get('inp_mmagsuscWeight') > 0){			
							$origin_error = "In magnetic susceptibility, ";
							$weight = $request->get('inp_mmagsuscWeight');
							$Mesure1 = $request->get('inp_mmagsuscMesure1');
							$Mesure2 = $request->get('inp_mmagsuscMesure2');
							$Mesure3 = $request->get('inp_mmagsuscMesure3');
							$Mesure4 = $request->get('inp_mmagsuscMesure4');
							$Mesure5 = $request->get('inp_mmagsuscMesure5');
							$Mesure6 = $request->get('inp_mmagsuscMesure6');
							$exp = $request->get('inp_mmagsuscExp');
							
							if ($actionmagsusc == "U"){
								$RAW_QUERY = "UPDATE dsammagsusc SET weight = ".$weight.",mesure1 = ".$Mesure1.",mesure2 = ".$Mesure2.",mesure3 = ".$Mesure3.",mesure4 = ".$Mesure4.",mesure5 = ".$Mesure5.",mesure6 = ".$Mesure6.",exponent = ".$exp." WHERE idcollection = '".$idcol."' AND idsample = ".$idsamp.';';
							}
							if ($actionmagsusc == "I"){
								$RAW_QUERY = "INSERT INTO dsammagsusc (idcollection,idsample,weight,mesure1,mesure2,mesure3,mesure4,mesure5,mesure6,exponent) VALUES ('".$idcol."',".$idsamp.",".$weight.",".$Mesure1.",".$Mesure2.",".$Mesure3.",".$Mesure4.",".$Mesure5.",".$Mesure6.",".$exp.");";
							}
							if ($actionmagsusc == "I" | $actionmagsusc == "U" ){ 
								$statement = $em->getConnection()->prepare($RAW_QUERY);
								$statement->execute();
							}
						}
			
						if ($request->get('inp_HMWeightSample') > 0){
							$origin_error = "In heavy minerals(weights), ";
							$WeightSample = $request->get('inp_HMWeightSample');
							$WeightHM = $request->get('inp_HMWeightHM');
							$HMDescript = $request->get('inp_HMDescript');
							
							if ($actionheavymin == "U"){
								$RAW_QUERY = "UPDATE dsamheavymin SET weightsample = ".$WeightSample.",weighthm = ".$WeightHM.",observationhm = '".$HMDescript."' WHERE idcollection = '".$idcol."' AND idsample = ".$idsamp.';';
							}
							if ($actionheavymin == "I"){
								$RAW_QUERY = "INSERT INTO dsamheavymin (idcollection,idsample,weightsample,weighthm,observationhm) VALUES ('".$idcol."',".$idsamp.",".$WeightSample.",".$WeightHM.",'".$HMDescript."');";
							}
							if ($actionheavymin == "I" | $actionheavymin == "U" ){ 
								//return new Response('<html><body>'.print_r($RAW_QUERY).'</body></html>' );
								$statement = $em->getConnection()->prepare($RAW_QUERY);
								$statement->execute();
							}
						}
						
						//	return new Response('<html><body>'.print_r($request->get('inp_HMname0')).'</body></html>' );
						
						if ($request->get('inp_HMname0') != ""){	
							$origin_error = "In heavy minerals, ";
							$actionshmstr = $request->get('newhminerals');
							
							if ($actionshmstr != ""){
								$arrayid_mins =  explode(",", $actionshmstr); 
								$elem =array();
								$i=0;
								foreach($arrayid_mins as $e) {
									if ($e != ""){
										$elem = explode("-", $e);
										$idsHM[$i] = $elem[0];
										$mins[$i] = $elem[1];
										$actionsHM[$i] = $elem[2];
										$i++;
									}
								} 
								//$actionheavymin2 = "D";
							}
							//return new Response('<html><body>'.$actionshmstr.'</body></html>' );
							for ($y = 0; $y < sizeof($actionsHM); $y++) {
								//if ($request->get('inp_HMname'.$ids[$y]) != ""){
								if ($mins[$y]!= ""){
									/*$actionsHM[$y] = "I";
									$mineral = $mins[$y];
									$grains = $request->get('inp_HMgrains'.$ids[$y]);
									$observ = $request->get('inp_HMobs'.$ids[$y]);
									
									for ($z = 0; $z < count($HMnames); $z++) {
										if($HMnames[$z] == $mineral){
											if ($actionsHM[$y] != "D"){
												$actionsHM[$y] = "U";
												break;
											}
										}
									}*/
									
									if ($actionsHM[$y] != "D"){
										$actionsHM[$y] = "I";
										$grains = $request->get('inp_HMgrains'.$idsHM[$y]);
										$observ = $request->get('inp_HMobs'.$idsHM[$y]);
										for ($z = 0; $z < count($HMnames); $z++) {
											if($HMnames[$z] == $mins[$y]){
													$actionsHM[$y] = "U";
													break;
											}
										}
									}
									
									if ($actionsHM[$y] == "U"){
										$RAW_QUERY = "UPDATE dsamheavymin2 SET minnum = ".$grains.",observationhm = '".$observ."' WHERE idcollection = '".$idcol."' AND idsample = ".$idsamp." AND mineral = '".$mins[$y]."';";
									}
									if ($actionsHM[$y] == "I"){
										$RAW_QUERY = "INSERT INTO dsamheavymin2 (idcollection, idsample, mineral, minnum, observationhm) VALUES ('".$idcol."',".$idsamp.",'".$mins[$y]."',".$grains.",'".$observ."');";
									}
									if ($actionsHM[$y] == "D"){
										$RAW_QUERY = "DELETE FROM dsamheavymin2 WHERE idcollection = '".$idcol."' and idsample = ".$idsamp." and mineral = '".$mins[$y]."' ;";
									}
									if ($actionsHM[$y] == "I" | $actionsHM[$y] == "U" | $actionsHM[$y] == "D"){
									//	print_r($RAW_QUERY);
									//	return new Response('<html><body>'.print_r($RAW_QUERY).'</body></html>' );
										$statement = $em->getConnection()->prepare($RAW_QUERY);
										$statement->execute();
									}
								}
							}
						}  
						
						//return new Response('<html><body>'.print_r($RAW_QUERY).'</body></html>' );
						$this->addFlash('success', 'DATA RECORDED IN DATABASE!');
						return $this->redirectToRoute('app_edit_sample', array('pk' => $dsample->getPk()));
					} catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
						$message = $origin_error."record already exists with these values of collection and ID !";
						echo "<script type='text/javascript'>alert('$message');</script>";
						//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction already exist" );
					} catch(\Doctrine\DBAL\Exception\ConstraintViolationException $e ) {
						$message = $origin_error."there is a constraint violation with that transaction !";
						echo "<script type='text/javascript'>alert('$message');</script>";
						//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Bad request on Transaction" );
					} catch(\Doctrine\DBAL\Exception\TableNotFoundException $e ) {
						$message = $origin_error."table not found !";
						echo "<script type='text/javascript'>alert('$message');</script>";
						//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
					} catch(\Doctrine\DBAL\Exception\ConnectionException $e ) {
						echo "<script type='text/javascript'>alert('Problem of connection with database !');</script>";
						//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
					}
				}elseif ($form->isSubmitted() && !$form->isValid() ){
					echo "<script type='text/javascript'>alert('error in form');</script>";
				}
			}

			if ($grades_originals != null){
				return $this->render('@App/editsample.html.twig', array(
					'dsample' => $dsample,
					'form' => $form->createView(),
					'form2' => $form2->createView(),
					'grades' => $grades_originals,
					'arraylminerals' => $arraylminerals,
					'sammagsusc' => $sammagsusc,
					'samgranulo' => $samgranulo,
					'samheavymin' => $samheavymin,
					'samheavymin2' => $samheavymin2,
					'originaction'=>'edit'
				));
			}else{
				return $this->render('@App/editsample.html.twig', array(
					'dsample' => $dsample,
					'form' => $form->createView(),
					'form2' => $form2->createView(),
					'arraylminerals' => $arraylminerals,
					'sammagsusc' => $sammagsusc,
					'samgranulo' => $samgranulo,
					'samheavymin' => $samheavymin,
					'samheavymin2' => $samheavymin2,
					'originaction'=>'edit'
				));
			}
		}
    }
	
	public function editcontributionAction(Dcontribution $dcontribution, Request $request){				
		if (!$dcontribution) {
			throw $this->createNotFoundException('No contribution found' );
		}else{
			$RAW_QUERY = "";
			$linkcontribute[]=null;
			$arraycontributors[] =null;
			
			$em = $this->getDoctrine()->getManager();
			$form = $this->createForm(DcontributionEditType::class, $dcontribution, array('entity_manager' => $em,));
			
			$idcontrib = $dcontribution->getIdcontribution();
			$RAW_QUERYcontributors = "SELECT * FROM dlinkcontribute where idcontribution = '".$idcontrib."';";
			$statement = $em->getConnection()->prepare($RAW_QUERYcontributors);
			$statement->execute();
			$arraylinkcontribs = $statement->fetchAll();
			
			if (count($arraylinkcontribs) > 0 ){
				
				foreach($arraylinkcontribs as $arraylinkcontribs_obj){
					$Idcontributor = $arraylinkcontribs_obj["idcontributor"];
					
					if ($Idcontributor == null){
						$actionlinkcontrib = "I";
					}else{
						$actionlinkcontrib = "U";

						
					}
				}
				$RAW_QUERYIdcontrib = "SELECT * FROM dcontributor c left join dlinkcontribute l on l.idcontributor = c.idcontributor where l.idcontribution = '".$idcontrib."';";
						
			//	"SELECT * FROM dcontributor where idcontributor = ".$Idcontributor.";";
				$statement = $em->getConnection()->prepare($RAW_QUERYIdcontrib);
				$statement->execute();
				$arraycontributors = $statement->fetchAll();
				//return new Response('<html><body>'.print_r($arraycontributors).'</body></html>' );
				foreach($arraycontributors as $arraycontributors_obj){
					$idcontributors[]=$arraycontributors_obj['idcontributor'];
				}
			}else{
				$actionlinkcontrib = "I";
			}
					
			if ($request->isMethod('POST')) {
				$form->handleRequest($request);
				if ($form->isSubmitted() && $form->isValid()) {
					try {
						$em->persist($dcontribution);
						$em->flush();

						$m=0;
						$idcontrib = $dcontribution->getIdcontribution();
						
						if ($idcontrib != ""){	
							$actionscontribstr = $request->get('newcontributors');
							$this->savecontributors($idcontrib,$actionscontribstr,$request);
						}  
						
						$this->addFlash('success', 'DATA RECORDED IN DATABASE!');
					
						return $this->redirectToRoute('app_edit_contribution', array('pk' => $dcontribution->getPk()));
					} catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
						echo "<script type='text/javascript'>alert('Record already exists with these values !');</script>";
					} catch(\Doctrine\DBAL\Exception\ConstraintViolationException $e ) {
						echo "<script type='text/javascript'>alert('There is a constraint violation with that transaction !');</script>";
					} catch(\Doctrine\DBAL\Exception\TableNotFoundException $e ) {
						echo "<script type='text/javascript'>alert('Table not found !');</script>";
					} catch(\Doctrine\DBAL\Exception\ConnectionException $e ) {
						echo "<script type='text/javascript'>alert('Problem of connection with database !');</script>";
					} catch(\Doctrine\DBAL\Exception\DriverException $e ) {
						echo "<script type='text/javascript'>alert('There is a syntax error with one field !');</script>";
					}
				}elseif ($form->isSubmitted() && !$form->isValid() ){
					echo "<script type='text/javascript'>alert('error in form');</script>";
				}
			}
		
			if(!isset($arraycontributors[0])){
				return $this->render('@App/editcontribution.html.twig', array(
				'dcontribution' => $dcontribution,
				'form2' => $form->createView(),
				'originaction'=>'edit'
				));
			}else{
				return $this->render('@App/editcontribution.html.twig', array(
					'dcontribution' => $dcontribution,
					'form2' => $form->createView(),
					'arraylinkcontribs' => $arraylinkcontribs,
					'arraycontributors' => $arraycontributors,
					'originaction'=>'edit'
				));
			}
		}
	}
	
	public function editmineralAction(Lminerals $lminerals, Request $request){
		$em = $this->getDoctrine()->getManager();
		
		if (!$lminerals) {
			throw $this->createNotFoundException('No mineral found' );
		}else{
			
			$form = $this->createForm(LmineralsEditType::class, $lminerals, array('entity_manager' => $em,));
			
			if ($request->isMethod('POST')) {
				$form->handleRequest($request);

				if ($form->isSubmitted() && $form->isValid()) {
					try {
						$em->flush();
						$this->addFlash('success', 'DATA RECORDED IN DATABASE!');
						return $this->redirectToRoute('app_edit_mineral', array('pk' => $lminerals->getPk()));
					} catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
						echo "<script type='text/javascript'>alert('Record already exists with these values of collection and ID !');</script>";
						//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction already exist" );
					} catch(\Doctrine\DBAL\Exception\ConstraintViolationException $e ) {
						echo "<script type='text/javascript'>alert('There is a constraint violation with that transaction !');</script>";
						throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Bad request on Transaction" );
					} catch(\Doctrine\DBAL\Exception\TableNotFoundException $e ) {
						echo "<script type='text/javascript'>alert('Table not found !');</script>";
						//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
					} catch(\Doctrine\DBAL\Exception\ConnectionException $e ) {
						echo "<script type='text/javascript'>alert('Problem of connection with database !');</script>";
						//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
					}
				}elseif ($form->isSubmitted() && !$form->isValid() ){
					echo "<script type='text/javascript'>alert('error in form');</script>";
				}
			}
			print $lminerals->getMparent();
			return $this->render('@App/editmineral.html.twig', array(
				'lminerals' => $lminerals,
				'Mineral_form' => $form->createView(),
				'origin'=>'edit'
			));
		}
    }
	
	/*public function deletesammineralAction(String $primkey){
		$coll = "";
		$idsample = "";
		$idmineral = "";
		if ($primkey != ""){
			$elem = explode("-", $primkey);
			$coll = $elem[0];
			$idsample = $elem[1];
			$idmineral = $elem[2];
		}
						
		$em = $this->getDoctrine()->getManager();
		
		$sammineral = $this->getDoctrine()
			->getRepository(Dsamminerals::class)
			 ->findBy(array('idcollection' => $coll, 
							'idsample' => $idsample,
							'idmineral' => $idmineral 
		));
						   
	//	if (!$sammineral) {
	//		throw $this->createNotFoundException('No mineral found' );
	//	}else{
		Try{
			$RAW_QUERY = "DELETE FROM dsamminerals WHERE idcollection = '".$coll."' and idsample = ".$idsample." and idmineral = ".$idmineral." ;";
			//return new Response('<html><body>query=:'.$RAW_QUERY.'</body></html>' );
			
			$statement = $em->getConnection()->prepare($RAW_QUERY);
			//$statement->execute();
				
				return $this->render('@App/editmineral.html.twig', array(
				'lminerals' => $lminerals,
				'form' => $form->createView(),
				'origin'=>'edit'
			));
		//}
		} catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
			echo "<script type='text/javascript'>alert('Record already exists with these values of collection and ID !');</script>";
			//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction already exist" );
		} catch(\Doctrine\DBAL\Exception\ConstraintViolationException $e ) {
			echo "<script type='text/javascript'>alert('There is a constraint violation with that transaction !');</script>";
			throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Bad request on Transaction" );
		} catch(\Doctrine\DBAL\Exception\TableNotFoundException $e ) {
			echo "<script type='text/javascript'>alert('Table not found !');</script>";
			//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
		} catch(\Doctrine\DBAL\Exception\ConnectionException $e ) {
			echo "<script type='text/javascript'>alert('Problem of connection with database !');</script>";
			//throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "Transaction Table not found" );
		}
    }*/
	
	public function viewsampleAction(Dsample $dsample){
		$grades[]=null;
		$arraylminerals[]=null;
		$arraydsammagsusc[]=null;
		$arraydsamgranulo[]=null;
		$arraysamheavymin[]=null;
		$idcol = $dsample->getIdcollection();
		$idsamp = $dsample->getIdsample();
		$em = $this->getDoctrine()->getManager();
		
		//minerals------
		$sammineral = $this->getDoctrine()
        ->getRepository(Dsamminerals::class)
		 ->findBy(array('idcollection' => $idcol, 
						'idsample' => $idsamp
					   ));
	
		foreach($sammineral as $dsammineral_obj){
			$grades[]=$dsammineral_obj->getGrade();
			$lminerals = $this->getDoctrine()
			->getRepository(Lminerals::class)
			->findBy(array(	'idmineral' => $dsammineral_obj->getIdMineral()	));
			$arraylminerals[]=$lminerals;
		}
		
		//Magnetic susc----
		$arraydsammagsusc = $this->getDoctrine()
        ->getRepository(DSamMagSusc::class)
		 ->findBy(array('idcollection' => $idcol, 
						'idsample' => $idsamp
					   ));
					   
		//granulo----
		$arraydsamgranulo = $this->getDoctrine()
        ->getRepository(Dsamgranulo::class)
		 ->findBy(array('idcollection' => $idcol, 
						'idsample' => $idsamp
					   ));
					   
		//heavyminerals----
		$arraysamheavymin = $this->getDoctrine()
		->getRepository(Dsamheavymin::class)
		 ->findBy(array('idcollection' => $idcol, 
						'idsample' => $idsamp
					   ));
					   
		//heavyminerals2----
		$RAW_QUERY = "SELECT * FROM dsamheavymin2 where idcollection = '".$idcol."' AND idsample = ".$idsamp.";";
		$statement = $em->getConnection()->prepare($RAW_QUERY);
		$statement->execute();
		$arraysamheavymin2 = $statement->fetchAll();
		//return new Response('<html><body>'.print_r($arraysamheavymin2).'</body></html>' );
						   
		return $this->render('@App/viewsample.html.twig', array(
            'dsample' => $dsample,
			'grades' => $grades,
			'arraylminerals' => $arraylminerals,
			'arraydsammagsusc' => $arraydsammagsusc,
			'arraydsamgranulo' => $arraydsamgranulo,
			'arraysamheavymin' => $arraysamheavymin,
			'arraysamheavymin2' => $arraysamheavymin2,
        ));
    }
	
	public function viewmineralAction(Lminerals $lminerals){
		return $this->render('@App/viewmineral.html.twig', array(
            'lminerals' => $lminerals,
        ));
    }
	
	public function viewcontributionAction(Dcontribution $dcontribution){
		$em = $this->getDoctrine()->getManager();
		$roles[]=null;
		$orders[]=null;
		$arraydcontributors[]=null;
		$dcontributors[]=null;
		$idcontr = $dcontribution->getIdcontribution();
		
		//contributors------
		$RAW_QUERY = "SELECT * FROM dlinkcontribute where idcontribution = ".$idcontr.";";
		$statement = $em->getConnection()->prepare($RAW_QUERY);
		$statement->execute();
		$linkcontribute = $statement->fetchAll();
	
		foreach($linkcontribute as $linkcontribute_obj){
			$roles[]=$linkcontribute_obj["contributorrole"];
			$orders[]=$linkcontribute_obj["contributororder"];
			$dcontributors = $this->getDoctrine()
			->getRepository(Dcontributor::class)
			->findBy(array(	'idcontributor' => $linkcontribute_obj["idcontributor"]	));
			$arraydcontributors[]=$dcontributors;
		}
				
		//
		if(!isset($arraydcontributors[1])){
			//return new Response('<html><body>null'.print_r($arraydcontributors).'</body></html>' );
			return $this->render('@App/viewcontribution.html.twig', array(
				'dcontribution' => $dcontribution,
			));
		}else{
		//	return new Response('<html><body>not null'.print_r($arraydcontributors).'</body></html>' );
			return $this->render('@App/viewcontribution.html.twig', array(
				'dcontribution' => $dcontribution,
				'roles' => $roles,
				'orders' => $orders,
				'arraycontributors' => $arraydcontributors
			));
		}
    }
	
	public function viewsammineralsAction(Dsamminerals $dsamminerals){
		return $dsamminerals;
	}
	
	public function adddocumentAction(Request $request){
		return $this->render('@App/adddocument.html.twig');
    }
	
	public function addpointsAction(Request $request){
		return $this->render('@App/addpoints.html.twig');
    }
	
	public function addoutcropAction(Request $request){
		return $this->render('@App/addoutcrop.html.twig');
    }
	
	public function adddrillingAction(Request $request){
		return $this->render('@App/adddrilling.html.twig');
    }
	
	public function searchsampleAction(Request $request){
		return $this->render('@App/searchsample.html.twig');  
	}
	
	public function searchmineralAction(Request $request){
		return $this->render('@App/searchmineral.html.twig');  
	}
	
	public function searchcontributionAction(Request $request){
		return $this->render('@App/searchcontribution.html.twig');  
	}
	
	public function listcodecollectionAction($querygroup,Request $request){
		$em = $this->getDoctrine()->getManager();

        $RAW_QUERY = "SELECT * FROM codecollection where codecollection.zoneutilisation LIKE '".$querygroup."';";
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $codescollection = $statement->fetchAll();
        
        return new JsonResponse($codescollection);
		return "";
    }
	
	public function listHMAction(Request $request){
		$em = $this->getDoctrine()->getManager();

        $RAW_QUERY = "SELECT mineral FROM DSamHeavyMin2 GROUP BY mineral ORDER BY mineral;";
        
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $minclasses = $statement->fetchAll();
        
        return new JsonResponse($minclasses);
    }
	
	public function listmineralsAction($querygroup,Request $request){
		$em = $this->getDoctrine()->getManager();

        $RAW_QUERY = "SELECT * FROM lminerals where rank = '".$querygroup."' ORDER BY rank,fmname;";
        
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $minclasses = $statement->fetchAll();
        
        return new JsonResponse($minclasses);
    }
	
	public function listmineralparentsAction(Request $request){
		$em = $this->getDoctrine()->getManager();

      	$RAW_QUERY = "SELECT mparent from (SELECT DISTINCT mparent FROM lminerals where mparent != ''  UNION SELECT DISTINCT fmparent FROM lminerals where fmparent != '' AND fmparent != '-') as a ORDER BY a.mparent ;";
        
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $minclasses = $statement->fetchAll();
        
        return new JsonResponse($minclasses);
    }
	
	public function listlithomineralsAction(Request $request){
		$em = $this->getDoctrine()->getManager();

        $RAW_QUERY = "SELECT DISTINCT mineral FROM dsamheavymin2 ORDER BY mineral;";
        
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $minclasses = $statement->fetchAll();
        
        return new JsonResponse($minclasses);
    }
	
	public function IDContributions_autocompleteAction(Request $request){
		$em = $this->getDoctrine()->getManager();
		$type = $_GET['code'];
// return new Response('<html><body>not null'.print_r($id).'</body></html>');
        //$RAW_QUERY = "SELECT idcontribution, '--', datetype, '--', date, '--', year) as idfull FROM dcontribution  ORDER BY idcontribution LIMIT 10;"; //where idcontribution LIKE '".$id."%'
        //$RAW_QUERY = "SELECT * FROM dcontribution ORDER BY idcontribution LIMIT 10;";
		$RAW_QUERY = "SELECT coalesce(idcontribution || '--' || datetype || '--' || to_char(date, 'DD/MM/YYYY') || '--' || year, idcontribution || '--' || datetype || '--' || '--' || year) as idfull FROM dcontribution  WHERE datetype LIKE '".$type."' ORDER BY idcontribution";
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $idcontr = $statement->fetchAll();
        
        return new JsonResponse($idcontr);
    }
	
	public function Code_autocompleteAction(Request $request){
		$em = $this->getDoctrine()->getManager();
		$coll = strtolower($_GET['coll']);
		$num = strtolower($_GET['code']);
		if ($coll != "all"){
			$RAW_QUERY = "SELECT fieldnum FROM dsample where lower(fieldnum) LIKE '".$num."%' AND lower(idcollection) = '".$coll."';"; 
		}else{
			$RAW_QUERY = "SELECT fieldnum FROM dsample where lower(fieldnum) LIKE '".$num."%';"; 
		}
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $codes = $statement->fetchAll();
        
        return new JsonResponse($codes);
    }
	
	public function contribtype_autocompleteAction(Request $request){
		$em = $this->getDoctrine()->getManager();

		$RAW_QUERY = "SELECT DISTINCT datetype FROM dcontribution ORDER BY datetype;"; 
		
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $types = $statement->fetchAll();
        
        return new JsonResponse($types);
    }
	
	public function contribdata_comboboxAction(Request $request){
		$em = $this->getDoctrine()->getManager();
		$code = strtolower($_GET['code']);
		switch ($code) { 
			case ($code==1):
				$RAW_QUERY = "SELECT DISTINCT datetype as valdata FROM dcontribution ORDER BY datetype;"; 
				break;
			case ($code==2):
				$RAW_QUERY = "SELECT DISTINCT people as valdata FROM dcontributor ORDER BY people;"; 
				break;
			case ($code==3):
				$RAW_QUERY = "SELECT DISTINCT contributorrole as valdata FROM dlinkcontribute ORDER BY contributorrole;"; 
				break;
			case ($code==4):
				$RAW_QUERY = "SELECT DISTINCT peoplefonction as valdata FROM dcontributor ORDER BY peoplefonction;"; 
				break;
			case ($code==5):
				$RAW_QUERY = "SELECT DISTINCT peopletitre as valdata FROM dcontributor ORDER BY peopletitre;"; 
				break;
			case ($code==6):
				$RAW_QUERY = "SELECT DISTINCT peoplestatut as valdata FROM dcontributor ORDER BY peoplestatut;"; 
				break;
			case ($code==7):
				$RAW_QUERY = "SELECT DISTINCT institut as valdata FROM dcontributor ORDER BY institut;"; 
				break;
			case ($code==8):
				$RAW_QUERY = "SELECT DISTINCT institut as valdata FROM dcontributor ORDER BY institut;";------------------------------------------ 
				break;
		};
		
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $types = $statement->fetchAll();
        
        return new JsonResponse($types);
    }
	
	public function contribnames_autocompleteAction(Request $request){
		$em = $this->getDoctrine()->getManager();
		$name = strtolower($_GET['code']);
		$RAW_QUERY = "SELECT * FROM dcontributor where lower(people) LIKE '".$name."%' ORDER BY people;"; 
		
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $names = $statement->fetchAll();
        
        return new JsonResponse($names);
    }
	
	public function Parent_autocompleteAction(Request $request){
		$em = $this->getDoctrine()->getManager();
		$num = strtolower($_GET['code']);
		$RAW_QUERY = "SELECT DISTINCT lower(mparent) as mparent FROM lminerals where lower(mparent) LIKE '".$num."%';"; 
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $codes = $statement->fetchAll();
        return new JsonResponse($codes);
    }
	
	public function Minname_autocompleteAction(Request $request){
		$em = $this->getDoctrine()->getManager();
		$num = strtolower($_GET['code']);
		$RAW_QUERY = "SELECT DISTINCT lower(mname) as mname FROM lminerals where lower(mname) LIKE '".$num."%';"; 
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $codes = $statement->fetchAll();
        return new JsonResponse($codes);
    }
	
	public function Minfname_autocompleteAction(Request $request){
		$em = $this->getDoctrine()->getManager();
		$num = strtolower($_GET['code']);
		$RAW_QUERY = "SELECT DISTINCT lower(fmname) as fmname FROM lminerals where lower(fmname) LIKE '".$num."%';"; 
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $codes = $statement->fetchAll();
        return new JsonResponse($codes);
    }
	
	public function Minformula_autocompleteAction(Request $request){
		$em = $this->getDoctrine()->getManager();
		$num = strtolower($_GET['code']);
		$RAW_QUERY = "SELECT DISTINCT mformula as mformula FROM lminerals where lower(mformula) LIKE '".$num."%';"; 
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $codes = $statement->fetchAll();
        return new JsonResponse($codes);
    }
	
	public function Museumloc_autocompleteAction(Request $request){
		$em = $this->getDoctrine()->getManager();
		$num = strtolower($_GET['code']);
		$RAW_QUERY = "SELECT DISTINCT lower(museumlocation) as museumlocation FROM dsample where lower(museumlocation) LIKE '".$num."%';"; 
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $codes = $statement->fetchAll();
        return new JsonResponse($codes);
    }
	
	public function Box_autocompleteAction(Request $request){
		$num = strtolower($_GET['code']);
		$em = $this->getDoctrine()->getManager();
		$RAW_QUERY = "SELECT DISTINCT lower(trim(boxnumber)) as boxnumber FROM dsample where lower(boxnumber) LIKE '".$num."%';";
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $codes = $statement->fetchAll();
		return new JsonResponse($codes);
    }
	
	public function LastSampleIDAction($querygroup,Request $request){
		$id = 0;
		$em = $this->getDoctrine()->getManager();
		$RAW_QUERY = "SELECT idsample FROM dsample WHERE idcollection = '".$querygroup."' ORDER BY idsample DESC LIMIT 1;"; 
		
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $id = $statement->fetchAll();
		
		return new JsonResponse($id);
	}
	
	public function LastcontribidAction(Request $request){
		$id = 0;
		$em = $this->getDoctrine()->getManager();
		$RAW_QUERY = "SELECT idcontribution FROM dcontribution ORDER BY idcontribution DESC LIMIT 1;"; 
		
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $id = $statement->fetchAll();
		
		return new JsonResponse($id);
	}
	
	public function LastcontributoridAction(Request $request){
		$id = 0;
		$em = $this->getDoctrine()->getManager();
		$RAW_QUERY = "SELECT idcontributor FROM dcontributor ORDER BY idcontributor DESC LIMIT 1;"; 
		
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $id = $statement->fetchAll();
		
		return new JsonResponse($id);
	}
	
	public function LastMineralIDAction(Request $request){
		$id = 0;
		$em = $this->getDoctrine()->getManager();
		$RAW_QUERY = "SELECT idmineral FROM lminerals ORDER BY idmineral DESC LIMIT 1;"; 
		
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $id = $statement->fetchAll();
		
		return new JsonResponse($id);
	}
	
	public function results_searchsampleAction($queryvals,Request $request){
		/*//require_once("@App/debug/PHPDebug.php");
		//$debug = new PHPDebug();
		//$debug->debug("A very simple message");
		 */
		 
		$arrayqueryvals =  explode(",,", $queryvals); 
		$elem =array();
		foreach($arrayqueryvals as $e) {
            $elem1 = explode(":", $e);
			$elem[$elem1[0]]=$elem1[1];
        } 
		
		$querymagnet = "";
								
		switch($elem["lithomagnet"]) {
			 case -3:
				$querymagnet = "m.mesure1 < -10";
				break;
			 case -2:
				$querymagnet = "m.mesure1 < -5.001 AND m.mesure1 > -10";
				break;
			 case -1:
				$querymagnet = "m.mesure1 < -0.001 AND m.mesure1 > -5";
				break;
			case 1:
				$querymagnet = "m.mesure1 > 0 AND m.mesure1 < 50";
				break;
			case 2:
				$querymagnet = "m.mesure1 > 50.001 AND m.mesure1 < 100";
				break;
			case 3:
				$querymagnet = "m.mesure1 > 100.001 AND m.mesure1 < 250";
				break;
			case 4:
				$querymagnet = "m.mesure1 > 250";
				break;
		} 

		$data_array = array(
			array(":collection",	'%'.strtolower($elem["collection"]).'%',	"LOWER(d.idcollection) LIKE ",		"",0),
			array(":searchnum",		$elem["searchnum"],							"d.idsample = ",					"",0),
			array(":code",			'%'.strtolower($elem["code"]).'%',			"LOWER(d.fieldnum) LIKE ",			"",0),
			array(":museumnr",		$elem["museumnr"],							"d.museumnum = ",					"",0),
			array(":museumloc",		'%'.strtolower($elem["museumloc"]).'%',		"LOWER(d.museumlocation) LIKE ",	"",0),
			array(":boxnbr",		'%'.strtolower($elem["boxnbr"]).'%',		"LOWER(d.boxnumber) LIKE ",			"",0),
			array(":descr",			'%'.strtolower($elem["descr"]).'%',			"LOWER(d.sampledescription) LIKE ",	"",0),
			array(":weight",		$elem["weight"],							"d.weight = ",						"",0),
			array(":size",			'%'.strtolower($elem["size"]).'%',			"LOWER(d.size) LIKE ",				"",0),
			array(":dimension",		$elem["dimension"],							"d.dimentioncode = ",				"",0),
			array(":quality",		$elem["quality"],							"d.quality =  ",					"",0),
			array(":radioactivity",	$elem["radioactivity"],						"d.radioactivity = ",				"1",0),
			array(":slimplate",		$elem["slimplate"],							"d.slimplate = ",					"TRUE",0),
			array(":chemanalysis",	$elem["chemanalysis"],						"d.chemicalanalysis = ",			"TRUE",0),
			array(":holotype",		$elem["holotype"],							"d.holotype = ",					"TRUE",0),
			array(":paratype",		$elem["paratype"],							"d.paratype = ",					"TRUE",0),
			array(":loaninfo",		'%'.strtolower($elem["loaninfo"]).'%',		"LOWER(d.loaninformation) LIKE ",	"",0),
			array(":securitylevel",	$elem["securitylevel"],						"d.securitylevel = ",				"",0),
			array(":variousinfo",	strtolower($elem["variousinfo"]),			"LOWER(d.varioussampleinfo) LIKE ",	"",0),
			
			array(":idmineral",		$elem["idmineral"],							"s.idmineral = ",					"",1),
			array(":grademineral",	$elem["grademineral"],						"s.grade = ",						"",1),
			


			array(":classmineral",	'%'.strtolower($elem["classmineral"]).'%',	"(l.rank = 'class' AND  l.fmname LIKE ",											") OR LOWER(l.fmparent) LIKE ",1),
			array(":groupmineral",	'%'.strtolower($elem["groupmineral"]).'%',	"(l.rank = 'group' AND  l.fmname LIKE ",											") OR LOWER(l.fmparent) LIKE ",1),
			array(":mineral",		'%'.strtolower($elem["mineral"]).'%',		"LOWER(l.fmname) LIKE ",															" OR LOWER(l.mname) LIKE ",1),

			array(":formulamineral",'%'.strtolower($elem["formulamineral"]).'%',"LOWER(l.mformula) LIKE ",			"",1),
			
			array(":lithomineral",	'%'.strtolower($elem["lithomineral"]).'%',	"LOWER(h2.mineral) LIKE ",			"",2),
			array(":lithominnum_from",$elem["lithominnum_from"],				"h2.minnum >= ",					"",2),
			array(":lithominnum_to",$elem["lithominnum_to"],					"h2.minnum <= ",					"",2),
			array(":lithoweight_from",$elem["lithoweight_from"],				"h1.weightsample >= ",				"",2),
			array(":lithoweight_to",$elem["lithoweight_to"],					"h1.weightsample <= ",				"",2),
			array(":lithoobserv",	'%'.strtolower($elem["lithoobserv"]).'%',	"LOWER(h2.observationhm) LIKE ",	"",2),
			
			array(":lithogranulo",	$elem["lithogranulo"],						"g.weighttot != ",					"0",3),
			array(":lithomagnet",	$elem["lithomagnet"],						$querymagnet,						";",3)
		);
		
		/*$RAW_QUERY = "SELECT * FROM dsample d ";
		$mineralsearch = 0;
		for ($x = 0; $x < sizeof($data_array); $x++) {
			if ($data_array[$x][4] == 1 AND ((	(substr($data_array[$x][1],-1) != "%" AND strlen($data_array[$x][1]) != 0) OR 
												(substr($data_array[$x][1],-1) == "%" AND strlen($data_array[$x][1]) != 2)) AND
												($data_array[$x][1] != '%all%'))){
				$mineralsearch = 1;
			}
		}
		if ($mineralsearch == 1){
			$RAW_QUERY = $RAW_QUERY."LEFT JOIN DSamMinerals s ON s.IDCollection = d.IDCollection AND s.IDSample = d.IDSample LEFT JOIN lminerals l ON l.IDMineral = s.IDMineral";
		}*/
		
		$RAW_QUERY = "SELECT d.pk as pk,
							d.idcollection as idcollection, 
							d.idsample as idsample, 
							d.fieldnum as fieldnum, 
							d.museumnum as museumnum, 
							d.museumlocation as museumlocation, 
							d.boxnumber as boxnumber, 
							d.sampledescription as sampledescription,              
							d.weight as weight, 
							d.quantity as quantity, 
							d.size as size, 
							d.dimentioncode as dimentioncode, 
							d.quality::integer as quality, 
							d.slimplate as slimplate, 
							d.chemicalanalysis as chemicalanalysis,
							CASE WHEN d.holotype = TRUE THEN 'H' ELSE '' END	||	CASE WHEN d.paratype = TRUE THEN 'P' ELSE '' END AS type,
							d.holotype as holotype, 
							d.paratype as paratype, 
							d.radioactivity as radioactivity, 
							d.loaninformation as loaninformation, 
							d.securitylevel as securitylevel, 
							d.varioussampleinfo as varioussampleinfo,
							string_agg(distinct l.mname,',') as mname, 
							string_agg(distinct l.mformula,' -- ') as mformula, 
							string_agg(distinct l.fmparent,',') as fmparent, 
							string_agg(distinct l.mparent,',') as mparent,
							string_agg(distinct l.fmname,',') as fmname, 
							string_agg(to_char(h1.weightsample, '999.99') ,',') as weightsample,
							string_agg(distinct (h2.mineral || '(' || h2.minnum::varchar || ')'),', ' ) as mineral2,
							string_agg(h2.minnum::varchar,',') as minnum ,
							string_agg(distinct h1.observationhm,',') as observationhm,
							string_agg(distinct to_char(g.weighttot, '999.99'),',') as weighttot,
							string_agg(to_char(m.weight, '999.99'),',') as mweight,
							string_agg(distinct to_char(m.mesure1, '9999.999'),',')::double precision as mesure1
						FROM dsample d 
						LEFT JOIN DSamMinerals 	s 	ON s.IDCollection = d.IDCollection AND s.IDSample = d.IDSample 
						LEFT JOIN lminerals 	l 	ON l.IDMineral = s.IDMineral 
						LEFT JOIN dsamheavymin 	h1 	ON h1.IDCollection = d.IDCollection AND h1.IDSample = d.IDSample 
						LEFT JOIN dsamheavymin2 h2 	ON h2.IDCollection = d.IDCollection AND h2.IDSample = d.IDSample 
						LEFT JOIN dsamgranulo 	g 	ON g.IDCollection = d.IDCollection AND g.IDSample = d.IDSample
						LEFT JOIN dsammagsusc 	m 	ON m.IDCollection = d.IDCollection AND m.IDSample = d.IDSample";
	   
		$RAW_QUERY = $RAW_QUERY." WHERE";
		for ($x = 0; $x < sizeof($data_array); $x++) {
			if($data_array[$x][3] == "1" OR $data_array[$x][3] == "TRUE" OR $data_array[$x][3] == "0"){  //Case  of checkboxes with value 1 if chosen --> add only =TRUE
				if (strlen($data_array[$x][1]) != 0 AND $data_array[$x][1] == "1"){
					$andq = " AND ".$data_array[$x][2].$data_array[$x][3];
				}ELSE{
					$andq = '';
				}
			}ELSE{ 
				if($data_array[$x][3] == ";"){  //Case  of combobox with ranges of values --> add only part 1
					if (strlen($data_array[$x][1]) != 0 AND $data_array[$x][1] != 'all'){
						$andq = " AND ".$data_array[$x][2];
					}ELSE{
						$andq = '';
					}
				}ELSE{ 
					//Case  of integers or strings
					if (((substr($data_array[$x][1],-1) != "%" AND strlen($data_array[$x][1]) != 0) OR 
						(substr($data_array[$x][1],-1) == "%" AND strlen($data_array[$x][1]) != 2)) AND
						($data_array[$x][1] != '%all%') AND	($data_array[$x][1] != 'all')){
						
						$andq = " AND ".$data_array[$x][2].$data_array[$x][0].$data_array[$x][3];
						if (strpos($data_array[$x][3],"OR") == 1 | strpos($data_array[$x][3],"OR") == 2){
							$andq = " AND ".$data_array[$x][2].$data_array[$x][0].$data_array[$x][3].$data_array[$x][0];
						}
					}ELSE{
						$andq = '';
					}
				}
			}
			$RAW_QUERY = $RAW_QUERY.$andq;
		} 
		$RAW_QUERY = $RAW_QUERY." GROUP BY d.pk, d.idcollection, d.idsample, d.fieldnum, d.museumnum, d.museumlocation, d.boxnumber, d.sampledescription, d.weight, d.quantity, d.size, d.dimentioncode, 
		d.quality, d.slimplate, d.chemicalanalysis, d.holotype, d.paratype, d.radioactivity, d.loaninformation, d.securitylevel, d.varioussampleinfo";
		
		$orderfield = $elem["sortDirection"]; 
		$RAW_QUERY = $RAW_QUERY." ORDER BY ".$orderfield;    
		$RAW_QUERY = str_replace("WHERE AND", "WHERE", $RAW_QUERY);
		$RAW_QUERY = str_replace("WHERE ORDER", " ORDER", $RAW_QUERY);
		$RAW_QUERY = str_replace("WHERE GROUP", "GROUP", $RAW_QUERY);

		//echo "<script type='text/javascript'>alert('$RAW_QUERY');</script>";

		$em = $this->getDoctrine()->getManager();
		$statement = $em->getConnection()->prepare($RAW_QUERY);
		
		for ($x = 0; $x < sizeof($data_array); $x++) {
			if(strpos($RAW_QUERY, $data_array[$x][0]) !== false){
				$statement->bindValue($data_array[$x][0], $data_array[$x][1]);
			}
		}
		//return new Response('<html><body>'.print_r($RAW_QUERY).'</body></html>' );
        $statement->execute();
        $Arrayresult = $statement->fetchAll();
		//return new Response('<html><body>'.print_r($Arrayresult).'</body></html>' );
		
		//paginator++++++++++++++++++++++++++++++++++
		$paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $Arrayresult,
            $request->query->getInt('page', 1), 	/*current page number*/ 
			$elem["NbrResByPage"] 					/*images per page*/
        );
	/*	$pagination->setParam('sort','type');
		$pagination->setParam('direction', 'desc');

		$sortParams = array("sort"=>"fieldnum", "direction"=>"asc");
		$v = $sortParams['sort'];
		echo "<script type='text/javascript'>alert('$v');</script>";
		if(!$request->query->get('sort') && !$request->query->get('direction')) {
			$pagination->setParam('sort', $sortParams['sort']);
			$pagination->setParam('direction', $sortParams['direction']);
		}*/

		$queryvals = $queryvals.",,nbrres:".sizeof($Arrayresult);
		//$queryvals = $queryvals.",NbrResByPage:".$elem["NbrResByPage"];

		return $this->render('@App/results_searchsample.html.twig', array('queryvals' => $queryvals,'results' => $pagination));  
	}
	
	public function results_searchmineralAction($queryvals,Request $request){
		$arrayqueryvals =  explode(",,", $queryvals); 
		$elem =array();
		foreach($arrayqueryvals as $e) {
            $elem1 = explode(":", $e);
			$elem[$elem1[0]]=$elem1[1];
        } 
		
		$data_array = array(			
			array(":idmineral",		$elem["idmineral"],							"idmineral = ",																	"",1),
			array(":classmineral",	'%'.strtolower($elem["classmineral"]).'%',	"(rank = 'class' AND  fmname LIKE ",											") OR LOWER(fmparent) LIKE ",1),
			array(":groupmineral",	'%'.strtolower($elem["groupmineral"]).'%',	"(rank = 'group' AND  fmname LIKE ",											") OR LOWER(fmparent) LIKE ",1),
			array(":mineral",		'%'.strtolower($elem["mineral"]).'%',		"LOWER(fmname) LIKE ",															" OR LOWER(mname) LIKE ",1),
			array(":formulamineral",'%'.strtolower($elem["formulamineral"]).'%',"LOWER(mformula) LIKE ",														"",1),
			array(":parentmineral",	'%'.strtolower($elem["parentmineral"]).'%',"LOWER(mparent) LIKE ",															" OR LOWER(fmparent) LIKE ",1)
		);
		
		$RAW_QUERY = "SELECT pk,
							idmineral,
							rank,
							mname, 
							fmname,
							mformula, 
							fmparent, 
							mparent						
						FROM lminerals";
	   
		$RAW_QUERY = $RAW_QUERY." WHERE";
		for ($x = 0; $x < sizeof($data_array); $x++) {
			if (((substr($data_array[$x][1],-1) != "%" AND strlen($data_array[$x][1]) != 0) OR 
				(substr($data_array[$x][1],-1) == "%" AND strlen($data_array[$x][1]) != 2)) AND
				($data_array[$x][1] != '%all%') AND	($data_array[$x][1] != 'all')){
				
				$andq = " AND ".$data_array[$x][2].$data_array[$x][0].$data_array[$x][3];
		
				if (strpos($data_array[$x][3],"OR") == 1 | strpos($data_array[$x][3],"OR") == 2){
					$andq = " AND ".$data_array[$x][2].$data_array[$x][0].$data_array[$x][3].$data_array[$x][0];
				}
			}ELSE{
				$andq = '';
			}
			$RAW_QUERY = $RAW_QUERY.$andq;
		} 
		
		$orderfield = $elem["sortDirection"]; 
		$RAW_QUERY = $RAW_QUERY." ORDER BY ".$orderfield;    
		$RAW_QUERY = str_replace("WHERE AND", "WHERE", $RAW_QUERY);
		$RAW_QUERY = str_replace("WHERE ORDER", "ORDER", $RAW_QUERY);
		
		echo "<script type='text/javascript'>alert('$RAW_QUERY');</script>";

		$em = $this->getDoctrine()->getManager();
		$statement = $em->getConnection()->prepare($RAW_QUERY);
		
		for ($x = 0; $x < sizeof($data_array); $x++) {
			if(strpos($RAW_QUERY, $data_array[$x][0]) !== false){
				$statement->bindValue($data_array[$x][0], $data_array[$x][1]);
			}
		}
		
        $statement->execute();
        $Arrayresult = $statement->fetchAll();
		
		//paginator++++++++++++++++++++++++++++++++++
		$paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $Arrayresult,
            $request->query->getInt('page', 1), 	/*current page number*/ 
			$elem["NbrResByPage"] 					/*images per page*/
        );
		
		$queryvals = $queryvals.",,nbrres:".sizeof($Arrayresult);
		
		return $this->render('@App/results_searchmineral.html.twig', array('queryvals' => $queryvals,'results' => $pagination));  
	}
	
	public function results_searchcontributionAction($queryvals,Request $request){
		$arrayqueryvals =  explode(",,", $queryvals); 
		$elem =array();
		foreach($arrayqueryvals as $e) {
            $elem1 = explode(":", $e);
			$elem[$elem1[0]]=$elem1[1];
        } 
		
		$data_array = array(			
			array(":idcontribution",	$elem["idcontribution"],				"c.idcontribution = ",		"",1),
			array(":type",				'%'.strtolower($elem["type"]).'%',		"LOWER(datetype) LIKE ",	"",1),
			array(":year",				$elem["year"],							"year = ",					"",1),
			array(":date_from",			$elem["date_from"],						"date >= ",					"",2),
			array(":date_to",			$elem["date_to"],						"date <= ",					"",2),
			array(":idcontributor",		$elem["idcontributor"],					"o.idcontributor = ",		"",1),
			array(":people",			'%'.strtolower($elem["people"]).'%',	"LOWER(people) LIKE ",		"",1),
			array(":function",			'%'.strtolower($elem["function"]).'%',	"LOWER(peoplefonction) LIKE ",		"",1),
			array(":title",				'%'.strtolower($elem["title"]).'%',		"LOWER(peopletitre) LIKE ",		"",1),
			array(":status",			'%'.strtolower($elem["status"]).'%',	"LOWER(peoplestatut) LIKE ",		"",1),
			array(":institute",			'%'.strtolower($elem["institute"]).'%',	"LOWER(institut) LIKE ",		"",1),
			array(":role",				'%'.strtolower($elem["role"]).'%',		"LOWER(contributorrole) LIKE ",		"",1),
			array(":order",				$elem["order"],							"contributororder = ",					"",1)
		);
				
		$RAW_QUERY = "SELECT c.pk as pkcontribution,
							c.idcontribution,
							datetype,
							year, 
							date,			
							o.pk as pkcontributor,
							o.idcontributor,
							people,
							peoplefonction,
							peopletitre,
							peoplestatut,
							institut,
							contributorrole,
							contributororder
						FROM dcontribution c
						LEFT JOIN dlinkcontribute l ON l.idcontribution = c.idcontribution
						LEFT JOIN dcontributor o ON l.idcontributor = o.idcontributor";
	   
		$RAW_QUERY = $RAW_QUERY." WHERE";
		for ($x = 0; $x < sizeof($data_array); $x++) {
			if (((substr($data_array[$x][1],-1) != "%" AND strlen($data_array[$x][1]) != 0) OR 
				(substr($data_array[$x][1],-1) == "%" AND strlen($data_array[$x][1]) != 2)) AND
				($data_array[$x][1] != '%all%') AND	($data_array[$x][1] != 'all')){
				
				$andq = " AND ".$data_array[$x][2].$data_array[$x][0].$data_array[$x][3];
		
				if (strpos($data_array[$x][3],"OR") == 1 | strpos($data_array[$x][3],"OR") == 2){
					$andq = " AND ".$data_array[$x][2].$data_array[$x][0].$data_array[$x][3].$data_array[$x][0];
				}
			}ELSE{
				$andq = '';
			}
			$RAW_QUERY = $RAW_QUERY.$andq;
		} 
		
		$orderfield = $elem["sortDirection"]; 
		$RAW_QUERY = $RAW_QUERY." ORDER BY ".$orderfield;    
		$RAW_QUERY = str_replace("WHERE AND", "WHERE", $RAW_QUERY);
		$RAW_QUERY = str_replace("WHERE ORDER", "ORDER", $RAW_QUERY);
		
		//echo "<script type='text/javascript'>alert('$RAW_QUERY');</script>";
		//return new Response('<html><body>'.print_r($RAW_QUERY).'</body></html>' );

		$em = $this->getDoctrine()->getManager();
		$statement = $em->getConnection()->prepare($RAW_QUERY);
		
		for ($x = 0; $x < sizeof($data_array); $x++) {
			if(strpos($RAW_QUERY, $data_array[$x][0]) !== false){
				$statement->bindValue($data_array[$x][0], $data_array[$x][1]);
			}
		}
		
        $statement->execute();
        $Arrayresult = $statement->fetchAll();
	//	return new Response('<html><body>'.print_r($Arrayresult).'</body></html>' );
		//paginator++++++++++++++++++++++++++++++++++
		$paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $Arrayresult,
            $request->query->getInt('page', 1), 	/*current page number*/ 
			$elem["NbrResByPage"] 					/*images per page*/
        );
		
		$queryvals = $queryvals.",,nbrres:".sizeof($Arrayresult);
		
		return $this->render('@App/results_searchcontribution.html.twig', array('queryvals' => $queryvals,'results' => $pagination));  
	}
		
	public function searchdocumentAction(Request $request){
		return $this->render('@App/searchdocument.html.twig');
    }
	
	public function searchpointsAction(Request $request){
		return $this->render('@App/searchpoints.html.twig');
    }
	
	public function searchoutcropAction(Request $request){
		return $this->render('@App/searchoutcrop.html.twig');
    }
	
	public function searchdrillingAction(Request $request){
		return $this->render('@App/searchdrilling.html.twig');
    }
	
	public function adminAction(Request $request){
		return $this->render('@App/admin.html.twig');
    }
	
}
