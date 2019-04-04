<?php

namespace AppBundle\Form;

use AppBundle\Entity\Dcontribution;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DcontributionEditType extends AbstractType {
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
			->add('datetype', TextType::class, array('required' => true))
			->add('date', DateType::class, [
				'widget' => 'single_text'
			])
			->add('year', ChoiceType::class, array('choices'  => $years,'data' => '2019'))
		;
		
    }
	
	/**
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
