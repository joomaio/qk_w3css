<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
			<dd class="parent-category-name">
				<?php $title = $this->escape($displayData['item']->parent_title); ?>
				<i class="material-icons">folder_shared</i>
				<?php if ($displayData['params']->get('link_parent_category') && !empty($displayData['item']->parent_slug)) : ?>
					<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($displayData['item']->parent_slug)) . '" itemprop="genre">' . $title . '</a>'; ?>
					<?php echo $url; ?>
				<?php else : ?>
					<?php echo '<span itemprop="genre">' . $title . '</span>'; ?>
				<?php endif; ?>
			</dd>