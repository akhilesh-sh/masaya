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
<style type="text/css">
.node-type-city-guide .Album_photo_back {
    margin-top: -20px;
}
</style>
<!-- start Gallery -->
<div class="Album_photo_back">
  <div class="container">
    <div class="col-lg-9 col-sm-9 Album_photo">
    <h2><?php echo $current_node->field_yellow_bg_title['und'][0]['value']; ?></h2>
    <?php echo $current_node->field_yellow_bg_text['und'][0]['safe_value']; ?>
    </div>
    <div class="col-lg-3 col-sm-3">
    <img src="<?php echo file_create_url($current_node->field_yellow_bg_heading['und'][0]['uri']); ?>" style="margin-top:50px;">
<br/>
<br/>
    </div>
  </div>
</div>

<div class="fixed_social_icons main_h">
 <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Part-icon.png"><br/><span><?php echo t('Share'); ?> </span>
 <a href="http://twitter.com/intent/tweet?text=<?php echo substr(drupal_get_title() .'+'.strip_tags($current_node->field_yellow_bg_text['und'][0]['value']), 0, 96).'...'.'&url='.$base_url.'/'.$language->language. current_path(); ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Tw-icon.jpg"></a>
 <a href="http://facebook.com/sharer.php?u=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q']; ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-fb-icon.jpg"></a>
 <a href="https://plus.google.com/share?url=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q']; ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-G+-icon.jpg"></a>
 <a href="<?php echo 'javascript:void((function()%7Bvar%20e=document.createElement(\'script\');e.setAttribute(\'type\',\'text/javascript\');e.setAttribute(\'charset\',\'UTF-8\');e.setAttribute(\'src\',\'http://assets.pinterest.com/js/pinmarklet.js?r=\'+Math.random()*99999999);document.body.appendChild(e)%7D)());'; ?>"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/Pinterest-Logo.png"></a>
 <a href="mailto:?url=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q'].' &subject=I wanted you to see this site&amp;body=Check out this site .'.$base_url.'/'.$_GET['q']; ?>" title="Share by Email"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Msg-icon.jpg"></a>
</div>


<div class="container">
 <div class="decouvrir_la_colombie_heading">
   <h2><?php echo $current_node->field_white_large_text['und'][0]['value']; ?></h2>
   <h5><?php echo $current_node->field_black_small_text_1['und'][0]['value']; ?></h5>
 </div>
<br/>

<div class="join_images">
  <div class="join1">
    <h2><?php echo t('Day'); ?><br/>1</h2>
  </div>
  <div class="join2">
    <h2><?php echo t('Day'); ?><br/>2</h2>
  </div>
  <div class="join3">
    <h2><?php echo t('Day'); ?><br/>3</h2>
  </div>
  <div class="join4">
    <h2><?php echo t('Day'); ?><br/>4</h2>
  </div>
</div>
<div class="join_button">
 <a class="btn btn-default" href="<?php echo $current_node->field_link_to_button['und'][0]['value']; ?>"><?php echo $current_node->field_button_title['und'][0]['value']; ?></a>
</div>
<br clear="all">
<br/>

<?
  if(isset($current_node->field_city_guide_images['und'][0])) {
      $collection_obj = field_collection_item_load($current_node->field_city_guide_images['und'][0]['value']);
  }
?>

<div class="col-lg-12">
  <br/>
  <div class="col-md-6 col-sm-6 padding_none">
    <a href="<?php echo $collection_obj->field_image_link_1['und'][0]['value']; ?>">
      <div class="blog_listing_main">
        <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($collection_obj->field_city_guide_pic['und'][0]['uri']); ?>" alt="<?php echo $collection_obj->field_city_guide_pic['und'][0]['alt']; ?>" title="<?php echo $collection_obj->field_city_guide_pic['und'][0]['title']; ?>" />
        <div class="blog_list_overlay_con text-center">
            <div class="blog_list_inner">
              <h3 class="h1_seo_trip"><?php echo $collection_obj->field_section_1_white_title['und'][0]['value']; ?></h3>
              <h3 class="h2_seo_trip"><?php echo $collection_obj->field_black_small_text_1['und'][0]['value']; ?></h3>
            </div>
        </div>
      </div>
    </a>
  </div>

<?
  if(isset($current_node->field_city_guide_images['und'][1])) {
      $collection_obj = field_collection_item_load($current_node->field_city_guide_images['und'][1]['value']);
  }
