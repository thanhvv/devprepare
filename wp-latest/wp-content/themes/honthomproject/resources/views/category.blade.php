@extends('layouts.app')

@section('content')
    @include('partials.category.category-'.getCurrentSlugCategory())
@endsection
