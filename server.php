<?php

// Recupero il contenuto di 'tasks.json'
$tasksArray = file_get_contents('tasks.json');

header('Content-Type: application/json');

echo $tasksArray;
