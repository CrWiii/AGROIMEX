<?php

/*******************************************************************************************/
/*
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/******************************************************************************************/

defined('_JEXEC') or die;

$item_heading = $params->get('item_heading', 'h4');
$item_images = json_decode($item->images);

if($layout!='edit')
{
	$canEdit = $item->params->get('access-edit');
	JHtml::addIncludePath(JPATH_BASE.'/components/com_content/helpers');
}

if($layout!='edit') :
	if ($canEdit) : ?>
	<!-- Icons -->
	<div class="item_icons btn-group pull-right">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-cog"></i> <span class="caret"></span> </a>
		<ul class="dropdown-menu">
			<?php if ($canEdit) : ?>
			<li class="edit-icon"> <?php echo JHtml::_('icon.edit', $item, $params); ?> </li>
			<?php endif; ?>
		</ul>
	</div>
	<?php endif;
endif;

if ($params->get('intro_image')):
	if (isset($item_images->image_intro) and !empty($item_images->image_intro)) :
		$imgfloat = (empty($item_images->float_intro)) ? $params->get('float_intro') : $item_images->float_intro; ?>
		<!-- Intro Image -->
		<figure class="item_img img-intro img-intro__<?php echo htmlspecialchars($params->get('intro_image_align')); ?>"> 
			<img src="<?php echo htmlspecialchars($item_images->image_intro); ?>" alt="<?php echo htmlspecialchars($item_images->image_intro_alt); ?>">
			<?php if ($item_images->image_intro_caption): ?>
			<figcaption><?php echo htmlspecialchars($item_images->image_intro_caption); ?></figcaption>
			<?php endif; ?>
		</figure>
	<?php endif;
endif; ?>

<div class="item_content">
	<!-- Item title -->
	<?php if ($params->get('item_title')) : ?>
	<<?php echo $item_heading; ?> class="item_title item_title__<?php echo $params->get('moduleclass_sfx'); ?>">
		<?php echo wrap_with_span($item->title); ?>
	</<?php echo $item_heading; ?>>
	<?php endif;

	if (!$params->get('intro_only'))
	{
		echo $item->afterDisplayTitle;
	}

	if ($params->get('show_tags', 1) && !empty($item->tags))
	{
		$item->tagLayout = new JLayoutFile('joomla.content.tags');
		echo $item->tagLayout->render($item->tags->itemTags);
	} ?>

	<div class="item_info">
	<?php if ($params->get('published')) : ?>
        <time datetime="<?php echo JHtml::_('date', $item->publish_up, 'Y-m-d H:i'); ?>" class="item_published">
            <?php echo JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC4')); ?>
        </time>
	<?php endif; ?>
	</div>

	<?php echo $item->beforeDisplayContent;

	if ($params->get('show_introtext')) : ?>
        <!-- Introtext -->
        <div class="item_introtext">
            <?php echo $item->introtext; ?>
        </div>
	<?php endif; ?>

	<!-- Read More link -->
	<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) :
		$readMoreText = JText::_('MOD_ARTICLES_NEWS_READMORE');
		if ($item->alternative_readmore)
		{
			$readMoreText = $item->alternative_readmore;
		}
		echo '<span class="btn btn-info readmore"><span>'. $readMoreText .'</span></span>';
	endif; ?>
</div>

<div class="clearfix"></div>