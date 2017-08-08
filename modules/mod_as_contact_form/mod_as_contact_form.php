<?php
/*******************************************************************************************/
/*
/*        Web: http://www.asdesigning.com
/*        Web: http://www.astemplates.com
/*        License: GNU General Public License
/*
/*******************************************************************************************/

defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';

$document = JFactory::getDocument();

$document->addStylesheet('modules/mod_as_contact_form/css/style.css');

$labels_pos = $params->get('labels_pos', '');
$success = $params->get('success_notify', '');
$error = $params->get('failure_notify', '');
$captcha_error = $params->get('captcha_failure_notify', '');

JHtml::_('jquery.framework', true, null, true);
$document->addScript('modules/mod_as_contact_form/js/jquery.validate.min.js');
$document->addScript('modules/mod_as_contact_form/js/additional-methods.min.js');
$document->addScript('modules/mod_as_contact_form/js/autosize.min.js');
$document->addScriptdeclaration('(function($){$(document).ready(function(){autosize($("textarea"))})})(jQuery);');
$captcha = ($params->get('captcha_req', false) && JPluginHelper::isEnabled('captcha', 'recaptcha')) ? true : false;
if($captcha) {
	$document->addScript('modules/mod_as_contact_form/js/ajaxcaptcha.js');
	JPluginHelper::importPlugin('captcha');
	$dispatcher = JEventDispatcher::getInstance();
	$captcha_array = $dispatcher->trigger('onDisplay', array(null, 'captcha_'.$module->id, ''));
	$captcha_html = $captcha_array[0];
}
$document->addScript('modules/mod_as_contact_form/js/ajaxsendmail.js');

require JModuleHelper::getLayoutPath('mod_as_contact_form', $params->get('layout', 'default'));

?>