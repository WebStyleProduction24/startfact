jQuery(document).ready(function($) {

  realmodals_init();

  function realmodals_init() {

    var triggers = $('button[data-realmodal="open"]');
    if (triggers.length) {
      triggers.each(function() {
        var trigger = $(this);
        trigger.on('click', function() {
          realmodals_open(trigger.attr('data-realmodal-target'));
          return false;
        });
      });
    }

    var triggers = $('[data-realmodal="close"]');
    if (triggers.length) {
      triggers.on('click', function() {
        realmodals_close();
      });
    }

  }

  function realmodals_open(target_id) {

    var target  = $(target_id),
        content = target.find('.realmodal-window'),
        win     = $(window);

    if (target.length == 0 || content.length == 0) return false;

    // Закрыть открытое окно
    realmodals_close();

    // Отцентровать окно
    // realmodals_center(target_id);

    // Показать окно
    target.css('visibility', 'visible').animate({
      'opacity': 1
    }, 300, function() {
      $(this).addClass('opened');
    });

    // Закрыть по клику на подложку
    target.on('click', function(event) {
      if ($(event.target).hasClass('realmodal')) realmodals_close();
      return true;
    });

    // Закрыть по нажатию клавиши "Esc"
    win.on('keyup', function(event) {
      if (event.which === 27) realmodals_close();
    });

    win.on('resize', function() {
      // realmodals_center(target_id);
    });

  }

  /*function realmodals_center(target_id) {

    var win          = $(window),
        doc          = $(document),
        doc_width    = doc.width(),
        win_height   = win.height(),
        win_scroll_y = win.scrollTop(),
        target       = $(target_id),
        content      = target.find('.realmodal-window'),
        offset_top   = ((win_height - content.outerHeight()) / 2) + win_scroll_y,
        offset_left  = (doc_width - content.outerWidth()) / 2;

    // Растянуть подложку
    target.css({
      'width':  win.width(),
      'height': doc.height()
    });

    // Разместить окно по центру
    content.css({
      'top':  offset_top,
      'left': offset_left
    });

  }*/

  function realmodals_close() {
    var opened = $('.realmodal.opened');
    if (opened.length) {
      opened.animate({
        'opacity': 0
      }, 300, function() {
        $(this).css('visibility', 'hidden').removeClass('opened');
        $(window).unbind('keyup');
      });
    }
  }

});