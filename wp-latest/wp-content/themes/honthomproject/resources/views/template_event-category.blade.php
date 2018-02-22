<?php
/*
* Category Template: Sự kiện
*/
?>
@extends('layouts.app')
@section('content')
<?php
$event = new Event();
foreach ($event->displayEvent() as $key => $value) {
  echo $value->post_title.'<br>';
}

// echo getUrlImage(displayGioiThieu()[0]->ID,'news');
 ?>
@endsection
