<?php
$link_file_download = '';
$link_file_size = '';
$link_file_mime = '';
if (!empty($items['cta_link_pdf'])) {
  $file = file_load($items['cta_link_pdf']);
  $link_file_size = format_size($file->filesize);
  $link_file_mime = ($file->filemime);
  $link_file_download = file_create_url($file->uri);
}
if (!empty($items['cta_link_url']) && strpos($items['cta_link_url'], "node/") !== FALSE) {
  $link_url = drupal_lookup_path('alias', $items['cta_link_url']);
}
else {
  if (!empty($items['cta_link_url']) && preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $items['cta_link_url'], $matches)) {

    $link_url = $matches[1];
    $link_video = TRUE;
  }
  else {
    $link_url = '#';
    $link_video = FALSE;
  }
}
?>
<?php if (!empty($items['cta_link_onlypdf'])): ?>
  <a class="btn btn--default btn--fold" href="<?php print $link_file_download; ?>" rel="external" title="<?php print $items['cta_link_label']; ?> (<?php print $link_file_mime; ?> - <?php print $link_file_size; ?>) (<?php print t('Open in new window'); ?>)"><span><?php print $items['cta_link_label']; ?><br/><small><?php print $link_file_mime; ?> - <?php print $link_file_size; ?></small></span></a>
<?php else: ?>
  <?php if ($link_video): ?>
    <button class="btn btn--default btn--fold" data-ytid="<?php print $link_url; ?>" data-target="#myModal" data-provider="modal-video"><span><span class="fa fa-play-circle-o" aria-hidden="true"></span> <?php print $items['cta_link_label']; ?></span></button>
  <?php else: ?>
    <?php if (!empty($items['cta_link_label']) && !empty($items['cta_link_url'])): ?>
      <a class="btn btn--default btn--fold" href="<?php print $items['cta_link_url']; ?>"<?php if (!empty($items['cta_link_target'])): ?> rel="external"<?php endif; ?>><span><?php print $items['cta_link_label']; ?></span></a>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>
