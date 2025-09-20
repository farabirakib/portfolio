
@extends('frontend.layouts.master')

@section('title', 'Welcome to My Portfolio')

@section('content')

  @include('frontend.sections.hero')

  @include('frontend.sections.about')

  @include('frontend.sections.skills') 

  @include('frontend.sections.experience')

  @include('frontend.sections.services') 

  @include('frontend.sections.projects')

  @include('frontend.sections.contact')


@endsection
