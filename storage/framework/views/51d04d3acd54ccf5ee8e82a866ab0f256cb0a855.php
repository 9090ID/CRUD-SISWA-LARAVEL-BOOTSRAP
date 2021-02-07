
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
										<img src="<?php echo e($siswa->getAvatar()); ?>" class="img-circle" alt="Avatar">
										<h3 class="name"><?php echo e($siswa->nama_depan); ?></h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												<?php echo e($siswa->mapel->count()); ?> <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin<span><?php echo e($siswa->jenis_kelamin); ?></span></li>
											<li>Agama<span><?php echo e($siswa->agama); ?></span></li>
											<li>Alamat <span><?php echo e($siswa->alamat); ?></span></li>
											
										</ul>
									</div>
									
									<div class="text-center"><a href="/siswa/<?php echo e($siswa->id); ?>/edit" class="btn btn-warning">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  Tambah Nilai
								</button>
								<!-- AWARDS -->
								
								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>

												<th>KODE</th>
												<th>NAMA</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
											</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $siswa->mapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mapel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($mapel->kode); ?><td>
												<td><?php echo e($mapel->nama); ?></td>
												<td><?php echo e($mapel->semester); ?></td>
												<td><?php echo e($mapel->pivot->nilai); ?></td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/siswa/<?php echo e($siswa->id); ?>/addnilai" method="POST" enctype="multipart/form-data">
       	<?php echo e(csrf_field()); ?>

       	  <div class="form-group">
		    <label for="mapel">Mata Pelajaran</label>
		    <select class="form-control" id="mapel" name="mapel">
		    	<?php $__currentLoopData = $mapelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<option value="<?php echo e($mp->id); ?>"><?php echo e($mp->nama); ?></option>
		    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </select>
		  </div>
	  <div class="form-group<?php echo e($errors->has('nilai') ? 'has-error' : ''); ?>">
	    <label for="exampleInputEmail1">Nilai</label>
	    <input type="text" class="form-control" name="nilai" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Depan" value="<?php echo e(old('nilai')); ?>">
	    <?php if($errors->has('nilai')): ?>
	    <span class="help-block"><?php echo e($errors->first('nilai')); ?></span>
	    <?php endif; ?>
	  </div>
	
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelsiswa\resources\views/siswa/profile.blade.php ENDPATH**/ ?>