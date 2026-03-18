<?php
if (isset($_POST['updateBtn'])) {

    require('database.php');
    $db = new db();

    $data = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'nationality' => $_POST['nationality'],
        'number' => $_POST['number'],
        'teamId' => $_POST['teamId'],
        'rookie' => isset($_POST['rookie']) ? 1 : 0
    ];
    $db->update('driver', $_GET['id'], $data);
    header('Location: index.php');
    exit;
}
