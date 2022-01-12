<?php
 session_start();
   if (!isset($_SESSION['userId'])) {
    header('location: login.php');
  }
	include('db.php');

	$get_msg_id = $_GET['msg_id'];


  	$msg_info = "SELECT *, users.id AS userId FROM users INNER JOIN message ON users.id=message.user_id WHERE users.id='$get_msg_id'";

    $result = mysqli_query($conn,$msg_info);


    ?>
<!DOCTYPE html>
	<html>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable=yes">
        <meta name="description" content="">
        <meta name="author" content="Faisal">

        <title>SGCL Online Application</title>

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
                    <a href="#" class="toggle-panel"> </a>
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
            body {
				    background-color: white;
				}
			@media only screen and (min-width: 64.063em){
                .large-7 {
                    margin-left: 400px;
                }
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
		                </div>
		            </div>
		        </nav>
		            <div id="slickgridView" style="clear: both;" class="compact slickgrid-large-font">
                        <section>
                            <div class="row">
                                <div class="large-12 offset-3 medium-10 small-12 columns section-content">

                                    <form method="post" action="">

                                        <div id="form-content" class="form-template" data-href="forms/add_form.html">

                                            <div class="row" style="padding-top: 20px; display: block;" >
                                                <div class="large-7 medium-12 small-12 columns">
                                                    <h2>Message</h2>
                                                    <div class="row">
                                                    	<table>
                                                    		<tr>
                                                    			<th>File Name</th>
                                                    			<th>File</th>
                                                				<th>Message</th>
                                                    		</tr>
                                                    		<?php
                                                    			while($n = $result->fetch_assoc()) {
                                                    				?>
                                                    			<tr>
	                                                    			<td><?php echo $n['file_name']; ?></td>
	                                                    			<td>
	                                                    				<img src="upload/admin/<?php echo $n['upload_file']; ?>" height="60px" width="150px"><br>
	                                                    				<a href="user_file_download.php?user_dwn_file=<?php echo $n['upload_file']; ?>" class="button">Dowload</a>
	                                                    			</td>
	                                                    			<td><p><?php echo $n['message']; ?></p></td>
	                                                    		</tr>
																	<?php
																	}
                                                    			?>	
                                                    	</table>
                                                    </div>
                                
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
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
		                � <span>2021</span> <a href="login/https://www.divineit.net/" target="_blank">Divine IT Limited</a>
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
    </body>
</html>
