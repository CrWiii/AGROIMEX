<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication('site');
$template = $app->getTemplate(true);
include_once(JPATH_BASE.'/templates/'. $template->template .'/includes/functions.php');

?>
<fieldset id="users-profile-core">
  <?php echo wrap_with_tag(wrap_with_span($this->escape(JText::_('COM_USERS_PROFILE_CORE_LEGEND'))), $template->params->get('category_page_heading')); ?>
	<dl class="dl-horizontal">
		<dt><?php echo JText::_('COM_USERS_PROFILE_NAME_LABEL'); ?></dt>
		<dd><?php echo $this->data->name; ?></dd>
		<dt><?php echo JText::_('COM_USERS_PROFILE_USERNAME_LABEL'); ?></dt>
		<dd><?php echo htmlspecialchars($this->data->username); ?></dd>
		<dt><?php echo JText::_('COM_USERS_PROFILE_REGISTERED_DATE_LABEL'); ?></dt>
		<dd><?php echo JHtml::_('date', $this->data->registerDate); ?></dd>
		<dt><?php echo JText::_('COM_USERS_PROFILE_LAST_VISITED_DATE_LABEL'); ?></dt>
		<?php if ($this->data->lastvisitDate != '0000-00-00 00:00:00'){?>
		<dd><?php echo JHtml::_('date', $this->data->lastvisitDate); ?></dd>
		<?php }
		else
		{?>
		<dd><?php echo JText::_('COM_USERS_PROFILE_NEVER_VISITED'); ?></dd>
		<?php } ?>
	</dl>
</fieldset>