<?php

namespace DuckTV\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BroadcastType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position', IntegerType::class)
            ->add('video', EntityType::class, array(
                'class' => 'DuckTVAppBundle:Video',
                'choice_label'  => 'title',
                'multiple' => false,
                'expanded' => false
            ))
            ->add('slot', EntityType::class, array(
                'class' => 'DuckTVAppBundle:Slot',
                'choice_label' => function($slot) {
                    return $slot->getSelectTitle();
                },
                'multiple' => false,
                'expanded' => false
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DuckTV\AppBundle\Entity\Broadcast'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ducktv_appbundle_broadcast';
    }


}
