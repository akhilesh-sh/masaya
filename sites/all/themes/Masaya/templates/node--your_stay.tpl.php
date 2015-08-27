<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
**/

?>
<?php 
  global $base_url; 
  $current_node = translation_node_get(26);
?>
<style type="text/css">
  #Section_2_panel h5 { clear: left; }
</style>
<!-- Blog inner yellow section -->
<div class="main_yellow_inner blog_top-yellow">
    <div class="container">
        <!-- Top content -->
        <div class="row inner-y_conternt1">
              <div class="col-md-12"><h2 class="title_yellow"><?php echo $current_node->field_yellow_bg_title['und'][0]['value']; ?></h2></div>
             <div class="col-md-9 col-sm-12">
                 <em><?php echo $current_node->field_yellow_bg_text['und'][0]['value']; ?></em>
             </div>
             <div class="col-md-3 col-sm-3 pull-right hidden-tablet">
                 <div><img src="<?php echo file_create_url($current_node->field_yellow_bg_heading['und'][0]['uri']) ;?>" alt="<?php echo $current_node->field_yellow_bg_heading['und'][0]['alt']; ?>" title="<?php echo $current_node->field_yellow_bg_heading['und'][0]['title']; ?>" /></div>
             </div>
        </div>
        <!-- Top content -->
        
        
    </div>
</div>
<!-- Blog inner yellow section -->
<?php //echo "<pre>"; print_r($current_node); echo "</pre>";?>
<!-- Start section 1-->
<div class="fixed_social_icons main_h">
<img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Part-icon.png"><br/><span><?php echo t('Share'); ?> </span>
<a href="http://twitter.com/intent/tweet?text=<?php echo drupal_get_title() .'+Masaya Hostels&url='.$base_url.'/'.$language->language. current_path(); ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Tw-icon.jpg"></a>
<a href="http://facebook.com/sharer.php?u=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q']; ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-fb-icon.jpg"></a>
<a href="https://plus.google.com/share?url=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q']; ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-G+-icon.jpg"></a>
<a href="<?php echo 'javascript:void((function()%7Bvar%20e=document.createElement(\'script\');e.setAttribute(\'type\',\'text/javascript\');e.setAttribute(\'charset\',\'UTF-8\');e.setAttribute(\'src\',\'http://assets.pinterest.com/js/pinmarklet.js?r=\'+Math.random()*99999999);document.body.appendChild(e)%7D)());'; ?>"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/Pinterest-Logo.png"></a>
<a href="mailto:?url=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q'].' &subject=I wanted you to see this site&amp;body=Check out this site .'.$base_url.'/'.$_GET['q']; ?>" title="Share by Email"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Msg-icon.jpg"></a>
</div>
<section class="Section_1" style="background-image: url('<?php echo file_create_url($current_node->field_section_1_image['und'][0]['uri']); ?>');">
  <div class="container">
    <div id="Section_1_toggle"><?php echo $current_node->field_section_1_white_title['und'][0]['value']; ?>
      <span class="down_arrow"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/arrow_down_toggle.png"></span>
    </div>
    <div id="Section_1_panel">
        <div class="ParentDiv">
          <br/>
    <br/>
     <div class="Section_panel_midle_div panel_left_contant">
      <div class="col-md-8">
        <?php echo $current_node->field_sec1_subsection1['und'][0]['safe_value']; ?>
      </div>
      <div class="col-md-4 img top_margin"><img src="<?php echo file_create_url($current_node->field_sec1_subsection1_image['und'][0]['uri']); ?>" alt="<?php echo $current_node->field_sec1_subsection1_image['und'][0]['alt']; ?>" title="<?php echo $current_node->field_sec1_subsection1_image['und'][0]['title']; ?>"></div>
      <div class="divider"></div>
     </div>

      <div class="Section_panel_midle_div panel_left_contant">
        <div class="col-md-12">
          <?php echo $current_node->field_sec1_subsection2['und'][0]['safe_value']; ?>
        </div>
      </div>
<div class="shadow_divider img">
  <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/shadow_inner.png">
</div>
<br/>
<div class="Section_panel_midle_div bottom_work">
  <div class="col-md-5">
    <p><?php echo $current_node->field_flight_duration_title['und'][0]['safe_value']; ?></p>
