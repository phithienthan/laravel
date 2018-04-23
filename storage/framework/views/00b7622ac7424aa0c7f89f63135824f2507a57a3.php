<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if($category): ?>
                            <h3>Edit Category</h3>
                        <?php else: ?>
                            <h3>Create Category</h3>
                        <?php endif; ?>
                    </div>

                    <div class="panel-body">
                        <form method="post" action="<?php echo e(route('admin.category.createCategory')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <?php if($category): ?>
                                <input type="hidden" name="id" value="<?php echo e($category->id); ?>" />
                            <?php endif; ?>
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Category's name..."
                                           value="<?php echo e($category ? old('name', $category->name) : old('title', '')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label">Description</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="description" name="description" rows="3" placeholder="Category's description..."
                                              value="<?php echo e($category ? old('description', $category->description) : old('description', '')); ?>">
                                    <?php if($errors->has('description')): ?>
                                        <p class="text-danger"><?php echo e($errors->first('description')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div>

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