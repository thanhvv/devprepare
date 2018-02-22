<?php
$news = new News();
foreach ($news->displayNews() as $value) {
  echo "<img src=".getUrlImage($value->ID,news)."></br>";
  echo "<a href=".get_permalink($value->ID).">".$value->post_title."</a></br>";
}
