<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
**/
?>
<?php global $base_url; 
	$device_type = getDevice();
?>
<button id="toggle" type="button" class="navbar-toggle main_h">
        <div class="icon-bar"></div>
        <div class="icon-bar"></div>
        <div class="icon-bar"></div>
       </button>
<div id="overlay"></div>
<nav id="menu">
<? $url = "http://localhost/masaya/public/index.php/api/get_footer_data/".$language->language;
          $abcd = file_get_contents($url);
          $objecth = json_decode($abcd, true);
          //echo "<pre>"; print_r($objecth); ?> 
  <ul class="nav navbar-nav">
      <li class="nav-item"><a href="<?php echo $objecth['footerlinkone']['0']['link_url2'];?>"><span><?php echo t('Our Hostels'); ?></span><br /><?php echo t('Bogota'); ?></a></li>
      <li class="nav-item no_bdr"><a href="<?php echo $objecth['footerlinkone']['0']['link_url3'];?>"><span> &nbsp; </span><br /><?php echo t('Santa Marta'); ?></a></li>
      <li class="nav-item current"><a href="<?php echo $objecth['footerlinktwo']['0']['link_url2'];?>"><span><?php echo t('Travel in Colombia'); ?></span><br /> <?php echo t('Tips & travels'); ?> </a></li>                        
  </ul>
  <?php 
   $lang = current_path();
   //$lang = str_replace('/'.$language->language.'/', '/en/', $lang);
   $languages = array('es', 'en', 'fr');
  ?>
  
<div class="mobile_yallow_strip">
       <!-- Top links start here -->
<ul class="y_inner-topul text-center mobile_hidden">
<?php
       $tree = menu_tree_all_data('menu-secondary-menu');
       // echo "testing";
       foreach ($tree as $key => $value) {
         if ($value['link']['language'] == $language->language) { ?>
           <li><a href="<?php echo $value['link']['link_path']; ?>"><?php echo $value['link']['link_title']; ?></a></li>
<?php    }
       }
      ?>
       </ul>
       <!-- Top links start here -->
       
</div>
<ul class="mobile_flag_icon">
   <li><a href="<?php echo $base_url.'/es/'.$lang; ?>"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/es.png" alt="" /></a></li>
   <li class="mobile_border"><a href="<?php echo $base_url.'/en/'.$lang; ?>"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/en.png" alt="" /></a></li>
   <li><a href="<?php echo $base_url.'/fr/'.$lang; ?>"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fr.png" alt="" /></a></li>
  </ul>

  
</nav>
<main id="content">
<div class="top_header">
    <div class="navbar-collapse collapse"> 
      <div class="pull-left left_exp"><a href="<?php echo $objecth['footerlinkone']['0']['link_url1'];?>"><?php echo $objecth['footerlinkone']['0']['link1'];?></a></div>
<div class="dropdown language_flag">
  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <a href="#"><img src="<?php echo $base_url.'/'.path_to_theme().'/images/'.$language->language.'.png'; ?>" alt="" /></a>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel">
<?php 
  foreach ($languages as $key => $value) { 
    if ($value != $language->language) {
?>
      <li><a href="<?php echo $base_url.'/'.$value.'/'.$lang; ?>"><img src="<?php echo $base_url.'/'.path_to_theme().'/images/'.$value.'.png'; ?>" alt="" /></a></li>
<?php 
    }
  } 
?>
  </ul>
</div>
    </div>
</div>
<!-- Header -->
<header class="main_head main_h">
<div class="mobile_second_nav">
  <button id="second_yallo_mobile_toggle"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/mobile-yallow-down-arrow.png" alt="" /></button>
</div>
<!-- mobile yallow link start here-->
<div class="mobile_yallow_strip">
<ul class="y_inner-topul text-center">
<?php
       $tree = menu_tree_all_data('menu-secondary-menu');
       foreach ($tree as $key => $value) {
         if ($value['link']['language'] == $language->language) { ?>
           <li><a href="<?php echo url($value['link']['link_path'], array('absolute' => true)); ?>"><?php echo $value['link']['link_title']; ?></a></li>
<?php    }
       }
      ?>
