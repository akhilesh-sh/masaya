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
<!-- start Restaurants & Bars -->
<?php $bg = 'background-image:url(\''.file_create_url($current_node->field_background_image['und'][0]['uri']).'\')'; ?>
<div class="main_section" style="<?php echo $bg; ?>">
<div class="col-lg-8 col-md-8">
<div class="res_heading">
  <h2><?php echo $current_node->title; ?></h2>
</div>
<div class="left_section">
<div class="col-lg-12 col-md-12">

<?php 
  if(isset($current_node->field_tips['und'])){
    $abc = $current_node->body['und'][0]['safe_value'];
    foreach ($current_node->field_tips['und'] as $key => $value) {
      // $value['safe_value'];
      $abc = str_replace('<p>['.$key.']</p>', '
        <div class="Section_light_img">
        <span class="inner_shadow2"><img src="'.$base_url.'/'.path_to_theme().'/images/inner-shadow-comment2.png"></span>
        <img src="'.$base_url.'/'.path_to_theme().'/images/light_img.png">
        <h2>TRAVEL TIPS</h2>
        <p>'.$value['safe_value'].'</p>
        <span class="inner_shadow1"><img src="'.$base_url.'/'.path_to_theme().'/images/inner-shadow-comment1.png"></span>
        </div>', $abc);
    }
    echo $abc;
  }
  else echo $current_node->body['und'][0]['safe_value']; 
?>
  <h3 class="bon"><?php echo $current_node->field_section_1_white_title['und'][0]['value']; ?></h3>
</div>
<div class="comments">
  <a id="writeComment" href="#">Write a comment</a>
  <?php print render($content['comments']); ?>
</div>
</div>

  </div>
  <div class="col-lg-4 col-md-4 col-sm-10 col-xs-10 fight_section main_h">
    <div class="col-lg-10 col-md-12 right_inner">
        <h2><?php echo t('Discover Columbia'); ?></h2>
        <ul>
          <li>
          <a href="<?php echo $base_url; ?>"><i><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/link-arrow-right.jpg"></i><?php echo t('Home'); ?></a></li>
        </ul>
<?php 

echo '<h5>'.$current_node->field_white_large_text['und'][0]['value'].'</h5>'; 

$query = new EntityFieldQuery();

$query->entityCondition('entity_type', 'node')
  ->entityCondition('bundle', 'discover_columbia_article')
  ->fieldCondition('field_page_type', 'tid', 2)
  ->propertyCondition('status', NODE_PUBLISHED)
  ->propertyCondition('language', $language->language);
// ->range(0, 4);

$result = $query->execute();

// echo "<pre>";
// print_r($result);
// echo "</pre>";

if (isset($result['node'])) {
  $new_items_nids = array_keys($result['node']);
  echo '<ul>';
  foreach ($new_items_nids as $key => $value) {
    $the_node = node_load($value); 
    echo '<li><a href="'.$base_url.'/'.$language->language.'/node/'.$the_node->nid.'"><i><img src="'.$base_url.'/'.path_to_theme().'/images/link-arrow-right.jpg"></i>'.$the_node->title.'</a></li>';
  }
  echo '</ul>';
}
else echo '<p> No content created yet for this section. </p>';

echo '<h5>'.$current_node->field_white_large_text_2['und'][0]['value'].'</h5>';
$query = new EntityFieldQuery();

$query->entityCondition('entity_type', 'node')
  ->entityCondition('bundle', 'discover_columbia_article')
  ->fieldCondition('field_page_type', 'tid', 3)
  ->propertyCondition('status', NODE_PUBLISHED)
  ->propertyCondition('language', $language->language);
// ->range(0, 4);

$result = $query->execute();

if (isset($result['node'])) {
  $new_items_nids = array_keys($result['node']);
  echo '<ul>';
  foreach ($new_items_nids as $key => $value) {
    $the_node = node_load($value); 
    echo '<li><a href="'.$base_url.'/'.$language->language.'/node/'.$the_node->nid.'"><i><img src="'.$base_url.'/'.path_to_theme().'/images/link-arrow-right.jpg"></i>'.$the_node->title.'</a></li>';
  }
  echo '</ul>';
}
else echo '<p> No content created yet for this section. </p>';

echo '<h5>'.$current_node->field_white_large_text_3['und'][0]['value'].'</h5>';
?>
<div class="row margin_none">            
<?php
  if(isset($current_node->field_city_guide_images['und'])) {
     foreach ($current_node->field_city_guide_images['und'] as $key => $value) {
      $collection_obj = field_collection_item_load($value['value']);
      // $collection_obj = field_collection_item_load($current_node->field_city_guide_images['und'][0]['value']); ?>
             <div class="col-md-12 col-sm-12 padding_none">
                <a href="<?php echo $current_node->field_bottom_image_link_1['und'][0]['value']; ?>">
                  <div class="blog_listing_main">
                    <img class="imgfull-width blog_list_img2" src="<?php echo file_create_url($collection_obj->field_city_guide_pic['und'][0]['uri']); ?>" alt="<?php echo $collection_obj->field_city_guide_pic['und'][0]['alt']; ?>" title="<?php echo $collection_obj->field_city_guide_pic['und'][0]['title']; ?>" />
                    <div class="blog_list_overlay_con blog_list_overlay_con3 text-center">
                        <div class="blog_list_inner">
                            <h3 class="h1_seo_trip"><?php echo $collection_obj->field_section_1_white_title['und'][0]['value']; ?></h3>
                            <?php if(!empty($collection_obj->field_black_small_text_1)) { echo '<h3 class="h2_seo_trip">'.$collection_obj->field_black_small_text_1['und'][0]['value'].'</h3>'; } ?>
                        </div>
                    </div>
                  </div>
                </a>
             </div>
             <br clear="all">
             <br/>
<?php
    }
  }
?>
        </div>


    </div>
  </div>


</div>


<!-- end Restaurants & Bars -->