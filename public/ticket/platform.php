<?php
 include "controller.php";

switch($option){


case md5('add'):
include "views/add.php";
break;

case md5('details'):
include "views/details.php";
break;

case md5('edit'):
    include "views/edit.php";
    break;

default:
include('views/list.php');
break;

}


?>