</ul>
</div>
<!--mobile yallow link end here -->
   <div class="container">
  <!--  <a id="toggle" href="#"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a> -->
       
        <div class="navbar-header mobile_logo">
            <a href="<?php echo $base_url; ?>" class="navbar-brand mobile_hidden"><img src="<?php echo $logo; ?>" alt="" /></a>
            <a href="<?php echo $base_url; ?>" class="rev-brand deskt_hidden"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/logo_reasponsive.png" alt="" /></a>
            <h6 class="current-page-title1" style="display: inline;"><?php echo t('Tips & Travels'); ?> </h6> 
        </div>
            <ul class="nav navbar-nav hidden_mobile">
                <li class="nav-item"><a href="<?php echo $objecth['footerlinkone']['0']['link_url2'];?>"><span><?php echo t('Our Hostels'); ?></span><br /><?php echo t('Bogota'); ?></a></li>
                <li class="nav-item no_bdr"><a href="<?php echo $objecth['footerlinkone']['0']['link_url3'];?>"><span> &nbsp; </span><br /><?php echo t('Santa Marta'); ?></a></li>
                <li class="nav-item current"><a href="<?php echo $objecth['footerlinktwo']['0']['link_url2'];?>"><span><?php echo t('Travel in Colombia'); ?></span><br /> <?php echo t('Tips & travels'); ?> </a></li>                        
            </ul>
        <div class="pull-right reserver_con" ><?php echo t('Book Now'); ?></div>
   </div>
        <div class="reserver_top_form" style="display:none;" >
            <div class="container">
                 <h3><?php echo t('Book your room in Masaya'); ?></h3>
                  <form method="GET" id="reserverForm" onsubmit="return submitReservation()">
                     <input name="aid" type="hidden" value="330843">
                     <input id="hotel_id" name="hotel_id" type="hidden" value="">
                     <input name="lang" type="hidden" value="<?php echo $language->language; ?>">
                     <input id="checkin_monthday" name="checkin_monthday" type="hidden" value="">
                     <input id="checkin_year_month" name="checkin_year_month" type="hidden" value="">
                     <input id="checkout_monthday" name="checkout_monthday" type="hidden" value="">
                     <input id="checkout_year_month" name="checkout_year_month" type="hidden" value="">
                     <input id="language_code" name="language_code" type="hidden" value="<?php echo $language->language; ?>">
                        <div class="row margin_none">
                            <div class="col-md-2 col-sm-2 col-xs-12 padding_none">
                                <div class="form_check top_dropmain">
                                      <input type="radio" name="hostel_name" value="hostal-masaya-santa-marta">
                                      <label for="radio1"><?php echo t('Santa Marta'); ?></label>
                                 </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 padding_none">
                                <div class="form_check top_dropmain">
                                      <input type="radio" name="hostel_name" value="masaya">
                                      <label for="radio2"><?php echo t('Bogotá'); ?></label>
                                 </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 padding_none">
                                <div class="form-group datetime-drop_picker">
                                    <div class='input-group date' id='datetimepicker2'>
                                    	<?php if(($device_type == 'tablet') || ($device_type == 'mobile')) { ?>
                                    		<span class="form-control" id="span_arrival_date"><?php echo t('Check-in'); ?></span>
			                                <input type='hidden' class="form-control" contenteditable="false" placeholder="<?php echo t('Check-in'); ?>" name="arrival_date" id="arrival_date"/>
                                    	<?php } else { ?>
			                                <input type='text' class="form-control" contenteditable="false" placeholder="<?php echo t('Check-in'); ?>" name="arrival_date" id="arrival_date"/>
                                    	<?php } ?>
                                        <span class="input-group-addon">
                                           <span class="caret"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 padding_none">
                                <div class="form-group datetime-drop_picker">
                                    <div class='input-group date' id='datetimepicker3'>
                                    	<?php if(($device_type == 'tablet') || ($device_type == 'mobile')) { ?>
	                                    	<span class="form-control" id="span_departure_date"><?php echo t('Check-out'); ?></span>
	                                        <input type='hidden' class="form-control" contenteditable="false" placeholder="<?php echo t('Check-out'); ?>" name="departure_date" id="departure_date"/>
                                    	<?php } else { ?>
                                        	<input type='text' class="form-control" contenteditable="false" placeholder="<?php echo t('Check-out'); ?>" name="departure_date" id="departure_date"/>
                                    	<?php } ?>
                                        <span class="input-group-addon">
                                           <span class="caret"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 padding_none">
                                <div class="select_1">
                                    <select class="custom-select">
                                        <option><?php echo t('Number of Travellers'); ?></option><option>1</option><option>2</option>
                                        <option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 padding_none">
                                <input type="submit" class="btn btn-reserver" value="<?php echo t('Search For'); ?>" />
                            </div>
                        </div>
                    </form>
            </div>
        </div>
</header>
<!-- Header -->


</div>
<!-- Blog inner yellow section -->
<!-- Blog inner yellow section -->
<div class="main_yellow_inner main_h blog_top-yellow">
   <div class="container">
       <!-- Top links start here -->
       <ul class="y_inner-topul text-center mobile_hidden">
<?php
       $tree = menu_tree_all_data('menu-secondary-menu');
       // echo "testing";
       foreach ($tree as $key => $value) {
         if ($value['link']['language'] == $language->language) { ?>
           <li><h3><a href="<?php echo $value['link']['link_path']; ?>"><?php echo $value['link']['link_title']; ?></a></h3></li>
<?php    }
       }
      ?>
       </ul>
       <!-- Top links start here -->
       
   </div>
</div>
<!-- Blog inner yellow section -->
<!-- Blog inner yellow section -->
<?php
if ($language->language == 'en') {
  $node = node_load(2);
}
elseif ($language->language == 'fr') {
  $node = node_load(20);
}
elseif ($language->language == 'es') {
  $node = node_load(21);
}

$field_bottom_image_link_1 = field_extract_value('node', $node, 'field_bottom_image_link_1');
$field_bottom_image_link_2 = field_extract_value('node', $node, 'field_bottom_image_link_2');

$field_image_link_4 = field_extract_value('node', $node, 'field_image_link_4');
$field_image_link_3 = field_extract_value('node', $node, 'field_image_link_3');
$field_image_link_2 = field_extract_value('node', $node, 'field_image_link_2');
$field_image_link_1 = field_extract_value('node', $node, 'field_image_link_1');

$field_tagline_caption = field_extract_value('node', $node, 'field_tagline_caption');
$field_short_description = field_extract_value('node', $node, 'field_short_description');

$field_white_large_text = field_extract_value('node', $node, 'field_white_large_text');
$field_white_large_text_2 = field_extract_value('node', $node, 'field_white_large_text_2');
$field_white_large_text_3 = field_extract_value('node', $node, 'field_white_large_text_3');
$field_white_large_text_4 = field_extract_value('node', $node, 'field_white_large_text_4');

$field_black_small_text_1 = field_extract_value('node', $node, 'field_black_small_text_1');
$field_black_small_text_2 = field_extract_value('node', $node, 'field_black_small_text_2');
$field_black_small_text_3 = field_extract_value('node', $node, 'field_black_small_text_3');
$field_black_small_text_4 = field_extract_value('node', $node, 'field_black_small_text_4');

$img1 = file_create_url($node->field_image_quad_1['und'][0]['uri']);
$img2 = file_create_url($node->field_image_quad_2['und'][0]['uri']);
$img3 = file_create_url($node->field_image_quad_3['und'][0]['uri']);
$img4 = file_create_url($node->field_image_quad_4['und'][0]['uri']);

