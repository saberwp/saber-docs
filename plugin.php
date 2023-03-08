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

	}

	public function templates( $template ) {

		// Provide single template.
    if ( is_single() && get_post_type() == 'doc' ) {
    	$template = SABER_DOCS_PATH . '/templates/single-doc.php';
    }

		return $template;
	}

}

new Plugin();
