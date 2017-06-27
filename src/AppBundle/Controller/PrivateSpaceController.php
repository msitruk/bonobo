<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class PrivateSpaceController extends Controller
{
    /**
     * @Route("/espace-client")
     */
	public function PrivateSpaceAction(EntityManagerInterface $em)
	{
		$repository = $em->getRepository('AppBundle:User');

	    $users = $repository->findAll();

	    //M.S : small hack to remove admin from list because role field is serialized ...
	    foreach ($users as $key => $value) {
	    	if ($value->id == 1){
	    		unset($users[$key]);
	    	}
	    }

	    $userID = $this->getUser()->getId();

	    $user = $em->getRepository('AppBundle:User')
	    	->find($userID);

	    $friends = $user->getMyFriends();
	    dump($friends);

        return $this->render('AppBundle:PrivateSpace:private_space.html.twig', array(
			'users' => $users,
			'friends' => $friends,
        ));
	}

}


/*
    {% for friend in friends %}
        <li>{{ friend.username|e }}</li>
    {% endfor %}
*/