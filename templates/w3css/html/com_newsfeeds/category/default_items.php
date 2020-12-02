<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_newsfeeds
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$n         = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

?>
<?php if (empty($this->items)) : ?>
	<p><?php echo JText::_('COM_NEWSFEEDS_NO_ARTICLES'); ?></p>
<?php else : ?>
<div class="nf-form-list">
	<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString(), ENT_COMPAT, 'UTF-8'); ?>" method="post" name="adminForm" id="adminForm">
		<?php if ($this->params->get('filter_field') !== 'hide' || $this->params->get('show_pagination_limit')) : ?>
			<div class="w3-card-2">
				<div class="w3-padding w3-light-grey">
					<span class="category-title">Filter Form</span>
				</div>
				<div class="filters">
					<?php if ($this->params->get('filter_field') !== 'hide' && $this->params->get('filter_field') == '1') : ?>
						<div class="nf-filter-search w3-padding">
							<div class="label">
								<?php echo JText::_('JUNPUBLISHED'); ?>
								<?php echo JText::_('COM_NEWSFEEDS_FILTER_LABEL') . '&#160;'; ?>
							</div>
							<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->state->get('list.filter')); ?>" class="inputbox" onchange="document.adminForm.submit();" title="<?php echo JText::_('COM_NEWSFEEDS_FILTER_SEARCH_DESC'); ?>" placeholder="<?php echo JText::_('COM_NEWSFEEDS_FILTER_SEARCH_DESC'); ?>" />
						</div>
					<?php endif; ?>
					<?php if ($this->params->get('show_pagination_limit')) : ?>
						<div class="nf-filter-limit w3-padding">
							<div class="label">
								<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
							</div>
							<?php echo $this->pagination->getLimitBox(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
			
		<div class="w3-card-4 table-card">
			<div class="w3-light-grey w3-padding">
				<?php if ($this->params->get('show_category_title', 1)) : ?>
					<h2 class="category-title">
						<?php echo JHtml::_('content.prepare', $this->category->title, '', 'com_newsfeeds.category.title'); ?>
					</h2>
				<?php endif; ?>
			</div>
			<div class="w3-padding">
				<table class="w3-table w3-striped">
					<tbody>
						<tr>
							<td><span><b>Name</b></span></td>
							<?php if ($this->params->get('show_link')) : ?>
								<td><span><b>Links</b></span></td>		
							<?php endif; ?>
						</tr>
						<?php foreach ($this->items as $i => $item) : ?>
							<?php if ($this->items[$i]->published == 0) : ?>
								<tr class="system-unpublished w3-padding">
							<?php else : ?>
								<tr class="w3-padding">
							<?php endif; ?>
							<td>
								<span class="list pull-left">
									<div class="list-title">
										<a href="<?php echo JRoute::_(NewsFeedsHelperRoute::getNewsfeedRoute($item->slug, $item->catid)); ?>">
											<?php echo $item->name; ?>
										</a>
									</div>
								</span>
							</td>
							<?php if ($this->items[$i]->published == 0) : ?>
								<span class="label label-warning">
									<?php echo JText::_('JUNPUBLISHED'); ?>
								</span>
							<?php endif; ?>
							<?php if ($this->params->get('show_link')) : ?>
								<td>
									<?php $link = JStringPunycode::urlToUTF8($item->link); ?>
									<span class="list pull-left">
										<a href="<?php echo $item->link; ?>">
											<?php echo $link; ?>
										</a>
									</span>
								</td>
							<?php endif; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php // Add pagination links ?>
		<?php if (!empty($this->items)) : ?>
			<?php if (($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
				<div class="pagination w3-row">
					<div class="w3-col s12 l3">
						<?php if ($this->params->def('show_pagination_results', 1)) : ?>
							<p class="counter pull-right">
								<?php echo $this->pagination->getPagesCounter(); ?>
							</p>
						<?php endif; ?>
					</div>
					<div class="w3-col s12 l9">
						<?php echo $this->pagination->getPagesLinks(); ?>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</form>
</div>
<?php endif; ?>
