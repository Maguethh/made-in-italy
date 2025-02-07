<?php
// Ajouter une meta box pour les images du slider principal
function add_slider_images_meta_box() {
    add_meta_box(
        'slider_images_meta_box', // ID
        'Slider Images', // Titre
        'show_slider_images_meta_box', // Callback
        'page', // Écran
        'normal', // Contexte
        'high' // Priorité
    );
}
add_action('add_meta_boxes', 'add_slider_images_meta_box');

// Afficher la meta box pour les images du slider principal
function show_slider_images_meta_box($post) {
    $slider_images = get_post_meta($post->ID, 'slider_images', true);
    wp_nonce_field('slider_images_nonce', 'slider_images_nonce_field');
    ?>
    <div id="slider_images_container">
        <?php if (!empty($slider_images)) : ?>
            <?php foreach ($slider_images as $image) : ?>
                <div class="slider_image">
                    <input type="text" name="slider_images[]" value="<?php echo esc_url($image); ?>" style="width: 80%;" />
                    <button class="remove_image_button button">Remove</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button id="add_image_button" class="button">Add Image</button>
    <script>
        jQuery(document).ready(function($) {
            $('#add_image_button').click(function(e) {
                e.preventDefault();
                var imageFrame;
                if (imageFrame) {
                    imageFrame.open();
                    return;
                }
                imageFrame = wp.media({
                    title: 'Select Image',
                    button: {
                        text: 'Add Image'
                    },
                    multiple: false
                });
                imageFrame.on('select', function() {
                    var attachment = imageFrame.state().get('selection').first().toJSON();
                    $('#slider_images_container').append('<div class="slider_image"><input type="text" name="slider_images[]" value="' + attachment.url + '" style="width: 80%;" /><button class="remove_image_button button">Remove</button></div>');
                });
                imageFrame.open();
            });
            $(document).on('click', '.remove_image_button', function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
        });
    </script>
    <?php
}

// Enregistrer les images du slider principal
function save_slider_images_meta_box($post_id) {
    if (!isset($_POST['slider_images_nonce_field']) || !wp_verify_nonce($_POST['slider_images_nonce_field'], 'slider_images_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['slider_images'])) {
        update_post_meta($post_id, 'slider_images', array_map('esc_url_raw', $_POST['slider_images']));
    } else {
        delete_post_meta($post_id, 'slider_images');
    }
}
add_action('save_post', 'save_slider_images_meta_box');

// Ajouter une meta box pour les images du restaurant slider
function add_restaurant_slider_images_meta_box() {
    add_meta_box(
        'restaurant_slider_images_meta_box', // ID
        'Restaurant Slider Images', // Titre
        'show_restaurant_slider_images_meta_box', // Callback
        'page', // Écran
        'normal', // Contexte
        'high' // Priorité
    );
}
add_action('add_meta_boxes', 'add_restaurant_slider_images_meta_box');

// Afficher la meta box pour les images du restaurant slider
function show_restaurant_slider_images_meta_box($post) {
    $restaurant_slider_images = get_post_meta($post->ID, 'restaurant_slider_images', true);
    wp_nonce_field('restaurant_slider_images_nonce', 'restaurant_slider_images_nonce_field');
    ?>
    <div id="restaurant_slider_images_container">
        <?php if (!empty($restaurant_slider_images)) : ?>
            <?php foreach ($restaurant_slider_images as $image) : ?>
                <div class="restaurant_slider_image">
                    <input type="text" name="restaurant_slider_images[]" value="<?php echo esc_url($image); ?>" style="width: 80%;" />
                    <button class="remove_image_button button">Remove</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button id="add_restaurant_image_button" class="button">Add Image</button>
    <script>
        jQuery(document).ready(function($) {
            $('#add_restaurant_image_button').click(function(e) {
                e.preventDefault();
                var imageFrame;
                if (imageFrame) {
                    imageFrame.open();
                    return;
                }
                imageFrame = wp.media({
                    title: 'Select Image',
                    button: {
                        text: 'Add Image'
                    },
                    multiple: false
                });
                imageFrame.on('select', function() {
                    var attachment = imageFrame.state().get('selection').first().toJSON();
                    $('#restaurant_slider_images_container').append('<div class="restaurant_slider_image"><input type="text" name="restaurant_slider_images[]" value="' + attachment.url + '" style="width: 80%;" /><button class="remove_image_button button">Remove</button></div>');
                });
                imageFrame.open();
            });
            $(document).on('click', '.remove_image_button', function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
        });
    </script>
    <?php
}

// Enregistrer les images du restaurant slider
function save_restaurant_slider_images_meta_box($post_id) {
    if (!isset($_POST['restaurant_slider_images_nonce_field']) || !wp_verify_nonce($_POST['restaurant_slider_images_nonce_field'], 'restaurant_slider_images_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['restaurant_slider_images'])) {
        update_post_meta($post_id, 'restaurant_slider_images', array_map('esc_url_raw', $_POST['restaurant_slider_images']));
    } else {
        delete_post_meta($post_id, 'restaurant_slider_images');
    }
}
add_action('save_post', 'save_restaurant_slider_images_meta_box');

// Enqueue styles and scripts
function enqueue_styles_and_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_media(); // Enqueue the media library scripts
}
add_action('wp_enqueue_scripts', 'enqueue_styles_and_scripts');

// Ajouter une meta box pour les aperçus de plats
function add_home_food_preview_meta_box() {
    add_meta_box(
        'home_food_preview_meta_box', // ID
        'Home Food Preview', // Titre
        'show_home_food_preview_meta_box', // Callback
        'page', // Écran
        'normal', // Contexte
        'high' // Priorité
    );
}
add_action('add_meta_boxes', 'add_home_food_preview_meta_box');

// Afficher la meta box pour les aperçus de plats
function show_home_food_preview_meta_box($post) {
    $home_food_preview = get_post_meta($post->ID, 'home_food_preview', true);
    wp_nonce_field('home_food_preview_nonce', 'home_food_preview_nonce_field');
    ?>
    <div id="home_food_preview_container">
        <?php if (!empty($home_food_preview)) : ?>
            <?php foreach ($home_food_preview as $index => $food) : ?>
                <div class="home_food_preview_item">
                    <h4>Card <span class="card-number"><?php echo $index + 1; ?></span></h4>
                    <label for="home_food_preview_title_<?php echo $index; ?>">Title</label>
                    <input type="text" id="home_food_preview_title_<?php echo $index; ?>" name="home_food_preview[<?php echo $index; ?>][title]" value="<?php echo esc_attr($food['title']); ?>" style="width: 100%;" />
                    <label for="home_food_preview_subtitle_<?php echo $index; ?>">Subtitle</label>
                    <input type="text" id="home_food_preview_subtitle_<?php echo $index; ?>" name="home_food_preview[<?php echo $index; ?>][subtitle]" value="<?php echo esc_attr($food['subtitle']); ?>" style="width: 100%;" />
                    <label for="home_food_preview_image_<?php echo $index; ?>">Image</label>
                    <input type="hidden" id="home_food_preview_image_<?php echo $index; ?>" name="home_food_preview[<?php echo $index; ?>][image]" value="<?php echo esc_url($food['image']); ?>" />
                    <button class="upload_image_button button">Upload Image</button>
                    <label for="home_food_preview_color_<?php echo $index; ?>">Background Color</label>
                    <input type="color" id="home_food_preview_color_<?php echo $index; ?>" name="home_food_preview[<?php echo $index; ?>][color]" value="<?php echo esc_attr($food['color']); ?>" style="width: 100%;" />
                    <label for="home_food_preview_text_color_<?php echo $index; ?>">Text Color</label>
                    <input type="color" id="home_food_preview_text_color_<?php echo $index; ?>" name="home_food_preview[<?php echo $index; ?>][text_color]" value="<?php echo esc_attr($food['text_color']); ?>" style="width: 100%;" />
                    <button class="remove_food_preview_button button">Remove</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button id="add_food_preview_button" class="button">Add Card</button>
    <script>
        jQuery(document).ready(function($) {
            let maxCards = 8;
            let container = $('#home_food_preview_container');
            let addButton = $('#add_food_preview_button');
            let cardIndex = container.children('.home_food_preview_item').length;

            function updateCardNumbers() {
                container.children('.home_food_preview_item').each(function(index) {
                    $(this).find('.card-number').text(index + 1);
                });
            }

            addButton.click(function(e) {
                e.preventDefault();
                if (cardIndex >= maxCards) return;

                let newCard = `
                    <div class="home_food_preview_item">
                        <h4>Card <span class="card-number">${cardIndex + 1}</span></h4>
                        <label for="home_food_preview_title_${cardIndex}">Title</label>
                        <input type="text" id="home_food_preview_title_${cardIndex}" name="home_food_preview[${cardIndex}][title]" style="width: 100%;" />
                        <label for="home_food_preview_subtitle_${cardIndex}">Subtitle</label>
                        <input type="text" id="home_food_preview_subtitle_${cardIndex}" name="home_food_preview[${cardIndex}][subtitle]" style="width: 100%;" />
                        <label for="home_food_preview_image_${cardIndex}">Image</label>
                        <input type="hidden" id="home_food_preview_image_${cardIndex}" name="home_food_preview[${cardIndex}][image]" style="width: 100%;" />
                        <button class="upload_image_button button">Upload Image</button>
                        <label for="home_food_preview_color_${cardIndex}">Background Color</label>
                        <input type="color" id="home_food_preview_color_${cardIndex}" name="home_food_preview[${cardIndex}][color]" style="width: 100%;" />
                        <label for="home_food_preview_text_color_${cardIndex}">Text Color</label>
                        <input type="color" id="home_food_preview_text_color_${cardIndex}" name="home_food_preview[${cardIndex}][text_color]" style="width: 100%;" />
                        <button class="remove_food_preview_button button">Remove</button>
                    </div>
                `;
                container.append(newCard);
                cardIndex++;
                updateCardNumbers();
            });

            $(document).on('click', '.remove_food_preview_button', function(e) {
                e.preventDefault();
                $(this).parent().remove();
                cardIndex--;
                updateCardNumbers();
            });

            $(document).on('click', '.upload_image_button', function(e) {
                e.preventDefault();
                let button = $(this);
                let imageField = button.prev('input');
                let imageFrame;
                if (imageFrame) {
                    imageFrame.open();
                    return;
                }
                imageFrame = wp.media({
                    title: 'Select Image',
                    button: {
                        text: 'Add Image'
                    },
                    multiple: false
                });
                imageFrame.on('select', function() {
                    let attachment = imageFrame.state().get('selection').first().toJSON();
                    imageField.val(attachment.url);
                });
                imageFrame.open();
            });

            updateCardNumbers();
        });
    </script>
    <?php
}

// Enregistrer les aperçus de plats
function save_home_food_preview_meta_box($post_id) {
    if (!isset($_POST['home_food_preview_nonce_field']) || !wp_verify_nonce($_POST['home_food_preview_nonce_field'], 'home_food_preview_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['home_food_preview'])) {
        update_post_meta($post_id, 'home_food_preview', $_POST['home_food_preview']);
    } else {
        delete_post_meta($post_id, 'home_food_preview');
    }
}
add_action('save_post', 'save_home_food_preview_meta_box');