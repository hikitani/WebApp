<?php
    require "../Model/db.php";

    function prepareField($value)
    {
        return trim(strip_tags($value));
    }

    if (!empty($_POST)) {

        $data = $_POST;
        $role = R::load('roles', $data['id_role']);

        $role->page = $data['page'];
        
        R::store($role);
        header("Location: /quest_info.php?id_quest=".$data['id_quest']);
        exit();
    }
?>