<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

get_header(); 

$title = get_field('404_title','options');
$desc = get_field('404_description','options');

?>
<section id="primary" class="content-area">
    <div class="container">
        <div class="error-404 not-found d-flex justify-content-center align-items-center flex-wrap">
            <div class="text-center py-5 mt-lg-3">
                <?php if($title):?>
                    <h1 class="title mb-4 text-uppercase"><?php echo $title; ?></h1>
                <?php endif;?>

                <?php if($desc):?>
                      <p class="desc page-content mb-5 white-space-pre-line"><?php echo $desc; ?></p>
                <?php endif;?>

                <div class="">
                    <a class="btn site-btn site-btn--default" href="<?php echo get_home_url(); ?>"><?php _e( 'Gå til forsiden', 'domain' ); ?></a>
                </div><!-- .page-content -->
            </div>
        </div><!-- .error-404 -->
    </div>
</section><!-- #primary -->

<?php get_footer(); ?>
