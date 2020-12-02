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
<div class="users-profile-core w3-card-4">
	<div class="w3-padding w3-light-grey w3-center">
		<span class="category-title"><?php echo JText::_('COM_USERS_PROFILE_CORE_LEGEND'); ?></span>
	</div>
	<div class="w3-padding">
		<table class="w3-table w3-striped">
			<tr>
				<td class="t-label">
					<?php echo JText::_('COM_USERS_PROFILE_NAME_LABEL'); ?>
				</td>
				<td class="t-value">
					<?php echo $this->escape($this->data->name); ?>
				</td>
			</tr>
			<tr>
				<td class="t-label">
					<?php echo JText::_('COM_USERS_PROFILE_USERNAME_LABEL'); ?>
				</td>
				<td class="t-value">
					<?php echo $this->escape($this->data->username); ?>
				</td>
			</tr>
			<tr>
				<td class="t-label">
					<?php echo JText::_('COM_USERS_PROFILE_REGISTERED_DATE_LABEL'); ?>
				</td>
				<td class="t-value">
					<?php echo JHtml::_('date', $this->data->registerDate, JText::_('DATE_FORMAT_LC1')); ?>
				</td>
			</tr>
			<tr>
				<td class="t-label">
					<?php echo JText::_('COM_USERS_PROFILE_LAST_VISITED_DATE_LABEL'); ?>
				</td>
				<?php if ($this->data->lastvisitDate != $this->db->getNullDate()) : ?>
					<td class="t-value">
						<?php echo JHtml::_('date', $this->data->lastvisitDate, JText::_('DATE_FORMAT_LC1')); ?>
					</td>
				<?php else : ?>
					<td class="t-value">
						<?php echo JText::_('COM_USERS_PROFILE_NEVER_VISITED'); ?>
					</td>
				<?php endif; ?>
			</tr>
		</table>
	</div>
</div>
