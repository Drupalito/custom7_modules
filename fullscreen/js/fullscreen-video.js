
(function ($, window, Drupal) {
  Drupal.behaviors.fullscreen = {
    attach: function (context, settings) {

      var lfplmVideo = document.querySelector('video');

      var flip = true,
          pause = "M11,10 L18,13.74 18,22.28 11,26 M18,13.74 L26,18 26,18 18,22.28",
          play = "M11,10 L17,10 17,26 11,26 M20,10 L26,10 26,26 20,26",
          $animation = $('#animation');

      var $videoPausePlay = $('#video-playpause');

      $('#video-playpause').on('click', function(e) {
        flip = !flip;
        $animation.attr({
          "from": flip ? pause : play,
          "to": flip ? play : pause
        }).get(0).beginElement();

        if (lfplmVideo.paused) {
          lfplmVideo.play();
          $videoPausePlay.addClass('play');
        }
        else {
          lfplmVideo.pause();
          $videoPausePlay.removeClass('play');
        }

      });

      lfplmVideo.onended = function () {
        var $videoPausePlay = $('#video-playpause');
        $videoPausePlay.addClass('play');

        flip = !flip;
        $animation.attr({
          "from": flip ? pause : play,
          "to": flip ? play : pause
        }).get(0).beginElement();
      }

    }
  };
})(jQuery, window, Drupal);
