<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
**/
?>
<?php 
  global $base_url; 
  $current_node = translation_node_get(33);
?>
<style type="text/css">
.content > .col-lg-12.padding_none > .col-lg-6.col-sm-6.padding_none.img img {
    height: 482px;
    width: 100%;
}
.content > .col-lg-12.padding_none > .col-lg-3.col-sm-3.col-xs-6.padding_none.img img {
    height: 241px;
    width: 100%;
}
.col-lg-12 > .col-lg-6.col-sm-6.padding_none > .col-lg-6.col-sm-6.col-xs-6.padding_none.img img {
    height: 241px;
    width: 100%;
}
</style>
<!-- start Gallery -->
<div class="Album_photo_back">
  <div class="container">
    <div class="col-lg-7 col-sm-7 Album_photo">
      <h2><?php echo $current_node->title; ?></h2>
      <p><?php echo $current_node->field_description['und'][0]['safe_value']; ?></p>
    </div>
    <div class="col-lg-5 col-sm-5 album_instagram">
      <img src="<?php echo $base_url.'/'.path_to_theme(); ?>/images/instagram.png">
      <p><?php echo $current_node->field_instagram_text['und'][0]['safe_value']; ?></p>
      <span>@masayahostels</span>&nbsp;&nbsp;&nbsp;<i>/</i>&nbsp;&nbsp;&nbsp;<span>#masayahostel</span>
      <br/>
      <br/>
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

<div data-next-url="<?php echo $arrayI['pagination']['next_url']; ?>" class="col-lg-12 padding_none instgram-data-holder">
  <div class="col-lg-6 col-sm-6 padding_none img">
    <a href="<?php echo $arrayI['data'][0]['link']; ?>"><img src="<?php echo $arrayI['data'][0]['images']['standard_resolution']['url']; ?>"></a>
  </div>
  <div class="col-lg-6 col-sm-6 padding_none">
    <div class="col-lg-6 col-sm-6 col-xs-6 padding_none img">
      <a href="<?php echo $arrayI['data'][1]['link']; ?>"><img src="<?php echo $arrayI['data'][1]['images']['low_resolution']['url']; ?>"></a>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6 padding_none img">
      <a href="<?php echo $arrayI['data'][2]['link']; ?>"><img src="<?php echo $arrayI['data'][2]['images']['low_resolution']['url']; ?>"></a>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6 padding_none img">
      <a href="<?php echo $arrayI['data'][3]['link']; ?>"><img src="<?php echo $arrayI['data'][3]['images']['low_resolution']['url']; ?>"></a>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6 padding_none img">
      <a href="<?php echo $arrayI['data'][4]['link']; ?>"><img src="<?php echo $arrayI['data'][4]['images']['low_resolution']['url']; ?>"></a>
    </div>
  </div>
</div>

<div class="col-lg-12 padding_none">
  <div class="col-lg-3 col-sm-3 col-xs-6 padding_none img">
    <a href="<?php echo $arrayI['data'][5]['link']; ?>"><img src="<?php echo $arrayI['data'][5]['images']['low_resolution']['url']; ?>"></a>
  </div>
  <div class="col-lg-3 col-sm-3 col-xs-6 padding_none img">
    <a href="<?php echo $arrayI['data'][6]['link']; ?>"><img src="<?php echo $arrayI['data'][6]['images']['low_resolution']['url']; ?>"></a>
  </div>
  <div class="col-lg-3 col-sm-3 col-xs-6 padding_none img">
    <a href="<?php echo $arrayI['data'][7]['link']; ?>"><img src="<?php echo $arrayI['data'][7]['images']['low_resolution']['url']; ?>"></a>
  </div>
  <div class="col-lg-3 col-sm-3 col-xs-6 padding_none img">
    <a href="<?php echo $arrayI['data'][8]['link']; ?>"><img src="<?php echo $arrayI['data'][8]['images']['low_resolution']['url']; ?>"></a>
  </div>
</div>

<div class="col-lg-12 padding_none">
  <div class="col-lg-6 col-sm-6 padding_none">
    <div class="col-lg-6 col-sm-6 col-xs-6 padding_none img">
      <a href="<?php echo $arrayI['data'][9]['link']; ?>"><img src="<?php echo $arrayI['data'][9]['images']['low_resolution']['url']; ?>"></a>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6 padding_none img">
      <a href="<?php echo $arrayI['data'][10]['link']; ?>"><img src="<?php echo $arrayI['data'][10]['images']['low_resolution']['url']; ?>"></a>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6 padding_none img">
      <a href="<?php echo $arrayI['data'][11]['link']; ?>"><img src="<?php echo $arrayI['data'][11]['images']['low_resolution']['url']; ?>"></a>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6 padding_none img">
      <a href="<?php echo $arrayI['data'][12]['link']; ?>"><img src="<?php echo $arrayI['data'][12]['images']['low_resolution']['url']; ?>"></a>
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 padding_none img">
    <a href="<?php echo $arrayI['data'][13]['link']; ?>"><img src="<?php echo $arrayI['data'][13]['images']['standard_resolution']['url']; ?>"></a>
  </div>
</div>



<!-- end Gallery -->