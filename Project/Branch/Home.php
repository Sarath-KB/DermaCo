<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="../Assets/Templates/Main/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="../Assets/Templates/Main/fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="../Assets/Templates/Main/css/tiny-slider.css" />
    <link rel="stylesheet" href="../Assets/Templates/Main/css/aos.css" />
    <link rel="stylesheet" href="../Assets/Templates/Main/css/style.css" />

    <title>
      Property &mdash; Free Bootstrap 5 Website Template by Untree.co
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="Home.php" class="logo m-0 float-start">DERMOCO</a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="Home.php">Home</a></li>
              <li class="has-children">
                <a href="#">Privacy</a>
                <ul class="dropdown">
                  <li><a href="BranchProfile.php">My Profile</a></li>
                  <!-- <li><a href="ProfileEdit.php">Edit Profile</a></li>
                  <li><a href="PasswordChange.php">Change Password</a></li> -->
                  
                </ul>
              </li>

              <li class="has-children">
                <a >Bookings</a>
                <ul class="dropdown">
                  <li><a href="UserBookings.php">UserBooking</a></li>
                  <li><a href="Accept.php">Accepted Bookings</a></li>
                  <li><a href="Reject.php">Rejected Bookings</a></li>
                </ul>
              </li>
              <li><a href="Room.php">Rooms</a></li> 
              <li><a href="Logout.php">Logout</a></li>
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>

</body>
</html>