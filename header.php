<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cuprum|oswald">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'pin_board' ), max( $paged, $page ) );
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
 <script type="text/javascript">

$(document).ready(function() {

	// fluid grid
        function wrapperWidth() {
		var wrapper_width = $('body').width();
		wrapper_width = Math.floor(wrapper_width / 250) * 250 - 60;
		if (wrapper_width < 1000) wrapper_width = 1000;
		$('#wrapper').css('width', wrapper_width);
            }

	wrapperWidth();

	$(window).resize(function() {
		wrapperWidth();
	});

	// grid
	$('#boxes').masonry({
		itemSelector: '.box',
		columnWidth: 200,
		gutterWidth: 40
	});

	$('#related').masonry({
		itemSelector: '.box',
		columnWidth: 200,
		gutterWidth: 40
	});
});



if ((screen.width>=1024) && (screen.height>=768))
{


}


</script>
<style type="text/css">
/* color from theme options */
<?php $color = getColor() ?>
body, input, textarea { font-family: <?php echo getFonts() ?>; }
a, .menu a:hover, #nav-above a:hover, #footer a:hover, .entry-meta a:hover { color:#e25119; }
.fetch:hover { background:#e25119;; }
blockquote { border-color: #e25119; }
.menu ul .current-menu-item a { color:#e25119; }
#respond .form-submit input { background:#e25119; }

/* fluid grid */
<?php if (!fluidGrid()): ?>
.wrapper { width:91%; margin: 0 auto; }
<?php else: ?>
.wrapper { margin: 0 40px; }
<?php endif ?>

.box .texts {  }
<?php if (!imagesOnly()): ?>
.box .categories { padding-top: 15px; }
<?php endif ?>
</style>




<?php echo getFavicon() ?>
</head>

<body <?php body_class(); ?>>
    <div id="top_main_header">
    <div id="header_top">
<div id="header">
            <div id="search">
			<?php get_search_form(); ?>
<!--			<div id="header-right"><?php wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'header-right', 'walker' => new Imbalance2_Walker_Nav_Menu(), 'depth' => 1 ) ); ?></div>-->
		</div>

<!--		<div id="header-left"><?php wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'header-left', 'walker' => new Imbalance2_Walker_Nav_Menu(), 'depth' => 1 ) ); ?></div>-->
		<div id="site-title">
			<?php echo getlogo() ?>
		</div>
<!--                <div id="header-center"><?php wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'header-center', 'walker' => new Imbalance2_Walker_Nav_Menu(), 'depth' => 1 ) ); ?></div>-->


                <div id="header-nav" class="clearfix">
                    <ul id="header-menu">
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                </div>
		<div class="clear"></div>

	</div>        
    </div>
    <div id="header_bottom">
        <div id="header_container">
                        <ul  id="nav">
                            <li <?php
                            if (is_home ()) {
                                echo ' class="current-cat" ';
                            }
                        ?>>    <!--      < li > close     -->
                            <a href="<?php bloginfo('url'); ?>">Home</a>
                        </li>
                        <?php wp_list_categories('depth=3&exclude=1&hide_empty=0&orderby=name&show_count=0&use_desc_for_title=1&title_li='); ?>
                        <?php
//                            $cats = wp_list_categories('title_li&orderby=id&show_count=0&echo=0&exclude=4,6,20');
//                            if (!strpos($cats,'No categories') ){
//                            echo $cats;  // or wp_list_categories('orderby=id&show_count=0&echo=1&exclude=4,6,20');
//                            }
                        ?>
                    </ul>
                </div>
    </div>
   
        <div id="header_banner">


                

            </span>

        </div></div>
    <div style="clear: both;padding-bottom: 150px;"></div>
<div class="wrapper" id="wrapper">
	
	<?php in_category( $category, $_post ) ?>
	<div id="main">
