<!DOCTYPE html>
<html <?php echo language_attributes(); ?> >
<head>
	<?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PWSQ46X');</script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class( mk_get_body_class( global_get_post_id() ) ); ?> <?php echo get_schema_markup( 'body' ); ?> data-adminbar="<?php echo is_admin_bar_showing(); ?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWSQ46X"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php
		// Hook when you need to add content right after body opening tag. to be used in child themes or customisations.
		do_action( 'theme_after_body_tag_start' );
	?>

	<!-- Target for scroll anchors to achieve native browser bahaviour + possible enhancements like smooth scrolling -->
	<div id="top-of-page"></div>

		<div id="mk-boxed-layout">

			<div id="mk-theme-container" <?php echo is_header_transparent( 'class="trans-header"' ); ?>>

				<?php
				mk_get_header_view( 'styles', 'header-' . get_header_style() );
