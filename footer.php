</div><!-- #main -->
</div>
	<div id="footer">
            
		<div id="site-info">
                    <div class="footer_links">
                        <div  class="clearfix">
                    <ul id="header-menu">
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                </div>
                    </div>
			© 2011 <a href="/"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>. All rights reserved.<br />
<!--			Designed by <a href="http://wpshower.com" target="_blank">Wpshower</a>
			<span class="main_separator">/</span>
			Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a>-->
		</div><!-- #site-info -->
<!--		<div id="footer-right"><?php wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'footer-right', 'walker' => new Imbalance2_Walker_Nav_Menu(), 'depth' => 1 ) ); ?></div>
		<div id="footer-left"><?php wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'footer-left', 'walker' => new Imbalance2_Walker_Nav_Menu(), 'depth' => 1 ) ); ?></div>-->
		<div class="clear"></div>
	</div><!-- #footer -->

<!-- .wrapper -->
<?php wp_footer(); ?>
<?php echo imbalance2google() ?>
</body>
</html>
