<?php
/**
 * Created by JetBrains PhpStorm.
 * User: veerpartapsingh
 * Date: 10/7/13
 * Time: 10:19 PM
 * To change this template use File | Settings | File Templates.
 */
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// Import new namespaces
use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;


class PageController  extends Controller
{

    public function indexAction()
    {
        return $this->render('BloggerBlogBundle:Page:index.html.twig');
    }


    public function aboutAction()
    {
        return $this->render('BloggerBlogBundle:Page:about.html.twig');
    }

    // src/Blogger/BlogBundle/Controller/PageController.php
    /*public function contactAction()
    {
        return $this->render('BloggerBlogBundle:Page:contact.html.twig');
    }*/

// src/Blogger/BlogBundle/Controller/PageController.php
    public function contactAction()
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getRequest();
        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {
            #$form->bindRequest($request);

            if ($form->isValid()) {

                $nextAction = $form->get('Email_To_Gamebling')->isClicked()
                    ? 'emailtogamebling'
                    : 'emailtolock';

                if($nextAction === "emailtogamebling") {
                        $message = \Swift_Message::newInstance()
                            ->setSubject('Contact enquiry from symblog')
                            ->setFrom('lockedoncloud@gmail.com')
                            ->setTo('gamebling.sdei@gmail.com')
                            ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                        $this->get('mailer')->send($message);
                }elseif($nextAction === "emailtolock") {
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Contact enquiry from symblog')
                        ->setFrom('gamebling.sdei@gmail.com')
                        ->setTo('lockedoncloud@gmail.com')
                        ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                    $this->get('mailer')->send($message);
                }else{
                    $this->get('session')->setFlash('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');
                }

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('blogger_blog_contact'));
            }
        }

        return $this->render('BloggerBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

}