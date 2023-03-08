<?php

/*
 * Plugin Name: Saber Docs
 * Version: 0.0.1
 */

namespace SaberDocs;

define( 'SABER_DOCS_PATH', \plugin_dir_path( __FILE__ ) );
define( 'SABER_DOCS_URL', \plugin_dir_url( __FILE__ ) );

class Plugin {

	public function __construct() {

		require_once( SABER_DOCS_PATH . '/inc/Doc.php' );
		require_once( SABER_DOCS_PATH . '/inc/TaxonomyTree.php' );
		require_once( SABER_DOCS_PATH . '/inc/post-types/doc.php' );
		require_once( SABER_DOCS_PATH . '/inc/taxonomies/doc-category.php' );

		add_filter( 'template_include', [$this, 'templates'] );

		add_action('wp_enqueue_scripts', function() {
			/**
			 * Enqueue `docs-script` script only if the page is using the "Docs Page" template.
			 *
			 * This function checks if the current page is using the "Docs Page" template (page-docs.php)
			 * and if it is, then the `docs-script` script is enqueued. The script is located in the
			 * /js/docs.js file and is loaded in the footer for better performance.
			 */
			 if ( is_single() && get_post_type() === 'doc' ) {
			 	wp_enqueue_script( 'docs-script', SABER_DOCS_URL . 'js/main.js', array( 'jquery' ), '1.0.0', true );
			 }
		});

	}

	public function templates( $template ) {

		// Provide single template.
    if ( is_single() && get_post_type() === 'doc' ) {
    	$template = SABER_DOCS_PATH . '/templates/single-doc.php';
    }

		return $template;
	}

}

new Plugin();
