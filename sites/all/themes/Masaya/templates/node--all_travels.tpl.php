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
      <h2><?php echo $current_node->title; ?></h2>
      <?php echo $current_node->body['und'][0]['safe_value']; ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 book_image">
      <img src="<?php echo file_create_url($current_node->field_yellow_bg_heading['und'][0]['uri']); ?>" alt="<?php echo $current_node->field_yellow_bg_heading['und'][0]['alt']; ?>" title="<?php echo $current_node->field_yellow_bg_heading['und'][0]['title']; ?>" />
    </div>
  </div>
</div>

<div class="fixed_social_icons main_h">
 <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Part-icon.png"><br/><span><?php echo t('Share'); ?> </span>
 <a href="http://twitter.com/intent/tweet?text=<?php echo substr(drupal_get_title() .'+'.strip_tags($current_node->body['und'][0]['value']), 0, 96).'...'.'&url='.$base_url.'/'.$language->language. current_path(); ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Tw-icon.jpg"></a>
 <a href="http://facebook.com/sharer.php?u=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q']; ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-fb-icon.jpg"></a>
 <a href="https://plus.google.com/share?url=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q']; ?>" target="_blank"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-G+-icon.jpg"></a>
 <a href="<?php echo 'javascript:void((function()%7Bvar%20e=document.createElement(\'script\');e.setAttribute(\'type\',\'text/javascript\');e.setAttribute(\'charset\',\'UTF-8\');e.setAttribute(\'src\',\'http://assets.pinterest.com/js/pinmarklet.js?r=\'+Math.random()*99999999);document.body.appendChild(e)%7D)());'; ?>"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/Pinterest-Logo.png"></a>
 <a href="mailto:?url=<?php echo $base_url.'/'.$language->language.'/'.$_GET['q'].' &subject=I wanted you to see this site&amp;body=Check out this site .'.$base_url.'/'.$_GET['q']; ?>" title="Share by Email"><img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/fixed-Msg-icon.jpg"></a>
</div>

<?php $bg = 'background-image:url(\''.file_create_url($current_node->field_background_image['und'][0]['uri']).'\')'; ?>
<div class="Items_background_image" style="<?php echo $bg; ?>">
  <!-- your travel -->
<?php 

$query = new EntityFieldQuery();

$query->entityCondition('entity_type', 'node')
  ->entityCondition('bundle', 'vos_voyages')
  ->propertyCondition('status', NODE_PUBLISHED)
  ->propertyCondition('language', $language->language);
// ->range(0, 4);

$result = $query->execute();
$i = 0;
if (isset($result['node'])) {
  $new_items_nids = array_keys($result['node']);
  foreach ($new_items_nids as $key => $value) {
    $i++;
    $the_node = node_load($value); 
    if($i == 1)  echo '<div class="margin_auto text-center container"><div class="row margin_none">';
?>

      <div class="col-md-4 col-sm-4 blog_list_space background <?php if($i == 2) echo 'space-15'; ?>">
        <div class="travel_listing-inner">
          <h6><?php echo $the_node->title; ?></h6>
          <img class="imgfull-width" src="<?php echo file_create_url($the_node->field_large_voyage_image['und'][0]['uri']); ?>" alt="<?php echo $the_node->field_large_voyage_image['und'][0]['alt']; ?>" title="<?php echo $the_node->field_large_voyage_image['und'][0]['title']; ?>" />
          <div class="row">
            <div class="col-md-5 col-sm-4 col-xs-4">
              <div class="travel_container1">
                <img class="img-circle" src="<?php echo file_create_url($the_node->field_author_photo['und'][0]['uri']); ?>" alt="<?php echo $the_node->field_author_photo['und'][0]['alt']; ?>" title="<?php echo $the_node->field_author_photo['und'][0]['title']; ?>" />
              </div>
            </div>
            <div class="col-md-7 col-sm-8 col-xs-8">
              <div class="blog-tips_content">
                <p><?php echo t(variable_get('voyage_de_label')); ?> : <strong><?php echo $the_node->field_voyage_de['und'][0]['value']; ?></strong></p>
                <p><?php echo t(variable_get('period_label')); ?> : <strong><?php echo $the_node->field_period['und'][0]['value']; ?></strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
    if ($i == 3) {
      $i = 0;
      echo '</div></div>';
    }
  }
}
?>
</div>
<div class="Blog_hostel_instagram">
  <!-- Blog hostel instagram -->
  <div class="blog_hostel-ins">
    <div class="container">
      <div class="col-md-6 col-sm-6 padding_none">
        <div class="blog_listing_main">
          <img class="imgfull-width blog_list_img" src="<?php echo file_create_url($current_node->field_image_quad_1['und'][0]['uri']); ?>" alt="<?php echo $current_node->field_image_quad_1['und'][0]['alt']; ?>" title="<?php echo $current_node->field_image_quad_1['und'][0]['title']; ?>" />
          <div class="blog_list_overlay_con text-center">
            <div class="blog_list_inner">
              <h3 class="h1_seo_trip"><?php echo $current_node->field_white_large_text['und'][0]['value']; ?></h3>
              <h3 class="h2_seo_trip"><?php echo $current_node->field_black_small_text_1['und'][0]['value']; ?></h3>
            </div>
          </div>
        </div>
      </div>
