
	
	<?php $__env->startSection('content'); ?>
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Posts</h3>
									<div class="right">
									<a href="<?php echo e(route('posts.add')); ?>" class="btn btn-sm btn-primary">Add Posts</a>	
								
									</div>
									</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>TITLE</th>
												<th>USER</th>
												<th>ACTION</th>
											</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
											<td><?php echo e($post->id); ?></td>
											<td><?php echo e($post->title); ?></td>
											<td><?php echo e($post->user->name); ?></td>
											<td>
												<a href="<?php echo e(route('site.single.post',$post->slug)); ?>" class="btn btn-info btn-sm" target="_blank">View</a>
												<a href="#" class="btn btn-warning btn-sm">Edit</a>
												<a href="#" class="btn btn-danger btn-sm delete" siswa-id="#">Delete</a>
											</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>


	<?php $__env->stopSection(); ?>
	<!--Sweet Alert-->
	<?php $__env->startSection('footer'); ?>
	<script>
		$('.delete').click(function(){
			var siswa_id = $(this).attr('siswa-id');
			swal({
					  title: "Yakin Mau dihapus?",
					  text: "Dihapus untuk siswa dengan id "+siswa_id + " ??",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
					})
					.then((willDelete) => {
					console.log(willDelete);
					  
					  if (willDelete) {
					  	window.location = "/siswa/"+siswa_id+"/delete";
					  }
			});
		});
	</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelsiswa\resources\views/posts/index.blade.php ENDPATH**/ ?>