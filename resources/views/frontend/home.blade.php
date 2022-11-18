@extends('frontend.layouts.master')
@section('content')


@php
// get current languge . 
$lang = app()->getLocale();

$slug = ($lang == 'en')?"":"_ar";

@endphp
<div class="background">
    <img src="{{URL::asset('frontend/assets/img/background-city.png')}}"  alt="background">
</div>
</div>
<!-- end Header -->

<!-- Page Content -->
<div id="page-content">
<!-- Slider -->
<div id="homepage-carousel">
<div class="container">
    <div class="homepage-carousel-wrapper">
        <div class="row">
            <div class="col-md-6 col-sm-7">
                <div class="image-carousel">
                    @foreach ($slides as $slide)
                    <div class="image-carousel-slide"><img src="{{URL::asset('slider_photos/'.$slide->image)}}" width="555" height="320" alt=""></div>
                    @endforeach
                </div><!-- /.slider-image -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6 col-sm-5">
                <div class="slider-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aaa">
                                <h1 class="mb-0" style=" padding: 0px;margin-bottom: 0px;">{{$settings->name}}</h1>
                            </div>
                            <div>
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/6T8stXj7Dzg?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.slider-content -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
        <div class="background"></div>
    </div><!-- /.slider-wrapper -->
    <div class="slider-inner"></div>
</div><!-- /.container -->
</div>
<!-- end Slider -->

<!-- News, Events, About -->
<div class="block">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <section class="news-small" id="news-small">
                <header>
                    <h2>{{__('static.articles')}}</h2>
                </header>
                <div class="section-content">
                    @foreach ($articles as $article)
                    @php   
                    $content_attr = "content".$slug;
                    @endphp
                    <article>
                        <figure class="date"><i class="fa fa-file-o"></i>{{$article->created_at}}</figure>
                        <header><a href="{{route('articles.show', $article->id)}}">{!!Str::limit($article->$content_attr, 70)!!}</a></header>
                    </article><!-- /article -->
                    @endforeach
                </div><!-- /.section-content -->
                <a href="" class="read-more stick-to-bottom">{{__('static.all articles')}}</a>
            </section><!-- /.news-small -->
        </div><!-- /.col-md-4 -->
        <div class="col-md-4 col-sm-6">
            <section class="events small" id="events-small">
                <header>
                    <h2>{{__('static.events')}}</h2>
                </header>
                <div class="section-content">
                    @foreach($events as $event)
                    @php   
                    $title_attr = 'title'. $slug;
                    $content_attr = "content".$slug;
                    @endphp
                    <article class="event nearest">
                        <figure class="date">
                            <div class="month">
                                @php 
                                
                                $month= APP\http\controllers\Frontend\HomeController::event($event->start_date);
                                @endphp
                                {{$month}}
                                </div>
                            <div class="day">
                                @php 
                                $day= APP\http\controllers\Frontend\HomeController::day($event->start_date);
                                @endphp
                                {{$day}}
                            </div>
                        </figure>
                        <aside>
                            <header>
                                <a href="{{route('events.show', $event->id)}}">{{$event->$title_attr}}</a>
                            </header>
                            <div class="additional-info">{!! Str::limit($event->$content_attr, 70) !!}</div>
                        </aside>
                    </article><!-- /article -->
                    @endforeach
                </div><!-- /.section-content -->
            </section><!-- /.events-small -->
        </div><!-- /.col-md-4 -->
        <div class="col-md-4 col-sm-12">
            <section id="about">
                <header>
                    <h2>{{__('static.about_us') .' ' .$settings->name}}</h2>
                </header>
                <div class="section-content">
                    @php
                        $disc_arrt = "disc".$slug;
                    @endphp
                    <p><strong>Welcome to {{$settings->name}}.</strong> {!! $settings->$disc_arrt !!}</p>
                    <a href="about-us" class="read-more stick-to-bottom">  {{ __('static.read more')}}</a>
                </div><!-- /.section-content -->
            </section><!-- /.about -->
        </div><!-- /.col-md-4 -->
    </div><!-- /.row -->
</div><!-- /.container -->
</div>
<!-- end News, Events, About -->

<!-- Testimonial -->
<section id="testimonials">
<div class="block">
    <div class="container">
        <div class="author-carousel">
            @foreach ($testmonials as $testmonial)
            @php   
            $content_attr = "content".$slug;
            $auther_attr = "auther".$slug;
            @endphp
            <div class="author">
                <blockquote>
                    <figure class="author-picture"><img src="{{asset('testmonials_photos/' .$testmonial->image)}}" style="width: 100px; height:100px" alt=""></figure>
                    <article class="paragraph-wrapper">
                        <div class="inner">
                            <header>{{$testmonial->$content_attr}}</header>
                            <footer>{{$testmonial->$auther_attr}}</footer>
                        </div>
                    </article>
                </blockquote>
            </div><!-- /.author -->
            @endforeach
        </div><!-- /.author-carousel -->
    </div><!-- /.container -->
</div><!-- /.block -->
</section>
<!-- end Testimonial -->

<!-- Our Professors, Gallery -->
<div class="block">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <section id="our-professors">
                <header>
                    <h2>{{__('static.our professors')}}</h2>
                </header>
                <div class="section-content">
                    <div class="professors">
                        @foreach ($instructors as $instructor)
                        @php
                            $name_atrr = "name".$slug;
                            $position_atrr = "position".$slug;
                        @endphp
                            <article class="professor-thumbnail">
                                <figure class="professor-image"><a href="{{route('instructors.show', $instructor->id)}}"><img src="{{URL::asset('instructor_photos/'.$instructor->image)}}" width="80" height="80" alt=""></a></figure>
                                <aside>
                                    <header>
                                        <a href="{{route('instructors.show', $instructor->id)}}">{{$instructor->$position_atrr}}. {{$instructor->$name_atrr}}</a>
                                        <div class="divider"></div>
                                        <figure class="professor-description">{{$instructor->desc}}</figure>
                                    </header>
                                    <a href="instructors/{{$instructor->id}}" class="show-profile">Show Profile</a>
                                </aside>
                            </article><!-- /.professor-thumbnail -->
                        @endforeach
                        
                          <a href="instructors" class="read-more stick-to-bottom" style="position: inherit;">{{__('static.all professors')}}</a>
                    </div><!-- /.professors -->
                </div><!-- /.section-content -->
            </section><!-- /.our-professors -->
        </div><!-- /.col-md-4 -->
        @foreach ($galleries as $gallery)
        <div class="col-md-8 col-sm-8">
            <section id="gallery">
                <header>
                    <h2>{{$gallery->name}}</h2>
                </header>
                <div class="section-content">
                    <ul class="gallery-list">
                        @foreach ($gallery->gallery_photos as $gallery)
                        <li><a href="{{URL::asset('galleries_photos/'.$gallery->image)}}" class="image-popup"><img src="{{URL::asset('galleries_photos/'.$gallery->image)}}" alt=""></a></li>
                        @endforeach
                    </ul>
                </div><!-- /.section-content -->
            </section><!-- /.gallery -->
        </div><!-- /.col-md-4 -->
        @endforeach
    </div><!-- /.row -->
</div><!-- /.container -->
</div>
<!-- end Our Professors, Gallery -->

</div>
<!-- end Page Content -->



    
@endsection

