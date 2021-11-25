

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
   
   <h1>List Product</h1>
   <button class="btn btn-info btn-sm mt-4"  data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add Data</button>
   <div class="row mt-4">
    <div class="col-md-3">
      <form class="inline" action="<?php echo e(base_url('product/search')); ?>">
      <div class="input-group mb-3">
        
        <input type="text" value="<?php echo e((empty($_GET['np'])) ? '' : $_GET['np']); ?>" class="form-control" name="np" placeholder="Nama Produk" aria-label="nama Produk" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        
      </div>
    </form>
    </div>
 </div>
   <?php $no=1;?>
   <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Harga</th>
        <th scope="col">Foto</th>
        <th scope="col">Kategori</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
      <tr>
        <th> <?php echo e($no++); ?></th>
      <td><?php echo e($item->nama_produk); ?></td>
      <td><?php echo $item->deskripsi; ?></td>
      <td>Rp.<?php echo e(number_format("$item->harga", 0, ",", ".")); ?></td>
      <td><img src="<?php echo e(base_url('assets/img/').$item->img); ?>" width="100px" height="100px"></td>
      <td><?php echo e($item->nama_kategori); ?></td>
      <td><a href="<?php echo e(base_url('product/edit').'?id_produk='.$item->id_produk); ?>" class="btn btn-primary btn-sm">Edit</a> | <a href="<?php echo e(base_url('product/delete') .'?id_produk='.$item->id_produk); ?>" class="btn btn-danger btn-sm">Delete</a></td>
    </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
<?=  $link ?>
<BR>
   
</div>
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" method="POST" action="<?php echo e(base_url('product/add_data')); ?>">
      <div class="modal-body">
        
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Nama Produk</span>
            </div>
            <input type="text" required name="nama" class="form-control" placeholder="Input Nama Produk" aria-label="Nama Produk" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Harga Produk</span>
            </div>
            <input type="number" required name="harga" class="form-control" placeholder="Input Harga Produk" aria-label="harga" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Kategori Produk</label>
            </div>
            <select name="kat" required class="custom-select form-control" id="inputGroupSelect01">
              <option selected>Pilih Opsi...</option>
              <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($item->id_kategori); ?>"><?php echo e($item->nama_kategori); ?></option>    
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Foto Produk</span>
            </div>
            
              <input type="file" required name="img" class="custom-file-input form-control" id="inputGroupFile01">

          </div> 
          
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Deskripsi Produk</span>
            </div>
            <textarea class="form-control" required class="editor" id="isi" name="isi"></textarea>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\posmini\application\views/admin/product.blade.php ENDPATH**/ ?>