<?php

// Recupero il contenuto di 'tasks.json'
$tasksArray = file_get_contents('tasks.json');

$tasksArrayList = json_decode($tasksArray);

if (isset($_POST['item'])) {

    $todoItem = [
        'task' => $_POST['item'],
        'done' => false,
    ];

    array_push($tasksArrayList, $todoItem);

    file_put_contents('tasks.json', json_encode($tasksArrayList));
}

// Applico la funzione header per la lettura del contenuto

header('Content-type: application/json');
echo json_encode($tasksArrayList);
