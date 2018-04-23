<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>All Users (<?php echo e($count); ?>)</h3>
                    </div>

                    <div class="panel-body">

                        <div>
                            <a href="<?php echo e(route('admin.user.create')); ?>">
                                <button type="button" class="btn btn-success">Create New User</button>
                            </a>
                        </div>
                        <form class="" action="<?php echo e(route('admin.user.destroy')); ?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <table class="table table-striped task-table">
                                <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                                <th><input  type="checkbox" class="selectall">  Check All</th>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="table-text">
                                            <div> <?php echo e($user -> name); ?></div>
                                        </td>
                                        <td class="table-text">
                                            <div> <?php echo e($user->email); ?></div>
                                        </td>
                                        <td class="table-text">
                                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label class="label label-success"><?php echo e($role->name); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                        <td>
                                            <a href="<?php echo e(route('admin.user.edit', $user->id)); ?>">
                                                <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                            </a>
                                        </td>
                                        <td> <input class="individual" name="checkbox[]" type="checkbox" value="<?php echo e($user -> id); ?>"></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                            <input class="btn btn-danger"  disabled type="submit" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete" style="margin-right: 75px; float: right;">
                        </form>
                        <div class="text-center">
                            <?php echo e($users->render()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/backend/user_list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>