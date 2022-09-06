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
        <li><a href="/">{{__('static.home')}}</a></li>
        <li class="active">{{__('static.articles')}}</li>
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
                    <section class="events images" id="events">
                        <header><h1>{{__('static.articles')}}</h1></header>
                        <div class="section-content">
                            @foreach ($articles as $article)
                            @php
                                $title_atrr = "title".$slug;
                                $content_atrr = "content".$slug;
                            @endphp
                            <article class="event">
                                <div class="event-thumbnail">
                                    <figure class="event-image" >
                                        <div class="image-wrapper"><img style="height: 100px" src="{{URL::asset('article_photos/' .$article->image)}}" ></div>
                                    </figure>
                                </div>
                                <aside>
                                    <header>
                                        <a href="article/{{$article->id}}">{{$article->title_atrr}}</a>
                                    </header>
                                    <div class="additional-info"></span> {{$article->created_at}}</div>
                                    <div class="description">
                                        <p>{!!Str::limit($article->$content_atrr, 70)!!}.
                                        </p>
                                    </div>
                                    <a href="{{route('articles.show',$article->id)}}" class="btn btn-framed btn-color-grey btn-small">{{__('static.view article')}}</a>
                                </aside>
                            </article><!-- /.article -->
                            @endforeach
                        </div><!-- /.section-content -->
                    </section><!-- /.articles-images -->
                    <div class="center">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul><!-- /.pagination -->
                    </div><!-- /.center -->
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->
@endsection