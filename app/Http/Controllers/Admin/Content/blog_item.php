<?php
/**
 * @version		$Id: blog_item.php 11902 2012-03-26 10:19:24Z tuyetvt $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
$images = json_decode($this->item->images);
$canEdit	= $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);
$app 		= JFactory::getApplication();
$template 	= $app->getTemplate();
$jsnUtils   = JSNTplUtils::getInstance();

JHtml::_('behavior.tooltip');
?>
<?php if ($jsnUtils->isJoomla3()):

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtmlBootstrap::dropdown('dropdown-toggle');
?>
<?php else :
//JHtml::addIncludePath(JPATH_COMPONENT. DIRECTORY_SEPARATOR .'helpers');
JHtml::addIncludePath(JPATH_THEMES. DIRECTORY_SEPARATOR .$template. DIRECTORY_SEPARATOR .'html'. DIRECTORY_SEPARATOR .'com_content');
?>
<?php endif; ?>
<?php if ($jsnUtils->isJoomla3()):
JHtml::_('behavior.framework');?>
	
	<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
	|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != '0000-00-00 00:00:00' )) : ?>
	<div class="system-unpublished">
<?php endif; ?>

<?php if ($useDefList || $canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
<div class="jsn-article-toolbar">
<?php // Todo Not that elegant would be nice to group the params ?>
<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
	|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') ); ?>

<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
	<div class="article-info muted full-left">
		<dl class="article-info">
		<dt class="article-info-term"><?php echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></dt>

		
		<?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
			<dd class="parent-category-name">
				<?php $title = $this->escape($this->item->parent_title); ?>
				<?php if ($params->get('link_parent_category') && !empty($this->item->parent_slug)) : ?>
					<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)) . '" itemprop="genre">' . $title . '</a>'; ?>
					<i class="jsn-icon-folder"></i>
					<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
				<?php else : ?>
					<i class="jsn-icon-folder"></i>
					<?php echo JText::sprintf('COM_CONTENT_PARENT', '<span itemprop="genre">' . $title . '</span>'); ?>
				<?php endif; ?>
			</dd>
		<?php endif; ?>
		<?php if ($params->get('show_category')) : ?>
			<dd class="category-name">
				<?php $title = $this->escape($this->item->category_title); ?>
				<?php if ($params->get('link_category') && $this->item->catslug) : ?>
					<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)) . '" itemprop="genre">' . $title . '</a>'; ?>
					<i class="jsn-icon-folder"></i>
					<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
				<?php else : ?>
					<i class="jsn-icon-folder"></i>
					<?php echo JText::sprintf('COM_CONTENT_CATEGORY', '<span itemprop="genre">' . $title . '</span>'); ?>
				<?php endif; ?>
			</dd>
		<?php endif; ?>

		<?php if ($params->get('show_publish_date')) : ?>
			<dd class="published">
				<i class="jsn-icon-calendar"></i>
				<time datetime="<?php echo JHtml::_('date', $this->item->publish_up, 'c'); ?>" itemprop="datePublished">
					<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
				</time>
			</dd>
		<?php endif; ?>

		<?php if ($info == 0) : ?>
			<?php if ($params->get('show_modify_date')) : ?>
				<dd class="modified">
					<i class="jsn-icon-clock"></i>
					<time datetime="<?php echo JHtml::_('date', $this->item->modified, 'c'); ?>" itemprop="dateModified">
						<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
					</time>
				</dd>
			<?php endif; ?>
			<?php if ($params->get('show_create_date')) : ?>
				<dd class="create">
					<i class="jsn-icon-clock"></i>
					<time datetime="<?php echo JHtml::_('date', $this->item->created, 'c'); ?>" itemprop="dateCreated">
						<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC3'))); ?>
					</time>
				</dd>
			<?php endif; ?>

			<?php if ($params->get('show_hits')) : ?>
				<dd class="hits">
					<i class="jsn-icon-eye"></i>
					<meta itemprop="interactionCount" content="UserPageVisits:<?php echo $this->item->hits; ?>" />
					<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
				</dd>
			<?php endif; ?>
		<?php endif; ?>
		</dl>
	</div>
<?php endif; ?>

</div>
<?php endif; ?>
<?php if ($params->get('show_tags') && !empty($this->item->tags->itemTags)) : ?>
	<?php echo JLayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
<?php endif; ?>


<!-- ?????????? ???????????????? -->
<?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
<div>
<!-- ?????????? ???????????????? -->
<?php echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?>

<?php if (!$params->get('show_intro')) : ?>
<?php //echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?> <?php echo $this->item->introtext; ?>

<?php if ($useDefList && ($info == 1 || $info == 2)) : ?>
	<?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
<?php  endif; ?>

<?php if ($params->get('show_readmore') && $this->item->readmore) :
	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
		$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		$link = new JUri($link1);
		$link->setVar('return', base64_encode($returnURL));
	endif; ?>

	<?php echo JLayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>

<?php endif; ?>
</div>

<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
	|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != '0000-00-00 00:00:00' )) : ?>
</div>
<?php endif; ?>

<?php echo $this->item->event->afterDisplayContent; ?>
<?php // End override HTML J3 ?>

<?php else : ?>
<?php
JHtml::addIncludePath(JPATH_THEMES. DIRECTORY_SEPARATOR .$template. DIRECTORY_SEPARATOR .'html'. DIRECTORY_SEPARATOR .'com_content');
JHtml::core();
$images = json_decode($this->item->images);
$showParentCategory = $params->get('show_parent_category');
$showCategory = ($params->get('show_category',0));
$showInfo = ($params->get('show_author') OR $params->get('show_create_date') OR $params->get('show_publish_date') OR $params->get('show_hits'));
$showTools = ($params->get('show_print_icon') || $canEdit || ($this->params->get( 'show_print_icon' ) || $this->params->get('show_email_icon')));

?>

<?php if ($this->item->state == 0) : ?>
<div class="system-unpublished">
<?php endif; ?>
<div class="jsn-article">
<?php if ($params->get('show_title')) : ?>
	<h2 class="contentheading">
		<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
			<?php echo $this->escape($this->item->title); ?></a>
		<?php else : ?>
			<?php echo $this->escape($this->item->title); ?>
		<?php endif; ?>
	</h2>
<?php endif; ?>

<?php if (!$params->get('show_intro')) : ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php if ($showParentCategory || $showCategory) : ?>
	<div class="jsn-article-metadata">
		<?php if ($showParentCategory) : ?>
				<span class="parent-category-name">
					<?php	$title = $this->escape($this->item->parent_title);
							$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_id)) . '">' . $title . '</a>'; ?>
					<?php if ($params->get('link_parent_category')) : ?>
						<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
						<?php else : ?>
						<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
					<?php endif; ?>
				</span>
		<?php endif; ?>

		<?php if ($showCategory) : ?>
				<span class="category-name">
					<?php 	$title = $this->escape($this->item->category_title);
							$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catid)) . '">' . $title . '</a>'; ?>
					<?php if ($params->get('link_category')) : ?>
						<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
						<?php else : ?>
						<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
					<?php endif; ?>
				</span>
		<?php endif; ?>				
	</div>
	<?php endif; ?>
	
	<?php if ($showInfo || $showTools) : ?>
	<div class="jsn-article-toolbar">
		<?php if ($showTools) : ?>
		<ul class="jsn-article-tools pull-right">
				<?php if ($this->params->get( 'show_print_icon' )) : ?>
					<li class="jsn-article-print-button"><?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?></li>
				<?php endif; ?>
				<?php if ($this->params->get('show_email_icon')) : ?>
					<li class="jsn-article-email-button"><?php echo JHtml::_('icon.email',  $this->item, $params); ?></li>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<li class="jsn-article-icon-edit"><?php echo JHtml::_('icon.edit', $this->item, $params); ?></li>
				<?php endif; ?>
		</ul>
		<?php endif; ?>
		<?php if ($showInfo) : ?>
			<div class="jsn-article-info">
				<ul>
				<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
					<li><i class="jsn-icon-user"></i>
						<?php $author =  $this->item->author; ?>
						<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author);?>
							<?php if (!empty($this->item->contactid ) &&  $params->get('link_author') == true):?>
								<?php 	echo JText::sprintf('COM_CONTENT_WRITTEN_BY' , 
								 JHTML::_('link',JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid),$author)); ?>
							<?php else :?>
								<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
							<?php endif; ?>
					</li>
				<?php endif; ?>
				<?php if ($params->get('show_create_date')) : ?>
					<li><i class="jsn-icon-calendar"></i>
						<?php echo JText::sprintf(JHTML::_('date',$this->item->created, JText::_('DATE_FORMAT_LC3'))); ?>
					</li>
				<?php endif; ?>
				<?php if ($params->get('show_publish_date')) : ?>
					<li><i class="jsn-icon-clock"></i>
						<?php echo JText::sprintf(JHTML::_('date',$this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
					</li>
				<?php endif; ?>	
				<?php if ($params->get('show_hits')) : ?>
					<li><i class="jsn-icon-eye"></i>
						<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
					</li>
				<?php endif; ?>
				</ul>
			</div>
		<?php endif; ?>
		
		<div class="clearbreak"></div>
	</div>
	<?php endif; ?>
	
	<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
	<a href="<?php echo htmlspecialchars($images->image_intro); ?>" rel="{handler: 'iframe', size: {x: 420, y: 420}}" style="z-index: 90;" class="modal link-tooltip"><img
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/></a>
	</div>
	<?php endif; ?>
	
	<div class="jsn-article-intro-text"><?php echo $this->item->introtext; ?></div>
	
	<?php if ($params->get('show_modify_date')) : ?>
		<p>
		<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHTML::_('date',$this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
		</p>
	<?php endif; ?>	
	
	
	<?php if ($params->get('show_readmore') && $this->item->readmore) :
		if ($params->get('access-view')) :
			$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		else :
			$menu = JFactory::getApplication()->getMenu();
			$active = $menu->getActive();
			$itemId = $active->id;
			$link1 = JRoute::_('index.php?option=com_users&view=login&&Itemid=' . $itemId);
			$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
			$link = new JURI($link1);
			$link->setVar('return', base64_encode($returnURL));
		endif;
	?>
            <a href="<?php echo $link; ?>" class="readon"><i class="jsn-icon-link"></i>
                <span>
                    <?php if (!$params->get('access-view')) :
                        echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
                    elseif ($readmore = $this->item->alternative_readmore) :
                        echo $readmore;
                        if ($params->get('show_readmore_title', 0) != 0) :
                        echo JHTML::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
                    endif;
                    elseif ($params->get('show_readmore_title', 0) == 0) :
                        echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
                    else :
                        echo JText::_('COM_CONTENT_READ_MORE');
                        echo JHTML::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
                    endif; ?>
                </span>
            </a>
	<?php endif; ?>
	
	</div>
	<?php if ($this->item->state == 0) : ?>
	</div>
	<?php endif; ?>
	<div class="article_separator"></div>
	<?php echo $this->item->event->afterDisplayContent; ?>
<?php endif; ?>