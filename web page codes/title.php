<?php
require 'util.php';

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
   
    <head>
        <meta charset="utf-8"/>
    
        <title>Industry Monitoring</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="FlameOnePage freebie theme for web startups by FairTech SEO." name="description"/>
        <meta content="FairTech" name="author"/>
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href="vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/animate.css" rel="stylesheet">
        <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="favicon.ico"/>
 <script src="vendor/jquery.min.js" type="text/javascript"></script>
        <script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>
       
    </head>
    <style>
        /* The switch - the box around the slider */
.onoffswitch {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 20px;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "ON";
    padding-left: 10px;
    background-color: #34A7C1; color: #FFFFFF;
}
.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 18px; margin: 6px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 56px;
    border: 2px solid #999999; border-radius: 20px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
} 
    </style>
    <script>
        $(document).ready(function() {
           // alert("C");
    $("#myonoffswitch1").change(function() {
        //alert($(this).is(':checked'));
        updateVal("device2",$(this).is(':checked'));
    });
        
    $("#myonoffswitch").change(function() {
        //alert($(this).is(':checked'));
        updateVal("device1",$(this).is(':checked'));
    });
    $("#updatebtn").click(function() {
        //alert($(this).is(':checked'));
        alert("AFF");
        updateUnit($("#unit").val());
    });
    
    
        }); 
        
        
        function updateChart(){
            $.getJSON("fetchData.php", function(result){
               $("#gas1").val(result['gas1']) ;
               $("#gas2").val(result['gas2']);
               $("#temperature").val(result['temperature']);
               $("#humidity").val(result['humidity']);
			   $("#status").val(result['status']);
			   
            });
        }
         var updateInterval = 1000*3;
        setInterval(function(){updateChart()}, updateInterval);
          function updateUnit(device){
             
             //alert("update.php?type=unit&unit="+device);
            $.getJSON("update.php?type=unit&unit="+device, function(result){
                console.log(result);
                
            });     
          }
         function updateVal(device,stat){
             stat=(stat==true)?"1":"0"
           //  alert("update.php?type=device&device="+device+"&status="+stat);
            $.getJSON("update.php?type=device&device="+device+"&status="+stat, function(result){
                console.log(result);
                
            });
        }
    </script>
    <body id="body" data-spy="scroll" data-target=".header">

          <header class="header navbar-fixed-top">
              <nav class="navbar" role="navigation">
                <div class="container">
                    <h1 style="color:white"> <?php echo $title;?></h1>
                    <h3 style="color:white"><?php echo $college;?></h3>
                      <div class="menu-container js_nav-item">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                          <div class="logo">
                              
                            <a class="logo-wrap" href="#body">
                               
                               
                            </a>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse nav-collapse">
					
<!--					<div class="language-switcher">
					  <ul class="nav-lang">
                        <li><a class="active" href="#">EN</a></li>
					    <li><a href="#">DE</a></li>
						<li><a href="#">FR</a></li>
					  </ul>
					</div> -->
					
                        <div class="menu-container">
                            <ul class="nav navbar-nav navbar-nav-right">
                               
                               
								
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="title.php">Smartmeter</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="login.php">Logout</a></li>
								
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
			</header>
       
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="container">
                
            </div>

            <div class="carousel-inner" role="listbox">
                
                <div class="item">
                    <img class="img-responsive" src="img/1920x1080/02.jpg" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                                <h2 class="carousel-title">
                                <br/><h3 style="color:white"></h3>
	<div class="ex">
		
			<table style="with: 20%">
				<tr>
					<td style="color:white">Gas 1</td>
					<td><input type="text" name="gas1" id="gas1"/></td>
				</tr>
				
											<tr>
								<td>&nbsp;</td>
								</tr>
							
				<tr>
					<td style="color:white">Gas 2</td>
					<td><input type="text" name="gas2" id="gas2"/></td>
				</tr>
				
											<tr>
								<td>&nbsp;</td>
								</tr>
							
				<tr>
					<td style="color:white">Temperature</td>
					<td><input type="text" name="temperature" id="temperature"/></td>
				</tr>
				
											<tr>
								<td>&nbsp;</td>
								</tr>
					
				<tr>
					<td style="color:white">Humidity</td>
					<td><input type="text" name="humidity" id="humidity"/></td>
				</tr>
				
											<tr>
								<td>&nbsp;</td>
								</tr>	
								
								
									<tr>
					<td style="color:white">Status</td>
					<td><input type="text" name="status" id="status"/></td>
				</tr>
				
											<tr>
								<td>&nbsp;</td>
								</tr>
							
							
					<form action="mail.php" method="post">					
								 <tr>
                                    <td style="color:white">
                                        Email ID
                                    </td>
                                    <td>
                                   <input type="text" name="email" id="email"/>
                                    </td>
                                </tr>                                
		<tr>
								<td>&nbsp;</td>
								
								
                                
                                <tr>
                                    <td style="color:white">
                                        Send Mail
                                    </td>
                                    <td>
                                   <input type="submit" value ="Send"name="mail" id="mail"/>
                                    </td>
                                </tr>  
<form>								
		<tr>
								<td>&nbsp;</td>
								
								</tr>
								</form>
                                <tr>
								<td>&nbsp;</td>
								
								</tr>
								<form action="on.php" method="post">					
								<tr>
                                    <td style="color:white">
                                        ON
                                    </td>
                                    <td>
                                   <input type="submit" value="ON" name="ON" id="ON"/>
                                    </td>
                                </tr>                                
		<tr>
								<td>&nbsp;</td>
								
								</tr>
								</form>
								<form action="off.php" method="post">					
								<tr>
                                    <td style="color:white">
                                        OFF	
                                    </td>
                                    <td>
                                   <input type="submit"value="OFF" name="OFF" id="OFF"/>
                                    </td>
                                </tr>                                
		<tr>
								<td>&nbsp;</td>
								
								</tr>
								</form>

			</table>
			
							
		<!--center>	<input type="submit" value="on" />
			
			<input type="submit" value="off" /></center -->
		 
		
                                </h2>
                                <p class="color-white"><br/> </p>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== SLIDER ==========-->

        <!--========== PAGE LAYOUT ==========-->
        

       
      
          
        </div>
        <!-- End Contact -->
        <!--========== END PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
        <footer class="footer">
           
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="vendor/jquery.min.js" type="text/javascript"></script>
        <script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>
        <script src="vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="js/layout.min.js" type="text/javascript"></script>
		
    </body>
    <!-- END BODY -->
</html>