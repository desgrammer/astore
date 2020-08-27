<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Desgrammer_Store
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'desgrammer-store' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();
				else :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					$desgrammer_store_description = get_bloginfo( 'description', 'display' );
					if ( $desgrammer_store_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $desgrammer_store_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php 
					endif;
				endif; 
				?>
			</div><!-- .site-branding -->
			<div class="nav-search">
				<form action="" method="get" autocomplete="off">
					<input type="text" class="header-search" id="headerSearch" placeholder="What do you want to search ?">
				</form>
				<div class="search-result">
					<ul class="search-products">
					<?php
						$args = array(
							'post_type'      => 'product',
							'posts_per_page' => 3,
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : 
								$loop->the_post(); 
								?>
								<li>
									<div class="product-image">
										<?php echo get_the_post_thumbnail( get_the_ID(), array( 100, 100 ) ); ?>
									</div>
									<div class="product-content">
										<h4><?php echo esc_attr( the_title() ); ?></h4>
										<span><?php echo esc_attr( get_woocommerce_currency_symbol() ) . esc_attr( get_post_meta( get_the_ID(), '_regular_price', true ) ); ?></span>
									</div>
								</li>
								<?php 
							endwhile;
						} else {
							echo esc_html( 'No products found' );
						}
						wp_reset_postdata();
						?>
					</ul>
				</div>
			</div>
			<nav id="site-navigation" class="main-navigation">
			<button class="cart-toggle"><i class="fad fa-shopping-cart"></i></button>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fad fa-bars"></i></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
