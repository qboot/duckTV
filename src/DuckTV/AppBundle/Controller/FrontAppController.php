<?php

namespace DuckTV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FrontAppController extends Controller
{
    public function indexAction() {

        return $this->render('DuckTVAppBundle:FrontApp:index.html.twig');

    }
}