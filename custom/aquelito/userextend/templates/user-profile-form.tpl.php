<?php

/**
 * @file
 * User Profil Edit Form
 *
 * @ingroup userextend
 */
?>
<?php if (render($intro_text)): ?>
<p class="form__intro"><?php print render($intro_text); ?></p>
<?php endif; ?>
<?php if (render($intro_required)): ?>
<p class="form__description"><?php print render($intro_required); ?></p>
<?php endif; ?>

<?php
  hide($form['body']);
  hide($form['locale']);
  hide($form['timezone']);

  hide($form['account']['current_pass']);
  hide($form['account']['pass']);
  hide($form['account']['pass2']);

  print render($form['field_civility']);
  print render($form['account']['mail']);
  print render($form['field_firstname']);
  print render($form['field_lastname']);
  print render($form['field_birthday']);

  print drupal_render_children($form);

  print render($form['form_build_id']);
  print render($form['form_id']);
  print render($form['form_token']);
?>
