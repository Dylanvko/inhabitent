<?php
/**
* The template for displaying archive pages.
*
* @package Inhabitent_Theme
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">

				<h2 class='shop-title'>Shop Stuff</h2>
				<?php
$terms = get_terms( array(
	'taxonomy' => 'product-type',
	'hide_empty' => 0,
	) );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
		?>
					<div class="product-type-blocks">

						<?php foreach ( $terms as $term ) : ?>

						<div class="product-type-block-wrapper">
							<p>
								<a href="<?php echo get_term_link( $term ); ?>" class="btn">
									<?php echo $term->name; ?>
								</a>
							</p>
						</div>

						<?php endforeach; ?>

					</div>

					<?php endif; ?>

			</header>
			<!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<div class='product-grid-container'>
				<ul class='product-grid-list'>
					<?php while ( have_posts() ) : the_post(); ?>

					<li class='product-grid-item'>
						<div class='thumbnail-wrapper'>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'large' ); ?>
								</a>
						</div>
						<?php endif; ?>
						<div class='product-meta'>
							<h2 class='product-info'>
								<span>
									<?php the_title(); ?>
								</span>
								<span>................................</span>
								<span>
									<?php echo CFS()->get( 'price' ); ?>
								</span>
							</h2>
						</div>
					</li>

					</article>
					<!-- #post-## -->

					<?php endwhile; ?>
				</ul>
			</div>

			<?php the_posts_navigation(); ?>

			<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

	<?php get_footer(); ?>