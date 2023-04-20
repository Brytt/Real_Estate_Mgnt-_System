<?php
include 'controller.php';

    switch($option){

        case md5('add'):
            include 'views/add.php';
        break;

        case md5('details'):
            include 'views/details.php';
        break;

        case md5('land_purchase'):
            include 'views/land_purchase.php';
        break;

        case md5('land_details'):
            include 'views/land_details.php';
        break;

        case md5('rent_details'):
            include 'views/rent_details.php';
        break;

        case md5('apartment_rental'):
            include 'views/apartment_rental.php';
        break;
        
        case md5('client_rent'):
            include 'views/client_rent.php';
        break;
        case md5('rent_payment'):
            include 'views/rent_payment.php';
        break;
        case md5('client_landlist'):
            include 'views/client_landlist.php';
        break;
        

        case md5('land_payment'):
            include 'views/land_payment.php';
        break;

        case md5('client_landlist'):
            include 'views/client_landlist.php';
        break;
        

        case md5('payment'):
            include 'views/payment.php';
        break;

        case md5('edit'):
            include 'views/edit.php';
        break;
        
        case md5('edit_land'):
            include 'views/edit_land.php';
        break;
        
        case md5('edit_rent'):
            include 'views/edit_rent.php';
        break;

        //Default route 
        default:
            include 'views/list.php';
        break;
    }

    include 'model/js.php';