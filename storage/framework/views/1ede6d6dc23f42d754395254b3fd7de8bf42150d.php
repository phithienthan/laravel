<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if($article): ?>
                            <h3>Edit Article</h3>
                        <?php else: ?>
                            <h3>Create Article</h3>
                        <?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo e(route('admin.article.createArticle')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php if($article): ?>
                                <input type="hidden" name="id" value="<?php echo e($article->id); ?>" />
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name ="category">
                                    <?php echo $categoriesHtml; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name = "title" rows="1" value="<?php echo e($article ? old('title', $article->title) : old('title', '')); ?>">
                                <?php if($errors->has('title')): ?>
                                    <p class="text-danger"><?php echo e($errors->first('title')); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="img-thumbnail">Image thumbnail</label>
                                <input type="file" id="img-thumbnail" name="thumbnail" value="">
                                <?php if($article): ?>
                                    <img class="thumbnail" src="<?php echo e(asset($article->thumbnail)); ?>" alt="" width="150px" height="150px">
                                <?php endif; ?>
                                <?php if($errors->has('thumbnail')): ?>
                                    <p class="text-danger"><?php echo e($errors->first('thumbnail')); ?></p>
                                <?php endif; ?>

                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" rows="5" id="content-ckeditor" name = "content"> <?php echo e($article ? old('content', $article->content) : old('content', '')); ?></textarea>
                                <?php if($errors->has('content')): ?>
                                    <p class="text-danger"><?php echo e($errors->first('content')); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="comnment">Comment</label>
                                <textarea class="form-control" rows="5"  name = "comment"> <?php echo e($article ? old('comment', $article->comment) : old('comment', '')); ?></textarea>
                                <?php if($errors->has('comment')): ?>
                                    <p class="text-danger"><?php echo e($errors->first('comment')); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('article-confirm')): ?>
                            <div class="form-group">

                                <form class="visible-lg-inline-block" action="<?php echo e(route('admin.article.confirm', $article->id )); ?>" method="POST">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                    <input class="btn btn-warning" type="submit" onclick="return confirm('Are you sure you want to CONFIRM this article?');" value="Confirm">
                                </form>
                            </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('article-reject')): ?>
                            <div class="form-group">
                                <form class="visible-lg-inline-block" action="<?php echo e(route('admin.article.reject', $article->id )); ?>" method="POST">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to REJECT this article?');" value="Reject">
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
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