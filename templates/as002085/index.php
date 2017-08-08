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

include_once ('includes/functions.php');
include_once ('includes/includes.php');
include_once ('params.php');

include_once ('includes/mobile.detect.php');
$detect = new Mobile_Detect;

JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<meta content="width=device-width, initial-scale=1" name="viewport">
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-512f82bc1db42a7c" async="async"></script>
	<?php
    if ($hideByEdit == false)
	{
		$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css');

		if($theme_responsive)
		{
			$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.responsive.css');
			$doc->addStyleSheet('templates/'.$this->template.'/css/tmpl.default.css');
			$doc->addStyleSheet('templates/'.$this->template.'/css/media.1200.css');
			$doc->addStyleSheet('templates/'.$this->template.'/css/media.979.css');
			$doc->addStyleSheet('templates/'.$this->template.'/css/media.767.css');
			$doc->addStyleSheet('templates/'.$this->template.'/css/media.640.css');
			$doc->addStyleSheet('templates/'.$this->template.'/css/media.480.css');											
		}
		else
		{
			echo '<meta name="HandheldFriendly" content="true">';
			echo '<meta name="apple-mobile-web-app-capable" content="yes">';
			echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">';			

			$doc->addStyleSheet('templates/'.$this->template.'/css/tmpl.default.css');
		}
		
		$doc->addStyleSheet('templates/'.$this->template.'/css/kunena.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/komento.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/font-awesome.css');
    }
    else
	{
		$doc->addStyleSheet('media/jui/css/bootstrap.min.css');
		$doc->addStyleSheet('administrator/templates/'.$adminTemplate.'/css/template.css');
    }
	
	if($theme_layout == 1)
	{
		$doc->addStyleSheet('templates/'.$this->template.'/css/tmpl.layout.css');
	}
	
	if($theme_style != '')
	{
		$doc->addStyleSheet($theme_style);
	}
	

	// if right to left
	if ($this->direction == 'rtl'){
		$doc->addStyleSheet('media/jui/css/bootstrap-rtl.css');
	}

	echo $bodyfont_arr['fontlink'];
	if($hfont_arr['fontlink'] != $bodyfont_arr['fontlink'])
	{
		echo $hfont_arr['fontlink'];
	}
	
    ?>
    <jdoc:include type="head" />
    
    <!--[if lt IE 9]>
    <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/html5shiv+printshiv.js"></script>
    <![endif]-->  

	<?php 
		$doc->addStyleSheet('templates/'.$this->template.'/css/style.custom.css');
		include_once 'styles.php'; 
	?>

</head>