?>
<!-- Blog tips & travel -->
<div class="blog_tips_wrapper">
    <div class="container">
        <div class="trip_travel_inner text-center">
           <h6 class="home_trip_asdvisor"><?php echo t('Tips'); ?><span>&amp;</span><em><?php echo t('Travels'); ?></em></h6>
           <h6 class="bdr-blog"><?php echo $field_tagline_caption; ?></h6>
           <p><em><?php echo $field_short_description; ?></em></p>

        </div>
        
        
        <!-- Tips listing -->
         <div class="row margin_none">
             <div class="col-md-6 col-sm-6 padding_none">
                  <a href="<?php echo $field_image_link_1; ?>">
                  <div class="blog_listing_main">
                    <img class="imgfull-width blog_list_img" src="<?php echo $img1; ?>" alt="<?php echo $node->field_image_quad_1['und'][0]['alt']; ?>" title="<?php echo $node->field_image_quad_1['und'][0]['title']; ?>" />
                    <div class="blog_list_overlay_con text-center">
                        <div class="blog_list_inner">
                            <h3 class="h1_seo_trip"><?php echo $field_white_large_text; ?></h3>
                            <h3 class="h2_seo_trip"><?php echo $field_black_small_text_1; ?></h3>
                        </div>
                    </div>
                  </div>
                  </a>
             </div>
             
             <div class="col-md-6 col-sm-6 padding_none">
                  <a href="<?php echo $field_image_link_2; ?>">
                  <div class="blog_listing_main">
                    <img class="imgfull-width blog_list_img" src="<?php echo $img2; ?>" alt="<?php echo $node->field_image_quad_2['und'][0]['alt']; ?>" title="<?php echo $node->field_image_quad_2['und'][0]['title']; ?>" />
                    <div class="blog_list_overlay_con text-center">
                        <div class="blog_list_inner">
                            <h3 class="h1_seo_trip"><?php echo $field_white_large_text_2; ?></h3>
                            <h3 class="h2_seo_trip"><?php echo $field_black_small_text_2; ?></h3>
                        </div>
                    </div>
                  </div>
                  </a>
             </div>
             
             <div class="col-md-6 col-sm-6 padding_none">
                  <a href="<?php echo $field_image_link_3; ?>">
                  <div class="blog_listing_main">
                    <img class="imgfull-width blog_list_img" src="<?php echo $img3; ?>" alt="<?php echo $node->field_image_quad_3['und'][0]['alt']; ?>" title="<?php echo $node->field_image_quad_3['und'][0]['title']; ?>" />
                    <div class="blog_list_overlay_con text-center">
                        <div class="blog_list_inner">
                            <h3 class="h1_seo_trip"><?php echo $field_white_large_text_3; ?></h3>
                            <h3 class="h2_seo_trip"><?php echo $field_black_small_text_3; ?></h3>
                        </div>
                    </div>
                  </div>
                  </a>
             </div>
             
             <div class="col-md-6 col-sm-6 padding_none">
                  <a href="<?php echo $field_image_link_4; ?>">
                  <div class="blog_listing_main">
                    <img class="imgfull-width blog_list_img" src="<?php echo $img4; ?>" alt="<?php echo $node->field_image_quad_4['und'][0]['alt']; ?>" title="<?php echo $node->field_image_quad_4['und'][0]['title']; ?>" />
                    <div class="blog_list_overlay_con text-center">
                        <div class="blog_list_inner">
                            <h3 class="h1_seo_trip"><?php echo $field_white_large_text_4; ?></h3>
                            <h3 class="h2_seo_trip"><?php echo $field_black_small_text_4; ?></h3>
                        </div>
                    </div>
                  </div>
                  </a>
             </div>
             
         </div>
        <!-- Tips listing -->

<?php

$query = new EntityFieldQuery();

$query->entityCondition('entity_type', 'node')
  ->entityCondition('bundle', 'vos_voyages')
  ->propertyCondition('status', NODE_PUBLISHED)
  ->propertyCondition('language', $language->language)
  ->range(0, 3);

$result = $query->execute();

if (isset($result['node'])) {
  $new_items_nids = array_keys($result['node']);
  /*echo "<pre>";
  print_r($new_items_nids);
  echo "</pre>";*/
  $node = node_load($new_items_nids[0]);

  $field_voyage_de = field_extract_value('node', $node, 'field_voyage_de');
  $field_period = field_extract_value('node', $node, 'field_period');

  $img1 = file_create_url($node->field_author_photo['und'][0]['uri']);
  $img2 = file_create_url($node->field_large_voyage_image['und'][0]['uri']);

  // $translation_node = translation_node_get(2);
  // echo '<pre>';
  // print_r($translation_node);
  // echo '</pre>';

  $field_first_3_col_heading = field_extract_value('node', translation_node_get(2), 'field_first_3_col_heading');

?>

        
        <!-- your travel -->
         <div class="your_travel_con text-center">
           <div class="row margin_none">
               <h2 class="blog-tips_title"><?php echo $field_first_3_col_heading; ?></h2>
               <div class="col-md-4 col-sm-4 blog_list_space">
                  <a href="<?php echo url('node/'.$node->nid, array('absolute'=>'true')); ?>">
                    <div class="travel_listing-inner">
                       <h6><?php echo $node->title; ?></h6>
                        <img class="imgfull-width" src="<?php echo $img2; ?>" alt="<?php echo $node->field_large_voyage_image['und'][0]['alt']; ?>" title="<?php echo $node->field_large_voyage_image['und'][0]['title']; ?>" />
                        <div class="row">
                            <div class="col-md-5 col-sm-4 col-xs-4">
                                <div class="travel_container1">
                                   <img class="img-circle" src="<?php echo $img1; ?>" alt="<?php echo $node->field_author_photo['und'][0]['alt']; ?>" title="<?php echo $node->field_author_photo['und'][0]['title']; ?>" />
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-8 col-xs-8">
                                 <div class="blog-tips_content">
                                     <p><?php echo t(variable_get('voyage_de_label')); ?> : <strong><?php echo $field_voyage_de; ?></strong></p>
                                     <p><?php echo t(variable_get('period_label')); ?>: <strong><?php echo $field_period; ?></strong></p>
                                 </div>
                            </div>
                        </div>
                    </div>
                    </a>
               </div>

<?php

  $node = node_load($new_items_nids[1]);

  $field_voyage_de = field_extract_value('node', $node, 'field_voyage_de');
  $field_period = field_extract_value('node', $node, 'field_period');

  $img1 = file_create_url($node->field_author_photo['und'][0]['uri']);
  $img2 = file_create_url($node->field_large_voyage_image['und'][0]['uri']);

?>
               
               <div class="col-md-4 col-sm-4 blog_list_space space-15">
                  <a href="<?php echo url('node/'.$node->nid, array('absolute'=>'true')); ?>">
                    <div class="travel_listing-inner">
                       <h6><?php echo $node->title ; ?></h6>
                         <img class="imgfull-width" src="<?php echo $img2 ; ?>" alt="<?php echo $node->field_large_voyage_image['und'][0]['alt']; ?>" title="<?php echo $node->field_large_voyage_image['und'][0]['title']; ?>" />
                         <div class="row">
                            <div class="col-md-5 col-sm-4 col-xs-4">
                                <div class="travel_container1">
                                   <img class="img-circle" src="<?php echo $img1 ; ?>" alt="<?php echo $node->field_author_photo['und'][0]['alt']; ?>" title="<?php echo $node->field_author_photo['und'][0]['title']; ?>" />
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-8 col-xs-8">
                                 <div class="blog-tips_content">
                                     <p><?php echo t(variable_get('voyage_de_label')); ?> : <strong><?php echo $field_voyage_de ; ?></strong></p>
                                     <p><?php echo t(variable_get('period_label')); ?> : <strong><?php echo $field_period ; ?></strong></p>
                                 </div>
                            </div>
                        </div>
                    </div>
                  </a>
               </div>
               
<?php

  $node = node_load($new_items_nids[2]);

  $field_voyage_de = field_extract_value('node', $node, 'field_voyage_de');
  $field_period = field_extract_value('node', $node, 'field_period');

  $img1 = file_create_url($node->field_author_photo['und'][0]['uri']);
  $img2 = file_create_url($node->field_large_voyage_image['und'][0]['uri']);
}

