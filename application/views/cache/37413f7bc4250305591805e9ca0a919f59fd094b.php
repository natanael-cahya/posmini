

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
   
   <h1>List Category</h1>
   <button class="btn btn-info btn-sm mt-4"  data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Add Data</button>
   <?php $no=1; ?>
   <div class="row mt-3">
     <div class="col-md-3">
  Search : <input type="text" class="form-control">
     </div>
  </div>
   <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Deskripsi Kategori</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th> <?php echo e($no++); ?></th>
      <td><?php echo e($item->nama_kategori); ?></td>
      <td><?php echo $item->deskripsi_kategori; ?></td>
      <td><a href="<?php echo e(base_url('category/edit').'?id_kategori='.$item->id_kategori); ?>" class="btn btn-primary btn-sm">Edit</a> | <a href="<?php echo e(base_url('category/delete').'?id_kategori='.$item->id_kategori); ?>" class="btn btn-danger btn-sm">Delete</a></td>
     
    </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
<?= $link ?>
   
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="<?php echo e(base_url('category/add_data')); ?>">
      <div class="modal-body">
        
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Nama Kategori</span>
            </div>
            <input type="text" class="form-control" name="nama" placeholder="Input Nama Kategori" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Deskripsi Kategori</span>
            </div>
            <textarea class="form-control" id="ckeditor" name="isi"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
    </div>
  </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\posmini\application\views/admin/category.blade.php ENDPATH**/ ?>