<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.W3CSS
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/** @var JDocumentHtml $this */

$document = JFactory::getDocument();
$app  = JFactory::getApplication();
$user = JFactory::getUser();
$title = $document->getTitle();

// Output as HTML5
$this->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

$logo = '<span class="brand-logo"  title="' . $sitename . '">' . $sitename . '</span>';

$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

if ($task === 'edit' || $layout === 'form')
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Adjusting content width
$position7ModuleCount = $this->countModules('position-7');
$position8ModuleCount = $this->countModules('position-8');

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php 
		$document->addStyleSheet('templates/system/css/system.css');
		$document->addStyleSheet('templates/' . $this->template . '/css/template.css');
		$document->addScript('templates/' . $this->template . '/js/template.js'); 
	?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="media/pkg_jaio/w3css/css/w3.css">
	<link rel="stylesheet" href="media/pkg_jaio/w3css/fonts/fontawesome/css/all.css">
	<script src="media/pkg_jaio/w3css/fonts/fontawesome/js/all.js"></script>
</head>
<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '')
	. ($this->direction === 'rtl' ? ' rtl' : '');
?>">
	<!-- Body -->
	<div class="body w3-white" id="top">
		<!-- Header -->
		<div class="w3-sidebar w3-black w3-animate-top w3-xxlarge" style="display: none; padding-top: 150px; width: 100%;" id="rightMenu">
			<a href="javascript:void(0)" onclick="closeRightMenu()" class="w3-button w3-black w3-xxlarge w3-padding w3-display-topright" style="padding:6px 24px">
				<i class="material-icons">close</i>
			</a>
			<div class="menu-toggle w3-center ">
				<jdoc:include type="modules" name="position-1" style="none" />
			</div>
		</div>
		<div class="w3-bar w3-card-2 main-header" role="banner">
			<?php if ($this->countModules('position-1')) : ?>
			<nav id="nav-bar-header">
				<div class="w3-container nav-wrapper">
					<div class="w3-container header-bar">
						<a class="brand pull-left w3-text-black w3-bar-item w3-button" href="<?php echo $this->baseurl; ?>/">
							<?php echo $logo ?>
						</a>
						<span class="w3-hide-medium top-menu">
							<jdoc:include type="modules" name="position-1" style="none" />
						</span>
						
						<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large" onclick="openRightMenu()">&#9776;</a>
						<a class="w3-right">
							<jdoc:include type="modules" name="position-0" style="none" />
						</a>
					</div>
				</div>
			</nav>
			<?php endif; ?>
		</div>

		<jdoc:include type="modules" name="banner" style="none" />
		
		<div class="w3-content" id="main-content" style="max-width:1400px">
			<jdoc:include type="modules" name="position-2" style="none" />
			<div class="w3-row-padding">
				<?php if (!$position7ModuleCount) : ?>
					<div class="w3-col s12 main-content">
						<main id="content" role="main" class="<?php //echo $span; ?>">
							<!-- Begin Content -->
									<jdoc:include type="message" />
									<jdoc:include type="component" />
									<div class="clearfix"></div>
									
							<!-- End Content -->
						</main>
					</div>
				<?php else: ?>
					<div class="w3-col s12 m12 l8 main-content">
						<main id="content" role="main" class="w3-margin<?php //echo $span; ?>">
							<!-- Begin Content -->
							<jdoc:include type="message" />
							<jdoc:include type="component" />
							<div class="clearfix"></div>
							
							<!-- End Content -->
						</main>
					</div>
							
					<div class="w3-col l4">
						<div class="right-menu">
							<jdoc:include type="modules" name="position-7" style="well" />
						</div>
					</div>	
				<?php endif ?>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="back-top-container">
			<a href="#top" id="back-top" class="w3-button w3-green">
				<i class="material-icons">arrow_upward</i>
			</a>
		</div>
		<div class="w3-center container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
			<hr />
			<jdoc:include type="modules" name="footer" style="none" />
			
			<p>
				&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
			</p>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
