<?php
include 'controller.php';

    switch($option){

        //The route when the add button is clicked 
        case md5('add'):
            include 'views/add.php';
        break;

        case md5('details'):
            include 'views/details.php';
        break;

        case md5('edit'):
            include 'views/edit.php';
        break;

        case md5('password'):
            include 'views/password.php';
        break;

        //Default route 
        default:
            include 'views/list.php';
        break;
    }
    include 'model/js.php';