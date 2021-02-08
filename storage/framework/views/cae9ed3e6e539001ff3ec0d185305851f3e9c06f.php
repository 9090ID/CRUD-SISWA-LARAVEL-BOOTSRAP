
<?php $__env->startSection('header'); ?>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
						<?php if(session('sukses')): ?>
						<div class="alert alert-success" role="alert">
					  		<?php echo e(session('sukses')); ?>

						</div>
						<?php endif; ?>

						<?php if(session('error')): ?>
						<div class="alert alert-danger" role="alert">
					  		<?php echo e(session('error')); ?>

						</div>
						<?php endif; ?>
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="" class="img-circle" alt="Avatar">
										<h3 class="name"><?php echo e($guru->nama); ?></h3>
										<span class="online-status status-available">Available</span>
									</div>
									
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								
								<!-- AWARDS -->
								
								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Pelajaran yang diajar oleh guru <?php echo e($guru->nama); ?> </h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>NAMA</th>
												<th>SEMESTER</th>
											</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $guru->mapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mapel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($mapel->nama); ?></td>
												<td><?php echo e($mapel->semester); ?></td>
				
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
							</div>
									<div class="panel">
										<div id="chartNilai"></div>
									</div>

								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-siswa\resources\views/guru/profile.blade.php ENDPATH**/ ?>