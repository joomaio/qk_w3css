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
	<dd class="modified">
		<i class="material-icons">update</i>
		<time datetime="<?php echo JHtml::_('date', $displayData['item']->modified, 'c'); ?>" itemprop="dateModified">
			<?php echo JHtml::_('date', $displayData['item']->modified, JText::_('DATE_FORMAT_LC3')); ?>
		</time>
	</dd>