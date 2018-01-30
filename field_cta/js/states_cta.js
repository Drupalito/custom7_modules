
/**
 * @file
 * states_cta.js.
 *
 * Ajoute un état pour la validation des
 * formulaires via l'API Forms States de Drupal.
 */

Drupal.behaviors.statesModification = {
  weight: -10,
  attach: function(context, settings) {
    if (Drupal.states) {
      Drupal.states.Dependent.comparisons.Object = function(reference, value) {
        if ('regex' in reference) {
          return (new RegExp(reference.regex, reference.flags)).test(value);
        }
        else {
          return reference.indexOf(value) !== false;
        }
      }
    }
  }
};
