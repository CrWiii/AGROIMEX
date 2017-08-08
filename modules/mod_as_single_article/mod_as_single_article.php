<?php
/*******************************************************************************************/
/*
/*        Web: http://www.asdesigning.com
/*        Web: http://www.astemplates.com
/*        License: GNU General Public License
/*
/*******************************************************************************************/

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once(__DIR__ . '/helper.php');
$menu = JMenu::getInstance('site');

$app  = JFactory::getApplication();
$view = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');

$item = modASSingleArticleHelper::getItem($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

$item_heading = $params->get('item_heading', 'h2');

if($view == "form")
{
  $item_images = json_decode(json_encode($item->images));
} 
else 
{
  $item_images = json_decode($item->images);
}

require JModuleHelper::getLayoutPath('mod_as_single_article', $params->get('layout', 'default'));
