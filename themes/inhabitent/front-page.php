<?php
/**
 * The main template file.
 *
 * @package Inhabitent
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="home-hero">
				<img src="">
			</section>

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content' ); ?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
   $args = array( 'post_type' => 'post', 'order' => 'DES', 'posts_per_page' => 3 );
   $products = new WP_Query( $args ); // instantiate our object
?>
<ul>
<?php if ( $products->have_posts() ) : ?>
   <?php while ( $products->have_posts() ) : $products->the_post(); ?>
	 		
			<li>
			<div class='journal-container'>
			<?php the_post_thumbnail('large'); ?> </div>
			<?php red_starter_posted_on(); ?> / <span><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
			<div class='journal-entry-wrapper'><h1><?php the_title(); ?></h1>
			<a href='<?php the_permalink(); ?>'>Read Entry</a></div>
			</li>

   <?php endwhile; ?>
   <?php wp_reset_postdata(); ?>

<?php else : ?>
      <h2>Nothing found!</h2>
<?php endif; ?>
</ul>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
