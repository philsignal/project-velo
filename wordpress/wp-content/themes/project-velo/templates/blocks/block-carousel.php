<?php
/**
 * ACF Carousel Block Template.
 */
?>

<section class="carousel-slider slick-slider-container">

    <?php

    // Check carousel_slider exists
    if( have_rows('carousel_slider') ) :

        // Loop through repeater entries
        while( have_rows('carousel_slider') ) : the_row();

            // get image URL from image id
            $image_id = get_sub_field('image');
            $image_url = wp_get_attachment_image($image_id,'carousel-slider');
            ?>

            <div class="carousel-item">
                <div class="carousel-content">
                    <h2><?php the_sub_field('title') ?></h2>
                    <h4><?php the_sub_field('description') ?></h4>
                    <a class="cta" href="<?php the_sub_field('button_url') ?>" alt="<?php the_sub_field('button_label') ?>"><?php the_sub_field('button_label') ?></a>
                </div>
                <div class="carousel-image-wrapper"><?php echo $image_url ?></div>
            </div>

        <?php
        endwhile;
    endif;
    ?>

</section>
