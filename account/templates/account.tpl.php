
<div class="account">
  <p class="account__description my-0">
    <?php if (isset($profil)) : ?>
      <span class="account__nickname"><?php print $profil; ?></span>
      (<?php print $logout; ?>)
    <?php else: ?>
      <span class="account__nickname"><?php print $anonymous; ?></span>
    <?php endif; ?>
  </p>
</div>
