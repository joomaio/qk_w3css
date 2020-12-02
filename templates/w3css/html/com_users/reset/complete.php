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
<div class="reset-complete<?php echo $this->pageclass_sfx; ?>">
	<form action="<?php echo JRoute::_('index.php?option=com_users&task=reset.complete'); ?>" method="post" class="form-validate form-horizontal well">
		<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
			<div class="w3-card-4">
				<div class="w3-light-grey w3-padding w3-center">
					<span class="category-title"><?php echo $this->escape($this->params->get('page_heading')); ?></span>
				</div>
				<div class="w3-padding">
					<p><?php echo JText::_($fieldset->label); ?></p>
					<?php echo $this->form->renderFieldset($fieldset->name); ?>
					<button type="submit" class="w3-button w3-green validate">
						<?php echo JText::_('JSUBMIT'); ?>
					</button>
				</div>
			</div>
		<?php endforeach; ?>
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
