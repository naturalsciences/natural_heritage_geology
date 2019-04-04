<?php

namespace AppBundle\Form;

use AppBundle\Entity\Dcontribution;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DcontributionType extends AbstractType {
	  /*$em = $options['entity_manager'];

		 list for types---------
        $RAW_QUERY = "SELECT DISTINCT datetype FROM dcontribution ORDER BY datetype;";
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $codestype = $statement->fetchAll();
		
		$elemtype =array();
		foreach($codestype as $e) {
			foreach($e as $ee) {
				$elemtype[$ee]=$ee;
			} 
		} */
		
    /**
     * {@inheritdoc}
     */
	
    public function buildForm(FormBuilderInterface $builder, array $options)  {

		$years=[];
		for($i = 2019; $i >1700; $i--) {
			$years[$i]=$i;
		}
		
		
		/* builder---------*/
        $builder
			->add('idcontribution', TextType::class, array('required' => true))
			->add('datetype', TextType::class, array('required' => true))
			->add('date', DateType::class, [
				'widget' => 'single_text'
			])
			->add('year', ChoiceType::class, array('choices'  => $years,'data' => '2019'))
		;
		
		$builder->addEventListener(
		  FormEvents::PRE_SET_DATA,    
					  function(FormEvent $event) { 
						$dcontribution = $event->getData();
						if (null === $dcontribution) {
						  return; 
						}
					  }
		);

		
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)  {
		 $resolver->setRequired('entity_manager');

        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Dcontribution'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()  {
        return 'appbundle_dcontribution';
    }
}
