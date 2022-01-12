<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
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
                <div class="dbr toggle-panel-wrapper" style="margin-top: 8px;">
                       <nav>
                        <div class="wrapper">
                            <span class="toggle-panel"></span>
                      </div>
                    </nav>
                </div>
                <div class="dbr logo-wrapper">
                    <div id="hide logo" style="">
                        <a class="hide" href="#">
                            <img src="sgcl_logo.png">
                        </a>
                    </div>
                    <div class="hidden-for-small-only" style="margin-top: 10px;">
                        <h1 class="logo-text hidden-for-small-only" style="font-size: 16px !important;">
                            SGCL Online Application
                        </h1>
                    </div>
                </div>
                <?php
                    if(isset($_SESSION['userId'])){
                        ?>
                        <div class="dbr right icon-wrapper-new logout" style="margin-top: 10px;">
                            <div class="right icon-wrapper header">               
                                <a class="button small header-small-button icon-label" href="user_dashboard.php">
                                    Dashboard
                                </a>
                            </div>
                        </div>
                <?php    
                    }else{
                        ?>
                    <div class="dbr right icon-wrapper-new logout" style="margin-top: 10px;">
                        <div class="right icon-wrapper header">               
                            <a class="button small header-small-button icon-label" href="login.php">
                                Login
                            </a>
                        </div>
                    </div>
                    <div class="dbr right icon-wrapper-new logout" style="margin-top: 10px;">
                        <div class="right icon-wrapper header">
                            <a class="button small header-small-button icon-label" href="register.php">
                                Register
                            </a>
                        </div>
                    </div>
                <?php  
                    }
                ?>
                <div class="dbr right" style="margin-top: 10px;">
                    <div class="right icon-wrapper header">
                        <a class="button small header-small-button icon-label" href="industry.php">
                            Industry
                        </a>
                    </div>
                </div>
                <div class="dbr right" style="margin-top: 10px;">
                    <div class="right icon-wrapper header">
                        <a class="button small header-small-button icon-label" href="#">
                            Commercial
                        </a>
                    </div>
                </div>
   
            </div>
        </header>