?>

               <div class="col-md-4 col-sm-4 blog_list_space">
                  <a href="<?php echo url('node/'.$node->nid, array('absolute'=>'true')); ?>">
                    <div class="travel_listing-inner">
                       <h6><?php echo $node->title; ?></h6>
                         <img class="imgfull-width" src="<?php echo $img2; ?>" alt="<?php echo $node->field_large_voyage_image['und'][0]['alt']; ?>" title="<?php echo $node->field_large_voyage_image['und'][0]['title']; ?>" />
                         <div class="row">
                            <div class="col-md-5 col-sm-4 col-xs-4">
                                <div class="travel_container1">
                                   <img class="img-circle" src="<?php echo $img1; ?>" alt="<?php echo $node->field_author_photo['und'][0]['alt']; ?>" title="<?php echo $node->field_author_photo['und'][0]['title']; ?>" />
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-8 col-xs-8">
                                 <div class="blog-tips_content">
                                     <p><?php echo t(variable_get('voyage_de_label')); ?> : <strong><?php echo $field_voyage_de; ?></strong></p>
                                     <p><?php echo t(variable_get('period_label')); ?> : <strong><?php echo $field_period; ?></strong></p>
                                 </div>
                            </div>
                        </div>
                    </div>
                  </a>
               </div>
               
           </div>
        </div>
        <!-- your travel -->
<?php 
  $field_instagram_text = field_extract_value('node', translation_node_get(2), 'field_instagram_text');
  $field_instagram_button_text = field_extract_value('node', translation_node_get(2), 'field_instagram_button_text');
  $field_instagram_button_link = field_extract_value('node', translation_node_get(2), 'field_instagram_button_link');
?>
        
        <!-- instagram  -->
           <div class="social_container text-center blog_instagram_wrapper">
                  <div class="row exe_1_bg1 margin_none">
                  
                    <!-- col2 start -->
                     <div class="col-lg-2 col-md-3 col-sm-6 padding_none">
                       <div class="instagram">
                           <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/instagram.png" alt="" />
                           <h5><?php echo $field_instagram_text; ?>
                                <span>@masayahostels</span>
                                <span>#masayahostel</span> 
                           </h5>
                           <a href="<?php echo $field_instagram_button_link; ?>" class="btn btn-default btn-yellow span-top20"><?php echo $field_instagram_button_text; ?></a>
                       </div>
                     </div>
                     <!-- col2 end -->

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
                     <!-- col8 start -->
                     <div class="col-lg-10 col-md-9 col-sm-6 padding_none">
                       <div class="socail_images">
                           <div class="row margin_none">
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
                     <!-- col8 end -->
                     
                  </div>
               </div> 
        <!-- instagram  -->
<?php 
  $field_second_4_col_heading = field_extract_value('node', translation_node_get(2), 'field_second_4_col_heading'); 
  $field_second_4_col_sub_heading = field_extract_value('node', translation_node_get(2), 'field_second_4_col_sub_heading'); 
?>
        <!-- Blog activities -->
        <div class="blog_activity_wrapper">
                 <h2 class="text-center"><?php echo $field_second_4_col_heading; ?></h2>
                 <h4 class="text-center"><?php echo $field_second_4_col_sub_heading; ?></h4>
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
    $node = node_load($value);

    $field_short_description = field_extract_value('node', $node, 'field_short_description');
    $field_personne_pour_1h = field_extract_value('node', $node, 'field_personne_pour_1h');

    $img1 = file_create_url($node->field_image['und'][0]['uri']);
    
    $field_action_on_button_click = field_extract_value('node', $node, 'field_action_on_button_click');
    $field_link_to_button = field_extract_value('node', $node, 'field_link_to_button');
    $field_button_title = field_extract_value('node', $node, 'field_button_title');
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

$node = translation_node_get(2);
?>
                     </div>
           </div>
        </div>
        <!-- Blog activities -->
        
        <!-- masaya hostel -->
        <div class="blog_masaya-hostel space-bottom-50">
            <div class="row margin_none">
                 <div class="col-md-6  col-sm-6 padding_none">
                 <a href="<?php echo $field_bottom_image_link_1; ?>">
                   <div class="blog_listing_main">
                    <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($node->field_hostel_image_1['und'][0]['uri']); ?>" alt="<?php echo $node->field_hostel_image_1['und'][0]['alt']; ?>" title="<?php echo $node->field_hostel_image_1['und'][0]['title']; ?>" />
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
                  <a href="<?php echo $field_bottom_image_link_2; ?>">
                    <div class="blog_listing_main">
                        <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($node->field_hostel_image_2['und'][0]['uri']); ?>" alt="<?php echo $node->field_hostel_image_2['und'][0]['alt']; ?>" title="<?php echo $node->field_hostel_image_2['und'][0]['title']; ?>" />
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
        <!-- masaya hostel -->
        
    </div>
