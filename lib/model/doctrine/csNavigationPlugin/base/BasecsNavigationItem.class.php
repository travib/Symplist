<?php

/**
 * BasecsNavigationItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $route
 * @property boolean $protected
 * @property boolean $locked
 * @property Doctrine_Collection $NavigationMenu
 * 
 * @method string              getName()           Returns the current record's "name" value
 * @method string              getRoute()          Returns the current record's "route" value
 * @method boolean             getProtected()      Returns the current record's "protected" value
 * @method boolean             getLocked()         Returns the current record's "locked" value
 * @method Doctrine_Collection getNavigationMenu() Returns the current record's "NavigationMenu" collection
 * @method csNavigationItem    setName()           Sets the current record's "name" value
 * @method csNavigationItem    setRoute()          Sets the current record's "route" value
 * @method csNavigationItem    setProtected()      Sets the current record's "protected" value
 * @method csNavigationItem    setLocked()         Sets the current record's "locked" value
 * @method csNavigationItem    setNavigationMenu() Sets the current record's "NavigationMenu" collection
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class BasecsNavigationItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cs_navigation_item');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('route', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('protected', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('locked', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('csNavigationMenu as NavigationMenu', array(
             'local' => 'id',
             'foreign' => 'root_id'));

        $nestedset0 = new Doctrine_Template_NestedSet(array(
             'hasManyRoots' => true,
             ));
        $this->actAs($nestedset0);
    }
}