<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div class="contact-content">
<div class="contact-page-container">
<div class="background"></div>
<div class="background2"></div>
  <div class="contact-page-background">
  <img class="contact-page-toright-arrow" src="<?php echo get_template_directory_uri(); ?>/images/toright-arrow.svg" alt="arrow Decoration">
  <img  class="contact-page-toleft-arrow" src="<?php echo get_template_directory_uri(); ?>/images/toleft-arrow.svg" alt="arrow Decoration">
    <div class="contact-page-text-section">
<h1 class="contact-page-title">Salutaci !</h1>
<p class="contact-page-text">Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et</p>
    </div>

      <div class="contact-form">
      
          <?php
      echo do_shortcode('[contact-form-7 id="1234" title="Formulaire Page de Contact"]');
      ?>
      </div>
  </div>
</div>




</div>
   
<?php get_footer(); ?>
