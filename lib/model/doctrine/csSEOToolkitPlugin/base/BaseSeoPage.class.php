<?php

/**
 * BaseSeoPage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $url
 * @property string $title
 * @property clob $description
 * @property string $keywords
 * @property decimal $priority
 * @property enum $changeFreq
 * @property boolean $exclude_from_sitemap
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5925 2009-06-22 21:27:17Z jwage $
 */
abstract class BaseSeoPage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('seo_page');
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('description', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('keywords', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('priority', 'decimal', null, array(
             'type' => 'decimal',
             'default' => 0.5,
             'scale' => '1',
             ));
        $this->hasColumn('changeFreq', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'always',
              1 => 'hourly',
              2 => 'daily',
              3 => 'weekly',
              4 => 'monthly',
              5 => 'yearly',
              6 => 'never',
             ),
             'default' => 'weekly',
             ));
        $this->hasColumn('exclude_from_sitemap', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}