<?php
namespace App;
use WP_Query;
use Sober\Controller\Controller;

class Introduce extends Controller
{
  public function displayIntroduce() {
      $args = array(
        'posts_per_page' => 1,
        'offset' => 0,
        'cat' => getRelateCategorybyWPML(GIOI_THIEU),
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish'
      );
      $gioithieu = new WP_Query($args);
      return $gioithieu;
  }

}
