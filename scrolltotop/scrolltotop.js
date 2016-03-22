
(function ($, window, Drupal) {
  Drupal.behaviors.scrolltotop = {
    attach: function (context, settings) {
      $('body').append('<a href="#" id="scrollToTop" class="scrollToTop"><span aria-hidden="true" class="i i-' + settings.scrolltotop.icon + '"></span><span class="hide">' + settings.scrolltotop.label + '</span></a>');
      var $scrolltoTop = $('#scrollToTop');
      $(window).scroll(function() {
        ($(this).scrollTop() > settings.scrolltotop.offset) ? $scrolltoTop.addClass('scrollToTop-visible') : $scrolltoTop.removeClass('scrollToTop-visible');
        if (Drupal.smoothScroll) {
          Drupal.smoothScroll('#scrollToTop');
        }
      });
    }
  };
})(jQuery, window, Drupal);
