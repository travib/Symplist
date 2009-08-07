<?php
/*
 * This file is part of the sfLucenePlugin package
 * (c) 2007 - 2008 Carl Vondrick <carl@carlsoft.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @package    sfLucenePlugin
 * @subpackage Config
 * @author     Carl Vondrick <carl@carlsoft.net>
 * @version SVN: $Id: sfLuceneModuleConfigHandler.class.php 7108 2008-01-20 07:44:42Z Carl.Vondrick $
 */
class sfLuceneModuleConfigHandler extends sfYamlConfigHandler
{
  public function execute($config)
  {
    $retval = "<?php\n".
                "// auto-generated by " . __CLASS__ . "\n".
                "// date: %s\n\n";
    $retval = sprintf($retval, date('Y/m/d H:i:s'));

    $config = $this->parseYamls($config);

    $retconfig = array();

    foreach ($config as $index => $mconfig)
    {
      $retconfig[$index] = array();

      foreach ($mconfig as $action => $config)
      {
        $retconfig[$index][$action] = $config;

        if (!isset($config['security']))
        {
          $retconfig[$index][$action]['security'] = array();
        }

        if (!isset($config['security']['authenticated']))
        {
          $retconfig[$index][$action]['security']['authenticated'] = false;
        }

        if (!isset($config['security']['credentials']))
        {
          $retconfig[$index][$action]['security']['credentials'] = array();
        }

        if (!isset($config['params']))
        {
          $retconfig[$index][$action]['params'] = array();
        }

        if (!isset($config['layout']))
        {
          $retconfig[$index][$action]['layout'] = false;
        }
      }
    }

    $retval .= sprintf("\$actions = %s;", var_export($retconfig, true));

    return $retval;
  }
}