?>

  <div class="col-md-6 col-sm-6 padding_none">
    <a href="<?php echo $collection_obj->field_image_link_1['und'][0]['value']; ?>">
      <div class="blog_listing_main">
        <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($collection_obj->field_city_guide_pic['und'][0]['uri']); ?>" alt="<?php echo $collection_obj->field_city_guide_pic['und'][0]['alt']; ?>" title="<?php echo $collection_obj->field_city_guide_pic['und'][0]['title']; ?>" />
        <div class="blog_list_overlay_con text-center">
          <div class="blog_list_inner">
            <h3 class="h1_seo_trip"><?php echo $collection_obj->field_section_1_white_title['und'][0]['value']; ?></h3>
            <h3 class="h2_seo_trip"><?php echo $collection_obj->field_black_small_text_1['und'][0]['value']; ?></h3>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>

<div class="col-lg-12">
<?
  if(isset($current_node->field_city_guide_images['und'][2])) {
      $collection_obj = field_collection_item_load($current_node->field_city_guide_images['und'][2]['value']);
  }
?>
  <div class="col-md-4 col-sm-4 padding_none">
       <a href="<?php echo $collection_obj->field_image_link_1['und'][0]['value']; ?>">
       <div class="blog_listing_main santa_manta_img_height">
        <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($collection_obj->field_city_guide_pic['und'][0]['uri']); ?>" alt="<?php echo $collection_obj->field_city_guide_pic['und'][0]['alt']; ?>" title="<?php echo $collection_obj->field_city_guide_pic['und'][0]['title']; ?>" />
        <div class="blog_list_overlay_con text-center blog_list_overlay_con2">
            <div class="blog_list_inner">
                 <h3 class="h1_seo_trip"><?php echo $collection_obj->field_section_1_white_title['und'][0]['value']; ?></h3>
                 <h3 class="h2_seo_trip"><?php echo $collection_obj->field_black_small_text_1['und'][0]['value']; ?></h3>
            </div>
         </div>
      </a>
      </div>
  </div>
<?
  if(isset($current_node->field_city_guide_images['und'][3])) {
      $collection_obj = field_collection_item_load($current_node->field_city_guide_images['und'][3]['value']);
  }
?>
  <div class="col-md-4 col-sm-4 padding_none">
      <a href="<?php echo $collection_obj->field_image_link_1['und'][0]['value']; ?>">
        <div class="blog_listing_main santa_manta_img_height">
          <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($collection_obj->field_city_guide_pic['und'][0]['uri']); ?>" alt="<?php echo $collection_obj->field_city_guide_pic['und'][0]['alt']; ?>" title="<?php echo $collection_obj->field_city_guide_pic['und'][0]['title']; ?>" />
          <div class="blog_list_overlay_con text-center blog_list_overlay_con2">
              <div class="blog_list_inner">
                   <h3 class="h1_seo_trip"><?php echo $collection_obj->field_section_1_white_title['und'][0]['value']; ?></h3>
                   <h3 class="h2_seo_trip"><?php echo $collection_obj->field_black_small_text_1['und'][0]['value']; ?></h3>
              </div>
          </div>
        </div>
      </a>
  </div>
<?
  if(isset($current_node->field_city_guide_images['und'][4])) {
      $collection_obj = field_collection_item_load($current_node->field_city_guide_images['und'][4]['value']);
  }
?>
  <div class="col-md-4 col-sm-4 padding_none">
      <a href="<?php echo $collection_obj->field_image_link_1['und'][0]['value']; ?>">
        <div class="blog_listing_main santa_manta_img_height">
        <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($collection_obj->field_city_guide_pic['und'][0]['uri']); ?>" alt="<?php echo $collection_obj->field_city_guide_pic['und'][0]['alt']; ?>" title="<?php echo $collection_obj->field_city_guide_pic['und'][0]['title']; ?>" />
        <div class="blog_list_overlay_con text-center blog_list_overlay_con2">
            <div class="blog_list_inner">
                 <h3 class="h1_seo_trip"><?php echo $collection_obj->field_section_1_white_title['und'][0]['value']; ?></h3>
                 <h3 class="h2_seo_trip"><?php echo $collection_obj->field_black_small_text_1['und'][0]['value']; ?></h3>
            </div>
        </div>
        </div>
      </a>
  </div>
</div>

