<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

<?php if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'pin_board' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'pin_board' ); ?></h1>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'pin_board' ); ?></p>
						<div id="page_search">
						<?php get_search_form(); ?>
						</div>
						<br /><br />
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
