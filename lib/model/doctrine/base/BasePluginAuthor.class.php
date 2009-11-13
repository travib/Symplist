<?php

/**
 * BasePluginAuthor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property clob $bio
 * @property integer $sf_guard_user_id
 * @property sfGuardUser $User
 * 
 * @method string       getFirstName()        Returns the current record's "first_name" value
 * @method string       getLastName()         Returns the current record's "last_name" value
 * @method string       getEmail()            Returns the current record's "email" value
 * @method clob         getBio()              Returns the current record's "bio" value
 * @method integer      getSfGuardUserId()    Returns the current record's "sf_guard_user_id" value
 * @method sfGuardUser  getUser()             Returns the current record's "User" value
 * @method PluginAuthor setFirstName()        Sets the current record's "first_name" value
 * @method PluginAuthor setLastName()         Sets the current record's "last_name" value
 * @method PluginAuthor setEmail()            Sets the current record's "email" value
 * @method PluginAuthor setBio()              Sets the current record's "bio" value
 * @method PluginAuthor setSfGuardUserId()    Sets the current record's "sf_guard_user_id" value
 * @method PluginAuthor setUser()             Sets the current record's "User" value
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class BasePluginAuthor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('plugin_author');
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('bio', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('sf_guard_user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id'));
    }
}