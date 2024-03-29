<?php

// Recupero il contenuto di 'tasks.json'
$tasksArray = file_get_contents('tasks.json');

// Trasformo l'array json in array associativo per modificarlo in php
$tasksArrayList = json_decode($tasksArray, true);

// Funzione di aggiunta oggetti
if (isset($_POST['item'])) {

    $todoItem = [
        'task' => $_POST['item'],
        'done' => false,
    ];

    // Inserisco l'oggetto nell'array
    array_push($tasksArrayList, $todoItem);

    // Inserisco i dati facendoli salvare con la funzione file_put_content
    // e poi ri utilizzo json_encode per riportare l'oggetto al formato json
    file_put_contents('tasks.json', json_encode($tasksArrayList));
}

// Funzione che elimina gli oggetti
if (isset($_POST['deleteIndex'])) {

    // Rimuovo l'oggetto nell' array
    unset($tasksArrayList[$_POST['deleteIndex']]);

    // Inserisco i dati facendoli salvare con la funzione file_put_content
    // e poi ri utilizzo json_encode per riportare l'oggetto al formato json
    file_put_contents('tasks.json', json_encode($tasksArrayList));
}

// Funzioni di toggle per cambiare lo status
if (isset($_POST['toggleIndex'])) {

    // Inserisco l'index in una variabile
    $index = $_POST['toggleIndex'];

    // Recupero il valore della chiave done in posizione index
    // e gli applico la condizione
    if ($tasksArrayList[$index]['done'] = true) {

        $tasksArrayList[$index]['done'] = false;
    } else {
        $tasksArrayList[$index]['done'] = true;
    }


    // Inserisco i dati facendoli salvare con la funzione file_put_content
    // e poi ri utilizzo json_encode per riportare l'oggetto al formato json
    file_put_contents('tasks.json', json_encode($tasksArrayList));
}


// Applico la funzione header per la lettura del contenuto
header('Content-type: application/json');

// Trasformo l'array in un oggetto
echo json_encode($tasksArrayList);
