<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 11/5/2018
 * Time: 6:52 PM
 */

namespace DTO;


class TaskDTO
{

    /**
     * @var int
     */
    private $task_id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $location;

    /**
     * @var int
     */
    private $user_id;

    /**
     * @var int
     */
    private $category_id;

    /**
     * @var \datetime
     */
    private $started_on;

    /**
     * @var \datetime
     */
    private $due_date;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $category_name;

    /**
     * @var \Generator
     */
    private $categoryList;


    public function getCategoryList()
    {
        return $this->categoryList;
    }

    /**
     * @param array $categoryList
     */
    public function setCategoryList($categoryList)
    {
        $this->categoryList = $categoryList;
    }




    /**
     * @return int
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * @param int $task_id
     */
    public function setTaskId($task_id)
    {
        $this->task_id = $task_id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return \datetime
     */
    public function getStartedOn()
    {
        return $this->started_on;
    }

    /**
     * @param \datetime $started_on
     */
    public function setStartedOn($started_on)
    {
        $this->started_on = $started_on;
    }

    /**
     * @return \datetime
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param \datetime $due_date
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
    }


    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * @param string $category_name
     */
    public function setCategoryName($category_name): void
    {
        $this->category_name = $category_name;
    }


}