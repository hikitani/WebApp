<?php
    /*
     * Файл авторизации
     */

    require "../Model/db.php";

    function prepareField($value)
    {
        return trim(strip_tags($value));
    }

    if (empty($_SESSION['logged_user'])) {
        header('Location: /index.php');
        exit();
    }

    if (!empty($_POST)) {
        $data = $_POST;
        $name = prepareField($data['name']);
        $description = $data['description'];
        $font = $data['font'];

        $user = $_SESSION['logged_user'];

        $quest = R::dispense('quests');
        
        $quest->name = $name;
        $quest->description = $description;
        $quest->font = $font;
        $quest->id_user = $user->id;

        R::store($quest);
        header("Location: /index.php");
        exit();
    }

?>