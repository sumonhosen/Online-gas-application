<?php
session_start();
    include('db.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
     $mail = new PHPMailer(true);


    if(isset($_POST['btnSubmit'])){
        $userId = $_SESSION['userId']??'';
        $check_usreId = "SELECT * FROM industry WHERE user_id='$userId'";
        $check_user_sql = mysqli_query($conn, $check_usreId);
        $count_user = mysqli_num_rows($check_user_sql);

        if(!($userId)){
            $_SESSION['user_check_msg'] ='<button class="alert alert-success">Your Accunt is Not Available Please Login You!</button>';
        }elseif($count_user==1){
            $_SESSION['apply_exit'] ='<button class="alert alert-success">You Are Aleady Applied!</button>';
        }
        else{
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
            $mobile           = $_POST['mobile'];
            $email            = $_POST['email'];

            $_SESSION['ss_email']   = $email;

            $national_id            = $_POST['national_id'];
            $tex_identification     = $_POST['tex_identification'];
            $gis_location           = $_POST['gis_location'];
            $organization_ownership = $_POST['organization_ownership'];
            $industry_type          = $_POST['industry_type'];
            $trade_licence_no 		= $_POST['trade_licence_no'];
            $licence_expiry_date    = $_POST['licence_expiry_date'];
            $mouza_name             = $_POST['mouza_name'];
            $daag_no 				= $_POST['daag_no'];
            $khotiyan_no 		    = $_POST['khotiyan_no'];
            $total_land_area 		= $_POST['total_land_area'];
            $land_ownership 		= $_POST['land_ownership'];

            //rganization owner

            $name = implode(',',$_POST['name']);
            $father_hus_name = implode(',',$_POST['father_hus_name']);
            $present_address = implode(',',$_POST['present_address']);
            $organization_mobile          = implode(',',$_POST['organization_mobile']);
            $designation     = implode(',',$_POST['designation']);
            $relation        = implode(',',$_POST['relation']);
            $organization_email           = implode(',',$_POST['organization_email']);


            $industry_data = "INSERT INTO industry(application_date, factory_name, factory_address1, factory_address2, factory_address3, factory_telephone, main_address1, main_address2, main_address3, main_office_phone, billing_address1, billing_address2, billing_address3, billing_telephone, mobile, email, national_id, tex_identification, gis_location, organization_ownership, industry_type, trade_licence_no, licence_expiry_date, mouza_name, daag_no, khotiyan_no, total_land_area, land_ownership,user_id) VALUES('$application_date','$factory_name','$factory_address1','$factory_address2','$factory_address3','$factory_telephone','$main_address1','$main_address2','$main_address3','$main_office_phone','$billing_address1','$billing_address2','$billing_address3','$billing_telephone','$mobile','$email','$national_id','$tex_identification','$gis_location','$organization_ownership','$industry_type','$trade_licence_no','$licence_expiry_date','$mouza_name','$daag_no','$khotiyan_no','$total_land_area','$land_ownership','$userId') ";

            	$industry_sql = mysqli_query($conn, $industry_data);

                $last_id = mysqli_insert_id($conn);
                $_SESSION['last_id'] = $last_id;

            	if($industry_sql==true) {
    		        $organization_data = mysqli_query($conn,"INSERT INTO organization_owner(name, father_hus_name, present_address, organization_mobile, designation, relation, organization_email,industry_id) VALUES('$name','$father_hus_name','$present_address','$organization_mobile','$designation','$relation','$organization_email','$last_id')");
    		    }
            }
        }

        if(isset($_POST['btnInd2'])){

            $last_id = $_SESSION['last_id'];

            $land_width          =  $_POST['land_width'];
            $land_length         =  $_POST['land_length'];
            $owner_name          =  $_POST['owner_name'];
            $owner_address       =  $_POST['owner_address'];
            $organization_name   =  $_POST['organization_name'];
            $organization_address = $_POST['organization_address'];
            $till_now             = $_POST['till_now'];
            $customer_code        = $_POST['customer_code'];
            $factory_organization = $_POST['factory_organization'];
            $customer_name        = $_POST['customer_name'];
            $connection_status    = $_POST['connection_status'];
            $gash_bill            = $_POST['gash_bill'];
            $partner_owner        = $_POST['partner_owner'];
            $customer_code_no     = $_POST['customer_code_no'];
            $other_organization_name = $_POST['other_organization_name'];
            $other_organization_status = $_POST['other_organization_status'];
            $production_type           = $_POST['production_type'];
            $factory_start_time        = $_POST['factory_start_time'];
            $factory_end_time          = $_POST['factory_end_time'];

            $industry_2_data = "INSERT INTO industry2(land_width, land_length, owner_name, owner_address, organization_name, organization_address, till_now, customer_code,
            factory_organization, customer_name, connection_status, gash_bill, partner_owner, customer_code_no, other_organization_name, other_organization_status, production_type,
            factory_start_time, factory_end_time,industry_id) VALUES('$land_width','$land_length','$owner_name','$owner_address','$organization_name','$organization_address','$till_now','$customer_code',
            '$factory_organization','$customer_name','$connection_status','$gash_bill','$partner_owner','$customer_code_no','$other_organization_name','$other_organization_status','$production_type',
            '$factory_start_time','$factory_end_time','$last_id')";

            $industry2_sql = mysqli_query($conn, $industry_2_data);

        }
        if(isset($_POST['btnInd3'])){

            $last_id            = $_SESSION['last_id'];
            $tex_identification = $_POST['tex_identification'];
            $vat_registration   = $_POST['vat_registration'];
            $bank_name          = $_POST['bank_name'];
            $bank_branch        = $_POST['bank_branch'];
            $application_name   = implode(',',$_POST['application_name']);
            $application_size   = implode(',',$_POST['application_size']);
            $application_production = implode(',',$_POST['application_production']);
            $burner_type        = implode(',',$_POST['burner_type']);
            $burner_count       = implode(',',$_POST['burner_count']);
            $burner_capacity    = implode(',',$_POST['burner_capacity']);
            $total_load         = implode(',',$_POST['total_load']);
            $comment            = implode(',',$_POST['comment']);
            $gas_hour           = $_POST['gas_hour'];
            $gas_unit           = $_POST['gas_unit'];
            $gas_pressure1      = $_POST['gas_pressure1'];
            $gas_pressure2      = $_POST['gas_pressure2'];

            $year               = implode(',',$_POST['year']);
            $demand             = implode(',',$_POST['demand']);
            $cubic_meter        = implode(',',$_POST['cubic_meter']);


            $goods_name         = implode(',',$_POST['goods_name']);
            $yearly_production  = implode(',',$_POST['yearly_production']);
            $sold               = implode(',',$_POST['sold']);
    
            $name               = implode(',',$_POST['name']);
            $desingnation       = implode(',',$_POST['desingnation']);
            $national           = implode(',',$_POST['national']);
            $mobile             = implode(',',$_POST['mobile']);
            $email              = implode(',',$_POST['email']);

            $ind3_data = "INSERT INTO industry3(tex_identification, vat_registration, bank_name, bank_branch, application_name, application_size, application_production, burner_type, burner_count, burner_capacity, total_load, comment, gas_hour, gas_unit, gas_pressure1, gas_pressure2, year, demand, cubic_meter, goods_name, yearly_production, sold, name, desingnation, national, mobile, email, industry_id) VALUES('$tex_identification', '$vat_registration', '$bank_name', '$bank_branch', '$application_name', '$application_size', '$application_production', '$burner_type', '$burner_count', '$burner_capacity', '$total_load', '$comment', '$gas_hour', '$gas_unit', '$gas_pressure1', '$gas_pressure2', '$year', '$demand', '$cubic_meter', '$goods_name', '$yearly_production', '$sold', '$name', '$desingnation', '$national', '$mobile', '$email', '$last_id')";
   

                $industry3_sql = mysqli_query($conn, $ind3_data);
        }

        if(isset($_POST['btnPost'])){
            $last_id = $_SESSION['last_id'];
       
            $files = $_FILES['ind4_imgs']['name'];

            $imageName = array();
            foreach($files as $image=>$key){

                $file   = $_FILES['ind4_imgs']['name'][$image];
                $upload = move_uploaded_file($_FILES['ind4_imgs']['tmp_name'][$image],'upload/'.$file);
                    $imageName[] = $file;
                // $size   = $_FILES['ind4_imgs']['size'][$image];

                    // if(!$size>50000){
                     
                    // }else{
                    //     $_SESSION['img_error'] ='<button class="btn btn-primary">Your Image File Size is To Long!</button>'; 
                    // }             
                }

            $get_image = implode(',',$imageName);
            $application = $_POST['application_name'];
            $desingnation = $_POST['desingnation'];
            $industry_data = " INSERT INTO industry4(application_name, designation, image, industry_id) VALUES ('$application','$desingnation','$get_image','$last_id') ";

            $industry4_sql = mysqli_query($conn, $industry_data);

            if($industry4_sql==true){
                $_SESSION['msg'] ='<button class="btn btn-primary">Your Application Applied Successfull!</button>';

                    try {
                        //Server settings
                        $mail->SMTPDebug = 2;                   
                        $mail->isSMTP();                                            
                      
                        $mail->SMTPAuth   = true;                                  
                        $mail->Username   = 'abmsumonhosen@gmail.com';                   
                        $mail->Password   = 'SumoN69307';                               

                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 465;

                        $mail->setFrom($_SESSION['ss_email'], 'Mailer');
        
                        $mail->addCC($_SESSION['ss_email']);
               


                        $mail->isHTML(true);                                  
                        $mail->Subject = 'Here is the subject';
                        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                       
                        if($mail->send()){
                            echo 'Message has been sent'; 
                        }
                    }catch (Exception $e) {
                        //exception;
                    }
                header("url=industry.php");
            }
        }

    include('header.php');


