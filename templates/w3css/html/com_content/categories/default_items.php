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

$class = ' class="first w3-container"';

if ($this->maxLevelcat != 0 && count($this->items[$this->parent->id]) > 0) :
?>
	<?php foreach ($this->items[$this->parent->id] as $id => $item) : ?>
		<?php
		if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
		if (!isset($this->items[$this->parent->id][$id + 1]))
		{
			$class = ' class="last w3-container"';
		}
		?>
		<div <?php echo $class; ?> >
		<?php $class = 'class="w3-container"'; ?>
			<div class="w3-card-2 card">
			<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
				<div class="cat-container w3-light-grey" onclick="addCategories('category-<?php echo $item->id; ?>')">
			<?php else : ?>
				<div class="cat-container w3-light-grey">
			<?php endif; ?>		
					<a class="category-title" href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language)); ?>">
						<?php echo $this->escape($item->title); ?>
					</a>
					<?php if ($this->params->get('show_cat_num_articles_cat') == 1) :?>
						<span class="w3-badge w3-blue cat-badge tip hasTooltip" title="<?php echo JHtml::_('tooltipText', 'COM_CONTENT_NUM_ITEMS_TIP'); ?>">
							<?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?>&nbsp;
							<?php echo $item->numitems; ?>
						</span>
					<?php endif; ?>
				</div>
			<?php if ($this->params->get('show_description_image') && $item->getParams()->get('image')) : ?>
				<img src="<?php echo $item->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>" />
			<?php endif; ?>
			<?php if ($this->params->get('show_subcat_desc_cat') == 1) : ?>
				<?php if ($item->description) : ?>
					<div class="category-desc w3-container w3-white">
						<?php echo JHtml::_('content.prepare', $item->description, '', 'com_content.categories'); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
				<div class="w3-hide" id="category-<?php echo $item->id; ?>">
				<?php
				$this->items[$item->id] = $item->getChildren();
				$this->parent = $item;
				$this->maxLevelcat--;
				echo $this->loadTemplate('items');
				$this->parent = $item->getParent();
				$this->maxLevelcat++;
				?>
				</div>
			<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
