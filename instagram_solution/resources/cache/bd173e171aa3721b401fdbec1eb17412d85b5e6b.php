<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link href="/public/css/normalize.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="/public/css/style.css" rel="stylesheet">
    <?php $__env->startSection('css'); ?>

    <?php echo $__env->yieldSection(); ?>


    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

</head>

<body>

<?php $__env->startSection('topMenu'); ?>
  <?php echo $__env->make('layouts.topMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

  <section class="content">
    <?php echo $__env->yieldContent('content'); ?>
  </section>

<?php $__env->startSection('bottomMenu'); ?>
  <?php echo $__env->make('layouts.bottomMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
