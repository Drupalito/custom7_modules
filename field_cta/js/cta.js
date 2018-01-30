
/**
 * @file
 * cta.js.
 *
 * Différentes fonctions nécessaire au fonctionnement
 * de la modal video Youtube.
 */

(function ($, window, Drupal) {
  Drupal.behaviors.cta = {
    attach: function (context, settings) {

      $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null) {
           return null;
        }
        else {
          return decodeURI(results[1]) || 0;
        }
      }

      /* This code loads the IFrame Player API code asynchronously. */
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/player_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player;

      window.onYouTubePlayerAPIReady = function () {
        player = new YT.Player('player', {
          videoId: '',
          width: '100%',
          playerVars: {
            autoplay: 1,        /* Auto-play the video on load */
            controls: 1,        /* Show pause/play buttons in player */
            showinfo: 0,        /* Hide the video title */
            modestbranding: 1,  /* Hide the Youtube Logo */
            loop: 0,            /* Run the video in a loop */
            fs: 1,              /* Hide the full screen button */
            rel: 0,
            cc_load_policy: 1,  /* Hide closed captions */
            iv_load_policy: 3,  /* Hide the Video Annotations */
            autohide: 1         /* Hide video controls when playing */
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      /* The API will call this function when the video player is ready. */
      function onPlayerReady(event) {
        event.target.playVideo();
        /* event.target.mute(); */
      }

      /* The API calls this function when the player's state changes. */
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          done = true;
        }
      }

      function stopVideo() {
        player.stopVideo();
      }

      function openModalPlayer(youtubeId) {
        $('#myModal').on('show.bs.modal', function (e) {
          player.loadVideoById({
            videoId: youtubeId
          });
        }).on('hide.bs.modal', function (e) {
          stopVideo();
        }).modal('show');
      }

      $('body').append('<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="wrapper-media"><div id="player"></div></div></div></div></div>');

      $('[data-provider="modal-video"]').on('click', function (e) {
        e.preventDefault();

        var $target = $(e.currentTarget),
            $modal  = $($target.data('target')),
            $ytid   = $target.data('ytid');

        openModalPlayer($ytid);
      });

      $(window).load(function() {
        var currentUrl = window.location.href;
        if (currentUrl.indexOf('?video=') != -1) {
          var $ytid = $.urlParam('video');
          openModalPlayer($ytid);
        }
      });

    }
  };
})(jQuery, window, Drupal);
