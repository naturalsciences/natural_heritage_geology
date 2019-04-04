<?php

namespace AppBundle\Form;

use AppBundle\Entity\Dsample;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class DsampleType extends AbstractType {
    /**
     * {@inheritdoc}
     */
	
    public function buildForm(FormBuilderInterface $builder, array $options)  {
		$em = $options['entity_manager'];

		/* list for collections---------*/
        $RAW_QUERYcoll = "SELECT codecollection FROM codecollection where zoneutilisation LIKE 'sample%';";
        $statementcoll = $em->getConnection()->prepare($RAW_QUERYcoll);
        $statementcoll->execute();
        $codescollection = $statementcoll->fetchAll();
		
		$elemcoll =array();
		foreach($codescollection as $e) {
			foreach($e as $ee) {
				$elemcoll[$ee]=$ee;
			} 
		} 
		
		/* builder---------*/
        $builder
			->add('fieldnum') 
			->add('idcollection', ChoiceType::class, array('choices'  => $elemcoll))
			->add('idsample', TextType::class, array('required' => true))
			->add('museumnum',null, array('required' => false))
			->add('museumlocation')
			->add('boxnumber')
			->add('sampledescription', TextareaType::class, array('required' => false))
			->add('weight', TextType::class, array('required' => false))
			->add('quantity')
			->add('size')
			->add('dimentioncode', ChoiceType::class, array('choices'  => array('0'  => 0,'1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5)))
			->add('quality', ChoiceType::class, array('choices'  => array('0'  => 0,'1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5)))
			->add('slimplate', CheckboxType::class, array ('label' => 'Slim plate','required' => false))
			->add('chemicalanalysis', CheckboxType::class, array ('label' => 'Chemical analysis','required' => false))
			->add('holotype', CheckboxType::class, array ('label' => 'Holotype','required' => false))
			->add('paratype', CheckboxType::class, array ('label' => 'Paratype','required' => false))
			/*->add('radioactivity', CheckboxType::class, array ('label' => 'Radioactivity','required' => false))*/
			->add('radioactivity', ChoiceType::class, array('choices'  => array('0'  => 0,'1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5)))
			->add('loaninformation')
			->add('securitylevel', ChoiceType::class, array('choices'  => array('0'  => 0,'1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5)))
			->add('varioussampleinfo', TextareaType::class, array('required' => false))
		;
		
		$builder->addEventListener(
		  FormEvents::PRE_SET_DATA,    
					  function(FormEvent $event) { 
						$dsample = $event->getData();

						if (null === $dsample) {
						  return; 
						}

						if ($dsample->getIdsample() === null) {
						//  $event->getForm()	->add('idcollection', ChoiceType::class, array('choices'  => $elemcoll))
						} else {
						  // $event->getForm()->remove('idcollection');
						}
					  }
		);

		
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)  {
		 $resolver->setRequired('entity_manager');

        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Dsample'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()  {
        return 'appbundle_dsample';
    }
}
