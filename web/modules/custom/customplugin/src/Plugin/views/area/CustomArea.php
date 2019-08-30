<?php
/**
 * @file
 * Contains \Drupal\customplugin\Plugin\views\area\MyCustomSiteArea.
 */
namespace Drupal\customplugin\Plugin\views\area;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\views\Plugin\views\area\AreaPluginBase;
/**
 * Views area CustomArea handler.
 *
 * @ingroup views_area_handlers
 *
 * @ViewsArea("custom_area")
 */
class CustomArea extends AreaPluginBase {
  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    return $options;
  }
  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }
  /**
   * {@inheritdoc}
   */
  public function render($empty = FALSE) {
    // We check i f the views result are empty, or if the settings of this area 
    // force showing this area even if the view is empty.
    if (!$empty || !empty($this->options['empty'])) {
      $output = array();
      $output['text'] = [
        '#type' => 'processed_text',
        '#text' => '<p>' . $this->t('My custom site hardcoded text') . '</p>',
        '#format' => 'full_html',
      ];
      // My awesome return link to frontpage with custom classes.
      $output['link'] = [
        '#title' => $this->t('< Back to the front'),
        '#type' => 'link',
        '#url' => Url::fromRoute('<front>'),
        '#attributes' => [
          'class' => ['button', 'secondary']
        ]
      ];
      
      return $output;
    }
    return array();
  }

}