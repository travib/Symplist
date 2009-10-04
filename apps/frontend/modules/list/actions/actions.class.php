<?php

/**
 * list actions.
 *
 * @package    plugintracker
 * @subpackage list
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class listActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->list = Doctrine::getTable('CommunityList')->findOneBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->list);
  }
}
