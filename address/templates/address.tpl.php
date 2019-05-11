
<div class="address" itemscope itemtype="http://schema.org/Organization" itemref="mOrga">
  <?php if (empty($options['hide_logo'])): ?><p class="address__logo"><img class="logo__image" src="/<?php print drupal_get_path('module', 'logo'); ?>/logo-white.png" alt=""></p><?php endif; ?>
  <?php if (empty($options['hide_sitename'])) : ?><p class="mt-0"><strong itemprop="name"><?php print $name; ?></strong></p><?php endif; ?>
  <?php if (empty($options['hide_address'])): ?>
    <?php if (!empty($street_line_1) || !empty($street_line_2) || !empty($postale_code) || !empty($locality)) : ?>
      <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"<?php if (empty($options['hide_sitename'])) : ?> class="mt-0"<?php endif; ?>><span itemprop="streetAddress"><?php print $street_line_1; ?>
      <?php if (!empty($street_line_2)) : ?>
        <br /><?php print $street_line_2; ?>
      <?php endif; ?></span>
      <br /><span itemprop="postalCode"><?php print $postale_code; ?></span> <span itemprop="addressLocality"><?php print $locality; ?></span></p>
    <?php endif; ?>
  <?php endif; ?>
  <?php if (empty($options['hide_phone1']) && isset($phone)) : ?>
    <p class="mt-0"><span class="a11y"><?php print t('Phone'); ?>&nbsp;:</span> <a href="tel:<?php print $phone_link; ?>" itemprop="telephone"><?php print $phone; ?></a></p>
  <?php endif; ?>
  <?php if (empty($options['hide_email'])) : ?>
  <p class="mt-0"><span class="a11y"><?php print t('Email'); ?>&nbsp;:</span> <a itemprop="email" href="mailto:<?php print $email; ?>"><?php print $email; ?></a></p>
  <?php endif; ?>
  <?php if (isset($fax)) : ?>
    <p class="mt-0"><?php print t('Fax'); ?>&nbsp;: <span itemprop="faxNumber"><?php print $fax; ?></span></p>
  <?php endif; ?>
  <?php if (empty($options['hide_networks'])) : ?>
  <?php endif; ?>
</div>
