<?php
    include './class/frontend.class.php';
    $obj = new Frontend;
?>
<!DOCTYPE html>
<html>
<head>
    <title>ফার্মার এসিস্টেন্ট </title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta property="og:title" content="Vide" />
    <meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar(){
            window.scrollTo(0,1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
    <!-- js -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <!-- profile content -->
    <!-- //js -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="assets/js/move-top.js"></script>
    <script type="text/javascript" src="assets/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
          $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
          });
        });
    </script>
    <!-- start-smoth-scrolling -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <!--- start-rate---->
    <script src="assets/js/jstarbox.js"></script>
    <link rel="stylesheet" href="assets/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                average: starbox.attr('data-start-value'),
                changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                ghosting: starbox.hasClass('ghosting'),
                autoUpdateAverage: starbox.hasClass('autoupdate'),
                buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                    var val = Math.random();
                    starbox.next().text(' '+val);
                    return val;
                    }
                })
            });
        });
    </script>
    <!---//End-rate---->
</head>
<body>
    <?php
        include './includes/header.php';
        include './includes/banner.php';

        // include './includes/banner.php';

        if (isset($page)) {
            switch ($page) {
                case 'home':
                    include "./includes/home_content.php";
                    break;

                case 'search':
                    include "./includes/search_content.php";
                    break;
                case 'profile':
                    include "./includes/profile_content.php";
                    break;

                case 'product':
                    include "./includes/product_content.php";
                    break;
                case 'bajardhor':
                    include "./includes/bajardhor-content.php";
                    break;

                case 'contact':
                    include "./includes/contact_content.php";
                    break;

                    break;
                case 'category_wise':
                    include "./includes/category_wise_content.php";
                    break;
                    break;

                case 'agri_tips':
                    include "./includes/agri_tips_content.php";
                    break;
                case 'faq':
                    include "./includes/faq_content.php";
                    break;

                case 'question':
                    include "./includes/argi_question_content.php";
                    break;

                case 'consultanting':
                    include "./includes/consulting-content.php";
                    break;

                default:
                    include './includes/home_content.php';
                    break;
            }
        } else {
            include './includes/home_content.php';
        }

        include './includes/footer_content.php';
    ?>

    <script type="text/javascript">
        $(document).ready(function() {
            /*
              var defaults = {
              containerID: 'toTop', // fading element id
              containerHoverID: 'toTopHover', // fading element hover id
              scrollSpeed: 1200,
              easingType: 'linear'
              };
            */
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <!-- //smooth scrolling -->
    <!-- for bootstrap working -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <script type='text/javascript' src="assets/js/jquery.mycart.js"></script>
    <script type="text/javascript">
        $(function() {

            var goToCartIcon = function($addTocartBtn) {
                var $cartIcon = $(".my-cart-icon");
                var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({
                    "position": "fixed",
                    "z-index": "999"
                });
                $addTocartBtn.prepend($image);
                var position = $cartIcon.position();
                $image.animate({
                    top: position.top,
                    left: position.left
                }, 500, "linear", function() {
                    $image.remove();
                });
            }

            $('.my-cart-btn').myCart({
                classCartIcon: 'my-cart-icon',
                classCartBadge: 'my-cart-badge',
                affixCartIcon: true,
                checkoutCart: function(products) {
                    $.each(products, function() {
                        console.log(this);
                    });
                },
                clickOnAddToCart: function($addTocart) {
                    goToCartIcon($addTocart);
                },
                getDiscountPrice: function(products) {
                    var total = 0;
                    $.each(products, function() {
                        total += this.quantity * this.price;
                    });
                    return total * 1;
                }
            });

        });
    </script>
</body>
</html>
