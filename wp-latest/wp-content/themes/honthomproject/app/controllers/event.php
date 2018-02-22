<?php
namespace App;
use WP_Query;
use Sober\Controller\Controller;

class Event extends Controller
{
  public function displayEvent() {
      if (is_subcategory()) {
        $args = array(
          'offset' => 0,
          'category__in' => getRelateCategorybyWPML(get_queried_object()->term_id),
          'orderby' => 'ID',
          'order' => 'DESC',
          'post_type' => 'post',
          'post_status' => 'publish'
        );
      } else {
        $args = array(
          'offset' => 0,
          'cat' => getRelateCategorybyWPML(SU_KIEN),
          'orderby' => 'ID',
          'order' => 'DESC',
          'post_type' => 'post',
          'post_status' => 'publish'
        );
      }
      $event = get_posts($args);
      return $event;
  }
}
