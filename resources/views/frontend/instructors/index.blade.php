@extends('frontend.layouts.page-master')

@section('content')

@php
// get current languge . 
$lang = app()->getLocale();

$slug = ($lang == 'en')?"":"_ar";

@endphp

    <!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">{{__('static.home')}}</a></li>
        <li class="active">{{__('static.instructors')}}</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-8">
                <div id="page-main">
                    <section id="members">
                        <header><h1>{{__('static.instructors')}}</h1></header>
                        <section id="our-speakers">
                            @foreach ($instructors as $instructor)
                            @php
                                $name_attr = "name".$slug;
                                $position_attr = "position".$slug;
                                $desc_attr = "desc".$slug;
                            @endphp
                            <div class="author-block course-speaker">
                                <a href="member-detail.html"><figure class="author-picture"><img src="{{asset('instructor_photos/' .$instructor->image)}}" alt=""></figure></a>
                                <article class="paragraph-wrapper">
                                    <div class="inner">
                                        <header><a href="{{route('instructors.show',$instructor->id)}}">{{$instructor->$name_attr}}</a></header>
                                        <figure>{{$instructor->$position_attr}}</figure>
                                        <p>
                                            {{$instructor->$desc_attr}}
                                        </p>
                                        <a href="{{route('instructors.show',$instructor->id)}}" class="btn btn-framed btn-small btn-color-grey">Full Bio</a>
                                    </div>
                                </article>
                            </div><!-- /.author -->
                            @endforeach
                        </section><!-- /#our-speakers -->
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->
@endsection