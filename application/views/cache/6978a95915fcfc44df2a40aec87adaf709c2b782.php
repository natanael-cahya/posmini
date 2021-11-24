

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
   <h1>Edit Product Data</h1>
   <form enctype="multipart/form-data" method="POST" action="<?php echo e(base_url('category/update').'?id_kategori='.$data['id_kategori']); ?>">
      <div class="row mt-4">
        <div class="col">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nama Produk</span>
          </div>
          <input type="text" name="nama" class="form-control" value="<?php echo e($data['nama_kategori']); ?>" placeholder="Input Nama Produk" aria-label="Nama Produk" aria-describedby="basic-addon1">
        </div>
        
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Deskripsi Produk</span>
          </div>
          <textarea class="form-control" class="editor" id="isi" name="isi"><?php echo e($data['deskripsi_kategori']); ?></textarea>
        </div>
    
    <div class="modal-footer">
      <a href="<?php echo e(base_url('product')); ?>" class="btn btn-secondary">Close</a>
      <button type="submit" class="btn btn-primary">Edit Data</button>
    </div>
  </form>
</div>
</div>
   
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\posmini\application\views/admin/editCategory.blade.php ENDPATH**/ ?>