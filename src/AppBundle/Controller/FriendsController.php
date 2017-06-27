<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;


class FriendsController extends Controller
{
	/**
	* @Route("/add-to-friend/{id}")
	*/
	public function AddFriendAction($id, EntityManagerInterface $em)
	{
    	$friend = $em->getRepository('AppBundle:User')
	        ->find($id);

	    $userID = $this->getUser()->getId();

	    $user = $em->getRepository('AppBundle:User')
	    	->find($userID);
	    
	    $test = $user->addMyFriend($friend);

	    $em->flush();

	    //M.S : TODO SYSTEME D'URL DEV/PROD avec $this->generateUrl('blog_show', array('slug' => 'slug-value'));

        return new Response(
            '<html>
	            <body>
	            	<p>'.$friend->getUsername().' ajouté à votre liste d\'ami</p>
	            	<p><a href="/app_dev.php/espace-client">Revenir dans votre espace</a></p>
	            </body>
            </html>'
        );
	}

	/**
	* @Route("/delete-from-friends/{id}")
	*/
	public function DeleteFriendAction($id, EntityManagerInterface $em)
	{
    	$friend = $em->getRepository('AppBundle:User')
	        ->find($id);

	    $userID = $this->getUser()->getId();

	    $user = $em->getRepository('AppBundle:User')
	    	->find($userID);
	    
	    $test = $user->removeMyFriend($friend);

	    $em->flush();

	    //M.S : TODO SYSTEME D'URL DEV/PROD avec $this->generateUrl('blog_show', array('slug' => 'slug-value'));

        return new Response(
            '<html>
	            <body>
	            	<p>'.$friend->getUsername().' supprimé de votre liste d\'ami</p>
	            	<p><a href="/app_dev.php/espace-client">Revenir dans votre espace</a></p>
	            </body>
            </html>'
        );
	}
}