<div class="Les_Temps_forts_slider">
<h2><?php echo $current_node->field_thematic_issues_title['und'][0]['value'];?></h2>

<div id="carousel-example-generic" class="carousel slide slider_back" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
  <!-- Wrapper for slides -->
<?php
$query = new EntityFieldQuery();

$query->entityCondition('entity_type', 'node')
  ->entityCondition('bundle', 'events')
  ->fieldCondition('field_event_type', 'nid', translation_node_get_from_lang($current_node->nid, 'en'))
  ->propertyCondition('status', NODE_PUBLISHED)
  ->propertyCondition('language', $language->language)
  ->range(0, 4);

$result = $query->execute();

// echo "<pre>";
// print_r($result['node']);
// echo "</pre>";

if (isset($result['node'])) {
  $active = true;
  $new_items_nids = array_keys($result['node']);
  foreach ($new_items_nids as $key => $value) {
    $the_node = node_load($value); 
?>
    <div class="item <?php if($active) { echo 'active'; $active = false; } ?>">
      <div class="col-lg-4 col-md-4 col-sm-4 Midle_slider">
        <img src="<?php echo file_create_url($the_node->field_image['und'][0]['uri']); ?>">
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 slider_inner_heading">
        <h2><?php echo $the_node->title; ?></h2>
        <p><?php echo $the_node->field_black_small_text_1['und'][0]['value']; ?></p>
        <p><?php echo $the_node->field_description['und'][0]['safe_value']; ?></p>
        <i><?php echo $the_node->field_personne_pour_1h['und'][0]['value']; ?></i>
      </div>
    </div>
<?php
  }
}
?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="pull-left prev" aria-hidden="true"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/act_banner_Arrow.png"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="pull-right next" aria-hidden="true"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/act_banner_Arrow_rgt.png"></span>
  </a>
</div>
<div class="shadow_border img">
  <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/shadow_bottom.png">
</div>
</div>

<div class="container">
   <!-- Blog activities -->
        <div class="blog_activity_wrapper">
        <h2 class="text-center"><?php echo $current_node->field_white_large_text_2['und'][0]['value']; ?></h2>
        <h4 class="text-center"><?php echo $current_node->field_black_small_text_2['und'][0]['value']; ?></h4>
<?php
  if(isset($current_node->field_places['und'])) {
    $t = 0;
    foreach ($current_node->field_places['und'] as $key => $value) {
      $collection_obj = field_collection_item_load($value['value']);
?>
          <div class="col-lg-3 col-xs-6 col-sm-3 padding_none Plages_santa img">
            <img src="<?php echo file_create_url($collection_obj->field_image['und'][0]['uri']); ?>" alt="<?php echo $collection_obj->field_image['und'][0]['alt']; ?>" title="<?php echo $collection_obj->field_image['und'][0]['title']; ?>">
            <div class="image_over">
              <span><?php echo ++$t; ?></span>
              <h6><strong><?php echo $collection_obj->field_black_small_text_1['und'][0]['value']; ?></strong></h6>
            </div>
          </div>
<?php
    }
  }
?>


<div class="col-lg-12 Infos_Pratiques">
  <h2 class="text-center"><?php echo $current_node->field_section_1_white_title['und'][0]['value']; ?></h2>
    <div class="col-lg-6 col-md-6">
    <!-- Blog section -->
      <div class="faq_main faq_main2">
        <div class="blog_accordion_con">
          <div class="accordion">
<?php
  if(isset($current_node->field_q_a['und'])) {
    $t = 1;
    foreach ($current_node->field_q_a['und'] as $key => $value) {
      $collection_obj = field_collection_item_load($value['value']);
?>
            <div class="accordion-section">
              <a class="accordion-section-title" href="#accordion-<?php echo $t; ?>"><?php echo $collection_obj->field_quote['und'][0]['safe_value']; ?></a>
              <div id="accordion-<?php echo $t; ?>" class="accordion-section-content">
                <?php echo $collection_obj->field_description['und'][0]['safe_value']; ?>
              </div><!--end .accordion-section-content-->
            </div>
<?php
      $t++;
    }
  }
?>
                  
          </div>
        </div>
      </div>
    <!-- Blog section -->
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1"></div>
    <div class="col-lg-5 col-md-5 weather">
      <div class="weather_section">
        <div class="digri_cel"><?php echo $current_node->field_tagline_caption['und'][0]['value']; ?></div>
        <div class="time_of_sun">
            <span><?php echo $current_node->field_time['und'][0]['value']; ?></span>
            <span><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/wather-sun.png"></span>
            <span><?php echo $current_node->field_voyage_de['und'][0]['value']; ?></span>
        </div>
      </div>
      <?php echo $current_node->field_sec1_subsection1['und'][0]['safe_value']; ?>
    </div>

