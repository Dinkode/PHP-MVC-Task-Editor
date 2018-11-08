<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 11/5/2018
 * Time: 9:35 PM
 */

namespace Http;


use Core\DataBinding;
use Core\Template;
use DTO\TaskDTO;
use Service\CategoryService;
use Service\TaskService;
use Service\UserService;

class TaskHttp extends HttpAbstract
{

    /**
     * @var DataBinding
     */
    private $data_binder;

    /**
     * @var Template
     */
    private $template;

    /**
     * @var TaskService
     */
    private $task_service;

    private $user_service;

    /**
     * @var \Service\CategoryService
     */
    private $category_service;

    /**
     * TaskHttp constructor.
     * @param DataBinding $dataBinder
     * @param Template $template
     * @param TaskService $task_service
     * @param UserService $user_service
     * @param CategoryService $category_service
     */
    public function __construct(DataBinding $dataBinder, Template $template,TaskService $task_service, UserService $user_service, CategoryService $category_service)
    {
        $this->data_binder = $dataBinder;
        $this->template = $template;
        $this->task_service = $task_service;
        $this->user_service = $user_service;
        $this->category_service = $category_service;
    }
    public function editTask(array $data = []){
        if($data){
            $task = $this->data_binder->bind($data, TaskDTO::class);
            $task->setTaskId($_GET['task_id']);
            $task->setUserId($_SESSION['user_id']);
            $this->task_service->edit($task);
            $this->redirect('dashboard.php');
        }else {
            try {
            $currentTask = $this->task_service->currentTask();
                if ($this->task_service->verification($currentTask->getUserId())) {
                    if ($currentTask !== null) {
                        $currentTask->setCategoryList($this->category_service->getAll());
                        $this->template->render('tasks/edit', $currentTask);
                    }
                }
            } catch (\Exception $error){
                $this->template->render('app/error', $error);
            }
        }

    }

    public function addTask(array $data = []){

        if($data){
            $task = $this->data_binder->bind($data, \DTO\TaskDTO::class);
            $task->setUserId((int)$_SESSION['user_id']);
            if($this->task_service->addTask($task)!==null){
                $this->redirect('dashboard.php');
            }else{
                $this->redirect('login.php');
            };
        }else {
            $data = new \DTO\TaskDTO();
            $data->setCategoryList($this->category_service->getAll());
            $this->template->render('tasks/add', $data);
        }
    }

    public function dashboard(){
        $user = $this->user_service->get_current();
        if(!$user){
            $this->redirect('login.php');
        }

        $data = $this->task_service->getList($user->getUserId());
        $this->template->render('tasks/index',$data);
    }

    public function delete(array $data)
    {
        try {
            $currentTask = $this->task_service->currentTask();
            if ($this->task_service->verification($currentTask->getUserId())) {
                $this->task_service->delete($data['task_id']);
                $this->redirect('dashboard.php');
            }
        } catch (\Exception $error){
            $this->template->render('app/error', $error);
        }
    }

}