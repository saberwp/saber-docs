jQuery(document).ready(function($) {

	console.log('docs setup...')

  // Get all the child doc pages sections
  let docSections = $('.docs-section');

  // Hide all the sections except the first one
  docSections.not(':first').hide();

  // When a menu item is clicked
  $('.docs-menu a').click(function(e) {
      e.preventDefault();
      let target = $(this).attr('href');

      // Show the corresponding doc page section
      docSections.hide();
      $(target).show();
  });
});
