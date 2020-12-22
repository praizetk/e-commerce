<?php require_once "functions/getShit.php"; // The functions file
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        hello.colorlib@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right">
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <form method="get" action="search.php" enctype="multipart/form-data" class="input-group">
                            <input type="text" name="user_value" placeholder="Search a product" required>
                           <input type="submit" name="search" value="Search">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="cart.php">
                                    <i class="icon_bag_alt"></i>
                                    <span><?php countCartItems();?></span>
                                </a>
                                <div class="cart-hover">
                                    <?php hoverShowCartProducts();?>
                                    
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price"><?php cartPrice();?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./shop.php">Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown" >
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="contactUs.php">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="cart.php">Shopping Cart</a></li>
                                <li><a href="./checkout.php">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                                <?php if(isset($_SESSION['user_email']))echo"<li><a href='customers/myAccount.php'>My Account</a></li>";?>
                                <?php if(!isset($_SESSION['user_email']))echo"<li><a href='customerRegister.php'>SignUp</a></li>";?>
                                <li><?php
                                if(!isset($_SESSION['user_email']))
                                echo "<a href='user_login.php' style=\"text-decoration: none; color:whitesmoke;margin-left: 3px;\">Login</a>";
                                else
                                echo "<a href='logout.php' style=\"text-decoration: none; color:whitesmoke; margin-left: 3px;\">Logout</a>";
                                ?></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                 
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form class="registerform" method="post" action="customerRegister.php" enctype="multipart/form-data">
                            <div class="group-input">
                                <label for="Name">Name *</label>
                                <input type="text" id="username" name="name" placeholder="Enter Your Name" required>
                            </div>
                            <div class="group-input">
                                <label for="username">Email *</label>
                                <input type="text" id="username" name="email" placeholder="Enter Your E-mail" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="text" id="pass" name="password" placeholder="Enter Your password" required>
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Country *</label>
                                <select title="" name="country" required style="background-color: #4B5557; color: whitesmoke; width: 100%; height: 40px">
                                <option>          </option>
                                <option>Egypt</option>
                                <option> Saudi Arabia</option>
                                <option>Palestine </option>
                                option>United Arab Emirates</option>
                                <option>Lebanon</option>
                                <option>Syria</option>
                                <option>Jordan</option>
                                <option> Yemen</option>
                                <option>Bahrain</option>
                                <option disabled>Qatar</option>
                                <option>Libya </option>
                                <option>Algeria</option>
                                <option>Morocco</option>
                                <option>Tunis</option>
                                <option>Iraq</option>
                                <option>Kuwait</option>
                                <option>Oman</option>
                                </select>
                            </div>
                            <div class="group-input">
                                <label for="phone">Phone Number *</label>
                                <input type="text" id="pass" name="phone" placeholder="Enter Your phone no. with country key" required>
                            </div>
                            <div class="group-input">
                                <label for="image">Image *</label>
                                <input type="file" name="image" required>
                            </div>
                            <button type="submit" class="site-btn register-btn" name="register" value="Register">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="user_login.php" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php
    global $object;
    if(isset( $_SESSION['user_email'] ))
    {
        echo "<script>alert('You already registered with us')</script>";
        echo "<script>window.open('customers/myAccount.php','_self')</script>";
    }
    else
    {
    if(isset($_POST['register']))
    {
        $user_ip = getUserIp();                        
        $user_name = sanitizeInput($_POST['name']);
        $in_password = $_POST['password'];
        $password = password_hash($in_password , PASSWORD_DEFAULT); // I can use also the PASSWORD_BCRYPT and CRYPT_BLOWFISH
        $email = sanitizeInput($_POST['email']);
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $customerImage = $_FILES['image']['name']; // I had an error as i didn't write the enctype attribute for the form tag
        $customerImage_tmp = $_FILES['image']['tmp_name'];
        $image_mimiType = $_FILES['image']['type'];
        $allowed = array("image/jpeg", "image/gif", "application/pdf","image/png");
        $existCheck = "SELECT * FROM customers WHERE user_name = '$user_name'";
        $runCheck = $object->query($existCheck);
        if($runCheck->num_rows >0){
            echo "<script>alert('This name already exists,Choose another one please')</script>";
            exit();
        }
        $existCheck = "SELECT * FROM customers WHERE user_email = '$email'";
        $runCheck = $object->query($existCheck);
        if($runCheck->num_rows >0){
            echo "<script>alert('This email already exists,Choose another one please')</script>";
            exit();
        }
         if(!in_array($image_mimiType ,$allowed ))
         {
             echo "<script>alert('Upload a valid photo(jpeg,png,gif)')</script>";
             exit();
         }
        else
        {
        $insert_user = "INSERT INTO customers (`user_ip_address`,`user_name`,`user_pass`,`user_email`,`user_country`,`customer_contact`,`customer_image`)
VALUES ('$user_ip','$user_name','$password','$email','$country','$phone','$customerImage')";
        $runquery = $object->query($insert_user);

        if(!$runquery)
            echo "<script>alert('Something went wrong please try again')</script>";
        else
        {
            move_uploaded_file($customerImage_tmp,"customers/customer_images/$customerImage");
            $directQuery = "SELECT * FROM cart WHERE ip_address='$user_ip'";
            $runDirect = $object->query($directQuery);
            $_SESSION['user_email'] = $email;
            if($runDirect->num_rows == 0)
            {
                echo "<script>alert('You registered successfully')</script>";
                echo "<script>window.open('customers/myAccount.php','_self')</script>";
            }
            else
            {
                echo "<script>alert('You registered successfully')</script>";
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
      }
    }
    }
    ?>