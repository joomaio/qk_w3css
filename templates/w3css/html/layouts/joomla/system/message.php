<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.protostar
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$msgList = $displayData['msgList'];

$alert = array('error' => 'alert-error', 'warning' => '', 'notice' => 'alert-info', 'message' => 'alert-success');
$color = array('error' => 'w3-grey w3-text-white', 'warning' => 'w3-red w3-text-white', 'notice' => 'w3-blue w3-text-white', 'message' => 'w3-green w3-text-white');
?>
<div id="system-message-container">
	<?php if (is_array($msgList) && !empty($msgList)) : ?>
		<div id="system-message">
			<?php foreach ($msgList as $type => $msgs) : ?>
				<div class="alert w3-margin w3-padding <?php echo $color[$type]; ?>">
					<?php // This requires JS so we should add it through JS. Progressive enhancement and stuff. ?>
					<a class="close-alert" data-dismiss="alert">x</a>

					<?php if (!empty($msgs)) : ?>
						<h3 class="alert-heading"><?php echo JText::_($type); ?></h3>
							<?php foreach ($msgs as $msg) : ?>
								<p class="alert-message"><?php echo $msg; ?></p>
							<?php endforeach; ?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
