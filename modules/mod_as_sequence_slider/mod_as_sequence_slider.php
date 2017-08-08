<?php
/*******************************************************************************************/
/*
/*        Web: http://www.asdesigning.com
/*        Web: http://www.astemplates.com
/*        License: GNU General Public License
/*
/*******************************************************************************************/

defined('_JEXEC') or die;

require_once (__DIR__ . '/helper.php');

$app = JFactory::getApplication();	
$doc = JFactory::getDocument();
$document =& $doc;
$template = $app->getTemplate();

switch($params->get('theme'))
{
	case 0:
		$document->addStyleSheet(JURI::base() . 'modules/mod_as_sequence_slider/css/sequence.css');
		break;
	case 1:
		$document->addStyleSheet(JURI::base() . 'templates/'.$template.'/css/sequence.css');
		break;
}

$document->addScript(JURI::base() . 'modules/mod_as_sequence_slider/js/jquery.sequence.js');

$list = modASSequenceSliderHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_as_sequence_slider', $params->get('layout', 'default'));
