
<div class="address mvn">
  <p class="big mbn"><strong><?php print $name; ?></strong></p>
  <p class="mvn"><?php print $street_line_1; ?>

  <?php if (isset($street_line_2)) : ?>
    <br /><?php print $street_line_2; ?>
  <?php endif; ?>

  <br /><?php print $postale_code; ?> <?php print $locality; ?></p>
  <p class="mts mbn"><?php print t('Email'); ?>&nbsp;: <span><a href="mailto:<?php print $email; ?>"><?php print $email; ?></a></span></p>

  <?php if (isset($phone)) : ?>
    <p class="mvn"><?php print t('Phone'); ?>&nbsp;: <span><?php print $phone; ?></span></p>
  <?php endif; ?>

  <?php if (isset($fax)) : ?>
    <p class="mvn"><?php print t('Fax'); ?>&nbsp;: <span><?php print $fax; ?></span></p>
  <?php endif; ?>
</div>
