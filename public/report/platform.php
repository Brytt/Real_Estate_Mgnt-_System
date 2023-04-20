<?php
// include 'controller.php';

    switch($trigger){

        //The route when the add button is clicked 
        case md5('property'):
            include 'propertyreport/platform.php';
        break;

        case md5('staff'):
         include 'staffreport/platform.php';
        break;

        case md5('cleint'):
        include 'clientreport/platform.php';
       break;

       case md5('clientpayreport'):
        include 'clientpayreport/platform.php';
       break;

       case md5('landreport'):
        include 'landreport/platform.php';
       break;

       case md5('quotationreport'):
        include 'quotationreport/platform.php';
       break;

       case md5('apartmentreport'):
        include 'apartmentreport/platform.php';
       break;
       case md5('paymentreport'):
        include 'paymentreport/platform.php';
       break;

       case md5('incomereport'):
        include 'incomereport/platform.php';
       break;

        case md5('expenditurereport'):
        include 'expenditurereport/platform.php';
        break;

      case md5('capacity'):
       include 'capacityreport/platform.php';
      break;

     case md5('inspectionreport'):
      include 'inspectionreport/platform.php';
     break;

      
    }