?>

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
        <nav id="desktop-view" style="margin-bottom: 10px; display: none;">
            <div class="menu-content admin-menu-wrapper scroll">
                <div id="menu-content" class="menu-wrapper-inner">

                </div>
            </div>
        </nav>

        <!-- Load Body Content -->
        <div class="container clearfix content-wrapper body-small-font admin-container">
            <div class="content-wrapper-inner clearfix" id="page-content-wrapper">
                <div id="page-content" class="slickgridView  compact slickgrid-large-font">
                    <style>
                        ul#slick {
                            margin-left: 0px;
                        }
                        #slick li.active{
                            background: #fff !important;
                            box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.7);
                            color: #4A8BC2;
                            z-index: 8;
                            border:0px !important;
                        }
                        header .icon-wrapper {
                            width: auto;
                            padding-right: 50px;
                        }

                        #slick li{
                            background: #d1d1d1 none repeat scroll 0 0;
                            color: #666;
                            display: block;
                            float: left;
                            font-size: 14px;
                            height: 37px;
                            line-height: 37px;
                            margin: 0 4px 0 0;
                            position: relative;
                            text-align: center;
                            width: 100px;
                            border: 0px;
                            border:0px !important;
                            cursor: pointer;
                            border-radius: 0px;
                            transition: all 0.2s ease 0s;
                        }
                        #slick li.active:hover{
                            color: #4A8BC2;
                        }
                        #slick li:hover{
                            background: #d1d1d1 none repeat scroll 0 0;
                            color: #fff;
                        }
                        .tiny header, .tiny header div.header-content {
                            height: 3.5em;
                        }

                        #slick * {
                            border: 0 none;
                            box-sizing: border-box;
                            font-size: 100%;
                            font-style: normal;
                            font-weight: normal;
                            line-height: normal;
                            margin: 0;
                            outline: 0 none;
                            padding: 0;
                            vertical-align: baseline;
                            width: 100%;
                        }
                        .targetpanes{
                            background: #fff none repeat scroll 0 0;
                            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.7);
                            float: left;
                            height: auto;
                            position: relative;
                            width: 100% !important;
                            border: 0px;
                        }

                        #slick .clrfx.merge {
                            background: #fff none repeat scroll 0 0;
                            height: 12px;
                            left: 0;
                            position: absolute;
                            top: 37px;
                            width: 99%;
                            z-index: 9;
                        }
                        #slick .clrfx {
                            clear: both;
                            display: block;
                            float: left;
                            width: 100%;
                        }
                        div.ic > input{
                            margin:0 0 0.125rem !important;
                        }

                        div.ic {
                            margin:0 0 0.125rem !important;
                        }
                        div.ic > label.title{
                            margin:0 0 0.625rem !important;
                        }
                        div.form-template,div.form-search-key,div.form-extra-input {
                            padding-left: 0.6125rem;
                            padding-right: 0.6125rem;
                        }
                        @media only screen and (min-width: 64.063em){
                           .large-7 {
                                margin-left: 250px;
                            }
                        }

                    </style>

    <!-- Load Pages Content -->
    <div id="slickgridView" style="clear: both;" class="compact slickgrid-large-font">
        <section>
            <div class="row section-heading blue-dark collapse">
                <div class="large-8 medium-8 small-12 columns">
                    <div class="icon-wrapper left">
                        <a class="icon">

                        </a>
                    </div>
                    <h5>
                        <span id="formTitle">
                            Industrial/Seasonal/Captive/C.N.G./Others Gas Connection Application
                        </span>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="large-7 medium-10 small-12 columns section-content" id="industry_div1">
                    <?php
                        if (!empty($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            if (!empty($_SESSION['user_check_msg'])) {
                                echo $_SESSION['user_check_msg'];
                                unset($_SESSION['user_check_msg']);
                            }
                            if (!empty($_SESSION['login_msg'])) {
                                echo $_SESSION['login_msg'];
                                unset($_SESSION['login_msg']);
                            }
                            if (!empty($_SESSION['apply_exit'])) {
                                echo $_SESSION['apply_exit'];
                                unset($_SESSION['apply_exit']);
                            }



                        ?>
                    <!-- FORM MAIN BODY -->
                    <form method="post" action="">
                        <div class="row">
                            <div class="large-12 medium-12 small-12 columns ic left" style="font-size: 0.8em;">
                                Fields marked with <span style="color: red;">(*)</span> are mandatory.
                            </div>
                        </div>
            <!--             <div class="row form-extra-input">
                            <div class="large-4 medium-4 small-12 columns ic left">
                                <div class="input ic ">
                                    <label class="title right" for="Industrial_CAT_CODE">
                                        Category
                                    <span style="color: red;">*</span></label>
                                </div>
                            </div>
                            <div class="large-8 medium-8 small-12 columns ic left">
                                <div class="input ic ">
                                    <select class="form-control" name="category" required="required">
                                        <option value="" selected disabled>Select Type</option>
                                        <option value="1">Industry</option>
                                        <option value="2">CNG</option>
                                        <option value="3">Captive</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="large-12 medium-12 small-12 columns ic left">
                                &nbsp;
                            </div>
                        </div>

                    <div id="form-content" class="form-template" data-href="forms/add_form.html">
                        <div class="row">
                            <div class="large-12 medium-12 small-12 columns " style="padding-left:0px;">
                                <ul class="tab" id="slick">
                                    <li class="active">Page-1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row targetpanes" style="padding-top: 20px; display: block;">
                            <div class="large-12 medium-12 small-12 columns">
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_APPLICATION_DATE">
                                                Application  Date
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 masked-input required validator" placeholder="DD/MM/YY" type="date" name="application_date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_CUST_NAME">
                                                Factory Name
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" type="text" name="factory_name" maxlength="30" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_SER_ADDR1">
                                                Factory Address
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" type="text"  name="factory_address1" maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_SER_ADDR2">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5" type="text"  name="factory_address2" maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_SER_ADDR3">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5" type="text"  name="factory_address3" maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_SER_PHONE">
                                                Factory Telephone (If Any)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 masked-input" type="number" required name="factory_telephone" is-masked="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_OWNER_ADDR1">
                                                Main Office Address
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" type="text" name="main_address1" maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_OWNER_ADDR2">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5" type="text"name="main_address2" maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_OWNER_ADDR3">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5" type="text" name="main_address3" maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_OWNER_PHONE">
                                                Main Office Telephone (If Any)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 masked-input" type="number" data-mask="999999?9999" name="main_office_phone" is-masked="true" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_BILL_ADDR1">
                                                Billing Address
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" type="text" name="billing_address1" maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_BILL_ADDR2">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5" type="text" name="billing_address2" maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_BILL_ADDR3">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5" type="text" name="billing_address3"  maxlength="255" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_CUST_PHONE">
                                                Billing Telephone No (If Any)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 masked-input" required type="number" name="billing_telephone" data-mask="999999?9999" is-masked="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_CUST_MOBILE">
                                                Mobile
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 masked-input required" type="number" name="mobile" data-mask="8801999999999" is-masked="true" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_CUST_EMAIL">
                                                Email
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" type="email" name="email" maxlength="255" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_CUST_NID">
                                                National ID
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required validator" type="number" name="national_id" maxlength="30" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_CUST_TIN">
                                                Tax Identification No.
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required validator" type="number" name="tex_identification" maxlength="50" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_GIS_INFO">
                                                GIS Location
                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5" type="text" name="gis_location" maxlength="50" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_OWNERSHIP_TYPE">
                                                Organization Ownership Type
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <select class="form-control" name="organization_ownership" required>
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="1">Sole proprietorship<option>
                                                <option value="2">Joint ownership</option>
                                                <option value="3">Limited Company</option>
                                                <option value="4">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_INDUSTRY_TYPE">
                                                Industry Type
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic " id="subType">
                                            <select class="form-control" name="industry_type" required>
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="1">Government<option>
                                                <option value="2">Non-Government<option>
                                                <option value="3">Autonomous</option>
                                                <option value="4">Private Ownership</option>
                                                <option value="5">PartnerShip</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_TRD_LIC_NO">
                                                Trade License No.
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" type="number" name="trade_licence_no" length="30" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_TRD_EXP_DATE">
                                                License Expiry Date
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 masked-input required validator" placeholder="DD/MM/YY" name="licence_expiry_date" type="date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title left" for="Industrial_">
                                                <b>Organization Owner/Director's Information (If your organization has more than five Owners/Directors please attach the information in page-4 Others attachment):</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-12 medium-12 small-12 columns ic left  load-template" data-href="tables/table_4.html"><table>
                                    <thead>
                                        <tr><td style="width: 5%;">Serial No.</td>
                                        <td style="width: 20%;">Name</td>
                                        <td style="width: 40%;">a) Father/Husband's Name<br>b) Present Address<br>c) Mobile</td>
                                        <td style="width: 35%;">a) Designation<br>b) Relation with Other Organization<br>c) Email</td>
                                    </tr></thead>
                                    <tbody><tr>
                                        <td>1.</td>
                                        <td>
                                            <div class="input ic ">
                                                <input class="w5" type="text" name="name[]" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input ic ">a)
                                                <input class="w5" name="father_hus_name[]" type="text" required>
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" type="text" name="present_address[]" required>
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" type="number" name="organization_mobile[]" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input ic ">a)
                                                <input class="w5" name="designation[]" type="text" required>
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" name="relation[]" type="text" required>
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" name="organization_email[]"  type="email" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>
                                            <div class="input ic ">
                                                <input class="w5" type="text" name="name[]" required >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input ic ">a)
                                                <input class="w5" name="father_hus_name[]" type="text" required >
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" type="text" name="present_address[]" required >
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" type="number" name="organization_mobile[]"  >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input ic ">a)
                                                <input class="w5" name="designation[]" type="text" required>
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" name="relation[]" type="text"  required>
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" name="organization_email[]"  type="email" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>
                                            <div class="input ic ">
                                                <input class="w5" type="text" name="name[]" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input ic ">a)
                                                <input class="w5" name="father_hus_name[]" type="text" required>
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" type="text" name="present_address[]" required>
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" type="number" name="organization_mobile[]" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input ic ">a)
                                                <input class="w5" name="designation[]" type="text" required>
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" name="relation[]" type="text" required>
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" name="organization_email[]"  type="email" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>
                                            <div class="input ic ">
                                                <input class="w5" type="text" name="name[]" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input ic ">a)
                                                <input class="w5" name="father_hus_name[]" type="text" required>
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" type="text" name="present_address[]" required>
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" type="number" name="organization_mobile[]" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input ic ">a)
                                                <input class="w5" name="designation[]" type="text" required>
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" name="relation[]" type="text" required>
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" name="organization_email[]"  type="email" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>
                                            <div class="input ic ">
                                                <input class="w5" type="text" name="name[]" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input ic ">a)
                                                <input class="w5" name="father_hus_name[]" type="text" required>
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" type="text" name="present_address[]" required >
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" type="number" name="organization_mobile[]" required >
                                            </div>
                                        </td>
                                        <td>
                                           <div class="input ic ">a)
                                                <input class="w5" name="designation[]" type="text" required>
                                            </div>
                                            <div class="input ic ">b)
                                                <input class="w5" name="relation[]" type="text" required>
                                            </div>
                                            <div class="input ic ">c)
                                                <input class="w5" name="organization_email[]"  type="email" required>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody></table></div>
                                </div>
                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title left" for="Industrial_"><b>Location Related Information:</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title left" for="Industrial_">Factory Location:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_SER_MOUZA_NAME">
                                                Mouza Name
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" type="text" name="mouza_name" maxlength="30" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_SER_LINE_NO">
                                                Daag No
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" type="number" name="daag_no" maxlength="30" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" >
                                                Khotiyan No
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" type="number" name="khotiyan_no" maxlength="30" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" >
                                                Total Land Area (In Acre)
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <input class="w5 required" name="total_land_area" type="number" maxlength="30" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right">
                                                Land Ownership
                                            <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <select class="form-control" name="land_ownership" required>
                                                <option value="" selected disabled>Select one</option>
                                                <option value="1">Own<option>
                                                <option value="2">Rent</option>
                                                <option value="3">Assignment</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 medium-12 small-12 columns ic text-right">
                            <button name="btnSubmit" type="submit" style="left: -15px;" class="button radius small form-submit-button hide">
                                Next Page
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section>
        <div class="row" style="background: white">
            <div class="large-7 medium-10 small-12 columns section-content" id="industry_div2" style="display: none">
                <div class="row">
                    <div class="large-12 medium-12 small-12 columns ic left" style="font-size: 0.8em;">
                        Fields marked with <span style="color: red;">(*)</span> are mandatory.
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 medium-12 small-12 columns ic left">
                        &nbsp;
                    </div>
                </div>
          <!--       <div class="row form-extra-input">
                    <div class="large-4 medium-4 small-12 columns ic left">
                        <div class="input ic ">
                            <label class="title right" for="Industrial_CAT_CODE">
                                Category
                            <span style="color: red;">*</span></label>
                        </div>
                    </div>
                    <div class="large-8 medium-8 small-12 columns ic left">
                        <div class="input ic ">
                            <select class="form-control" name="category" required>
                                <option value="" selected disabled>Select Type</option>
                                <option value="1">Industry</option>
                                <option value="2">CNG</option>
                                <option value="3">Captive</option>
                            </select>
                        </div>
                    </div>
                </div> -->
                <!-- FORM MAIN BODY -->
                <form  method="post" action="">
                    <div class="row">
                        <div class="large-12 medium-12 small-12 columns " style="padding-left:0px;">
                            <ul class="tab" id="slick">
                                <li class="">Page-1</li>
                                <li class="active">Page-2</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row targetpanes" style="padding-top: 20px; display: block;">
                        <div class="large-12 medium-12 small-12 columns">
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_LAND_WIDTH">
                                            Land Width (Feet)
                                        <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5 required validator" type="number" name="land_width" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_LAND_HEIGHT">
                                            Land Length (Feet)
                                        <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5 required validator" type="number" name="land_length" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_RENT_OWNER_NAME">
                                            Owner Name If Rented
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5" type="text" name="owner_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_RENT_OWNER_ADDR">
                                            Owner Address If Rented
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5" type="text" name="owner_address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_LEASE_ORG_NAME">
                                            Lease Provider Organization Name If Leased
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5" type="text" name="organization_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_LEASE_ORG_ADDR">
                                            Lease Provider Organization Address If Leased
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5" type="text" name="organization_address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_GAS_USAGE_IN_AREA">
                                            Till Now (If Known), Any Other Customer Used/Using Gas In The Subjected Land?
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <select class="form-control" name="till_now" required>
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="1">Yes</option>
                                              <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 medium-12 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title left" for="Industrial_">If Yes Then Fill The Below Section:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_PREV_USAGE_CUST_CODE">
                                            Previous Customer's Customer Code
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5 masked-input" type="number" name="customer_code" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_PREV_USAGE_CUST_NAME" required>
                                            Factory/Organization Name
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5" type="text" name="factory_organization" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_PREV_USAGE_OWNER_NAME" required>
                                            Customer Name
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5" type="text" name="customer_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_PREV_USAGE_STATUS">
                                            Connection Status
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <select class="form-control" name="connection_status" required>
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="1">Test</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_PREV_USAGE_ARREAR_CERT">
                                            No Demand Certificate For The Clearance Of Gas Bill
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <select class="form-control" name="gash_bill" required>
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="1">Yes</option>
                                              <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right">
                                            Is Organization Owner, Partner
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <select class="form-control" name="partner_owner" required>
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="1">Yes</option>
                                              <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_OWNER_OTHER_INDUSTRY_CUST_NO">
                                            If Yes, Then Customer Code No
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5" type="number" name="customer_code_no" maxlength="50" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_OWNER_OTHER_INDUSTRY_ORG_NAME">
                                            Other Organization Name
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5" type="text" name="other_organization_name" maxlength="255" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right">
                                            Other Organization Status
                                        </label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5" type="text" name="other_organization_status" maxlength="50" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 medium-12 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title left" for="Industrial_"><b>Organization's Manufacturing Related Information:</b></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right">
                                            Production Type
                                        <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <select class="form-control" name="production_type" required>
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="1">Spontenous</option>
                                              <option value="1">With break</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right">
                                            Factory Starting Time
                                        <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5 masked-input required validator" placeholder="HH:MM" type="time" name="factory_start_time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 medium-4 small-12 columns ic left">
                                    <div class="input ic ">
                                        <label class="title right" for="Industrial_FAC_END_TIME">
                                            Factory Ending Time
                                        <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="large-8 medium-8 small-12 columns ic left">
                                    <div class="input ic ">
                                        <input class="w5 masked-input required validator" placeholder="HH:MM"  type="time" name="factory_end_time" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 medium-12 small-12 columns ic text-right">
                            <button id="form_next" type="submit" name="btnInd2" class="button radius small form-submit-button hide" style="width: 100px;">

                                Next Page
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
                <section>
                     <div class="row" style="background: white">
                            <div class="large-7 medium-10 small-12 columns section-content" style="display: none" id="industry_div3">
                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left" style="font-size: 0.8em;">
                                        Fields marked with <span style="color: red;">(*)</span> are mandatory.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left">
                                        &nbsp;
                                    </div>
                                </div>
                          <!--       <div class="row form-extra-input">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_CAT_CODE">
                                                Category
                                             <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <select class="form-control" name="category" required>
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="1">Industry</option>
                                                <option value="2">CNG</option>
                                                <option value="3">Captive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left">
                                        &nbsp;
                                    </div>
                                </div>

                                <div id="form-content" class="form-template" data-href="forms/add_form.html">
                                    <div class="row">
                                        <div class="large-12 medium-12 small-12 columns " style="padding-left:0px;">
                                            <ul class="tab" id="slick">
                                                <li class="">Page-1</li>
                                                <li class="" style="">Page-2</li>
                                                <li class="active" style="">Page-3</li>
                                                <li class="" style="display: none">Page-4</li>
                                                <div class="clrfx merge"></div>
                                            </ul>
                                        </div>
                                    </div>
                                <form method="post" action="">
                                    <div class="row targetpanes" style="padding-top: 20px; display: block;">
                                        <div class="large-12 medium-12 small-12 columns">
                                            <div class="row">
                                                <div class="large-12 medium-12 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title left" for="Industrial_"><b>Financial Information:</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_TIN_NO">
                                                            Organization Tax Identification No (TIN)
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <input class="w5 required" type="number" name="tex_identification" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_VAT_REG_NO">
                                                            VAT Registration No (If Applicable)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <input class="w5" type="number" name="vat_registration" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_BANK_NAME">
                                                            Bank Name
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <input class="w5 required" type="text" name="bank_name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_BANK_BRANCH">
                                                            Bank Branch
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <input class="w5 required" type="text" name="bank_branch" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 medium-12 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title left" for="Industrial_"><b>Load Related Information:</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 medium-12 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title left" for="Industrial_">
                                                            <b>Appliance and Burner Related Information::</b>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="large-12 medium-12 small-12 columns ic left  load-template" data-href="tables/table_8.1.html"><table>
                                                <thead>
                                                    <tr>
                                                        <td style="width: 6%;">Sl</td>
                                                        <td style="width: 11%;">Appliance Name</td>
                                                        <td style="width: 11%;">Appliance Size,<br>Ft. (L*W*H)</td>
                                                        <td style="width: 11%;">Appliance Production Capacity</td>
                                                        <td style="width: 17%;">Burner Type</td>
                                                        <td style="width: 11%;">Burner Count</td>
                                                        <td style="width: 11%;">Burner Capacity (cft/h)</td>
                                                        <td style="width: 11%;">Total load (cft/h)</td>
                                                        <td style="width: 11%;">Comments</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text" name="application_name[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_size[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_production[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_type[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_count[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_capacity[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="total_load[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text" name="comment[]" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text" name="application_name[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_size[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_production[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_type[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_count[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number"name="burner_capacity[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="total_load[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text" name="comment[]" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3.</td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text"  name="application_name[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_size[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_production[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_type[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_count[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_capacity[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="total_load[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text" name="comment[]" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4.</td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text" name="application_name[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_size[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_production[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_type[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_count[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_capacity[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="total_load[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text" name="comment[]" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5.</td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text" name="application_name[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_size[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="application_production[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_type[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_count[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="burner_capacity[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="number" name="total_load[]" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input ic ">
                                                                <input class="w5" type="text" name="comment[]" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-4 medium-4 small-12 columns ic left">
                                            <div class="input ic ">
                                                <label class="title right" for="Industrial_GAS_USAGE_RATE">
                                                    Gas Usage/Hour
                                                 <span style="color: red;">*</span></label>
                                            </div>
                                        </div>
                                        <div class="large-8 medium-8 small-12 columns ic left">
                                            <div class="input ic ">
                                                <input class="w5 required validator" type="text" name="gas_hour" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-4 medium-4 small-12 columns ic left">
                                            <div class="input ic ">
                                                <label class="title right" for="Industrial_GAS_USAGE_UNIT">
                                                    Gas Usage Unit
                                                 <span style="color: red;">*</span></label>
                                            </div>
                                        </div>
                                        <div class="large-8 medium-8 small-12 columns ic left">
                                            <div class="input ic ">
                                                <div class="input ic ">
                                                    <select class="form-control" name="gas_unit" required>
                                                        <option value="" selected disabled>Select Type</option>
                                                        <option value="1">Test</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-4 medium-4 small-12 columns ic left">
                                            <div class="input ic ">
                                                <label class="title right" for="Industrial_EXP_PRESSURE_START">
                                                    Expected Gas Pressure (PSIG/WC)
                                                     <span style="color: red;">*</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="large-8 medium-8 small-12 columns ic left">
                                            <div class="input ic ">
                                                <input class="w5" type="text" name="gas_pressure1" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="large-4 medium-4 small-12 columns ic left">
                                            <div class="input ic ">
                                                <label class="title right" for="Industrial_EXP_PRESSURE_UNIT">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </div>
                                        <div class="large-8 medium-8 small-12 columns ic left">
                                            <div class="input ic ">
                                                <div class="input ic ">
                                                    <select class="form-control"  name="gas_pressure2" required>
                                                        <option value="" selected disabled>Select Type</option>
                                                        <option value="1">Test</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-12 medium-12 small-12 columns ic left">
                                            <div class="input ic ">
                                                <label class="title left" for="Industrial_">
                                                    <b>Expected Gas when Need::</b>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="large-12 medium-12 small-12 columns ic left  load-template" data-href="tables/table_9.html">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <td style="width: 10%;">Year</td>
                                                        <td style="width: 20%;">Demand</td>
                                                        <td style="width: 20%;">Cubic Meter</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input ic ">a)
                                                            <input class="w5" type="number" name="year[]" required>
                                                        </div>
                                                        <div class="input ic ">b)
                                                            <input class="w5" type="number" name="year[]" required>
                                                        </div>
                                                        <div class="input ic ">c)
                                                            <input class="w5" type="text" name="year[]" required>
                                                        </div>
                                                        <div class="input ic ">d)
                                                            <input class="w5" type="text" name="year[]" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <div class="input ic ">a)
                                                        <input class="w5" type="number" name="demand[]" required>
                                                        </div>
                                                        <div class="input ic ">b)
                                                            <input class="w5" type="number" name="demand[]" required>
                                                        </div>
                                                        <div class="input ic ">c)
                                                            <input class="w5" type="text" name="demand[]" required>
                                                        </div>
                                                        <div class="input ic ">d)
                                                            <input class="w5" type="text" name="demand[]" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input ic ">a)
                                                            <input class="w5" type="number" name="cubic_meter[]" required>
                                                        </div>
                                                        <div class="input ic ">b)
                                                            <input class="w5" type="number" name="cubic_meter[]" required>
                                                        </div>
                                                        <div class="input ic ">c)
                                                            <input class="w5" type="text" name="cubic_meter[]" required>
                                                        </div>
                                                        <div class="input ic ">d)
                                                            <input class="w5" type="text" name="cubic_meter[]" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title left" for="Industrial_">
                                                <b>Production Related Information use Yearly ingredients::</b>
                                            </label>
                                        </div>
                                    </div>
                                        <div class="large-12 medium-12 small-12 columns ic left  load-template" data-href="tables/table_9.html">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <td width="20%">Produced Goods Name</td>
                                                        <td width="20%">Yearly Production</td>
                                                        <td width="20%">Where Sold<p>Local / International</p></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input ic ">a)
                                                            <input class="w5" type="text" name="goods_name[]" required>
                                                        </div>
                                                        <div class="input ic ">b)
                                                            <input class="w5" type="text" name="goods_name[]" required>
                                                        </div>
                                                        <div class="input ic ">c)
                                                            <input class="w5" type="text" name="goods_name[]" required>
                                                        </div>
                                                        <div class="input ic ">d)
                                                            <input class="w5" type="text" name="goods_name[]" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <div class="input ic ">a)
                                                        <input class="w5" type="number" name="yearly_production[]" required>
                                                        </div>
                                                        <div class="input ic ">b)
                                                            <input class="w5" type="number" name="yearly_production[]" required>
                                                        </div>
                                                        <div class="input ic ">c)
                                                            <input class="w5" type="number" name="yearly_production[]" required>
                                                        </div>
                                                        <div class="input ic ">d)
                                                            <input class="w5" type="number" name="yearly_production[]" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input ic ">a)
                                                            <input class="w5" type="text" name="sold[]" required>
                                                        </div>
                                                        <div class="input ic ">b)
                                                            <input class="w5" type="text" name="sold[]" required>
                                                        </div>
                                                        <div class="input ic ">c)
                                                            <input class="w5" type="text" name="sold[]" required>
                                                        </div>
                                                        <div class="input ic ">d)
                                                            <input class="w5" type="text" name="sold[]" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title left" for="Industrial_">
                                                <b>Information of related person(s) who has signatory power/contact to accomplish any required process::</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="large-12 medium-12 small-12 columns ic left  load-template" data-href="tables/table_9.html">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td style="width: 10%;">Serial No.</td>
                                                <td style="width: 20%;">a) Name<br>b) Designation</td>
                                                <td style="width: 20%;">a) National ID<br>b) Mobile<br>c) Email</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>
                                                <div class="input ic ">a)
                                                    <input class="w5" type="text" name="name[]" required>
                                                </div>
                                                <div class="input ic ">b)
                                                    <input class="w5" type="text" name="desingnation[]" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input ic ">a)
                                                    <input class="w5" type="number" name="national[]" required>
                                                </div>
                                                <div class="input ic ">b)
                                                    <input class="w5" type="number" name="mobile[]" required>
                                                </div>
                                                <div class="input ic ">c)
                                                    <input class="w5" type="text" name="email[]" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>
                                                <div class="input ic ">a)
                                                    <input class="w5" type="text" name="name[]" required>
                                                </div>
                                                <div class="input ic ">b)
                                                    <input class="w5" type="text" name="desingnation[]" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input ic ">a)
                                                    <input class="w5" type="number" name="national[]" required>
                                                </div>
                                                <div class="input ic ">b)
                                                    <input class="w5" type="number" name="mobile[]" required>
                                                </div>
                                                <div class="input ic ">c)
                                                    <input class="w5" type="email" name="email[]" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>
                                                <div class="input ic ">a)
                                                    <input class="w5" type="text" name="name[]" required>
                                                </div>
                                                <div class="input ic ">b)
                                                    <input class="w5" type="text" name="desingnation[]" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input ic ">a)
                                                    <input class="w5" type="number" name="national[]" required>
                                                </div>
                                                <div class="input ic ">b)
                                                    <input class="w5" type="number" name="mobile[]" required>
                                                </div>
                                                <div class="input ic ">c)
                                                    <input class="w5" type="email" name="email[]" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>
                                                <div class="input ic ">a)
                                                    <input class="w5" type="text" name="name[]" required>
                                                </div>
                                                <div class="input ic ">b)
                                                    <input class="w5" type="text" name="desingnation[]" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input ic ">a)
                                                    <input class="w5" type="number" name="national[]" required>
                                                </div>
                                                <div class="input ic ">b)
                                                    <input class="w5" type="number" name="mobile[]" required>
                                                </div>
                                                <div class="input ic ">c)
                                                    <input class="w5" type="email" name="email[]" required>
                                                </div>
                                            </td>
                                        </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td>
                                                    <div class="input ic ">a)
                                                        <input class="w5" type="text" name="name[]" required>
                                                    </div>
                                                    <div class="input ic ">b)
                                                        <input class="w5" type="text" name="desingnation[]" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input ic ">a)
                                                        <input class="w5" type="number" name="national[]" required>
                                                    </div>
                                                    <div class="input ic ">b)
                                                        <input class="w5" type="number" name="mobile[]" required>
                                                    </div>
                                                    <div class="input ic ">c)
                                                        <input class="w5" type="email" name="email[]" required>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-12 medium-12 small-12 columns ic text-right">
                                            <button id="form_next" type="submit" name="btnInd3"  class="button radius small form-submit-button hide" style="width: 100px;">
                                                Next Page
                                            </button>

                                        </div>
                                     </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>


                        <section>

                            <div class="row" style="background: white">
                                <div class="large-7 medium-10 small-12 columns section-content" style="display: none;" id="industry_div4" >
                                    <!-- FORM MAIN BODY -->

                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left">
                                        &nbsp;
                                    </div>
                                </div>
                        <!--         <div class="row form-extra-input">
                                    <div class="large-4 medium-4 small-12 columns ic left">
                                        <div class="input ic ">
                                            <label class="title right" for="Industrial_CAT_CODE">
                                                Category
                                             <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="large-8 medium-8 small-12 columns ic left">
                                        <div class="input ic ">
                                            <select class="form-control" name="category" required>
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="1">Industry</option>
                                                <option value="2">CNG</option>
                                                <option value="3">Captive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="large-12 medium-12 small-12 columns ic left">
                                        &nbsp;
                                    </div>
                                </div>
                                    <?php
                                        if (!empty($_SESSION['img_error'])) {
                                            echo $_SESSION['img_error'];
                                            unset($_SESSION['img_error']);
                                        }
                                    ?>  
                                    <form method="post" enctype="multipart/form-data" action="">
                                        <div id="form-content" class="form-template" data-href="forms/add_form.html">
                                            <div class="row">
                                                <div class="large-12 medium-12 small-12 columns " style="padding-left:0px;">
                                                    <ul class="tab" id="slick">
                                                        <li class="">Page-1</li>
                                                        <li class="" style="">Page-2</li>
                                                        <li class="" style="">Page-3</li>
                                                        <li class="active" style="">Page-4</li>
                                                        <div class="clrfx merge"></div>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="row targetpanes" style="padding-top: 20px; display: block;">
                                                <div class="large-12 medium-12 small-12 columns">
                                                    <div class="row">
                                                        <div class="large-12 medium-12 small-12 columns ic left  load-template" data-href="tables/table_10.html"><table>
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 30%;"></td>
                                                                <td style="width: 20%;">Applicant's Name :</td>
                                                                <td style="width: 30%;">
                                                                    <div class="input ic ">
                                                                        <input class="w5" type="text" name="application_name" required>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>Designation :</td>
                                                                <td>
                                                                    <div class="input ic ">
                                                                        <input class="w5" type="text" name="desingnation" required>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                             </div>
                                            <div class=" load-template" data-href="attachments/attachment.html"><div class="row">
                                                <div class="large-12 medium-12 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title left">
                                                            <b>Attachments:</b>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_PASSPORT_PHOTO">
                                                            Passport Size Photo
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_PASSPORT_PHOTO">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" accept=".pdf,.jpg,.jpeg,.png" name="ind4_imgs[]" id="Industrial_PASSPORT_PHOTO" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required>
                                                        <label class="input" for="Industrial_PASSPORT_PHOTO" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_TRD_LIC">
                                                            Trade License
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_TRD_LIC">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" name="ind4_imgs[]" id="Industrial_TRD_LIC" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required accept=".pdf,.jpg,.jpeg,.png">
                                                        <label class="input" for="Industrial_TRD_LIC" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_TIN">
                                                            TIN Certificates
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_TIN">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" name="ind4_imgs[]" id="Industrial_TIN" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required accept=".pdf,.jpg,.jpeg,.png">
                                                        <label class="input" for="Industrial_TIN" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_MAOA_COI">
                                                            Memorandum &amp; Article Of Association and Certificate Of Incorporation's (For Registered Companies)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_MAOA_COI">
                                                            Choose File
                                                        </label>
                                                        <input class="w5" type="file" name="ind4_imgs[]" id="Industrial_MAOA_COI" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" accept=".pdf,.jpg,.jpeg,.png" required>
                                                        <label class="input" for="Industrial_MAOA_COI" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_PROOF_DOC">
                                                            Proof Document
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_PROOF_DOC">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" name="ind4_imgs[]" id="Industrial_PROOF_DOC" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required accept=".pdf,.jpg,.jpeg,.png">
                                                        <label class="input" for="Industrial_PROOF_DOC" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_RENT_AGRMNT">
                                                            Rent Agreement
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_RENT_AGRMNT">
                                                            Choose File
                                                        </label>
                                                        <input class="w5" type="file" name="ind4_imgs[]" id="Industrial_RENT_AGRMNT" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" accept=".pdf,.jpg,.jpeg,.png" required>
                                                        <label class="input" for="Industrial_RENT_AGRMNT" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_FACTORY_LAYOUT_PLAN">
                                                            Factory's Layout Plan
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_FACTORY_LAYOUT_PLAN">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" name="ind4_imgs[]" id="Industrial_FACTORY_LAYOUT_PLAN" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required accept=".pdf,.jpg,.jpeg,.png">
                                                        <label class="input" for="Industrial_FACTORY_LAYOUT_PLAN" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_PIPELINE_DESIGN">
                                                            Proposed Pipeline Design
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_PIPELINE_DESIGN">
                                                            Choose File
                                                        </label>
                                                        <input class="w5" type="file" name="ind4_imgs[]" id="Industrial_PIPELINE_DESIGN" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" accept=".pdf,.jpg,.jpeg,.png" required>
                                                        <label class="input" for="Industrial_PIPELINE_DESIGN" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_TECH_CATALOG">
                                                            Technical Catalog
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_TECH_CATALOG">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" name="ind4_imgs[]" id="Industrial_TECH_CATALOG" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required accept=".pdf,.jpg,.jpeg,.png">
                                                        <label class="input" for="Industrial_TECH_CATALOG" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_SIGNATURE">
                                                            Signature
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_SIGNATURE">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" name="ind4_imgs[]" id="Industrial_SIGNATURE" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required accept=".pdf,.jpg,.jpeg,.png">
                                                        <label class="input" for="Industrial_SIGNATURE" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_NID">
                                                            NID
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_NID">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" name="ind4_imgs[]" id="Industrial_NID" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required accept=".pdf,.jpg,.jpeg,.png">
                                                        <label class="input" for="Industrial_NID" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_INDUSTRY_CERTIFICATE">
                                                            Certificate of Registration as Industry
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_INDUSTRY_CERTIFICATE">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" name="ind4_imgs[]" id="Industrial_INDUSTRY_CERTIFICATE" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required accept=".pdf,.jpg,.jpeg,.png">
                                                        <label class="input" for="Industrial_INDUSTRY_CERTIFICATE" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_ENVIRONMENT_NOC">
                                                            NOC of Dept. of Environment
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_ENVIRONMENT_NOC">
                                                            Choose File
                                                         <span style="color: red;">*</span></label>
                                                        <input class="w5 required validator" type="file" name="ind4_imgs[]" id="Industrial_ENVIRONMENT_NOC" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" required accept=".pdf,.jpg,.jpeg,.png">
                                                        <label class="input" for="Industrial_ENVIRONMENT_NOC" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                         <span style="color: red;">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row" style="padding-left: 0px !important;">
                                                <div class="large-4 medium-4 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title right" for="Industrial_OTHERS">
                                                            Others (If any)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <label class="button" for="Industrial_OTHERS">
                                                            Choose File
                                                        </label>
                                                        <input class="w5" type="file" name="ind4_imgs[]" id="Industrial_OTHERS" onchange="this.nextSibling.nextSibling.innerHTML = this.value;" accept=".pdf,.jpg,.jpeg,.png" required>
                                                        <label class="input" for="Industrial_OTHERS" style="color: #777777; font-size: 13px;">
                                                            Upload File
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 medium-12 small-12 columns ic left">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 medium-12 small-12 columns ic text-right">
                                    <button name="btnPost" type="submit" class="button radius small form-submit-button" style="width: 100px;">
                                        <span class="helpful">Post</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

   <?php echo include('footer.php'); ?>
