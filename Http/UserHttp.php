<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 11/5/2018
 * Time: 8:51 PM
 */

namespace Http;


use Core\DataBinding;
use Core\Template;
use DTO\UserDTO;
use Service\UserService;

class UserHttp extends HttpAbstract
{

    /**
     * @var UserService
     */
    private $user_service;

    /**
     * @var DataBinding
     */
    private $data_binder;

    /**
     * @var Template
     */
    private $template;

    /**
     * UserHttp constructor.
     * @param UserService $user_service
     * @param Template $template
     * @param DataBinding $data_binder
     */
    public function __construct(UserService $user_service,Template $template, DataBinding $data_binder)
    {
        $this->user_service = $user_service;
        $this->template = $template;
        $this->data_binder = $data_binder;
    }


    /**
     * @param array $data
     * @throws \Exception
     */
    public function register(array $data = []){

        if($data) {
            $user = $this->data_binder->bind($data, UserDTO::class);
            $this->user_service->register($user,$data['confirm_password']);
            $this->redirect('login.php');
        }else{
            $this->template->render('users/register');
        }
    }

    public function login(array $data)
    {
        if($data){
            try {
                $user_id = $this->user_service->login($data['username'], $data['password']);
                $_SESSION['user_id'] = $user_id;
                $this->redirect('dashboard.php');
            } catch (\Exception $error){
                $this->template->render('users/login');
                $this->template->render('app/error', $error);
            }
        }else{
            $this->template->render('users/login');
        }
    }


}