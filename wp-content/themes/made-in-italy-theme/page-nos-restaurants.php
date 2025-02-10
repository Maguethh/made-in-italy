<?php
/*
Template Name: Nos Restaurants
*/
get_header();
?>

<div class="nos-restaurants-content">

  <div class="nos-restaurants-content-header">
  <img class="decorative-svg-penne" src="<?php echo get_template_directory_uri(); ?>/images/penne.svg" alt="Pasta Decoration">
  <h1 class="nos-restaurants-header-title">Nos restaurants</h1>
  </div>

  <div class="nos-restaurants-container-background">
    <div class="background"></div>
    <div class="background2"></div>
    <div class="nos-restaurants-content">
    <img class="decorative-svg-pasta2" src="<?php echo get_template_directory_uri(); ?>/images/pasta2.svg" alt="Pasta Decoration">
    <img class="decorative-svg-piment2" src="<?php echo get_template_directory_uri(); ?>/images/piment2.svg" alt="Pasta Decoration">

    <div class="nos-restaurant-text-section">
      <p class="nos-restaurant-text restaurant-text-1">Plus qu'une simple adresse.</p>
      <p class="nos-restaurant-text">Une culture gustative.</p>
    </div>

      <div class="restaurant-cards-container">

          <div class="restaurant-card">
            <div class="restaurant-image-container">
                <img class="restaurant-image" src="<?php echo get_template_directory_uri(); ?>/images/restaurant-1.png" alt="Restaurant 1">
            </div>
            <h2 class="restaurant-card-title">Made in Italy - Paris</h2>
            <div class="restaurant-card-schedules-slider">
                <div class="schedule-slider">
                    <div class="schedule-slide">
                        <div class="day-column">
                            <h3>LUN</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                        <div class="day-column">
                            <h3>MAR</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                        <div class="day-column">
                            <h3>MER</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                    </div>
                    <div class="schedule-slide">
                        <div class="day-column">
                            <h3>JEU</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                        <div class="day-column">
                            <h3>VEN</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                        <div class="day-column">
                            <h3>SAM</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                    </div>
                    <div class="schedule-slide">
                        <div class="day-column">
                            <h3>DIM</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                    </div>
                </div>
                <button class="restaurant-schedule-prev" onclick="plusSlides(-1)">&#10094;</button>
                <button class="restaurant-schedule-next" onclick="plusSlides(1)">&#10095;</button>
            </div>
            <p class="restaurant-card-adress">35 rue de la boétie 75008 paris</p>
            <div class="restaurant-card-buttons-container">
                <a class="restaurant-card-button" href="">UBER EATS</a>
                <a class="restaurant-card-button" href="/deliveroo">DELIVEROO</a>
            </div>
        </div>

        <div class="restaurant-card">
            <div class="restaurant-image-container">
                <img class="restaurant-image" src="<?php echo get_template_directory_uri(); ?>/images/restaurant-1.png" alt="Restaurant 1">
            </div>
            <h2 class="restaurant-card-title">Made in Italy - Paris</h2>
            <div class="restaurant-card-schedules-slider">
                <div class="schedule-slider">
                    <div class="schedule-slide">
                        <div class="day-column">
                            <h3>LUN</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                        <div class="day-column">
                            <h3>MAR</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                        <div class="day-column">
                            <h3>MER</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                    </div>
                    <div class="schedule-slide">
                        <div class="day-column">
                            <h3>JEU</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                        <div class="day-column">
                            <h3>VEN</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                        <div class="day-column">
                            <h3>SAM</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                    </div>
                    <div class="schedule-slide">
                        <div class="day-column">
                            <h3>DIM</h3>
                            <p>12h00-14h30</p>
                            <p>19h00-21h30</p>
                        </div>
                    </div>
                </div>
                <button class="restaurant-schedule-prev" onclick="plusSlides(-1)">&#10094;</button>
                <button class="restaurant-schedule-next" onclick="plusSlides(1)">&#10095;</button>
            </div>
            <p class="restaurant-card-adress">35 rue de la boétie 75008 paris</p>
            <div class="restaurant-card-buttons-container">
                <a class="restaurant-card-button" href="/uber-eats">UBER EATS</a>
                <a class="restaurant-card-button" href="/deliveroo">DELIVEROO</a>
            </div>
        </div>
   </div>
</div>
</div>

<div class="nos-restaurant-brown-bg"></div>

<div class="nos-restaurant-brown-bg" id="menu"></div>

<div class="nos-specialites-container"  >
<img class="decorative-svg-coquilette" src="<?php echo get_template_directory_uri(); ?>/images/coquillete.svg" alt="Pasta Decoration">
<img class="decorative-svg-point-down-arrow" src="<?php echo get_template_directory_uri(); ?>/images/pointarrow.svg" alt="Pasta Decoration">
  <div class="nos-specialites-title">Nos spécialités</div>
  <div class="specialites-filter-buttons-container">
    <?php
    $specialite_types = get_post_meta(get_the_ID(), 'restaurant_types', true);
    if (!empty($specialite_types)) :
        foreach ($specialite_types as $index => $type) :
    ?>
        <div class="specialite-filter-button <?php echo $index === 0 ? 'active' : ''; ?>" data-filter="<?php echo esc_attr($type); ?>"><?php echo esc_html($type); ?></div>
    <?php
        endforeach;
    endif;
    ?>
  </div>

  <div class="specialites-grid-container" >
    <?php
    if (!empty($specialite_types)) :
        foreach ($specialite_types as $type) :
            $specialite_cards = get_post_meta(get_the_ID(), 'restaurant_cards_' . sanitize_title($type), true);
            if (!empty($specialite_cards)) :
                foreach ($specialite_cards as $index => $card) :
    ?>
        <div class="specialite-preview-card" data-type="<?php echo esc_attr($type); ?>" data-index="<?php echo $index; ?>">
            <div class="specialite-preview-content" style="background-color: <?php echo esc_attr($card['color']); ?>;">
                <h3 class="specialite-preview-title" style="color: <?php echo esc_attr($card['text_color']); ?>;"><?php echo esc_html($card['title']); ?></h3>
                <p class="specialite-preview-text" style="color: <?php echo esc_attr($card['text_color']); ?>;"><?php echo esc_html($card['subtitle']); ?></p>
                <img class="specialite-preview-image" src="<?php echo esc_url($card['image']); ?>" alt="Food Image">
            </div>
        </div>
    <?php
                endforeach;
            endif;
        endforeach;
    endif;
    ?>

