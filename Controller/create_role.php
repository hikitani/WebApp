<?php
    require "../Model/db.php";

    function prepareField($value)
    {
        return trim(strip_tags($value));
    }

    if (!empty($_POST)) {

        $data = $_POST;
        $name = prepareField($data['role_name']);
        $bg = $data['bg'];
        $id_quest = $_GET['id_quest'];

        $role = R::dispense('roles');

        $role->id_quest = $id_quest;
        $role->name = $name;
        $role->bg = $bg;
        
        R::store($role);
        header("Location: /quest_info.php?id_quest=".$id_quest);
        exit();
    }
?>