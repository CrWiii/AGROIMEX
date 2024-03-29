<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

$n = count($list);

if($n<$columns){
  $columns = $n;
}
if($columns == 0){
  $columns = 1;
}

  $spanClass = 'span'.floor($params->get('bootstrap_size')/$columns);
  $rows = ceil($n/$columns);

$app    = JFactory::getApplication(); 
$doc = JFactory::getDocument();
$document =& $doc;
$template = $app->getTemplate();

if($params->get('masonry')){
  $document->addScript(JURI::base() . 'modules/mod_as_articles_newsflash/js/masonry.pkgd.min.js');
}

?>
<div class="mod-newsflash-adv mod-newsflash-adv__<?php echo $moduleclass_sfx; ?> cols-<?php echo $columns; ?>" id="module_<?php echo $module->id; ?>">
  <?php if ($params->get('pretext')): ?>
  <div class="pretext">
    <?php echo $params->get('pretext') ?>
  </div>
  <?php endif;
  if($params->get('masonry')) : ?>
  <div class="masonry row-fluid" id="mod-newsflash-adv__masonry<?php echo $module->id; ?>">
  <?php else: ?>
  <div class="row-fluid">
  <?php endif;
  for ($i = 0, $n; $i < $n; $i ++) :
    $item = $list[$i]; 

    $class="";
    if($item->featured){
      $class .= "featured";
    }
    if($i == $n-1){
      $class .=" lastItem";
    }

    if($rows > 1 && $i !== 0 && $i % $columns == 0 && !$params->get('masonry')){
      echo '</div><div class="row-fluid">';
    }
  ?>
  <article class="<?php echo $spanClass; ?> item item_num<?php echo $i; ?> item__module  <?php echo $class; ?>" id="item_<?php echo $item->id; ?>">
    <div class="item_container">
      <?php require JModuleHelper::getLayoutPath('mod_as_articles_newsflash', '_item'); ?>
    </div>
  </article>
  <?php endfor; ?>
  </div> 
  <div class="clearfix"></div>

  <?php if($params->get('mod_button') == 1): ?>   
  <div class="mod-newsflash-adv_custom-link">
    <?php 
      $menuLink = $menu->getItem($params->get('custom_link_menu'));

        switch ($params->get('custom_link_route')) 
        {
          case 0:
            $link_url = $params->get('custom_link_url');
            break;
          case 1:
            $link_url = JRoute::_($menuLink->link.'&Itemid='.$menuLink->id);
            break;            
          default:
            $link_url = "#";
            break;
        }
        echo '<a class="btn btn-info" href="'. $link_url .'">'. $params->get('custom_link_title') .'</a>';
    ?>
  </div>
  <?php endif; ?>
</div>
<?php if($params->get('masonry')) : ?>
<script>
  jQuery(document).ready(function() {
    (function($){ 
      $(window).load(function(){
        var $container = $('#mod-newsflash-adv__masonry<?php echo $module->id; ?>');
        $container.masonry({
          //columnWidth: $container.width()/<?php echo $columns; ?>,
          itemSelector: '.item'
        });
      });
    })(jQuery);
  }); 
</script>
<?php endif; ?>