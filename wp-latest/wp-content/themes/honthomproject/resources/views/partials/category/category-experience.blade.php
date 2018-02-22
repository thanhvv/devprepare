<?php
$experience = new Experience();
foreach ($experience->displayExperience() as $key => $value) {
  echo $value->post_title.'<br>';
}
