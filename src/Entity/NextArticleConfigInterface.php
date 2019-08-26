<?php

namespace Drupal\ihorizons_next_article\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Next article config entities.
 */
interface NextArticleConfigInterface extends ConfigEntityInterface {

  /**
   * Return node list to load by infinite scroll.
   *
   * @return array
   */
  public function getNodeList() : array ;

  /**
   * Return order of next article which is going to load via infinite scroll.
   *
   * @return string
   */
  public function getSortOrder();

  /**
   * Return publish status whether configuration is active or not.
   *
   * @return bool
   */
  public function getIsActive() : bool ;

}