</div>
<!-- Blog tips & travel -->




<!-- contact cities -->
<div class="contant_cities_top text-center" id="tab-bottom-container">
<div class="panel-container">
  <div id="bottom-tab1" class="text-left">
       <!-- #foo1 Bogota section start -->
<?php 
          $url = 'http://localhost/masaya/public/index.php/api/get_footer_data/'.$language->language; //"http://www.masaya-experience.com/api/get_footer_data/".$language->language;
          $a = file_get_contents($url);
          $objectJ = json_decode($a, true);

?>
        <div class="foo1_content">
             <!-- footer head -->
            <div class="footer_head">
               <div class="container-fluid">
                   
                   <div class="row">
                       <div class="col-md-1 col-sm-1 col-xs-2">
                           <a class="footer_logo" href="#"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/footer_logo.png" alt="" /></a>
                       </div>
                       <div class="col-md-4 col-sm-4 col-xs-9">
                           <div class="footer_slide_titlwe">Masaya Bogota</div>

<div class="only_mobile_show">
  <div class="dropdown language_flag">
  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <a href="#"></a>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel">
      <li><a id="resize_map1" href="#bottom-tab1">Bogota</a></li>
      <li><a id="resize_map1" href="#bottom-tab2">Santa Marta</a></li>
  </ul>
</div>
</div>

                       </div>
                       <div class="col-md-3 col-sm-3 hidden_mobile">
                           <h3> <?php echo $objectJ['hostel']['0']['address'];?></h3>
                       </div>
                       <div class="col-md-3 col-sm-3 hidden_mobile">

                           <h3>Tel : <?php echo $objectJ['hostel']['0']['contact_number1'].'   '.$objectJ['hostel']['0']['contact_number2'];?> <br>
                               E-mail : <?php echo $objectJ['hostel']['0']['email'];?>
                           </h3>
                       </div>
                       <div class="col-md-1 col-sm-1 col-xs-1 text-center">
                           <a class="fo_close" href="javascript:void(0)"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/footer_close.png" alt="" /></a>
                       </div>
                   </div>
                   
               </div>
            </div>
            <!-- footer head -->
            
            <!-- footer map detail -->
            <div class="footer_mapcontent_wrapper">
                  <div class="container">
                      <div class="foo_map_wrapper">
                          <div class="row">
                             <div class="col-md-7 col-sm-7">
                               <div id="map_canvas" class="imgfull-width rev_map foo_google-map" style="width: 670px; height: 270px; position: relative; background-color: rgb(229, 227, 223); overflow: hidden;">
                                  </div>
                             </div>
                             <div class="col-md-5 col-sm-5">
                                  <div class="foo_map_content">
                                     <p><?php echo $objectJ['b_contact_info']['0']['description'];?></p>
                                  </div>
                             </div>
                          </div>
                      </div>
                      
                      <!-- Foo list left -->
                      <div class="foo-listing_wrapper">
                          <div class="row">
                               <div class="col-md-4  col-sm-5">
                                   <div class="foo_left_side">
                                        <h3 class="foo_list_title"><?php echo t('Walking time'); echo '<br>'; echo t('different points of interest'); ?> </h3>
                                        <ul class="detail_listing2">
                                          <?php foreach ($objectJ['touristic'] as $tourist) { ?>
                                            <li>
                                                <p><?php echo $tourist['description']; ?></p>
                                                <div class="list_month-detail text-center"><?php echo $tourist['time_on_point'].'mn'; ?></div>
                                            </li>
                                          <?php } ?>
                                       </ul>
                                   </div>
                               </div>
                               
                               
                               <div class="col-md-8 col-sm-7">
                                   <div class="foo_right_side">
                                       <h3 class="foo_list_title">&nbsp;<br><?php echo t('How'); echo '<br>'; echo t('to get there ?'); ?> </h3>  
                                       
                                       <div class="foo_address">
                                          <div class="row">
                                          <?php foreach ($objectJ['comments'] as $comment) { ?>
                                              <div class="col-md-6">
                                                  <strong><?php echo $comment['title']; ?></strong>
                                                  <p><?php echo $comment['description']; ?></p>
                                                  
                                              </div>
                                             <?php } ?>
                                          </div>
                                       </div>
                                       
                                       <div class="foo_tips">
                                           <div class="row">
                                               <div class="col-md-3">
                                                   <img class="mobile_tip" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/foo_tips.png" alt="" />
                                                   <h3><?php echo t('Travel Tips'); ?></h3>
                                               </div>
                                               <?php foreach ($objectJ['travel_tip'] as $traveltips) { ?>
                                               <div class="col-md-9">
                                                   <h4><?php echo $traveltips['title']; ?></h4>
                                                   <p><?php echo $traveltips['description']; ?></p>
                                                 
                                               </div>
                                               <?php } ?>
                                           </div>
                                       </div>
                                       
                                   </div>
                               </div>
                               
                               
                          </div>
                      </div>
                      <!-- Foo list left -->
                      
                  </div>
            </div>
            <!-- footer map detail -->
        </div>
     <!-- #foo1 Bogota section end -->
  </div>
  <div id="bottom-tab2" class="text-left">
       <!-- #foo2 Santa Marta section start -->
<?php 
          $url = 'http://localhost/masaya/public/index.php/api/get_footer_data/'.$language->language; //"http://www.masaya-experience.com/api/get_footer_data/".$language->language;
          // $url = "http://www.masaya-experience.com/api/get_footer_data/".$language->language;
          $ab = file_get_contents($url);
          $objectk = json_decode($ab, true);
          //echo "<pre>"; print_r($objectk); 

?>
        <div class="foo2_content">
             <!-- footer head -->
            <div class="footer_head">
               <div class="container-fluid">
                   
                   <div class="row">
                       <div class="col-md-1 col-sm-1 col-xs-2">
                           <a class="footer_logo" href="#"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/footer_logo.png" alt="" /></a>
                       </div>
                       <div class="col-md-4 col-sm-4 col-xs-9">
                           <div class="footer_slide_titlwe">Masaya Santa Marta</div>

