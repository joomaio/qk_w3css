<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$class  = ' class="first "';
$lang   = JFactory::getLanguage();
$user   = JFactory::getUser();
$groups = $user->getAuthorisedViewLevels();

if ($this->maxLevel != 0 && count($this->children[$this->category->id]) > 0) : ?>

	<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
		<?php // Check whether category access level allows access to subcategories. ?>
		<?php if (in_array($child->access, $groups)) : ?>
			<?php if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) :
				if (!isset($this->children[$this->category->id][$id + 1])) :
					$class = ' class="last "';
				endif;
			?>
			<div<?php echo $class; ?>>
				<?php $class = 'class=""'; ?>
				<?php if ($lang->isRtl()) : ?>
				<div class="w3-card-2 cat-container" onclick="addCategories('category-<?php echo $child->id; ?>')">		
					<a class="sub-category-title" href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id)); ?>">
						<?php echo $this->escape($child->title); ?>
					</a>

					<?php if ( $this->params->get('show_cat_num_articles', 1)) : ?>
						<span class="w3-badge w3-blue cat-badge tip hasTooltip" title="<?php echo JHtml::_('tooltipText', 'COM_CONTENT_NUM_ITEMS_TIP'); ?>">
							<?php echo $child->getNumItems(true); ?>
						</span>
					<?php endif; ?>
				
				<?php else : ?>
					<div class="w3-card-2 card">
					<?php if ($this->maxLevel > 1 && count($child->getChildren()) > 0) : ?>
						<div class="cat-container w3-light-grey" onclick="addCategories('category-<?php echo $child->id; ?>')">
					<?php else : ?>
						<div class="cat-container w3-light-grey">
					<?php endif; ?>	
						<a class="sub-category-title" href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id)); ?>">
							<?php echo $this->escape($child->title); ?>
						</a>
						<?php if ( $this->params->get('show_cat_num_articles', 1)) : ?>
							<span class="w3-badge w3-blue cat-badge tip hasTooltip" title="<?php echo JHtml::_('tooltipText', 'COM_CONTENT_NUM_ITEMS_TIP'); ?>">
								<?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?>&nbsp;
								<?php echo $child->getNumItems(true); ?>
							</span>
						<?php endif; ?>
					</div>
					
				<?php endif; ?>

				<?php if ($this->params->get('show_subcat_desc') == 1) : ?>
					<?php if ($child->description) : ?>
						<div class="category-desc w3-container w3-white">
							<?php echo JHtml::_('content.prepare', $child->description, '', 'com_content.category'); ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($this->maxLevel > 1 && count($child->getChildren()) > 0) : ?>
					<div class="w3-hide" id="category-<?php echo $child->id; ?>">
						<?php
						$this->children[$child->id] = $child->getChildren();
						$this->category = $child;
						$this->maxLevel--;
						echo $this->loadTemplate('children');
						$this->category = $child->getParent();
						$this->maxLevel++;
						?>
					</div>
				<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>

<?php endif;
