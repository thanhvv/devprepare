<?php
$intro = new Introduce();
foreach ($intro->displayIntroduce() as $key => $value) {
  echo $value->post_title.'<br>';
  echo $value->post_content;
}
// echo getUrlImage(displayGioiThieu()[0]->ID,'news');
