<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-danger">
                <div class="panel-heading">Penggajian</div>

                <div class="panel-body">
                    <center><a href="<?php echo e(url('/gajian/create')); ?>" class="btn btn-danger">Tambah Penggajian</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                  <hr>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Pegawai</center></p></th>
                          <th><p class="center"><center>Jumlah Jam Lembur</center></p></th>
                          <th><p class="center"><center>Jumlah Uang Lembur</center></p></p></th>
                          <th><p class="center"><center>Gaji Pokok</center></p></p></th>
                          <th><p class="center"><center>Total Gaji</center></p></p></th>
                          <th><p class="center"><center>Tanggal Pengambilan</center></p></p></th>
                          <th><p class="center"><center>Status Pengambilan</center></p></p></th>
                          <th><p class="center"><center>Petugas Penerima</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Pilihan:</center></p></th>
                        </tr>
                      </thead>
                            <?php 
                            $no = 1;
                             ?>
                            <?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tbody>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($data->Tunjangan_pegawai->Pegawai->User->name); ?></td>
                                    <td><?php echo e($data->jumlah_jam_lembur); ?> </td>
                                    <td><?php echo e($data->jumlah_uang_lembur); ?> </td>
                                    <td><?php echo e($data->gaji_pokok); ?> </td>
                                    <td><?php echo e($data->total_gaji); ?> </td>
                                    <td><?php echo e($data->updated_at); ?> </td>
                                    
                                    <?php if($data->status_pengambilan == 0): ?>
                                    
                                        <td>Belum Diambil </td>
                                    
                                    <?php endif; ?>
                                    <?php if($data->status_pengambilan == 1): ?>
                                    
                                        <td>Sudah Diambil</td>
                                    
                                    <?php endif; ?>
                                  <td><?php echo e($data->petugas_penerima); ?> </td>
                                  <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['gajian.destroy', $data->id]]); ?>

                                    <?php echo Form::submit('Hapus', ['class' => 'btn btn-danger']); ?>

                                    <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
             
              
           
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>