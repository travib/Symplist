<?php

/**
 * Comment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5925 2009-06-22 21:27:17Z jwage $
 */
class Comment extends PluginComment
{
  public function hasAuthenticatedUser()
  {
    return (string)$this['authenticated_user_id'] != '';
  }
  
  public function getCommenterName()
  {
    if($this->hasAuthenticatedUser())
    {
      return $this['AuthenticatedUser']->getUsername();
    }
    
    return $this->hasCommenter() ? $this->getCommenter() : 'Anonymous';
  }
  
  
  
  public function getCommenterLink()
  {
    if($this->hasAuthenticatedUser())
    {
      return $this['AuthenticatedUser']->getRoute();
    }
    if ($this->hasCommenter()) 
    {
      return $comment['Commenter']['website'];
    }
    return '';
  }
  
  
  public function setTableDefinition()
  {
    parent::setTableDefinition();
    $this->hasColumn('authenticated_user_id', 'integer', 4, array(
       'type' => 'integer',
       'length' => '4'
     ));
  }

  public function setUp()
  {
    parent::setUp();
    $this->hasOne('sfGuardUser as AuthenticatedUser', array(
      'local' => 'authenticated_user_id',
      'foreign' => 'id'));
  }
}