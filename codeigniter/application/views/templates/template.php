<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Padoca do Barba</title>

    <!-- FAVICON -->
    <link href="<?php echo base_url(); ?>/public/img/favicon.png" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/plugins/bootstrap/css/bootstrap-slider.css">
    <!-- Font Awesome -->
    <!-- <link href="<?php echo base_url(); ?>/public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Owl Carousel -->
    <link href="<?php echo base_url(); ?>/public/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/public/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="<?php echo base_url(); ?>/public/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/public/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="<?php echo base_url(); ?>/public/css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="/codeigniter/index.php/">
                            <img src="<?php echo base_url(); ?>/public/padoca do barba.png">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item">
                                    <a class="nav-link" href="/codeigniter/index.php/">Home</a>
                                </li>
                            </ul>
                            <?php if (isset($_SESSION['padoca']) && $_SESSION['padoca']) { ?>
                                <ul class="navbar-nav ml-auto mt-10">
                                    <li class="nav-item">
                                        <a class="nav-link login-button" href="/codeigniter/index.php/produtos/todosprodutos">Minha Loja</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link login-button" href="/codeigniter/index.php/login/deslogar">Logout</a>
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <ul class="navbar-nav ml-auto mt-10">
                                    <li class="nav-item">
                                        <a class="nav-link login-button" href="/codeigniter/index.php/login">Admin</a>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <?php echo $contents; ?>

    <!-- JAVASCRIPTS -->
    <script src="<?php echo base_url(); ?>/public/plugins/jQuery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/plugins/bootstrap/js/bootstrap-slider.js"></script>
    <!-- tether js -->
    <script src="<?php echo base_url(); ?>/public/plugins/tether/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/plugins/raty/jquery.raty-fa.js"></script>
    <script src="<?php echo base_url(); ?>/public/plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script src="<?php echo base_url(); ?>/public/plugins/smoothscroll/SmoothScroll.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="<?php echo base_url(); ?>/public/plugins/google-map/gmap.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/script.js"></script>

</body>

</html>