@extends('frontend/layouts/page-master')
@section('content')

@php
// get current languge . 
$lang = app()->getLocale();

$slug = ($lang == 'en')?"":"_ar";

@endphp

<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">{{__('static.articles')}}</a></li>
        <li class="active">{{__('static.view article')}}</li>
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
                    <section id="blog-detail">
                        <header><h1>{{__('static.articles')}}</h1></header>
                        @php
                        $content_atrr = "content".$slug;
                        $name_atrr = "name".$slug;
                        $title_atrr = "title".$slug;
                        @endphp
                        <article class="blog-detail">
                            <header class="blog-detail-header">
                                <img src="{{asset('article_photos/'.$article->image)}}" style="height: 300px">
                                <div class="blog-detail-meta">
                                    <span class="date"><span class="fa fa-file-o"></span>{{$article->created_at}}</span>
                                    <span class="author"><span class="fa fa-user"></span>{{$article->auther->name}}</span>
                                </div>
                                <h2>{{$article->$title_atrr}}</h2>
                            </header>
                            <hr class="article-hr">

                            <h4>{{$article->Category->$name_atrr}}</h4>
                            <p>{!!$article->$content_atrr!!}
                            </p>
                            <footer>
                                <hr class="article-hr">
                                <section id="share-post">
                                    <div class="icons">
                                        <span>Share:</span>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-pinterest"></i></a>
                                        <a href=""><i class="fa fa-youtube-play"></i></a>
                                    </div><!-- /.icons -->
                                </section><!-- /share -->
                                <hr class="article-hr">
                            </footer>
                        </article>
                    </section><!-- /.blog-detail -->
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->
@endsection