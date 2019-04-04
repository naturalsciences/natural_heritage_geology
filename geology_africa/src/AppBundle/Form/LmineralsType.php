<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\EntityManagerInterface;


class LmineralsType extends AbstractType
{
	protected function getMineralKeywords($field)
	{
		$sql_field="mparent";
		if($field=="mparent")
		{
			$sql_field="mparent";			
		}
		elseif($field=="fmparent")
		{
			$sql_field="fmparent";
		}
		$RAW_QUERY = "SELECT DISTINCT ".$sql_field." FROM lminerals WHERE ".$sql_field." !='' ORDER BY ".$sql_field.";";
		$statement = $this->em->getConnection()->prepare($RAW_QUERY);
		$statement->execute();
		$tmpArray=$statement->fetchAll();
		$returned=Array();
		$elemcoll =array();
		foreach($tmpArray as $e) {
			foreach($e as $ee) {
				$returned[$ee]=$ee;
			} 
		} 
        return $returned;

	}
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)   {
		$this->em = $options['entity_manager'];
        $builder
			->add('idmineral', TextType::class, array('required' => false))
			->add('rank', ChoiceType::class, array('choices'  => array(''  => '','class' => 'class','group' => 'group','mineral' => 'mineral')))
		 	->add('fmname')
			->add('mname')
			->add('mformula')
			->add('mparent', ChoiceType::class, array('choices'  => $this->getMineralKeywords("mparent")))
			->add('fmparent', ChoiceType::class, array('choices'  => $this->getMineralKeywords("fmparent")))
			;
    }

	/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
		$resolver->setRequired('entity_manager');
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Lminerals',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_lminerals';
    }


}
