<?php /** @var \DTO\TaskDTO[] $data */ ?>
<a href="add.php">Add new task</a> | <a href="logout.php">Logout</a>
<table border="1">
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($data as $task): ?>
        <tr>
            <td><?=$task->getTitle()?></td>
            <td><?=$task->getCategoryName()?></td>
            <td><?=$task->getUsername()?></td>
            <td><a href="edit.php?task_id=<?=$task->getTaskId()?>">edit</a></td>
            <td><a href="delete.php?task_id=<?=$task->getTaskId()?>">delete</a></td>

        </tr>
    <?php endforeach;?>
</table>