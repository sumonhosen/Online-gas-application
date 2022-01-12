<?php
    session_start();
    include('db.php');
    
    if(isset($_POST['btnLogin'])){
        $application_id = $_POST['application_id'];
        $password       = md5($_POST['password']);
        $admin     = mysqli_query($conn,"SELECT * FROM users WHERE application_id='$application_id' AND password='$password' AND user_role='1' ");
        $admin_id       = mysqli_fetch_array($admin);


        $check_user     = mysqli_query($conn,"SELECT * FROM users WHERE application_id='$application_id' AND password='$password' AND user_role='0' ");

        $user_id       = mysqli_fetch_array($check_user);

    
        if (mysqli_num_rows($check_user) == 1) {
            $_SESSION['userId'] = $user_id['id'];
            $_SESSION['login_msg'] ='<button class="btn btn-success">Your Login Success And Please Application Now!</button>';
            header('location: industry.php');
        }elseif(mysqli_num_rows($admin) == 1){
            $_SESSION['adminId'] = $admin_id['id'];

            $_SESSION['success_msg'] ='<button class="btn btn-success">Your Login Success And See your Informatin!</button>';
            header('location: admin_dashboard.php');
        }
        else{
            $error ='<button class="alert alert-info">Your Application id or password is wrong!</button>';
        }
    }

?>
<!DOCTYPE html>
<!-- saved from url=(0081)https://onlineapplication.titasgas.org.bd/applicant/login?redirect=%2Fapplication -->
<html class=" login-page firefox js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms no-csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SGCL Online Application :: Login</title>

        <link rel="shortcut icon" sizes="32x32" href="login/sgcl_logo.png">
        <link rel="apple-touch-icon" sizes="62x45" href="login/sgcl_logo.png">

        <link rel="stylesheet" type="text/css" href="login/normalize.css">
        <link rel="stylesheet" type="text/css" href="login/login.css">

        <link rel="stylesheet" type="text/css" href="login/flag.css">

        <style>
            .error {
                display:block;
                padding:0.375rem 0.5625rem 0.5625rem;
                margin-bottom:0.625rem;
                font-size:1.00rem;
                font-weight:normal;
                background:#a90329;
                color:white;
            }
        </style>

        </head>

        <body class="login-body">

<!--            <header>
                <div class="fixed">
                    <div class="row">
                        <div class="large-12 medium-12 small-12 columns ">
                            <div class="top"></div>
                        </div>
                    </div>
                </div>
            </header>-->
            <div class="container login-container">

