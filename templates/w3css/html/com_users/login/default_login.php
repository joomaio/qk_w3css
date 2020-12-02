<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

?>
<div class="login<?php echo $this->pageclass_sfx; ?>">
	<div class="w3-card-4">
		<div class="page-header w3-light-grey w3-padding w3-center">
			<h1 class="category-title">
				<?php echo $this->escape($this->params->get('page_heading')); ?>
			</h1>
		</div>
		
		<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="w3-padding form-validate form-horizontal well">
			<div class="w3-padding">
				<?php echo $this->form->renderFieldset('credentials'); ?>
				<?php if ($this->tfa) : ?>
					<?php echo $this->form->renderField('secretkey'); ?>
				<?php endif; ?>
				<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
					<div class="remember">
						<input id="remember" type="checkbox" name="remember" class="w3-check" checked="checked" />
						<label for="remember">
							<?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME'); ?>
						</label>
					</div>
				<?php endif; ?>
				<button type="submit" class="w3-button w3-green w3-text-white">
					<?php echo JText::_('JLOGIN'); ?>
				</button>
				<?php $return = $this->form->getValue('return', '', $this->params->get('login_redirect_url', $this->params->get('login_redirect_menuitem'))); ?>
				<input type="hidden" name="return" value="<?php echo base64_encode($return); ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</form>
		<div class="w3-padding login-link">
			<div class="w3-padding">
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
					<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?>
				</a>
			</div>
			<div class="w3-padding">
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
					<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?>
				</a>
			</div>
			<?php $usersConfig = JComponentHelper::getParams('com_users'); ?>
			<?php if ($usersConfig->get('allowUserRegistration')) : ?>
				<div class="w3-padding">
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
						<?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?>
					</a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>

