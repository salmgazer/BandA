<?php

//echo '<h1>Welcome to B&F '.$controller->user_control->user->user_details['user_firstname'].'</h1>';

?>
<html>
    <head>
        <title>StoryBoard</title>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <!-- Bootstrap Core CSS -->
          <link href="assets/css/bootstrap.min.css" rel="stylesheet">
          
       <!-- MetisMenu CSS -->
         <link href="assets/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

         <!-- Custom CSS -->
        <link href="assets/css/custom/custom.css" rel="stylesheet" type="text/css">
        
         <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>
     <!-- <script src="assets/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script> -->
    <script type="text/javascript" src="assets/jquery/jquery.classyqr.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    </head>
    <body>
        
        <div class="navbar navbar-inverse navbar-fixed-top">
         <div class="navbar-inner">
             <div class="container">
       
        <!--<img src="img/logo.png" class="navbar-brand">-->
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class ="nav navbar-nav navbar-left">
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;Home</span>
                </a>
            </li>
                
             <li>
                <a href="#">
                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true">&nbsp;Notification</span>
                </a>
            </li>
            
             <li>
                <a href="#">
                    <span class="glyphicon glyphicon-wrench" aria-hidden="true">&nbsp;Settings</span>
                </a>
            </li>
        </ul>
       
        <div class="nav navbar-nav">
            <input type="text" class="form-control" id="inputSuccess1" aria-describedby="inputSuccess1Status"
                   style="height: 28px; margin-top: 10px; margin-left: 170px; width: 400px" placeholder="Search...">
        </div>
             
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" id="option" class="option"><small style="font-family: calibre; font-size: 15px">Fredrick Abayie</small>
                    <!--<img style="" class="" src="..." alt="...">-->
                </a>
            </li>
        </ul>
    </div>
     </div>
</div>
</div>
        
        <div class="navbar navbar-default" style="max-height: 30px">
            <div class="navbar-inner">
                <div class="container">
                    <div class="collapse navbar-collapse navHeaderCollapse">
                        <ul class="nav navbar-nav navbar">
                            <li></li>
                            <li>
                                <img style="height: 100px; width: 100px" class="img-circle" alt="..." src="img/Nana Ama 2.jpg">
                            </li>
                            <li><a href="#">Friends <span class="badge pull-left">34</span></a></li>
                            <li><a href="#"><span class="badge">7</span>Photos</a></li>
                             <li><a href="#"><span class="badge">20</span>Post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!--<div class=-->
        
        <script type="text/javascript">
            
             //       popover for signup fullname
        $(function () {
            $("#option")
                .popover({ title: 'Name', content: "example: Kofi Ama" })
                .blur(function () {
                    $(this).popover('hide');
                });
         });
         
        </script>
                
    </body>
	<!--<img src="<?php // echo $controller->user_control->user->user_details['user_picture']; ?>">-->
</html>