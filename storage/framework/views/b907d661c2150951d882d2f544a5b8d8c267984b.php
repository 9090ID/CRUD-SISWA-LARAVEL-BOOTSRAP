
	
	
	<?php $__env->startSection('content'); ?>
	<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
						<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Inputs</h3>
								</div>
								<div class="panel-body">
									<form action="/siswa/<?php echo e($siswa->id); ?>/update" method="POST" enctype="multipart/form-data">
						       	<?php echo e(csrf_field()); ?>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Nama Depan</label>
							    <input type="text" class="form-control" name="nama_depan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Depan" value="<?php echo e($siswa->nama_depan); ?>">
							    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							  </div>
							  <div class="form-group">
							  <label for="exampleInputEmail1">Nama Belakang</label>
							    <input type="text" class="form-control" name="nama_belakang" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Belakang" value="<?php echo e($siswa->nama_belakang); ?>">
							    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							  </div>
							   <div class="form-group">
							    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
							    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
							      <option value="L" <?php if($siswa->jenis_kelamin == 'L'): ?> selected <?php endif; ?>>Laki-Laki</option>
							      <option value="P" <?php if($siswa->jenis_kelamin == 'P'): ?> selected <?php endif; ?>>Perempuan</option>
							    </select>

						  <div class="form-group">
							  <label for="exampleInputEmail1">Agama</label>
							    <input type="text" class="form-control" name="agama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="<?php echo e($siswa->agama); ?>" >
							    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							  </div>
							 <div class="form-group">
						    <label for="exampleFormControlTextarea1">Alamat</label>
						    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?php echo e($siswa->alamat); ?></textarea>
						  </div>

						  <div class="form-group">
						    <label for="exampleFormControlTextarea1">Avatar</label>
						     <input type="file" class="form-control" name="avatar" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="<?php echo e($siswa->avatar); ?>" >
						  </div>
						      </div>
						      <div class="modal-footer">
						     <button type="submit" class="btn btn-warning">Update</button>
						     </form>
								</div>
							</div>



						</div>
					</div>
				</div>
			</div>
	</div>



	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('content1'); ?>

	<h1>Edit Data Siswa</h1>
	<?php if(session('sukses')): ?>
	<div class="alert alert-success" role="alert">
  		<?php echo e(session('sukses')); ?>

	</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-lg-12">
		<form action="/siswa/<?php echo e($siswa->id); ?>/update" method="POST">
       	<?php echo e(csrf_field()); ?>

	  <div class="form-group">
	    <label for="exampleInputEmail1">Nama Depan</label>
	    <input type="text" class="form-control" name="nama_depan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Depan" value="<?php echo e($siswa->nama_depan); ?>">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	  <label for="exampleInputEmail1">Nama Belakang</label>
	    <input type="text" class="form-control" name="nama_belakang" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Belakang" value="<?php echo e($siswa->nama_belakang); ?>">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	   <div class="form-group">
	    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
	    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
	      <option value="L" <?php if($siswa->jenis_kelamin == 'L'): ?> selected <?php endif; ?>>Laki-Laki</option>
	      <option value="P" <?php if($siswa->jenis_kelamin == 'P'): ?> selected <?php endif; ?>>Perempuan</option>
	    </select>

  <div class="form-group">
	  <label for="exampleInputEmail1">Agama</label>
	    <input type="text" class="form-control" name="agama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="<?php echo e($siswa->agama); ?>" >
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	   <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?php echo e($siswa->alamat); ?></textarea>
  </div>
      </div>
      <div class="modal-footer">
     <button type="submit" class="btn btn-warning">Update</button>
     </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelsiswa\resources\views/siswa/edit.blade.php ENDPATH**/ ?>