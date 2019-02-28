<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08/01/2019
 * Time: 09:38
 */

namespace App\controllers;


use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use PDO;

class DbController
{
    private $queryFactory;
    private $pdo;


    public function __construct (QueryFactory $queryFactory, PDO $pdo)
{
    $this->queryFactory = $queryFactory;
    $this->pdo = $pdo;
}

    public function setUsersIdMailUsername($id, $email, $username){

        $insert = $this->queryFactory->newInsert();

        $insert->into('id_uname_email')             // insert into this table
        ->cols([                     // insert these columns and bind these values
            'id' => $id,
            'username' => $username,
            'email' => $email,
        ]);

        $sth = $this->pdo->prepare($insert->getStatement());

// execute with bound values
        $sth->execute($insert->getBindValues());

        }

    public function getNamesArray()
    {
        $select = $this->queryFactory->newSelect();
        $select->cols (['username']);
        $select->from ('users');
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetchAll(PDO::FETCH_COLUMN);
        return $result;

    }

    function searchForNameById($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['id'] === $id) {
                return $array[$key]['username'];
            }
        }
        return null;
    }

    public function getIdByName ($name)
    {
        $select = $this->queryFactory->newSelect();

        $select->cols(['id'])
             ->from ('users')
            -> where ('username = :zim')
            ->bindValue ('zim',$name);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());

        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $result = array_values ($result)[0];
        return intval ($result);
    }

    public function getNameById ($id)
    {
        $select = $this->queryFactory->newSelect();

        $select->cols(['username'])
             ->from ('users')
            -> where ('id = :zim')
            ->bindValue ('zim',$id);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());

        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $result = array_values ($result)[0];
        return $result;
    }

    public function getNameIdArray ($id)
    {
        $select = $this->queryFactory->newSelect();

        $select->cols(['id','username'])
             ->from ('users');


        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
//        dd ($result);

        $result = $this->searchForNameById ($id,$result);
        return $result;
    }

    public function getInfoByDate ()
    {
        $sth = $this->pdo->query(
            'SELECT i.date ,
                              i.cashTip,
                               i.workHours,
                               i.cashTip,
                               i.creditTip,
                               i.`when`,
                               u.username
                               FROM `info` i left join users u on   i.id = u.id 
                               where DATE(i.date) = CURDATE()');
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
//          dd ($result);
        return $result;
    }

    public function enterOneData ($name, $when, $hours, $cash, $card )
    {
     $id = $this->getIdByName ($name);
//    bild query
        $insert = $this->queryFactory->newInsert();
        $insert->into('info')             // insert into this table
        ->cols([                     // insert these columns and bind these values
            'id' => $id,
            'workHours' => $hours,
            'cashTip' => $cash,
            'creditTip' => $card,
            'when' => $when
        ]);

        $sth = $this->pdo->prepare($insert->getStatement());

// execute with bound values
        $sth->execute($insert->getBindValues());

    }


    public function logOut(){
        $db = $this->pdo;
        $auth = new Auth($db);
        $auth->logOut ();
        header("Location: /");
        die();
    }

    public function loginCheck(){
        $db = $this->pdo;
        $auth = new Auth($db);
        return $auth->check ();
    }

}

