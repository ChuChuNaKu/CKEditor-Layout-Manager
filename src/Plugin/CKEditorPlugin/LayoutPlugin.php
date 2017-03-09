<?php

namespace Drupal\ckeditor_layout_manager\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\ckeditor\CKEditorPluginCssInterface;
use Drupal\editor\Entity\Editor;

/**
 * Defines a "CKEditor" plugin, with a toolbar builder-enabled feature.
 *
 * @CKEditorPlugin(
 *   id = "layoutmanager",
 *   label = @Translation("Layout Plugin")
 * )
 */
class LayoutPlugin extends CKEditorPluginBase implements CKEditorPluginCssInterface {
  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return [
      'basewidget',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isInternal() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return $this->getBasePath() . 'libraries/ckeditor-layoutmanager/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [
      'AddLayout' => [
        'label' => $this->t('Add layout'),
        'image' => $this->getBasePath() . 'libraries/ckeditor-layoutmanager/icons/addlayout.png',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCssFiles(Editor $editor) {
    return [
//      drupal_get_path('module', 'ckeditor_layout_manager') . '/css/custom_layouts.css',
      $this->getBasePath() . 'modules/custom/ckeditor_layout_manager/css/custom_layouts.css',
    ];
  }

  protected $basePath;

  /**
   * @param string $base_path
   *
   * @internal
   */
  public function setBasePath($base_path) {
    $this->basePath = $base_path;
  }

  /**
   * @return mixed
   */
  protected function getBasePath() {
    return $this->basePath ?: base_path();
  }

}
