<?php
/*
Template Name: Homepage
*/
get_header();
?>

<div id="main" class="container">
    <?php the_content(); ?>

    <!-- this carousel would be added to the block-carousel.php template under normal circumstances -->
    <div class="slick-slider-container-main">
        <?php
        // Check if the repeater field has rows of data
        if (have_rows('carousel')) :
            // Loop through the rows of data
            while (have_rows('carousel')) : the_row();
                // Get the image field value
                $image = get_sub_field('carousel_image');
        ?>
                <div class="carousel-item" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
                    <div class="carousel-content">
                        <div class="inner">
                            <h2><?php the_sub_field('title'); ?></h2>
                            <h4><?php the_sub_field('sub_title'); ?></h4>
                            <p><?php the_sub_field('short_text'); ?></p>
                            <?php $link = get_sub_field('call_to_action'); ?>
                            <?php if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                                <a class="cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
        else :
            // No rows found
        endif;
        ?>
    </div>

    <!-- second slider created -->
     <!-- this carousel would be added to the block-carousel.php template under normal circumstances -->
     <div id="second-slider" class="slick-slider-container">
        <?php
        // Check if the repeater field has rows of data
        if (have_rows('carousel')) :
            // Loop through the rows of data
            while (have_rows('carousel')) : the_row();
                // Get the image field value
                $image = get_sub_field('carousel_image');
        ?>
                
                    <div class="carousel-content cols">
                        <div class="inner">
                            <?php
                                if( !empty( $image ) ): ?>
                                    <img class="thumbnails" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>

                            <h2><?php the_sub_field('title'); ?></h2>
                            <h4><?php the_sub_field('sub_title'); ?></h4>
                            <p><?php the_sub_field('short_text'); ?></p>
                            <?php $link = get_sub_field('call_to_action'); ?>
                            <?php if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                                <a class="cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
        <?php
            endwhile;
        else :
            // No rows found
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
?>
