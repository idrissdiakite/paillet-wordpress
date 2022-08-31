<?php $fields = $content['clone_mansory']['repeat_mansory'] ?>

<section class="global-mansory">
  <?php foreach ($fields as $key => $value) : ?>
    <?php $images = $value['images'] ?>
    <?php $numberOfImages = sizeof($value['images']) ?>

    <div class="global-mansory__card">
      <span class="global-mansory__zoom"><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" class="svg-replace"><g><g><path fill="none" stroke="#479f47" stroke-miterlimit="20" stroke-width="2" d="M25.52 31a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11z"/></g><g><path fill="none" stroke="#479f47" stroke-miterlimit="20" stroke-width="2" d="M29.52 29.5l3.668 3.668"/></g></g></svg></span>
      <div class="global-mansory__image">
        <img src="<?= $value['images'][0]['url'] ?>" alt="<?= $value['images'][0]['alt'] ?>"/>
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
                    <img src="<?= $value['url'] ?>" alt="<?= $value['alt'] ?>"/>
                    <span class="global-mansory__modal--cross"><svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-replace"><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg></span>
                  </div>
                <?php endforeach ?>
                <aside class="global-mansory__modal--dots">
                  <ul>
                    <?php for ($i = 0; $i < $numberOfImages; $i++) : ?>
                      <li data-index="<?= $i ?>"/>
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