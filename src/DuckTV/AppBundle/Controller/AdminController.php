<?php

namespace DuckTV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function indexAction() {

        return $this->render('DuckTVAppBundle:Admin:index.html.twig');

    }
}
