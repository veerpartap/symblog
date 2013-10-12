<?php
/**
 * Created by JetBrains PhpStorm.
 * User: veerpartapsingh
 * Date: 10/9/13
 * Time: 7:43 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Blogger\BlogBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email', 'email');
        $builder->add('subject');
        $builder->add('body', 'textarea');
        $builder->add('Email_To_Gamebling', 'submit');
        $builder->add('Email_To_LockedonCloud', 'submit');
    }

    public function getName()
    {
        return 'contact';
    }

}