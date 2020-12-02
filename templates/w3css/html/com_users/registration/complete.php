<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="registration-complete<?php echo $this->pageclass_sfx; ?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="w3-card-4">
			<div class="w3-light-grey w3-padding w3-center">
				<span class="category-title"><?php echo $this->escape($this->params->get('page_heading')); ?></span>
			</div>
			<div class="w3-padding">
				<p>Thanks to your registration</p>
			</div>
		</div>
	<?php endif; ?>
</div>
