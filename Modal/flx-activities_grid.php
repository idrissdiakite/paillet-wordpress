<section class="activities-grid">
  <div class="activities-grid__text">
    <h2 class="t-h2"><?= $content['options_title']['title'] ?></h2>
    <div class="t-p1">
      <?= $content['options_title']['description'] ?>
    </div>
  </div>
  <div class="activities-grid__grid">
    <?php foreach ($content['links'] as $child) : ?>
      <?php $fields = get_fields($child) ?>
      <div class="grid-card">
        <div class="grid-card__image">
          <img src="<?= $fields['options_box']['image']['url'] ?>" alt="<?= $fields['options_box']['image']['alt'] ?>" />
        </div>
        <div class="grid-card__text">
          <h3 class="t-h3"><?= $fields['options_box']['title'] ?></h3>
          <div class="t-p1">
            <?= $fields['options_box']['description'] ?>
          </div>
          <div class="grid-card__button">
            <span class="button t-b">Découvrir<img class="svg-replace" src="arrow_right.svg" /></span>
          </div>
        </div>
        
        <?php $imageHead = $fields['flex_content'][1]['clone_image_full']['image']['url'] ?>
        <?php $title = $fields['options_box']['title'] ?>
        <?php $textOneCols = $fields['flex_content'][0]["clone_text_2_col"]["text"] ?>
        <?php $textTwoCols = $fields['flex_content'][2]["clone_text_2_col"] ?>
        <?php $images = $fields['flex_content'][3]["clone_images_slideshow"]["images"] ?>
        <?php $numberOfImages = sizeof($images) ?>

        <div class="grid-card__modal">
          <div class="grid-card__modal--overlay">
            <div class="grid-card__modal--wrapper">
              <div class="grid-card__modal--container">
                <div class="grid-card__modal--body">
                  <div class="grid-card__modal--scroll-container">
                    <span class="grid-card__modal--scrollbar"> </span>
                    <span class="grid-card__modal--scrollbar--progress"> </span>
                  </div>
                  <span class="grid-card__modal--cross"><img class="svg-replace" src="cross.svg" /></span>
                  <div class="grid-card__modal--body--header">
                    <span class="grid-card__modal--body--header--overlay">
                      <img src="<?= $imageHead ?>" alt="">
                    </span>
                    <h2 class="t-h2">
                      <?= $title ?>
                    </h2>
                  </div>
                  <div class="grid-card__modal--body--content">
                    <section class="activity-text-1-col">
                      <div class="t-p1">
                        <?= $textOneCols ?>
                      </div>
                    </section>

                    <section class="activity-slideshow">
                      <?php foreach ($images as $key => $value) : ?>
                        <div class="activity-slideshow--image<?= $key === 0 ? ' active' : '' ?>">
                          <img src="<?= $value['url'] ?>" alt="<?= $value['alt'] ?>" />
                        </div>
                      <?php endforeach ?>

                      <aside class="activity-slideshow__arrows-container">
                        <div class="activity-slideshow__arrows">
                          <?php $arrowRight = false ?>
                          <?php include __DIR__ . '/../arrow-slideshow.php' ?>

                          <?php $arrowRight = true ?>
                          <?php include __DIR__ . '/../arrow-slideshow.php' ?>
                        </div>
                      </aside>
                    </section>

                    <section class="activity-text-2-col">
                      <h3 class="t-h3"><?= $textTwoCols['title'] ?></h3>
                      <div class="activity-text-2-col__text">
                        <div class="t-p1">
                          <?= $textTwoCols['options_text']['left_text'] ?>
                        </div>
                        <div class="t-p1">
                          <?= $textTwoCols['options_text']['right_text'] ?>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</section>