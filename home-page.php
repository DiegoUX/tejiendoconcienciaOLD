<?php
/**
 * Template Name: Home template
 *
 *
 * @since 1.0.0
 */
get_header();
?>
	
	<div id="hero" class="title-card-wrapper">


		<div id="logo">
			<div class="big-logo">
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					 <!-- Quitar y poner como bkg del "a" (pedir a Ceci logo mas chico) -->
					<img src="/wp-content/themes/tejiendoconciencia-child/images/logo.png" alt="TejiendoConCiencia Logo">
				</a>
			</div>
		</div>	



        <div class="title-card">
			<div id="site-meta">

				<h2 id="site-description-custom"<?php echo $space_class; ?>>
					<?php bloginfo( 'description' ); ?>
				</h2>
			</div>

			<?php
			// Header image section
			bavotasan_header_images();
			?>
		</div>
	</div>

	<?php 
		// Display home page top widgetized area
		if ( is_active_sidebar( 'home-page-top-area' ) ) {
			?>
			<div id="home-page-widgets">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar( 'home-page-top-area' ); ?>
					</div>
				</div>
			</div>
			<?php
		}
	?>
	<section class="counter">
		<div class="container">
			<div class="row">		
				<div class="col-md-4">
					1
				</div>
				<div class="col-md-4">
					1
				</div>
				<div class="col-md-4">
					1
				</div>
			</div>
		</div>
	</section>

	<!-- Blog (template-post-block content) -->
	<div class="container from-the-blog">
		<div class="row">
			<div id="primary" class="col-md-12 hfeed">
				<div class="page-header clearfix">
					<h1 class="pull-left">Blog</h1>
				</div>

				<div class="row">
					<?php
					/**
					 * You can overwrite the following arguments in your child theme's functions.php by
					 * hooking into the 'bavotasan_post_block_query' and returning a custom array.
					 *
				 	 * https://codex.wordpress.org/Function_Reference/add_filter
					 */
					$bavotasan_post_block_query = new WP_Query( apply_filters( 'bavotasan_post_block_query', array(
						'posts_per_page' => 4,
						'ignore_sticky_posts' => 1,
						'no_found_rows' => true,
					) ) );

					while ( $bavotasan_post_block_query->have_posts() ) : $bavotasan_post_block_query->the_post();
						global $bavotasan_custom_excerpt_length;
						$home_page_post = false;
					    $bavotasan_custom_excerpt_length = 20;
						if ( 1 > $bavotasan_post_block_query->current_post ) {
							$home_page_post = true;
							echo '<div class="col-md-6">';
							$bavotasan_custom_excerpt_length = 50;
						}
						if ( 1 == $bavotasan_post_block_query->current_post )
							echo '<div class="col-md-6">';

						get_template_part( 'content' );

						if ( 1 > $bavotasan_post_block_query->current_post )
							echo '</div>';

						if ( 3 == $bavotasan_post_block_query->current_post )
							echo '</div>';
					endwhile;
					?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>