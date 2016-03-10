
<div class="address" itemscope itemtype="http://schema.org/Organization" itemref="mOrga">
  <p><strong itemprop="name"><?php print $name; ?></strong></p>
  <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="streetAddress"><?php print $street_line_1; ?>
  <?php if (isset($street_line_2)) : ?>
    <br /><?php print $street_line_2; ?>
  <?php endif; ?></span>
  <br /><span itemprop="postalCode"><?php print $postale_code; ?></span> <span itemprop="addressLocality"><?php print $locality; ?></span></p>
  <p><?php print t('Email'); ?>&nbsp;: <span><a itemprop="email" href="mailto:<?php print $email; ?>"><?php print $email; ?></a></span></p>
  <?php if (isset($phone)) : ?>
    <p><?php print t('Phone'); ?>&nbsp;: <span itemprop="telephone"><?php print $phone; ?></span></p>
  <?php endif; ?>
  <?php if (isset($fax)) : ?>
    <p><?php print t('Fax'); ?>&nbsp;: <span itemprop="faxNumber"><?php print $fax; ?></span></p>
  <?php endif; ?>
</div>
