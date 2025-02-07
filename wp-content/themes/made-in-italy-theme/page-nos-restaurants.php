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
      <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
      <button class="next" onclick="plusSlides(1)">&#10095;</button>
    </div>
    <div class="home-main-button-border">
      <button class="home-main-button">j`ai faim !</button>
    </div>
  </div>
  
  <div class="home-story-container">
    <div class="home-story-section-1">
      <h1 class="home-story-title">Notre histoire...</h1>
        <p class="home-story-text">
          Made in Italy, un concept unique fondé par David.
          C'est l'endroit de la street food italienne premium, ou toutes les spécialités de chaque région sont réunies.<br>La pizzatella de Rome, Les Arancinis et la patisserie de Sicile, 
          et plus que tout…<br/>Le produit phare de la Maison ; La fameuse Schiacciata, la meilleure Foccacia de Toscane garnis des meilleurs charcuteries sourcées soigneusement d'Italie
        </p>
    </div>
      <div class="home-story-section-2">
        <div class="home-story-image-container">
          <img class="home-story-image" src="<?php echo get_template_directory_uri(); ?>/images/story.png" alt="">
        </div>
      </div>  
    </div>
  </div>

  <div class="hover-images-container-background">
    <div class="background"></div>
    <div class="background2"></div>
    <div class="hover-images-container">
      <div class="hover-images-title">Plus que des photos, notre quotidien.</div>
      <img class="decorative-svg" src="<?php echo get_template_directory_uri(); ?>/images/pasta.svg" alt="Pasta Decoration">
    </div>
  </div>
  
  <div class="food-preview-section">
    <div class="food-preview-title">Un aperçu de vos plats !</div>
    <div class="food-preview-grid">
      <?php
      $home_food_preview = get_post_meta(get_the_ID(), 'home_food_preview', true);
      if (!empty($home_food_preview)):
        foreach ($home_food_preview as $food): ?>
          <div class="food-preview-card">
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
      

<script>
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
    imgContainer.style.transform = `rotate(${Math.random() * 20 - 10}deg)`; // Inclinez la div parent

    const img = document.createElement('img');
    img.src = images[imageIndex];
    img.className = 'hover-image';

    // Ajustez la position pour que l'image apparaisse au-dessus du curseur
    imgContainer.style.top = `${e.clientY - 200}px`; // Ajustez cette valeur pour positionner correctement l'image verticalement
    imgContainer.style.left = `${e.clientX - 150}px`; // Ajustez cette valeur pour positionner correctement l'image horizontalement

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
      image.style.transition = ''; // Supprimez la transition pour un suivi réactif
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      image.style.transform = `translate(${(x - rect.width / 2) / 10}px, ${(y - rect.height / 2) / 10}px)`;
    });

    card.addEventListener('mouseleave', function() {
      const image = card.querySelector('.food-preview-image');
      image.style.transition = 'transform 0.5s ease'; // Ajoutez une transition pour un retour fluide
      image.style.transform = 'translate(0, 0)';
    });
  });
});
</script>

<?php get_footer(); ?>