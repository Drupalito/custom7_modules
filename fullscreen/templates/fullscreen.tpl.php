
<?php if (!empty($video)): ?>
  <video class="fullscreen-video" poster="<?php print $video_poster; ?>" playsinline autoplay muted>
    <source src="<?php print $video; ?>" type="video/mp4">
  </video>
  <button id="video-playpause" class="video-playpause play">
    <svg width="100%" height="100%" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <defs>
        <path id="ytp-12" d="M 11 10 L 17 10 L 17 26 L 11 26 M 20 10 L 26 10 L 26 26 L 20 26">
          <animate id="animation" begin="indefinite" attributeType="XML" attributeName="d" fill="freeze" from="M11,10 L17,10 17,26 11,26 M20,10 L26,10 26,26 20,26" to="M11,10 L18,13.74 18,22.28 11,26 M18,13.74 L26,18 26,18 18,22.28" dur="0.1s" keySplines=".4 0 1 1" repeatCount="1"></animate>
        </path>
      </defs>
      <use xlink:href="#ytp-12" class="ytp-svg-shadow"></use>
      <use xlink:href="#ytp-12" class="ytp-svg-fill"></use>
    </svg>
  </button>
<?php else: ?>
  <?php print $image; ?>
<?php endif; ?>
<?php if (!empty($title) || !empty($excerpt) || !empty(trim(render($cta)))): ?>
<div id="fullscreen-block" class="fullscreen__table">
  <div class="fullscreen__inner">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-7 col-md-push-1">
          <div class="fullscreen__content">
            <?php if (!empty($title)): ?>
              <p class="fullscreen__title"><?php print $title; ?></p>
            <?php endif; ?>
            <?php if (!empty($excerpt)): ?>
              <div class="mt-4 clearfix">
                <p class="fullscreen__description"><?php print $excerpt; ?></p>
              </div>
            <?php endif; ?>
            <?php if (!empty(trim(render($cta)))): ?>
              <div class="fullscreen__calltoaction mt-4">
                <?php print render($cta); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
