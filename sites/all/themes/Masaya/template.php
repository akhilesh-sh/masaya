<?php

/**
 * Add body classes if certain regions have content.
 */
function masaya_preprocess_html(&$variables) {
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }

  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_js(path_to_theme() . '/js/masaya.js', array('scope'=>'footer', 'type'=>'file')); 
  $viewport = array(
   '#tag' => 'meta',
   '#attributes' => array(
     'name' => 'viewport',
     'content' => 'width=device-width, initial-scale=1, maximum-scale=1',
   ),
  );
  drupal_add_html_head($viewport, 'viewport');

}

/**
 * Override or insert variables into the page template for HTML output.
 */
function masaya_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function masaya_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function masaya_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'masaya') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function masaya_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function masaya_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
  if ($variables['node']->type == 'city_guide_articles') {
    $device_type = getDevice();
    if(($device_type != 'mobile')) {
      /*drupal_add_js('(function ($) {
        $(document).ready(function () {
          var h = $(document).height() - $(window).height() - $(\'footer\').height() - $(\'ul.contant_cities_foo\').height() - 200;
          var flag = 1;
          $(window).scroll(function () {
            if (($(window).scrollTop() >= h) && (flag == 1)) {
              flag = 0;
              console.log(\'class added\');
              $(\'.col-lg-4.col-md-4.fight_section.main_h.sticky\').addClass(\'withFooter\');
            }
            else if(($(window).scrollTop() < h) && $(\'.col-lg-4.col-md-4.fight_section.main_h.sticky\').hasClass(\'withFooter\') && flag == 0) {
              $(\'.col-lg-4.col-md-4.fight_section.main_h.sticky\').removeClass(\'withFooter\');
              console.log(\'removed\');
              flag = 1;
            }
          });
        });
      }) (jQuery);', array('type'=>'inline'));*/
      drupal_add_js('(function ($) {
        $(document).ready(function () {
          var h = $(document).height() - $(window).height() - $(\'footer\').height() - $(\'ul.contant_cities_foo\').height() - 200;
          var flag = 1;
          
          var a = $(window).height() - $(\'header.main_h.main_head\').height() - $(\'.main_yellow_inner.main_h.blog_top-yellow\').height();
          $(\'.col-lg-4.col-md-4.fight_section.main_h\').css(\'height\', parseInt(a)+\'px\');
          var flag2 = true;
          $(window).scroll(function () {
            /*if (($(window).scrollTop() >= h) && (flag == 1)) {
              flag = 0;
              console.log(\'class added\');
              $(\'.col-lg-4.col-md-4.fight_section.main_h.sticky\').addClass(\'withFooter\');
            }
            else if(($(window).scrollTop() < h) && $(\'.col-lg-4.col-md-4.fight_section.main_h.sticky\').hasClass(\'withFooter\') && flag == 0) {
              $(\'.col-lg-4.col-md-4.fight_section.main_h.sticky\').removeClass(\'withFooter\');
              console.log(\'removed\');
              flag = 1;
            }*/
            if ($(window).scrollTop() < 120) {
              $(\'.col-lg-4.col-md-4.fight_section.main_h\').css(\'height\', (parseInt(a) + $(window).scrollTop())+\'px\');
              flag2 = true;
            } 
            else if(flag2) {
              $(\'.col-lg-4.col-md-4.fight_section.main_h\').css(\'height\', parseInt(a)+\'px\');
              flag2 = false;
            }
          });
        });
      }) (jQuery);', array('type'=>'inline'));
    }

  }
  if ($variables['node']->type == 'discover_columbia_article') {
    $device_type = getDevice();
    if(($device_type != 'mobile')) {
      drupal_add_js('(function ($) {
        $(document).ready(function () {
          var h = $(document).height() - $(window).height() - $(\'footer\').height() - $(\'ul.contant_cities_foo\').height() - 200;
          var flag = 1;
          
          var a = $(window).height() - $(\'header.main_h.main_head\').height() - $(\'.main_yellow_inner.main_h.blog_top-yellow\').height();
          $(\'.col-lg-4.col-md-4.fight_section.main_h\').css(\'height\', parseInt(a)+\'px\');
          var flag2 = true;
          $(window).scroll(function () {
            /*if (($(window).scrollTop() >= h) && (flag == 1)) {
              flag = 0;
              console.log(\'class added\');
              $(\'.col-lg-4.col-md-4.fight_section.main_h.sticky\').addClass(\'withFooter\');
            }
            else if(($(window).scrollTop() < h) && $(\'.col-lg-4.col-md-4.fight_section.main_h.sticky\').hasClass(\'withFooter\') && flag == 0) {
              $(\'.col-lg-4.col-md-4.fight_section.main_h.sticky\').removeClass(\'withFooter\');
              console.log(\'removed\');
              flag = 1;
            }*/
            if ($(window).scrollTop() < 120) {
              $(\'.col-lg-4.col-md-4.fight_section.main_h\').css(\'height\', (parseInt(a) + $(window).scrollTop())+\'px\');
              flag2 = true;
            } 
            else if(flag2) {
              $(\'.col-lg-4.col-md-4.fight_section.main_h\').css(\'height\', parseInt(a)+\'px\');
              flag2 = false;
            }
          });
        });
      }) (jQuery);', array('type'=>'inline'));
    }
    drupal_add_js('
jQuery(document).ready(function($){
  $($(\'form#comment-form\')).insertAfter(\'.comments #comments h2.title\');
  var cCount = $(\'.comments #comments > .comment\').length;
  if(cCount > 0) {
    $(\'.comments > #comments > h2.title\').prepend(cCount+\' \');
    $(\'.comments #comments form.comment-form\').last().remove();
  }
  $(\'#writeComment\').click(function(e){
    e.preventDefault();
    var displayProp = $(\'form#comment-form\').css(\'display\');
    if(displayProp == \'none\'){
      $(\'form#comment-form\').css(\'display\', \'block\');
    }
    else if(displayProp == \'block\') {
      $(\'form#comment-form\').css(\'display\', \'none\');
    }
  });
});', array('type'=>'inline'));
  }
  if ($variables['node']->type == 'vos_voyages') {
    drupal_add_js('
jQuery(document).ready(function($){
  $($(\'form#comment-form\')).insertAfter(\'.comments #comments h2.title\');
  var cCount = $(\'.comments #comments > .comment\').length;
  if(cCount > 0) {
    $(\'.comments > #comments > h2.title\').prepend(cCount+\' \');
    $(\'.comments #comments form.comment-form\').last().remove();
  }
  $(\'#writeComment\').click(function(e){
    e.preventDefault();
    var displayProp = $(\'form#comment-form\').css(\'display\');
    if(displayProp == \'none\'){
      $(\'form#comment-form\').css(\'display\', \'block\');
    }
    else if(displayProp == \'block\') {
      $(\'form#comment-form\').css(\'display\', \'none\');
    }
  });
});', array('type'=>'inline'));
  }
  if ($variables['node']->type == 'photo_album') {
    drupal_add_js('jQuery.extend(Drupal.settings, { "pathToTheme": "' . path_to_theme() . '" });', 'inline');
    drupal_add_js('(function ($) { $(document).ready(function(){
      var flag = 1;
      $(window).scroll(function () { 
         if (($(window).scrollTop() >= $(document).height() - $(window).height() - $(\'footer\').height() - 200) && (flag == 1)) {
           flag = 0;
           $(\'.col-lg-12.padding_none\').last().after(\'<div class="waiting" style="background: url(\'+Drupal.settings.basePath + Drupal.settings.pathToTheme + \'/images/waiting.gif); background-size: 545px 90px; height: 90px; width: 100%; background-position: 50% 50%; background-repeat: no-repeat; float:left;"></div>\') ;
           var url_val = $(\'.instgram-data-holder\').last().attr(\'data-next-url\');
           $.ajax({
              data: ({ \'page\': url_val }),
              type: \'POST\',
              url: \'http://182.74.195.210/MasayaBlog/getNextScroll\',
              success: function (data) {
                $(\'.waiting\').remove();
                $(\'.col-lg-12.padding_none\').last().after(data.data);
                if(data.data.indexOf("No more images") == -1) {
                  flag = 1;
                }
              }
           });
         }
      });
    });})(jQuery);', array('type'=>'inline'));
  }

drupal_add_js('(function($) {
  $(document).ready(function() {
    var path = window.location.href;
    $("ul a").each(function() {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });
    $(\'.active\').parents(\'li\').addClass(\'active\');
  });
}(jQuery));', array('type'=>'inline', 'scope'=>'footer'));

  if ($variables['node']->type == 'your_stay') {

    $og_title = array(
      '#tag' => 'meta', 
      '#attributes' => array( 
          'property' => 'og:title', 
          'content' => $variables['title'], 
        ), 
      ); 
    drupal_add_html_head($og_title, 'og_title');
    $og_description = array(
      '#tag' => 'meta', 
      '#attributes' => array( 
          'property' => 'og:description', 
          'content' => $variables['title'], 
        ), 
      ); 
    drupal_add_html_head($og_description, 'og_description');

    $og_url = array(
      '#tag' => 'meta', 
      '#attributes' => array( 
          'property' => 'og:url', 
          'content' => 'http://182.74.195.210/MasayaBlog/en/preparing-your-stay', 
        ), 
      ); 
    drupal_add_html_head($og_url, 'og_url');

    $img = field_get_items('node', $variables['node'], 'field_sec1_subsection1_image');
    $img_url = file_create_url($img[0]['uri']);
    $og_image = array(
      '#tag' => 'meta', 
      '#attributes' => array( 
          'property' => 'og:image', 
          'content' => $img_url, 
        ), 
      ); 
    drupal_add_html_head($og_image, 'og_image');

    drupal_add_js('(function($){ $(document).ready(function(){
    var oddClick1 = false;
    var oddClick2 = false;
    var oddClick3 = false;
    var oddClick4 = false;
    var maxHeight = Math.max.apply(null, $("section").map(function ()
    { return $(this).height(); }).get());

    $(\'section\').css(\'height\', maxHeight);

    $("#Section_1_toggle").click(function(){
        $("#Section_1_panel").slideToggle("slow");
        $("#Section_2_panel").hide();
        $("#Section_3_panel").hide();
        $("#Section_4_panel").hide();
        $(\'.Section_2\').css(\'height\', maxHeight);
        $(\'.Section_3\').css(\'height\', maxHeight);
        $(\'.Section_4\').css(\'height\', maxHeight);

        $(\'html, body\').animate({
            scrollTop: ($(this).offset().top - 290)
        }, 200);
        
        oddClick1 ? ($(\'.Section_1\').css(\'height\', maxHeight)) : ($(\'.Section_1\').css(\'height\', \'auto\'));
        oddClick1 = !oddClick1;
        oddClick2 = false;
        oddClick3 = false;
        oddClick4 = false;
    });

    $("#Section_2_toggle").click(function(){
        $("#Section_2_panel").slideToggle("slow");
        $("#Section_1_panel").hide();
        $("#Section_3_panel").hide();
        $("#Section_4_panel").hide();
        $(\'.Section_1\').css(\'height\', maxHeight);
        $(\'.Section_3\').css(\'height\', maxHeight);
        $(\'.Section_4\').css(\'height\', maxHeight);
        
        $(\'html, body\').animate({
            scrollTop: ($(this).offset().top - 290)
        }, 200);
        
        oddClick2 ? ($(\'.Section_2\').css(\'height\', maxHeight)) : ($(\'.Section_2\').css(\'height\', \'auto\'));
        oddClick2 = !oddClick2;
        oddClick1 = false;
        oddClick3 = false;
        oddClick4 = false;
    });

    $("#Section_3_toggle").click(function(){
        $("#Section_3_panel").slideToggle("slow");
        $("#Section_1_panel").hide();
        $("#Section_2_panel").hide();
        $("#Section_4_panel").hide();
        $(\'.Section_1\').css(\'height\', maxHeight);
        $(\'.Section_2\').css(\'height\', maxHeight);
        $(\'.Section_4\').css(\'height\', maxHeight);
        
        $(\'html, body\').animate({
            scrollTop: ($(this).offset().top - 290)
        }, 200);
        
        oddClick3 ? ($(\'.Section_3\').css(\'height\', maxHeight)) : ($(\'.Section_3\').css(\'height\', \'auto\'));
        oddClick3 = !oddClick3;
        oddClick1 = false;
        oddClick2 = false;
        oddClick4 = false;
    });

    $("#Section_4_toggle").click(function(){
        $("#Section_4_panel").slideToggle("slow");
        $("#Section_1_panel").hide();
        $("#Section_3_panel").hide();
        $("#Section_2_panel").hide();
        $(\'.Section_1\').css(\'height\', maxHeight);
        $(\'.Section_2\').css(\'height\', maxHeight);
        $(\'.Section_3\').css(\'height\', maxHeight);
        
        $(\'html, body\').animate({
            scrollTop: ($(this).offset().top - 290)
        }, 200);
        
        oddClick4 ? ($(\'.Section_4\').css(\'height\', maxHeight)) : ($(\'.Section_4\').css(\'height\', \'auto\'));
        oddClick4 = !oddClick4;
        oddClick1 = false;
        oddClick2 = false;
        oddClick3 = false;
    });

});})(jQuery);', array('type'=>'inline'));
  }
}
/**
 * Override or insert variables into the block template.
 */
function masaya_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements theme_menu_tree().
 */
function masaya_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function masaya_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

  return $output;
}
