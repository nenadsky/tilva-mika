<?php
/**
 * Template part for displaying most recent posts on front page
 *
 * @package Tilva_Mika
 */

?>

<article class="front__page--post">

    <header class="fp__header">
        <h4><ion-icon name="calendar"></ion-icon> <?php echo get_the_date('Y-m-d'); ?></h4>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <h2 class="intro-h2"><?php the_title(); ?></h2></a>
        

        <?php if ( !is_front_page() ) : ?>

            <?php if ( has_post_thumbnail()  ) : ?>
                
                <?php the_post_thumbnail(); ?>

            <?php else : ?>
                
                <?php $img = apply_filters('display_default_featured_img'); ?>
                
                <img src="<?php echo $img[0]; ?>" alt="Akcii">

            <?php endif; ?>
        <?php endif; ?>

    </header>

    <div class="fp__body">
        <?php the_excerpt(); ?>
    </div>

    <footer class="fp__footer">
        <p><?php echo get_the_tag_list('<p><ion-icon name="pricetags"></ion-icon> ',', ','</p>'); ?></p>
    </footer>

</article>