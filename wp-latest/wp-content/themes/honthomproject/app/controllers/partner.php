<?php
namespace App;
use WP_Query;
use Sober\Controller\Controller;

class Partner extends Controller
{
  public function displayPartner() {
      $args = array(
        'offset' => 0,
        'cat' => getRelateCategorybyWPML(DOI_TAC),
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish'
      );
      $partner = get_posts($args);
      return $partner;
  }
}
