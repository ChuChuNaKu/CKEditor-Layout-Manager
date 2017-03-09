<?php

namespace Drupal\Tests\ckeditor_layout_manager\Unit;

use Drupal\ckeditor_layout_manager\Plugin\CKEditorPlugin\BaseWidget;
use Drupal\Tests\UnitTestCase;
use Drupal\editor\Entity\Editor;
use Drupal\ckeditor\CKEditorPluginBase;

/**
 * @group ckeditor_layout_manager
 */
class BaseWidgetTest extends UnitTestCase {

  /**
   * Tests ::getDependencies().
   */
  public function testGetDependencies() {
    // Arrange.
    $sut = $this->createBaseWidgetPlugin();
    $editor = $this->prophesize(Editor::class)->reveal();
    // Act.
    $actual = $sut->getDependencies($editor);
    // Assert.
    $this->assertSame([], $actual);
  }

  /**
   * Tests ::isInternal().
   */
  public function testIsInternal() {
    // Arrange.
    $sut = $this->createBaseWidgetPlugin();
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
    $sut = $this->createBaseWidgetPlugin();
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
    $sut = $this->createBaseWidgetPlugin();
    $editor = $this->prophesize(Editor::class)->reveal();
    $sut->setBasePath('/xyz/');
    // Act.
    $actual = $sut->getFile();
    // Assert.
    $this->assertSame('/xyz/libraries/ckeditor-basewidget/plugin.js', $actual);
  }

  /*
   * Tests ::getConfig().
   */
  public function testGetConfig() {
    // Arrange.
    $sut = $this->createBaseWidgetPlugin();
    $editor = $this->prophesize(Editor::class)->reveal();
    // Act.
    $actual = $sut->getConfig($editor);
    // Assert.
    $this->assertArrayEquals([], $actual);
  }

  /**
   * @return \Drupal\ckeditor_layout_manager\Plugin\CKEditorPlugin\BaseWidget
   */
  protected function createBaseWidgetPlugin() {
    return new BaseWidget([], '', NULL);
  }

}