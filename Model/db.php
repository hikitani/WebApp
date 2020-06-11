<?php 
    require($_SERVER['DOCUMENT_ROOT'].'/libs/rb.php');

    R::setup( 'mysql:host=localhost;dbname=quests',
        'root', '' ); //for both mysql or mariaDB

    session_start();
?>