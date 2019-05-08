<?php include_once('connection.php'); 
if (!isset($_SESSION['accountid'])) {
    header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>ZAKAT</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <script src="assets/plugins/jquery/jquery.min.js"></script>

<![endif]-->

<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" >
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->

                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->


                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4>
                                                <?php if (isset($_SESSION['accountlevel']) and $_SESSION['accountlevel'] == 1) 
                                                {
                                                   echo "ADMIN";
                                                }
                                                elseif(isset($_SESSION['accountlevel']) and $_SESSION['accountlevel'] == 2)
                                                {
                                                    echo "AMILEEN";
                                                }
                                                else
                                                {
                                                    echo "PAYER";
                                                }
                                                ?>
                                                    
                                                </h4>
                                                <a href="profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                               
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        

        <?php if (isset($_SESSION['accountlevel']) and $_SESSION['accountlevel'] == '1'): ?>
            <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="assets/images/users/profile.png" alt="user" /> 
                             <!-- this is blinking heartbit-->
                            <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                            <h5>ADMIN</h5>
                            <a href="logout.php" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>    
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                         <li class="nav-devider"></li>
                        <li class="nav-small-cap">MAIN</li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Amileen</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="register-amileen.php">Register</a></li>
                                <li><a href="manage-amileen.php">Manage</a></li>
                            </ul>
                        </li>


                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map"></i><span class="hide-menu">Barangay</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="register-barangay.php">Register</a></li>
                                <li><a href="manage-barangay.php">Manage</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Purok</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="register-purok.php">Register</a></li>
                                <li><a href="manage-purok.php">Manage</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-image-area"></i><span class="hide-menu">Household</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage-household.php">Manage</a></li>
                   
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-coin"></i><span class="hide-menu">Zakat</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage-zakatul-amwal.php">Zakatul Amwal</a></li>
                                <li><a href="manage-zakatul-fitre.php">Zakatul Fitre</a></li>
                   
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Payment History</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="payment-history.php">View History</a></li>
                             
                      
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map"></i><span class="hide-menu">Population Distribution By Settlement Map</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="view-map.php">View Map</a></li>
                             
                      
                            </ul>
                        </li>

                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <?php endif ?>


        <?php if (isset($_SESSION['accountlevel']) and $_SESSION['accountlevel'] == '2'): 

        $qry = mysqli_query($connection, "select * from amileen_view where accountid = '" . $_SESSION['accountid'] . "'");



        $res = mysqli_fetch_assoc($qry);


        ?>
            <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="assets/images/users/profile.png" alt="user" /> 
                             <!-- this is blinking heartbit-->
                            <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                            <h5><?php echo $res['fullname'] ; ?></h5>
                            <a href="logout.php" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>    
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                         <li class="nav-devider"></li>
                        <li class="nav-small-cap">MAIN</li>


                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-image-area"></i><span class="hide-menu">Household</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage-household.php">Manage</a></li>
                   
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-calculator"></i><span class="hide-menu">Zakat Calculator</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="register-zakat-calculation.php">New Calculation</a></li>
                     
                      
                            </ul>
                        </li>


                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-coin"></i><span class="hide-menu">Submission of Remittances</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage-submission-of-remittances.php">Submit</a></li>
                                <li><a href="submission-content.php">Submission Content</a></li>
                      
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Payment History</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="payment-history.php">View History</a></li>
                             
                      
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map"></i><span class="hide-menu">Population Distribution By Settlement Map</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="view-map.php">View Map</a></li>
                             
                      
                            </ul>
                        </li>

                        
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <?php endif ?>

        <?php if (isset($_SESSION['accountlevel']) and $_SESSION['accountlevel'] == '3'): 

        $qry = mysqli_query($connection, "select * from familyprofile_view where accountid = '" . $_SESSION['accountid'] . "'");



        $res = mysqli_fetch_assoc($qry);


        ?>
            <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="assets/images/users/profile.png" alt="user" /> 
                             <!-- this is blinking heartbit-->
                            <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                            <h5><?php echo $res['fullname'] ; ?></h5>
                            <a href="logout.php" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>    
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                         <li class="nav-devider"></li>
                        <li class="nav-small-cap">MAIN</li>


                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Payment History</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="payment-history-payer.php">View History</a></li>
                             
                      
                            </ul>
                        </li>

                

                        
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <?php endif ?>



        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
