<?php

/**
 * ImageAttachment filter form base class.
 *
 * @package    plugintracker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseImageAttachmentFormFilter extends AttachmentFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('image_attachment_filters[%s]');
  }

  public function getModelName()
  {
    return 'ImageAttachment';
  }
}