<div class="city_details">
<ul>
<?
  if(isset($current_node->field_sec1_subsec_times['und'])) {
    foreach($current_node->field_sec1_subsec_times['und'] as $key => $value) {
      $collection_obj = field_collection_item_load($value['value']); ?>
      <li>
          <span class="city_name"><strong><?php echo field_extract_value('field_collection_item',$collection_obj,'field_place_name'); ?> </strong></span>
          <span class="city_hrs"><strong><?php echo field_extract_value('field_collection_item',$collection_obj,'field_time'); ?> </strong></span>
      </li>
<?php
    }
  }
?>
</ul>
</div>

  </div>
  <div class="col-md-6">
    <?php echo $current_node->field_sec1_subsection3['und'][0]['safe_value']; ?>
  </div>
</div>

   <br clear="all">
   <br/>
   <br/>
        </div>
    </div>
  </div>
</section>

<!-- Start section 2-->
<section class="Section_2" style="background-image: url('<?php echo file_create_url($current_node->field_section_2_image['und'][0]['uri']); ?>');">
  <div class="container">
    <div id="Section_2_toggle"><?php echo $current_node->field_section_2_white_title['und'][0]['value']; ?>
      <span class="down_arrow"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/arrow_down_toggle.png"></span>
    </div>
    <div id="Section_2_panel">
    <div class="ParentDiv">
      <br/>
      <br/>
        <div class="Section_panel_midle_div panel_left_contant section_contant2">
          <?php echo $current_node->field_sec2_subsection1['und'][0]['safe_value']; ?>
          <div class="divider"></div>
          <?php echo $current_node->field_sec2_subsection2['und'][0]['safe_value']; ?>
          <div class="col-md-8">
            <?php echo $current_node->field_sec2_subsection3['und'][0]['safe_value']; ?>
          </div>
          <div class="col-md-4 img">
            <img src="<?php echo file_create_url($current_node->field_sec2_image['und'][0]['uri']); ?>" alt="<?php echo $current_node->field_sec2_image['und'][0]['alt']; ?>" title="<?php echo $current_node->field_sec2_image['und'][0]['title']; ?>">
          </div>
            <?php echo $current_node->field_sec2_subsection4['und'][0]['safe_value']; ?>
            <?php echo $current_node->field_sec2_subsection5['und'][0]['safe_value']; ?>

            <div class="shadow_divider img">
              <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/shadow_inner.png">
            </div>
            <br/>
            <p><strong><?php echo $current_node->field_bordered_text_heading['und'][0]['value']; ?></strong></p>
            <span class="heading_border"><?php echo $current_node->field_bordered_section_content['und'][0]['safe_value']; ?></span>
            <div class="col-md-6">
              <?php echo $current_node->field_sec2_subsection6['und'][0]['safe_value']; ?>
            </div>
            <div class="col-md-6">
              <?php echo $current_node->field_sec2_subsection7['und'][0]['safe_value']; ?>
            </div>
        </div>
        <br clear="all">
        <br/>
    </div>
    </div>
  </div>
</section>

<!-- Start section 3-->
<section class="Section_3" style="background-image: url('<?php echo file_create_url($current_node->field_section_3_image['und'][0]['uri']); ?>');">
  <div class="container">
    <div id="Section_3_toggle"><?php echo $current_node->field_section_3_white_title['und'][0]['value']; ?>
      <span class="down_arrow"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/arrow_down_toggle.png"></span>
    </div>
    <div id="Section_3_panel">
    <div class="ParentDiv">
    <br/>
    <br/>
     <div class="Section_panel_midle_div panel_left_contant">
      <div class="col-md-8">
        <?php echo $current_node->field_sec3_subsection1['und'][0]['safe_value']; ?>
        <div class="divider"></div>
        <?php echo $current_node->field_sec3_subsection2['und'][0]['safe_value']; ?>
      </div>
      <div class="col-md-4 img top_margin"><img src="<?php echo file_create_url($current_node->field_sec3_image_1['und'][0]['uri']); ?>" alt="<?php echo $current_node->field_sec3_image_1['und'][0]['alt']; ?>" title="<?php echo $current_node->field_sec3_image_1['und'][0]['title']; ?>"></div>
        <div class="col-md-12">
          <?php echo $current_node->field_sec3_subsection3['und'][0]['safe_value']; ?>
          <div class="big_img"><img src="<?php echo file_create_url($current_node->field_sec3_image_2['und'][0]['uri']); ?>" alt="<?php echo $current_node->field_sec3_image_2['und'][0]['alt']; ?>" title="<?php echo $current_node->field_sec3_image_2['und'][0]['title']; ?>"></div>
        </div>
        <div class="divider"></div>
     </div>

      <div class="Section_panel_midle_div panel_left_contant">
        <div class="col-md-12">
          <?php echo $current_node->field_sec3_subsection4['und'][0]['safe_value']; ?>
          <div class="big_img"><img src="<?php echo $base_url.'/'.path_to_theme();?>/images/shadow_bottom.png"></div>
          <?php echo $current_node->field_sec3_subsection5['und'][0]['safe_value']; ?>
          <div class="Section_light_img">
            <img src="<?php echo $base_url.'/'.path_to_theme();?>/images/light_img.png">
            <?php echo $current_node->field_sec3_subsection6['und'][0]['safe_value']; ?>
          </div>
          <?php echo $current_node->field_sec3_subsection7['und'][0]['safe_value']; ?>
        </div>
      </div>

   <br clear="all">
   <br/>
   <br/>
    </div>
    </div>
  </div>
