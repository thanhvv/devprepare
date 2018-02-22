<?php
namespace App;
use WP_Query;
use Sober\Controller\Controller;

class Question extends Controller
{
  public function displayQuestion() {
      $args = array(
        'offset' => 0,
        'cat' => getRelateCategorybyWPML(CAU_HOI),
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish'
      );
      $question = get_posts($args);
      return $question;
  }
}
