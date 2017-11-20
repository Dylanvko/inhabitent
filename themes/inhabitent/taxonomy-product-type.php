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
			
			<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
<h1 class="tax-custom-heading">
<?php echo $term->name;

               $terms = get_terms( array(
                   'taxonomy' => 'product-type',
                   'hide_empty' => 0,
               ) );
               if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
            ?>
               <div class="product-type-description">

							 <?php echo category_description(); ?>

               </div>
               
            <?php endif; ?>

			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<div class='product-grid-container'>
				<ul class='product-grid-list'>
			<?php while ( have_posts() ) : the_post(); ?>

		<li class='product-grid-item'>
				<div class='thumbnail-wrapper'>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a></div>
					<?php endif; ?>
				<div class='product-meta'>
					<h2 class='product-info'>
						<span><?php the_title(); ?></span>
						<span>................................</span>
						<span><?php echo CFS()->get( 'price' ); ?></span>
					</h2></div>
							 </li>

		</article><!-- #post-## -->

			<?php endwhile; ?>
					</ul>
					</div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>