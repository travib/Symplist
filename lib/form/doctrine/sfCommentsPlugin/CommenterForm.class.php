<?php

/**
 * Commenter form.
 *
 * @package    plugintracker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class CommenterForm extends PluginCommenterForm
{
  public function configure()
  {
    parent::configure();
    $this->widgetSchema['id'] = new sfWidgetFormInputHidden(array(),array('class' => 'hidden'));
  }
}
