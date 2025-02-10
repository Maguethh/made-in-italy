<?php

function add_body_class_for_restaurants($classes) {
    if (is_page('nos-restaurants')) {
        $classes[] = 'page-nos-restaurants';
    }
    return $classes;
}
add_filter('body_class', 'add_body_class_for_restaurants');

// Ajouter une meta box pour les images du slider principal
function add_slider_images_meta_box() {
    global $post;
    if ($post->post_name == 'accueil') { // Vérifiez le slug de la page
        add_meta_box(
            'slider_images_meta_box', // ID
            'Slider Images', // Titre
            'show_slider_images_meta_box', // Callback
            'page', // Écran
            'normal', // Contexte
            'high' // Priorité
        );
    }
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
    global $post;
    if ($post->post_name == 'accueil') { // Vérifiez le slug de la page
        add_meta_box(
            'restaurant_slider_images_meta_box', // ID
            'Restaurant Slider Images', // Titre
            'show_restaurant_slider_images_meta_box', // Callback
            'page', // Écran
            'normal', // Contexte
            'high' // Priorité
        );
    }
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
    global $post;
    if ($post->post_name == 'accueil') { // Vérifiez le slug de la page
        add_meta_box(
            'home_food_preview_meta_box', // ID
            'Home Food Preview', // Titre
            'show_home_food_preview_meta_box', // Callback
            'page', // Écran
            'normal', // Contexte
            'high' // Priorité
        );
    }
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
?>

<?php
// Add meta boxes for restaurant cards based on types
function add_restaurant_cards_meta_boxes() {
    global $post;
    if ($post->post_name == 'nos-restaurants') {
        $restaurant_types = get_post_meta($post->ID, 'restaurant_types', true);
        if (!empty($restaurant_types)) {
            foreach ($restaurant_types as $type) {
                add_meta_box(
                    'restaurant_cards_meta_box_' . sanitize_title($type),
                    $type . ' Cards',
                    'show_restaurant_cards_meta_box',
                    'page',
                    'normal',
                    'high',
                    ['type' => $type]
                );
            }
        }
    }
}
add_action('add_meta_boxes', 'add_restaurant_cards_meta_boxes');

// Show meta box for restaurant cards
function show_restaurant_cards_meta_box($post, $meta_box) {
    $type = $meta_box['args']['type'];
    $restaurant_cards = get_post_meta($post->ID, 'restaurant_cards_' . sanitize_title($type), true);
    wp_nonce_field('restaurant_cards_nonce_' . sanitize_title($type), 'restaurant_cards_nonce_field_' . sanitize_title($type));
    ?>
    <div id="restaurant_cards_container_<?php echo sanitize_title($type); ?>">
        <?php if (!empty($restaurant_cards)) : ?>
            <?php foreach ($restaurant_cards as $index => $card) : ?>
                <div class="restaurant_card_item">
                    <h4>Card <span class="card-number"><?php echo $index + 1; ?></span></h4>
                    <label for="restaurant_card_title_<?php echo $index; ?>">Title</label>
                    <input type="text" id="restaurant_card_title_<?php echo $index; ?>" name="restaurant_cards_<?php echo sanitize_title($type); ?>[<?php echo $index; ?>][title]" value="<?php echo esc_attr($card['title']); ?>" style="width: 100%;" />
                    <label for="restaurant_card_subtitle_<?php echo $index; ?>">Subtitle</label>
                    <input type="text" id="restaurant_card_subtitle_<?php echo $index; ?>" name="restaurant_cards_<?php echo sanitize_title($type); ?>[<?php echo $index; ?>][subtitle]" value="<?php echo esc_attr($card['subtitle']); ?>" style="width: 100%;" />
                    <label for="restaurant_card_image_<?php echo $index; ?>">Image</label>
                    <input type="hidden" id="restaurant_card_image_<?php echo $index; ?>" name="restaurant_cards_<?php echo sanitize_title($type); ?>[<?php echo $index; ?>][image]" value="<?php echo esc_url($card['image']); ?>" />
                    <img src="<?php echo esc_url($card['image']); ?>" class="restaurant_card_image_preview" style="max-width: 100%; height: auto; display: <?php echo esc_url($card['image']) ? 'block' : 'none'; ?>;" />
                    <button class="upload_image_button button">Upload Image</button>
                    <label for="restaurant_card_color_<?php echo $index; ?>">Background Color</label>
                    <input type="color" id="restaurant_card_color_<?php echo $index; ?>" name="restaurant_cards_<?php echo sanitize_title($type); ?>[<?php echo $index; ?>][color]" value="<?php echo esc_attr($card['color']); ?>" style="width: 100%;" />
                    <label for="restaurant_card_text_color_<?php echo $index; ?>">Text Color</label>
                    <input type="color" id="restaurant_card_text_color_<?php echo $index; ?>" name="restaurant_cards_<?php echo sanitize_title($type); ?>[<?php echo $index; ?>][text_color]" value="<?php echo esc_attr($card['text_color']); ?>" style="width: 100%;" />
                    <button class="remove_card_button button">Remove</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button id="add_card_button_<?php echo sanitize_title($type); ?>" class="button">Add Card</button>
    <script>
        jQuery(document).ready(function($) {
            let container = $('#restaurant_cards_container_<?php echo sanitize_title($type); ?>');
            let addButton = $('#add_card_button_<?php echo sanitize_title($type); ?>');
            let cardIndex = container.children('.restaurant_card_item').length;
            let maxCards = 8;
            let imageFrame;

            function updateCardNumbers() {
                container.children('.restaurant_card_item').each(function(index) {
                    $(this).find('.card-number').text(index + 1);
                });
            }

            addButton.click(function(e) {
                e.preventDefault();
                if (cardIndex >= maxCards) return;
                let newCard = `
                    <div class="restaurant_card_item">
                        <h4>Card <span class="card-number">${cardIndex + 1}</span></h4>
                        <label for="restaurant_card_title_${cardIndex}">Title</label>
                        <input type="text" id="restaurant_card_title_${cardIndex}" name="restaurant_cards_<?php echo sanitize_title($type); ?>[${cardIndex}][title]" style="width: 100%;" />
                        <label for="restaurant_card_subtitle_${cardIndex}">Subtitle</label>
                        <input type="text" id="restaurant_card_subtitle_${cardIndex}" name="restaurant_cards_<?php echo sanitize_title($type); ?>[${cardIndex}][subtitle]" style="width: 100%;" />
                        <label for="restaurant_card_image_${cardIndex}">Image</label>
                        <input type="hidden" id="restaurant_card_image_${cardIndex}" name="restaurant_cards_<?php echo sanitize_title($type); ?>[${cardIndex}][image]" style="width: 100%;" />
                        <img src="" class="restaurant_card_image_preview" style="max-width: 100%; height: auto; display: none;" />
                        <button class="upload_image_button button">Upload Image</button>
                        <label for="restaurant_card_color_${cardIndex}">Background Color</label>
                        <input type="color" id="restaurant_card_color_${cardIndex}" name="restaurant_cards_<?php echo sanitize_title($type); ?>[${cardIndex}][color]" style="width: 100%;" />
                        <label for="restaurant_card_text_color_${cardIndex}">Text Color</label>
                        <input type="color" id="restaurant_card_text_color_${cardIndex}" name="restaurant_cards_<?php echo sanitize_title($type); ?>[${cardIndex}][text_color]" style="width: 100%;" />
                        <button class="remove_card_button button">Remove</button>
                    </div>
                `;
                container.append(newCard);
                cardIndex++;
                updateCardNumbers();
            });

            $(document).on('click', '.remove_card_button', function(e) {
                e.preventDefault();
                $(this).parent().remove();
                cardIndex--;
                updateCardNumbers();
            });

            $(document).on('click', '.upload_image_button', function(e) {
                e.preventDefault();
                let button = $(this);
                let imageField = button.prevAll('input[type="hidden"]');
                let imagePreview = button.prevAll('.restaurant_card_image_preview');
                if (typeof window.imageFrame !== 'undefined') {
                    window.imageFrame.open();
                    return;
                }
                window.imageFrame = wp.media({
                    title: 'Select Image',
                    button: {
                        text: 'Add Image'
                    },
                    multiple: false
                });
                window.imageFrame.on('select', function() {
                    let attachment = window.imageFrame.state().get('selection').first().toJSON();
                    imageField.val(attachment.url);
                    imagePreview.attr('src', attachment.url).show();
                });
                window.imageFrame.open();
            });

            updateCardNumbers();
        });
    </script>
    <?php
}

// Save restaurant cards
function save_restaurant_cards_meta_box($post_id) {
    $restaurant_types = get_post_meta($post_id, 'restaurant_types', true);
    if (!empty($restaurant_types)) {
        foreach ($restaurant_types as $type) {
            if (!isset($_POST['restaurant_cards_nonce_field_' . sanitize_title($type)]) || !wp_verify_nonce($_POST['restaurant_cards_nonce_field_' . sanitize_title($type)], 'restaurant_cards_nonce_' . sanitize_title($type))) {
                continue;
            }
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                continue;
            }
            if (!current_user_can('edit_post', $post_id)) {
                continue;
            }
            if (isset($_POST['restaurant_cards_' . sanitize_title($type)])) {
                update_post_meta($post_id, 'restaurant_cards_' . sanitize_title($type), $_POST['restaurant_cards_' . sanitize_title($type)]);
            } else {
                delete_post_meta($post_id, 'restaurant_cards_' . sanitize_title($type));
            }
        }
    }
}
add_action('save_post', 'save_restaurant_cards_meta_box');

