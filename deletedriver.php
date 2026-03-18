<?php

    if (isset($_GET['id'])) {

        require('database.php');
        $db = new db();
    
        $id = $_GET['id'];
        if ($db->delete('driver', $id)) {
            header('Location: index.php');
        } else {
            die('Hiba történt az adatok törlése során!');
        }
    }

    


?>