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
          <img src="<?= $fields['options_box']['image']['url'] ?>" alt="<?= $fields['options_box']['image']['alt'] ?>"/>
        </div>
        <div class="grid-card__text">
          <h3 class="t-h3"><?= $fields['options_box']['title'] ?></h3>
          <div class="t-p1">
            <?= $fields['options_box']['description'] ?>
          </div>
          <div class="grid-card__button">
            <span class="button t-b">Découvrir<svg style="fill: none; stroke-miterlimit: 20; stroke-width: .2rem;" data-name="Arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.3732 6.12346" class="svg-replace"><path style="transform: rotate(-90deg); transform-origin: center;" d="M.709.70524h0l3.979,4h0l3.976-4h0"/></svg></span>
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
                  <span class="grid-card__modal--cross"><svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-replace"><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg></span>
                  <div class="grid-card__modal--scroll-container">
                    <span class="grid-card__modal--scrollbar"> </span>
                    <span class="grid-card__modal--scrollbar--progress"> </span>
                  </div>
                  <div class="grid-card__modal--body--header">
                    <span class="grid-card__modal--body--header--overlay">
                      <img src="<?= $imageHead ?>" alt="">
                    </img></span>
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
                          <img src="<?= $value['url'] ?>" alt="<?= $value['alt'] ?>"/>
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