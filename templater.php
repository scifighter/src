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
    $hours = $subTask['hours'];
    return "
    <form action = '/' method='post'>
        <input type='text' placeholder='".$name."' name='subtaskName' onchange=''>

        <input type='text' placeholder='".$hours."' name='subtaskHours' onchange=''>

        <input type='submit' value='delete' name='subtaskDelete".$id."'>
    </form>
    ";
}