<div class="only_mobile_show">
  <div class="dropdown language_flag">
  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <a href="#"></a>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel">
      <li><a id="resize_map1" href="#bottom-tab1">Bogota</a></li>
      <li><a id="resize_map1" href="#bottom-tab2">Santa Marta</a></li>
  </ul>
</div>
</div>
                           
                       </div>
                       <div class="col-md-3 col-sm-3 hidden_mobile">

                           <h3><?php echo $objectk['hostel1']['0']['address'];?></h3>
                       </div>
                       <div class="col-md-3 col-sm-3 hidden_mobile">
                           <h3>Tel : <?php echo $objectk['hostel1']['0']['contact_number1'].'   '.$objectk['hostel1']['0']['contact_number2'];?> <br>
                               E-mail : <?php echo $objectk['hostel1']['0']['email'];?>
                           </h3>
                       </div>
                       <div class="col-md-1 col-sm-1 col-xs-1 text-center">
                           <a class="fo_close" href="javascript:void(0)"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/footer_close.png" alt="" /></a>
                       </div>
                   </div>
                   
               </div>
            </div>
            <!-- footer head -->
            
            <!-- footer map detail -->
            <div class="footer_mapcontent_wrapper">
                  <div class="container">
                      <div class="foo_map_wrapper">
                          <div class="row">
                             <div class="col-md-7 col-sm-7">
                                  <div id="map_canvas_2" class="imgfull-width rev_map foo_google-map" style="width: 670px; height: 270px; position: relative; background-color: rgb(229, 227, 223); overflow: hidden;">
                                  </div>
                             </div>
                             <div class="col-md-5 col-sm-5">
                                  <div class="foo_map_content">
                                     <p><?php echo $objectk['sm_contact_info']['0']['description'];?></p>
                                  </div>
                             </div>
                          </div>
                      </div>
                      
                      <!-- Foo list left -->
                      <div class="foo-listing_wrapper">
                          <div class="row">
                               <div class="col-md-4  col-sm-5">
                                   <div class="foo_left_side">
                                      <h3 class="foo_list_title"><?php echo t('Walking time '); ?><br><?php echo t('different points of interest'); ?></h3>
                                        <ul class="detail_listing2">
                                           
                                            <?php foreach ($objectk['touristic1'] as $tourist) { ?>
                                            <li>
                                                <p><?php echo $tourist['description']; ?></p>
                                                <div class="list_month-detail text-center"><?php echo $tourist['time_on_point'].'mn'; ?></div>
                                            </li>
                                          <?php } ?>
                                       </ul>
                                   </div>
                               </div>
                               
                               
                               <div class="col-md-8 col-sm-7">
                                   <div class="foo_right_side">
                                       <h3 class="foo_list_title">&nbsp;<br><?php echo t('How'); ?><br><?php echo t('to get there ?'); ?></h3>  
                                       
                                       <div class="foo_address">
                                          <div class="row">
                                             <?php foreach ($objectJ['comments1'] as $comment) { ?>
                                              <div class="col-md-6">
                                                  <strong><?php echo $comment['title']; ?></strong>
                                                  <p><?php echo $comment['description']; ?></p>
                                                  
                                              </div>
                                             <?php } ?>
                                          </div>
                                       </div>
                                       
                                       <div class="foo_tips">
                                           <div class="row">
                                               <div class="col-md-3">
                                                   <img class="mobile_tip" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/foo_tips.png" alt="" />
                                                   <h3><?php echo t('TRAVEL Tips'); ?></h3>
                                               </div>
                                             
                                                   <?php foreach ($objectJ['travel_tip1'] as $traveltips) { ?>
                                               <div class="col-md-9">
                                                   <h4><?php echo $traveltips['title']; ?></h4>
                                                   <p><?php echo $traveltips['description']; ?></p>
                                                 
                                               </div>
                                               <?php } ?>
                                            
                                           </div>
                                       </div>
                                       
                                   </div>
                               </div>
                               
                               
                          </div>
                      </div>
                      <!-- Foo list left -->
                      
                  </div>
            </div>
            <!-- footer map detail -->
        </div>
       <!-- #foo2 Santa Marta section end -->
  </div>
  <div id="bottom-tab3" class="text-left">
       <!-- #foo3 contact us section -->
        <div class="foo3_contacts">
        <!-- footer head -->
        <div class="footer_head">
        <div class="container-fluid">
           
           <div class="row">
               <div class="col-md-1 col-sm-1 col-xs-2">
                   <a class="footer_logo" href="#"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/footer_logo.png" alt="" /></a>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-9">
                   <div class="footer_slide_titlwe"><?php echo t('Contact Us!'); ?></div>
               </div>
               <div class="col-md-3 col-sm-3 hidden_mobile">
                   <h3>&nbsp;</h3>
               </div>
               <div class="col-md-3 col-sm-3 hidden_mobile">
                   <h3>&nbsp;</h3>
               </div>
               <div class="col-md-1 col-sm-1 col-xs-1 text-center">
                   <a class="fo_close" href="javascript:void(0)"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/footer_close.png" alt="" /></a>
               </div>
           </div>
           
        </div>
        </div>
        <!-- footer head -->
        <!-- footer map detail -->
        <div class="foo_form_wrapper">
        <div class="container">
          <div class="row">
           <div class="col-md-5 col-sm-5">
               <div class="foo_form_left">
                   <p><em><?php echo t('Questions? , A problem when reserving? Comments? '); ?> <br/>
