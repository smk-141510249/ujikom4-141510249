<?php $__env->startSection('content'); ?>
<center><h1>Daftar Tunjangan Pegawai</h1></center>
<a  href="<?php echo e(url('tunjanganp/create')); ?>" class="btn btn-warning form-control">Tambah</a>
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
			<tr class ="bg-warning">
				<th>No</th>
				<th>Kode Kategori Tunjangan</th>
				<th>Nama Pegawai</th>
				
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		<?php  $no=1;  ?>
		<tbody>
			<?php $__currentLoopData = $tunjanganp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($no++); ?></td>
				<td><?php echo e($data->kode_tunjangan_id); ?></td>
				<td><?php echo e($data->pegawai->user->name); ?></td>
				<td>
				<a href="<?php echo e(route('tunjanganp.edit',$data->id)); ?>" class='btn btn-danger'> Edit </a>
				</td>

				<td>
					<?php echo Form::open(['method'=>'DELETE','route'=>['tunjanganp.destroy',$data->id]]); ?>

					<?php echo Form::submit('Delete',['class'=>'btn btn-success']); ?>

					<?php echo Form::close(); ?>

				</td>

			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</tbody>
	</table>
	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>