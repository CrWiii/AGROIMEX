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


$document->addScript(JURI::base() . 'templates/'.$template.'/js/jquery.mixitup.min.js');

function special_chars_replace($string){
  $result = preg_replace("/[&%\$#@'\*:\/\"\[\]\{\};\(\)\|\\\=!\^\?`~.,\+-]/", "", $string);
  return $result;
}
$catids = $params->get('catid');
// Get an instance of the generic categories model
$categories = JModelLegacy::getInstance('Categories', 'ContentModel', array('ignore_request' => true));
$levels = $params->get('levels', 1) ? $params->get('levels', 1) : 9999;
$categories->setState('filter.get_children', $levels);
$categories->setState('filter.published', 1);

foreach ($catids as $catid)
{
  $categories->setState('filter.parentId', $catid);
  $recursive = true;
  $items = $categories->getItems($recursive);

  if ($items)
  {
    foreach ($items as $category)
    {
      $condition = (($category->level - $categories->getParent()->level) <= $levels);
      if ($condition)
      {
        $additional_catids[] = $category->title;
      }

    }
  }
}
$catids = array_unique($additional_catids);

  $n = count($list);

  if($n<$columns){
    $columns = $n;
  }

        $spanClass = 'span'.floor($params->get('bootstrap_size')/$columns);
        $rows = ceil($n/$columns);

$app    = JFactory::getApplication(); 
$doc = JFactory::getDocument();
$document =& $doc;
$template = $app->getTemplate();
?>
  <div class="filters">
    <ul id="filters">
      <li><a class="filter active" data-filter="all"><?php echo JText::_('TPL_COM_CONTENT_GALLERY_FILTER_SHOW_ALL'); ?></a></li>
      <?php foreach ($catids as $key => $value) : ?>
      <li><a class="filter" data-filter="mix_<?php echo special_chars_replace(strtolower(str_replace(" ","",$value))); ?>"><?php echo $value; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
<div class="mod-newsflash-adv mod-newsflash-adv__<?php echo $moduleclass_sfx; ?> cols-<?php echo $columns; ?>" id="module_<?php echo $module->id; ?>">
  <?php if ($params->get('pretext')): ?>
  <div class="pretext">
    <?php echo $params->get('pretext') ?>
  </div>
  <?php endif; ?>
  <?php 
  for ($i = 0, $n; $i < $n; $i ++) :
    $item = $list[$i]; 

    $class="";
    if($i == $n-1){
      $class="lastItem";
    }
  ?>
  <article class="gallery-item gallery-grid style1 <?php echo $spanClass; ?> item item_num<?php echo $i; ?> item__module <?php echo $class; ?> mix_<?php echo special_chars_replace(strtolower(str_replace(" ","",$item->category_title))); ?> mix mix_all" id="item_<?php echo $item->id; ?>">
    <div class="view">
      <?php require JModuleHelper::getLayoutPath('mod_as_articles_newsflash', '_portfolio'); ?>
    </div>
  </article>
  <?php endfor; ?>
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
<script>
jQuery(document).ready(function($) {
  $('#module_<?php echo $module->id; ?>').mixitup({
    targetSelector: '.mix',
    filterSelector: '.filter',
    buttonEvent: 'click',
    effects: ['fade','scale'],
    listEffects: null,
    easing: 'smooth',
    layoutMode: 'grid',
    targetDisplayGrid: 'inline-block',
    transitionSpeed: 600,
    showOnLoad: 'all',
    sortOnLoad: false,
    multiFilter: false,
    filterLogic: 'or',
    resizeContainer: true,
    minHeight: 0,
    failClass: 'fail',
    perspectiveDistance: '3000',
    perspectiveOrigin: '50% 50%',
    onMixLoad: function(){
      magnificGridInit();
          $('#module_<?php echo $module->id; ?>').addClass('loaded');
    },
    onMixEnd: function(){
      magnificGridInit();      
      if(typeof $.fn.lazy == "function"){
        $("img.lazy:visible").lazy({
          bind: "event",
          threshold: 0,
          visibleOnly: false,
          effect: "fadeIn",
          effectTime: 500,
          enableThrottle: true,
          throttle: 500
        });
      }
    }
  });
  function magnificGridInit(){
        jQuery('#module_<?php echo $module->id; ?>').magnificPopup({
          delegate: 'a.galleryZoom:visible',
          type: 'image',
          tLoading: 'Loading #%curr%...',
          mainClass: 'mfp-with-zoom',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            tCounter: '%curr% / %total%',
            titleSrc: function(item) {
              return '<h4>'+item.el.parents('.gallery-item').find('.item_title').html()+'</h4>'+item.el.parents('.gallery-item').find('.item_introtext').html();
            }
          },
          zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
            opener: function(openerElement) {
              return openerElement.is('img') ? openerElement : openerElement.parents('.gallery-item').find('img');
            }
          }
        });
      }
}); 
</script>