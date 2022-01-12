<?php
 session_start();
   if (!isset($_SESSION['adminId'])) {
    header('location: login.php');
  }
  include('db.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);

    if(isset($_POST['btnMessage'])){

        $msg_id         = $_GET['msg_id'];
        $file_name      = $_POST['file_name'];
        $message        = $_POST['message'];
        $file           = $_FILES['upload_file']['name'];
        $fileSize       = $_FILES['upload_file']['size'];

        if($fileSize>4000000){
            $_SESSION['file_size_msg'] ='<button class="btn btn-primary">File exceeds maximum size (4MB)</button>';
        }
        $upload = move_uploaded_file($_FILES['upload_file']['tmp_name'],'upload/admin/'.$file);   

        $msg_data  = "INSERT INTO message(file_name, upload_file, message, user_id) VALUE('$file_name','$file','$message','$msg_id') ";

        $msg_query  = mysqli_query($conn,$msg_data);

        if($msg_query==true){
                $ind_msg_email   =  "SELECT * FROM industry WHERE user_id='$msg_id'";
                $msg_email = mysqli_query($conn, $ind_msg_email);
                 $n = mysqli_fetch_array($msg_email);

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

                    $mail->setFrom($n['email'], 'Mailer');
    
                    $mail->addCC($n['email']);

                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                   
                    if($mail->send()){
                        echo 'Message has been sent'; 
                    }
                } catch (Exception $e) {
                    //;
                }
            $_SESSION['msg_msg'] ='<button class="btn btn-primary">Your Message Send Successfull!</button>';
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

        <link rel="shortcut icon" sizes="32x32" href="login/sgcl_logo.png">
        <link rel="apple-touch-icon" sizes="62x45" href="login/sgcl_logo.png">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="login/platform.css">
        <link rel="stylesheet" type="text/css" href="login/app.css">
        <link rel="stylesheet" type="text/css" href="login/page.css">
        <link rel="stylesheet" type="text/css" href="login/plugins.css">
        <link rel="stylesheet" type="text/css" href="login/hack.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                        <a class="hide" href="login/#">
                            <img src="sgcl_logo.png">
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
                            <a class="button small header-small-button icon-label" href="admin_logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
           <style>
                body {
                    background-color: #ffffff;
                }
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
            #modalContainer {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
          }

          .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
          }

          .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
          }
            @media only screen and (min-width: 64.063em){
                .large-7 {
                    margin-left: 400px;
                }
            }
            .section-content{
                background: white;
            }

        </style>

      
            <!-- Load Pages Content -->
            <div id="slickgridView" style="clear: both;" class="compact slickgrid-large-font">

                <section>
                    <div class="row">
                        <div class="large-12 offset-3 medium-10 small-12 columns section-content">

                            <form method="post" action="" enctype="multipart/form-data">

                                <div id="form-content" class="form-template" data-href="forms/add_form.html">

                                    <div class="row" style="padding-top: 20px; display: block;">
                                        <div class="large-7 medium-12 small-12 columns">
                                           <?php 
                                                if (!empty($_SESSION['msg_msg'])) {
                                                    echo $_SESSION['msg_msg'];
                                                        unset($_SESSION['msg_msg']);
                                                } 
                                            ?>
                                            <div class="row">
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic ">
                                                        <label class="title" for="Industrial_APPLICATION_DATE">
                                                            File Name
                                                        <span style="color: red;">*</span></label>
                                                        <input class="w5" placeholder="Enter File name" type="text" name="file_name" required>
                                                    </div>
                                                    <div class="input ic ">
                                                        <label class="title" for="Industrial_APPLICATION_DATE">
                                                           Upload File
                                                        <span style="color: red;">*</span></label>
                                                        <input class="form-control" type="file" name="upload_file" required>
                                                    </div>
                                                    <div class="input ic ">
                                                        <label class="title" for="Industrial_APPLICATION_DATE">
                                                            Message
                                                        <span style="color: red;">*</span></label>
                                                        <textarea class="w5" placeholder="Enter typing your message" type="text" name="message" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-8 medium-8 small-12 columns ic left">
                                                    <div class="input ic">
                                                        <button name="btnMessage" type="submit" class="button radius small form-submit-button hide" style="width: 100px;">
                                                            Send
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                        
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
               	<footer>
                    <div class="content-body footer-content">
                        <div class="right hidden-for-small-only" id="footerTime">22:22</div>
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

        <!--<script type="text/javascript" src="/static/src/js/z/grid.js?v=1.2.1" ></script>-->
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

</body>
  </html>
