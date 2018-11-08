<?php /** @var \DTO\TaskDTO $data  */ ?>
<h1>Edit task</h1>
<form method="post">
    Title: <input type="text" name="title" value="<?=$data->getTitle()?>"><br>
    Category: <select name="category_id">
        <option></option>
        <?php
        foreach ($data->getCategoryList() as $category){
            /** @var \DTO\CategoryDTO $category */

            $selected = $category->getCategoryId()===$data->getCategoryId()?'selected':'';
            echo "<option value=\"{$category->getCategoryId()}\" {$selected}>{$category->getName()}</option>";
        }
        ?>
    </select><br>
    Description: <input type="text" name="description" value="<?=$data->getDescription()?>"><br>
    Location: <input type="text" name="location" value="<?=$data->getLocation()?>"><br>
    Started on: <input type="text" name="started_on" value="<?=$data->getStartedOn()?>"><br>
    Due date: <input type="text" name="due_date" value="<?=$data->getDueDate()?>"><br>
    <input type="submit" name="edit" value="save">

</form>