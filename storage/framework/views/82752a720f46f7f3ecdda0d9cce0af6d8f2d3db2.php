<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SF-CMS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte/_all-skins.min.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo e(route('admin.index')); ?>" class="logo">
            <span class="logo-lg "><i class="fa fa-home"></i><b>  Web 24h</b></span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" style="margin-right: 85px!important;">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        </nav>
    </header>
    <?php echo $__env->make('admin.layouts.admin.include.side_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="content-wrapper">
        <?php if(session('success')): ?>
            <div class="alert alert-success fade in">
                <button class="close" data-dismiss="alert">×</button>
                <i class="fa-fw fa fa-check"></i>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger fade in">
                <button class="close" data-dismiss="alert">×</button>
                <i class="fa fa-times"></i>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('css'); ?>
        <?php echo $__env->yieldContent('header'); ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- ./wrapper -->

<script>

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script src="<?php echo e(asset('js/adminlte/adminlte.min.js')); ?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
