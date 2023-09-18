<?php
require_once('store.php');
require_once('templater.php');

$testVar = 'Hello world';
$templateFile = 'view.html';


if (!isset($_SESSION['subtasks'])) {
    addSubTask();
}

if (isset($_POST['reset'])) {

    unset($_SESSION['task']);
    unset($_SESSION['subtasks']);
    header('Location: index.php');

}

if (isset($_POST['addSubtask'])) {
    addSubTask();
}

$html = file_get_contents($templateFile, true);
echo (templater($html, [
    //'testVar' => $testVar,
    //'currentTask' => $currentTask,
    'subtasks' => getSubTasks()
]));