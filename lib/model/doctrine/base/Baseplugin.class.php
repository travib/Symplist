<?php

/**
 * BasePlugin
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property clob $description
 * @property integer $author_id
 * @property integer $category_id
 * @property PluginAuthor $User
 * @property PluginCategory $Category
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5925 2009-06-22 21:27:17Z jwage $
 */
abstract class BasePlugin extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('plugin');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('description', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('author_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('PluginAuthor as User', array(
             'local' => 'author_id',
             'foreign' => 'id'));

        $this->hasOne('PluginCategory as Category', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $sluggable0 = new Doctrine_Template_Sluggable();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $commentable0 = new Doctrine_Template_Commentable(array(
             ));
        $this->actAs($sluggable0);
        $this->actAs($timestampable0);
        $this->actAs($commentable0);
    }
}