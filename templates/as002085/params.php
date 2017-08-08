<?php

/***************************************************************************************/
/*
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/**************************************************************************************/

include_once ('fonts.php');

$body_font_family = '';
if($this->params->get('body_font_family'))
	$body_font_family   = $this->params->get('body_font_family');
$bodyfont_arr			= array('fontlink'=>false, 'fontfamily'=>false);
$bodyfont_arr			= fontChooser($body_font_family);
$body_font_family 		= $bodyfont_arr['fontfamily'];
	
$heading_font_family = '';
if($this->params->get('heading_font_family'))
	$heading_font_family = $this->params->get('heading_font_family');
$hfont_arr				= array('fontlink'=>false, 'fontfamily'=>false);
$hfont_arr				= fontChooser($heading_font_family);
$heading_font_family	= $hfont_arr['fontfamily'];

$body_font_size = '';
if($this->params->get('body_font_size'))
	$body_font_size = 'font-size: ' . $this->params->get('body_font_size') . ';';
	
$h1_font_size = '';
if($this->params->get('h1_font_size'))
	$h1_font_size = 'font-size: ' . $this->params->get('h1_font_size') . ';';

$h2_font_size = '';
if($this->params->get('h2_font_size'))
	$h2_font_size = 'font-size: ' . $this->params->get('h2_font_size') . ';';
	
$h3_font_size = '';
if($this->params->get('h3_font_size'))
	$h3_font_size = 'font-size: ' . $this->params->get('h3_font_size') . ';';
	
$h4_font_size = '';
if($this->params->get('h4_font_size'))
	$h4_font_size = 'font-size: ' . $this->params->get('h4_font_size') . ';';
	
$h5_font_size = '';
if($this->params->get('h5_font_size'))
	$h5_font_size = 'font-size: ' . $this->params->get('h5_font_size') . ';';
	
$h6_font_size = '';
if($this->params->get('h6_font_size'))
	$h6_font_size = 'font-size: ' . $this->params->get('h6_font_size') . ';';						
		 
?>