

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1>Product</h1>
    <div class="row mt-4">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-6 text-center">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo e(base_url().'assets/img/'.$item->img); ?>" class="card-img-top" alt="<?php echo e($item->nama_produk); ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo e($item->nama_produk); ?></h5>
                  <p class="card-text"> <?php echo $item->deskripsi; ?></p>
                  <a href="#" class="btn btn-primary btn-sm mx-auto">Beli</a>
                </div>
              </div>
        </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row mt-5">
      <div class="col">
        <?php echo $link; ?>

      </div>
    </div>
    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\posmini\application\views/index.blade.php ENDPATH**/ ?>