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
        <li><a href="#">{{__('static.instructors')}}</a></li>
        <li class="active">{{__('static.instructor details')}}</li>
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
                        @php
                            $name_attr = "name".$slug;
                            $position_attr = "position".$slug;
                            $preif_attr = "preif".$slug;
                            $desc_attr = "desc".$slug;
                        @endphp
                        <header><h1>{{__('static.instructor details')}}</h1></header>
                        <div class="author-block member-detail">
                            <figure class="author-picture"><img src="{{asset('instructor_photos/' .$instructors->image)}}" alt=""></figure>
                            <article class="paragraph-wrapper">
                                <div class="inner">
                                    <header><h2>{{$instructors->$name_attr }}</h2></header>
                                    <figure>{{$instructors->$position_attr}}</figure>
                                    <hr>
                                    <p class="quote">
                                        {{$instructors->$preif_attr}}
                                    </p>
                                    <hr>
                                    <h3>Biography</h3>
                                    <p>
                                        {{$instructors->$desc_attr}}.
                                    </p>
                                </div>
                            </article>
                        </div><!-- /.author -->
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

           

@endsection