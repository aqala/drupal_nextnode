<?php

namespace Drupal\ihorizons_next_article\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Next article config entity.
 *
 * @ConfigEntityType(
 *   id = "next_article_config",
 *   label = @Translation("Next article config"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\ihorizons_next_article\NextArticleConfigListBuilder",
 *     "form" = {
 *       "add" = "Drupal\ihorizons_next_article\Form\NextArticleConfigForm",
 *       "edit" = "Drupal\ihorizons_next_article\Form\NextArticleConfigForm",
 *       "delete" = "Drupal\ihorizons_next_article\Form\NextArticleConfigDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\ihorizons_next_article\NextArticleConfigHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "next_article_config",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/next_article_config/{next_article_config}",
 *     "add-form" = "/admin/structure/next_article_config/add",
 *     "edit-form" = "/admin/structure/next_article_config/{next_article_config}/edit",
 *     "delete-form" = "/admin/structure/next_article_config/{next_article_config}/delete",
 *     "collection" = "/admin/structure/next_article_config"
 *   }
 * )
 */
class NextArticleConfig extends ConfigEntityBase implements NextArticleConfigInterface {

  /**
   * The Next article config ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Next article config label.
   *
   * @var string
   */
  protected $label;

  /**
   * List of nodes which must be leaded as next article on page load.
   *
   * @var $node_list
   */
  protected $node_list;

  /**
   * Sorting order of the next loaded nodes.
   *
   * @var $sort;
   */
  protected $sort_order;

  /**
   * Whether configuration is active or not.
   *
   * @var $published
   */
  protected $is_active;


  /**
   * {@inheritDoc}
   */
  public function getNodeList(): array {
    ksm($this->node_list);
    return explode(',', $this->node_list);
  }

  /**
   * {@inheritDoc}
   */
  public function getSortOrder() {
    return $this->sort_order;
  }

  /**
   * {@inheritDoc}
   */
  public function getIsActive(): bool {
    return $this->is_active ?? FALSE;
  }
}
