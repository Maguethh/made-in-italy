<?php
/*
Template Name: Accueil
*/
get_header();
?>

<div class="home-content">
  <div class="slider-container-background">
    <div class="background"></div>
    <div class="background2"></div>
    <div class="home-slider">
  <?php
  $slider_images = get_post_meta(get_the_ID(), 'slider_images', true);
  if (!empty($slider_images)):
    foreach ($slider_images as $image): ?>
      <div class="slide">
        <img src="<?php echo esc_url($image); ?>" alt="Slider Image">
      </div>
    <?php endforeach;
  endif;
  ?>
  <img class="prev" src="<?php echo get_template_directory_uri(); ?>/images/slider-arrow.svg" onclick="plusSlides(-1)" alt="Previous Slide">
  <img class="next" src="<?php echo get_template_directory_uri(); ?>/images/slider-arrow.svg" onclick="plusSlides(1)" alt="Next Slide">
</div>
    <div class="home-main-button-border">
      <a href="#home-food-preview" class="home-main-button">j`ai faim !</a>
    </div>
  </div>
  
  <div class="home-story-container">
    <div class="home-story-section-1">
      <h1 class="home-story-title title-animate">Notre histoire...</h1>
        <p class="home-story-text">
          Made in Italy, un concept unique fondé par David.
          C'est l'endroit de la street food italienne premium, ou toutes les spécialités de chaque région sont réunies.<br>La pizzatella de Rome, Les Arancinis et la patisserie de Sicile, 
          et plus que tout…<br/>Le produit phare de la Maison ; La fameuse Schiacciata, la meilleure Foccacia de Toscane garnis des meilleurs charcuteries sourcées soigneusement d'Italie
        </p>
    </div>
      <div class="home-story-section-2">
        <div class="home-story-image-container">
          <img class="home-story-image image-animate" src="<?php echo get_template_directory_uri(); ?>/images/story.png" alt="">
        </div>
      </div>  
    </div>
  </div>

  <div class="hover-images-container-background">
    <div class="background"></div>
    <div class="background2"></div>
    <div class="hover-images-container">
      <div class="hover-images-title title-animate">Plus que des photos, notre quotidien.</div>
      <img class="decorative-svg" src="<?php echo get_template_directory_uri(); ?>/images/pasta.svg" alt="Pasta Decoration">
    </div>
  </div>
  
  <div class="food-preview-section" id="home-food-preview">
    <div class="food-preview-section-title title-animate">Un aperçu de vos plats !</div>
    <div class="food-preview-grid">
      <?php
      $home_food_preview = get_post_meta(get_the_ID(), 'home_food_preview', true);
      if (!empty($home_food_preview)):
        foreach ($home_food_preview as $index => $food): ?>
          <div class="food-preview-card" data-index="<?php echo $index; ?>">
            <div class="food-preview-content" style="background-color: <?php echo esc_attr($food['color']); ?>;">
              <h3 class="food-preview-title" style="color: <?php echo esc_attr($food['text_color']); ?>;"><?php echo esc_html($food['title']); ?></h3>
              <p class="food-preview-text" style="color: <?php echo esc_attr($food['text_color']); ?>;"><?php echo esc_html($food['subtitle']); ?></p>
              <img class="food-preview-image" src="<?php echo esc_url($food['image']); ?>" alt="Food Image">
            </div>
          </div>
        <?php endforeach;
      endif;
      ?>
    </div>
  </div>

  <div class="home-restaurants-container">
    <div class="home-restaurants-content">
    <img class="decorative-truffe" src="<?php echo get_template_directory_uri(); ?>/images/truffe.png" alt="Truffe Decoration">

        <div class="home-restaurant-section-1">
            <h2 class="home-restaurant-title title-animate">Nos restaurants près de chez vous !</h2>
            <p class="home-restaurant-text">
                Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et
            </p>
            <button class="home-restaurant-button"><span>Nos restos !</span></button>
        </div>
        <div class="home-restaurant-section-2">
            <div class="home-restaurant-slider">
                <?php
                $restaurant_slider_images = get_post_meta(get_the_ID(), 'restaurant_slider_images', true);
                if (!empty($restaurant_slider_images)):
                    foreach ($restaurant_slider_images as $image): ?>
                        <div class="restaurant-slide">
                            <img src="<?php echo esc_url($image); ?>" alt="Restaurant Slider Image" class="image-animate">
                        </div>
                    <?php endforeach;
                endif;
                ?>
            </div>
            <img class="prev restaurant-prev" src="<?php echo get_template_directory_uri(); ?>/images/slider-arrow.svg" onclick="plusRestaurantSlides(-1)" alt="Previous Slide">
            <img class="next restaurant-next" src="<?php echo get_template_directory_uri(); ?>/images/slider-arrow.svg" onclick="plusRestaurantSlides(1)"alt="Next Slide">

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
      <h2 class="home-contact-title title-animate">Salutaci !</h2>
      <p class="home-contact-text">Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et</p>
        <div class="home-contact-button-border">
      <button class="home-contact-button">Contactez nous !</button>
       </div>
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

let restaurantSlideIndex = 0;
showRestaurantSlides(restaurantSlideIndex);

function plusRestaurantSlides(n) {
    showRestaurantSlides(restaurantSlideIndex += n);
}

function showRestaurantSlides(n) {
    let slides = document.querySelectorAll(".home-restaurant-slider .restaurant-slide");
    if (n >= slides.length) { restaurantSlideIndex = 0 }
    if (n < 0) { restaurantSlideIndex = slides.length - 1 }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.transform = `translateX(${-restaurantSlideIndex * 100}%)`;
    }
}

let slideIndex = 0;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  let slides = document.getElementsByClassName("slide");
  if (n >= slides.length) { slideIndex = 0 }
  if (n < 0) { slideIndex = slides.length - 1 }
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.transform = `translateX(${-slideIndex * 100}%)`;
  }
}

// JavaScript pour l'effet de survol
document.addEventListener('DOMContentLoaded', function() {
  const container = document.querySelector('.hover-images-container');
  const maxImages = 6;
  const minDistance = 200; // Distance minimale en pixels avant d'afficher une nouvelle image
  let lastPosition = { x: 0, y: 0 };
  let imageIndex = 0;

  const images = <?php echo json_encode(get_post_meta(get_the_ID(), 'home_cursor_gallery', true)); ?>;

  container.addEventListener('mousemove', function(e) {
    const currentPosition = { x: e.clientX, y: e.clientY };
    const distance = Math.sqrt(
      Math.pow(currentPosition.x - lastPosition.x, 2) +
      Math.pow(currentPosition.y - lastPosition.y, 2)
    );

    if (distance < minDistance) return;

    lastPosition = currentPosition;

    const imgContainer = document.createElement('div');
    imgContainer.className = 'hover-image-container hover-image-wrapper';
    imgContainer.style.transform = `rotate(${Math.random() * 20 - 10}deg)`;

    const img = document.createElement('img');
    img.src = images[imageIndex];
    img.className = 'hover-image';

    imgContainer.style.top = `${e.clientY - 200}px`; 
    imgContainer.style.left = `${e.clientX - 150}px`;

    imgContainer.appendChild(img);
    container.appendChild(imgContainer);

    const imageWrappers = container.querySelectorAll('.hover-image-wrapper');
    if (imageWrappers.length > maxImages) {
      container.removeChild(imageWrappers[0]);
    }

    // Incrémenter l'index de l'image et le réinitialiser si nécessaire
    imageIndex = (imageIndex + 1) % images.length;
  });

  // JavaScript pour l'effet de suivi du curseur sur les images des cards
  const cards = document.querySelectorAll('.food-preview-card');
  cards.forEach(card => {
    card.addEventListener('mousemove', function(e) {
      const image = card.querySelector('.food-preview-image');
      image.style.transition = ''; 
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      image.style.transform = `translate(${(x - rect.width / 2) / 10}px, ${(y - rect.height / 2) / 10}px)`;
    });

    card.addEventListener('mouseleave', function() {
      const image = card.querySelector('.food-preview-image');
      image.style.transition = 'transform 0.5s ease'; 
      image.style.transform = 'translate(0, 0)';
    });
  });

  // JavaScript pour l'animation d'apparition des titres
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('appear');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  const titles = document.querySelectorAll('.title-animate');
  titles.forEach(title => {
    observer.observe(title);
  });

  // JavaScript pour l'animation d'apparition des images
  const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('appear');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  const imagesToAnimate = document.querySelectorAll('.image-animate');
  imagesToAnimate.forEach(image => {
    imageObserver.observe(image);
  });

  // JavaScript pour l'animation d'apparition des cards
  const cardObserver = new IntersectionObserver((entries, observer) => {
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

  const cardsToAnimate = document.querySelectorAll('.food-preview-card');
  cardsToAnimate.forEach(card => {
    cardObserver.observe(card);
  });
});
</script>

<?php get_footer(); ?>