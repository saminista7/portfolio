<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html data-theme="forest" lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUST Canteen Website</title>

    <!-- Link our CSS file -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="fonts/icomoon/style3.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdpn.io/cpe/boomboom/pen.js?key=pen.js-153eadeb-33e2-1701-e0d8-fdb7b99604b7" crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdpn.io/cpe/boomboom/pen.js?key=pen.js-153eadeb-33e2-1701-e0d8-fdb7b99604b7" crossorigin=""></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

    <link rel="stylesheet" href="css/style2.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>


</head>


<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar bg-black opacity-90">
        <div class="container ml-10 ">
            <div class="logo scale-75 hover:scale-[.76] ease-in duration-300">
                <a href="index.php" title="Logo" class="logo-div">
                    <img src="images/logo.png" style="width: 70px; height: auto" alt="Restaurant Logo" class="img-responsive">
                    <h1 style="color: white" class="text-[4em] font-bold inline">
                        <marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="scroll" direction="up" id="mytext">
                            <h1 class="text-green-500 text-[.75] font-bold ">AUST</h1>
                            <h1 class="text text-[.75em] font-bold font-extralight">Canteen</h1>
                        </marquee>


                    </h1>
                </a>
            </div>


            <div class="menu text-right ml-auto mt-5">
                <ul class="flex ">
                    <li class="logo scale-[1.05] hover:scale-[1.15] hover:bg-stone-900 ease-in duration-300 hover:text-green-500">
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li class="logo scale-[1.05] hover:scale-[1.15] hover:bg-stone-900 hover:text-green-500 ease-in duration-300">
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li class="logo scale-[1.05] hover:scale-[1.15] hover:bg-stone-900 hover:text-green-500 ease-in duration-300">
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li class="logo scale-[1.05] hover:scale-[1.15] hover:bg-stone-900 hover:text-green-500 ease-in duration-300">
                        <a href="contact.php">Contact</a>
                    </li>
                    <li class="logo scale-[1.05] hover:scale-[1.15] hover:bg-stone-900 hover:text-green-500 ease-in duration-300">
                        <a href="admin/login.php">Admin</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->