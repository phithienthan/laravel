<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Article</h3>
            </div>
            <div class="panel-body">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('article-create')): ?>
                    <div>
                        <a href="<?php echo e(route('admin.article.create')); ?>">
                            <button type="button" class="btn btn-success">New Article</button>
                        </a>
                    </div>
                <?php endif; ?>
                <br>
                <div class="row">
                    <form class="form-horizontal"method="GET" action="<?php echo e(route('admin.article.index')); ?>" autocomplete="false">
                        <div class="col-md-4 margin-top-20">
                            <input type="text" class="form-control" placeholder="Search by keyword" name="search" value="<?php echo e(isset($request['search']) ? $request['search'] : ''); ?>">
                        </div>
                        <div class="col-md-4 margin-top-20">
                            <select class="form-control" id="category_id" name ="category_id">
                                <option value = "">Select category </option>
                                <?php echo $categoriesHtml; ?>

                            </select>
                        </div>
                        <div class="col-md-4 margin-top-20">
                            <button class="btn btn-primary" type="submit" >Search</button>
                        </div>
                    </form>
                </div>
                <table class="table table-striped task-table">
                    <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Updated Time</th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="table-text">
                                <div> <?php echo e($article->id); ?></div>
                            </td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('article-edit')): ?>
                                <?php if(auth()->check() && auth()->user()->hasRole('author')):?>
                                <td class="table-text" >
                                    <a href="<?php echo e(route('admin.article.edit', $article->id)); ?>"><span style="<?php echo e($article->reject_flag ? "color:red;": ''); ?>"><?php echo e($article->title); ?></span></a>
                                </td>
                                <?php endif; ?>
                                <?php if(auth()->check() && auth()->user()->hasRole('editor')):?>
                                <td class="table-text" >
                                    <a href="<?php echo e(route('admin.article.edit', $article->id)); ?>"><span style="<?php echo e($article->reject_flag ? "color:red;": ''); ?>"><?php echo e($article->title); ?></span></a>
                                </td>
                                <?php endif; ?>

                            <?php else: ?>
                                <td class="table-text" >
                                    <?php echo e($article->title); ?>

                                </td>
                            <?php endif; ?>
                            <td class="table-text">
                                <div> <?php echo e($article->name); ?></div>
                            </td>
                            <td class="table-text">
                                <div> <?php echo e($article->published); ?></div>
                            </td>
                            <td class="table-text">
                                <div><?php echo e($article->update_at); ?></div>
                            </td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('article-delete')): ?>
                                    <form class=" visible-lg-inline-block" action="<?php echo e(route('admin.article.destroy', $article->id)); ?>" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                        <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                                    </form>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('article-publish')): ?>
                                    <form class=" visible-lg-inline-block" action="<?php echo e(route('admin.article.publish', $article->id)); ?>" method="POST">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                        <input class="btn btn-info btn-xs" type="submit" value="Publish">
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <?php echo e($articles->render()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
    <script>
        CKEDITOR.replace( 'content', {
            filebrowserBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html')); ?>',
            filebrowserImageBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Images')); ?>',
            filebrowserFlashBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Flash')); ?>',
            filebrowserUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')); ?>',
            filebrowserImageUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')); ?>',
            filebrowserFlashUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')); ?>'
        } );
        CKEDITOR.replace( 'comment',{
            filebrowserBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html')); ?>',
            filebrowserImageBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Images')); ?>',
            filebrowserFlashBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Flash')); ?>',
            filebrowserUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')); ?>',
            filebrowserImageUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')); ?>',
            filebrowserFlashUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')); ?>'
        } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>