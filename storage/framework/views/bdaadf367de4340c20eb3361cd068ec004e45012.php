 <div class="col-md-3 ">
    <form class="Search" method="GET" action="<?php echo e(route('home')); ?>">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo e(isset($request['search']) ? $request['search'] : ''); ?>">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <ul class="list-group " >
        <li class="list-group-item title-list">
            <b>DANH MỤC</b> 
        </li>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catego): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <li class="list-group-item ">
            <i class="fa fa-chevron-right"></i> <a href="<?php echo e(route('home', [ 'category_id' => $catego->id])); ?>">  <?php echo e($catego->name); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>    