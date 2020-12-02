<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$tparams = $this->item->params;
?>

<div class="contact<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Person">
	<div class="w3-padding">
		<div class="w3-card-2">
			<div class="w3-row-padding">
				<div class="w3-col s9">
					<?php if ($this->contact->name && $tparams->get('show_name')) : ?>
						<div class="page-header">
							<h2 class="category-title">
								<?php if ($this->item->published == 0) : ?>
									<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
								<?php endif; ?>
								<span class="contact-name" itemprop="name"><?php echo $this->contact->name; ?></span>
							</h2>
						</div>
					<?php endif; ?>
				</div>
				<div class="w3-col s3">
					<?php if ($tparams->get('show_contact_list') && count($this->contacts) > 1) : ?>
						<form action="#" method="get" name="selectForm" class="select-contact" id="selectForm">
							<label for="select_contact"><?php echo JText::_('COM_CONTACT_SELECT_CONTACT'); ?></label>
							<?php echo JHtml::_('select.genericlist', $this->contacts, 'select_contact', 'class="inputbox" onchange="document.location.href = this.value"', 'link', 'name', $this->contact->link); ?>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php $show_contact_category = $tparams->get('show_contact_category'); ?>

	<?php if ($show_contact_category === 'show_no_link') : ?>
		<h3>
			<span class="contact-category"><?php echo $this->contact->category_title; ?></span>
		</h3>
	<?php elseif ($show_contact_category === 'show_with_link') : ?>
		<?php $contactLink = ContactHelperRoute::getCategoryRoute($this->contact->catid); ?>
		<h3>
			<span class="contact-category"><a href="<?php echo $contactLink; ?>">
				<?php echo $this->escape($this->contact->category_title); ?></a>
			</span>
		</h3>
	<?php endif; ?>

	<?php echo $this->item->event->afterDisplayTitle; ?>

	<?php if ($tparams->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
		<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
	<?php endif; ?>

	<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php $presentation_style = $tparams->get('presentation_style'); ?>
	<?php $accordionStarted = false; ?>
	<?php $tabSetStarted = false; ?>

	<?php if ($this->params->get('show_info', 1)) : ?>
		<div class="w3-row-padding profile-contact">
			<div class="w3-col s12 m6">
				<?php if ($this->contact->image && $tparams->get('show_image')) : ?>
					<div class="thumbnail pull-right">
						<?php echo JHtml::_('image', $this->contact->image, htmlspecialchars($this->contact->name,  ENT_QUOTES, 'UTF-8'), array('itemprop' => 'image')); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="w3-col s12 m6">
				<?php if ($this->contact->con_position && $tparams->get('show_position')) : ?>
					<dl class="contact-position dl-horizontal">
						<dt><?php echo JText::_('COM_CONTACT_POSITION'); ?>:</dt>
						<dd itemprop="jobTitle">
							<?php echo $this->contact->con_position; ?>
						</dd>
					</dl>
				<?php endif; ?>
				<?php echo $this->loadTemplate('address'); ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($tparams->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>
		<div class="w3-card-2 w3-margin">
			<div class="w3-padding w3-light-grey">
				<?php echo '<span class="category-title">' . JText::_('COM_CONTACT_EMAIL_FORM') . '</span>'; ?>
			</div>
			<div class="w3-padding">
				<?php echo $this->loadTemplate('form'); ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="w3-row-padding">
		<?php if ($tparams->get('show_links')) : ?>
			<div class="w3-col s12 m6">
				<?php echo $this->loadTemplate('links'); ?>
			</div>
		<?php endif; ?>

		<?php if ($tparams->get('show_articles') && $this->contact->user_id && $this->contact->articles) : ?>
			<div class="w3-col s12 m6">
				<div class="w3-card-2">
					<div class="w3-padding w3-light-grey">
						<?php echo '<span class="category-title">' . JText::_('JGLOBAL_ARTICLES') . '</span>'; ?>
					</div>
					<div class="w3-padding">
						<?php echo $this->loadTemplate('articles'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($tparams->get('show_profile') && $this->contact->user_id && JPluginHelper::isEnabled('user', 'profile')) : ?>
			<div class="w3-col s12 m6">
				<div class="w3-card-2">
					<div class="w3-padding w3-light-grey">
						<?php echo '<span class="category-title">' . JText::_('COM_CONTACT_PROFILE') . '</span>'; ?>
					</div>
					<div class="w3-padding">
						<?php echo $this->loadTemplate('profile'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if ($tparams->get('show_user_custom_fields') && $this->contactUser) : ?>
			<div class="w3-col s12 m6">
				<div class="w3-card-2">
					<?php echo $this->loadTemplate('user_custom_fields'); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this->contact->misc && $tparams->get('show_misc')) : ?>
			<div class="w3-col s12 m6">
				<div class="w3-card-2">
					<div class="w3-padding w3-light-grey">
						<?php echo '<span class="category-title">' . JText::_('COM_CONTACT_OTHER_INFORMATION') . '</span>'; ?>
					</div>
					<div class="w3-padding">
						<?php echo $this->contact->misc; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>	

	<?php echo $this->item->event->afterDisplayContent; ?>
</div>