<?php

  $Instagram_ID = "510627558";
  $Instagram_Token = "510627558.98ec466.00e08393fe294c9aa6e2470c7f735acb";

  $url = "https://api.instagram.com/v1/tags/masayahostel/media/recent?count=14&access_token=".$Instagram_Token;

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
  // echo "<pre>";
  // print_r($arrayI);
  // echo "</pre>";

?>
      <div class="col-md-6 col-sm-6 padding_none">
        <div class="row margin_none">
          <div class="col-md-12 text-center">
            <div class="instagram blogvp-instacon1">
              <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/instagram.png"/>
              <h5><?php echo $fp_node->field_instagram_text['und'][0]['safe_value']; ?>
                <span>@masayahostels</span>
                <span>#masayahostel</span> 
              </h5>
              <a href="<?php echo $fp_node->field_instagram_button_link['und'][0]['value']; ?>" class="btn btn-default btn-yellow span-top20"><?php echo $fp_node->field_instagram_button_text['und'][0]['value']; ?></a>
            </div>
          </div>
          <div class="col-md-12 padding_none instagram_bottom_img">
            <div class="row margin_none">
              <div class="col-md-3 col-sm-3 col-xs-6 padding_none">
                <a href="<?php echo $arrayI['data'][0]['link']; ?>">
                  <img class="imgfull-width" src="<?php echo $arrayI['data'][0]['images']['standard_resolution']['url']; ?>" />
                </a>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 padding_none">
                <a href="<?php echo $arrayI['data'][1]['link']; ?>">
                  <img class="imgfull-width" src="<?php echo $arrayI['data'][1]['images']['standard_resolution']['url']; ?>" />
                </a>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 padding_none">
                <a href="<?php echo $arrayI['data'][2]['link']; ?>">
                  <img class="imgfull-width" src="<?php echo $arrayI['data'][2]['images']['standard_resolution']['url']; ?>" />
                </a>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 padding_none">
                <a href="<?php echo $arrayI['data'][3]['link']; ?>">
                  <img class="imgfull-width" src="<?php echo $arrayI['data'][3]['images']['standard_resolution']['url']; ?>" />
                </a>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 padding_none">
                <a href="<?php echo $arrayI['data'][4]['link']; ?>">
                  <img class="imgfull-width" src="<?php echo $arrayI['data'][4]['images']['standard_resolution']['url']; ?>" />
                </a>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 padding_none">
                <a href="<?php echo $arrayI['data'][5]['link']; ?>">
                  <img class="imgfull-width" src="<?php echo $arrayI['data'][5]['images']['standard_resolution']['url']; ?>" />
                </a>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 padding_none">
                <a href="<?php echo $arrayI['data'][6]['link']; ?>">
                  <img class="imgfull-width" src="<?php echo $arrayI['data'][6]['images']['standard_resolution']['url']; ?>" />
                </a>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 padding_none">
                <a href="<?php echo $arrayI['data'][7]['link']; ?>">
                  <img class="imgfull-width" src="<?php echo $arrayI['data'][7]['images']['standard_resolution']['url']; ?>" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Blog hostel instagram -->
</div>