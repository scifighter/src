<?php

function templater($template, $data) {
 $templateKeys = array_map(function($val) { return '{{'.$val.'}}';} ,
     array_keys($data));

 $processedData = array_combine($templateKeys, array_values($data));
 return strtr($template, $processedData);
}

function getSubTaskTemplate($subTask) {
    $id = $subTask['id'];
    $name = $subTask['name'];
    $hours = "subTaskHours".$subTask['hours'];
    return "
    <form action = '/' method='post' name = '".$id."' onchange=document.forms['".$id."'].submit();>
        Название подзадачи<br>
        <input value = '".$subTask['name']."' type='text' name='subTaskName'>
        <br>Количество часов<br>
        <input value = '".$subTask['hours']."' type='number' name='subTaskHours'>
        <br>
        <input type = 'submit' name='subTaskDelete' value = 'удалить'>

        <input type='hidden' name='subTaskId' value='".$id."'>
    </form>
    <br>
    ";
}

function getTask() {
    if(isset($_SESSION['task'])) {
        $task = $_SESSION['task'];
    } else {
        $task = "";
    }
    return "
        Название задачи
        <form action = '/'' method = 'post' name = 'task' onchange=document.forms['task'].submit();>
            <input type = 'text' name = 'task' value = '".$task."'>
        </form>
        <br>
    ";
}