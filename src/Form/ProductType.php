<?php
namespace App\Form;

use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Created by PhpStorm.
 * User: JuanMa
 * Date: 15/02/2018
 * Time: 15:40
 */

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', IntegerType::class, ['error_bubbling' => true])
            ->add('name', TextType::class, ['error_bubbling' => true])
            ->add('price', IntegerType::class, ['error_bubbling' => true])
            ->add('description', TextType::class, ['error_bubbling' => true])
            ->add('talla', TextType::class, ['error_bubbling' => true])
       ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'App\Entity\Product',]);
    }

    public function getName()
    {
        return 'app_product_type';
    }

}