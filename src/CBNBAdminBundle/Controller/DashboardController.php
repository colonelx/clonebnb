<?php

namespace CBNBAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
       // die('da');
        return $this->render('CBNBAdminBundle:Default:index.html.twig');
    }
}
