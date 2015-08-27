<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
**/
?>
<?php 
  global $base_url; 
  global $language;
  $current_node = translation_node_get($node->nid);
  $fp_node = translation_node_get(2);
?>

<!-- start Gallery -->
<div class="Album_photo_back">
  <div class="container">
    <div class="col-lg-9 col-md-9 col-sm-9 Album_photo">
      <h2><?php echo $current_node->field_yellow_bg_title['und'][0]['value']; ?></h2>
      <?php echo $current_node->field_yellow_bg_text['und'][0]['safe_value']; ?>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3">
      <img src="<?php echo file_create_url($current_node->field_yellow_bg_heading['und'][0]['uri']); ?>" alt="<?php echo $current_node->field_yellow_bg_heading['und'][0]['alt']; ?>" title="<?php echo $current_node->field_yellow_bg_heading['und'][0]['title']; ?>" />
      <br/>
      <br/>
    </div>
  </div>
</div>

<div class="container">
  <div class="decouvrir_la_colombie_heading">
    <h2><?php echo $current_node->field_itinerary_section_title['und'][0]['value']; ?></h2>
    <h5><?php echo $current_node->field_itinerary_section_subtitle['und'][0]['value']; ?></h5>
  </div>
  <br/>
  <div class="col-lg-12 col-md-12 col-sm-12 padding_none p_padding forsameheight">
<?php 
  $i = 0;
  if(isset($current_node->field_itinerary_details['und'])) {
    foreach ($current_node->field_itinerary_details['und'] as $key => $value) {
      $i++;
      $collection_obj = field_collection_item_load($value['value']); ?>
      <div class="col-lg-4 col-sm-4 col-md-4 padding_none img Yallow_round_items <?php if ($i==2) echo 'partition'; ?>">
        <img src="<?php echo file_create_url($collection_obj->field_city_guide_pic['und'][0]['uri']); ?>" alt="<?php echo $collection_obj->field_city_guide_pic['und'][0]['alt']; ?>" title="<?php echo $collection_obj->field_city_guide_pic['und'][0]['title']; ?>">
        <h5><strong><?php echo $collection_obj->field_section_1_white_title['und'][0]['value']; ?></strong></h5>
        <div class="items_content_p"><?php echo $collection_obj->field_description['und'][0]['safe_value']; ?></div>
        <div class="colombi_child">
          <div class="Yallow_round"><?php echo $collection_obj->field_voyage_de['und'][0]['value'].'<br/>'.$collection_obj->field_personne_pour_1h['und'][0]['value']; ?></div>
        <h4><strong><?php echo $collection_obj->field_white_large_text_2['und'][0]['value']; ?></strong></h4>
        <i><strong><?php echo $collection_obj->field_white_large_text_3['und'][0]['value']; ?></strong></i>
        <a class="btn btn-default" href="<?php echo $collection_obj->field_instagram_button_link['und'][0]['value']; ?>">
          <?php echo $collection_obj->field_instagram_button_text['und'][0]['value']; ?>
        </a>
        </div>
         <div class="item_shadow"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/blog_list_shadow.png"></div>
      </div>
<?php
    }
  }
?>
  </div>
  <br clear="all">
  <br/>
  <div class="col-lg-12 col-md-12 col-sm-12 padding_none">
    <a href="<?php $current_node->field_image_quad_1_link['und'][0]['value']; ?>">
      <div class="col-lg-6 col-md-6 padding_none img">
        <img src="<?php echo file_create_url($current_node->field_image_quad_1['und'][0]['uri']);?>" alt="<?php $current_node->field_image_quad_1['und'][0]['alt'];?>" title="<?php $current_node->field_image_quad_1['und'][0]['title'];?>">
        <div class="blog_list_overlay_con text-center">
          <div class="blog_list_inner">
            <h3 class="h1_seo_trip"><?php echo $current_node->field_white_large_text['und'][0]['value']; ?></h3>
            <h3 class="h2_seo_trip"><?php echo $current_node->field_black_small_text_1['und'][0]['value']; ?></h3>
          </div>
        </div>
      </div>
    </a>
    <div class="col-lg-6 col-md-6 col-sm-12 padding_none mobile_img">
