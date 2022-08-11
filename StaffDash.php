<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Easy Application</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- styles -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300|Open+Sans:400,300,300italic,400italic" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/success.css" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    <style type="text/css">
        .auto-style2 {
            width: 292px;
            height: 54px;
        }
        .auto-style3 {
            height: 26px;
        }
    </style>
</head>
<?php
include "phpfiles/_staff.php";
?>
<body data-spy="scroll" data-target=".bs-docs-sidebar">

  <header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">


          <!-- logo -->
          &nbsp;<!-- end logo --><!-- top menu --><div>
            <nav>
              <ul class="nav topnav">
                <li class="dropdown success">
                  <a href="index.php"><i class="icon-home icon-white"></i> Home</a>
                </li>
                <li class="dropdown primary">
                  <a href="StaffDash.php"><i class="icon-star icon-white"></i> Dashboard</a>
                </li>
                <li class="dropdown info active">
                  <a href="phpfiles/_logout.php"><i class="icon-bullhorn icon-white"></i> Logout</a>
                </li>
                <li class="inverse">
                  <a href="Contact.php"><i class="icon-envelope icon-white"></i> Contact</a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- end menu -->
            <img alt="" class="auto-style2" src="assets/img/logo1.png" /></div>
      </div>
    </div>
  </header>
  <!-- Subhead
================================================== -->
  <section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span8">
            <h3 style="font-size: xx-large; font-weight: bold; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><u>Staff Dashboard:</u></h3>
            <p>&nbsp;</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="maincontent">
    <div class="container">
    <table align="center">
                    <tr>
                    <td width="400" style="border: solid;">
                    <div style="margin: 5px; border-bottom:solid 2px red;">
                    <img src="<?php echo $image ?>" height="20o" width="100" style="border-radius: 100%; margin:5px;">
                    <h1 style="display: inline;"><?php echo $username; ?></h1>
                    </div>
                    <div style="margin: 5px; border-bottom:solid 2px red;">
                    <h5>
                      <ul style="list-style-type: none;"><br>
                      <li>Name: <?php echo $name; ?></li><br>
                      <li>Phone Number: <?php echo $phonenumber; ?></li><br>
                      <li>Email: <?php echo $email; ?></li><br>
                    </ul>
                    </h5>
                  </div>
                    <!-- <div style="margin: 5px;"><a href="StaffRegForm.php"><button type="button">Add Staff</button></a></div> -->

                         </td>
                        <td width="600">
                            <table border="1" bordercolor="Green" align="right">
	                            <TR><TD COLSPAN="3" style="background-color: #FF0000; color: #FFFFFF; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: large; font-weight: bold;" class="auto-style4"><u>Queries:</u></TD></TR>
	                            <TR><TH>File ID</TH><TH>Summary</TH><TH>Action</TH></TR>
                              <?php
                                if (mysqli_num_rows($filesAvailable) == 0){
                                  echo "<TR><TD width=200 colspan=3 >No files available</TD></TR>";
                                } 
                                else{
                                  while ($row = mysqli_fetch_assoc($filesAvailable)){
                                    $filedetails = "SELECT FileID, FileStatus, Remarks FROM fileprogress where FileID = '$row[FileID]'";
                                    mysqli_select_db($conn, "easyapplication");
                                    $runquery = mysqli_query($conn, $filedetails);
                                    while ($filesdata = mysqli_fetch_assoc($runquery)){
                                      // print_r($filesdata);
                                      echo "<TR><TD width=200>$filesdata[FileID]</TD><TD width=400>$filesdata[FileStatus] $filesdata[Remarks]</TD><TD width=150><a href='Hold.php?fileid=$filesdata[FileID]'>View</a></TD></TR>";
                                    }
                                    
                                    
                                    
                                  }
                                }
	                            
                              ?>
	                        </table>
                       
                        </td>
                    </tr>
                </table> 
    </div>
  </section>
 <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="widget">
            <h4>About Developers</h4>
            <address>
					<strong>YASHESWANI</strong><br>
					
					<strong>PIYUSH GAURAV</strong><br>
					
					<strong>UTPAL KUMAR</strong><br>
					
					</address>
            <address>
					<strong>Contact us</strong><br>
					<a href="gmail.com">contact.utpallkumar@gmail.com</a>
					</address>
          </div>
        </div>

        <div class="span4">
          <div class="widget">
            <h4>Get email updates</h4>
            <form class="form-horizontal" action="#" method="post">
              <fieldset>
                <p>
                  Sign up for email updates and we'll plant a tree for you through Trees for the Future.
                </p>

                <div class="input-prepend input-append">
                  <input class="span2" id="appendedPrependedInput" type="text" placeholder="Email">
                  <button class="btn btn-inverse" type="submit">Subscribe!</button>
                </div>
              </fieldset>
            </form>
            <ul class="social_small">
              <li class="facebook first"><a href="#" title="Facebook">Facebook</a></li>
              <li class="twitt"><a href="#" title="Twitter">Twitter</a></li>
              <li class="googleplus"><a href="#" title="google plus">Google plus</a></li>
              <li class="flickr"><a href="#" title="flickr">Flickr</a></li>
              <li class="dribbble"><a href="#" title="Dribbble">Dribbble</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="span6">
            <p>&copy; Easy App - All right reserved</p>
          </div>
          <div class="span6">
            <div class="pull-right">
              <div class="credits">
                Designed by <a href="#">Yasheswani</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </footer>

  <script src="assets/js/jquery-1.8.2.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/flexslider/jquery.flexslider.js"></script>
  <script src="assets/js/flexslider/setting.js"></script>
  <script src="assets/js/application.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>


</body>

</html>


