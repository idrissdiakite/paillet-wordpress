<?php /* Template name: Contact */ ?>

<?php get_header(); ?>

<main id="p-contact" class="p-contact">

  <?php include 'templates/clones/cover.php' ?>

  <?php $informations = get_field('contact_informations') ?>
  <section class="informations" id="scroll-to">
    <div class="informations__text">
      <h2 class="t-h2"><?= $informations['title'] ?></h2>
      <div class="t-p1"><?= $informations['description'] ?></div>
      <span></span>
    </div>
    <div class="contact">
      <?php if ($informations['show_phone']) : ?>
        <div class="contact__row">
          <div class="contact__image">
            <img class="svg-replace" src="phone.svg" />
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
            <img class="svg-replace" src="address.svg" />
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
            <img class="svg-replace" src="mail.svg" />
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
                  <input type="checkbox" id="rgpd" name="rgpd" required />
                </div>
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      </div>

      <div class="form__footer">
        <p class="t-h3-2">* champs obligatoires</p>
        <div class="form__buttons">
          <input class="t-b" type="submit" name="submit" value="Envoyer ma demande" />
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