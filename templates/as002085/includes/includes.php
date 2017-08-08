<?php 

/*******************************************************************************************/
/*
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/*******************************************************************************************/

defined('_JEXEC') or die;
include_once('functions.php');

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();		// Add current user information

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');
$template = $app->getTemplate();
$menu = JMenu::getInstance('site');
$db = JFactory::getDBO();
$query = "SELECT template FROM #__template_styles WHERE client_id = 1 AND home = 1";
$db->setQuery($query);
$adminTemplate = $db->loadResult();

$contentParams = $app->getParams('com_content');
$pageClass = $contentParams->get('pageclass_sfx');

// Logo file
$logo = "";

if ($this->params->get('logo_img'))
{
	$logo = JURI::root() . $this->params->get('logo_img');
}

// Sait slogan

$slogan = "";

if ($this->params->get('logo_slogan'))
{
	$slogan = $this->params->get('logo_slogan');
}

//Footer logo file
$footer_logo = "";

if ($this->params->get('footer_logo_img'))
{
	$footer_logo = JURI::root() . $this->params->get('footer_logo_img');
}


//Hide module positions 
//By View (article, login, registration, search, profile, reset, remind etc)
$hideByView = false;
switch($view)
{
	case 'search':
		$hideByView = true;
		break;
}

//By Component
$hideByOption = false;
switch($option)
{
	case 'com_users':
	case 'com_search':
		$hideByOption = true;
		break;
}

//By Component
$hideByEdit = false;
if($option == 'com_content' && $layout == 'edit')
{
	$hideByEdit = true;
}

//Get main content width

//Get Left column grid width
if(($this->countModules('as-left-top') || $this->countModules('as-left-bottom'))&& $hideByOption == false && $view !== 'form')
{ 
	$aside_left_width = $this->params->get('aside_left_width');
} 
else 
{
	$aside_left_width = "";
}

//Get Right column grid width
if(($this->countModules('as-right-top') || $this->countModules('as-right-bottom')) && $hideByOption == false && $view !== 'form')
{ 
	$aside_right_width = $this->params->get('aside_right_width');
} 
else 
{
	$aside_right_width = "";
}

$mainContentWidth = 12 - ($aside_left_width + $aside_right_width);

$this->params->get('category_page_heading') ? $category_page_heading = $this->params->get('category_page_heading') : $category_page_heading = "";

$theme_style = $this->params->get('theme_style');
switch ($theme_style) 
{
	case 'blueivy':
		$theme_style = 'templates/'.$this->template.'/css/style.blueivy.css';
		break;
	case 'coffee':
		$theme_style = 'templates/'.$this->template.'/css/style.coffee.css';
		break;
	case 'copper':
		$theme_style = 'templates/'.$this->template.'/css/style.copper.css';
		break;
	case 'coral':
		$theme_style = 'templates/'.$this->template.'/css/style.coral.css';
		break;
	case 'firebrick':
		$theme_style = 'templates/'.$this->template.'/css/style.firebrick.css';
		break;
	case 'iguana':
		$theme_style = 'templates/'.$this->template.'/css/style.iguana.css';
		break;
	case 'jetgray':
		$theme_style = 'templates/'.$this->template.'/css/style.jetgray.css';
		break;
	case 'purple':
		$theme_style = 'templates/'.$this->template.'/css/style.purple.css';
		break;
	case 'teal':
		$theme_style = 'templates/'.$this->template.'/css/style.teal.css';
		break;
	default:
		$theme_style = '';
		break;
}

$theme_layout = $this->params->get('theme_layout');
switch ($theme_layout) 
{
	case '0':
		$containerClass = 'container';
		$rowClass = 'row';
		break;

	case '1':
		$containerClass = 'container-fluid';
		$rowClass = 'row-fluid';
		break;
	
	default:
		$containerClass = 'container';
		$rowClass = 'row';
		break;
}

$theme_responsive = $this->params->get('theme_responsive');