<?php echo t('Contact us via the form below. We will try to answer all your questions as soon as possible! Please indicate your hostel for a quicker answer.'); ?> </em> </p>
                    <form method="POST" action="" accept-charset="UTF-8" onsubmit="return submitContact()">
                         <div class="form-group frm-max-wdh">
                              <input type="text" class="validate[required] form-control first-input" placeholder="<?php echo t('Your last name'); ?>" name="lastname" id="con-lastname" required="required"/>
                         </div>

                         <div class="form-group frm-max-wdh">
                              <input type="text" class="validate[required] form-control" placeholder="<?php echo t('Your first name'); ?>" name="firstname" id="con-firstname" required="required"/>
                         </div>

                         <div class="form-group frm-max-wdh">
                              <input type="email" id="email" class="validate[required,custom[email]] form-control" placeholder="<?php echo t('Email address'); ?>" name="email" id="con-email" required="required" />
                         </div>

                         <div class="form-group frm-max-wdh footer-vp_custom">
                              <div class="select_1">
                                   <select class="custom-select" id="con-hostel_name" name="hostel_name">
                                        <option value="1"><?php echo t('Masaya Hostel Bogota'); ?></option>
                                        <option value="2"><?php echo t('Masaya Hostel Santa Marta'); ?></option>
                                        <option value="Masaya Hostels"><?php echo t('Masaya Hostels'); ?></option>
                                   </select>
                                   <div style="color:red">  </div>
                              </div>
                         </div>
                         
                         <div class="form-group footer-vp_custom">
                              <div class="select_1">
                                   <select class="custom-select" id="con-object" name="object" required>
                                        <option value=""><?php echo t('Subject of your message'); ?></option>
                                        <option value="<?php echo t('Confirm or change my booking'); ?>"> <?php echo t('Confirm or change my booking'); ?></option>
                                        <option value="<?php echo t('A problem during my reservation'); ?>"> <?php echo t('A problem during my reservation'); ?></option>
                                        <option value="<?php echo t('My stay in the hostel'); ?>"> <?php echo t('My stay in the hostel'); ?></option>
                                        <option value="<?php echo t('I’ve got a question, a comment...'); ?>"> <?php echo t('I’ve got a question, a comment...'); ?></option>
                                        <option value="<?php echo t('I am a artist, I want to perform in Masaya'); ?>"> <?php echo t('I am a artist, I want to perform in Masaya'); ?></option>
                                   </select>
                              </div>
                         </div>

                         <div class="form-group">
                              <textarea id="con-textarea" class="validate[required] textarea" placeholder="<?php echo t('Your message, comment(s) or question(s) here... We recommend  that you provide us with as many details as possible in order to process your request as fast and efficiently as we can.'); ?> 
<?php echo t('Warning : we don\'t accept bookings through emails. Please use the booking buttons on the site.'); ?>" ></textarea>
                         </div>

                         <div class="form-group"><input type="submit" value="<?php echo t('Send your request'); ?>" class="btn btn-default"></div>     
                    </form>
                    
               </div>
           </div>
           
           
           <div class="col-md-7 col-sm-7">
        
                <div class="footer_addinner_wrapper">
                    <div class="footer_row">
                        <div class="col-md-5 col-sm-5 padding_none">
                             <img class="imgfull-width" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/foo_add_img.png" alt="" />
                        </div>
                        <div class="col-md-7 col-sm-7">
                             <h2>Santa Marta</h2>
                             <p><?php echo t('Calle'); ?> 14 # 04-80 Centro historico, <br> Santa Marta, Colombia</p>
                             <p>Tel : +57 (5) 423 1770   +57 311 533 8348 <br> E-mail : santamarta@masaya-experience.com</p>
                        </div>
                    </div>
                    
                    <div class="footer_row">
                        <div class="col-md-5 col-sm-5 padding_none">
                             <img class="imgfull-width" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/foo_add_img_2.png" alt="" />
                        </div>
                        <div class="col-md-7 col-sm-7">
                             <h2>Bogota</h2>
                             <p><?php echo t('Carrera'); ?> 2 # 12-48, <br> Candelaria, Bogotá, Colombia</p>
                             <p>Tel : +57 (5) 423 1770   +57 311 533 8348 <br> E-mail : bogota@masaya-experience.com</p>
                        </div>
                    </div>
                    
                    
                </div>
           </div>
           
           
        </div>
        </div>
        </div>
        <!-- footer map detail -->
        </div>
       <!-- #foo3 contact us section -->
  </div>
</div>

<ul class="contant_cities_foo">
  <li id="the-first-tab" class="hidden_mobile">
     <a id="resize_map1" href="#bottom-tab1">      
      <div class="socail12">
         <img class="rev_hide" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/location.png" alt="" />
         <img class="rev_show" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/location_active.png" alt="" />
         <h2>Bogota</h2>
       </div>
     </a>      
  </li>
  <li class="padding_none ">
      <a id="resize_map2" href="#bottom-tab2">  
        <div class="socail12">
          <img class="rev_hide" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/location.png" alt="" />
          <img class="rev_show" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/location_active.png" alt="" />
          <h2 class="hidden_mobile">Santa Marta</h2>
        </div>
      </a>
  </li>
  <li class="padding_none">
     <a href="#bottom-tab3">
       <div class="socail12">
          <img class="rev_hide" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/contacts.png" alt="" />
          <img class="rev_show" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/contacts_active.png" alt="" />
          <h2 class="hidden_mobile"><?php echo t('Contact Us!'); ?></h2>
        </div>
     </a>
  </li>
</ul>
</div>
<!-- contact cities -->

