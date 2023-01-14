<?php


namespace admin\controllers;

use engine\Controller;
use engine\DI\DI;
use engine\core\authorization\Auth;
use engine\core\database\QueryBuilder;

// контроллер для входа в админку
class LoginController extends Controller
{

    protected $auth;

    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();


        // авторизация из куки
        if($this->auth->hashUser() !== NULL){
            header('Location: /admin/');
            exit;
        }

    }


    // метод рендера страницы авторизации
    public function form(){
        $this->view->render('login');
    }


    public function authAdmin(){

        $params = $this->request->post;

        $queryBuilder = new QueryBuilder();
        $sql = $queryBuilder
            ->select()
            ->from('user')
            ->where('email', $params['email'])
            ->where('password', md5($params['password']))
            ->limit(1)
            ->sql();

        $query = $this->db->query($sql, $queryBuilder->values);


        if(!empty($query)){

            $user = $query[0];

            if($user['role'] == 'admin'){

                $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->auth->salt());

                $sql = $queryBuilder
                    ->update('user')
                    ->set(['hash' => $hash])
                    ->where('id', $user['id'])
                    ->sql();
                $this->db->execute($sql, $queryBuilder->values);

                $this->auth->login($hash);

                header('Location: /admin/login/');


            }

        }

    }


}