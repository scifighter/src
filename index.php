<?php
require_once('store.php');
require_once('templater.php');

$testVar = 'Hello world';
$templateFile = 'view.html';

if (isset($_POST['addSubtask'])) {
    addSubTask();
}

if (isset($_POST['reset'])) {
    unset($_SESSION['task']);
    unset($_SESSION['subtasks']);
    header('Location: index.php');
}

if (isset($_POST['subTaskName'])) {
     $_SESSION['subtasks'][$_POST['subTaskId']]['id'] = $_POST['subTaskId'];
     $_SESSION['subtasks'][$_POST['subTaskId']]['name'] = $_POST['subTaskName'];
}

if (isset($_POST['subTaskHours'])) {
    $_SESSION['subtasks'][$_POST['subTaskId']]['id'] = $_POST['subTaskId'];
    $_SESSION['subtasks'][$_POST['subTaskId']]['hours'] = $_POST['subTaskHours'];
}

if (isset($_POST['subTaskDelete'])) {
    unset($_SESSION['subtasks'][$_POST['subTaskId']]);
}

if (isset($_POST['task'])) {
    $_SESSION['task'] = $_POST['task'];
}
if($_SESSION['subtasks'] == NULL || !$_SESSION['subtasks']){
    addSubTask();
}
$html = file_get_contents($templateFile, true);
echo (templater($html, [
    'subtasks' => getSubTasks(),
    'task' => getTask(),
]));