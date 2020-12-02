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
<div class="logout<?php echo $this->pageclass_sfx; ?>">
	<div class="w3-card-4">
		<div class="page-header w3-light-grey w3-padding w3-center">
			<h1 class="category-title">
				Logout
			</h1>
		</div>
		<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.logout'); ?>" method="post" class="w3-center w3-padding form-horizontal well">
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
</div>
