<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>Categories</h3>
                    </div>

                    <div class="panel-body">
                        <div>
                            <a href="<?php echo e(route('admin.category.create')); ?>">
                                <button type="button" class="btn btn-success">New Category</button>
                            </a>
                        </div>
                       <table class="table table-striped task-table">
                           <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created Time</th>
                           </thead>
                           <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="table-text">
                                            <div> <?php echo e($category->id); ?></div>
                                        </td>
                                        <td class="table-text">
                                            <div> <?php echo e($category->name); ?></div>
                                        </td>
                                        <td class="table-text">
                                            <div> <?php echo e($category->description); ?></div>
                                        </td>
                                        <td class="table-text">
                                            <div><?php echo e($category->created_at); ?></div>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.category.edit', $category->id)); ?>">
                                                <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                            </a>
                                            <form class="delete visible-lg-inline-block" action="<?php echo e(route('admin.category.destroy', $category->id)); ?>" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                <input class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure you want to delete this item?');"  value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </tbody>
                       </table>
                        <div class="text-center">
                            <?php echo e($categories->render()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>