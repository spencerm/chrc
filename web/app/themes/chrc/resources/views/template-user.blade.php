{{--
  Template Name: People
--}}

@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
    @include('partials.user')
  @endwhile
@endsection
