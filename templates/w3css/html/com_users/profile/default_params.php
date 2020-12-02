<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

?>
<?php $fields = $this->form->getFieldset('params'); ?>
<?php if (count($fields)) : ?>
	<div class="users-profile-custom w3-card-4 w3-center">
		<div class="w3-padding w3-light-grey">
			<span class="category-title"><?php echo JText::_('COM_USERS_SETTINGS_FIELDSET_LABEL'); ?></span>
		</div>
		<div class="w3-padding">
			<table class="w3-table w3-striped">
			<?php foreach ($fields as $field) : ?>
				<tr>
				<?php if (!$field->hidden) : ?>
					<td class="t-label">
						<?php echo $field->title; ?>
					</td>
					<td class="t-value">
						<?php if (JHtml::isRegistered('users.' . $field->id)) : ?>
							<?php echo JHtml::_('users.' . $field->id, $field->value); ?>
						<?php elseif (JHtml::isRegistered('users.' . $field->fieldname)) : ?>
							<?php echo JHtml::_('users.' . $field->fieldname, $field->value); ?>
						<?php elseif (JHtml::isRegistered('users.' . $field->type)) : ?>
							<?php echo JHtml::_('users.' . $field->type, $field->value); ?>
						<?php else : ?>
							<?php echo JHtml::_('users.value', $field->value); ?>
						<?php endif; ?>
					</td>
				<?php endif; ?>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
	</div>
<?php endif; ?>
