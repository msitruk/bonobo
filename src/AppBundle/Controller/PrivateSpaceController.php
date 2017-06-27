<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PrivateSpaceController extends Controller
{
    /**
     * @Route("/espace-client")
     */
    public function PrivateSpaceAction()
    {
        return $this->render('AppBundle:PrivateSpace:private_space.html.twig', array(
            // ...
        ));
    }

}
