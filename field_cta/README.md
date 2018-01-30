
# Field_cta

Module Drupal qui permet l'ajout d'un bloc de champs.

Possiblité de plusieurs types de liens:

* node/NID ;
* URL ;
* Youtube URL ;
* PDF File.

## Affichage

Trois possibilités :

* Affichage du bouton simple ;
* Affichage du bouton en mode dropdown avec les URLS des autres langues traduites.
* Ajouter un paramètre à la fin de l'URL `video=<YOUTUBE_ID>`, exemple `video=mOpCL3ggpCQ`.
  La vidéo sera lancera dans une modal au chargement de la page.

## Forms

Pour utiliser `Calltoaction` dans un autre formulaire.

```php
$form['calltoaction'] = array(
  '#type' => 'field_cta_id',
  '#default_value' => array(
    'link_label'   => '',
    'link_onlypdf' => '',
    'link_target'  => '',
    'link_url'     => '',
    'link_pdf'     => '',
  ),
);
```

## Templates

Les templates `cta-button.tpl.php` et `cta-dropdown.tpl.php` peut être overrider via le theme. Pour ce faire, il faudra dupliquer les fichiers dans le dossier du theme, `MON_THEME/templates/field_cta/`.
