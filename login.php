<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="keyword" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RightVows Login</title>

        <!-- start: Css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css">

        <!-- plugins -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/plugins/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/plugins/simple-line-icons.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/plugins/animate.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/plugins/icheck/skins/flat/aero.css"/>
        <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
        <!-- end: Css -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">

        <div class="container">

            <!--<form class="form-signin" method="post" accept-charset="utf-8" action="http://rightvows.com/admin_panel/login/authenticate">-->
            <form class="form-signin" method="post" onsubmit="check_if_capcha_is_filled" accept-charset="utf-8" action="https://rightvows.com/admin_panel/login/authenticate">
                <?php // echo form_open('form'); ?> 
                <!--<div class="form-signin">-->
                <div class="panel periodic-login">
                    <div class="panel-body text-center">
                        <img src="<?php echo base_url(); ?>images/logo.png" alt=""/>
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" name="username" class="form-text" required>
                            <span class="bar"></span>
                            <label>Username</label>
                        </div>
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="password" class="form-text" name="password" required>
                            <span class="bar"></span>
                            <label>Password</label>
                        </div>
                        <label class="pull-left">
                            <!--<input type="checkbox" class="icheck pull-left" name="checkbox1"/> Remember me-->
                        </label>
                        <?php echo $recaptcha_html; ?>
                        <div class="alert alert-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                        <button style="color: #000 !important" class="btn col-md-12" type="submit">Sign In</button>
                    </div>

                </div>
                <!--</div>-->
            </form>

        </div>

        <!-- end: Content -->
        <!-- start: Javascript -->
        <script src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/jquery.ui.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>asset/js/plugins/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/plugins/icheck.min.js"></script>
        <!-- custom -->
        <script src="<?php echo base_url(); ?>asset/js/main.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-aero',
                    radioClass: 'iradio_flat-aero'
                });
                var allowSubmit = false;
                function capcha_filled() {
                    allowSubmit = true;
                }
                function capcha_expired() {
                    allowSubmit = false;
                }
                function check_if_capcha_is_filled(e) {
                    if (allowSubmit)
                        return true;
                    e.preventDefault();
                    alert('Fill in the capcha!');
                }
            });
        </script>
        <!-- end: Javascript -->
    </body>
</html>