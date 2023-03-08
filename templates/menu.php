<?php

/*
echo '<pre>';
var_dump($this);
echo '</pre>';
*/

?>

<div class="docs-menu">
	<ul>

		<!-- Doc parent term. -->
		<li class="font-semibold"><div class="block py-2 text-gray-800">
			<a href="#<?php echo $this->index_page_id; ?>" class="block py-2 text-gray-800 hover:text-indigo-600 transition-colors duration-200">
				<?php echo $this->doc_title; ?>
			</a>
		</li>

		<?php
			// Top level of term tree.
			foreach ( $this->term_tree as $term ) {
				echo '<li class="font-semibold"><div class="block py-2 text-gray-800">' . $term['name'] . '</div></li>';

				// Pages under top level term tree.
				$pages = $this->get_child_pages( $term['id'] );
				foreach( $pages as $page ) {
					echo '<ul class="ml-4">';
					echo '<li class="text-sm font-medium">';
					echo '<a href="#' . $page['id'] . '" class="block py-2 text-gray-800 hover:text-indigo-600 transition-colors duration-200">' . $page['title'] . '</a>';
					echo '</li>';
					echo '</ul>';
				}

			}
		?>

	</ul>
</div>
