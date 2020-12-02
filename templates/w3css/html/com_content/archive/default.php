<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.caption');
?>
<div class="archive<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading')) : ?>
<div class="page-header">
<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
</div>
<?php endif; ?>
<form id="adminForm" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-inline">
	<div class="w3-margin filters w3-card-4">
		<h3 class="w3-light-grey w3-container w3-padding page-header">Filter Form</h3>
		<div class="filter-search w3-center">
			<?php echo $this->form->monthField; ?>
			<?php echo $this->form->yearField; ?>
			<?php echo $this->form->limitField; ?>

			<button type="submit" class="w3-button w3-green"><?php echo JText::_('JGLOBAL_FILTER_BUTTON'); ?></button>
			<input type="hidden" name="view" value="archive" />
			<input type="hidden" name="option" value="com_content" />
			<input type="hidden" name="limitstart" value="0" />
		</div>
	</div>

	<?php echo $this->loadTemplate('items'); ?>
</form>
</div>
