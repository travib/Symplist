<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
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
        $this->hasColumn('sf_guard_user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
    }

    public function setUp()
    {
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id'));

        $this->hasMany('SymfonyPlugin as Plugins', array(
             'local' => 'id',
             'foreign' => 'author_id'));
    }
}