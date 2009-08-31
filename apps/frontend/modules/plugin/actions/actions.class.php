<?php

/**
 * plugin actions.
 *
 * @package    plugintracker
 * @subpackage plugin
 */
class pluginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->plugins = Doctrine::getTable("SymfonyPlugin")->createQuery()->orderBy('title ASC')->execute();
  }
  
  public function executeList(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('SymfonyPlugin', 10);

    $q = Doctrine::getTable("SymfonyPlugin")->createQuery()->orderBy('title ASC');
                
    $this->pager->setQuery($q);

    $this->pager->setPage($request->getParameter('page', 1));
    
    $this->pager->init();    
  }
  
  public function executeRegister(sfWebRequest $request)
  {
    $this->form = new SymfonyPluginForm();
    if ($user = $this->getUser()->getGuardUser()) 
    {
      $this->form->setDefault('user_id', $user['id']);
    }
    if ($request->isMethod('POST')) 
    {
      $this->form->bind($request->getParameter('symfony_plugin'));
      if ($this->form->isValid()) 
      {
        $this->form->save();
        $this->redirect('@plugin?title='.$this->form->getValue('title'));
      }
    }
  }
  
  public function executeRate(sfWebRequest $request)
  {
    $this->plugin = Doctrine::getTable('SymfonyPlugin')->findOneByTitle($request->getParameter('title'));
    $this->forward404Unless($this->plugin);
    $this->plugin->addRating($request->getParameter('rating'), $this->getUser());
    $this->plugin->refresh();
    return $this->renderPartial('plugin/rating_info', array('plugin' => $this->plugin));
  }
  
  public function executeClaim(sfWebRequest $request)
  {
    $this->plugin = Doctrine::getTable('SymfonyPlugin')->findOneByTitle($request->getParameter('title'));
    $this->forward404Unless($this->plugin);
    
    if (!$this->user = $this->getUser()->getGuardUser()) 
    {
      $this->getUser()->setFlash('notice', 'You must sign in first before accessing this function');
      $this->redirect('@signin');
    }
    
    // Register the Plugin
    if ($request->isMethod('POST')) 
    {
      $this->plugin['User'] = $this->user;
      $this->plugin->save();
      return 'Confirm';
    }
  }
  
  public function executeByCategory(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('SymfonyPlugin', 10);
    $this->category = Doctrine::getTable('PluginCategory')->findOneBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->category);

    $q = Doctrine::getTable("SymfonyPlugin")->createQuery()
                ->where('category_id = ?', $this->category['id'])
                ->orderBy('title ASC');
                
    $this->pager->setQuery($q);

    $this->pager->setPage($request->getParameter('page', 1));
    
    $this->pager->init();
  }
  
  public function executeCategories(sfWebRequest $request)
  {
    $this->categories = Doctrine::getTable('PluginCategory')->createQuery('c')->orderBy('name ASC')->execute();
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->plugin = Doctrine::getTable("SymfonyPlugin")->findOneByTitle($request->getParameter('title'));
    $this->forward404Unless($this->plugin);
  }
}
