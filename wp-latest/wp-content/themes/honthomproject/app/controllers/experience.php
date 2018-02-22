<?php
namespace App;
use WP_Query;
use Sober\Controller\Controller;

class Experience extends Controller
{
  public function displayExperience() {
      $args = array(
        'offset' => 0,
        'cat' => getRelateCategorybyWPML(TRAI_NGHIEM),
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish'
      );
      $experience = get_posts($args);
      return $experience;
  }
}
