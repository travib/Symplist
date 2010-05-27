<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version2 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('plugin_release_dependency', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'release_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '8',
             ),
             'dependency_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '8',
             ),
             'dependency_version_min' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'dependency_version_max' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
        $this->createTable('plugin_tag', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'tag_id' => 
             array(
              'notnull' => '1',
              'type' => 'integer',
              'length' => '8',
             ),
             'plugin_id' => 
             array(
              'notnull' => '1',
              'type' => 'integer',
              'length' => '8',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
        $this->createTable('tag', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'name' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'description' => 
             array(
              'type' => 'clob',
              'length' => '',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
        $this->addColumn('plugin_author', 'created_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('plugin_author', 'updated_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('plugin_category', 'created_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('plugin_category', 'updated_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('plugin_release', 'created_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('plugin_release', 'updated_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('plugin_release', 'position', 'integer', '8', array(
             ));
        $this->changeColumn('plugin_release', 'plugin_id', 'integer', '8', array(
             'notnull' => '1',
             ));
        $this->changeColumn('plugin_release', 'stability', 'enum', '', array(
             'values' => 
             array(
              0 => 'alpha',
              1 => 'beta',
              2 => 'stable',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('plugin_release_dependency');
        $this->dropTable('plugin_tag');
        $this->dropTable('tag');
        $this->removeColumn('plugin_author', 'created_at');
        $this->removeColumn('plugin_author', 'updated_at');
        $this->removeColumn('plugin_category', 'created_at');
        $this->removeColumn('plugin_category', 'updated_at');
        $this->removeColumn('plugin_release', 'created_at');
        $this->removeColumn('plugin_release', 'updated_at');
        $this->removeColumn('plugin_release', 'position');
    }
}