<div class="row">
    <div class="large-3 medium-3 small-12 columns hide-for-small-only">&nbsp;

    </div>
    <div class="large-6 medium-6 small-12 columns ">
        <div class="row">
            <div class="large-12 medium-12 small-12 columns message">
                <div id="message" class="text-center error" style="display:none">

                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 40px; margin-bottom: 20px;">
            <div class="large-4 medium-3 small-3 columns ">
                &nbsp;
            </div>
            <div class="large-4 medium-6 small-6 columns ">
                <div class="switch">ONLINE APPLICATION</div>
            </div>
            <div class="large-4 medium-3 small-3 columns ">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="large-12 medium-12 small-12 columns ">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="large-1 columns ">
                &nbsp;
            </div>
            <div class="large-10 medium-12 small-12 columns large-centered ">
                <div class="login fadeIn">
                    <div class="row collapse">
                        <div class="large-12 medium-12 small-12 columns ">
                            <ul>
                                <li class="admin-login active">APPLICANT LOGIN</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row collapse">
                        <div class="row">
                            <div class="large-12 medium-12 small-12 columns message">
                                <div>
                                    <?php
                                        if(isset($error)){
                                            echo $error;
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <form name="login_form" method="post" id="login_form" action="">
                            <div class="large-6 medium-6 small-6 columns logo-wrapper">
                                <div class="row collapse">
                                    <div id="logo">
                                        <center>
                                            <img src="sgcl_logo.png">
                                        </center>
                                    </div>
                                    <div class="large-12 medium-12 small-12 columns text-center">
                                        <h1 style="color:#346C9B">SGCL</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="large-6 medium-6 small-6 columns form">
                                <input type="password" style="display:none">

                                <div class="row collapse">
                                    <div class="large-12 medium-12 small-12 columns">
                                        <input type="text" placeholder="APPLICATION ID" name="application_id">
                                    </div>
                                </div>
                                <div class="row collapse">
                                    <div class="large-12 medium-12 small-12 columns">
                                        <input type="password" placeholder="PASSWORD" name="password">
                                    </div>
                                </div>


                                <div class="row collapse">
                                    <div class="large-6 medium-12 small-12 columns text-left">
                                        <button type="submit" class="button" name="btnLogin">LOGIN</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <div class="row">
                            <div class="large-12 medium-12 small-12 columns message">
                                <div>
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="large-1 medium-3  columns login-add-hide-small">&nbsp;

            </div>
        </div>
    </div>
    <div class="large-3 medium-3 small-12 columns hide-for-small-only">&nbsp;

    </div>
</div>
<div class="row">
    <div class="large-12 medium-12 small-12 columns  text-center error-div">

<!--        <span class="login-error">
            <i class="fa fa-exclamation-triangle"></i>
          // content will display here
        </span>-->

    </div>
</div>
            </div>
            <footer>

                        <div class="content-body footer-content">

    <div class="right hidden-for-small-only" id="footerTime">22:50</div>
    <div class="right hidden-for-small-only" id="footerDate">Sep 26, 2021</div>
    <div class="right hidden-for-small-only">
        Version : 0.2
    </div>

<script type="text/javascript" src="modernizr.js.download"></script>
<script type="text/javascript" src="jquery.core.js.download"></script>
<script type="text/javascript" src="jquery.ui.js.download"></script>
<script type="text/javascript" src="plugins.js.download"></script>

<script type="text/javascript" src="slick.common.js.download"></script>
<script type="text/javascript" src="datepicker.all.js.download"></script>

<script type="text/javascript">
    $(function () {
        c4s.init();
    });
</script>

    <script>
        var monthArr = new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
        var pcTimeDiff = 0;//1428237805000 ;
        setInterval(function(){
            //pcTimeDiff = pcTimeDiff+1000;
            var currentTime = new Date();
            var currentYear =  currentTime.getFullYear();
            var currentMonth =  monthArr[currentTime.getMonth()];
            var currentDate =  currentTime.getDate();
            if(currentDate<10) currentDate="0"+currentDate;
            var currentHour =  currentTime.getHours();
            if(currentHour<10) currentHour="0"+currentHour;
            var currentMinite =  currentTime.getMinutes();
            if(currentMinite<10) currentMinite="0"+currentMinite;

            document.getElementById("footerDate").innerHTML = currentMonth + " " + currentDate + ", " + currentYear;
            document.getElementById("footerTime").innerHTML = currentHour + ":" + currentMinite;
        },1000);

    </script>

            <div class="left">
                ?
            </div>
                <div class="left" title="The creator of Core4VoIP and PrismERP">
                    � <span>2021</span> <a href="login/sgcl.org.bd" target="_blank">SGCL</a>
                </div>
                <div class="left hidden-for-small-only hide">
                    Powered by <a href="login/#" target="_blank">SGCL</a>
                </div>
                <div class="hide">
                    Powered by <a href="login/#">Core4Switch</a> developed in <a href="login/#" target="_blank">FurinaPHP</a> made by <a href="login/@" target="_blank">Divine IT Limited</a>, the creator of <a href="login/https://www.core4voip.com/" target="_blank">Core4VoIP</a> and <a href="login/http://www.prismerp.net/" target="_blank">PrismERP</a>.<br>
                    TM and copyright � 2005-2021 <a href="login/#" target="_blank">Divine IT Limited</a>. Tel +880-175566-1212
                </div>
            </div>
        </footer>
    </body>
</html>
