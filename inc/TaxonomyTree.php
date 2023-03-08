<?php

namespace SaberDocs;

/**
 * Class to build a taxonomy tree.
 */
class TaxonomyTree {

	/**
	 * The taxonomy name.
	 *
	 * @var string
	 */
	private $taxonomy;

	/**
	 * The term id to start the tree from.
	 *
	 * @var int
	 */
	private $start_from;

	/**
	 * The resulting tree.
	 *
	 * @var array
	 */
	public $tree = array();

	/**
	 * TaxonomyTree constructor.
	 *
	 * @param string $taxonomy   The taxonomy name.
	 * @param int    $start_from The term id to start the tree from.
	 */
	public function __construct( $taxonomy, $start_from = 0 ) {
		$this->taxonomy = $taxonomy;
		$this->start_from = $start_from;
	}

	/**
	 * Build the taxonomy tree.
	 *
	 * @return array The resulting tree.
	 */
	public function build_taxonomy_tree( $term_id = 0 ) {

		if( ! $term_id ) {
			$term_id = $this->start_from;
		}

		$terms = get_terms( array(
			'taxonomy'   => $this->taxonomy,
			'hide_empty' => false,
			'parent'     => $term_id,
		) );

		if ( empty( $terms ) ) {
			return false;
		}

		$tree = array();
		foreach ( $terms as $term ) {
			$tree[] = array(
				'id'       => $term->term_id,
				'name'     => $term->name,
				'children' => $this->build_taxonomy_tree( $term->term_id ),
			);
		}

		return $tree;
	}
}
