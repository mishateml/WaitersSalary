<?php


namespace App\controllers;

use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use League\Plates\Engine;
use PDO;
use App\controllers\DbController;


class HomeController
{


    private $view;
    private $queryFactory;
    private $pdo;
    /**
     * @var \App\controllers\DbController
     */
    private $dbc;


    public function __construct(Engine $view, QueryFactory $queryFactory,PDO $pdo, DbController $dbc)
    {
        $this->view = $view;
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
        $this->dbc = $dbc;
    }

    public  function login()
    {

        $db = $this->pdo;
        $auth = new Auth($db);

        if($_POST['email'] && $_POST['password']){

            try {
                $auth->login($_POST['email'], $_POST['password']);

                header("Location: /sgira");
                die();            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                die('Wrong email address');
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Wrong password');
            }
            catch (\Delight\Auth\EmailNotVerifiedException $e) {
                die('Email not verified');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }

        echo $this->view ->render('login');      return;
    }

    public  function register()
    {
        $db = $this->pdo;
        $auth = new Auth($db);
        if($_POST['password']!=$_POST['confirm'] )
        {
            dd ("wrong password canform");
        }
        if($_POST['email'] && $_POST['password'] ){

            try {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $uname =  $_POST['name'];
                $userId = $auth->register($email, $password, $uname);

                $this->dbc->setUsersIdMailUsername ($userId,$email,$uname);
                echo '<script>window.location.href = "/login";</script>';
                exit();
            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                die('Invalid email address');
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Invalid password');
            }
            catch (\Delight\Auth\UserAlreadyExistsException $e) {
                die('User already exists');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }

        }
        echo $this->view->render('register', ['name' => 'Jonathan']);      return;


    }

    public  function  sgira(){
        if (!$this->dbc->loginCheck ()){
    $this->dbc->logOut ();
        }
        if($_POST['cash']){

            $name = $_POST['name'];
            $when = $_POST['when'];
            $hours = $_POST['hours'];
            $cash = $_POST['cash'];
            $creditCard = $_POST['creditCard'];

            $_POST['count'] = 2;
            unset($_POST);
//            dd ($_POST);
            $this->dbc->enterOneData ($name, $when, $hours, $cash, $creditCard);

        }

        $namesArray = $this->dbc->getNamesArray ();
//        dd ($namesArray);
        echo $this->view->render('sgira', ['names' => $namesArray ]);      return;

    }

    public  function  test(){
        if (!$this->dbc->loginCheck ()){
            $this->dbc->logOut ();
        }

        if ($_GET['logout']){
            $this->dbc->logOut ();
        }
        $data =$this->dbc->getInfoByDate ();
        echo $this->view->render('data', ['data'=> $data]);      return;

    }
}