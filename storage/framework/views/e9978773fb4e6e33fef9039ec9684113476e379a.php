
	
	<?php $__env->startSection('content'); ?>
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
									<div class="right">
										
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle" ></i></button>
								</div>
									</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Nama Depan</th>
												<th>Nama Belakang</th>
												<th>Jenis Kelamin</th>
												<th>Agama</th>
												<th>Alamat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $data_siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
											<td><a href="/siswa/<?php echo e($siswa->id); ?>/profile"><?php echo e($siswa->nama_depan); ?></a></td>
											<td><a href="/siswa/<?php echo e($siswa->id); ?>/profile"><?php echo e($siswa->nama_belakang); ?></a></td>
											<td><?php echo e($siswa->jenis_kelamin); ?></td>
											<td><?php echo e($siswa->agama); ?></td>
											<td><?php echo e($siswa->alamat); ?></td>
											<td><a href="/siswa/<?php echo e($siswa->id); ?>/edit" class="btn btn-warning btn-sm">Edit</a>
												<a href="/siswa/<?php echo e($siswa->id); ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm ('BENARINNI MAU DIHAPUS?')">Delete</a>
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
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/siswa/create" method="POST" enctype="multipart/form-data">
       	<?php echo e(csrf_field()); ?>

	  <div class="form-group<?php echo e($errors->has('nama_depan') ? 'has-error' : ''); ?>">
	    <label for="exampleInputEmail1">Nama Depan</label>
	    <input type="text" class="form-control" name="nama_depan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Depan" value="<?php echo e(old('nama_depan')); ?>">
	    <?php if($errors->has('nama_depan')): ?>
	    <span class="help-block"><?php echo e($errors->first('nama_depan')); ?></span>
	    <?php endif; ?>
	  </div>
	  <div class="form-group">
	  <label for="exampleInputEmail1">Nama Belakang</label>
	    <input type="text" class="form-control" name="nama_belakang" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Belakang" value="<?php echo e(old('nama_belakang')); ?>">
	  </div>

	   <div class="form-group<?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
	  <label for="exampleInputEmail1">Email</label>
	    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" value="<?php echo e(old('email')); ?>">
	    <?php if($errors->has('email')): ?>
	    <span class="help-block"><?php echo e($errors->first('email')); ?></span>
	    <?php endif; ?>
	  </div>

	   <div class="form-group<?php echo e($errors->has('jenis_kelamin') ? 'has-error' : ''); ?>">
	    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
	    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
	      <option value="L">Laki-Laki</option>
	      <option value="P">Perempuan</option>
	    </select>
	    <?php if($errors->has('jenis_kelamin')): ?>
	    <span class="help-block"><?php echo e($errors->first('jenis_kelamin')); ?></span>
	    <?php endif; ?>
  </div>
  <div class="form-group">
	  <label for="exampleInputEmail1">Agama</label>
	    <input type="text" class="form-control" name="agama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="<?php echo e(old('agama')); ?>">
	  </div>
	   <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?php echo e(old('alamat')); ?></textarea>
  </div>
  <div class="form-group<?php echo e($errors->has('avatar') ? 'has-error' : ''); ?>">
						    <label for="exampleFormControlTextarea1">Avatar</label>
						     <input type="file" class="form-control" name="avatar" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="<?php echo e(old('avatar')); ?>" >
						  </div>
						 <?php if($errors->has('avatar')): ?>
	    <span class="help-block"><?php echo e($errors->first('avatar')); ?></span>
	    <?php endif; ?>  
   </div>
 

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Submit</button>
     </form>
      </div>
    </div>
  </div>

	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelsiswa\resources\views/siswa/index.blade.php ENDPATH**/ ?>