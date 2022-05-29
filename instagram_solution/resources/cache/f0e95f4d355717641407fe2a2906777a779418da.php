<?php $__env->startSection('css'); ?>
  <link href="/public/css/articles.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topMenu'); ?>
<nav class="top">
<form class=search action='index.php' method='GET'>
  <input type='hidden' name='action' value="search">
  <input type='text' name='v' placeholder='Votre recherche' value="<?php echo e($v); ?>">
  <button type='submit' name='search' value='rechercher'><i class='bx bx-search'></i></button>
</form>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <article class="post">
      <div>
        <span class="auteur"><?php echo e($a['login']); ?></span>
      </div>
      <a href="index.php?action=articles&id=<?php echo e($a['idAuteur']); ?>"><img src="<?php echo e($a['img_url']); ?>" /></a>
      <h3><?php echo e($a['titre']); ?></h3>
      <div class="desc">
        <span class="tags"><?php echo e($a['tags']); ?></span>
        <a href="index.php"><i class='bx bx-message-rounded-dots'></i></a>
        <a href="index.php"><i class='bx bx-heart'></i></a>
      </div>
    </article>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <span>Aucun article</span>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>