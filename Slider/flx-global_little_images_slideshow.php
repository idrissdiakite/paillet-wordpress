<?php $numberOfImages = sizeof($content['clone_little_images_slideshow']['images']) ?>
<?php $images = $content['clone_little_images_slideshow']['images'] ?>

<section class="global_little_images_slideshow little-slideshow">

  <div class="global_little_images_slideshow__images">
    <?php foreach ($images as $key => $value) : ?>
      <div class="global_little_images_slideshow__image<?= $key < 4 ? ' active' : '' ?>">
        <img src="<?= $value['url'] ?>" alt="<?= $value['alt'] ?>" />
      </div>
    <?php endforeach ?>
  </div>

  <aside class="global_little_images_slideshow__arrows-container">
    <div class="global_little_images_slideshow__arrows">
      <?php $arrowRight = false?>
      <?php include __DIR__ . '/../arrow-slideshow.php' ?>
      
      <?php $arrowRight = true ?>
      <?php include __DIR__ . '/../arrow-slideshow.php' ?>
    </div>
  </aside>
</section>