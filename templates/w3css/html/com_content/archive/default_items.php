<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$params = $this->params;
?>

<div id="archive-items">
	<?php foreach ($this->items as $i => $item) : ?>
		<?php $info = $item->params->get('info_block_position', 0); ?>
		<div class="w3-container archived-item" itemscope itemtype="https://schema.org/Article">
			<div class="w3-card-4">
				<div class="header-article w3-padding w3-light-grey">
					<div class="page-header">
						<h2 class="article-title">
							<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)); ?>" itemprop="url">
								<?php echo $this->escape($item->title); ?>
							</a>
						</h2>
					</div>
				
				<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
					|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category')); ?>
				<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
					<div class="article-info-container muted">
						<dl class="article-info">
							<?php if ($params->get('show_author') && !empty($item->author )) : ?>
							<dd>
								<div class="createdby" itemprop="author" itemscope itemtype="https://schema.org/Person">
								<?php $author = $item->created_by_alias ?: $item->author; ?>
								<i class="material-icons">person</i>
									<?php if (!empty($item->contact_link) && $params->get('link_author') == true) : ?>
										<?php echo JHtml::_('link', $this->item->contact_link, $author, array('itemprop' => 'url')); ?>
									<?php else : ?>
										<?php echo $author; ?>
									<?php endif; ?>
								</div>
							</dd>
							<?php endif; ?>
							<?php if ($params->get('show_parent_category') && !empty($item->parent_slug)) : ?>
								<dd>
									<div class="parent-category-name">
										<?php $title = $this->escape($item->parent_title); ?>
										<i class="material-icons">folder_shared</i>
										<?php if ($params->get('link_parent_category') && !empty($item->parent_slug)) : ?>
											<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->parent_slug)) . '" itemprop="genre">' . $title . '</a>'; ?>
											<?php echo $url; ?>
										<?php else : ?>
											<?php echo '<span itemprop="genre">' . $title . '</span>'; ?>
										<?php endif; ?>
									</div>
								</dd>
							<?php endif; ?>
						<?php if ($params->get('show_category')) : ?>
							<dd>
								<div class="category-name">
									<?php $title = $this->escape($item->category_title); ?>
									<i class="material-icons">folder</i>
									<?php if ($params->get('link_category') && $item->catslug) : ?>
										<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)) . '" itemprop="genre">' . $title . '</a>'; ?>
										<?php echo $url; ?>
									<?php else : ?>
										<?php echo '<span itemprop="genre">' . $title . '</span>'; ?>
									<?php endif; ?>
								</div>
							</dd>
						<?php endif; ?>

						<?php if ($params->get('show_publish_date')) : ?>
							<dd>
								<div class="published">
									<i class="material-icons">date_range</i>
									<time datetime="<?php echo JHtml::_('date', $item->publish_up, 'c'); ?>" itemprop="datePublished">
										<?php echo JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC4')); ?>
									</time>
								</div>
							</dd>
						<?php endif; ?>

						<?php if ($info == 0) : ?>
							<?php if ($params->get('show_modify_date')) : ?>
								<dd>
									<div class="modified">
										<i class="material-icons">update</i>
										<time datetime="<?php echo JHtml::_('date', $item->modified, 'c'); ?>" itemprop="dateModified">
											<?php echo JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC4')); ?>
										</time>
									</div>
								</dd>
							<?php endif; ?>
							<?php if ($params->get('show_create_date')) : ?>
								<dd>
									<div class="create">
										<i class="material-icons">access_time<i>
										<time datetime="<?php echo JHtml::_('date', $item->created, 'c'); ?>" itemprop="dateCreated">
											<?php echo JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC4')); ?>
										</time>
									</div>
								</dd>
							<?php endif; ?>

							<?php if ($params->get('show_hits')) : ?>
								<dd>
									<div class="hits">
										<i class="material-icons">remove_red_eye</i>
										<meta itemprop="interactionCount" content="UserPageVisits:<?php echo $item->hits; ?>" />
										<?php echo $item->hits; ?>
									</div>
								</dd>
							<?php endif; ?>
						<?php endif; ?>
						</dl>
					</div>
				<?php endif; ?>
				</div>

				<?php if ($params->get('show_intro')) : ?>
					<div class="w3-padding intro" itemprop="articleBody"> <?php echo JHtml::_('string.truncateComplex', $item->introtext, $params->get('introtext_limit')); ?> 
					</div>
				<?php endif; ?>

				<?php if ($useDefList && ($info == 1 || $info == 2)) : ?>
					<div class="article-info-container muted">
						<dl class="article-info">

						<?php if ($info == 1) : ?>
							<?php if ($params->get('show_parent_category') && !empty($item->parent_slug)) : ?>
								<dd>
									<div class="parent-category-name">
										<?php $title = $this->escape($item->parent_title); ?>
										<i class="material-icons">folder_shared</i>
										<?php if ($params->get('link_parent_category') && $item->parent_slug) : ?>
											<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->parent_slug)) . '" itemprop="genre">' . $title . '</a>'; ?>
											<?php echo $url; ?>
										<?php else : ?>
											<?php echo '<span itemprop="genre">' . $title . '</span>'; ?>
										<?php endif; ?>
									</div>
								</dd>
							<?php endif; ?>
							<?php if ($params->get('show_category')) : ?>
								<dd>
									<div class="category-name">
										<?php $title = $this->escape($item->category_title); ?>
										<i class="material-icons">folder</i>
										<?php if ($params->get('link_category') && $item->catslug) : ?>
											<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)) . '" itemprop="genre">' . $title . '</a>'; ?>
											<?php echo $url; ?>
										<?php else : ?>
											<?php echo '<span itemprop="genre">' . $title . '</span>'; ?>
										<?php endif; ?>
									</div>
								</dd>
							<?php endif; ?>
							<?php if ($params->get('show_publish_date')) : ?>
								<dd>
									<div class="published">
										<i class="material-icons">date_range</i>
										<time datetime="<?php echo JHtml::_('date', $item->publish_up, 'c'); ?>" itemprop="datePublished">
											<?php echo JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC4')); ?>
										</time>
									</div>
								</dd>
							<?php endif; ?>
						<?php endif; ?>

						<?php if ($params->get('show_create_date')) : ?>
							<dd>
								<div class="create">
									<i class="material-icons">access_time<i>
									<time datetime="<?php echo JHtml::_('date', $item->created, 'c'); ?>" itemprop="dateCreated">
										<?php echo JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC4')); ?>
									</time>
								</div>
							</dd>
						<?php endif; ?>
						<?php if ($params->get('show_modify_date')) : ?>
							<dd>
								<div class="modified">
									<i class="material-icons">update<i>
									<time datetime="<?php echo JHtml::_('date', $item->modified, 'c'); ?>" itemprop="dateModified">
										<?php echo JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC4')); ?>
									</time>
								</div>
							</dd>
						<?php endif; ?>
						<?php if ($params->get('show_hits')) : ?>
							<dd>
								<div class="hits">
									<i class="material-icons">remove_red_eye</i>
									<meta content="UserPageVisits:<?php echo $item->hits; ?>" itemprop="interactionCount" />
									<?php echo $item->hits; ?>
								</div>
							</dd>
						<?php endif; ?>
						</dl>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<div class="pagination w3-row-padding">
	<div class="w3-col s12 l3">
		<p class="counter"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
	</div>
	<div class="w3-col s12 l9">
		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
</div>
