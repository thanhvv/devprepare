<?php
$event = new Event();
foreach ($event->displayEvent() as $key => $value) {
  echo $value->post_title.'<br>';
}
