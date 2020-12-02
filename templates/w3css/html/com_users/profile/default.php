<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="profile<?php echo $this->pageclass_sfx; ?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h1>
				<?php echo $this->escape($this->params->get('page_heading')); ?>
			</h1>
		</div>
	<?php endif; ?>
	<?php if (JFactory::getUser()->id == $this->data->id) : ?>
		<div class="btn-toolbar w3-center">
			<a class="w3-button w3-blue" href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>">
				<?php echo JText::_('COM_USERS_EDIT_PROFILE'); ?>
			</a>
			<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.logout'); ?>" method="post" style="display: inline-block">
				<button type="submit" class="w3-button w3-red">
					<?php echo JText::_('JLOGOUT'); ?>
				</button>
				<?php if ($this->params->get('logout_redirect_url')) : ?>
					<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('logout_redirect_url', $this->form->getValue('return'))); ?>" />
				<?php else : ?>
					<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('logout_redirect_menuitem', $this->form->getValue('return'))); ?>" />
				<?php endif; ?>
				<?php echo JHtml::_('form.token'); ?>
			</form>	
		</div>
	<?php endif; ?>
	<?php echo $this->loadTemplate('core'); ?>
	<?php echo $this->loadTemplate('params'); ?>
	<?php echo $this->loadTemplate('custom'); ?>
</div>
