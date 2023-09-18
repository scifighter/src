<?php

// Формат хранения в session

// $_SESSION['task'] - храним название таски

// $_SESSION['subtasks'] - массив подзадач, содержит объект с названием подзадачи и количеством часов

/*

subtasks

id => uniq
name => string
hours => number

<ul>
    <li>
        input value="subtask[0]=>name"
        subtaskName, 
    </li>

*/

function session_addTask ($taskName) {
    $_SESSION['task'] = $taskName;
}

function session_addSubTask() {
    $id = uniqid();
    $subTask = array(
        "id" => $id,
        "name" => "name",
        "hours" => 1,
    );
    $_SESSION['subtasks'][] = $subTask;
}

function session_getTask(): string {
    if ($_SESSION['task']) {
        return $_SESSION['task'];
    }
    return '---';
}

function session_getSubTasks() {
    if($_SESSION['subtasks']) {
        $subTasks = "";
        foreach($_SESSION['subtasks'] as $value) {
            $subTask = getSubTaskTemplate($value);
            $subTasks .= $subTask;
        }
        return $subTasks;
    }
}

function session_getSubTaskTemplate($subTask) {
    $id = $subTask['id'];
    $name = $subTask['name'];
    $hours = $subTask['hours'];
    return "
    <form action = '/' method='post'>
        <input type='text' placeholder='".$name."' name='subtaskName' onchange=''>

        <input type='text' placeholder='".$hours."' name='subtaskHours' onchange=''>

        <input type='submit' value='delete' name='subtaskDelete".$id."'>
    </form>
    ";
}

function session_editTask () {

}

function session_editSubTask () {

}

function session_deleteTask () {

}

function session_deleteSubTask () {

}