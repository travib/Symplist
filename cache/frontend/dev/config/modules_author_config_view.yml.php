<?php
// auto-generated by sfViewConfigHandler
// date: 2009/08/18 03:34:29
$response = $this->context->getResponse();

if ($this->actionName.$this->viewName == 'showSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'showSuccess')
{
  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('text.css', '', array ());
  $response->addStylesheet('960.css', '', array ());
  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('frontend.css', '', array ());
  $response->addStylesheet('rateable.css', '', array ());
}
else
{
  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('text.css', '', array ());
  $response->addStylesheet('960.css', '', array ());
  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('frontend.css', '', array ());
}

