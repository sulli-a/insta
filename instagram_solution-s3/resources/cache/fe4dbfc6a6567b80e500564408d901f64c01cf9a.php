<?php $__env->startSection('articles'); ?>
  <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <article class="post">
      <div>
        <span class="auteur"><?php echo e($a['login']); ?></span>
      </div>
      <a href=""><img src="<?php echo e($a['img_url']); ?>" /></a>
      <h3><?php echo e($a['titre']); ?></h3>
      <div class="desc">
        <span class="tags"><?php echo e($a['tags']); ?></span>
        <a href="index.php?action=settings"><i class='bx bx-message-rounded-dots'></i></a>
        <a href="index.php?action=logout"><i class='bx bx-heart'></i></a>
      </div>
    </article>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <span>Aucun article</span>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>