<?php /* Template name: Contact */ ?>

<?php get_header(); ?>

<main id="p-contact" class="p-contact">

  <?php include 'templates/clones/cover.php' ?>

  <?php $informations = get_field('contact_informations') ?>
  <section class="informations" id="scroll-to">
    <div class="informations__text">
      <h2 class="t-h2"><?= $informations['title'] ?></h2>
      <div class="t-p1"><?= $informations['description'] ?></div>
      <span/>
    </div>
    <div class="contact">
      <?php if ($informations['show_phone']) : ?>
        <div class="contact__row">
          <div class="contact__image">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" class="svg-replace"><g><g><path fill="#479f47" d="M3.62 7.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V17c0 .55-.45 1-1 1C7.61 18 0 10.39 0 1c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02z"/></g></g></svg>
          </div>
          <div class="contact__text">
            <p class="t-p2"><?= $informations['options_phone']['title'] ?></p>
            <p class="t-p2"><?= $informations['options_phone']['description'] ?></p>
          </div>
        </div>
      <?php endif ?>
      <?php if ($informations['show_address']) : ?>
        <div class="contact__row">
          <div class="contact__image">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 14 20" class="svg-replace"><g><g><path fill="#479f47" d="M7 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5zM7 0C3.13 0 0 3.13 0 7c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></g></g></svg>
          </div>
          <div class="contact__text">
            <p class="t-p2"><?= $informations['options_address']['title'] ?></p>
            <p class="t-p2"><?= $informations['options_address']['description'] ?></p>
          </div>
        </div>
      <?php endif ?>
      <?php if ($informations['show_mail']) : ?>
        <div class="contact__row">
          <div class="contact__image">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" class="svg-replace"><g><g><path fill="#479f47" d="M10 9L2 4V2l8 5 8-5v2zM2 0C.9 0 .01.9.01 2L0 14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V2c0-1.1-.9-2-2-2z"/></g></g></svg>
          </div>
          <div class="contact__text">
            <p class="t-p2"><?= $informations['options_mail']['title'] ?></p>
            <p class="t-p2"><?= $informations['options_mail']['description'] ?></p>
          </div>
        </div>
      <?php endif ?>
    </div>
  </section>

  <?php $texts = get_field('options_text') ?>
  <section class="form">
    <h2 class="t-h2"><?= $texts['title'] ?></h2>
    <div class="t-h3"><?= $texts['description'] ?></div>

    <?php $columns = get_field('columns') ?>
    <?php $_SESSION['input_id'] = 1 ?>
    <form method="post" action="">
      <div class="form__row">
        <?php foreach ($columns as $key => $value) : ?>
          <div class="form__column">
            <?php new FlexContent($value['flex_content']) ?>
            <?php if ($key === count($columns) - 1) : ?>
              <div class="input-group rgpd">
                <div class="input-group__checkbox">
                  <label class="t-p1" for="rgpd"><?= get_field('form')['rgpd'] ?></label>
                  <input type="checkbox" id="rgpd" name="rgpd" required=""/>
                </div>
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      </div>

      <div class="form__footer">
        <p class="t-h3-2">* champs obligatoires</p>
        <div class="form__buttons">
          <input class="t-b" type="submit" name="submit" value="Envoyer ma demande"/>
        </div>
      </div>

      <?php
      if (isset($_POST['submit'])) {

        $to = "idriss.diakite@zelda.fr"; // email receveur
        $from = $_POST['5']; // email expéditeur

        $first_name = $_POST['2'];
        $last_name = $_POST['1'];
        $phoneNumber = $_POST['6'];

        $job = $_POST['4'];
        $society = $_POST['3'];
        $budget = $_POST['7'];
        $activities = $_POST['8'];
        $activities = implode(', ', $activities); // transforme l'array en string

        $subject = "Demande de devis";
        $subject2 = "Copie de votre demande de devis";
        $message = "Bonjour, vous avez reçu un nouveau devis: " . "\n\n" .
          "De la part de: " . $first_name . " " . $last_name . " (" . $phoneNumber . ")" . "\n\n" .
          $job . " - " . $society . "\n\n" .
          "Budget: " . $budget . "\n\n" .
          "Activités concernées: " . $activities . "\n\n" .
          "Besoins: " . $_POST['9'];
        $message2 = "Voici une copie de votre message: " . "\n\n" .
          $first_name . " " . $last_name . " (" . $phoneNumber . ")" . "\n\n" .
          $job . " - " . $society . "\n\n" .
          "Budget: " . $budget . "\n\n" .
          "Activités concernées: " . $activities . "\n\n" .
          "Besoins: " . $_POST['9'];

        $headers = "De:" . $from;
        $headers2 = "De:" . $to;
        mail($to, $subject, $message, $headers);
        mail($from, $subject2, $message2, $headers2); // envoi une copie du mail à l'expéditeur
        echo "Merci " . $first_name . ", votre devis a bien été envoyé !";
      }
      ?>
    </form>
  </section>

</main>

<?php get_footer() ?>