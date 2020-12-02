<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.core');

?>
<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" class="w3-padding" name="adminForm" id="adminForm">
	<?php if ($this->params->get('filter_field') || $this->params->get('show_pagination_limit')) : ?>
		<div class="filters btn-toolbar w3-card-4">
			<h3 class="w3-light-grey w3-container w3-padding page-header">Filter Form</h3>
			<div class ="w3-row-padding filter-form">
			<?php if ($this->params->get('filter_field')) : ?>
				<div class="w3-col s12 l9 filter">
					<div class="cat-label">
						<span class="label label-warning">
							<?php echo JText::_('JUNPUBLISHED'); ?>
						</span>
							<?php echo JText::_('COM_CONTACT_FILTER_LABEL') . '&#160;'; ?>
					</div>
					<input
						type="text"
						name="filter-search"
						id="filter-search"
						value="<?php echo $this->escape($this->state->get('list.filter')); ?>"
						class="inputbox"
						onchange="document.adminForm.submit();"
						title="<?php echo JText::_('COM_CONTACT_FILTER_SEARCH_DESC'); ?>"
						placeholder="<?php echo JText::_('COM_CONTACT_FILTER_SEARCH_DESC'); ?>"
					/>
				</div>
			<?php endif; ?>
			<?php if ($this->params->get('show_pagination_limit')) : ?>
				<div class="w3-col s12 l3 limit">
					<div class="cat-label">
						<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
					</div>
					<?php echo $this->pagination->getLimitBox(); ?>
				</div>
			<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	<?php if (empty($this->items)) : ?>
		<p>
			<?php echo JText::_('COM_CONTACT_NO_CONTACTS'); ?>
		</p>
	<?php else : ?>
		<table class="contact-table w3-table w3-striped w3-border">
			<tbody>
				<tr>
					<td class="t-head t-name">Name</td>
					<td class="t-head t-address">Address</td>
					<td class="t-head t-phone">Phone</td>
				</tr>
			<?php foreach ($this->items as $i => $item) : ?>
				<?php if (in_array($item->access, $this->user->getAuthorisedViewLevels())) : ?>
				<tr>
					<td class="t-name">
						<?php if ($this->params->get('show_image_heading')) : ?>
							<?php $contactWidth = 7; ?>
								<?php if ($this->items[$i]->image) : ?>
									<a href="<?php echo JRoute::_(ContactHelperRoute::getContactRoute($item->slug, $item->catid)); ?>">
										<?php echo JHtml::_(
											'image',
											$this->items[$i]->image,
											JText::_('COM_CONTACT_IMAGE_DETAILS'),
											array('class' => 'contact-thumbnail img-thumbnail')
										); ?>
									</a>
								<?php endif; ?>
						<?php else : ?>
							<?php $contactWidth = 9; ?>
						<?php endif; ?>
						<a href="<?php echo JRoute::_(ContactHelperRoute::getContactRoute($item->slug, $item->catid)); ?>">
							<?php echo $item->name; ?>
						</a>
						<?php if ($this->items[$i]->published == 0) : ?>
							<span class="label label-warning">
								<?php echo JText::_('JUNPUBLISHED'); ?>
							</span>
						<?php endif; ?>
					</td>
					
					<td class="t-address">
						
						<?php echo $item->event->afterDisplayTitle; ?>
						<?php echo $item->event->beforeDisplayContent; ?>
						<?php if ($this->params->get('show_position_headings')) : ?>
							<?php echo $item->con_position; ?><br />
						<?php endif; ?>
						<?php if ($this->params->get('show_email_headings')) : ?>
							<?php echo $item->email_to; ?><br />
						<?php endif; ?>
						<?php $location = array(); ?>
						<?php if ($this->params->get('show_suburb_headings') && !empty($item->suburb)) : ?>
							<?php $location[] = $item->suburb; ?>
						<?php endif; ?>
						<?php if ($this->params->get('show_state_headings') && !empty($item->state)) : ?>
							<?php $location[] = $item->state; ?>
						<?php endif; ?>
						<?php if ($this->params->get('show_country_headings') && !empty($item->country)) : ?>
							<?php $location[] = $item->country; ?>
						<?php endif; ?>
						<?php echo implode(', ', $location); ?>
					</td>
					<td class="t-phone">
						<?php if ($this->params->get('show_telephone_headings') && !empty($item->telephone)) : ?>
							<?php echo $item->telephone; ?><br />
						<?php endif; ?>
						<?php if ($this->params->get('show_mobile_headings') && !empty ($item->mobile)) : ?>
							<?php echo $item->mobile; ?><br />
						<?php endif; ?>
						<?php if ($this->params->get('show_fax_headings') && !empty($item->fax)) : ?>
							<?php echo $item->fax; ?><br />
						<?php endif; ?>
					</td>
					<?php echo $item->event->afterDisplayContent; ?>
				</tr>
				<?php endif; ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
	<?php if ($this->params->get('show_pagination', 2)) : ?>
		<div class="pagination w3-row">
			<div class="w3-col s12 l3">
				<?php if ($this->params->def('show_pagination_results', 1)) : ?>
					<p class="counter">
						<?php echo $this->pagination->getPagesCounter(); ?>
					</p>
				<?php endif; ?>
			</div>
			<div class="w3-col s12 l9">
				<?php echo $this->pagination->getPagesLinks(); ?>
			</div>
		</div>
	<?php endif; ?>
	<div>
		<input type="hidden" name="filter_order" value="<?php echo $this->escape($this->state->get('list.ordering')); ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->escape($this->state->get('list.direction')); ?>" />
	</div>
</form>
