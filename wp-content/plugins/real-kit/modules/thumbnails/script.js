jQuery(document).ready(function($) {

  var realkit_upload_thumb_button = $('.realkit_upload_thumb_button');
  if (realkit_upload_thumb_button.length) {
    realkit_upload_thumb_button.on('click', function(event) {

      var button = $(this), frame;

      event.preventDefault();

      if (frame) { frame.open(); return; }

      frame = wp.media();
      frame.on('select', function() {
        var attachment = frame.state().get('selection').first();
        frame.close();
        var parent = button.parent().prev();
        if (parent.children().hasClass('tax_list')) {
          parent.children().val(attachment.attributes.url);
          parent.prev().children().attr('src', attachment.attributes.url);
        }
        else {
          $('#taxonomy_thumb').val(attachment.attributes.url);
        }
      });

      frame.open();

    });
  }

  $('.realkit_remove_thumb_button').on('click', function() {
    var button = $(this),
        thumb  = button.parent().siblings('.title').children('img');
    if (thumb.length) thumb.remove();
    $('#taxonomy_thumb').val('');
    $('.inline-edit-col input[name="taxonomy_thumb"]').val('');
    return false;
  });

  $('.editinline').on('click', function() {
    var parent = $(this).closest('tr'),
        id     = parent.attr('id').replace('tag-', ''),
        src    = parent.find('img.taxonomy-thumb').attr('src');
    setTimeout(function() {
      $('#edit-' + id + ' input[name="taxonomy_thumb"]').val(src);
    }, 100);
  });

});