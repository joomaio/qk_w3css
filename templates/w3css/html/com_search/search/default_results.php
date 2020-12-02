<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="search-results<?php echo $this->pageclass_sfx; ?>">
<?php foreach ($this->results as $result) : ?>
	<div class="w3-card-2 result-item">
		<div class="w3-container">
			<div class="result-title">
				<?php if ($result->href) : ?>
					<a class="category-title" href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) : ?> target="_blank"<?php endif; ?>>
						<?php echo $result->title; ?>
					</a>
				<?php else : ?>
					<span class="category-title"><?php echo $result->title; ?></span>
				<?php endif; ?>
				<span class="w3-badge w3-blue cat-badge <?php echo $this->pageclass_sfx; ?>">
						<?php echo $this->escape($result->section); ?>
				</span>
			</div>
		</div>
		<div class="w3-container result-created <?php echo $this->pageclass_sfx; ?>">
			<i class="material-icons">date_range</i>
			<?php echo $result->created; ?>
		</div>
		<div class="result-text w3-container">
			<?php echo $result->text; ?>
		</div>
	</div>
<?php endforeach; ?>
</div>
<div class="pagination w3-row">
	<div class="w3-col s12 l3">
		<p class="counter">
			<?php echo $this->pagination->getPagesCounter(); ?>
		</p>
	</div>
	<div class="w3-col s12 l9 w3-right">
		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
</div>