<body class="<?php echo $option . " view-" . $view . " task-" . $task . " itemid-" . $itemid . " body__" . $pageClass;?>">
	
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
   		<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
    		<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" 
        	alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
   		</a>
    </div>
    <![endif]-->

    <div id="wrapper">
    	<div class="wrapper-inner">
        
        	<!-- HEADER ROWS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->
            
    		<?php if ($hideByEdit == false): ?>
    		<div id="menu-row">
                <div class="row-container">
    				<div id="logo">
						<?php if($logo): ?>
                            <a href="<?php echo $this->baseurl; ?>">
                                <img src="<?php echo $logo;?>" alt="<?php echo $sitename; ?>" />
                            </a>
                        <?php else: ?>                     
                            <a href="<?php echo $this->baseurl; ?>">
                                <h1><?php echo wrap_chars_with_span($sitename); ?></h1>
                                <h6><?php echo $slogan;?></h6>
                            </a>
                        <?php endif; ?>
    				</div>
   					<jdoc:include type="modules" name="as-mainmenu" style="html5nosize" />
   			 	</div>
    		</div>
    		<?php endif; ?>
            
			<?php if ($this->countModules('as-slider')): ?>
            <div id="slider-row">
            	<jdoc:include type="modules" name="as-slider" style="html5nosize" />
            </div>
            <?php endif; ?>

			<?php if ($this->countModules('as-breadcrumbs')): ?>
            <div id="breadcrumbs-row">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="<?php echo $rowClass; ?>">
	                        <jdoc:include type="modules" name="as-breadcrumbs" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            
            <!-- END OF HEADER ROWS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            
            <!-- CONTENT ROWS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            
			<?php if ($this->countModules('as-content-1')): ?>
            <div id="content-row-1" <?php if ($this->countModules('as-slider')) echo 'class="margin-top"'; ?> >
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="<?php echo $rowClass; ?>">
                            <jdoc:include type="modules" name="as-content-1" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

			<?php if ($this->countModules('as-content-2')): ?>
            <div id="content-row-2">
            	<div class="content-row-2-wrapper">
                    <div class="row-container">
                        <div class="<?php echo $containerClass; ?>">
                            <div class="<?php echo $rowClass; ?>">
                                <jdoc:include type="modules" name="as-content-2" style="themeHtml5" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
    
			<?php if ($this->countModules('as-content-3')): ?>
            <div id="content-row-3">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="<?php echo $rowClass; ?>">
	                        <jdoc:include type="modules" name="as-content-3" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
    
			<?php if ($this->countModules('as-content-4')): ?>
            <div id="content-row-4">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="<?php echo $rowClass; ?>">
	                        <jdoc:include type="modules" name="as-content-4" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

			<div id="message-row">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <jdoc:include type="message" />
                    </div>
                </div>
            </div>
    
            <div id="main-content-row">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="content-inner <?php echo $rowClass; ?>"> 
                          
                            <!-- LEFT SIDEBAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            <?php if (($this->countModules('as-left-top') || $this->countModules('as-left-bottom'))): ?>
                            <div id="aside-left" class="span<?php echo $aside_left_width; ?>">
                                <aside role="complementary">
                                	<?php if ($this->countModules('as-left-top')): ?>
                                	<div id="aside-left-top">
                                    	<jdoc:include type="modules" name="as-left-top" style="html5nosize" />
                                    </div>
									<?php endif; ?>
                                    <?php if ($this->countModules('as-left-bottom')): ?>
                                	<div id="aside-left-bottom">
                                    	<jdoc:include type="modules" name="as-left-bottom" style="html5nosize" />
                                    </div>
                                    <?php endif; ?>
                                </aside>
                            </div>
                            <?php endif; ?>                            
                            <!-- END OF COlUMN LEFT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                    
                            <!-- COLUMN MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->   
                            <div id="component" class="span<?php echo $mainContentWidth; ?>">
                                <main role="main">
                                    <?php if ($this->countModules('as-content-top')): ?> 
                                    <div id="main-content-top-row" class="<?php echo $rowClass; ?>">
                                        <div id="content-top">
                                            <jdoc:include type="modules" name="as-content-top" style="themeHtml5" />
                                        </div>
                                    </div>
                                    <?php endif; ?>        
                                    
                                    <jdoc:include type="component" /> 
                                      
                                    <?php if ($this->countModules('as-content-bottom')): ?>     
                                    <div id="main-content-bottom-row" class="<?php echo $rowClass; ?>">
                                        <div id="content-bottom">
                                            <jdoc:include type="modules" name="as-content-bottom" style="themeHtml5" />
                                        </div>
                                    </div>
                                               
                                    <?php endif; ?>
                                    
                                
                                </main>
                            </div>
                            <!-- END OF COLUMN MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --> 
            
                            <!-- RIGHT SIDEBAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->                       
                            <?php if (($this->countModules('as-right-top') || $this->countModules('as-right-bottom'))): ?>
                            <div id="aside-right" class="span<?php echo $aside_right_width; ?>">
                                <aside role="complementary">
                                	<?php if ($this->countModules('as-right-top')): ?>
                                	<div id="aside-right-top">
                                    	<jdoc:include type="modules" name="as-right-top" style="html5nosize" />
                                    </div>
									<?php endif; ?>
                                    <?php if ($this->countModules('as-right-bottom')): ?>
                                	<div id="aside-right-bottom">
                                    	<jdoc:include type="modules" name="as-right-bottom" style="html5nosize" />
                                    </div>
                                    <?php endif; ?>
                                </aside>
                            </div>
                            <?php endif; ?>
                            <!-- END OF RIGHT SIDEBAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            
                        </div>
                    </div>
                </div>
            </div>

			<?php if ($this->countModules('as-content-5') && $hideByView == false && $hideByEdit == false): ?>
            <div id="content-row-5">
            	<div class="content-row-5-wrapper">
                    <div class="row-container">
                        <div class="<?php echo $containerClass; ?>">
                            <div class="<?php echo $rowClass; ?>">
                                <jdoc:include type="modules" name="as-content-5" style="themeHtml5" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

			<?php if ($this->countModules('as-content-6') && $hideByView == false && $hideByEdit == false): ?>
            <div id="content-row-6">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="<?php echo $rowClass; ?>">
	                        <jdoc:include type="modules" name="as-content-6" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

			<?php if ($this->countModules('as-content-7') && $hideByView == false && $hideByEdit == false): ?>
            <div id="content-row-7">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="<?php echo $rowClass; ?>">
                            <jdoc:include type="modules" name="as-content-7" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
			<?php if ($this->countModules('as-content-8') && $hideByView == false && $hideByEdit == false): ?>
            <div id="content-row-8">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="<?php echo $rowClass; ?>">
	                        <jdoc:include type="modules" name="as-content-8" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
                
            <?php if ($this->countModules('as-content-9') && $hideByView == false && $hideByEdit == false): ?>
            <div id="content-row-9">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="<?php echo $rowClass; ?>">
	                        <jdoc:include type="modules" name="as-content-9" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- END OF CONTENT ROWS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    	</div>
    </div>
    
    <div id="footer-wrapper">
    	<div class="footer-wrapper-inner">
            <!-- FOOTER ROWS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    
			<?php if ($this->countModules('as-footer-1') && $hideByView == false && $hideByEdit == false): ?>
            <div id="footer-row-1">
                <div class="row-container">            
	            	<jdoc:include type="modules" name="as-footer-1" style="html5nosize" />
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ($this->countModules('as-footer-2') && $hideByView == false && $hideByEdit == false): ?>
            <div id="footer-row-2">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div class="<?php echo $rowClass; ?>">
					    	<jdoc:include type="modules" name="as-footer-2" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
    		<?php if ($this->countModules('as-footer-3') && $hideByView == false && $hideByEdit == false): ?>
            <div id="footer-row-3">
                <div class="row-container">
                    <div class="<?php echo $containerClass; ?>">
                        <div id="footer" class="<?php echo $rowClass; ?>">
	                        <jdoc:include type="modules" name="as-footer-3" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div id="push"></div>
            
            <?php if ($hideByEdit == false): ?>
		    <div id="copyright-row" role="contentinfo">
    			<div id="copyright">
                	  <jdoc:include type="modules" name="direccion"/>
    				<?php if($this->params->get('footer_copy') == 1) echo '<span class="copy">Copyright &copy;</span>'; ?>
    				<?php if($this->params->get('show_footer_year') == 1) echo '<span class="year">'.date('Y').'</span>'; ?>
    				<?php if($this->params->get('show_footer_logo') == 1) : ?>
				    <a class="footer_logo" href="<?php echo $this->baseurl; ?>">
                    <img src="<?php echo $footer_logo;?>" alt="<?php echo $sitename; ?>" />
                    </a>
    				<?php else: ?>
    				<span class="siteName"><?php echo $sitename; ?></span>
    				<?php endif; ?>
                    
                    <?php if ($this->countModules('footer')): ?>
                        <jdoc:include type="modules" name="as-copyright" style="html5nosize" />
                    <?php endif; ?>  
                                 
    			</div>
                
				<?php if($this->params->get('todesktop') && ($detect->isMobile() || $detect->isTablet())): ?>
                <div id="to-desktop">
                    <a href="#">
                        <span class="to_desktop"><?php echo $this->params->get('todesktop_text') ?></span>
                        <span class="to_mobile"><?php echo $this->params->get('tomobile_text') ?></span>
                    </a>
                </div>
                <?php endif; ?>
   
    		</div>
            <?php endif; ?>
    	</div>
    </div>
    
    <?php if($this->params->get('totop')): ?>
    <div id="back-top">
    	<a href="#"><i class="fa fa-chevron-circle-up"></i></a>
    </div>
    <?php endif; ?>
    
    <?php if ($this->countModules('modal')): ?>
    <jdoc:include type="modules" name="modal" style="modal" />
    <?php endif; ?>
    
    <?php if ($this->countModules('debug')): ?>
    <jdoc:include type="modules" name="debug" style="none"/>
    <?php endif; ?>
    
    <?php if ($this->countModules('modal')): ?>
    <script src="<?php echo $this->baseurl.'/templates/'.$this->template.'/js/jquery.centerIn.js'; ?>"></script>
    <script>
    jQuery(function($) {
	    $('.modal.loginPopup').alwaysCenterIn(window);
    });
    </script>
    <?php endif; ?>
    
    <?php if($detect->isiPad()): ?>
    <script src="<?php echo $this->baseurl.'/templates/'.$this->template.'/js/ios-orientationchange-fix.js'; ?>"></script>
    <?php endif; ?>
    
    <?php if( $detect->isMobile() || $detect->isTablet()): ?>
    <script src="<?php echo $this->baseurl.'/templates/'.$this->template.'/js/desktop-mobile.js'; ?>"></script>
    <?php endif; ?>
    
    <script src="<?php echo $this->baseurl.'/templates/'.$this->template.'/js/jquery.vide.min.js'; ?>"></script>
    <script src="<?php echo $this->baseurl.'/templates/'.$this->template.'/js/scripts.js'; ?>"></script>
    <script src="<?php echo $this->baseurl.'/templates/'.$this->template.'/js/jquery.lazy.min.js'; ?>"></script>

    
</body>
</html>