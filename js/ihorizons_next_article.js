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

      $('.ihorizons-scroll .content').infiniteScroll({
        path: function () {
          return drupalSettings.ihorizons_next_article.infiniteScroll.next_articles[this.loadCount];
        },
        append: '.content .node'
      });
    }
  };

})(jQuery, Drupal, drupalSettings);
