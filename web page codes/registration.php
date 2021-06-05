<?PHP

require "util.php";

// class MyDB extends SQLite3 {
//      function __construct() {
//         $this->open('test.db');
//      }
//   }
//
//   $db = new MyDB();
//   if(!$db){
//      echo $db->lastErrorMsg();
//   } else {
//    //  echo "Opened database successfully\n";
//   }
   
$name;
$email;
$password;
$mobile;
$error = Array();
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    echo $name==="";
    if(!isset($name) ||  $name=='' ){
        echo "SSSSSS";
        $error['name']='Please Enter the Name';
    }
    if(!isset($email) || $email=='' ){
        $error['email']='Please Enter the Email';
    }
    if(!isset($mobile) || $mobile=='' ){
        $error['mobile']='Please Enter the mobile';
    }
    if(sizeof($error)==0){
        $password=$_POST['password'];
          $sql="insert into userinfo (name,email,password,mobile,address)"
              . "values('".$name."','".$email."','".$password."','".$mobile."','"
              .$address ."' )";
//      echo $sql;
      $db->query($sql);
    }
    
}
?>

<!DOCTYPE html>

<html lang="en" class="no-js">
   
    <head>
        <meta charset="utf-8"/>
        <title>Smart Meter</title>
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
    </head>
   
  
    <body id="body" data-spy="scroll" data-target=".header">

          <header class="header navbar-fixed-top">
              <nav class="navbar" role="navigation">
                <div class="container">
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
					
					<!--div class="language-switcher">
					  <ul class="nav-lang">
                        <li><a class="active" href="#">EN</a></li>
					    <li><a href="#">DE</a></li>
						<li><a href="#">FR</a></li>
					  </ul>
					</div---> 
					
                        <div class="menu-container">
                            <ul class="nav navbar-nav navbar-nav-right">
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="index.php">Home</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="login.php">Login</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="registration.php">Registration</a></li>
                               
								
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
                                <br/><h2 style="color:white">Registration</h2>
	<div class="ex">
		<form action="" method="post">
			<table style="with: 20%">
				<tr>
					<td style="color:white">Name</td>
					<td><input type="text" name="name" /></td>
				</tr>
				
											<tr>
								<td>&nbsp;</td>
								</tr>
							
				<tr>
					<td style="color:white">Email</td>
					<td><input type="text" name="email" /></td>
				</tr>
				
											<tr>
								<td>&nbsp;</td>
								</tr>
							
				<tr>
					<td style="color:white">Password</td>
                                        <td><input type="password" name="password" /></td>
				</tr>
				
											<tr>
								<td>&nbsp;</td>
								</tr>
							
				<tr>
					<td style="color:white">Mobile</td>
					<td><input type="text" name="mobile" /></td>
				</tr>
				
											<tr>
								<td>&nbsp;</td>
								</tr>
							
				<tr>
					<td style="color:white">Address</td>
					<td><input type="text" name="address" /></td>
				</tr>
				
								
				
							
				
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</table>
				<a href=""><td>&nbsp;</td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><input type="submit" value="register" name="submit"/>
			
		 
		</form>
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
        

       
      
       
        <!-- End Contact -->
        <!--========== END PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
        <footer class="footer">
            <!-- Links -->
           
                           
            </div>
            <!-- End Links -->

            <!-- Copyright -->
          
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="vendor/jquery.min.js" type="text/javascript"></script>
       
        <script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="js/layout.min.js" type="text/javascript"></script>
       
    </body>
    <!-- END BODY -->
</html>