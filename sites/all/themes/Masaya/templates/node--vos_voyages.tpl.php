<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
**/
?>
<?php 
  global $language;
  global $base_url; 
  $current_node = translation_node_get($node->nid);
  $fp_node = translation_node_get(2);
?>
<div class="fixed_social_icons main_h">
 <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Part-icon.png"><br/><span><?php echo t('Share'); ?> </span>
 <a href="http://twitter.com/intent/tweet?text=<?php echo substr(drupal_get_title() .'+'.strip_tags($current_node->field_yellow_bg_text['und'][0]['value']), 0, 96).'...'.'&url='.$base_url.'/'.$language->language. current_path(); ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Tw-icon.jpg"></a>
 <a href="http://facebook.com/sharer.php?u=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q']; ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-fb-icon.jpg"></a>
 <a href="https://plus.google.com/share?url=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q']; ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-G+-icon.jpg"></a>
 <a href="<?php echo 'javascript:void((function()%7Bvar%20e=document.createElement(\'script\');e.setAttribute(\'type\',\'text/javascript\');e.setAttribute(\'charset\',\'UTF-8\');e.setAttribute(\'src\',\'http://assets.pinterest.com/js/pinmarklet.js?r=\'+Math.random()*99999999);document.body.appendChild(e)%7D)());'; ?>"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/Pinterest-Logo.png"></a>
 <a href="mailto:?url=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q'].' &subject=I wanted you to see this site&amp;body=Check out this site .'.$base_url.'/'.$_GET['q']; ?>" title="Share by Email"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Msg-icon.jpg"></a>
</div>
<?php $bg = 'background-image:url(\''.file_create_url($current_node->field_background_image['und'][0]['uri']).'\')'; ?>
<div class="main_section" style="<?php echo $bg; ?>">
	<div class="col-lg-12 col-md-12">
		<div class="res_heading res_heading2">
		  <h2><?php echo $current_node->title; ?></h2>
		</div>
	</div>
	<div class="col-lg-10 col-md-10 col-sm-10 bg_color">
		<div class="col-lg-8 col-md-8 col-sm-11 midle_content">
			<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 top_tastimonial">
				<span class="coluns1">“</span>
				<p><?php echo $current_node->field_quote['und'][0]['value']; ?></p>
				<span class="coluns2">”</span>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 Voyage"> 
				<img src="<?php echo file_create_url($current_node->field_author_photo['und'][0]['uri']); ?>" alt="<?php echo file_create_url($current_node->field_author_photo['und'][0]['alt']); ?>" title="<?php echo file_create_url($current_node->field_author_photo['und'][0]['title']); ?>">
				<span class="Voyage_top_name">Voyage De: <?php echo $current_node->field_voyage_de['und'][0]['value']; ?></span>
				<span>Period: <?php echo $current_node->field_period['und'][0]['value']; ?></span>
			</div>
			<?php echo $current_node->body['und'][0]['safe_value']; ?>
			<div class="Voyage_shadow">
				<img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/exe_month_bg.png">
			</div>
			<h2><?php echo $current_node->field_thematic_issues_title['und'][0]['value']; ?></h2>
			<?php echo $current_node->field_description['und'][0]['safe_value']; ?>
			<div class="comments">
			  <a id="writeComment" href="#">Write a comment</a>
			  <?php print render($content['comments']); ?>
			</div>
		</div>
	</div>
</div>