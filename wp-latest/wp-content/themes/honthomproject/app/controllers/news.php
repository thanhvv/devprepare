<?php
namespace App;
use WP_Query;
use Sober\Controller\Controller;

class News extends Controller
{
  public function displayNews() {
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
          'cat' => getRelateCategorybyWPML(TIN_TUC),
          'orderby' => 'ID',
          'order' => 'DESC',
          'post_type' => 'post',
          'post_status' => 'publish'
        );
      }
      $news = get_posts($args);
      return $news;
  }

  public function otherNewsPost($idPost,$limit = 5) {
      $args = array(
        'cat' => getRelateCategorybyWPML(getCategoryIdSinglePost()),
        'post__not_in' => array($idPost),
        'posts_per_page'=> $limit,
        'caller_get_posts'=>1
        );
    $otherNews = get_posts($args);
    return $otherNews;
  }
}
