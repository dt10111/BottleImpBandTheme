<?php
/**
 * Bootstrap Nav
 */
 ?>
 <nav class="site-navigation">		
	<div class="container">
		<div class="row">

			<div class="site-navigation-inner col-sm-12">
				<div class="navbar navbar-default">
					<div class="navbar-header">
				    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				    	<span class="sr-only">Toggle navigation</span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				    </button>
				
				    <!-- Your site title as branding in the menu -->
				    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				  </div>

			    <!-- The WordPress Menu goes here -->
	        <?php wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'walker' => new wp_bootstrap_navwalker()
                )
            ); ?>
				
				</div><!-- .navbar -->
			</div>
		</div>
	</div>
</nav><!-- .site-navigation -->