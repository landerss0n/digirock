<?php
/**
 * template part for sub footer. views/footer
 *
 * @author 		Artbees
 * @package 	jupiter/views
 * @version     5.0.0
 */

global $mk_options;

?>

<div id="sub-footer">
	<div class="<?php echo esc_attr( $view_params['footer_grid_status'] ); ?>">
		<?php if ( !empty( $mk_options['footer_logo'] ) ) {?>
		<div class="mk-footer-logo">
		    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( bloginfo( 'name' ) ); ?>"><img alt="<?php esc_attr( bloginfo( 'name' ) ); ?>" src="<?php echo esc_url( $mk_options['footer_logo'] ); ?>" /></a>
		</div>
		<?php } ?>

    	<span class="mk-footer-copyright"><?php echo stripslashes($mk_options['copyright']); ?></span>
    	<?php if ( has_nav_menu( 'footer-menu' ) ) {
			mk_get_view( 'footer', 'sub-footer-nav' ); 
		} ?>

        <div class="dw-copy">
            <a href="https://digiwise.se/" class="dw-link">
            <span class="dw-text">Webbproduktion:</span>
                <img height="21" width="100" src="<?= get_stylesheet_directory_uri() . '/digiwise-copy.png' ?>" alt="digiwise-logga">
            </a>
        </div>
	</div>
	<div class="clearboth"></div>
</div>
