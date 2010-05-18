<?php
/*
 * This file is part of the sfLucenePlugin package
 * (c) 2007 Carl Vondrick <carlv@carlsoft.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @package    sfLucenePlugin
 * @subpackage Config
 * @author     Carl Vondrick <carlv@carlsoft.net>
 */
class sfLuceneProjectConfigHandler extends sfYamlConfigHandler
{
  /**
  * Builds cache file
  */
  public function execute($config)
  {
    return $this->buildConfig( $this->prepareConfig($config) );
  }

  /**
  * Given a well formed array of the config, it builds the cache output.
  */
  protected function buildConfig($config)
  {
    $retval = "<?php\n".
                "// auto-generated by " . __CLASS__ . "\n".
                "// date: %s";
    $retval = sprintf($retval, date('Y/m/d H:i:s'));

    $retval .= "\n\n\$config = array();\n\n";

    foreach ($config as $name => $values)
    {
      $retval .= "\n\n// processing  $name now...\n";

      $retval .= sprintf("\$config['%s'] = %s;\n", $name, var_export($values, true));
    }

    return $retval;
  }

  protected function prepareConfig($config)
  {
    $config = $this->parseYamls($config);
    $retval = array();

    foreach ($config as $name => $values)
    {
      try
      {
        $retval[$name] = $this->prepareOneConfig($values);
      }
      catch (Exception $e)
      {
        throw new sfConfigurationException('Error processing Lucene index "' . $name . '": ' . $e->getMessage());
      }
    }

    return $retval;
  }

  /**
  * Prepares the config files to be well formed.
  */
  protected function prepareOneConfig($config)
  {
    if (isset($config['models']))
    {
      foreach ($config['models'] as $model => &$model_config)
      {
        if (isset($model_config['fields']))
        {
          foreach ($model_config['fields'] as &$field)
          {
            $transform = null;
            $boost = null;

            if (is_array($field))
            {
              $type = isset($field['type']) ? $field['type'] : null;
              $boost = isset($field['boost']) ? $field['boost'] : null;
              $transform = isset($field['transform']) ? $field['transform'] : null;
            }
            elseif (empty($field))
            {
              $type = null;
            }
            elseif (is_string($field))
            {
              $type = $field;
            }
            else
            {
              throw new sfConfigurationException('Unknown field data type.');
            }

            $type = $type ? $type : 'text';
            $boost = $boost ? $boost : 1.0;
            $transform = $transform || count($transform) ? $transform : null;

            $field = array(
              'type' => $type,
              'boost' => $boost,
              'transform' => $transform
            );
          }
        }
        else
        {
          $model_config['fields'] = array();
        }

        if (!isset($model_config['partial']))
        {
          $model_config['partial'] = null;
        }

        if (!isset($model_config['indexer']))
        {
          $model_config['indexer'] = null;
        }

        if (!isset($model_config['title']))
        {
          $model_config['title'] = null;
        }

        if (!isset($model_config['description']))
        {
          $model_config['description'] = null;
        }

        if (!isset($model_config['peer']))
        {
          $model_config['peer'] = $model . 'Peer';
        }

        if (!isset($model_config['rebuild_limit']))
        {
          $model_config['rebuild_limit'] = 250;
        }

        if (!isset($model_config['validator']))
        {
          $model_config['validator'] = 'isIndexable';
        }
      }
    }
    else
    {
      $config['models'] = array();
    }

    $encoding = strtolower(isset($config['index']['name']) ? $config['index']['encoding'] : 'utf-8');
    $cultures = isset($config['index']['cultures']) ? $config['index']['cultures'] : array(sfConfig::get('sf_i18n_default_culture'));
    $stop_words = isset($config['index']['stop_words']) ? $config['index']['stop_words'] : array('a', 'an', 'at',' the', 'and', 'or', 'is', 'am', 'are', 'of');
    $short_words = isset($config['index']['short_words']) ? $config['index']['short_words'] : 2;
    $analyzer = isset($config['index']['analyzer']) ? $config['index']['analyzer'] : 'textnum';
    $case_sensitive = isset($config['index']['case_sensitive']) ? $config['index']['case_sensitive'] : false;
    $mb_string = isset($config['index']['mb_string']) ? $config['index']['mb_string'] : false;
    $param = isset($config['index']['param']) ? $config['index']['param'] : array();

    $config['index'] = array(
      'encoding' => $encoding,
      'cultures' => $cultures,
      'stop_words' => $stop_words,
      'short_words' => $short_words,
      'analyzer' => $analyzer,
      'case_sensitive' => (bool) $case_sensitive,
      'mb_string' => (bool) $mb_string,
      'param' => $param
    );

    // process factories...
    if (!isset($config['factories']))
    {
      $config['factories'] = array();
    }
    if (!isset($config['factories']['indexers']))
    {
      $config['factories']['indexers'] = array();
    }
    if (!isset($config['factories']['results']))
    {
      $config['factories']['results'] = array();
    }

    return $config;
  }
}