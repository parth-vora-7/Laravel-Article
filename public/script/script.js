$('.article-container').isotope({
  itemSelector: '.article',
  layoutMode: 'packery',
  percentPosition: true,
});

$(document).ready(function() {
  $('button.btn-delete').on('click', function () {
    var delete_url = APP_URL + '/articles/' + $(this).data('id');
    $('#myModal form').attr('action', delete_url);
  });
});
