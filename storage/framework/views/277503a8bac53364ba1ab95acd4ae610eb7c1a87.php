<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-2">
      <?php echo $__env->yieldContent('sidebar'); ?>
    </div>
    <div class="col-sm-10">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>
</div>
<?php $__env->startSection('sidebar'); ?>
<ul class="nav flex-column mt-5">
<li class="nav-item btn btn-light p-2 mt-5">
<h6 class="my-0"><a class="text-danger" href="<?php echo e(url('/')); ?>"> Strona startowa</a></h6>
</li>
<li class="nav-item btn btn-light p-2 mt-1">
<h6 class="my-0"><a class="text-danger" href="<?php echo e(url('Group.index')); ?>"> Strona główna</a></h6>
</li>
<li class="nav-item btn btn-light p-2 mt-1">
<h6 class="my-0"><a class="text-danger" href="<?php echo e(route('Group.create')); ?>">Grupy</a></h6>
</li>
<li class="nav-item btn btn-light p-2 mt-1">
<h6 class="my-0"><a class="text-danger" href="<?php echo e(route('Student.create')); ?>">Studenci</a></h6>
</li>         
</ul>
<?php $__env->stopSection(); ?>

 


 
</body>
</html><?php /**PATH C:\xampp\htdocs\test6\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>