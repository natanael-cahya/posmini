

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
   
   <h1>5 Produk Terakhir Ditambahkan</h1>
   <?php $no=1; ?>
   
   <table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Harga</th>
        <th scope="col">Foto</th>
        <th scope="col">Kategori</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th> <?php echo e($no++); ?></th>
      <td><?php echo e($item->nama_produk); ?></td>
      <td><?php echo e($item->deskripsi); ?></td>
      <td><?php echo e($item->harga); ?></td>
      <td><?php echo e($item->img); ?></td>
      <td><?php echo e($item->id_kategori); ?></td>
    </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\posmini\application\views/admin/home.blade.php ENDPATH**/ ?>