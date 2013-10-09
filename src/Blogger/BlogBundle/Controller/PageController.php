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


class PageController  extends Controller
{

    public function indexAction()
    {
        return $this->render('BloggerBlogBundle:Page:index.html.twig');
    }

}