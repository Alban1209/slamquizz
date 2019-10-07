<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/", name="default")
     */

class DefaultController extends AbstractController
{
    /**
     * @Route("index", name="index")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    /**
     * @Route("user", name="user")
     */
    public function user()
    {
        $usersList = array();

        $usersList[0]['first_name'] = 'Crystal';
        $usersList[0]['last_name'] = 'E. Everns';

        $usersList[1]['first_name'] = 'Erevans';
        $usersList[1]['last_name'] = 'Leonherd';
    
        return $this->render('user/user.html.twig', [
            'users_list' => $usersList,
        ]);
    }

}
