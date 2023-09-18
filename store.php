<?php
session_start();
$current_data_store = 'session'; // variants - cookie, session, db, txt

require_once('./storages/cookie.php');
require_once('./storages/session.php');

function getFuncName($store, $action) {
    return $store.'_'.$action;
}

/* Create */
function addTask($taskName)
{
    global $current_data_store;
    $func = getFuncName($current_data_store, 'addTask');
    $func($taskName);
}

function addSubTask()
{
    global $current_data_store;
    $func = getFuncName($current_data_store, 'addSubTask');
    return $func();
}

/* Read */
//function getTask(): string
// {
//     global $current_data_store;
//     $func = getFuncName($current_data_store, 'getTask');
//     return $func();
// }

function getSubTasks()
{
    global $current_data_store;
    $func = getFuncName($current_data_store, 'getSubTasks');
    return $func();
}

function getSubTaskTemplate($subTask)
{
    global $current_data_store;
    $func = getFuncName($current_data_store, 'getSubTaskTemplate');
    return $func($subTask);
}

/* Update */
function editTask()
{

}

function editSubTask()
{

}

/* Delete */
function deleteTask()
{

}

function deleteSubTask()
{

}