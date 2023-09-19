<?php

function session_addTask ($taskName) {
    $_SESSION['task'] = $taskName;
}

function session_addSubTask() {
    $subTask = array(
        "id" => uniqid(),
        "name" => NULL,
        "hours" => NULL,
    );
    $_SESSION['subtasks'][$subTask['id']] = $subTask;
}

function session_saveSubTask($subTask) {
    if ($_SESSION['subtasks']) {
        echo "The 'first' element is in the array";
    }
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