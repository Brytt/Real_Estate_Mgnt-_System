<?php
include 'public/layouts/header.php';
?>

<form name="myform" id="myform" method="post" action="#" data-toggle="validator" role="form"
    enctype="multipart/form-data" autocomplete="off">
    <input id="view" name="view" value="" type="hidden" />
    <input id="pg" name="vpgiewpage" value="" type="hidden" />
    <input id="option" name="option" value="" type="hidden" />
    <input id="viewpage" name="viewpage" value="" type="hidden" />
    <input id="class_call" name="class_call" value="" type="hidden" />
    <input id="keys" name="keys" value="<?php echo (!empty($keys)?$keys:'VICTOR') ;?>" type="hidden" />

    <?php


include 'public/layouts/top_nav.php'; 
include 'public/layouts/side_bar.php'; 

   //edit dropdown Array
   
   //edit dropdown Array
   $system_month = ['1'=>"January", '2'=>"February", '3'=>"March", '4'=>"April", '5'=>"May", '6'=>"June", '7'=>"July",'8'=>"August", '9'=>"September", '10'=>"October", '11'=>"November", '12'=>"December"];
   
   $system_month_short = ['1'=>"Jan", '2'=>"Feb", '3'=>"Mar", '4'=>"Apr", '5'=>"May", '6'=>"Jun", '7'=>"Jul",'8'=>"Aug", '9'=>"Sep", '10'=>"Oct", '11'=>"Nov", '12'=>"Dec"];


   $system_payment_plan = ['7'=>"WEEKLY", '30'=>"MONTHLY", '90'=>"QUATERLY", '180'=>"HALF-YEARLY", '360'=>"ANNUALLY"];

   $system_staff_type = ['1'=>"Executive", '2'=>"Manager", '3'=>"Engineer", '4'=>"Agent", '5'=>"Administrative", '6'=>'Artisan', '7'=>'Others'];

   $system_payment_term = ['outright','installment'];

   $system_default_password = "royalkingdom";




   $system_religion = array("Christian", "Islam", "Traditonal", "Others");
   $system_user_type = array("Administrator", "Executive User", " Manager", "User");
   $system_gender = array("male", "female");
   $system_marital_status = array("married", "single", "divorced", "widowed", "separated");
   $system_staff_category = array("Teaching", "Non-Teaching");
   $system_region = array("Accra", "Ashanti", "Eastern", "Ahafo", "Central", "Northern", "Western", "Savannah" );
   $system_district = array("Madina", "Tafo", "Afigya Kwabre", "Asuogyaman", "Ejisu");
   $system_rank = array("Director-General", "Dep. Director-General", "Director I", "Director II", "Dep. Director", "Asst. Director I", "Asst. Director II", "Prin. Superintendent", "Senior Supt. I", "Senior Supt. II", "Superintendent I", "Superintendent II", "Supervisor Instructor", "Principal Technical Instructor", "Snr. Technical Instructor", " Technical Instructor I", "Technical Instructor II", "Snr. Craft instructor", "Pupil Teacher WASSCE/GCE 'A' Level", "Trainee Teacher", "Craft Instructor", "Pupil Teacher! GCE '0' Level");
   $system_location_type = array("Urban", "Semi-Urban", "Rural", "Semi-Rural");
   $system_term = array("First", "Second", "Third");
   $system_school_level = array("K.G", "K.G and Primary", "Primary", "Primary and JHS", "K.G, Primary and JHS", "JHS", "SHS", "SHTS", "TVET", "Special");
   $system_class = array("K.G 1", "K.G 2", "Primary 1", "Primary 2", " Primary 3", " Primary 4", " Primary 5", " Primary 6","JHS 1", "JHS 2", "JHS 3", "SHS 1", "SHS 2", "SHS 3");

   $system_title = array("Mr.","Mrs.","Miss","Prof.","Dr.","Rev.","Others.");

   $system_next_of_kin_relationship = array("AUNT", "UNCLE", "BROTHER", "SISTER", "COUSIN", "FATHER", "MOTHER", "SON", "DAUGHTER", "WIFE", "HUSBAND", "NEPHEW", "NIECE", "GRANDPARENT", "GRANDCHILD", "FRIEND");

   $system_gender = array("Male", "Female");
   $system_prop_type = array("Land", "Apartment");

   $system_inspection_status=['0'=>'<span class="badge badge-danger"> Pending Inspection </span>',
   '1'=>'<span class="badge badge-success">Inspected</span>',
   '2'=>'<span class="badge badge-warning">New Inspection</span>',
   '3'=>'<span class="badge badge-danger"> Cancelled </span>'];

   $system_ticket_status=['0'=>'<span class="badge badge-danger"> Deleted </span>',
'2'=>'<span class="badge badge-danger">Ticket Closed</span>',
'1'=>'<span class="badge badge-success">Ticket Opened</span>'];

$system_property_status=[
'0'=>'<span class="badge badge-danger">Not Available</span>',
'1'=>'<span class="badge badge-success">Available</span>'];

$system_Rent_status=[' '=>'<span class="badge badge-danger"> Deleted </span>',
'1'=>'<span class="badge badge-primary">Available</span>',
'2'=>'<span class="badge badge-primary">Occupied</span>',
'3'=>'<span class="badge badge-danger">Check-out</span>',];
   

$system_payment_status=['0'=>'<span class="badge badge-danger"> Deleted </span>',
'1'=>'<span class="badge badge-danger checkoutBadge">Pending Payment</span>',
'2'=>'<span class="badge badge-warning checkoutBadge">Part Payment</span>',
'3'=>'<span class="badge badge-success checkoutBadge">Fully Paid</span>',];
   

   //Setting global variables after login
   $actorname =  $session->get("userfullname");
   $actorusername =  $session->get("username");
   $actorcode =  $session->get("actorid");
   $actorfirstname =  $session->get("userfirstname");


   switch($pg){

  

        case md5('client'):
            include ("clients/platform.php");
        break; 



        case md5('staff'):
            include ("staff/platform.php");
        break; 

        case md5('messages'):
            include ("messages/platform.php");
        break; 

        case md5('notificatons'):
            include ("notificatons/platform.php");
        break; 

        case md5('properties'):
            include ("properties/platform.php");
        break; 

        case md5('quotation'):
            include ("quotation/platform.php");
        break; 

        
        case md5('ticket'):
            include ("ticket/platform.php");
        break; 


        case md5('land_sale'):
            include ("land_sale/platform.php");
        break;


        case md5('rent_apartment'):
            include ("rent_apartment/platform.php");
        break;


        case md5('expenditure'):
            include ("expenditure/platform.php");
        break;

        case md5('land_client'):
            include ("land_client/platform.php");
        break;

        case md5('apartment_client'):
            include ("apartment_client/platform.php");
        break;

        
        
        case md5('inspection'):
            include ("inspection/platform.php");
        break;
        

        case md5('profile'):
            include ("profile/platform.php");
        break;

        case md5('user'):
            include ("user/platform.php");
        break;
        
        case md5('report'):
            include ("report/platform.php");
        break;

        case md5('login'):
            include ("login/platform.php");
        break;

        default:
        include 'dashboard/platform.php';
        break;
    }
    
    
include 'public/layouts/footer.php';

?>
</form>
</body>


</html>