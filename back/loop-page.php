<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						
					<?php } ?>

					<div class="entry-content">
                                            <h1 class="entry-title"  style="float:left;margin-left: 0px;margin-top: 22px;width:100%;border-bottom: 1px solid #C1BAB7;padding-bottom: 10px;"><?php the_title(); ?></h1>
						<?php the_content(); ?>

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'pin_board' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'pin_board' ), '<span class="edit-link">', '</span>' ); ?>
						
						<div class="clear"></div>
						
<!--						<div id="social">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a>
							<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

							<div id="fb-root"></div>
							<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
							<fb:like href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" send="true" width="450" show_faces="false" font=""></fb:like>
						</div>-->

					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php //comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>