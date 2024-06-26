<?php
/**
 * Template Name: Kontakt oss
 */
get_header();
?>

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();

?>

     <section class="contact">


     </section>
    <?php endwhile;
endif;
?>


<?php get_footer(); ?>