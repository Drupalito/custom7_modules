<?php

/**
 * @file
 * Page configurations
 *
 * @ingroup socialworks
 */

/**
 * CALLBACK
 * Page callback : settings
 */
function socialworks_form($form, &$form_state) {

  $options = array(
    'facebook'    => 'Facebook',
    'linkedin'    => 'Linkedin',
    'twitter'     => 'Twitter',
    'instagram'   => 'Instagram',
    'youtube'     => 'Youtube',
  );

  $options_default = array(
    'facebook'    => '',
    'linkedin'    => 'https://www.linkedin.com/company/limpida',
    'twitter'     => 'https://twitter.com/limpida_',
    'instagram'   => '',
    'youtube'     => '',
  );

  $list_content_types = node_type_get_types();

  $form['socialworks_language_chosse'] = array(
    '#type'     => 'checkbox',
    '#title'    => t('Include block switch language'),
    '#default_value' => variable_get('socialworks_language_chosse', FALSE),
  );

  $form['socialworks_email'] = array(
    '#type'     => 'checkbox',
    '#title'    => t('Include email icon'),
    '#default_value' => variable_get('socialworks_email', FALSE),
  );

  $form['init'] = array(
    '#type' => 'fieldset',
    '#title' => t('Activated profile'),
  );

  $form['init']['socialworks_providers'] = array(
    '#type'     => 'checkboxes',
    '#title'    => t('Select social profils'),
    '#options'  => $options,
    '#default_value' => variable_get('socialworks_providers', array()),
  );

  $form['url'] = array(
    '#type' => 'fieldset',
    '#title' => t('URL Profile'),
  );

  foreach ($options as $key => $value) {
    $form['url']['socialworks_' . $key] = array(
      '#type' => 'textfield',
      '#title' => $value,
      '#default_value' => variable_get('socialworks_' . $key, $options_default[$key]),
    );
  }

  return system_settings_form($form);
}
