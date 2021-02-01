
	
	<?php $__env->startSection('content'); ?>


	<?php if(session('sukses')): ?>
	<div class="alert alert-success" role="alert">
  		<?php echo e(session('sukses')); ?>

	</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-6">
			<h1>Data Siswa</h1>
		</div>	
		<div class="col-6">
			<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
 			 Tambah Data Siswa
			</button>
		</div>
		
<table class="table ">
	<tr>
	<th>Nama Depan</th>
	<th>Nama Belakang</th>
	<th>Jenis Kelamin</th>
	<th>Agama</th>
	<th>Alamat</th>
	<th>Aksi</th>
	</tr>
	<?php $__currentLoopData = $data_siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($siswa->nama_depan); ?></td>
		<td><?php echo e($siswa->nama_belakang); ?></td>
		<td><?php echo e($siswa->jenis_kelamin); ?></td>
		<td><?php echo e($siswa->agama); ?></td>
		<td><?php echo e($siswa->alamat); ?></td>
		<td><a href="/siswa/<?php echo e($siswa->id); ?>/edit" class="btn btn-warning btn-sm">Edit</a>
			<a href="/siswa/<?php echo e($siswa->id); ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm ('BENARINNI MAU DIHAPUS?')">Delete</a>
		</td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
	</div>
</div>

<!-- Modal -->
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
       <form action="/siswa/create" method="POST">
       	<?php echo e(csrf_field()); ?>

	  <div class="form-group">
	    <label for="exampleInputEmail1">Nama Depan</label>
	    <input type="text" class="form-control" name="nama_depan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Depan">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	  <label for="exampleInputEmail1">Nama Belakang</label>
	    <input type="text" class="form-control" name="nama_belakang" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Belakang">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	   <div class="form-group">
	    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
	    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
	      <option value="L">Laki-Laki</option>
	      <option value="P">Perempuan</option>
	    </select>
  </div>
  <div class="form-group">
	  <label for="exampleInputEmail1">Agama</label>
	    <input type="text" class="form-control" name="agama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	   <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
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