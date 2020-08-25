<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Desgrammer_Store
 */

get_header();
?>
<div class="container content-area">
	<main id="primary" class="site-main home-content">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif; 
			?>
				<section class="glide">
					<div class="glide__track" data-glide-el="track">
						<ul class="glide__slides">
							<li class="glide__slide">
								<img src="http://desgrammer-dev.test/wp-content/uploads/2020/08/bannere-sayur.jpg" alt="">
							</li>
							<li class="glide__slide">
								<img src="http://desgrammer-dev.test/wp-content/uploads/2020/08/bannere-sayur.jpg" alt="">
							</li>
							<li class="glide__slide">
								<img src="http://desgrammer-dev.test/wp-content/uploads/2020/08/bannere-sayur.jpg" alt="">
							</li>
						</ul>
					</div>
				</section>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
</div>
<?php
get_footer();
