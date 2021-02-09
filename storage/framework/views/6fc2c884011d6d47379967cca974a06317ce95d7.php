<table class="table" style="border:1px solid;">
	<thead style="border:1px solid;">
		<tr>
			<th>NAMA LENGKAP</th>
			<th>JENIS KELAMIN</th>
			<th>AGAMA</th>
			<th>NILAI RATA-RATA</th>
		</tr>
	</thead>
	<tbody >
		<?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr style="border:1px solid;">
			<td><?php echo e($s->nama_lengkap()); ?></td>
			<td><?php echo e($s->jenis_kelamin); ?></td>
			<td><?php echo e($s->agama); ?></td>
			<td><?php echo e($s->rataRataNilai()); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
		
</table><?php /**PATH C:\xampp\htdocs\laravel-siswa\resources\views/export/exportpdf.blade.php ENDPATH**/ ?>