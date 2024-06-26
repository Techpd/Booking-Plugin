<?php

get_header();
?>

<?php 
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>
        	<!-- HomePage -->
	<main class="homepage-section">



	</main>
<?php }
} 
?>
<?php get_footer(); ?>
