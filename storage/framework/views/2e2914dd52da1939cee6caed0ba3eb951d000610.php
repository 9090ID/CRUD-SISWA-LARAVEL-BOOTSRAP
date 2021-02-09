
	
	<?php $__env->startSection('content'); ?>
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Tambah Data Posts</h3>
									</div>
									<div class="panel-body">
									<div class="row">
										<div class="col-md-8">
											<form action="<?php echo e(route('post.create')); ?>" method="POST" enctype="multipart/form-data">
									       	<?php echo e(csrf_field()); ?>

										  <div class="form-group<?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
										    <label for="exampleInputEmail1">Title</label>
										    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" value="<?php echo e(old('title')); ?>">
										    <?php if($errors->has('title')): ?>
										    <span class="help-block"><?php echo e($errors->first('title')); ?></span>
										    <?php endif; ?>
										  </div>
										  <div class="form-group">
										    <label for="exampleFormControlTextarea1">Content</label>
										    <textarea class="form-control" name="content" id="content" rows="3"><?php echo e(old('content')); ?></textarea>
										  </div>

									
										</div>
										<div class="col-md-4">
											 <div class="input-group">
											   <span class="input-group-btn">
											     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
											       <i class="fa fa-picture-o"></i> Choose
											     </a>
											   </span>
											   <input id="thumbnail" class="form-control" type="text" name="thumbnail">
											 </div>
											 <img id="holder" style="margin-top:15px;max-height:100px;">

											  <div class="input-group">
											 <input type="submit" class="btn btn-info" value="submit">
											</div>
										</div>
									</form>
									</div>
									
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('footer'); ?>
	 <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
	<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        });

        $(document).ready(function(){
        	$('#lfm').filemanager('image');
        });
         
</script>
	<?php $__env->stopSection(); ?>
	
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelsiswa\resources\views/posts/add.blade.php ENDPATH**/ ?>