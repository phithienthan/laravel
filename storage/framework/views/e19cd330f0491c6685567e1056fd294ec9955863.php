<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if($role): ?>
                            <h3>Edit Role</h3>
                        <?php else: ?>
                            <h3>Create Role</h3>
                        <?php endif; ?>
                    </div>

                    <div class="panel-body">
                        <form method="post" action="<?php echo e(route('admin.role.createRole')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <?php if($role): ?>
                                <input type="hidden" name="id" value="<?php echo e($role->id); ?>" />
                            <?php endif; ?>
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Role's name..."
                                           value="<?php echo e($role ? old('name', $role->name) : old('title', '')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-md-2 control-label">Permissions</label>
                                <div class="col-md-10 ">
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input  type="checkbox" name="permisions[]" value="<?php echo e($permission ? old('id', $permission->id) : old('id', '')); ?>"
                                                <?php echo e(($role) ? (in_array($permission->id, array_map(function ($a){return $a["id"];}, $role->permissions->toArray())) ? 'checked' : '') :''); ?>

                                        > <?php echo e($permission->name); ?> <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>