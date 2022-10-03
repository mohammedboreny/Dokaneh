<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Local style -->
    <link rel="stylesheet" href="./style.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">



            <!-- Row count AND Total in bag CODE -->
            <ul>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
        </div>

        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                    </ul>
                </li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>

        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> support@dokkaneh.com</li>
                <li>Free Shipping for all Order of 20jd</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> support@dokkaneh.com</li>
                                <li>Free Shipping for all Order of 20jd</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__auth">

                                <!-- CODE login url  -->
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <h3>Dokkaneh</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <!-- CODE url -->
                            <li class="active"><a href="index.php.php">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">

                    <!-- CODE -->
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <?php
    //  include_once './header.php'
    // session_start();

    // $id = $_SESSION['user_id']

    // 
    ?>
    <!-- php user and cart data recall from database tables   -->
    <?php
    require_once('./connection.php');
    // if (isset($_GET['id']) && isset($_GET['cart_id'])) {
    $id = 1;
    // $cart_id = 1;
    //user information sql select statement 
    $stmt = $conn->query("SELECT name, email ,phone,address
    FROM users where id=$id");
    $resultusers = $stmt->fetch(PDO::FETCH_OBJ);
    // get all users info
    $sql = "SELECT `cart`.`products_id`, `cart`.`quantity`, `cart`.`total`,
     `products`.`name`, `products`.`price`, `products`.`discount`
     FROM `products` 
     JOIN `cart` 
     ON products.id = cart.products_id";
    //  where cart_id=$cart_id"
    // Cart information sql select statement 
    $stmt2 = $conn->query($sql);

    // $stmt2 = $conn->query("SELECT quantity, total FROM cart WHERE cart_id=$cart_id");
    $resultcart = $stmt2->fetchAll(PDO::FETCH_OBJ);

    // get all users info
    ?>





    <!-- Html Checkout form  -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="confirmation.php " method=POST>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input name='fullName' value="<?php echo $resultusers->name; ?>" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address1" value="<?= $resultusers->address; ?>" placeholder="Street Address" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>:</span> Zarqa</p>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" value="<?= $resultusers->phone; ?>" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" value="<?= $resultusers->email; ?>" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Summery of the order  -->
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <?php
                                    $totalsum = 0;
                                    foreach ($resultcart as $item) {
                                        $totalsum += $item->price * $item->quantity;

                                    ?>

                                        <li> <?php echo $item->name;
                                                echo "&nbsp";
                                                echo "unit price = " . $item->price;
                                                echo "$" ?><span> </span> <span> <?php echo $item->price * $item->quantity; ?>
                                            </span></li>
                                    <?php  };
                                    if ($totalsum > 20) {
                                        $delivery = 0;
                                    } else {
                                        $delivery = 2;
                                    };
                                    ?>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span><?= $totalsum ?></span></div>
                                <div class="checkout__order__total">Total With Delivery <span><?= $totalsum + $delivery ?></span></div>
                                <input type="hidden" name="totalsum" value="<?php echo $totalsum; ?>">
                                <!-- Check out Submit button  -->

                                <button class="btn btn-danger" type="submit"> PLACE ORDER</button>
                                <?php
                                //  echo  '<a href="./confirmation.php?total=' . $totalsum . '&id=' . $id . '"> ' '</a>'; 
                                ?>
                                <!-- './modify.php?id=
                                //  echo '<a href="view-transaction.php?entry_id='.$single_id.'&user_name=' . $user_name .'">'.$user_name.'</a>'; -->

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Jordan:Zarqa</li>
                            <li>Phone: 0777213343</li>
                            <li>Email: support@dokkaneh.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with Love <i class="fa fa-heart" aria-hidden="true"></i> by Orange Coding Academy Members</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>