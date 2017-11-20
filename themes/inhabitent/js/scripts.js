jQuery( document ).ready(function($) {
  $('.fa-search').on('click', function() {
    $('.search-form').toggle();
    $( '.search-field' ).focus();
  });

  $('.search-field').on('blur', function() {
    $('.search-form').toggle();
  });
});