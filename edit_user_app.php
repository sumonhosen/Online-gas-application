<?php
 session_start();
   include('db.php');
   if (!isset($_SESSION['userId'])) {
    header('location: login.php');
  }
    $user_app_id = $_GET['user_app_id'];

    if(isset($_GET['user_app_id'])){
        $user_data = mysqli_query($conn,"SELECT users.*, industry.*, organization_owner.*, industry2.*, industry3.*, industry4.*,organization_owner.name As organization_name,
                                                industry.mobile As industry1_mobile,industry.id As industry1_id,industry.email As industry1_email
                                                ,industry2.organization_name As ind2_organization_name,organization_owner.designation As organization_designation,
                                                industry3.application_name As ind3_application_name,
                                                industry4.designation As ind4_desingnation

                                                FROM users
                                                JOIN industry ON users.id = industry.user_id
                                                JOIN organization_owner ON industry.id=organization_owner.industry_id
                                                JOIN industry2 ON industry.id=industry2.industry_id
                                                JOIN industry3 ON industry.id=industry3.industry_id
                                                JOIN industry4 ON industry.id=industry4.industry_id
                                                WHERE users.id='$user_app_id' ");

            $n = mysqli_fetch_array($user_data);
           
          

            // $category = $n['category'];
        }
          if(isset($_GET["file"])){

            $file = urldecode($_GET["file"]);


            if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){

                $filepath = "upload/" . $file;

                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filepath));
                    flush();
                    readfile($filepath);
            }else{
                http_response_code(404);
                die();
            }
        }
                if(isset($_POST['update_application'])){
                      // $category         = $_POST['category'];
                    $application_date = $_POST['application_date'];
                    $factory_name     = $_POST['factory_name'];
                    $factory_address1 = $_POST['factory_address1'];
                    $factory_address2 = $_POST['factory_address2'];
                    $factory_address3 = $_POST['factory_address3'];
                    $factory_telephone= $_POST['factory_telephone'];
                    $main_address1    = $_POST['main_address1'];
                    $main_address2    = $_POST['main_address2'];
                    $main_address3    = $_POST['main_address3'];
                    $main_office_phone= $_POST['main_office_phone'];
                    $billing_address1 = $_POST['billing_address1'];
                    $billing_address2 = $_POST['billing_address2'];
                    $billing_address3 = $_POST['billing_address3'];
                    $billing_telephone= $_POST['billing_telephone'];
                    $mobile           = $_POST['industry1_mobile'];
                    $email            = $_POST['industry1_email'];


                    $national_id            = $_POST['national_id'];
                    $tex_identification     = $_POST['tex_identification'];
                    $gis_location           = $_POST['gis_location'];
                    $organization_ownership = $_POST['organization_ownership'];
                    $industry_type          = $_POST['industry_type'];
                    $trade_licence_no       = $_POST['trade_licence_no'];
                    $licence_expiry_date    = $_POST['licence_expiry_date'];
                    $mouza_name             = $_POST['mouza_name'];
                    $daag_no                = $_POST['daag_no'];
                    $khotiyan_no            = $_POST['khotiyan_no'];
                    $total_land_area        = $_POST['total_land_area'];
                    $land_ownership         = $_POST['land_ownership'];

                    //rganization owner

                    $name = implode(',',$_POST['names']);
                    $father_hus_name = implode(',',$_POST['father_hus_names']);
                    $present_address = implode(',',$_POST['present_addresses']);
                    $organization_mobile          = implode(',',$_POST['mobiles']);
                    $designation     = implode(',',$_POST['designations']);
                    $relation        = implode(',',$_POST['relations']);
                    $organization_email           = implode(',',$_POST['emails']);
 
                $user_data = mysqli_query($conn,"UPDATE users u,industry i,industry2 two,industry3 three,industry4 four,organization_owner o SET u.name='sumon hossain',i.factory_name='sumon factory' WHERE i.id='$n['industry1_id']' AND i.id='$n['industry1_id']' AND i.id='$n['industry1_id']' AND u.id='$user_app_id' ");

   
                   var_dump($n['industry1_id']);
                   die();
               
               }

        

?>


