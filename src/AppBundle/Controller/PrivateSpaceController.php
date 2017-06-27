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


	    $userID = $this->getUser()->getId();

	    $user = $em->getRepository('AppBundle:User')
	    	->find($userID);

	    $friends = $user->getMyFriends();
	    dump($friends);

	    //M.S : small hack to remove current user and admin from list because role field is serialized ...
	    foreach ($users as $key => $value) {

	    	//TODO M.S : Filtrer les users deja friends
	    	// if (alreadyFriend($value, $friends)){
	    	// if (in_array($value, $friends, true)){
	    	// 	$users[$key]['alreadyFriend'] = true;
	    	// }

	    	if ($value->id == 1 || $value->id == $userID){
	    		unset($users[$key]);
	    	}
	    }

	    dump($users);

        return $this->render('AppBundle:PrivateSpace:private_space.html.twig', array(
			'users' => $users,
			'friends' => $friends,
        ));
	}

		private function alreadyFriend(User $currentUser, User $otherUser){

		}
}