<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>adhi ecom</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/vendor/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/vendor/ionicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/vendor/simple-line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/vendor/jquery-ui.min.css')); ?>">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/venobox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/jquery.lineProgressbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/aos.min.css')); ?>">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/sass/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/vendor/vendor.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/plugins.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.min.css')); ?>">

</head>


<body>
    <?php echo $__env->make('Includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('main-content'); ?>
    
    


   
    <?php echo $__env->yieldSection(); ?>
    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="<?php echo e(asset('assets/js/vendor/modernizr-3.11.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/jquery-ui.min.js')); ?>"></script>

    <!--Plugins JS-->
    <script src="<?php echo e(asset('assets/js/plugins/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/material-scrolltop.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.zoom.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/venobox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.lineProgressbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/aos.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.instagramFeed.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/ajax-mail.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/vendor.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/plugins.min.js')); ?>"></script>

    <!-- Main JS -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

    <?php echo $__env->make('Includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>



</html><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Template\resources\views/Home/master.blade.php ENDPATH**/ ?>