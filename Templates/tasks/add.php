<?php /** @var \DTO\TaskDTO $data  */ ?>
<h1>Add new task</h1>
<form method="post">
    Title: <input type="text" name="title"><br>
    Category: <select name="category_id">
        <option></option>
        <?php
        foreach ($data->getCategoryList() as $category){
            /** @var \DTO\CategoryDTO $category */

            //$selected = $category->getCatId()===$data->getCategoryId()?'selected':'';
            echo "<option value=\"{$category->getCategoryId()}\">{$category->getName()}</option>";
        }
        ?>
    </select><br>
    Description: <input type="text" name="description"><br>
    Location: <input type="text" name="location"><br>
    Started on: <input type="text" name="started_on"><br>
    Due date: <input type="text" name="due_date"><br>
    <input type="submit" name="add" value="save">

</form>