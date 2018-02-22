<?php
namespace App;
use WP_Query;
use Sober\Controller\Controller;

class Search extends Controller
{
  public function displaySearch($getString = '') {


    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array (
      's' => $getString,
      'post_status' => 'publish',
      'post_type'=>'post',
      'paged' => $paged,
    );
    $search = get_posts($args);
    return $search;
  }
}
