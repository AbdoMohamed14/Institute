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
        <li class="active">{{__('static.events')}}</li>
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
                        <header><h1>{{__('static.events')}}</h1></header>
                        <div class="section-content">
                            @foreach ($events as $event)

                            @php
                                $title_atrr = "title".$slug;
                                $content_atrr = "content".$slug;
                            @endphp
                            <article class="event">
                                <div class="event-thumbnail">
                                    <figure class="event-image">
                                        <div class="image-wrapper"><img src="{{URL::asset('event_photos/'.$event->image)}}"></div>
                                    </figure>
                                    <figure class="date">
                                        <div class="month">
                                            @php 
                                                $month= APP\http\controllers\Frontend\EventsController::event($event->start_date);
                                            @endphp
                                            {{$month}}
                                        </div>
                                        <div class="day">
                                            @php 
                                                $day= APP\http\controllers\Frontend\EventsController::day($event->start_date);
                                            @endphp
                                            {{$day}}
                                        </div>
                                    </figure>
                                </div>
                                <aside>
                                    <header>
                                        <a href="{{route('events.show', $event->id)}}">{{$event->$title_atrr}}</a>
                                    </header>
                                    <div class="additional-info"><span class="fa fa-map-marker"></span> {{$event->place}}</div>
                                    <div class="description">
                                        <p>{!! $event->$content_atrr !!}.
                                        </p>
                                    </div>
                                    <a href="{{route('events.show', $event->id)}}" class="btn btn-framed btn-color-grey btn-small">{{__('static.view event')}}</a>
                                </aside>
                            </article><!-- /.event -->
                            @endforeach
                        </div><!-- /.section-content -->
                    </section><!-- /.events-images -->
                    <div class="center">
                        <ul class="pagination">
                            {{$events->links()}}
                        </ul><!-- /.pagination -->
                    </div><!-- /.center -->
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->
@endsection



