
<?php
  include('db.php');

    if(isset($_POST['btnRegister'])){
        $name           = $_POST['name'];
        $application_id = $_POST['application_id'];
        $password       = md5($_POST['password']);

        $application_id_sql = mysqli_query($conn,"SELECT application_id FROM users WHERE application_id='$application_id' ");

           if (mysqli_num_rows($application_id_sql) != 0)
           {
              $msg ='<button class="alert alert-danger">Application Id is Already Taken!</button>';
            }

            $user_data = "INSERT INTO users(name, application_id, password) VALUES ('$name','$application_id','$password')";
            $user_sql = mysqli_query($conn,$user_data);

        if($user_sql==true){
            $msg ='<button class="btn btn-success">Your Registration Successfull!</button>';
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
                                margin-left: 400px;
                            }
                        }
                    </style>

                    <!-- Load Pages Content -->
                    <div id="slickgridView" style="clear: both;" class="compact slickgrid-large-font">
                        <section>
                            <div class="row">
                                <div class="large-12 offset-3 medium-10 small-12 columns section-content">

                                    <form method="post" action="">

                                        <div id="form-content" class="form-template" data-href="forms/add_form.html">

                                            <div class="row targetpanes" style="padding-top: 20px; display: block;" >
                                                <div class="large-7 medium-12 small-12 columns">
                                                    <h2>Please Registration now</h2>
                                                        <?php
                                                            if(isset($msg)){
                                                                echo $msg;
                                                            }
                                                        ?>
                                                    <div class="row">
                                                        <div class="large-8 medium-8 small-12 columns ic left">
                                                            <div class="input ic ">
                                                                <label class="title" for="Industrial_APPLICATION_DATE">
                                                                    Name
                                                                <span style="color: red;">*</span></label>
                                                                <input class="w5 masked-input required validator" placeholder="Enter Name" type="text" name="name" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="large-8 medium-8 small-12 columns ic left">
                                                            <div class="input ic" style="margin:10px;">
                                                                <label class="title" for="Industrial_APPLICATION_DATE">
                                                                    Application Id
                                                                <span style="color: red;">*</span></label>
                                                                <input class="w5 masked-input required validator" placeholder="Enter Application Id" type="number" name="application_id" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="large-8 medium-8 small-12 columns ic left">
                                                            <div class="input ic" style="margin:10px;">
                                                                <label class="title" for="Industrial_APPLICATION_DATE">
                                                                    Password
                                                                <span style="color: red;">*</span></label>
                                                                <input class="w5 masked-input required validator" placeholder="Enter Password" type="password" name="password" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="large-8 medium-8 small-12 columns ic left">
                                                            <div class="input ic" style="margin:10px;">
                                                                <button name="btnRegister" type="submit" class="button radius small form-submit-button hide" style="width: 100px;">
                                                                    Register
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
                    </div>
                    <?php echo include('footer.php'); ?>