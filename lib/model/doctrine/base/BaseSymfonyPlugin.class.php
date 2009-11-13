<?php

/**
 * BaseSymfonyPlugin
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property clob $description
 * @property integer $user_id
 * @property string $symfony_developer
 * @property integer $category_id
 * @property boolean $active
 * @property string $repository
 * @property string $image
 * @property string $homepage
 * @property string $ticketing
 * @property boolean $featured
 * @property sfGuardUser $User
 * @property Doctrine_Collection $Raters
 * @property PluginCategory $Category
 * @property Doctrine_Collection $Ratings
 * @property Doctrine_Collection $Releases
 * 
 * @method string              getTitle()             Returns the current record's "title" value
 * @method clob                getDescription()       Returns the current record's "description" value
 * @method integer             getUserId()            Returns the current record's "user_id" value
 * @method string              getSymfonyDeveloper()  Returns the current record's "symfony_developer" value
 * @method integer             getCategoryId()        Returns the current record's "category_id" value
 * @method boolean             getActive()            Returns the current record's "active" value
 * @method string              getRepository()        Returns the current record's "repository" value
 * @method string              getImage()             Returns the current record's "image" value
 * @method string              getHomepage()          Returns the current record's "homepage" value
 * @method string              getTicketing()         Returns the current record's "ticketing" value
 * @method boolean             getFeatured()          Returns the current record's "featured" value
 * @method sfGuardUser         getUser()              Returns the current record's "User" value
 * @method Doctrine_Collection getRaters()            Returns the current record's "Raters" collection
 * @method PluginCategory      getCategory()          Returns the current record's "Category" value
 * @method Doctrine_Collection getRatings()           Returns the current record's "Ratings" collection
 * @method Doctrine_Collection getReleases()          Returns the current record's "Releases" collection
 * @method SymfonyPlugin       setTitle()             Sets the current record's "title" value
 * @method SymfonyPlugin       setDescription()       Sets the current record's "description" value
 * @method SymfonyPlugin       setUserId()            Sets the current record's "user_id" value
 * @method SymfonyPlugin       setSymfonyDeveloper()  Sets the current record's "symfony_developer" value
 * @method SymfonyPlugin       setCategoryId()        Sets the current record's "category_id" value
 * @method SymfonyPlugin       setActive()            Sets the current record's "active" value
 * @method SymfonyPlugin       setRepository()        Sets the current record's "repository" value
 * @method SymfonyPlugin       setImage()             Sets the current record's "image" value
 * @method SymfonyPlugin       setHomepage()          Sets the current record's "homepage" value
 * @method SymfonyPlugin       setTicketing()         Sets the current record's "ticketing" value
 * @method SymfonyPlugin       setFeatured()          Sets the current record's "featured" value
 * @method SymfonyPlugin       setUser()              Sets the current record's "User" value
 * @method SymfonyPlugin       setRaters()            Sets the current record's "Raters" collection
 * @method SymfonyPlugin       setCategory()          Sets the current record's "Category" value
 * @method SymfonyPlugin       setRatings()           Sets the current record's "Ratings" collection
 * @method SymfonyPlugin       setReleases()          Sets the current record's "Releases" collection
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class BaseSymfonyPlugin extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('symfony_plugin');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('description', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('symfony_developer', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('repository', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('homepage', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('ticketing', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('featured', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasMany('sfGuardUser as Raters', array(
             'refClass' => 'PluginRating',
             'local' => 'symfony_plugin_id',
             'foreign' => 'sf_guard_user_id'));

        $this->hasOne('PluginCategory as Category', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $this->hasMany('PluginRating as Ratings', array(
             'local' => 'id',
             'foreign' => 'symfony_plugin_id'));

        $this->hasMany('PluginRelease as Releases', array(
             'local' => 'id',
             'foreign' => 'plugin_id'));

        $sluggable0 = new Doctrine_Template_Sluggable();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $mylucenedoctrinetemplate0 = new myLuceneDoctrineTemplate();
        $commentable0 = new Doctrine_Template_Commentable(array(
             ));
        $this->actAs($sluggable0);
        $this->actAs($timestampable0);
        $this->actAs($mylucenedoctrinetemplate0);
        $this->actAs($commentable0);
    }
}