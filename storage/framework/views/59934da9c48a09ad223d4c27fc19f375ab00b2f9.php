<?php $__env->startSection('content'); ?>

<div class="container " >
<div class="row" >
    <div class="col-md-9">
        <div class="panel-body detailpage">
            <h3 ><b><?php echo e($article->title); ?><b></h3> 
                <i><?php echo e($article->created_at); ?></i>
                <img class="img-responsive"  src="<?php echo e($article->thumbnail); ?>"/>
                <p> <?= nl2br($article->content) ?> <p>
                </div>
            </div>
            <?php echo $__env->make('HomePage.layouts.include.side_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('HomePage.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>