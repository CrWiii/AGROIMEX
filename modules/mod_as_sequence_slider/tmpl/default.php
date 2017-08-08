<?php
/*******************************************************************************************/
/*
/*        Web: http://www.asdesigning.com
/*        Web: http://www.astemplates.com
/*        License: GNU General Public License
/*
/*******************************************************************************************/

defined('_JEXEC') or die;

$autoPlay = "true"; 	if(!$params->get('autoPlay')) $autoPlay = "false";
$navigation = "true"; 	if(!$params->get('navigation')) $navigation = "false";
$playPause = "true"; 	if(!$params->get('playPause')) $playPause = "false";
$loader = "false"; 		if($params->get('loader')) $loader = "true";
$hover = "false"; 		if($params->get('hover') ) $hover = "true";

?>

<div id="sequence<?php echo $module->id; ?>" class="sequence-slider<?php if($params->get('thumbnails')): ?> sequence-thumbnails<?php endif; ?>" style="padding-bottom:<?php echo $params->get('height'); ?>">

	<?php if($params->get('navigation')) : ?>
    <div class="sequence-prev"></div>
    <div class="sequence-next"></div>
    <?php endif; ?>

	<?php if($params->get('playPause')) : ?>
    <div class="sequence-pause"></div>
    <?php endif; ?>

	<?php if($params->get('loader')) : ?>
    <div class="sequence-preloader">
        <svg class="preloading" xmlns="http://www.w3.org/2000/svg">
            <circle class="circle" cx="6" cy="6" r="6"></circle>
            <circle class="circle" cx="22" cy="6" r="6"></circle>
            <circle class="circle" cx="38" cy="6" r="6"></circle>
        </svg>
    </div>
    <?php endif; ?>

	<?php if($params->get('pagination')) : ?>
    <div class="sequence-pagination-wrapper<?php if ($params->get('thumbnails')): ?> sequence-thumbnails<?php endif; ?>">
        <ul class="sequence-pagination sequence-pagination-<?php echo $module->id; ?><?php if ($params->get('thumbnails')): ?> sequence-thumbnails<?php endif; ?>">
        <?php 
            $i=0;	
            foreach ($list as $item) :	?>
            <li>
            <?php if ($params->get('thumbnails')): ?>
                <img class="slide-thumb" src="<?php echo htmlspecialchars(json_decode($item->images)->image_intro); ?>" alt="">
            <?php endif; ?>
            </li>
            <?php
                $i++;
            endforeach;
        ?>
        </ul>
    </div>
    <?php endif; ?>

    <ul class="sequence-canvas">
    <?php
        if($params->get('item_url'))
        {
            $itemURLs = explode(';', $params->get('item_url'));
        }	
    
        $item_width = floor(100 / count($list));
    
        $i=0;	
    
        foreach ($list as $item):	?>
        <li>	
        <?php require JModuleHelper::getLayoutPath('mod_as_sequence_slider', '_item'); ?>
        </li>
        <?php
            $i++;
        endforeach;
    ?>
    </ul>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		var options<?php echo $module->id; ?> = {
            autoPlay: <?php echo $autoPlay; ?>,
            autoPlayDelay: <?php echo $params->get('autoPlayDelay'); ?>,
            // startingFrameID: <?php echo $params->get('startingFrameID'); ?>,
            nextButton:<?php echo $navigation; ?>,
            prevButton:<?php echo $navigation; ?>,
            pauseButton:<?php echo $playPause; ?>,
            <?php if($params->get('pagination')) : ?>
            pagination: '.sequence-pagination-<?php echo $module->id; ?>',
            <?php else : ?>
            pagination: false,
            <?php endif; ?>
			preloader: <?php echo $loader; ?>,
			pauseOnHover:<?php echo $hover; ?>,
			reverseAnimationsWhenNavigatingBackwards:false,
            fallback: {
                theme: "fade",
                speed: 2000
            },
            swipeEvents: {
			    left: "next",
			    right: "prev",
			    up: false,
			    down: false
			}
        }
        var sequence = jQuery("#sequence<?php echo $module->id; ?>").sequence(options<?php echo $module->id; ?>).data("sequence");
    });
</script>