</div>
<div class="shadow_border img">
  <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/shadow_bottom.png">
</div>



<div class="blog_activity_wrapper">
  <h2 class="text-center"><?php echo $fp_node->field_second_4_col_heading['und'][0]['value']; ?></h2>
  <h4 class="text-center"><?php echo $fp_node->field_second_4_col_sub_heading['und'][0]['value'];; ?></h4>    
</div>
<div class="blog_act_list2">
  <div class="row margin_none">
<?php
$query = new EntityFieldQuery();

$query->entityCondition('entity_type', 'node')
  ->entityCondition('bundle', 'popular_activities')
  ->propertyCondition('status', NODE_PUBLISHED)
  ->propertyCondition('language', $language->language)
  ->range(0, 4);

$result = $query->execute();

if (isset($result['node'])) {
  $new_items_nids = array_keys($result['node']);
  foreach ($new_items_nids as $key => $value) {
    $the_node = node_load($value);
    $field_short_description = field_extract_value('node', $the_node, 'field_short_description');
    $field_personne_pour_1h = field_extract_value('node', $the_node, 'field_personne_pour_1h');

    $img1 = file_create_url($the_node->field_image['und'][0]['uri']);
    
    $field_action_on_button_click = field_extract_value('node', $the_node, 'field_action_on_button_click');
    $field_link_to_button = field_extract_value('node', $the_node, 'field_link_to_button');
    $field_button_title = field_extract_value('node', $the_node, 'field_button_title');
?>

      <div class="col-md-3  col-sm-3 space1cell">
          <div class="blog_list-inner">
              <img class="imgfull-width" src="<?php echo $img1; ?>" alt=""/>
              <div class="blog_list_content_in">
                 <p><?php echo $field_short_description; ?></p>
                 <h6><?php echo $field_personne_pour_1h; ?></h6>
                 <a class="btn btn-yellow <?php if ($field_action_on_button_click == 0) { echo "btn-cont" ;} ?>" href="<?php echo $field_link_to_button; ?>"><?php echo $field_button_title; ?></a>
              </div>
          </div>
      </div>
<?php
  }
}
?>
                          
    </div>
  </div>
</div>
        <!-- Blog activities -->
        
        <!-- masaya hostel -->
        <div class="blog_masaya-hostel space-bottom-50">
            <div class="row margin_none">
                 <div class="col-md-6  col-sm-6 padding_none">
                   <a href="<?php echo $fp_node->field_bottom_image_link_1['und'][0]['value']; ?>">
                   <div class="blog_listing_main">
                    <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($fp_node->field_hostel_image_1['und'][0]['uri']); ?>" alt="<?php echo $fp_node->field_hostel_image_1['und'][0]['alt']; ?>" title="<?php echo $fp_node->field_hostel_image_1['und'][0]['title']; ?>" />
                    <div class="blog_list_overlay_con text-center">
                        <div class="blog_list_inner">
                            <h3><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/masaya_logo.png" alt="masaya_logo" /></h3>
                            <h3 class="h1_seo_trip"><?php echo t('BOGOTA'); ?></h3>
                        </div>
                    </div>
                  </div>
                 </a>
                 </div>
                 
                 <div class="col-md-6  col-sm-6 padding_none">
                    <a href="<?php echo $fp_node->field_bottom_image_link_2['und'][0]['value']; ?>">
                    <div class="blog_listing_main">
                        <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($fp_node->field_hostel_image_2['und'][0]['uri']); ?>" alt="<?php echo $fp_node->field_hostel_image_2['und'][0]['alt']; ?>" title="<?php echo $fp_node->field_hostel_image_2['und'][0]['title']; ?>" />
                        <div class="blog_list_overlay_con text-center">
                            <div class="blog_list_inner">
                              <h3><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/masaya_logo.png" alt="masaya_logo" /></h3>
                                <h3 class="h1_seo_trip"><?php echo t('SANTA MARTA'); ?></h3>
                            </div>
                        </div>
                      </div>
                      </a>
                 </div>
            </div>
        </div>
</div>
<!-- end Gallery -->