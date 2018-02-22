@extends('layouts.app')

@section('content')
  <?php if (is_front_page()) {
  ?>
      @include('partials.page-home')
  <?php }?>
@endsection
