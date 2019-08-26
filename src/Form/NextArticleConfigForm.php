<?php

namespace Drupal\ihorizons_next_article\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class NextArticleConfigForm.
 */
class NextArticleConfigForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $next_article_config = $this->entity;
    //ksm($next_article_config);
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $next_article_config->label(),
      '#description' => $this->t("Label for the Next article config."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $next_article_config->id(),
      '#machine_name' => [
        'exists' => '\Drupal\ihorizons_next_article\Entity\NextArticleConfig::load',
      ],
      '#disabled' => !$next_article_config->isNew(),
    ];

    $form['sort_order'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Sort'),
      '#default_value' => $next_article_config->getSortOrder(),
      '#required' => TRUE,
    ];
    ksm($next_article_config->getNodeList());
    $form['node_list'] = [
      '#type' => 'entity_autocomplete',
      '#target_type' => 'node',
      '#title' => $this->t('Node List'),
      '#required' => true,
    ];

    $form['is_active'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Is Active'),
      '#default_value' => $next_article_config->getIsActive(),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $next_article_config = $this->entity;
    $status = $next_article_config->save();
    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Next article config.', [
          '%label' => $next_article_config->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Next article config.', [
          '%label' => $next_article_config->label(),
        ]));
    }
    $form_state->setRedirectUrl($next_article_config->toUrl('collection'));
  }

}
