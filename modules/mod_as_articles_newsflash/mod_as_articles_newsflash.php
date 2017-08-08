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
require_once (__DIR__ . '/helper.php');

$menu = JMenu::getInstance('site');

$app    = JFactory::getApplication(); 
$doc = JFactory::getDocument();
$document =& $doc;
$layout   = $app->input->getCmd('layout', '');

$list = modArticlesNewsAdvHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$columns = (int)$params->get('columns');

require JModuleHelper::getLayoutPath('mod_as_articles_newsflash', $params->get('layout', 'default'));
