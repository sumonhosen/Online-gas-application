<?php
 session_start();
   if (!isset($_SESSION['userId'])) {
    header('location: login.php');
  }
    include('db.php');
          
    $user_id = $_SESSION['userId'];
    $user_data = "SELECT *, users.id AS userId FROM users INNER JOIN industry ON users.id=industry.user_id WHERE users.id='$user_id'";
        $result = mysqli_query($conn,$user_data);
        $n = mysqli_fetch_array($result);

                                                                
?>
<!DOCTYPE html>

<html>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable=yes">
        <meta name="description" content="">
        <meta name="author" content="Faisal">

        <title>SGCL Online Application :: Login</title>

        <link rel="shortcut icon" sizes="32x32" href="login/sgcl_logo.png">
        <link rel="apple-touch-icon" sizes="62x45" href="login/sgcl_logo.png">
        <link rel="stylesheet" type="text/css" href="login/normalize.css">
        <link rel="stylesheet" type="text/css" href="login/platform.css">
        <link rel="stylesheet" type="text/css" href="login/app.css">
        <link rel="stylesheet" type="text/css" href="login/page.css">
        <link rel="stylesheet" type="text/css" href="login/plugins.css">
        <link rel="stylesheet" type="text/css" href="login/hack.css">
    </head>
    <!--menu_vertical-side //for side vertical menu need to add in body-->
    <body class="menu_horizontal push-mode show_menu tiny menu-fixed header-fixed compact slickgrid-large-font body-small-font  apple-screen">
        <!-- Load Header -->
        <header>
            <div class="header-content row scroll">
                <div class="dbr toggle-panel-wrapper" style="margin-top: 8px;">
                    <a href="login/#" class="toggle-panel"> </a>
                </div>
                <div class="dbr logo-wrapper">
                    <div id="hide logo" style="">
                        <a class="hide" href="user_dashboard.php">
                            <img src="sgcl_logo.png">
                        </a>
                    </div>
                    <div class="hidden-for-small-only">
                        <a  href="user_dashboard.php">
                            <h1 class="logo-text hidden-for-small-only" style="font-size: 16px !important; margin-top: 0.6em;">
                                SGCL Online Application
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
                <div class="dbr right icon-wrapper-new logout" style="">
                    <div class="right icon-wrapper header">
                        <div class="icon-wrapper-inner ">
                            <a class="button small header-small-button icon-label" href="industry.php">
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
                        <ul class="main-menu sm  sm sm-simple" data-smartmenus-id="16326750970532114">
                            <li>
                                <a class="single-menu  has-submenu" href="login/javascript:void(0);"><span class="sub-arrow"><i class="fa fa-angle-right fa-2x"></i></span><span class="sub-arrow"><i class="fa fa-angle-right fa-2x"></i></span>
                                    Industrial &amp; Others
                                </a>
                                <ul class="second-menu">
                                    <li>
                                        <a href="login/https://onlineapplication.titasgas.org.bd/application/industrial/list/" class="main-menu-item">
                                            Application List
                                            <span class="right submenu-icon"><i class="fa fa-list"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="login/https://onlineapplication.titasgas.org.bd/application/industrial/edit/" class="main-menu-item">
                                            Edit Application
                                            <span class="right submenu-icon"><i class="fa fa-pencil-square"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login/https://onlineapplication.titasgas.org.bd/application/industrial/view/" class="main-menu-item">
                                            View Application
                                            <span class="right submenu-icon"><i class="fa fa-newspaper-o"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            c4s.init();
                            Z.menu.init();
                        });
                    </script>
                </div>
            </div>
        </nav>

        <!-- Load Body Content -->
        <div class="container clearfix content-wrapper body-small-font admin-container">
            <div class="content-wrapper-inner clearfix" id="page-content-wrapper">
                <!-- Load Layout Configuration - Right Now Inactive -->

                <!-- Load Bread crumb -->
                <ul class="breadcrumbs">

                </ul>

                <div id="page-content" class="slickgridView  compact slickgrid-large-font">
                    <!-- Load Layout Configuration - Right Now Inactive -->
                    <div class="row collapse content-header">
                        <div class="large-4 medium-12 columns">
                        </div>

                        <div class="large-8 medium-12 columns right icon-button">
                        </div>
                    </div>

                    <!-- Load Flash Message -->
                    <div class="row collapse content-header">
                        <div class="large-12 medium-12 small-12 columns">
                            <!--Flash Message Start-->
                            <div id="message" style="display:none; margin-bottom: 10px;">
                            </div>
                            <!--End Flash Messages-->
                        </div>
                    </div>

                    <!-- Load Pages Content -->
                    <div id="slickgridView" style="clear: both;" class="compact slickgrid-large-font">

                        <!-- Load Layout Configuration - Right Now Inactive -->
                        <div class="row collapse content-header">
                            <div class="large-4 medium-12 columns">

                            </div>

                            <div class="large-8 medium-12 columns right icon-button">
                            </div>
                        </div>

                        <!-- Load Pages Content -->

                        <section>
                            <span style="text-align: center; color:black;"> 
                                <p class="button" style="color:white;">Your  Application Status is       
                                    <?php 
                                        if($n['status']==0){
                                            echo "Pending";
                                        }else{
                                            echo "Active";
                                        }
                                    ?>  
                                </p>
                            </span>
                            <div class="row section-heading blue-dark collapse">
                                <div class="large-8 medium-8 small-12 columns">
                                    <div class="icon-wrapper left">
                                        <a class="icon">

                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    &nbsp;
                                </div>

                                <!-- Load Pages Content -->

                                <section class="grid">
                                    <!-- GRID SEARCH OPERATION -->
                                    <div class="search clearfix">
                                        <form name="search_form" method="get" field_prefix="search" data-src="get" id="search_form">
                                            <h6>Quick Filter</h6>
                                            <div class="input ic ">
                                            <input class="validator" data-validation="long" placeholder="All" type="text" name="search[Industrial][APPLICATION_ID]" id="Industrial_APPLICATION_ID" value="" style="padding-left: 99px;">
                                            <label class="title" for="Industrial_APPLICATION_ID">Application Id</label></div>
                                            <div class="input ic ">

                                                <input class="masked-input validator" data-mask="99/99/99" data-validation="date" type="text" name="search[Industrial][APPLICATION_DATE]" id="Industrial_APPLICATION_ID" value="" placeholder="All" style="padding-left: 116px;" is-masked="true">
                                            <label class="title" for="Industrial_APPLICATION_DATE">Application Date</label></div>
                                            <div class="input ic " style="max-width: 273px;">

                                                <select name="search[Industrial][DRAFT]" id="Industrial_DRAFT" tabindex="-1" class="selectized" style="display: none; padding-left: 54px;"><option value="" selected="selected"></option></select><div class="selectize-control single"><div class="selectize-input items not-full has-options" style="padding-left: 54px;"><input type="text" autocomplete="off" tabindex="" placeholder="All" style="width: 31px;"></div><div class="selectize-dropdown single" style="display: none; right: -1px; min-width: auto; top: 27px;"><div class="selectize-dropdown-content"></div></div></div>
                                            <label class="title" for="Industrial_DRAFT">Status</label></div>

                                            <div class="search-button">
                                                <button type="submit" class="button radius small">
                                                    <span class="helpful">Apply Filter</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- GRID MAIN BODY -->
                                    <div id="Industrial_applicationList" class="gridview">
                                        <div class="pager-container clearfix">
                                            <div class="pager"><div class="slick-pager"><span class="slick-pager-status" style="float:left"><span class="text-primary" style="float: left; margin-top: -2px;">Showing: 1 Records</span> &nbsp;<div class="input ic" id="slickCurrentPage"><label for="gotopage" class="title"><i class="fa fa-files-o"></i></label><input type="text" style="padding-left: 25px; font-size: 15px !important; text-align: left !important;" class="gttopage" value="1" id="gotopage"> <span class="txt-color-darken" style="height:1.7em;margin-top: -34px !important; min-width: 50px !important; font-weight: bold;"> of 1</span></div> </span><span class="slick-pager-nav" style=""><span class="ui-state-default ui-corner-all ui-icon-container"><span class="ui-icon-fa "><i class="fa fa-angle-double-left ui-state-disabled"></i></span></span><span class="ui-state-default ui-corner-all ui-icon-container"><span class="ui-icon-fa  pager-input"><i class="fa fa-angle-left ui-state-disabled"></i></span></span><span class="ui-state-default ui-corner-all ui-icon-container"><span class="ui-icon-fa "><i class="fa fa-angle-right ui-state-disabled"></i></span></span><span class="ui-state-default ui-corner-all ui-icon-container"><span class="ui-icon-fa "><i class="fa fa-angle-double-right ui-state-disabled"></i></span></span></span><span class="slick-pager-settings" style="margin-top: -4px;"><span class="slick-pager-settings-expanded"> <select class="pagerTypeSelect" style="width:65px"><option data="50" value="50">50</option><option data="100" value="100" selected="selected">100</option><option data="200" value="200">200</option><option data="500" value="500">500</option><option data="1000" value="1000">1000</option><option data="10000" value="10000">10000</option><option data="20000" value="20000">20000</option></select>&nbsp;</span></span></div></div>
                                        </div>
                                        <div class="grid slickgrid_671955 ui-widget slickgrid_945090" style="margin: 0px; overflow: hidden; outline: 0px; position: relative; height: 368px;" data-schema="https://onlineapplication.titasgas.org.bd/application/industrial/list/schema" data-src="https://onlineapplication.titasgas.org.bd/application/industrial/list">
                                            <div tabindex="0" hidefocus="" style="position:fixed;width:0;height:0;top:0;left:0;outline:0;"></div>
                                                <div class="slick-viewport" style="width: 100%; overflow: auto; outline: 0px; position: relative; height: 339px;">
                                                    <table>
                                                        <tr>
                                                            <th style="text-align:center">Application Id</th>
                                                            <th style="text-align:center">Application Date</th>
                                                            <th style="text-align:center">Customer Name</th>
                                                            <th style="text-align:center">Status</th>
                                                            <th style="text-align:center">See Message</th>
                                                            <th style="text-align:center">Send Message</th>
                                                            <th style="text-align:center">Download</th>
                                                        </tr>
                                              
                                                            <tr>
                                                                <td style="text-align:center"><?php echo $n['application_id']; ?></td>
                                                                <td style="text-align:center"><?php echo $n['application_date'] ?></td>
                                                                <td style="text-align:center"><?php echo $n['name']; ?></td>
                                                                <td style="text-align:center">
                                                                    <a href="javascript:void(0)" class="button">
                                                                        <?php 
                                                                            if($n['status']==0){
                                                                                echo "Pending";
                                                                            }else{
                                                                                echo "Active";
                                                                            }
                                                                        ?>
                                                                        
                                                                    </a>
                                                                </td>
                                                                 <td style="text-align: center;"><a href="edit_user_app.php?user_app_id=<?php echo $n['userId']; ?>" class="button">Edit</a></td>
                                                                <td style="text-align: center;"><a href="see_message.php?msg_id=<?php echo $n['userId']; ?>" class="button">See Message</a></td>
                                                                   <td style="text-align: center;"><a href="send_user_message.php?send_msg_id=<?php echo $n['userId']; ?>" class="button">Send Message</a></td>
                                                                <td style="text-align:center"><a href="download.php?app_id=<?php echo $n['userId']; ?>"><img src="download.png" width="20px"; height="25px";></i></a></td>
                                                            </tr>
                                                    </table>
                                                </div>
                                                <div tabindex="0" hidefocus="" style="position:fixed;width:0;height:0;top:0;left:0;outline:0;"></div></div>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                            </div>

                        <script type="text/javascript">
                            $(function () {
                                console.log(this);
                                setTimeout(function () {
                                    var applicationId = $('.slick-row.even > .slick-cell.l0.r0.text-right').html() ;
                                    var downloadUrl = '<a href="login/'+contextPath+'/application/industrial/download/?applicationId='+applicationId+'"><i class="fa fa-download"></i></a>';
                                    $('.slick-row.even > .slick-cell.l6.r6.text-center').html(downloadUrl);
                                },1000);

                                var grid = $("#Industrial_applicationList").find(".grid");

                                var url = location.href;
                                var ind = url.indexOf("?");
                                if (ind != -1) {
                                    url = url.substr(0, ind);
                                }
                                ind = url.lastIndexOf("/");
                                if (ind == url.length-1) {
                                    url = url.substr(0, ind);
                                }
                                grid.attr("data-schema", url+"/schema");
                                grid.attr("data-src", url);

                                c4s.init();

                                templateLoadingComplete();
                            });
                        </script>
                    </div>
                <footer>
                    <div class="content-body footer-content">
                        <div class="right hidden-for-small-only" id="footerTime">22:51</div>
                        <div class="right hidden-for-small-only" id="footerDate">Sep 26, 2021</div>
                        <div class="right hidden-for-small-only">
                            Version : 0.2
                        </div>
                        <script>
                            var monthArr = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
                            var pcTimeDiff = 0;//1428142208000 ;
                            setInterval(function () {
                                //pcTimeDiff = pcTimeDiff+1000;
                                var currentTime = new Date();
                                var currentYear = currentTime.getFullYear();
                                var currentMonth = monthArr[currentTime.getMonth()];
                                var currentDate = currentTime.getDate();
                                if (currentDate < 10)
                                    currentDate = "0" + currentDate;
                                var currentHour = currentTime.getHours();
                                if (currentHour < 10)
                                    currentHour = "0" + currentHour;
                                var currentMinite = currentTime.getMinutes();
                                if (currentMinite < 10)
                                    currentMinite = "0" + currentMinite;

                                document.getElementById("footerDate").innerHTML = currentMonth + " " + currentDate + ", " + currentYear;
                                document.getElementById("footerTime").innerHTML = currentHour + ":" + currentMinite;
                            }, 1000);


                        </script>

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

        <!--<script type="text/javascript" src="/static/src/js/z/grid.js?v=1.2.1" ></script>-->
        <script type="text/javascript" src="./TGTDCL Online Application_files/slick.common.js.download"></script>
        <script type="text/javascript" src="./TGTDCL Online Application_files/datepicker.all.js.download"></script>
        <script type="text/javascript" src="./TGTDCL Online Application_files/jquery.maskedinput.min.js.download"></script>
        <script type="text/javascript" src="./TGTDCL Online Application_files/hack.js.download"></script>
        <!--<script type="text/javascript" src="/static/min/js/validation_report.js?v=1.2.1" ></script>-->

        <script type="text/javascript">
                            $(function () {
                                Z.menu.toggleButton();
                            });
        </script>

        <script type="text/javascript">

            var contextPath = "";
            var moduleName = "";
            var subModuleName = "";
            var pathVariables = [];
            var supportedUploadTypes = ".pdf,.jpg,.jpeg,.png";

            var loggedIn = !false;
            var lang = "";

            $(document).on("click", "#addPop, .addPop", function (ev) {
                ev.preventDefault();
            });

            $(function () {
                $('.search-hide').click(function (e) {
                    e.preventDefault();
                    if ($('section.grid div.search').hasClass('hide')) {
                        $('section.grid div.search').show();
                        $(this).text('Serach Hide');
                        $('section.grid div.search').removeClass('hide');
//                       c4s.fillScreen();
//                        var $target = $('#page-content');
//                        var $container = $('#page-content-wrapper');
//                        var root = window;
//                        var diff = parseInt($(root).height()) - Math.ceil($container.outerHeight() + $container.position().top);
//
//                        diff = parseInt(diff);
//                        // -1 added to fix scrolling issue on some random heights. reason for scroll is unknown, but possible issue is fractional
//                        var nh = $target.outerHeight() + diff - 20;
//                        var mh = parseInt($target.css('min-height'));
//
//                        if (nh > mh) {
//                            $target.css({"height": nh});
//                        }
//                        var heightSearch = $(window).height() - $('.header-content').outerHeight() - $('section.grid div.search').outerHeight();
//                        var heightSearch = $('section.grid div.search').outerHeight();
//                        $('#page-content').css({"height": ($('#page-content-wrapper').outerHeight() - heightSearch)});
//                        $('#page-content').css({"height": heightSearch});

//                        console.log($('#page-content').outerHeight());

                    }
                    else {
                        $(this).text('Serach Show');
                        $('section.grid div.search').addClass('hide');
                        $('section.grid div.search').hide();
//                        var heightSearch = $(window).height() - $('.header-content').outerHeight() - $('section.grid div.search').outerHeight() - 20;
//                        var heightSearch = $('section.grid div.search').outerHeight();
//                        $('#page-content').css({"height": ($('#page-content-wrapper').outerHeight() - heightSearch)});
//                        $('#page-content').css({"height": heightSearch});
//                        $('#page-content').css({"height": heightSearch-20});
//                        console.log($('#page-content').outerHeight());
                    }
                    return false;
                });

                $('.slick-row-ctr').click(function (e) {
                    if ($('.slickgridView').hasClass('compact')) {
                        $('.slickgridView').addClass('comfortable');
                        $('.slickgridView').removeClass('compact');
                        c4s.components.grid();
                    }
                    else {
                        $('.slickgridView').addClass('compact');
                        $('.slickgridView').removeClass('comfortable');
                        c4s.components.grid();
                    }
                });


                detectTouchSupport();
                c4s.init_once();

                if (loggedIn) {


                    $("#menu-content").load(contextPath + "/html/menu/default_menu.html",
                        function() {
                            var content = $("#menu-content").html()
                                .replace(/CONTEXT_PATH/g, contextPath);
                            $('#menu-content').html(content);
                        }
                    );
                    $(".dbr.right.icon-wrapper-new.logout").show();







                } else {
                    $("#desktop-view").hide();
                }



                var $content = $('#page-content');

                var host = location.host;
                var url = location.href;

                var ind = url.indexOf("?");
                if (ind != -1) {
                    url = url.substr(0, ind);
                }
                ind = url.indexOf("#");
                if (ind != -1) {
                    url = url.substr(0, ind);
                }
                ind = url.lastIndexOf("/");
                if (ind == url.length-1) {
                    url = url.substr(0, ind);
                }

                ind = url.indexOf(host + contextPath);
                if (ind != -1) {
                    moduleName = url.substr(
                            ind+(host + contextPath).length);

                    if (moduleName.indexOf("/") == 0) {
                        moduleName = moduleName.substr(1);
                    }

                    var parts = moduleName.split("/");
                    console.log(parts);
                    if (parts.length > 0) {
                        moduleName = parts[0];
                    }
                    if (parts.length > 1) {
                        subModuleName = parts[1];
                    }
                    if (parts.length > 2) {
                        pathVariables = parts.slice(2);
                    }
                }

                ind = url.indexOf(host + contextPath);
                url = url.substr(0, ind+(host + contextPath).length)
                        + "/html" + url.substr(ind+(host + contextPath).length);
                console.log(url);
                url = url + ".html";

                $.ajax({
                    method: "GET",
                    url: url,
                    headers: {"X-Requested-Layout": "ajax"},
                    success: function (data, textStatus, jqXHR) {
                        $content.stop(true, true);
                        $content.html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //window.location.reload();
                    }
                }); // end ajax

            });
            var desktopView;
            desktopView = ' ';

            function detectTouchSupport() {
                msGesture = window.navigator && window.navigator.msPointerEnabled && window.MSGesture,
                        touchSupport = (("ontouchstart" in window) || msGesture || window.DocumentTouch && document instanceof DocumentTouch);

                if (touchSupport || navigator.userAgent.indexOf('AppleWebKit') != -1) {
                    if (navigator.userAgent.indexOf('AppleWebKit') != -1) {
                        $("body").addClass("apple-screen");
                    }
                    else {
                        $("body").addClass("touch-screen");
                    }

                    if ($('.header-content').hasClass('fixed')) {
                        $('.header-content').removeClass('fixed');
                        $('.header-content').addClass('scroll');
                    }
                    if ($('.menu-content').hasClass('fixed')) {
                        $('.menu-content').removeClass('fixed');
                        $('.menu-content').addClass('scroll');
                    }

                }
                else {
                    $("body").addClass("normal-screen");
                    if (!$('.header-content').hasClass('fixed')) {
                        $('.header-content').removeClass('scroll');
                        $('.header-content').addClass('fixed');
                    }
                    if (!$('.menu-content').hasClass('fixed')) {
                        $('.menu-content').removeClass('scroll');
                        $('.menu-content').addClass('fixed');
                    }
                }
            }

    function showProgressBar() {
        $("#page-content").oLoader({
            backgroundColor: '#888',
            image: '/static/images/loader1.gif',
            fadeInTime: 500,
            fadeOutTime: 1000,
            fadeLevel: 0.5
        });
    }

    function hideProgressBar() {
        try {
            $("#page-content").oLoader("hide");
        } catch (e) {}
        $('.ui-tooltip').hide();
    }

    function showMessage(msg) {
        $("#message").html(msg);
        $("#message").show();
    }

    function hideMessage() {
        $("#message").html("");
        $("#message").hide();
    }

    function templateLoadingComplete(response, status, jqXHR) {
        c4s.init();
        $(".masked-input").each(function (i, elm) {
            var that = $(this);
            if (!that.attr("is-masked")) {
                that.mask(that.attr("data-mask"));
                that.attr("is-masked", "true");
            }
        });
        $("input,select,textarea").each(function (i, elm) {
            var that = $(this);
            if (that.hasClass("required") && !that.attr("is-required")) {
                var label = $("label[for='"+that.attr('id')+"']");
                label.each(function(i, elm) {
                    if (!$(this).hasClass("skip-require-mark")) {
                        $(this).html($(this).text() + " <span style=\"color: red;\">*</span>");
                    }
                });
                that.attr("is-required", "true");
            }
        });
        $(".required").blur(function(e) {
            var that = $(this);
            if ($.trim(that.val()) != "") {
                that.removeClass("value-missing");
            }
        });
        $("select").change(function(e) {
            var that = $(this);
            if ($.trim(that.val()) != "") {
                that.removeClass("value-missing");
                that.next().removeClass("value-missing");
            }

        });
        $("input[type='file']").change(function(e) {
            var that = $(this);
            if ($.trim(that.val()) != "") {
                that.removeClass("value-missing");
                that.next().removeClass("value-missing");
            }
        });
        $("#paperSize").change(function(e) {
            var that = $(this);
            if (that.val() == "1") {
                $("#cpl").val("132");
                $("#lpp").val("58");
//                $("#format").data("selectize").setValue("txt");
            } else if (that.val() == "2") {
                $("#cpl").val("80");
                $("#lpp").val("58");
            }
        });
        $("input[type='file']").each(function (i, elm) {
            console.log(supportedUploadTypes);
            $(this).attr("accept", supportedUploadTypes);
        });
    }

    function requiredCheck() {
        console.log("inside requiredCheck()");
        var retVal = true;
        $(".required").each(function(i, elm) {
            var that = $(this);
            var tag = that.prop("tagName");
            var type = that.attr("type");
            var value = that.val();

            if (tag == "INPUT" || tag == "SELECT" || tag == "TEXTAREA") {
                if ($.trim(value) == "") {
                    that.addClass("value-missing");
                    if (tag == "SELECT" || type == "file") {
                        that.next().addClass("value-missing");
                    }
                    retVal = false;
                }
            }
        });
        if (!retVal) {
            showMessage("Please enter all required (*) values");
        }
        console.log("returning requiredCheck() > " + retVal);
        return retVal;
    }

    function validateFormData() {
        console.log("inside validateFormData()");
        var retVal = true;
        var msg = "";

        $(".validator").each(function(i, elm) {
            var that = $(this);
            try {
                var type = that.attr("data-validation");

                if (type) {
                    if (type == "month") {
                        monthValidator(that);
                    } else if (type == "date") {
                        dateValidator(that);
                    } else if (type == "email") {
                        emailValidator(that);
                    } else if (type == "y/n") {
                        yesNoValidator(that);
                    } else if (type == "ipAddress") {
                        ipValidator(that);
                    }
                }
            } catch (e) {
                retVal = false;
                console.log("ERROR: " + e);
                if (msg != "") {
                    msg += "<br />";
                }
                e = $.trim(e);
                var ind = e.lastIndexOf("*");
                if (ind == e.length-1) {
                    e = e.substr(0, ind);
                }
                msg += $.trim(e);
            }
        });

        if (msg != "") {
            showMessage(msg);
        }

        console.log("returning validateFormData() > " + retVal);
        return retVal;
    }

    function monthValidator(s) {
        var v = s.val();
        var pattern = /^\d{4}[\/\-](0?[1-9]|1[012])$/;
        if (v.match(pattern) == null) {
            var label = $("label[for='"+s.attr('id')+"']");
            var msg = "Invalid ";

            if (label.length > 0) {
                msg += label.text().toLowerCase();
            } else {
                msg += "value";
            }
            throw msg;
        }
        return v.replace("-", "");
    }

    function dateValidator(s) {
        var v = s.val();
        var pattern = /^(0?[1-9]|[1-2][0-9]|3[01])[\/\-](0?[1-9]|1[0-2])[\/\-]\d{2}$/
        if (v.match(pattern) == null) {
            var label = $("label[for='"+s.attr('id')+"']");
            var msg = "Invalid ";

            if (label.length > 0) {
                msg += label.text().toLowerCase();
            } else {
                msg += "value";
            }
            throw msg;
        }
        return v.replace("-", "");
    }

    function yesNoValidator(s) {

    }

    function ipValidator(s) {
        var addr = s.val().split(".");
        if (addr.length != 4) {
            throw "Invalid ip address";
        }
        for (var i in addr) {
            var block = "" + parseInt(addr[i]);
            if (block == "NaN") {
                throw "Invalid ip address";
            }
            if (parseInt(block) > 255) {
                throw "Invalid ip address";
            }
        }
        return s.val();
    }

    function emailValidator(s) {
        var v = s.val();
        if (v == "") {
            return v;
        }
        var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (v.match(pattern) == null) {
            var label = $("label[for='"+s.attr('id')+"']");
            var msg = "Invalid ";

            if (label.length > 0) {
                msg += label.text().toLowerCase();
            } else {
                msg += "value";
            }
            throw msg;
        }
        return v;
    }

    function reloadGridData(grid) {
        if (grid) {
            var data_src = grid.attr("data-src");
            grid.data('grid').getData().getData(data_src);
        }
    }
    function usStatus(user_id){
        alert();
    }

        </script>




<span class="slick-columnpicker" style="display:none;position:absolute;z-index:20;"></span><span class="slick-columnpicker" style="display:none;position:absolute;z-index:20;"></span></body></html>
