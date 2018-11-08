<?php
/**
 * Created by PhpStorm.
 * User: Design
 * Date: 6.11.2018 г.
 * Time: 17:15
 */

namespace Service;


class CategoryService
{
    /**
     * @var \Repository\CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     * @param \Repository\CategoryRepository $categoryRepository
     */
    public function __construct(\Repository\CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function getAll():\Generator{
        return $this->categoryRepository->getAll();
    }

}