</section>

<!-- Start section 4-->
<section class="Section_4" style="background-image: url('<?php echo file_create_url($current_node->field_section_4_image['und'][0]['uri']); ?>');">
  <div class="container">
    <div id="Section_4_toggle"><?php echo $current_node->field_section_4_white_title['und'][0]['value']; ?>
      <span class="down_arrow last_arrow"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/arrow_down_toggle.png"></span>
    </div>
    <div id="Section_4_panel">
    <div class="ParentDiv">
      <br/>
      <br/>
      <div class="Section_panel_midle_div panel_left_contant">
        <div class="col-md-12">
          <?php echo $current_node->field_sec4_subsection1['und'][0]['safe_value']; ?>
          <div class="divider"></div>
        </div>
        <div class="col-md-8">
          <?php echo $current_node->field_sec4_subsection2['und'][0]['safe_value']; ?>
          <?php echo $current_node->field_sec4_subsection3['und'][0]['safe_value']; ?>
        </div>
        <div class="col-md-4 img top_margin">
          <img src="<?php echo file_create_url($current_node->field_sec4_image_1['und'][0]['uri']); ?>" alt="<?php echo $current_node->field_sec4_image_1['und'][0]['alt']; ?>" title="<?php echo $current_node->field_sec4_image_1['und'][0]['title']; ?>">
        </div>
        <div class="col-md-12">
          <br/>
          <br/>
          <?php echo $current_node->field_sec4_subsection4['und'][0]['safe_value']; ?>
          <div class="divider"></div>
          <?php echo $current_node->field_sec4_subsection5['und'][0]['safe_value']; ?>
          <div class="big_img">
            <img src="<?php echo file_create_url($current_node->field_sec4_image_2['und'][0]['uri']); ?>" alt="<?php echo $current_node->field_sec4_image_2['und'][0]['alt']; ?>" title="<?php echo $current_node->field_sec4_image_2['und'][0]['title']; ?>">
          </div>
          <br/>
        </div>
        <div class="big_img">
          <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/shadow_bottom.png">
        </div>
        <div class="Section_light_img">
          <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/light_img.png">
          <?php echo $current_node->field_sec4_subsection6['und'][0]['safe_value']; ?>
        </div>
      </div>
    </div>
    </div>
  </div>

  <br clear="all">
  </div>
  </div>
</section>
<!-- end toggle all section-->

<!-- Blog tips & travel -->
<div class="blog_tips_wrapper">
    <div class="container">
