<?php

namespace Drupal\ckeditor_layout_manager\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginInterface;
use Drupal\Core\Plugin\PluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines a "BaseWidget" plugin, a dependency of the LayoutManager plugin.
 *
 * @CKEditorPlugin(
 *   id = "basewidget",
 *   label = @Translation("BaseWidget Plugin")
 * )
 */
class BaseWidget extends PluginBase implements CKEditorPluginInterface {
  /**
   * {@inheritdoc}
   */
  public function isInternal() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(Editor $editor) {
    return [];
  }

  /**
   * Implements \Drupal\ckeditor\Plugin\CKEditorPluginInterface::getFile().
   */
  public function getFile() {
    return $this->getBasePath() . 'libraries/ckeditor-basewidget/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
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
  public function getBasePath() {
    return $this->basePath ?: base_path();
  }

}
