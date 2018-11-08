<?php

include 'common.php';
$category_repository = new \Repository\CategoryRepository($db);
$category_service = new \Service\CategoryService($category_repository);
$task_repository = new \Repository\TaskRepository($db);
$task_service = new \Service\TaskService($task_repository);
$user_repository = new \Repository\UserRepository($db);
$user_service = new \Service\UserService($user_repository);
$task = new \Http\TaskHttp($data_binder, $template,$task_service,$user_service, $category_service);
$task->dashboard();