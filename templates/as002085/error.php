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
	
	if (!isset($this->error)) 
	{
	  $this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	  $this->debug = false;
	}
	
	//get language and direction
	$app = JFactory::getApplication();
	$doc = JFactory::getDocument();
	$user = JFactory::getUser();    // Add current user information
	$template = $app->getTemplate();
	
	$this->language = $doc->language;
	$this->direction = $doc->direction;
	jimport( 'joomla.application.module.helper' );

	//Get Search module
	$searchModule = JModuleHelper::getModule( 'mod_search');

	// if right to left
	if ($this->direction == 'rtl'){
		$doc->addStyleSheet('media/jui/css/bootstrap-rtl.css');
	}  
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
    <link rel="shortcut icon" href="<?php echo $this->baseurl .'/templates/'. $template; ?>/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="<?php echo $this->baseurl .'/templates/'. $template .'/css/bootstrap.css' ?>" />
    <link rel="stylesheet" href="<?php echo $this->baseurl .'/templates/'. $template .'/css/bootstrap.responsive.css' ?>" />
    <link rel="stylesheet" href="<?php echo $this->baseurl .'/templates/'. $template .'/css/tmpl.default.css' ?>" />
    <link rel="stylesheet" href="<?php echo $this->baseurl .'/templates/'. $template .'/css/font-awesome.css' ?>" />
</head>
<body>
<div id="error" class="container">
	<div class="row">
		<span class="span8 offset2">
		<div class="well">
			<div class="hero-unit">
				<h1><?php echo $this->error->getCode(); ?></h1>
				<h3><?php echo $this->error->getMessage(); ?></h3>
			</div>

			<p><b><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></b></p>

            <ol>
                <li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                <li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
                <li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
                <li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                <li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
                <li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
            </ol>

			<p><b><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></b></p>

            <ul>
	            <li>
                	<a href="<?php echo $this->baseurl; ?>/index.php" 
                    title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
                </li>
            </ul>

            <!--<?php echo JModuleHelper::renderModule( $searchModule); ?>-->
            <?php echo $doc->getBuffer('modules', '404-search', array('style' => 'html5nosize')); ?>
            <div class="clearfix"></div>
		</div>
		</span>
	</div>
</div>
</body>
</html>