<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<!--				<h1 class="entry-title"><?php the_title(); ?></h1>-->
				<div id="wides"></div>

				<table id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<tr>
						<td class="entry-aside">
							
						</td>
						<td class="entry-content-right">
                                                    <div class="post_title">
					

					<div id="nav-above" class="navigation">
						<div class="nav-previous">
	<?php if (get_previous_post(false) != null): ?>
							<?php previous_post_link( '%link', '« Previous' ); ?>
	<?php else: ?>
							« Previous
	<?php endif ?>
						</div>
						
						<div class="nav-next">
	<?php if (get_next_post(false) != null): ?>
							<?php next_post_link( '%link', 'Next »' ); ?>
	<?php else: ?>
							Next »
	<?php endif ?>
						</div>
					</div><!-- #nav-above -->


				</div>
                                                    <div class="post_heading"><h1 class="entry-title" style="float:left;margin-left: 0px;margin-top: 22px;"><?php the_title(); ?></h1>
<div class="entry-meta">
						<?php pin_board_posted_by() ?>
						<span class="main_separator">/</span>
						<?php pin_board_posted_on() ?>
						<span class="main_separator">/</span>
						<?php// pin_board_posted_in() ?>
						<span class="main_separator">/</span>
	<?php //if ( get_comments_number() != 0 ) : ?>
<!--						<a href="#comments"><?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'pin_board' ),
							number_format_i18n( get_comments_number() )
						); ?></a>-->
	<?php ///else: ?>
<!--						<a href="#comments">No Comments</a>-->
	<?php //endif ?>
					</div> </div><!-- .entry-meta -->
                                        <div style="clear:both;"></div>
                                                    <?php the_post_thumbnail( 'single-post-thumbnail' ); ?><?php the_content(); ?>
                                                    
							
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'pin_board' ), 'after' => '</div>' ) ); ?>

		<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
							<div id="entry-author-info">
								<div id="author-avatar">
                                                                    <?php echo get_avatar( $id_or_email, $size, $default, $alt ); ?> 
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'pin_board_author_bio_avatar_size', 60 ) ); ?>
								</div><!-- #author-avatar -->
								<div id="author-description">
									<h2><?php printf( esc_attr__( 'About %s', 'pin_board' ), get_the_author() ); ?></h2>
									<?php the_author_meta( 'description' ); ?>
									<div id="author-link">
										<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
											<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'pin_board' ), get_the_author() ); ?>
										</a>
									</div><!-- #author-link	-->
								</div><!-- #author-description -->
							</div><!-- #entry-author-info -->
		<?php endif; ?>
							<div class="clear"></div>
							
								<a target="_blank" href="<?php  echo get_post_meta($post->ID,'url',1); ?>">Apply Now </a>
							
							<div class="entry-utility">
								<?php pin_board_tags() ?>
								<?php edit_post_link( __( 'Edit', 'pin_board' ), '<span class="edit-link">', '</span>' ); ?>
							</div><!-- .entry-utility -->

 
						</td>
					</tr>
				</table><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php $pin_board_theme_options = get_option('pin_board_theme_options');
	if ( $pin_board_theme_options['related'] != 0 ) :
?>
				
<div class="recent clear">
	<?php
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		query_posts(
			array(
				'works' => $term->slug,
				'posts_per_page' => 10,
				'post__not_in' => array($post->ID)
			)
		);
	?>
	
	<div id="related">
	
	<?php while ( have_posts() ) : the_post(); ?>
	
	<div class="box">
		<div class="rel">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homepage-thumb', array('alt' => '', 'title' => '')) ?></a>
	<?php if ($pin_board_theme_options['images_only'] == 0): ?>
			<div class="categories"><?php pin_board_posted_in(); ?></div>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		        <?php the_excerpt() ?>
			<div class="posted"><?php pin_board_posted_on() ?> <span class="main_separator">/</span>
				<?php echo comments_popup_link( __( 'No comments', 'pin_board' ), __( 'One Comment', 'pin_board' ), __( '% Comments', 'pin_board' ) ); ?>
			</div>
	<?php endif ?>
			<div class="texts">
	<?php if ($pin_board_theme_options['images_only'] == 1): ?>
				<a class="transparent" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homepage-thumb', array('alt' => '', 'title' => '')) ?></a>
	<?php endif ?>
				<div class="abs">
	<?php if ($pin_board_theme_options['images_only'] == 0): ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homepage-thumb', array('alt' => '', 'title' => '')) ?></a>
	<?php endif ?>
					<div class="categories"><?php pin_board_posted_in(); ?></div>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php the_excerpt() ?>
					<div class="posted"><?php pin_board_posted_on() ?> <span class="main_separator">/</span>
					<?php echo comments_popup_link( __( 'No comments', 'pin_board' ), __( 'One Comment', 'pin_board' ), __( '% Comments', 'pin_board' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php endwhile ?>
	
	</div>
	
	<?php wp_reset_query(); ?>
</div>

<?php endif ?>