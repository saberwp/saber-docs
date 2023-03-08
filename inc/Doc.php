<?php

namespace SaberDocs;

class Doc {

	public $index_page_id = 0;
	public $doc_title     = '';
	public $term_tree     = array();
	public $parent_term   = null;
	public $doc_pages     = array();

	/**
	 * Parse the child terms and parent term.
	 *
	 * @param int $starting_term_id The ID of the starting term.
	 *
	 * @return array An array of docs, each represented as an array with 'id', 'title', and 'children' keys.
	 */
	public function parse_terms( $starting_term_id = 0 ) {

		// Retrieve the current page ID.
		$this->index_page_id = get_the_ID();

		// Get index post.
		$index_post = get_post( $this->index_page_id );
		$this->doc_title = $index_post->post_title;

		// Retrieve the "doc-category" taxonomy associated with the current page.
		$terms = get_the_terms( $this->index_page_id, 'doc-category' );
		if ( ! is_array( $terms ) || empty( $terms ) ) {
			return false;
		}
		$this->parent_term = $terms[0];

		// Build the taxonomy tree.
		$tree = new TaxonomyTree( 'doc-category', $this->parent_term->term_id );
		$this->term_tree = $tree->build_taxonomy_tree();

	}

	/**
	 * Get the child pages of a single term ID.
	 *
	 * @return array An array of docs, each represented as an array with 'id', 'title', and 'children' keys.
	 */
	public function get_child_pages( $term_id ) {
		$docs = array();

		// Retrieve the pages under the parent term.
		$parent_term_pages = get_posts( array(
			'post_type' => 'doc',
			'tax_query' => array(
				array(
					'taxonomy' => 'doc-category',
					'field'    => 'term_id',
					'terms'    => $term_id,
				),
			),
			'orderby'  => 'menu_order',
			'order'    => 'ASC',
		) );

		// Loop over the pages and condense the posts into an array.
		foreach ( $parent_term_pages as $page ) {
			$docs[] = array(
				'id'      => $page->ID,
				'title'   => $page->post_title,
				'children' => array(),
			);
		}

		return $docs;
	}

	public function menuRender() {

		require_once( SABER_DOCS_PATH . '/templates/menu.php' );

	}

}
