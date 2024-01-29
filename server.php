<?php

// Recupero il contenuto di 'tasks.json'
$tasksArray = file_get_contents('tasks.json');

// Applico la funzione header per la lettura del contenuto
header('Content-Type: application/json');

// Invio i dati in forma json
echo $tasksArray;
