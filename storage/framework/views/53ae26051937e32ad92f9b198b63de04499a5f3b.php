<?php $__env->startSection('content'); ?>
 
   <div class="container" >
        <div class="row" >
            <div class="col-md-9">
                <div class="panel-body"  >
                    <div class="row container-fluid" >
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4" >
                            <div class="content-box">
                                <a href="<?php echo e(route('detail', [ 'id' => $article->id])); ?>"> <h4 class="title"><b><?php echo e($article->title); ?><b></h4> </a>
                                    <div class="image-box">
                                        <img src="<?php echo e($article->thumbnail); ?>"/>
                                    </div>

                                    <div class="content-artcle">
                                        <i><?php echo e($article->created_at); ?></i> 
                                        <p class="content-text"><?php echo e(implode(' ', array_slice(explode(' ', $article->content), 0,20))." ..."); ?></p>
                                    </div>
                                    <a href="<?php echo e(route('detail', [ 'id' => $article->id])); ?>" class="read-more"><button type="button" class="btn btn-success btn-xs"> ÐỌC TIẾP</button></a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>  
                        <div class="row pagination" ><?php echo e($articles->links()); ?></div> 
                    </div>
                </div>
                <?php echo $__env->make('HomePage.layouts.include.side_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('HomePage.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>