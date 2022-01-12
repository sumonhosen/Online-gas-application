<?php
 session_start();
   if (!isset($_SESSION['adminId'])) {
    header('location: login.php');
  }
	include('db.php');

	$user_msg_id = $_GET['user_msg_id'];


  	$msg_info = "SELECT *, users.id AS userId FROM users INNER JOIN message ON users.id=message.send_by WHERE users.id='$user_msg_id'";

    $result = mysqli_query($conn,$msg_info);


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
	                                                    				<img src="upload/user/<?php echo $n['upload_file']; ?>" height="60px" width="150px"><br>
	                                                    				<a href="user_file_download.php?admin_dwn_file=<?php echo $n['upload_file']; ?>" class="button">Dowload</a>
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
