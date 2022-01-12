<?php
 session_start();
   if (!isset($_SESSION['adminId'])) {
    header('location: login.php');
  }
  include('db.php');
?>
<!DOCTYPE html>
<!-- saved from url=(0070)https://onlineapplication.titasgas.org.bd/application/industrial/list/ -->
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">


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
                        <h1 class="logo-text hidden-for-small-only" style="font-size: 16px !important; margin-top: 0.6em;">
                           Admin
                        </h1>
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
        </style>
        <nav id="desktop-view" style="margin-bottom: 10px;">
            <div class="menu-content admin-menu-wrapper scroll">
                <div id="menu-content" class="menu-wrapper-inner">
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
                        <?php
                            if (!empty($_SESSION['dlt_msg'])) {
                                echo $_SESSION['dlt_msg'];
                                unset($_SESSION['dlt_msg']);
                            }

                            if (!empty($_SESSION['status_msg'])) {
                                echo $_SESSION['status_msg'];
                                unset($_SESSION['status_msg']);
                            }

                        ?>


                        <!-- Load Pages Content -->

                        <section>
                            <div class="row section-heading blue-dark collapse">
                                <div class="large-8 medium-8 small-12 columns">
                                    <div class="icon-wrapper left">
                                        <a class="icon">

                                        </a>
                                    </div>
                                    <h5>
                                        <span id="formTitle">Industrial &amp; Others Application List</span>

                                    </h5>
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
                                                            <th style="text-align:center">Delete</th>
                                                            <th style="text-align:center">Message</th>
                                                            <th style="text-align:center">See Message</th>
                                                            <th style="text-align:center">Download</th>
                                                        </tr>
                                                        <?php

                                                            $user_data = "SELECT *, users.id AS userId FROM users INNER JOIN industry ON users.id=industry.user_id Where users.user_role='0'";
                                                                $result = mysqli_query($conn,$user_data);
                                                                    while($row = $result->fetch_assoc()) {
                                                                ?>
                                                            <tr>
                                                                <td style="text-align:center"><?php echo $row['application_id']; ?></td>
                                                                <td style="text-align:center"><?php echo $row['application_date'] ?></td>
                                                                <td style="text-align:center"><?php echo $row['name']; ?></td>
                                                                <td style="text-align:center">
                                                                    <a href="status.php?sts_id=<?php echo $row['userId'];?>" class="button">        <?php 
                                                                            if($row['status']==0){
                                                                                echo "Pending";
                                                                            }else{
                                                                                echo "Active";
                                                                            }
                                                                        ?>    
                                                                    </a>
                                                                </td>

                                                                <td style="text-align:center">
                                                                    <a class="button" onclick="return confirm('Are you sure delete It!')" href="delete.php?del_id=<?php echo $row['userId']; ?>">Delete</a>

                                                                </td>
                                                                <td style="text-align:center">
                                                                    <a class="button" href="admin_message.php?msg_id=<?php echo $row['userId']; ?>">Message</a>
                                                                </td>
                                                                <td style="text-align:center">
                                                                    <a href="see_admin_msg.php?user_msg_id=<?php echo $row['userId']; ?>" class="button">See Message</a>
                                                                </td>
                                                                <td style="text-align:center">
                                                                    <a href="user_application.php?user_id=<?php echo $row['userId']; ?>"><img src="download.png" width="20px"; height="25px";></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                    </table>
                                                </div>
                                                <div tabindex="0" hidefocus="" style="position:fixed;width:0;height:0;top:0;left:0;outline:0;"></div></div>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                            </div>

                        <script type="text/javascript">
                          $(document).ready(function() {
                            $("#myBtn").on("click", function() {
                              $("#modalContainer").show();
                            });

                            $(".close").on("click", function() {
                              $("#modalContainer").hide();
                            });

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
        <script type="text/javascript">
              $(".clickSlide ul").hide();
              $(".clickSlide").click(function(){
                  $(this).children("ul").stop(true,true).slideToggle("fast"),
                  $(this).toggleClass("dropdown-active");
              });
        </script>

</body>
  </html>
