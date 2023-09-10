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
            <a href="HomePage.php" class="logo m-0 float-start">DERMOCO</a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="HomePage.php">Home</a></li>
              
              <li class="has-children">
                <a href="">Privacy</a>
                <ul class="dropdown">
                  <li><a href="MyProfile.php">My Profile</a></li>
                  <!-- <li><a href="EditProfile.php">Edit Profile</a></li>
                  <li><a href="ChangePassword.php">Change Password</a></li> -->
                  <li><a href="Complaint.php">Complaint</a></li>
                </ul>
              </li>
                  <li class="has-children">
                  <a >Room Search</a>
                  <ul class="dropdown">
                  <li><a href="SearchBranch.php">Search Room</a></li>
                  <li><a href="MyBooking.php">MyBookings</a></li>
                  
                </ul>
              </li>
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
    <style>
        .bg {
            width: 100%;/* Set the width of the div */
            height: 786px; /* Set the height of the div */
            background-image: url("../Assets/Templates/Main/images/home1.jpg");
            background-size: cover; /* Make the background image cover the entire div */
            background-position: center;
        }
        .bg1 {
            width: 100%;/* Set the width of the div */
            height: 786px; /* Set the height of the div */
            background-image: url("../Assets/Templates/Main/images/home3.jpg");
            background-size: cover; /* Make the background image cover the entire div */
            background-position: center;
        }
        .bg2 {
            width: 100%;/* Set the width of the div */
            height: 786px; /* Set the height of the div */
            background-image: url("../Assets/Templates/Main/images/home5.jpg");
            background-size: cover; /* Make the background image cover the entire div */
            background-position: center;
        }
        .bg3 {
            width: 100%;/* Set the width of the div */
            height: 786px; /* Set the height of the div */
            background-image: url("../Assets/Templates/Main/images/home6.jpg");
            background-size: cover; /* Make the background image cover the entire div */
            background-position: center;
        }
        .bg4 {
            width: 100%;/* Set the width of the div */
            height: 786px; /* Set the height of the div */
            background-image: url("../Assets/Templates/Main/images/home7.jpg");
            background-size: cover; /* Make the background image cover the entire div */
            background-position: center;
        }
    </style>
    <div class="carousel-container">
                <div class="carousel-slides">
    <div class="bg carousel-slide"></div>
    <div class="bg1 carousel-slide"></div>  
    <div class="bg2 carousel-slide"></div>
    <div class="bg3 carousel-slide"></div>
    <div class="bg4 carousel-slide"></div>
      </div>
      </div>
      <style>
  /* .bt {
    height:290px;
    border-radius:10px;
    border:none;
    width:50px;
    font-size:50px;
    color:white;
    background-color:transparent;
  } */
  /* .car {
    display: flex;
    justify-content: center;
    background-color:gray;
    width:1000px;
    margin-left:250px;
    margin-top:20px;
    border-radius:10px;
    margin-bottom:20px;
  }
  .con {
    padding:20px;
  }
  .card{
    padding: 5px;
    width:1000px;
    background-color:#dedede;
    height:370px;
} */

/* body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
} */

/* .carousel-container {
    overflow: hidden;
    width: 100%;
} */

.carousel-slides {
    display: flex;
    transition: transform 0.9s ease-in-out;
}

.carousel-slide {
    flex: 0 0 calc(110% - 20px); 
    /* margin: 10px;  */
}

/* .carousel-slide img {
    width: 100%;
    height: auto;
} */
</style>

<body>

    <script>
    // document.addEventListener("DOMContentLoaded", function () {
    const carouselSlides = document.querySelector(".carousel-slides");
    const slides = document.querySelectorAll(".carousel-slide");
    const slideWidth = slides[0].offsetWidth + 20; // Adjust for margins
    let currentIndex = 0;

    function nextSlide() {
        currentIndex += 1;
        if (currentIndex >= slides.length) { // Adjust for the number of visible slides (4 - 1)
            currentIndex = 0;
        }
        updateCarousel();
    }

    function updateCarousel() {
        const translateXValue = -currentIndex * slideWidth;
        carouselSlides.style.transform = `translateX(${translateXValue}px)`;
    }

     setInterval(nextSlide, 5000); // Automatically slide every 3 seconds

    updateCarousel(); // Initialize the carousel
// });
    </script>
</body>
</html>