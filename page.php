<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php
  while ( have_posts() ) : the_post();

  ?>
<!-- Default Page-->
<section class="default-page standard-page">
	<div class="container">
		  <!-- Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <?php the_content();?>
                </div>
            </div>
	</div>

</section>



<?php 
  endwhile;
endif;
?>

<?php get_footer(); ?>