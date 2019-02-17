<?php

/**
 * @file
 * View the owner's contact Token
 *
 * @ingroup address
 */

/**
 * Implements hook_token_info().
 *
 */
function socialworks_token_info() {
  $types['socialworks'] = array(
    'name' => t('%name Social Networks', array ('%name' => variable_get('site_name'))),
    'description' => t('Tokens Social Networks <a href="/admin/config/astarter/socialworks">Link configuration</a>.'),
  );

  $options = array(
    'facebook'    => 'Facebook',
    'linkedin'    => 'Linkedin',
    'twitter'     => 'Twitter',
    'instagram'   => 'Instagram',
    'youtube'     => 'Youtube',
  );

  foreach ($options as $key => $value) {
    $custom_token['socialworks_' . $key] = array(
      'name' => $value,
      'description' => $value,
    );
  }

  return array(
    'types' => $types,
    'tokens' => array(
      'socialworks' => $custom_token,
    ),
  );
}

/**
 * Implements hook_tokens().
 */
function socialworks_tokens($type, $tokens, array $data = array(), array $options = array()) {

  $replacements = array();

  $options = array(
    'facebook'    => 'Facebook',
    'linkedin'    => 'Linkedin',
    'twitter'     => 'Twitter',
    'instagram'   => 'Instagram',
    'youtube'     => 'Youtube',
  );

  if ($type == 'socialworks') {
    foreach ($tokens as $name => $original) {

      $type = explode('_', $name);
      if (isset($options[$type[1]])) {
        $replacements[$original] = variable_get('socialworks_' . str_replace('-', '_', $type[1]), NULL);
      }
    }
  }

  return $replacements;
}
