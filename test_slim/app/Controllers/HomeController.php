<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.11.2016
 * Time: 3:05
 */

namespace App\Controllers;
//use Slim\Containers;
use App\Models\User;
use Slim\Views\Twig as View;

class HomeController extends  Controller
{

    public function index($request, $response)
    {
        echo " тут работает ";
       /*
        * тестировал работу с бдw
        *
         
        $user = $this->db->table('users')->find(1);
        var_dump($user->email);*/
        $user = User::create([
            'name' => 'Alex olol',
            'email' => 'alex@ya.ru',
            'password' => '23e4',
        ]);
        
        //echo 'home twig';
       // $template = 'home.twig';
        return $this->view->render($response, 'home.twig');
    }
}