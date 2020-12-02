<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.framework');

$canEdit = $displayData['params']->get('access-edit');
$articleId = $displayData['item']->id;

?>

<div class="icons">
	<?php if (empty($displayData['print'])) : ?>

		<?php if ($canEdit || $displayData['params']->get('show_print_icon') || $displayData['params']->get('show_email_icon')) : ?>
			<div class="w3-dropdown-hover">
				<button class="w3-button icon-button" type="button">
					<i class="material-icons">settings</i>
					<i class="material-icons">arrow_drop_down</i>
				</button>
				<?php // Note the actions class is deprecated. Use dropdown-menu instead. ?>
				<div class="w3-dropdown-content w3-bar-block w3-border">
					<?php if ($displayData['params']->get('show_print_icon')) : ?>
						<?php echo JHtml::_('icon.print_popup', $displayData['item'], $displayData['params']); ?>
					<?php endif; ?>
					<?php if ($displayData['params']->get('show_email_icon')) : ?>
						<?php echo JHtml::_('icon.email', $displayData['item'], $displayData['params']); ?>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<?php echo JHtml::_('icon.edit', $displayData['item'], $displayData['params']); ?>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

	<?php else : ?>

		<div class="pull-right">
			<?php echo JHtml::_('icon.print_screen', $displayData['item'], $displayData['params']); ?>
		</div>

	<?php endif; ?>
</div>
