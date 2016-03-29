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
function address_token_info() {
  $types['sitecustom'] = array(
    'name' => t('%name Tokens', array ('%name' => variable_get('site_name'))),
    'description' => t('Tokens. <a href="/admin/config/system/site-information">Link configuration</a>.'),
  );

  $custom_token['address'] = array(
    'name' => t('Street line 1 + Street line 2'),
    'description' => t('Address line 1'),
  );
  $custom_token['address1'] = array(
    'name' => t('Street line 1'),
    'description' => t('Address line 1'),
  );
  $custom_token['address2'] = array(
    'name' => t('Street line 2'),
    'description' => t('Address line 2'),
  );
  $custom_token['postal_code'] = array(
    'name' => t('Postal Code'),
    'description' => t('Postal code'),
  );
  $custom_token['locality'] = array(
    'name' => t('Locality'),
    'description' => t('Locality'),
  );
  $custom_token['phone'] = array(
    'name' => t('Phone'),
    'description' => t('Phone'),
  );
  $custom_token['fax'] = array(
    'name' => t('Fax'),
    'description' => t('Fax'),
  );

  return array(
    'types' => $types,
    'tokens' => array(
      'sitecustom' => $custom_token,
    ),
  );
}

/**
 * Implements hook_tokens().
 */
function address_tokens($type, $tokens, array $data = array(), array $options = array()) {

  $replacements = array();

  $prefix = 'sitecustom';

  if ($type == 'sitecustom') {
    foreach ($tokens as $name => $original) {
      switch ($name) {
        case 'address':
          $arr[] = variable_get($prefix . '_street_line_1', NULL);
          $arr[] = variable_get($prefix . '_street_line_2', NULL);
          $replacements[$original] = implode(', ', $arr);
        break;
        case 'address1':
          $replacements[$original] = variable_get($prefix . '_street_line_1');
        break;
        case 'address2':
          $replacements[$original] = variable_get($prefix . '_street_line_2');
        break;
        case 'postal_code':
          $replacements[$original] = variable_get($prefix . '_postale_code');
        break;
        case 'locality':
          $replacements[$original] = variable_get($prefix . '_locality');
        break;
        case 'email':
          $replacements[$original] = variable_get($prefix . '_email');
        break;
        case 'phone':
          $replacements[$original] = variable_get($prefix . '_phone1');
        break;
        case 'fax':
          $replacements[$original] = variable_get($prefix . '_fax1');
        break;
      }
    }
  }

  return $replacements;
}
