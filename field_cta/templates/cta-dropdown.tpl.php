
<div class="btn-dropdown">
  <?php if (!empty($items['cta_link_items']) && is_array($items['cta_link_items'])): ?>
    <button class="btn-dropdown__button btn btn--default btn--fold"><span><?php print t('Choose your language'); ?></span></button>
    <div class="btn-dropdown__content">
      <ul class="btn-dropdown__list list-none">
        <?php foreach ($items['cta_link_items'] as $key => $value): ?>

          <?php
          $link_file_download = '';
          $link_file_size = '';
          $link_file_mime = '';
          if (!empty($value['cta_link_pdf'])) {
            $file = file_load($value['cta_link_pdf']);
            $link_file_size = format_size($file->filesize);
            $link_file_mime = ($file->filemime);
            $link_file_download = file_create_url($file->uri);
          }
          if (!empty($value['cta_link_url']) && strpos($value['cta_link_url'], "node/") !== FALSE) {
            $link_url = drupal_lookup_path('alias', $value['cta_link_url']);
          }
          else {
            if (!empty($value['cta_link_url']) && preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $value['cta_link_url'], $matches)) {

              $link_url = $matches[1];
              $link_video = TRUE;
            }
            else {
              $link_url = '#';
              $link_video = FALSE;
            }
          }
          ?>
          <li class="btn-dropdown__item">
          <?php if (!empty($value['cta_link_onlypdf'])): ?>
            <a href="<?php print $link_file_download; ?>" rel="external" title="<?php print $value['cta_link_label']; ?> (<?php print $link_file_mime; ?> - <?php print $link_file_size; ?>) (<?php print t('Open in new window'); ?>)"><span><?php print $value['cta_link_label']; ?><br/><small><?php print $link_file_mime; ?> - <?php print $link_file_size; ?></small></span></a>
          <?php else: ?>
            <?php if ($link_video): ?>
              <a href="#" data-ytid="<?php print $link_url; ?>" data-target="#myModal" data-provider="modal-video"><span><?php print $value['cta_link_label']; ?></span></a>
            <?php else: ?>
              <?php if (!empty($value['cta_link_label']) && !empty($value['cta_link_url'])): ?>
                <a href="<?php print $value['cta_link_url']; ?>"<?php if (!empty($value['cta_link_target'])): ?> rel="external"<?php endif; ?>><span><?php print $value['cta_link_label']; ?></span></a>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php else: ?>
    <p><?php print t('No thing to download'); ?></p>
  <?php endif; ?>
</div>
