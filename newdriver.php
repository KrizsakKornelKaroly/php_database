<?php
if (isset($_POST['saveBtn'])) {

    include 'database.php';
    $db = new db();
    
    $data = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'nationality' => $_POST['nationality'],
        'number' => $_POST['number'],
        'teamId' => $_POST['teamId'],
        'rookie' => isset($_POST['rookie']) ? 1 : 0
    ];

    if ($db->insert('driver', $data)) {
        header('Location: index.php');
    } else {
        die('Hiba történt az adatok mentése során!');
    }

} else {
    header('Location: index.php');
}

?>