<?php
  if(isset($current_node->field_excursion_small_images['und'])) {
    foreach ($current_node->field_excursion_small_images['und'] as $key => $value) {
      $collection_obj = field_collection_item_load($value['value']);
?>
        <div class="col-lg-4 col-md-4 col-sm-6 padding_none img">
          <a href="<?php echo $collection_obj->field_image_link['und'][0]['value']; ?>">
            <img src="<?php echo file_create_url($collection_obj->field_excursion_image['und'][0]['uri']);?>" alt="<?php $collection_obj->field_excursion_image['und'][0]['alt'];?>" title="<?php $collection_obj->field_excursion_image['und'][0]['title'];?>">
          </a>
        </div>
<?php
    }
  }
?>
    </div>
  </div>


  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="decouvrir_la_colombie_heading">
       <h2><?php echo $current_node->field_city_guide_title['und'][0]['value']; ?></h2>
       <h5><?php echo $current_node->field_city_guide_subtitle['und'][0]['value']; ?></h5>
    </div>
    <br/>

<?php
  if(isset($current_node->field_city_guide_images['und'])) {
    foreach ($current_node->field_city_guide_images['und'] as $key => $value) {
      $collection_obj = field_collection_item_load($value['value']);
?>
        
        <div class="col-md-6 col-md-6 col-sm-6 padding_none">
          <a href="<?php echo $collection_obj->field_image_link_1['und'][0]['value']; ?>">
          <div class="blog_listing_main">
            <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($collection_obj->field_city_guide_pic['und'][0]['uri']);?>" alt="<?php $collection_obj->field_city_guide_pic['und'][0]['alt'];?>" title="<?php $collection_obj->field_city_guide_pic['und'][0]['title'];?>">
            <div class="blog_list_overlay_con text-center">
              <div class="blog_list_inner">
                <h3 class="h1_seo_trip"><?php echo $collection_obj->field_section_1_white_title['und'][0]['value']; ?></h3>
                <h3 class="h2_seo_trip"><?php echo $collection_obj->field_black_small_text_1['und'][0]['value']; ?></h3>
              </div>
            </div>
          </div>
          </a>
        </div>
<?php
    }
  }
?>               
  </div>

  <div class="col-lg-12 col-md-12  col-sm-12">
    <div class="decouvrir_la_colombie_heading">
      <h2><?php echo $current_node->field_thematic_issues_title['und'][0]['value']; ?></h2>
      <h5><?php echo $current_node->field_thematic_issues_subtitle['und'][0]['value']; ?></h5>
    </div>
    <br/>
  </div>
</div>
<div class="yallow_border"></div>

 
<div class="container">
  <div class="col-lg-12 col-md-12 col-sm-12 padding_none">
    <!-- Controls -->
    <div class="controls">
      <a class="left btn btn-primary left_slide" href="#carousel-example-generic" data-slide="prev"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/act_banner_Arrow.png"></a>
      <a class="right btn btn-primary right_slide" href="#carousel-example-generic" data-slide="next"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/act_banner_Arrow_rgt.png"></a>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 padding_none">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
<?php

if(isset($current_node->field_carousels['und'])) {
  $echo = '<div class="item active"><div class="row">';
  foreach ($current_node->field_carousels['und'] as $key => $value) {
    $collection_obj = field_collection_item_load($value['value']);
    $i++;
    //$the_node = node_load($value); 
    $echo .= '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 padding_none">
              <div class="col-item">
                <a href="'.$collection_obj->field_image_quad_1_link['und'][0]['value'].'">
                <img src="'.image_style_url('carousal', $collection_obj->field_image['und'][0]['uri']).'">
                <div class="blog_list_overlay_con blog_list_overlay_con2 text-center">
                  <div class="blog_list_inner">
                    <h3 class="h1_seo_trip">'.$collection_obj->field_section_1_white_title['und'][0]['value'].'</h3>
                    <h3 class="h2_seo_trip">'.$collection_obj->field_white_large_text['und'][0]['value'].'</h3>
                  </div>
                </div>
                </a>
              </div>
            </div>';
    if (($i%3) == 0) {
      echo $echo.'</div></div>';
      $echo = '<div class="item"><div class="row">';
    }
  }
}
?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br clear="all">
  <br/>
  <div class="container">
   <!-- Blog activities -->
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

      <div class="col-md-3 col-md-3 col-sm-3 space1cell">
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
           <div class="col-md-6 col-md-6 col-sm-6 padding_none">
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
           
           <div class="col-md-6 col-md-6 col-sm-6 padding_none">
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