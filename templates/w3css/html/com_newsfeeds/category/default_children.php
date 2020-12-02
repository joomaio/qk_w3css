<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_newsfeeds
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<?php $class = ' class="first w3-container"'; ?>
<?php if ($this->maxLevel != 0 && count($this->children[$this->category->id]) > 0) : ?>
		<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
			<?php if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) : ?>
				<?php if (!isset($this->children[$this->category->id][$id + 1])) : ?>
					<?php $class = ' class="last w3-container"'; ?>
				<?php endif; ?>
				<div<?php echo $class; ?>>
					<?php $class = 'class="w3-container"'; ?>
					<div class="w3-card-2 card">
						<?php if (count($child->getChildren()) > 0) : ?>
							<div class="cat-container w3-light-grey" onclick="addCategories('category-<?php echo $child->id; ?>')">
						<?php else : ?>
							<div class="cat-container w3-light-grey">
						<?php endif; ?>
						<a class="sub-category-title" href="<?php echo JRoute::_(NewsfeedsHelperRoute::getCategoryRoute($child->id)); ?>">
							<?php echo $this->escape($child->title); ?>
						</a>
						<?php if ($this->params->get('show_cat_items') == 1) : ?>
							<span class="w3-badge w3-blue cat-badge">
								<?php echo JText::_('COM_NEWSFEEDS_CAT_NUM'); ?>
								<?php echo $child->numitems; ?>
							</span>
						<?php endif; ?>
					</div>
					
					<?php if ($this->params->get('show_subcat_desc') == 1) : ?>
						<?php if ($child->description) : ?>
							<div class="category-desc w3-container w3-white">
								<?php echo JHtml::_('content.prepare', $child->description, '', 'com_newsfeeds.category'); ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
					
					<?php if (count($child->getChildren()) > 0) : ?>
						<div class="w3-hide" id="category-<?php echo $child->id; ?>">
							<?php $this->children[$child->id] = $child->getChildren(); ?>
							<?php $this->category = $child; ?>
							<?php $this->maxLevel--; ?>
							<?php echo $this->loadTemplate('children'); ?>
							<?php $this->category = $child->getParent(); ?>
							<?php $this->maxLevel++; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
<?php endif;