<!-- Footer start here -->
<footer>
    <div class="container">
      <?  $url = "http://localhost/masaya/public/index.php/api/get_footer_data/".$language->language;
          $abc = file_get_contents($url);
          $objectf = json_decode($abc, true);
          //echo "<pre>"; print_r($objectf.'</pre>'); 
      ?> 
        <div class="row"><div class="col-md-12"><h4><?php echo t('Follow us on social networks'); ?></h4></div></div>
        <div class="row">
        <div class="col-md-12 footer_social_icon">
            <!-- <li><a class="socail_icons" href="#"><img src="sites/all/themes/Masaya/images/facebook_footer.png" alt="" /> <p class="hidden_mobile">Aimez-nous</p></a></li>
             <li><?php //echo $objectf['youtubecode']['0']['script']; ?><br></li>
             <li><?php //echo $objectf['twittercode']['0']['script']; ?><br></li>
             <li><?php //echo $objectf['instagramcode']['0']['script']; ?></li> -->


          <span class="socail_icons">
            <div id="facebook_like_button_holder">
              <iframe src="http://www.facebook.com/plugins/like.php?href=https://www.facebook.com/masaya.hostels&layout=button_count&show_faces=true&width=600&action=recommend&colorscheme=light&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:600px; height:21px;" allowTransparency="true"></iframe>
              <div id="fake_facebook_button"></div>
            </div>
            <a href="javascript:void(0);" id="facebookimage">
              <img src="http://www.masaya-experience.com/uploads/../assets/front/images/facebook_footer.png" alt="Facebook Like" /> 
              <p class="hidden_mobile"><?php echo t('Like Us'); ?></p>
            </a>
          </span>

          <span class="socail_icons">
            <script src="https://apis.google.com/js/platform.js"></script>
            <div class="youtubemyclass">
              <div class="g-ytsubscribe" data-channelid="UCp_yEa-tAk3iBz1WR4E9iPw" data-layout="default" data-count="hidden">
              </div>
            </div>
            <a href="javascript:void(0);">
              <img src="http://www.masaya-experience.com/uploads/../assets/front/images/you_tube_footer.png" alt="Youtube" />
              <p class="hidden_mobile"><?php echo t('Discover'); ?></p>
            </a>
          </span>

          <span class="socail_icons">
            <a class="twitter-follow-button" href="https://twitter.com/MasayaColombia" data-show-count="false" data-size="large">
              <?php echo t('Follow @twitter'); ?>
            </a>
            <script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.async=true;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>
            <a href="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fwww.masaya-experience.com%2F&region=follow_link&screen_name=MasayaColombia&tw_p=followbutton">
              <img src="http://www.masaya-experience.com/uploads/../assets/front/images/twitter_footer.png" alt="Twitter" />
              <p class="hidden_mobile"><?php echo t('Follow Us'); ?></p>
            </a>
          </span>

          <span class="socail_icons">
            <span class="ig-follow" data-id="c73b6fd301" data-handle="masayahostels" data-count="false" data-size="large" data-username="true">
            </span>
            <script>(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src="//x.instagramfollowbutton.com/follow.js";s.parentNode.insertBefore(g,s);}(document,"script"));</script>
            <a href="javascript:void(0);">
              <img src="http://www.masaya-experience.com/uploads/../assets/front/images/instagram_footer.png" alt="Instagram" />
              <p class="hidden_mobile"><?php echo t('Share'); ?></p>
            </a>
          </span>

        </div>
        </div>
        <div class="row">
            <div class="col-md-12 footer_services">
               <ul>
                 <h4><?php echo $objectf['footerlinkone']['0']['title'];?></h4>
                 <li><a href="<?php echo $objectf['footerlinkone']['0']['link_url1'];?>"><?php echo $objectf['footerlinkone']['0']['link1'];?></a></li>
                 <li><a href="<?php echo $objectf['footerlinkone']['0']['link_url2'];?>"><?php echo $objectf['footerlinkone']['0']['link2'];?></a></li>
                 <li><a href="<?php echo $objectf['footerlinkone']['0']['link_url3'];?>"><?php echo $objectf['footerlinkone']['0']['link3'];?></a></li>
                 <li><a href="<?php echo $objectf['footerlinkone']['0']['link_url4'];?>"><?php echo $objectf['footerlinkone']['0']['link4'];?></a></li>
                 <li><a href="<?php echo $objectf['footerlinkone']['0']['link_url5'];?>"><?php echo $objectf['footerlinkone']['0']['link5'];?></a></li>
                   
               </ul>
               <ul>
                <h4><?php echo $objectf['footerlinktwo']['0']['title'];?></h4>
                 <li><a href="<?php echo $objectf['footerlinktwo']['0']['link_url1'];?>"><?php echo $objectf['footerlinktwo']['0']['link1'];?></a></li>
                 <li><a href="<?php echo $objectf['footerlinktwo']['0']['link_url2'];?>"><?php echo $objectf['footerlinktwo']['0']['link2'];?></a></li>
                 <li><a href="<?php echo $objectf['footerlinktwo']['0']['link_url3'];?>"><?php echo $objectf['footerlinktwo']['0']['link3'];?></a></li>
                 <li><a href="<?php echo $objectf['footerlinktwo']['0']['link_url4'];?>"><?php echo $objectf['footerlinktwo']['0']['link4'];?></a></li>
                 <li><a href="<?php echo $objectf['footerlinktwo']['0']['link_url5'];?>"><?php echo $objectf['footerlinktwo']['0']['link5'];?></a></li>
      
               </ul>
               <ul class="last_ul">
                <h4><?php echo $objectf['footerlinkthree']['0']['title'];?></h4>
                 <li><a href="<?php echo $objectf['footerlinkthree']['0']['link_url1'];?>"><?php echo $objectf['footerlinkthree']['0']['link1'];?></a></li>
                 <li><a href="<?php echo $objectf['footerlinkthree']['0']['link_url2'];?>"><?php echo $objectf['footerlinkthree']['0']['link2'];?></a></li>
                 
               </ul>
               
               <div class="certification pull-right">
                   <img width="152px" height="142px" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/masaya-hostels-tripadvisor.png" alt="" />
                   <img width="152px" height="142px" src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/footer_img2.png" alt="" />
               </div>
               
            </div>
        </div>
<?php
  $field_footer_copyright_text = field_extract_value('node', translation_node_get(2), 'field_footer_copyright_text');
  $field_footer_text_2 = field_extract_value('node', translation_node_get(2), 'field_footer_text_2');
  $field_footer_text_3 = field_extract_value('node', translation_node_get(2), 'field_footer_text_3');
  $field_footer_link_2 = field_extract_value('node', translation_node_get(2), 'field_footer_link_2');
  $field_footer_link_3 = field_extract_value('node', translation_node_get(2), 'field_footer_link_3');
?>
        <div class="copy_rightcon text-center">
          <p>&copy; <?php echo $field_footer_copyright_text; ?></p>
          <p><a href="<?php echo $field_footer_link_2;?>"><?php echo $field_footer_text_2; ?></a></p>
            <p><a href="<?php echo $field_footer_link_3;?>"><?php echo $field_footer_text_3; ?></a></p>
        </div>
        
    </div>
</footer>
</main>
<!-- Footer ends here -->