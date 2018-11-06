
(function ($, window, Drupal) {
  Drupal.behaviors.scrolltotop = {
    attach: function (context, settings) {
      $('body').append('<button id="scrollToTop" class="scrollToTop scroll noprint"><span aria-hidden="true" class="fa ' + settings.scrolltotop.icon + '"></span><span class="a11y">' + settings.scrolltotop.label + '</span></button>');
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
