<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 11/5/2018
 * Time: 9:36 PM
 */

namespace Service;


use Repository\TaskRepository;

class TaskService
{

    /**
     * @var TaskRepository
     */
    private $task_repository;

    /**
     * TaskService constructor.
     * @param TaskRepository $task_repository
     */
    public function __construct(TaskRepository $task_repository)
    {
        $this->task_repository = $task_repository;
    }

    public function currentTask(): \DTO\TaskDTO{
        if(isset($_GET['task_id'])){
            $currentTask = $this->task_repository->getById($_GET['task_id']);
            if ($currentTask){
                return $currentTask;
            }
            throw new \Exception('No such task!');
        }
        throw new \Exception('No task ID!');
    }

    public function edit(\DTO\TaskDTO $DTO){
        $this->task_repository->update($DTO);
    }

    public function getList(int $user_id){
        return $this->task_repository->getAll($user_id);
    }

    public function delete(?int $task_id)
    {
        if ($task_id===null){
            throw new \Exception('No task id');
        }
        $this->task_repository->delete($task_id);
    }

    public function addTask(\DTO\TaskDTO $taskDTO):?  int{
        if(!isset($_SESSION['user_id'])){
           return null;
        }
        return $this->task_repository->insert($taskDTO);
    }
    public function verification($autorId){
        if(isset($_SESSION['user_id']) && ($_SESSION['user_id']===$autorId)){
            return true;
        }
        throw new \Exception('You are not verified!');
    }
}