<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addSymfonyPluginIndexesForApiMigration extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('plugin_release_symfony_api_version', 'plugin_release_symfony_api_version_release_id_plugin_release_id', array(
             'name' => 'plugin_release_symfony_api_version_release_id_plugin_release_id',
             'local' => 'release_id',
             'foreign' => 'id',
             'foreignTable' => 'plugin_release',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('plugin_release_symfony_api_version', 'pasi', array(
             'name' => 'pasi',
             'local' => 'api_version_id',
             'foreign' => 'id',
             'foreignTable' => 'symfony_api_version',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('plugin_release_symfony_api_version', 'plugin_release_symfony_api_version_release_id', array(
             'fields' => 
             array(
              0 => 'release_id',
             ),
             ));
        $this->addIndex('plugin_release_symfony_api_version', 'plugin_release_symfony_api_version_api_version_id', array(
             'fields' => 
             array(
              0 => 'api_version_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('plugin_release_symfony_api_version', 'plugin_release_symfony_api_version_release_id_plugin_release_id');
        $this->dropForeignKey('plugin_release_symfony_api_version', 'pasi');
        $this->removeIndex('plugin_release_symfony_api_version', 'plugin_release_symfony_api_version_release_id', array(
             'fields' => 
             array(
              0 => 'release_id',
             ),
             ));
        $this->removeIndex('plugin_release_symfony_api_version', 'plugin_release_symfony_api_version_api_version_id', array(
             'fields' => 
             array(
              0 => 'api_version_id',
             ),
             ));
    }
}