<!DOCTYPE html>
<!-- saved from url=(0100)https://onlineapplication.titasgas.org.bd/application/industrial/download/?applicationId=10300000104 -->
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">


        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable=yes">
        <meta name="description" content="">
        <meta name="author" content="Faisal">

        <title>SGCL Online Application</title>

        <link rel="shortcut icon" sizes="32x32" href="sgcl_logo.png">
        <link rel="apple-touch-icon" sizes="62x45" href="sgcl_logo.png">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="platform.css">
        <link rel="stylesheet" type="text/css" href="app.css">
        <link rel="stylesheet" type="text/css" href="page.css">
        <link rel="stylesheet" type="text/css" href="plugins.css">
        <link rel="stylesheet" type="text/css" href="hack.css">

    </head>
    <!--menu_vertical-side //for side vertical menu need to add in body-->
    <body class="menu_horizontal push-mode show_menu tiny menu-fixed header-fixed compact slickgrid-large-font body-small-font  apple-screen">
        <!-- Load Header -->
        <header>
            <div class="header-content row scroll">
                <div class="dbr toggle-panel-wrapper" style="margin-top: 1px;">
                    <a href="#" class="toggle-panel"> </a>
                </div>
                <div class="dbr logo-wrapper">
                    <div id="hide logo" style="">
                        <a class="hide" href="#">
                            <img src="./TGTDCL Online Application_1_files/sgcl_logo.png">
                        </a>
                    </div>
                    <div class="hidden-for-small-only">
                        <h1 class="logo-text hidden-for-small-only" style="font-size: 16px !important; margin-top: 0.6em;">
                            SGCL Online Application
                        </h1>
                    </div>
                </div>
                <div class="dbr right icon-wrapper-new logout" style="">
                    <div class="right icon-wrapper header">
                        <div class="icon-wrapper-inner ">
                            <a class="button small header-small-button icon-label" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dbr right icon-wrapper-new logout" style="">
                    <div class="right icon-wrapper header">
                        <div class="icon-wrapper-inner ">
                            <a class="button small header-small-button icon-label" href="index.php">
                                Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <style>
            .main-menu .fa-database::before{
                font-size: 12px;
            }
            .icon-label,.icon-label span{
                font-size:10px;

            }
            a.header-small-button {
                font-size:10px !important;
            }
            .value-missing {
                border: 1px solid red !important;
            }
            body.menu_horizontal .right.submenu-icon{
                display: none;

            }
            header .dbr.icon-wrapper-new{
                height: 2em;
            }
        </style>
        <nav id="desktop-view" style="margin-bottom: 10px;">
            <div class="menu-content admin-menu-wrapper scroll">
                <div id="menu-content" class="menu-wrapper-inner">
                <div class="Titas-menu-wrapper-inner">
                    <ul class="main-menu sm  sm sm-simple" data-smartmenus-id="16326751052589622">

                        <li>
                            <a class="single-menu  has-submenu" href="javascript:void(0);"><span class="sub-arrow"><i class="fa fa-angle-right fa-2x"></i></span><span class="sub-arrow"><i class="fa fa-angle-right fa-2x"></i></span>
                                <i class="fa fa-newspaper-o"></i>
                                Industrial &amp; Others
                            </a>
                            <ul class="second-menu">
                                <li>
                                    <a href="#" class="main-menu-item">
                                        Application List
                                        <span class="right submenu-icon"><i class="fa fa-list"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="main-menu-item">
                                        Edit Application
                                        <span class="right submenu-icon"><i class="fa fa-pencil-square"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="main-menu-item">
                                        View Application
                                        <span class="right submenu-icon"><i class="fa fa-newspaper-o"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <input id="ACTIVE_MENU" type="hidden" value="" readonly="readonly">
                <input id="ACTIVE_CONTROLLER" type="hidden" value="" readonly="readonly">

                <script type="text/javascript">
                    $(function () {
                        c4s.init();
                        Z.menu.init();
                    });
                </script>
                </div>
            </div>
        </nav>

                        <h2 style="text-align:center">Update Application</h2>
                            <form action="" method="post">
                                <div class="portlet li ght certificate" id="industrialReport">
                                    <div>
                                        <div style="width: 95%" align="center">
                                            <table style="width: 100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="60%">Category:</td>
                                                        <td width="40%" id="CATEGORY">
                                                            <?php
                                                                if($category==1){
                                                                    echo "Industry";
                                                                }elseif($category==2){
                                                                        echo "CNG";
                                                                }elseif($category==3){
                                                                        echo "Captive";
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Application ID:</td>
                                                        <td id="APPLICATION_DATE"><input type="number" value="<?php echo $n['application_id']; ?>" name="application_id" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Application Date:</td>
                                                        <td id="APPLICATION_DATE"><input type="date" value="<?php echo $n['application_date']; ?>"  name="application_date"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Zone:</td>
                                                        <td id="ZONE_NAME">Zone-1:Tikatuli</td>
                                                    </tr>
                                                    <tr>
                                                        <td>1. Factory Name:</td>
                                                        <td id="CUST_NAME"><input value="<?php echo $n['factory_name']; ?>" type="text" name="factory_name"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2. Factory Adress:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['factory_address1']; ?>" type="text" name="factory_address1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['factory_address2']; ?>" type="text" name="factory_address2"></td>
                                                    </tr>
                                                    <tr>
                                                         <td id="SER_ADDR1"><input value="<?php echo $n['factory_address3']; ?>" type="text" name="factory_address3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3. Factory Telephone (If Any):</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['factory_telephone']; ?>" type="number" name="factory_telephone"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4. Main Office Address:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['main_address1']; ?>" type="text" name="main_address1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="OWNER_ADDR2"> <?php echo $n['main_address2'];?> </td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['main_address2']; ?>" type="text" name="main_address2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="OWNER_ADDR3"> <?php echo $n['main_address3'];?> </td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['main_address3']; ?>" type="text" name="main_address3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5. Main Office Telephone (If Any):</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['main_office_phone']; ?>" type="text" name="main_office_phone"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6. Billing Address:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['billing_address1']; ?>" type="text" name="billing_address1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['billing_address2']; ?>" type="text" name="billing_address2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['billing_address3']; ?>" type="text" name="billing_address3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>7. Billing Telephone No (If Any):</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['billing_telephone']; ?>" type="text" name="billing_telephone"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>8. Mobile:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['industry1_mobile']; ?>" type="text" name="industry1_mobile"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>9. Email:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['industry1_email']; ?>" type="text" name="industry1_email"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10. National ID:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['national_id']; ?>" type="text" name="national_id"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>11. Tax Identification No:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['tex_identification']; ?>" type="text" name="tex_identification"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>12. GIS Location:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['gis_location']; ?>" type="text" name="gis_location"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>13. Organization Ownership Type:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['organization_ownership']; ?>" type="text" name="organization_ownership"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>14. Industry Type:</td>
                                                        <td id="SER_ADDR1"><input value="<?php echo $n['industry_type']; ?>" type="text" name="industry_type"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>15. Trade License No:</td>
                                                        <td id="SER_ADDR1">
                                                            <input value="<?php echo $n['trade_licence_no']; ?>" type="text" name="trade_licence_no">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>16. License Expiry Date:</td>
                                                        <td id="SER_ADDR1">
                                                            <input value="<?php echo $n['licence_expiry_date']; ?>" type="date" name="licence_expiry_date">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>17. Organization Owner/Director's Information:</td>
                                                        <td id="">&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table style="width: 100%">
                                                <tbody>
                                                    <tr style="border: 1px solid black">
                                                        <td rowspan="3" style="vertical-align: top;border: 1px solid black">Sl</td>
                                                        <td rowspan="3" style="vertical-align: top;border: 1px solid black">Name</td>
                                                        <td style="border: 1px solid black">a) Father/Husband's Name</td>
                                                        <td style="border: 1px solid black">a) Designation</td>
                                                    </tr>

                                                    <tr style="border: 1px solid black">
                                                        <td style="border: 1px solid black">b) Present Address</td>
                                                        <td style="border: 1px solid black">b) Relation with Other Organization</td>
                                                    </tr>
                                                    <tr style="border: 1px solid black">
                                                        <td style="border: 1px solid black">c) Mobile</td>
                                                        <td style="border: 1px solid black">c) Email</td>
                                                    </tr>
                                                        <?php
                                                        $name = $n['organization_name'];
                                                        $father_hus_name = $n['father_hus_name'];
                                                        $present_address = $n['present_address'];
                                                        $mobile          = $n['organization_mobile'];
                                                        $designation     = $n['organization_designation'];
                                                        $relation        = $n['relation'];
                                                        $email           = $n['email'];

                                                        $names = explode(',',$name);

                                                        $father_hus_names   = explode(',',$father_hus_name);

                                                        $present_addresses  = explode(',',$present_address);
                                                        $mobiles            = explode(',',$mobile);
                                                        $designations       = explode(',',$designation);
                                                        $relations          = explode(',',$relation);
                                                        $emails             = explode(',',$email);

                                                        foreach($names as $key => $value){

                                                            ?>

                                                            <tr style="border: 1px solid black;" id="owner1">
                                                                <td rowspan="3" style="vertical-align: top;border: 1px solid black">
                                                                    <?php echo $key+1 ?>
                                                                    
                                                                </td>
                                                                <td rowspan="3" style="vertical-align: top;border: 1px solid black" id="OWNER_NAME1">
                                                                     <input type="text" name="names[]" value="<?php echo $names[$key]; ?>"> 
                                                                </td>
                                                                <td style="border: 1px solid black" id="OWNER_GUARDIAN1">
                                                                    <input type="text" value="<?php echo $father_hus_names[$key]; ?>" name="father_hus_names[]">
                                                                </td>
                                                                <td style="border: 1px solid black" id="OWNER_DESIG1">
                                                                    <input type="text" value="<?php echo $designations[$key]; ?>" name="designations[]">
                                                                </td>
                                                            </tr>
                                                            <tr style="border: 1px solid black;" id="ownerSub11">
                                                                <td style="border: 1px solid black" id="OWNER_PRSNT_ADDR1">
                                                                    <input type="text" value="<?php echo $present_addresses[$key]; ?>" name="present_addresses[]">    
                                                                </td>
                                                                <td style="border: 1px solid black" id="OWNER_REL_OTHR1">
                                                                    <input type="text" value="<?php echo $relations[$key]; ?>" name="relations[]"> 
                                                                </td>
                                                            </tr>
                                                            <tr style="border: 1px solid black;" id="ownerSub12">
                                                                <td style="border: 1px solid black" id="OWNER_MOBILE1">
                                                                    <input type="number" value="<?php echo $mobiles[$key]; ?>" name="mobiles[]"> 
                                                                </td>
                                                                <td style="border: 1px solid black" id="OWNER_EMAIL1"> 
                                                                  <input type="email" value="<?php echo $emails[$key]; ?>" name="emails[]">   
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>

                                            <table style="width: 100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="60%">18. Location Related Information:</td>
                                                        <td width="40%">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 20px">18.1. Factory Location:</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.1. Mouza Name:</td>
                                                        <td id="SER_MOUZA_NAME">
                                                            <input type="text" value="<?php echo $n['mouza_name']; ?>" name="mouza_name">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.2. Daag No:</td>
                                                        <td id="SER_LINE_NO">
                                                            <input type="number" value="<?php echo $n['daag_no']; ?>" name="daag_no">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.2. Khotiyan No:</td>
                                                        <td id="SER_DOC_NO">
                                                            <input type="number" value="<?php echo $n['khotiyan_no']; ?>" name="khotiyan_no">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.3. Total Land Area (In Acre):</td>
                                                        <td id="SER_LAND_AREA">
                                                            <input type="number" value="<?php echo $n['total_land_area']; ?>" name
                                                            ="total_land_area">              
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.4. Land Ownership:</td>
                                                        <td id="SER_LAND_OWNER">
                                                            <input type="text" value="<?php echo $n['land_ownership']; ?>" name="land_ownership">    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.5. Land Width (Feet):</td>
                                                        <td id="LAND_WIDTH">
                                                            <input type="number" value="<?php echo $n['land_width']; ?>" name="land_width">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.6. Land Length (Feet):</td>
                                                        <td id="LAND_HEIGHT">
                                                            <input type="number" value="<?php echo $n['land_length']; ?>" name="land_length">    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.7. Owner Name If Rented:</td>
                                                        <td id="RENT_OWNER_NAME">
                                                            <input type="text" value="<?php echo $n['owner_name']; ?>" name="owner_name">       
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.8. Owner Address If Rented:</td>
                                                        <td id="RENT_OWNER_ADDR">
                                                            <input type="text" value="<?php echo $n['owner_address']; ?>" name="owner_address">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.9. Lease Provider Organization Name If Leased:</td>
                                                        <td id="LEASE_ORG_NAME">
                                                            <input type="text" value="<?php echo $n['ind2_organization_name']; ?>" name="ind2_organization_name">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.10. Lease Provider Organization Address If Leased:</td>
                                                        <td id="LEASE_ORG_ADDR">
                                                            <input type="text" value="<?php echo $n['organization_address']; ?>" name="organization_address">       
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.11. Till Now (If Known), Any Other Customer Used/Using
                                                             Gas In The Subjected Land:
                                                        </td>
                                                        <td id="GAS_USAGE_IN_AREA">
                                                            <input type="number" value="<?php echo $n['till_now']; ?>" name="till_now">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">If Yes Then Fill The Below Section:</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.12. Previous Customer's Customer Code:</td>
                                                        <td id="PREV_USAGE_CUST_CODE">
                                                            <input type="number" value="<?php echo $n['customer_code']; ?>" name="customer_code">    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.13. Factory/Organization Name:</td>
                                                        <td id="PREV_USAGE_CUST_NAME">
                                                            <input type="text" value="<?php echo $n['factory_organization']; ?>" name="factory_organization">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.14. Customer Name:</td>
                                                        <td id="PREV_USAGE_OWNER_NAME">
                                                            <input type="text" value="<?php echo $n['customer_name']; ?>" name="customer_name">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.15. Connection Status:</td>
                                                        <td id="PREV_USAGE_STATUS">
                                                            <input type="text" value="<?php echo $n['connection_status']; ?>" name="connection_status"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.16. No Demand Certificate For The Clearance Of Gas
                                                            Bill:
                                                        </td>
                                                        <td id="PREV_USAGE_ARREAR_CERT">
                                                            <input type="number" value="<?php echo $n['gash_bill']; ?>" name="gash_bill">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.17. Is Organization Owner,Partner, Chairman or Other
                                                            Directors Having Any Connected/Disconnected Gas Connection in Any of Their Organization  in Titas Franchise Area:
                                                        </td>
                                                        <td id="OWNER_OTHER_INDUSTRY">
                                                            <input type="text" value="<?php echo $n['partner_owner']; ?>" name="partner_owner">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.18. If Yes, Then Customer Code No:</td>
                                                        <td id="OWNER_OTHER_INDUSTRY_CUST_NO">
                                                            <input type="text" value="<?php echo $n['customer_code_no']; ?>" name="customer_code_no">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.19. Other Organization Name:</td>
                                                        <td id="OWNER_OTHER_INDUSTRY_ORG_NAME">
                                                            <input type="text" value="<?php echo $n['other_organization_name']; ?>" name="other_organization_name">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">18.1.20. Other Organization Status:</td>
                                                        <td id="OWNER_OTHER_INDUSTRY_ORG_STAT">
                                                            <input type="text" value="<?php echo $n['other_organization_status']; ?>" name="other_organization_status">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>19. Organization's Manufacturing Related Information:</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table style="width: 100%">
                                                <tbody><tr>
                                                    <td style="padding-left: 40px ; width: 60%">19.1. Production Type:</td>
                                                    <td id="PRODUCTION_TYPE" style="width: 40%;">
                                                        <input type="text" value="<?php echo $n['production_type']; ?>" name="production_type">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 40px">19.2. Factory Starting Time:</td>
                                                    <td id="FAC_START_TIME">
                                                        <input type="text" value="<?php echo $n['factory_start_time']; ?>" name="factory_start_time">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 40px">19.3. Factory Ending Time:</td>
                                                    <td id="FAC_END_TIME">
                                                        <input type="text" value="<?php echo $n['factory_end_time']; ?>" name="factory_end_time"></td>
                                                </tr>
                                                <tr>
                                                    <td>20. Financial Information:</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 40px">20.1. Organization Tax Identification No (TIN) :</td>
                                                    <td id="TIN_NO">
                                                        <input type="text" value="<?php echo $n['tex_identification']; ?>" name="tex_identification"></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 40px">20.2. VAT Registration No (If Applicable):</td>
                                                    <td id="VAT_REG_NO">
                                                        <input type="text" value="<?php echo $n['vat_registration']; ?>" name="vat_registration">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 40px">20.3. Bank Name:</td>
                                                    <td id="BANK_NAME">
                                                        <input type="text" value="<?php echo $n['bank_name']; ?>" name="bank_name">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 40px">20.4. Bank Branch:</td>
                                                    <td id="BANK_BRANCH">
                                                        <input type="text" value="<?php echo $n['bank_branch']; ?>" name="bank_branch">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>21. Load Related Information:</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 40px">21.1. Appliance and Burner Related Information:</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody></table>
                                            <table style="width: 100%">
                                                <tbody>
                                                <tr style="border: 1px solid black">
                                                    <td style="border: 1px solid black">Sl</td>
                                                    <td style="border: 1px solid black">Appliance Name</td>
                                                    <td style="border: 1px solid black">Appliance Size,<br>Ft. (L*W*H)</td>
                                                    <td style="border: 1px solid black">Appliance Production Capacity</td>
                                                    <td style="border: 1px solid black">Burner Type</td>
                                                    <td style="border: 1px solid black">Burner Count</td>
                                                    <td style="border: 1px solid black">Burner Capacity (cft/h)</td>
                                                    <td style="border: 1px solid black">Total load (cft/h)</td>
                                                    <td style="border: 1px solid black">Comments</td>
                                                </tr>
                                                <?php
                                                    $application_name = $n['ind3_application_name'];
                                                    $application_size = $n['application_size'];
                                                    $application_production = $n['application_production'];
                                                    $burner_type      = $n['burner_type'];
                                                    $burner_count     = $n['burner_count'];
                                                    $burner_capacity  = $n['burner_capacity'];
                                                    $total_load       = $n['total_load'];
                                                    $commnet          = $n['comment'];

                                       


                                                    $application_names = explode(',',$application_name);

                                                    $application_sizes =  explode(',',$application_size);
                                                    $application_productions =  explode(',',$application_production);
                                                    $burner_types      =  explode(',',$burner_type);
                                                    $burner_counts     =  explode(',',$burner_count);
                                                    $burner_capacities =  explode(',',$burner_capacity);
                                                    $total_loads       =  explode(',',$total_load);
                                                    $commnets          =  explode(',',$commnet);          



                                                    foreach($application_names as $key => $value){
                                                        ?>
                                                        <tr style="border: 1px solid black;" id="burnerDesc1">
                                                            <td style="border: 1px solid black"><?php echo $key+1 ?></td>
                                                            <td style="border: 1px solid black" id="APPL_NAME1">
                                                                <input type="text" value="<?php echo $application_names[$key]; ?>" name="application_names[]">
                                                            </td>
                                                            <td style="border: 1px solid black" id="APPL_SIZE1">
                                                                <input type="text" value="<?php echo $application_sizes[$key]; ?>" name="application_sizes[]">     
                                                            </td>
                                                            <td style="border: 1px solid black" id="APPL_SIZE1">
                                                                <input type="text" value="<?php echo $application_productions[$key]; ?>" name="application_productions[]">
                                                            </td>
                                                            <td style="border: 1px solid black" id="APPL_PROD_CAP1">
                                                                <input type="text" value="<?php echo $burner_types[$key]; ?>" name="burner_types[]">
                                                            </td>
                                                            <td style="border: 1px solid black" id="BURNER_COUNT1">
                                                                <input type="text" value="<?php echo $burner_counts[$key]; ?>" name="burner_counts[]">
                                                            </td>
                                                            <td style="border: 1px solid black" id="BURNER_CAP1">
                                                                <input type="text" value="<?php echo $burner_capacities[$key]; ?>" name="burner_capacities[]">.0
                                                            </td>
                                                            <td style="border: 1px solid black" id="BURNER_LOAD1">
                                                                <input type="text" value="<?php echo $total_loads[$key]; ?>" name="total_loads[]">     
                                                            </td>
                                                            <td style="border: 1px solid black" id="APPL_COMMENTS1">
                                                                <input type="text" value="<?php echo $commnets[$key]; ?>" name="commnets[]">
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                            <table style="width: 100%">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding-left: 40px ; width: 60%">21.2. Gas Usage/Hour:</td>
                                                        <td id="GAS_USAGE_RATE" style="width: 40% ;">
                                                            <input type="text" value="<?php echo $n['gas_hour']; ?>" name="gas_hour"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">21.3. Gas Usage Unit:</td>
                                                        <td id="GAS_USAGE_UNIT">
                                                            <input type="text" value="<?php echo $n['gas_unit']; ?>" name="gas_unit">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <td>21.4. Expected Gas When Need:</td>
                                                    </tr>        
                                                    <tr>
                                                        <td>Year</td>
                                                        <td>Demand</td>
                                                        <td>Cubic Meter</td>
                                                    </tr>
                                                    <?php
                                                    $year              = $n['year'];
                                                    $demand            = $n['demand'];
                                                    $cubic_meter       = $n['cubic_meter'];
                                                 

                                                    $years              =  explode(',',$year);                    
                                                    $demands            =  explode(',',$demand);                    
                                                    $cubic_meters       =  explode(',',$cubic_meter);               
                                                   
                                                        foreach($years as $key => $value){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input type="text" value="<?php echo $years[$key]; ?>" name="years[]">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?php echo $demands[$key]; ?>" name="demands[]">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?php echo $cubic_meters[$key]; ?>" name="cubic_meters[]">
                                                            </td>
                                                        </tr>
                                                    <?php    
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <table style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <td>21.5. Production Related Information used yearly ingredients:</td>
                                                    </tr>        
                                                    <tr>
                                                        <td>Produced Goods Name</td>
                                                        <td>Yearly Production</td>
                                                        <td width="20%">Whose Sold<p>Local / International</p></td>
                                                    </tr>
                                                        <?php
                                                            $goods_name        = $n['goods_name'];
                                                            $yearly_production = $n['yearly_production'];
                                                            $sold              = $n['sold'];

                                                            $goods_names        =  explode(',',$goods_name);               
                                                            $yearly_productions =  explode(',',$yearly_production);        
                                                            $solds              =  explode(',',$sold); 
                                                        foreach($goods_names as $key => $value){
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" value="<?php echo $goods_names[$key]; ?>" name="goods_names[]">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?php echo $yearly_productions[$key]; ?>" name="yearly_productions[]">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?php echo $solds[$key]; ?>" name="solds[]">
                                                                </td>
                                                            </tr>
                                                        <?php    
                                                            }
                                                        ?>
                                                </tbody>
                                            </table>


                                            <table style="width: 100%">
                                                <tbody>
                                                    <tr>
                                                        <td>22. Information of related person(s) who has signatory power/contact to accomplish any
                                                            required process:
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <table style="width: 100%;">
                                                <tbody>
                                                    <tr style="border: 1px solid black">
                                                        <td style="border: 1px solid black">SL</td>
                                                        <td style="border: 1px solid black">a) Name <br>b) Designation</td>
                                                        <td style="border: 1px solid black">a) National ID <br>b) Mobile <br>c) Email</td>
                                                    </tr>
                                                    <?php
                                                        $name           = $n['name'];
                                                        $desingnation   = $n['desingnation'];
                                                        $national       = $n['national'];
                                                        $mobile         = $n['mobile'];
                                                        $email          = $n['email'];
                                                        $names          = explode(',',$name);
                                                        $desingnations  = explode(',',$desingnation);
                                                        $nationals      = explode(',',$national);
                                                        $mobiles        = explode(',',$mobile);
                                                        $emails         = explode(',',$email);
                                                        foreach($names as $key => $value){
                                                    ?>
                                                    <tr style="border: 1px solid black;" id="related1">
                                                        <td style="border: 1px solid black" rowspan="3">1</td>
                                                        <td style="border: 1px solid black" id="PWR_ATRN_NAME1">
                                                            <input type="text" value="<?php echo $names[$key]; ?>" name="names[]">
                                                        </td>
                                                        <td style="border: 1px solid black" id="PWR_ATRN_NID1">
                                                            <input type="text" value="<?php echo $nationals[$key]; ?>" name="nationals[]">
                                                        </td>
                                                    </tr>
                                                    <tr style="border: 1px solid black;" id="relatedSub11">
                                                        <td style="border: 1px solid black" id="PWR_ATRN_DESIG1">
                                                            <input type="text" value="<?php echo $desingnations[$key]; ?>" name="desingnations[]">
                                                        </td>
                                                        <td style="border: 1px solid black" id="PWR_ATRN_MOBILE1">
                                                            <input type="text" value="<?php echo $mobiles[$key]; ?>" name="mobiles[]">
                                                        </td>
                                                    </tr>
                                                    <tr style="border: 1px solid black;" id="relatedSub12">
                                                        <td style="border: 1px solid black">&nbsp;</td>
                                                        <td style="border: 1px solid black" id="PWR_ATRN_EMAIL1">
                                                            <input type="text" value="<?php echo $emails[$key]; ?>" name="emails[]">
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                            <table>
                                                <tbody>
                                                    <tr>
                                                    <td>
                                                        <b>23. I/We declare that all entered information and attached documents are correct and
                                                        valid. I/We will be bound to follow all rules and regulations. I/We also agree that we
                                                        will construct the RMS room as per design and no changes will be applied without
                                                        company's authorized permission.</b>
                                                    </td>
                                                    </tr>
                                                </tbody> 
                                            </table>

                                            <table style="width: 100%">
                                                <tbody>
                                                    <tr style="border: 1px solid black;">
                                                    <td style="border: 1px solid black" width="60%">Applicant Name</td>
                                                    <td style="border: 1px solid black" width="40%" id="APPLICANT_NAME">
                                                        <input type="text" value="<?php echo $n['application_name'] ?>" name="application_name"></td>
                                                    </tr>
                                                    <tr style="border: 1px solid black">
                                                        <td style="border: 1px solid black">Designation</td>
                                                        <td style="border: 1px solid black" id="APPLICANT_DESIG">
                                                            <input type="text" value="<?php echo $n['ind4_desingnation'] ?>" name="ind4_desingnation">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                                   <?php
                                                    $image        = $n['image'];
                                                    $passport_img = explode(',',$image);
                                                    $trade_licence_img = explode(',',$image);
                                                    $tin_certificate = explode(',',$image);
                                                    $association_certificate = explode(',',$image);
                                                    $proof_document = explode(',',$image);
                                                    $rent_agreement = explode(',',$image);
                                                    $factory_layouts = explode(',',$image);
                                                    $proposed_design = explode(',',$image);
                                                    $technical_catelog = explode(',',$image);
                                                    $signature = explode(',',$image);
                                                    $nid = explode(',',$image);
                                                    $certificate_of_registration = explode(',',$image);
                                                    $noc_of_department = explode(',',$image);
                                                    $others = explode(',',$image);
                                                    // var_dump($others[12]);
                                                    // die();
                                                    ?>
                               
                                            <table style="width: 100%">
                                                <tbody>
                                                    <tr>
                                                        <td><b>24. Attachments:</b></td>
                                                        <td>&nbsp;</td>
                                                        <td>Download</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.1. Passport Size Photo:</td>
                                                        <td id="PASSPORT_PHOTO">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=<?php echo $passport_img[0];?>" name="btnDownload">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.2. Trade License:</td>
                                                        <td id="TRD_LIC">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $trade_licence_img[1];?>">Download</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.3. TIN Certificates:</td>
                                                        <td id="TIN">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $tin_certificate[2];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.4. Memorandum &amp; Article Of Association and Certificate Of
                                                            Incorporation's (For Registered Companies):
                                                        </td>
                                                        <td id="MAOA_COI">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $association_certificate[3];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.5. Proof Document:</td>
                                                        <td id="PROOF_DOC">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $proof_document[4];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.6. Rent Agreement:</td>
                                                        <td id="RENT_AGRMNT">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $rent_agreement[5];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.7. Factory's Layout Plan:</td>
                                                        <td id="FACTORY_LAYOUT_PLAN">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $factory_layouts[6];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.8. Proposed Pipeline Design:</td>
                                                        <td id="PIPELINE_DESIGN">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $proposed_design[7];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.9. Technical Catalog:</td>
                                                        <td id="TECH_CATALOG">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $technical_catelog[8];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.10. Signature:</td>
                                                        <td id="SIGNATURE">Yes</td>
                                                        <td>
                                                             <a target="_blank" href="download.php?file=/<?php echo $signature[9];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.11. Nid:</td>
                                                        <td id="NID">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $nid[10];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.12. Industry Certificate:</td>
                                                        <td id="INDUSTRY_CERTIFICATE">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $certificate_of_registration[11];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.13. Environment Noc:</td>
                                                        <td id="ENVIRONMENT_NOC">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $noc_of_department[12];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 40px">24.15. Others:</td>
                                                        <td id="OTHERS">Yes</td>
                                                        <td>
                                                            <a target="_blank" href="download.php?file=/<?php echo $others[13];?>">Download </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="up_app" style="text-align: center;">
                                    <button type="submit" name="update_application">Update Application</button>
                                </div>
                            </form>
                        </section>
                        <section>
                            <div class="row collapse">
                                <div class="large-12 medium-12 small-12 columns empty-section-content">
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <footer>
                    <div class="content-body footer-content">
                        <div class="right hidden-for-small-only" id="footerTime">22:51</div>
                        <div class="right hidden-for-small-only" id="footerDate">Sep 26, 2021</div>
                        <div class="right hidden-for-small-only">
                            Version : 0.2
                        </div>


                        <div class="hide">
                            ?
                        </div>
                        <div class="left" title="The creator of PrismERP">
                            � <span>2021</span> <a href="https://www.sgcl.org.bd/" target="_blank">SGCL</a>
                        </div>

                    </div>
                </footer>
            </div>
        </div>

        <div id="dialog-confirm" title="Delete!" style="display: none;">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
                This information will be permanently deleted and cannot be recovered. Are you sure?</p>
        </div>

        <div id="dialog-ledger" title="Confirm!" style="display: none;">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
                This action cannot be undone. Do you want to continue?</p>
        </div>


        </script>
    </body>
</html>