</div>
<div class="restaurant-menu-button-border" id="delivery">
      <button class="restaurant-menu-button">Voir menu</button>
       </div>
</div>

</div>
</div>

<div class="restaurant-delivery-container" >
  <h2 class="restaurant-delivery-title">Livraison chez vous<br>ou au taf.. !</h2>
  <div class="restaurant-delivery-content" >
    <img class="decorative-svg-down-left-arrow" src="<?php echo get_template_directory_uri(); ?>/images/leftdownarrow.svg" alt="Arrow Decoration">
    <div class="restaurant-delivery-item">
    <div class="restaurant-delivery-pin-border">
          <img class="restaurant-delivery-pin" src="<?php echo get_template_directory_uri(); ?>/images/uber-logo.png" alt="Uber Pin">
    </div>
<a class="restaurant-delivery-button">Je commande</a>
    </div>
    
    <div class="restaurant-delivery-item">
    <div class="restaurant-delivery-pin-border">
          <img class="restaurant-delivery-pin" src="<?php echo get_template_directory_uri(); ?>/images/deliveroo-logo.png" alt="Uber Pin">
    </div>
<a class="restaurant-delivery-button">Je commande</a>
    </div>
  </div>
</div>



<div class="home-contact-container">
<div class="background"></div>
<div class="background2"></div>
  <div class="home-contact-background">
  <img class="home-contact-decoration-1" src="<?php echo get_template_directory_uri(); ?>/images/piment.svg" alt="Piment Decoration">
  <img  class="home-contact-decoration-2" src="<?php echo get_template_directory_uri(); ?>/images/ble.svg" alt="Ble Decoration">

  <div class="home-contact-content">
    <div class="home-contact-section-1">
    <img  class="home-contact-img" src="<?php echo get_template_directory_uri(); ?>/images/phone.svg" alt="Truffe Decoration">

    </div>
    <div class="home-contact-section-2">
      <h2 class="home-contact-title">Salutaci !</h2>
      <p class="home-contact-text">Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et</p>
        <div class="home-contact-button-border">
      <button class="home-contact-button">Contactez nous !</button>
       </div>
    </div>
  </div>
</div>


</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const piment = document.querySelector('.home-contact-decoration-1');

  piment.addEventListener('mouseover', function() {
    piment.classList.add('shake');
  });

  piment.addEventListener('animationend', function() {
    piment.classList.remove('shake');
  });
});

let slideIndex = 0;
showSlides(slideIndex);

function plusSlides(n) {
showSlides(slideIndex += n);
}

function showSlides(n) {
let slides = document.querySelectorAll(".schedule-slide");
if (n >= slides.length) { slideIndex = 0 }
if (n < 0) { slideIndex = slides.length - 1 }
for (let i = 0; i < slides.length; i++) {
    slides[i].style.transform = `translateX(${-slideIndex * 100}%)`;
}
}

jQuery(document).ready(function($) {
function filterSpecialities(type) {
    $('.specialite-preview-card').hide();
    $('.specialite-preview-card[data-type="' + type + '"]').show();
}

$('.specialite-filter-button').click(function() {
    $('.specialite-filter-button').removeClass('active');
    $(this).addClass('active');
    let filter = $(this).data('filter');
    filterSpecialities(filter);
});

// Set default filter to the first type
let defaultFilter = $('.specialite-filter-button.active').data('filter');
filterSpecialities(defaultFilter);

// JavaScript pour l'effet de suivi du curseur sur les images des cards
const cards = document.querySelectorAll('.specialite-preview-card');
cards.forEach(card => {
    card.addEventListener('mousemove', function(e) {
        const image = card.querySelector('.specialite-preview-image');
        image.style.transition = ''; 
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        image.style.transform = `translate(${(x - rect.width / 2) / 10}px, ${(y - rect.height / 2) / 10}px)`;
    });

    card.addEventListener('mouseleave', function() {
        const image = card.querySelector('.specialite-preview-image');
        image.style.transition = 'transform 0.5s ease'; 
        image.style.transform = 'translate(0, 0)';
    });
});

// JavaScript pour l'animation d'apparition des cards
const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const index = entry.target.getAttribute('data-index');
            setTimeout(() => {
                entry.target.classList.add('appear');
            }, index * 200); // Délai de 200ms entre chaque card
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.1 });

const cardsToAnimate = document.querySelectorAll('.specialite-preview-card');
cardsToAnimate.forEach(card => {
    observer.observe(card);
});
});
</script>

<?php
get_footer();
?>