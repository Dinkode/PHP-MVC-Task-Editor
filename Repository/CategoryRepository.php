<?php


namespace Repository;


use Database\PDODatabase;
use DTO\CategoryDTO;

class CategoryRepository
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

    public function getAll(){
        $stm = $this->db->query('SELECT CATEGORY_ID,NAME FROM categories');
        $result = $stm->execute();
        foreach ($result->fetch(CategoryDTO::class) as $category){
            yield $category;
        }
    }
}