// Add meta box for restaurant types
function add_restaurant_types_meta_box() {
    global $post;
    if ($post->post_name == 'nos-restaurants') {
        add_meta_box(
            'restaurant_types_meta_box',
            'Restaurant Types',
            'show_restaurant_types_meta_box',
            'page',
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'add_restaurant_types_meta_box');

// Show meta box for restaurant types
function show_restaurant_types_meta_box($post) {
    $restaurant_types = get_post_meta($post->ID, 'restaurant_types', true);
    wp_nonce_field('restaurant_types_nonce', 'restaurant_types_nonce_field');
    ?>
    <div id="restaurant_types_container">
        <?php if (!empty($restaurant_types)) : ?>
            <?php foreach ($restaurant_types as $index => $type) : ?>
                <div class="restaurant_type_item">
                    <input type="text" name="restaurant_types[]" value="<?php echo esc_attr($type); ?>" style="width: 80%;" />
                    <button class="remove_type_button button">Remove</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button id="add_type_button" class="button">Add Type</button>
    <script>
        jQuery(document).ready(function($) {
            let container = $('#restaurant_types_container');
            let addButton = $('#add_type_button');

            addButton.click(function(e) {
                e.preventDefault();
                let newType = `
                    <div class="restaurant_type_item">
                        <input type="text" name="restaurant_types[]" style="width: 80%;" />
                        <button class="remove_type_button button">Remove</button>
                    </div>
                `;
                container.append(newType);
            });

            $(document).on('click', '.remove_type_button', function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
        });
    </script>
    <?php
}

// Save restaurant types
function save_restaurant_types_meta_box($post_id) {
    if (!isset($_POST['restaurant_types_nonce_field']) || !wp_verify_nonce($_POST['restaurant_types_nonce_field'], 'restaurant_types_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['restaurant_types'])) {
        update_post_meta($post_id, 'restaurant_types', $_POST['restaurant_types']);
    } else {
        delete_post_meta($post_id, 'restaurant_types');
    }
}
add_action('save_post', 'save_restaurant_types_meta_box');