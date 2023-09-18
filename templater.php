<?php

function templater($template, $data) {
 $templateKeys = array_map(function($val) { return '{{'.$val.'}}';} ,
     array_keys($data));

 $processedData = array_combine($templateKeys, array_values($data));
 return strtr($template, $processedData);
}

// function getSubtasksTemplate($subtasks) {
//     $result = array_reduce( getSubtaskTemplate($item), $subtasks);
//     return '<div>'.$result.'</div>';
// }

// function getSubtaskTemplate($subtask) {
//     return 
//    "
//    <div>
//         $subtask->name, $subtask->hours

//     </div>
//    ";
// } 