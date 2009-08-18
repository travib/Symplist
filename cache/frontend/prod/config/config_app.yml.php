<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2009/08/18 03:26:38
sfConfig::add(array(
  'app_csFormTransformPlugin_stylesheets' => array (
  0 => '/csFormTransformPlugin/css/jqtransform.css',
),
  'app_csFormTransformPlugin_javascripts' => array (
  0 => '/csFormTransformPlugin/js/jquery.jqtransform.js',
),
  'app_csSEOToolkitPlugin_AuthMethod' => 'isAuthenticated',
  'app_csSEOToolkitPlugin_IncludeAssets' => true,
  'app_csSEOToolkitPlugin_SitePrefix' => false,
  'app_csSEOToolkitPlugin_DefaultTitle' => false,
  'app_csSEOToolkitPlugin_DefaultTitleMethod' => false,
  'app_csSEOToolkitPlugin_Underride' => array (
  'Title' => false,
  'Description' => false,
  'Keywords' => false,
),
  'app_comments_nesting' => false,
  'app_comments_approved_by_default' => true,
  'app_comments_commenter_class' => 'Commenter',
  'app_comments_AllowAnonymous' => true,
  'app_comments_textarea_params' => array (
  'size' => '40x6',
),
  'app_gravatar_default_size' => 80,
  'app_gravatar_default_rating' => 'G',
  'app_gravatar_default_image' => 'gravatar_default.png',
  'app_gravatar_cache_dir_name' => 'g_cache',
  'app_gravatar_cache_expiration' => '3 days',
  'app_TinyMce_config' => array (
  'plugins' => 'pagebreak, fullscreen, advimage',
  'fullscreen_new_window' => true,
  'relative_urls' => false,
  'theme_advanced_buttons1' => 'bold, italic, underline, bullist, numlist, outdent, indent, blockquote, justifyleft, justifycenter, justifyright, link, unlink, image, separator, undo, redo',
  'theme_advanced_buttons2' => 'hr,removeformat,visualaid,separator,sub,sup,separator,charmap, fullscreen, pagebreak, formatselect, styleselect, code',
  'theme_advanced_buttons3' => '',
  'extended_valid_elements' => 'img[style|class|src|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',
  'theme_advanced_styles' => 'Caption=caption',
  'content_css' => '%web_root%/css/tinymce-custom-styles.css',
),
  'app_fake_setting' => 0,
));
