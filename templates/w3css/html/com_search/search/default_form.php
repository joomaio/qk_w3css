<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();

?>
<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search'); ?>" method="post">
	<div class="w3-card-2 search-card">
		<div class="search-input-form">
			<input type="text" name="searchword" title="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="w3-input" />
		
			<button name="Search" onclick="this.form.submit()" class="w3-button w3-green hasTooltip" title="<?php echo JHtml::_('tooltipText', 'COM_SEARCH_SEARCH');?>">
				<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>
			</button>
		</div>
		<input type="hidden" name="task" value="search" />
		<div class="clearfix"></div>
	</div>
	<div class="w3-card-2 search-card">
		<div class="w3-padding">
			<div class="searchfor">
				<label class="label-field">
					<?php echo JText::_('COM_SEARCH_FOR'); ?>
				</label>
				<div class="phrases-box">
					<?php echo $this->lists['searchphrase']; ?>
				</div>
			</div>
			<div class="only">
				<label class="label-field">
					<?php echo JText::_('COM_SEARCH_SEARCH_ONLY'); ?>
				</label>
				<?php foreach ($this->searchareas['search'] as $val => $txt) : ?>
					<div class="only-item">
						<?php $checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : ''; ?>
						<label for="area-<?php echo $val; ?>" class="checkbox">
							<input type="checkbox" name="areas[]" value="<?php echo $val; ?>" class="w3-check" id="area-<?php echo $val; ?>" <?php echo $checked; ?> />
							<?php echo JText::_($txt); ?>
						</label>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="order-search">
				<label for="ordering" class="label-field">
					<?php echo JText::_('COM_SEARCH_ORDERING'); ?>
				</label>
				<div class="ordering-box">
					<?php echo $this->lists['ordering']; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="search-foot w3-row">
		<div class="w3-col s6 searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
			<?php if (!empty($this->searchword)) : ?>
				<?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', '<span class="badge badge-info">' . $this->total . '</span>'); ?>
			<?php endif; ?>
		</div>
		<?php if ($this->total > 0) : ?>
			<div class="w3-col s6 form-limit">
				<label for="limit">
					<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
				</label>
				<?php echo $this->pagination->getLimitBox(); ?>
			</div>
		<?php endif; ?>
	</div>
</form>

