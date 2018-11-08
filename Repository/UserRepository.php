<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 11/5/2018
 * Time: 6:58 PM
 */

namespace Repository;


use Database\PDODatabase;
use DTO\UserDTO;

class UserRepository
{

    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }


    public function insert(UserDTO $user)
    {
        $stm = $this->db->query('INSERT INTO users (USERNAME,PASSWORD,FIRST_NAME,LAST_NAME)
                                          VALUES (:username, :password, :first_name, :last_name)');
        $stm->execute([
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName()
            ]);

        return $this->db->lastInsertId();
    }

    public function check(string $username): UserDTO{
        $stm = $this->db->query('SELECT USER_ID,USERNAME,FIRST_NAME,LAST_NAME,PASSWORD FROM users WHERE USERNAME = :username');
        $result = $stm->execute(['username'=>$username]);
        return $result->fetch(UserDTO::class)->current();

    }

    public function getOne(int $user_id)
    {
        $stm = $this->db->query('SELECT USER_ID,USERNAME,FIRST_NAME,LAST_NAME FROM users WHERE USER_ID = :user_id');
        $result = $stm->execute(['user_id'=>$user_id]);
        return $result->fetch(UserDTO::class)->current();
    }

}