<?php $fp_node = translation_node_get(2); ?>
        <div class="blog_hostel_ho-con">
            <!-- masaya hostel -->
            <div class="blog_masaya-hostel">
                <div class="row margin_none">
                     <div class="col-md-6  col-sm-12 padding_none">
                     <a href="<?php echo $fp_node->field_bottom_image_link_1['und'][0]['value']; ?>">
                       <div class="blog_listing_main">
                        <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($fp_node->field_hostel_image_1['und'][0]['uri']); ?>" alt="<?php echo $fp_node->field_hostel_image_1['und'][0]['alt']; ?>" title="<?php echo $fp_node->field_hostel_image_1['und'][0]['title']; ?>" />
                        <div class="blog_list_overlay_con text-center">
                            <div class="blog_list_inner">
                                <h3><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/masaya_logo.png" alt="Masaya Logo" /></h3>
                                <h3 class="h1_seo_trip">BOGOTA</h3>
                            </div>
                        </div>
                      </div>
                     </a>
                     </div>
                     
                     <div class="col-md-6  col-sm-12 padding_none">
                      <a href="<?php echo $fp_node->field_bottom_image_link_2['und'][0]['value']; ?>">
                        <div class="blog_listing_main">
                            <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($fp_node->field_hostel_image_2['und'][0]['uri']); ?>" alt="<?php echo $fp_node->field_hostel_image_2['und'][0]['alt']; ?>" title="<?php echo $fp_node->field_hostel_image_2['und'][0]['title']; ?>" />
                            <div class="blog_list_overlay_con text-center">
                                <div class="blog_list_inner">
                                    <h3><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/masaya_logo.png" alt="Masaya Logo" /></h3>
                                    <h3 class="h1_seo_trip">SANTA MARTA</h3>
                                </div>
                            </div>
                          </div>
                      </a>
                     </div>
                </div>
            </div>
            <!-- masaya hostel -->
            
            <!-- Blog hostel instagram -->
         <div class="blog_hostel-ins">
                   <div class="row margin_none">
                       <div class="col-md-6 col-sm-12 padding_none">
                          <a href="<?php echo $node->field_footer_1_image_link['und'][0]['value']; ?>">
                            <div class="blog_listing_main">
                                <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($node->field_footer_1_image['und'][0]['uri']); ?>" alt="<?php echo file_create_url($node->field_footer_1_image['und'][0]['alt']); ?>" title="<?php echo file_create_url($node->field_footer_1_image['und'][0]['title']); ?>" />
                                <div class="blog_list_overlay_con text-center">
                                    <div class="blog_list_inner">
                                        <h3 class="h1_seo_trip"><?php echo $node->field_footer_1_image_white_text['und'][0]['value']; ?></h3>
                                        <h3 class="h2_seo_trip"><?php echo $node->field_footer_1_image_black_text['und'][0]['value']; ?></h3>
                                    </div>
                                </div>
                              </div>
                            </a>
                       </div>
                       <div class="col-md-6 col-sm-12 padding_none">
                            <div class="row margin_none">
                                <div class="col-md-12 text-center padding_none">
                                     <div class="instagram blogvp-instacon1">
                                       <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/instagram.png" alt="" />
                                       <h5><?php echo $fp_node->field_instagram_text['und'][0]['value']; ?>
                                            <span>@masayahostels</span>
                                            <span>#masayahostel</span> 
                                       </h5>
                                       <a href="<?php echo $fp_node->field_instagram_button_link['und'][0]['value']; ?>" class="btn btn-default btn-yellow span-top20"><?php echo $fp_node->field_instagram_button_text['und'][0]['value']; ?></a>
                                   </div>
                                </div>
<?php
  
  $Instagram_ID = "510627558";
  $Instagram_Token = "510627558.98ec466.00e08393fe294c9aa6e2470c7f735acb";

  $url = "https://api.instagram.com/v1/tags/masayahostel/media/recent?access_token=".$Instagram_Token;

  $chI = curl_init();
  curl_setopt($chI, CURLOPT_URL, $url);
  curl_setopt($chI, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($chI, CURLOPT_TIMEOUT, 0);
  curl_setopt($chI, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($chI, CURLOPT_SSL_VERIFYPEER, 0);
  $result = curl_exec($chI);
  curl_close($chI);

  $objectI = json_decode($result);
  $arrayI  = object2array($objectI);

  $tCounter = 0;

  foreach ($arrayI['data'] as $keyI => $valueI) {
      if($tCounter > 7){
          break;
      }
      $finalT[$tCounter]['photos']  = $valueI['images']['low_resolution']['url'];
      $finalT[$tCounter]['link']    = $valueI['link'];

      $tCounter++;
  }
?>
                                <div class="col-md-12 padding_none">
                                     <div class="row margin_none node_insta">
                                      <?php
                                        foreach ($finalT as $key => $value) { 
                                      ?>
                                          <div class="col-md-3 col-sm-6 col-xs-6 padding_none"><a href="<?php echo $value['link']; ?>"><img class="imgfull-width" src="<?php echo $value['photos']; ?>" alt="" /></a></div>
                                      <?php
                                        }
                                      ?>
                                     </div>
                                </div>
                                
                            </div>
                       </div>
                       
                   </div>
               </div>
            <!-- Blog hostel instagram -->
            
        </div>
        
    </div>
</div>
