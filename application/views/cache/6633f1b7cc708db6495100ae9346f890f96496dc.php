<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($judul); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://majoo.id/favicon.png">
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
  </head>
<body>
     <?php if(empty($id)): ?>
    
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(base_url()); ?>">Majoo Teknologi Indonesia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
      </div>
    </nav>
     <?php else: ?>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(base_url('admin')); ?>">Majoo Teknologi Indonesia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo e(base_url('product')); ?>">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo e(base_url('category/')); ?>">Category</a>
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo e(base_url('auth/logout')); ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<?php endif; ?>

      <?php echo $__env->yieldContent('content'); ?>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo e(base_url('assets/js/')); ?>script.js"></script>
<script>
   var ckeditor = CKEDITOR.replace('isi',{
        height:'200px',
        width:'100%'
  });
  // CKEDITOR.disableAutoInline = true;
  

  </script>
 <?php /**PATH C:\xampp\htdocs\posmini\application\views/layouts/master.blade.php ENDPATH**/ ?>