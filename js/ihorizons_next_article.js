/**
 * @file
 * Defines Javascript behaviors for the ihorizons_next_article module.
 */

(function ($, Drupal, drupalSettings) {

  'use strict';

  /**
   * Behaviors for ihorizons_next_article module.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches ihorizons_next_article behavior.
   */
  Drupal.behaviors.ihorizons_next_article = {
    attach: function (context) {
      // Module code start.
      var wrapper_class = '.' + drupalSettings.ihorizons_next_article.infiniteScroll.wrapper_class; 
      
      $(wrapper_class + ' .content').infiniteScroll({
        path: function () {
          return drupalSettings.ihorizons_next_article.infiniteScroll.next_articles[this.loadCount];
        },
        append: '.region-content'
      });
    }
  };

})(jQuery, Drupal, drupalSettings);
