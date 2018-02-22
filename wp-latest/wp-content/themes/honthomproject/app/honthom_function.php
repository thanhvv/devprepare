<?php
/*Remove wordpress version*/
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info');

/*
Get id relate category by WPML language.
Will return the category ID in the current language for categoy ID $category.
If the translation is missing it will return the original (here: $category)
Author: ThanhVV
*/
function getRelateCategorybyWPML($category) {
  return apply_filters( 'wpml_object_id', $category, 'category', TRUE );
}
/*
Get current id category
Author: ThanhVV
*/
function getCurrentIDCategory() {
  return get_queried_object()->term_id;
}

/*
Get current slug category
Author: ThanhVV
*/
function getCurrentSlugCategory() {
  if ( is_single() ) {
        $cats =  get_the_category();
        $cat = $cats[0];
    } else {
        $cat = get_category( get_query_var( 'cat' ) );
    }
    $cat_slug = $cat->slug;

  return $cat_slug;
}
/*
Get current slug category by id
Author: ThanhVV
*/
function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}
/*
Get url image
Author: ThanhVV
*/
function getUrlImage($id,$size) {
  if (wp_is_mobile()) {
    $check = wr2x_get_retina_from_url(get_the_post_thumbnail_url($id,$size));
    if($check) {
      $get = wr2x_get_retina_from_url(get_the_post_thumbnail_url($id,$size));
    } elseif (get_the_post_thumbnail_url($id,$size)) {
      $get = get_the_post_thumbnail_url($id,$size);
    } else {
      $get = get_template_directory_uri()."/assets/images/default.png";
    }
  } elseif(get_the_post_thumbnail_url($id,$size)) {
      $get = get_the_post_thumbnail_url($id,$size);
  } else {
    $get = get_template_directory_uri()."/assets/images/default.png";
  }
  return $get;
}
/*
Get id by slug
*/
function get_id_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) {
    return $page->ID;
  } else {
    return null;
  }
}
/*
Get category id form single Post
*/
function getCategoryIdSinglePost() {
  $category = get_the_category();
  return $category[0]->term_id;
}
/*
Get Title SEO
Author: ThanhVV
*/
function TitleSEO($text) {
  if(get_field($text,get_queried_object()->ID) == NULL)
    return wp_title('');
  return get_field($text,get_queried_object()->ID);
}
function change_submenu_class($menu) {
  $menu = preg_replace('/ class="sub-menu"/','/ class="myclass" /',$menu);
  return $menu;
}
add_filter('wp_nav_menu','change_submenu_class');
/*
Check sub_category
*/
function is_subcategory (){
  $cat = get_query_var('cat');
  $category = get_category($cat);
	$category->parent;
    return ( $category->parent == '0' || $category->parent == NULL) ? false : true;
}

// function wps_highlight_results($text){
//      if(is_search()){
//      $sr = get_query_var('s');
//      $keys = explode(" ",$sr);
//      $text = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">'.$sr.'</strong>', $text);
//      }
//      return $text;
// }
// add_filter('the_excerpt', 'wps_highlight_results');
// add_filter('the_title', 'wps_highlight_results');
