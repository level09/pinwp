<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'pin_board' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'pin_board' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php $pin_board_theme_options = get_option('pin_board_theme_options') ?>

<div id="boxes">
    <?php $i = 1;?>
<?php while ( have_posts() ) : the_post(); ?>    
	<div class="box" id="box<?php echo $i;?>">
		<div class="rel">                    
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homepage-thumb', array('alt' => '', 'title' => '')) ?></a>
	<?php if ($pin_board_theme_options['images_only'] == 0): ?>
<!--			<div class="categories"><?php //pin_board_posted_in(); ?></div>-->
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		          <?php echo substr(get_the_excerpt(), 0,50).'...'; ?>
                        
			<div class="posted"><?php //pin_board_posted_on() ?> <!--<span class="main_separator">/</span>-->
				<?php echo comments_popup_link( __( 'No comments', 'pin_board' ), __( 'One Comment', 'pin_board' ), __( '% Comments', 'pin_board' ) ); ?>
			<?php comments_template( '', true );

                        global $wpdb;
                        $selectComment = $wpdb->get_results("select * from wp_comments where ");
                      ?><div id="<?php echo $i;?>"><?php echo $selectComment[0]->comment_author;?></div><?php
                      echo $selectComment[0]->comment_content;
                        ?>
                        </div>
                        
                <?php $i++;?>
	<?php endif ?>
<!--			<div class="texts">
	<?php if ($pin_board_theme_options['images_only'] == 1): ?>
				<a class="transparent" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homepage-thumb', array('alt' => '', 'title' => '')) ?></a>
	<?php endif ?>
				<div class="abs">
	<?php if ($pin_board_theme_options['images_only'] == 0): ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homepage-thumb', array('alt' => '', 'title' => '')) ?></a>
	<?php endif ?>
					<div class="categories"><?php //pin_board_posted_in(); ?></div>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php// the_excerpt() ?>
					<div class="posted"><?php //pin_board_posted_on() ?> <span class="main_separator">/</span>
					<?php echo comments_popup_link( __( 'No comments', 'pin_board' ), __( 'One Comment', 'pin_board' ), __( '% Comments', 'pin_board' ) ); ?>
					</div>
				</div>
			</div>-->

                </div>
            
            
	</div>

<?php endwhile; ?>
</div>

<?php if ( $wp_query->max_num_pages > 1 ) :
	if ( $pin_board_theme_options['navigation'] == 0 ) : // Default ?>

<div class="fetch">
	<?php next_posts_link( __( 'Load more posts', 'pin_board' ) ); ?>
</div>

<script type="text/javascript">
// Ajax-fetching "Load more posts"
$('.fetch a').live('click', function(e) {
	e.preventDefault();
	$(this).addClass('loading').text('Loading...');
	$.ajax({
		type: "GET",
		url: $(this).attr('href') + '#boxes',
		dataType: "html",
		success: function(out) {
			result = $(out).find('#boxes .box');
			nextlink = $(out).find('.fetch a').attr('href');
			$('#boxes').append(result).masonry('appended', result);
			$('.fetch a').removeClass('loading').text('Load more posts');
			if (nextlink != undefined) {
				$('.fetch a').attr('href', nextlink);
			} else {
				$('.fetch').remove();
			}
		}
	});
});
</script>

	<?php elseif ( $pin_board_theme_options['navigation'] == 1 ) : // Infinite scroll ?>

<div class="infinitescroll">
	<?php next_posts_link( __( 'Load more posts', 'pin_board' ) ); ?>
</div>

<script type="text/javascript">
// Infinite Scroll
var href = 'first';
$(document).ready(function() {
	$('#boxes').infinitescroll({
		navSelector : '.infinitescroll',
		nextSelector : '.infinitescroll a',
		itemSelector : '#boxes .box',
		loadingImg : '<?php echo get_bloginfo('stylesheet_directory') ?>/images/loading.gif',
		loadingText : 'Loading...',
		donetext : 'No more pages to load.',
		debug : false
	}, function(arrayOfNewElems) {
		$('#boxes').masonry('appended', $(arrayOfNewElems));
		if (href != $('.infinitescroll a').attr('href'))
		{
			href = $('.infinitescroll a').attr('href');
		}
	});
});
</script>

	<?php endif; ?>

<?php endif; ?>
   