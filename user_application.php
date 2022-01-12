<?php
 session_start();
   if (!isset($_SESSION['adminId'])) {
    header('location: login.php');
  }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "industry";

    $conn = new mysqli($servername, $username, $password,$database);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $user_data = mysqli_query($conn,"SELECT users.*, industry.*, organization_owner.*, industry2.*, industry3.*, industry4.*,organization_owner.name As organization_name,
                                                industry.mobile As industry1_mobile,industry.email As industry1_email
                                                ,industry2.organization_name As ind2_organization_name,organization_owner.designation As organization_designation,
                                                industry3.application_name As ind3_application_name,
                                                industry4.designation As ind4_desingnation

                                                FROM users
                                                JOIN industry ON users.id = industry.user_id
                                                JOIN organization_owner ON industry.id=organization_owner.industry_id
                                                JOIN industry2 ON industry.id=industry2.industry_id
                                                JOIN industry3 ON industry.id=industry3.industry_id
                                                JOIN industry4 ON industry.id=industry4.industry_id
                                                WHERE users.id='$user_id' ");
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
?>


<!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable=yes">
        <meta name="description" content="">
        <meta name="author" content="Faisal">

        <title>SGCL Admin</title>

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
                <div class="dbr toggle-panel-wrapper" style="margin-top: 8px;">
                    <nav>
                        <div class="wrapper">
                          <ul>
                              <li class="clickSlide">
                                <span class="toggle-panel"></span>
                                  <ul>
                                      <li><a href="admin_dashboard.php">Industry</a></li>
                                      <li><a href="#">Commercial</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </div>
                    </nav>
                </div>
                <div class="dbr logo-wrapper">
                    <div id="hide logo" style="">
                        <a class="hide" href="#">
                            <img src="./TGTDCL Online Application_1_files/sgcl_logo.png">
                        </a>
                    </div>
                    <div class="hidden-for-small-only">
                        <a href="admin_dashboard.php">
                            <h1 class="logo-text hidden-for-small-only" style="font-size: 16px !important; margin-top: 0.6em;">
                                Admin
                            </h1>
                        </a>
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
            .tiny .toggle-panel {
                margin-top: 2px;
            }
        </style>


        <div class="printBtn"><!-- Begin: rc_footer -->
            <a href="admin_invoice.php?user_id=<?php echo  $user_id; ?>" target="_blank"><button class="btn btn-info" type="submit" class="sign">Download</button></a>
        </div>
        <div class="portlet light certificate" id="industrialReport">
            <div style="width: 100%" align="center">
                <table style="text-align: center">
                    <tbody><tr>
                        <td width="15%" rowspan="3"><img src="sgcl_logo.png" width="100px" height="100px"></td>
                        <td width="70%" style="font-size: 18px; font-weight: bolder">Sundarban Gas Company Limited (A Company of Petrobangla)
                        </td>
                        <td width="15%" rowspan="3"><img id="passportSizePhoto" height="150px" width="150px" src="10300000104.jpg"></td>

                    </tr>
                    <tr>
                        <td style="font-size: 15px;">218,M. A. Bari Sarak , Abir Tower, Sonadanga , Khulna-9100</td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px;">Industrial/Seasonal/Captive/C.N.G./Others Gas Connection Application</td>
                    </tr>
                </tbody></table>
            </div>
            <div>
                <br><br>
                <div style="width: 95%" align="center">
                    <table style="width: 100%">
                        <tbody>
             <!--                <tr>
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
                            </tr> -->
                            <tr>
                                <td>Application ID:</td>
                                <td id="APPLICATION_ID"><?php echo $n['application_id']; ?></td>
                            </tr>
                            <tr>
                                <td>Application Date:</td>
                                <td id="APPLICATION_DATE"><?php echo $n['application_date']; ?></td>
                            </tr>
                            <tr>
                                <td>Zone:</td>
                                <td id="ZONE_NAME">Zone-1:Tikatuli</td>
                            </tr>
                            <tr>
                                <td>1. Factory Name:</td>
                                <td id="CUST_NAME"><?php echo $n['factory_name']; ?></td>
                            </tr>
                            <tr>
                                <td>2. Factory Adress:</td>
                                <td id="SER_ADDR1"><?php echo $n['factory_address1']; ?></td>
                            </tr>
                            <tr>
                                <td id="SER_ADDR2"> <?php echo $n['factory_address2']; ?> </td>
                            </tr>
                            <tr>
                                <td id="SER_ADDR3"> <?php echo $n['factory_address3']; ?> </td>
                            </tr>
                            <tr>
                                <td>3. Factory Telephone (If Any):</td>
                                <td id="ser_PHONE"><?php echo $n['factory_telephone'];?></td>
                            </tr>
                            <tr>
                                <td>4. Main Office Address:</td>
                                <td id="OWNER_ADDR1"><?php echo $n['main_address1'];?></td>
                            </tr>
                            <tr>
                                <td id="OWNER_ADDR2"> <?php echo $n['main_address2'];?> </td>
                            </tr>
                            <tr>
                                <td id="OWNER_ADDR3"> <?php echo $n['main_address3'];?> </td>
                            </tr>
                            <tr>
                                <td>5. Main Office Telephone (If Any):</td>
                                <td id="OWNER_PHONE"><?php echo $n['main_office_phone'] ?></td>
                            </tr>
                            <tr>
                                <td>6. Billing Address:</td>
                                <td id="BILL_ADDR1"><?php echo $n['billing_address1'] ?></td>
                            </tr>
                            <tr>
                                <td id="BILL_ADDR2"><?php echo $n['billing_address2'] ?></td>
                            </tr>
                            <tr>
                                <td id="BILL_ADDR3"><?php echo $n['billing_address3'] ?></td>
                            </tr>
                            <tr>
                                <td>7. Billing Telephone No (If Any):</td>
                                <td id="CUST_PHONE"><?php echo $n['billing_telephone']; ?></td>
                            </tr>
                            <tr>
                                <td>8. Mobile:</td>
                                <td id="CUST_MOBILE"><?php echo $n['industry1_mobile']; ?></td>
                            </tr>
                            <tr>
                                <td>9. Email:</td>
                                <td id="CUST_EMAIL"><?php echo $n['industry1_email']; ?></td>
                            </tr>
                            <tr>
                                <td>10. National ID:</td>
                                <td id="CUST_NID"><?php echo $n['national_id']; ?></td>
                            </tr>
                            <tr>
                                <td>11. Tax Identification No:</td>
                                <td id="CUST_TIN"><?php echo $n['tex_identification']; ?></td>
                            </tr>
                            <tr>
                                <td>12. GIS Location:</td>
                                <td id="GIS_INFO"><?php echo $n['gis_location']; ?></td>
                            </tr>
                            <tr>
                                <td>13. Organization Ownership Type:</td>
                                <td id="OWNERSHIP_TYPE"><?php echo $n['organization_ownership']; ?></td>
                            </tr>
                            <tr>
                                <td>14. Industry Type:</td>
                                <td id="INDUSTRY_TYPE"><?php echo $n['industry_type']; ?></td>
                            </tr>
                            <tr>
                                <td>15. Trade License No:</td>
                                <td id="TRD_LIC_NO"><?php echo $n['trade_licence_no']; ?></td>
                            </tr>
                            <tr>
                                <td>16. License Expiry Date:</td>
                                <td id="TRD_EXP_DATE"><?php echo $n['licence_expiry_date']; ?></td>
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
                                        <td rowspan="3" style="vertical-align: top;border: 1px solid black"><?php echo $key+1 ?></td>
                                        <td rowspan="3" style="vertical-align: top;border: 1px solid black" id="OWNER_NAME1"><?php echo $names[$key]; ?></td>
                                        <td style="border: 1px solid black" id="OWNER_GUARDIAN1"><?php echo $father_hus_names[$key]; ?></td>
                                        <td style="border: 1px solid black" id="OWNER_DESIG1"><?php echo $designations[$key]; ?></td>
                                    </tr>
                                    <tr style="border: 1px solid black;" id="ownerSub11">
                                        <td style="border: 1px solid black" id="OWNER_PRSNT_ADDR1"><?php echo $present_addresses[$key]; ?></td>
                                        <td style="border: 1px solid black" id="OWNER_REL_OTHR1"><?php echo $relations[$key]; ?></td>
                                    </tr>
                                    <tr style="border: 1px solid black;" id="ownerSub12">
                                        <td style="border: 1px solid black" id="OWNER_MOBILE1"><?php echo $mobiles[$key]; ?></td>
                                        <td style="border: 1px solid black" id="OWNER_EMAIL1"><?php echo $emails[$key]; ?></td>
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
                                <td id="SER_MOUZA_NAME"><?php echo $n['mouza_name']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.2. Daag No:</td>
                                <td id="SER_LINE_NO"><?php echo $n['daag_no']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.2. Khotiyan No:</td>
                                <td id="SER_DOC_NO"><?php echo $n['khotiyan_no']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.3. Total Land Area (In Acre):</td>
                                <td id="SER_LAND_AREA"><?php echo $n['total_land_area']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.4. Land Ownership:</td>
                                <td id="SER_LAND_OWNER"><?php echo $n['land_ownership']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.5. Land Width (Feet):</td>
                                <td id="LAND_WIDTH"><?php echo $n['land_width']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.6. Land Length (Feet):</td>
                                <td id="LAND_HEIGHT"><?php echo $n['land_length']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.7. Owner Name If Rented:</td>
                                <td id="RENT_OWNER_NAME"><?php echo $n['owner_name']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.8. Owner Address If Rented:</td>
                                <td id="RENT_OWNER_ADDR"><?php echo $n['owner_address']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.9. Lease Provider Organization Name If Leased:</td>
                                <td id="LEASE_ORG_NAME"><?php echo $n['ind2_organization_name']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.10. Lease Provider Organization Address If Leased:</td>
                                <td id="LEASE_ORG_ADDR"><?php echo $n['organization_address']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.11. Till Now (If Known), Any Other Customer Used/Using
                                     Gas In The Subjected Land:
                                </td>
                                <td id="GAS_USAGE_IN_AREA"><?php echo $n['till_now']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">If Yes Then Fill The Below Section:</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.12. Previous Customer's Customer Code:</td>
                                <td id="PREV_USAGE_CUST_CODE"><?php echo $n['customer_code']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.13. Factory/Organization Name:</td>
                                <td id="PREV_USAGE_CUST_NAME"><?php echo $n['factory_organization']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.14. Customer Name:</td>
                                <td id="PREV_USAGE_OWNER_NAME"><?php echo $n['customer_name']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.15. Connection Status:</td>
                                <td id="PREV_USAGE_STATUS"><?php echo $n['connection_status']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.16. No Demand Certificate For The Clearance Of Gas
                                    Bill:
                                </td>
                                <td id="PREV_USAGE_ARREAR_CERT"><?php echo $n['gash_bill']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.17. Is Organization Owner,Partner, Chairman or Other
                                    Directors Having Any Connected/Disconnected Gas Connection in Any of Their Organization  in Titas Franchise Area:
                                </td>
                                <td id="OWNER_OTHER_INDUSTRY"><?php echo $n['partner_owner']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.18. If Yes, Then Customer Code No:</td>
                                <td id="OWNER_OTHER_INDUSTRY_CUST_NO"><?php echo $n['customer_code_no']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.19. Other Organization Name:</td>
                                <td id="OWNER_OTHER_INDUSTRY_ORG_NAME"><?php echo $n['other_organization_name']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">18.1.20. Other Organization Status:</td>
                                <td id="OWNER_OTHER_INDUSTRY_ORG_STAT"><?php echo $n['other_organization_status']; ?></td>
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
                            <td id="PRODUCTION_TYPE" style="width: 40%;"><?php echo $n['production_type']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 40px">19.2. Factory Starting Time:</td>
                            <td id="FAC_START_TIME"><?php echo $n['factory_start_time']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 40px">19.3. Factory Ending Time:</td>
                            <td id="FAC_END_TIME"><?php echo $n['factory_end_time']; ?></td>
                        </tr>
                        <tr>
                            <td>20. Financial Information:</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 40px">20.1. Organization Tax Identification No (TIN) :</td>
                            <td id="TIN_NO"><?php echo $n['tex_identification']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 40px">20.2. VAT Registration No (If Applicable):</td>
                            <td id="VAT_REG_NO"><?php echo $n['vat_registration']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 40px">20.3. Bank Name:</td>
                            <td id="BANK_NAME"><?php echo $n['bank_name']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 40px">20.4. Bank Branch:</td>
                            <td id="BANK_BRANCH"><?php echo $n['bank_branch']; ?></td>
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
                                    <td style="border: 1px solid black" id="APPL_NAME1"><?php echo $application_names[$key]; ?></td>
                                    <td style="border: 1px solid black" id="APPL_SIZE1"><?php echo $application_sizes[$key]; ?></td>
                                    <td style="border: 1px solid black" id="APPL_SIZE1"><?php echo $application_productions[$key]; ?></td>
                                    <td style="border: 1px solid black" id="APPL_PROD_CAP1"><?php echo $burner_types[$key]; ?></td>
                                    <td style="border: 1px solid black" id="BURNER_COUNT1"><?php echo $burner_counts[$key]; ?></td>
                                    <td style="border: 1px solid black" id="BURNER_CAP1"><?php echo $burner_capacities[$key]; ?>.0</td>
                                    <td style="border: 1px solid black" id="BURNER_LOAD1"><?php echo $total_loads[$key]; ?></td>
                                    <td style="border: 1px solid black" id="APPL_COMMENTS1"><?php echo $commnets[$key]; ?></td>
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
                                <td id="GAS_USAGE_RATE" style="width: 40% ;"><?php echo $n['gas_hour']; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">21.3. Gas Usage Unit:</td>
                                <td id="GAS_USAGE_UNIT"><?php echo $n['gas_unit']; ?></td>
                            </tr>
                   <!--          <tr>
                                <td style="padding-left: 40px">21.4. Expected Gas Pressure (PSIG/WC):</td>
                                <td id="EXP_PRESSURE_START"><?php echo $n['gas_pressure1'] ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td id="EXP_PRESSURE_UNIT"><?php echo $n['gas_pressure2'] ?></td>
                            </tr> -->
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
                                    <td><?php echo $years[$key]; ?></td>
                                    <td><?php echo $demands[$key]; ?></td>
                                    <td><?php echo $cubic_meters[$key]; ?></td>
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
                                <td width="20%">Where Sold<p>Local / International</p></td>
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
                                        <td><?php echo $goods_names[$key]; ?></td>
                                        <td><?php echo $yearly_productions[$key]; ?></td>
                                        <td><?php echo $solds[$key]; ?></td>
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
                                $image          = $n['image'];
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
                                $signature      = explode(',',$image);

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
                          
                                foreach($names as $key => $value){
                            ?>
                            <tr style="border: 1px solid black;" id="related1">
                                <td style="border: 1px solid black" rowspan="3">1</td>
                                <td style="border: 1px solid black" id="PWR_ATRN_NAME1"><?php echo $names[$key]; ?></td>
                                <td style="border: 1px solid black" id="PWR_ATRN_NID1"><?php echo $nationals[$key]; ?></td>
                            </tr>
                            <tr style="border: 1px solid black;" id="relatedSub11">
                                <td style="border: 1px solid black" id="PWR_ATRN_DESIG1"><?php echo $desingnations[$key]; ?></td>
                                <td style="border: 1px solid black" id="PWR_ATRN_MOBILE1"><?php echo $mobiles[$key]; ?></td>
                            </tr>
                            <tr style="border: 1px solid black;" id="relatedSub12">
                                <td style="border: 1px solid black">&nbsp;</td>
                                <td style="border: 1px solid black" id="PWR_ATRN_EMAIL1"><?php echo $emails[$key]; ?></td>
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
                            <td style="border: 1px solid black" width="40%" id="APPLICANT_NAME"><?php echo $n['application_name'] ?></td>
                            </tr>
                            <tr style="border: 1px solid black">
                                <td style="border: 1px solid black">Designation</td>
                                <td style="border: 1px solid black" id="APPLICANT_DESIG"><?php echo $n['ind4_desingnation'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%">
                        <tbody>
                            <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black" width="60%">Signature</td>
                                <td style="border: 1px solid black" width="40%" id="APPLICANT_NAME">
                                      <img id="signature1" height="40px" width="120px" src="upload/<?php echo $signature[9];?>"> 
                                </td>
                            </tr>
                        </tbody>
                    </table>

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
                                    <a target="_blank" href="user_application.php?file=<?php echo $passport_img[0];?>" name="btnDownload">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.2. Trade License:</td>
                                <td id="TRD_LIC">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $trade_licence_img[1];?>">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.3. TIN Certificates:</td>
                                <td id="TIN">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $tin_certificate[2];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.4. Memorandum &amp; Article Of Association and Certificate Of
                                    Incorporation's (For Registered Companies):
                                </td>
                                <td id="MAOA_COI">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $association_certificate[3];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.5. Proof Document:</td>
                                <td id="PROOF_DOC">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $proof_document[4];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.6. Rent Agreement:</td>
                                <td id="RENT_AGRMNT">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $rent_agreement[5];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.7. Factory's Layout Plan:</td>
                                <td id="FACTORY_LAYOUT_PLAN">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $factory_layouts[6];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.8. Proposed Pipeline Design:</td>
                                <td id="PIPELINE_DESIGN">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $proposed_design[7];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.9. Technical Catalog:</td>
                                <td id="TECH_CATALOG">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $technical_catelog[8];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.10. Signature:</td>
                                <td id="SIGNATURE">Yes</td>
                                <td>
                                     <a target="_blank" href="user_application.php?file=/<?php echo $signature[9];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.11. Nid:</td>
                                <td id="NID">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $nid[10];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.12. Industry Certificate:</td>
                                <td id="INDUSTRY_CERTIFICATE">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $certificate_of_registration[11];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.13. Environment Noc:</td>
                                <td id="ENVIRONMENT_NOC">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $noc_of_department[12];?>">Download </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 40px">24.15. Others:</td>
                                <td id="OTHERS">Yes</td>
                                <td>
                                    <a target="_blank" href="user_application.php?file=/<?php echo $others[13];?>">Download </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <br><br><br>

                    <div style="float: left ">
                        <div style="width: 100px">
                            <img id="signature1" height="80px" width="300px" src="10300000105.jpg">
                        </div>
                        <div style="border-top: 1px solid black ; width: 100px">Signature</div>
                    </div>
                </div>
            </div>
            <div style="clear:both"></div>
            <div style="position: fixed;left: 0;bottom: 0;width: 100%;color: #347AB7;text-align: right;">
                <p>Powered by:    � <span>2021</span> <a href="https://www.sgcl.org.bd/" target="_blank">SGCL</a></p>
            </div>
        </div>
       <div>
            <h2>Attachments</h2>
      

            <div id="attachments" style="width: 100%;" align="center">
                Passport Size Photo : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=<?php echo $passport_img[0];?>" name="btnDownload">Download </a>
                <br>
                Trade License : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $trade_licence_img[1];?>">Download</a>
                <br>
                TIN Certificates : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $tin_certificate[2];?>">Download </a>
                <br>
                Memorandum &amp; Article Of Association and Certificate Of Incorporation's (For Registered Companies) : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $association_certificate[3];?>">Download </a>
                <br>
                Proof Document : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $proof_document[4];?>">Download </a>
                <br>
                Rent Agreement : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $rent_agreement[5];?>">Download </a>
                <br>
                Factory's Layout Plan : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $factory_layouts[6];?>">Download </a>
                <br>
                Proposed Pipeline Design : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $proposed_design[7];?>">Download </a>
                <br>
                Technical Catalog : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $technical_catelog[8];?>">Download </a>
                <br>
                SIGNATURE : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $signature[9];?>">Download </a>
                <br>
                NID : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $nid[10];?>">Download </a>
                <br>
                Certificate of Registration as Industry : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $certificate_of_registration[11];?>">Download </a>
                <br>
                NOC of Dept. of Environment : &nbsp; &nbsp; &nbsp;
                <a target="_blank" href="user_application.php?file=/<?php echo $noc_of_department[12];?>">Download </a>
                <br>
                Others : &nbsp; &nbsp; &nbsp;<a target="_blank" href="user_application.php?file=/<?php echo $others[13];?>">Download </a>
                <br>
            </div>
        </div>
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
        <script type="text/javascript" src="modernizr.js.download"></script>
        <script type="text/javascript" src="jquery.core.js.download"></script>
        <script type="text/javascript" src="jquery.ui.js.download"></script>
        <script type="text/javascript" src="plugins.js.download"></script>
        <script type="text/javascript" src="slick_grid.js.download"></script>

        <script type="text/javascript" src="./TGTDCL Online Application_files/slick.common.js.download"></script>
        <script type="text/javascript" src="./TGTDCL Online Application_files/datepicker.all.js.download"></script>
        <script type="text/javascript" src="./TGTDCL Online Application_files/jquery.maskedinput.min.js.download"></script>
        <script type="text/javascript" src="./TGTDCL Online Application_files/hack.js.download"></script>
            <script type="text/javascript">
                  $(".clickSlide ul").hide();
                  $(".clickSlide").click(function(){
                      $(this).children("ul").stop(true,true).slideToggle("fast"),
                      $(this).toggleClass("dropdown-active");
                  });
            </script>
        </script>
    </body>
</html>
