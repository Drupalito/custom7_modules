
<div class="address" itemscope itemtype="http://schema.org/Organization" itemref="mOrga">
  <?php if (empty($name_hidden)) : ?><p class="mtn"><strong itemprop="name"><?php print $name; ?></strong></p><?php endif; ?>
  <?php if (!empty($street_line_1) || !empty($street_line_2) || !empty($postale_code) || !empty($locality)) : ?>
    <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"<?php if (!empty($name_hidden)) : ?> class="mtn"<?php endif; ?>><span itemprop="streetAddress"><?php print $street_line_1; ?>
    <?php if (!empty($street_line_2)) : ?>
      <br /><?php print $street_line_2; ?>
    <?php endif; ?></span>
    <br /><span itemprop="postalCode"><?php print $postale_code; ?></span> <span itemprop="addressLocality"><?php print $locality; ?></span></p>
  <?php endif; ?>
  <p class="mtn"><?php print t('Email'); ?>&nbsp;: <span><a itemprop="email" href="mailto:<?php print $email; ?>"><?php print $email; ?></a></span></p>
  <?php if (isset($phone)) : ?>
    <p class="mtn"><?php print t('Phone'); ?>&nbsp;: <a href="tel:<?php print $phone_link; ?>" itemprop="telephone"><?php print $phone; ?></a></p>
  <?php endif; ?>
  <?php if (isset($fax)) : ?>
    <p class="mtn"><?php print t('Fax'); ?>&nbsp;: <span itemprop="faxNumber"><?php print $fax; ?></span></p>
  <?php endif; ?>
</div>
