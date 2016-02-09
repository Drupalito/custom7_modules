<?php

/**
 * @file
 * User Login Form
 *
 * @ingroup userextend
 */
?>
<?php if (render($intro_text)): ?>
<p class="form-item form__intro"><?php print render($intro_text); ?></p>
<?php endif; ?>
<?php if (render($intro_required)): ?>
<p class="form-item form__description"><?php print render($intro_required); ?></p>
<?php endif; ?>
<?php print drupal_render_children($form); ?>
