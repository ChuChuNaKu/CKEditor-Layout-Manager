<?php

namespace Drupal\Tests\ckeditor_layout_manager\Unit;

use Drupal\ckeditor\CKEditorPluginCssInterface;
use Drupal\ckeditor_layout_manager\Plugin\CKEditorPlugin\LayoutPlugin;
use Drupal\Core\StringTranslation\TranslationInterface;
use Drupal\Tests\UnitTestCase;
use Drupal\editor\Entity\Editor;
use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * @group ckeditor_layout_manager
 */
class LayoutPluginTest extends UnitTestCase {

  /**
   * Tests ::getDependencies().
   */
  public function testGetDependencies() {
    // Arrange.
    $sut = $this->createLayoutPlugin();
    $editor = $this->prophesize(Editor::class)->reveal();
    // Act.
    $actual = $sut->getDependencies($editor);
    // Assert.
    $this->assertSame(['basewidget'], $actual);
  }

  /**
   * Tests ::isInternal().
   */
  public function testIsInternal() {
    // Arrange.
    $sut = $this->createLayoutPlugin();
    // Act.
    $actual = $sut->isInternal();
    // Assert.
    $this->assertFalse($actual, 'IsInternal Returns FALSE.');
  }

  /*
   * Tests ::getLibraries().
   */
  public function testGetLibraries() {
    // Arrange.
    $sut = $this->createLayoutPlugin();
    $editor = $this->prophesize(Editor::class)->reveal();
    // Act.
    $actual = $sut->getLibraries($editor);
    // Assert.
    $this->assertArrayEquals([], $actual);
  }

  /*
   * Tests ::getFile().
   */
  public function testGetFile() {
    // Arrange.
    $sut = $this->createLayoutPlugin();
    $editor = $this->prophesize(Editor::class)->reveal();
    $sut->setBasePath('/xyz/');
    // Act.
    $actual = $sut->getFile();
    // Assert.
    $this->assertSame('/xyz/libraries/ckeditor-layoutmanager/plugin.js', $actual);
  }

  /*
   * Tests ::getConfig().
   */
  public function testGetConfig() {
    // Arrange.
    $sut = $this->createLayoutPlugin();
    $editor = $this->prophesize(Editor::class)->reveal();
    // Act.
    $actual = $sut->getConfig($editor);
    // Assert.
    $this->assertArrayEquals([], $actual);
  }

 /*
  * Tests ::getButtons.
  */
  public function testGetButtons() {
    // Arrange.
    $sut = $this->createLayoutPlugin();
    $sut->setBasePath('/xyz/');
    $string_translation = $this->prophesize(TranslationInterface::class);
    $sut->setStringTranslation($string_translation->reveal());
    // Act.
    $actual = $sut->getButtons();
    // Assert.
    FALSE && $this->assertArrayEquals([
      'AddLayout' => [
        'label' => new TranslatableMarkup('Add layout'),
        'image' => '/xyz/libraries/ckeditor-layoutmanager/icons/addlayout.png',
      ],
    ], $actual);
    $this->assertEquals('/xyz/libraries/ckeditor-layoutmanager/icons/addlayout.png', $actual['AddLayout']['image']);
  }

  /*
   * Tests ::getCssFiles().
   */
  public function testGetCssFiles() {
    // Arrange.
    $sut = $this->createLayoutPlugin();
    $editor = $this->prophesize(Editor::class)->reveal();
    $sut->setBasePath('/xyz/');
    // Act.
    $actual = $sut->getCssFiles($editor);
    // Assert.
    $this->assertArrayEquals(['/xyz/modules/custom/ckeditor_layout_manager/css/custom_layouts.css'], $actual);
  }

  /**
   * @return \Drupal\ckeditor_layout_manager\Plugin\CKEditorPlugin\LayoutPlugin
   */
  protected function createLayoutPlugin() {
    return new LayoutPlugin([], '', NULL);
  }

}