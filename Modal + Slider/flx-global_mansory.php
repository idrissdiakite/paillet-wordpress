<?php $fields = $content['clone_mansory']['repeat_mansory'] ?>
<?php $sizes = ['small', 'medium', 'large'] ?>

<section class="global-mansory">
  <?php foreach ($fields as $key => $value) : ?>
    <?php $size = $sizes[array_rand($sizes)] ?>
    <?php $images = $value['images'] ?>
    <?php $numberOfImages = sizeof($value['images']) ?>

    <div class="global-mansory__card global-mansory__card--<?= $size ?>">
      <span class="global-mansory__zoom"><img class="svg-replace" src="zoom.svg" /></span>
      <div class="global-mansory__image">
        <img src="<?= $value['images'][0]['url'] ?>" alt="<?= $value['images'][0]['alt'] ?>" />
      </div>
      <h3 class="t-h3 global-mansory__title"><?= $value['title'] ?></h3>
      <div class="t-p1 global-mansory__description"><?= $value['description'] ?></div>

      <section class="global-mansory__modal">
        <div class="global-mansory__modal--overlay">
          <div class="global-mansory__modal--wrapper">
            <aside class="global-mansory__modal__arrows-container">
              <div class="global-mansory__modal__arrows">
                <?php $arrowRight = false ?>
                <?php include __DIR__ . '/../arrow-slideshow.php' ?>
                <?php $arrowRight = true ?>
                <?php include __DIR__ . '/../arrow-slideshow.php' ?>
              </div>
            </aside>
            <div class="global-mansory__modal--body">
              <span class="global-mansory__modal--image-container">
                <?php foreach ($images as $key => $value) : ?>
                  <div class="global-mansory__modal--image<?= $key === 0 ? ' active' : '' ?>">
                    <img src="<?= $value['url'] ?>" alt="<?= $value['alt'] ?>" />
                    <span class="global-mansory__modal--cross"><img class="svg-replace" src="cross.svg" /></span>
                  </div>
                <?php endforeach ?>
                <aside class="global-mansory__modal--dots">
                  <ul>
                    <?php for ($i = 0; $i < $numberOfImages; $i++) : ?>
                      <li data-index="<?= $i ?>"></li>
                    <?php endfor ?>
                  </ul>
                </aside>
              </span>
            </div>
          </div>
        </div>
      </section>
    </div>
  <?php endforeach ?>
</section>