<?php

get_header();

$doc = new \SaberDocs\Doc;
$doc->parse_terms();

?>

<div class="container mx-auto">
  <div class="flex">
    <div class="w-1/4 bg-gray-300 shrink-0 grow-0 p-4">
      <?php
        $doc->menuRender();
      ?>
    </div>
    <div class="w-3/4 p-4 shrink-0 grow-0">
      <div class="docs-content prose">

				<!-- Render the index page. -->
				<div id="<?php echo esc_attr( get_the_ID() ); ?>" class="docs-section">
					<h2 class="text-2xl font-medium mb-4"><?php the_title(); ?></h2>
					<?php echo get_the_content( null, false, get_the_ID() ); ?>
				</div>

				<!-- Render the pages under the taxonomy tree. -->
        <?php
					foreach ( $doc->term_tree as $term ) {
						$pages = $doc->get_child_pages( $term['id'] );
						foreach( $pages as $page ) {
				?>
          <div id="<?php echo esc_attr( $page['id'] ); ?>" class="docs-section">
            <h2 class="text-2xl font-medium mb-4"><?php echo $page['title']; ?></h2>
            <?php echo get_the_content( null, false, $page['id'] ); ?>
          </div>
        <?php } } ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
