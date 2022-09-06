@extends('frontend.layouts.page-master')
@section('content')
    
<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">{{__('static.home')}}</a></li>
        <li><a href="#">{{__('static.events')}}</a></li>
        <li class="active">{{__('static.event details')}}</li>
    </ol>
</div>
<!-- end Breadcrumb -->


<!-- Page Content -->
<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <header><h1>{{$event->title}}</h1></header>
        <div class="row">
            <!-- Course Image -->
            <div class="col-md-2 col-sm-3">
                <figure class="event-image">
                    <div class="image-wrapper"><img src="{{URL::asset('event_photos/' .$event->image)}}"></div>
                </figure>
            </div><!-- end Course Image -->
            <!--MAIN Content-->
            <div class="col-md-6 col-sm-9">
                <div id="page-main">
                    <section id="event-detail">
                        <article class="event-detail">
                            <section id="event-header">
                                <header>
                                    <h2 class="event-date">{{$event->start_date}}</h2>
                                </header>
                                <hr>
                                <div class="course-count-down" id="course-count-down">
                                    <figure class="course-start">{{__('static.event starts in')}} : {{$event->start_date}} </figure>
                                    <!-- /.course-start -->

                                    <div class="count-down-wrapper">
                                        <script type="text/javascript">var _date = '';</script>
                                    </div><!-- /.count-down-wrapper -->

                                </div><!-- /.course-count-down -->
                                <hr>
                                <figure>
                                    <span class="course-summary" id="course-length">{{__('static.event ends in')}} : {{$event->end_date}}</span>
                                </figure>
                            </section><!-- /#course-header -->

                            <section id="course-info">
                                <header><h2>{{__('static.about event')}}</h2></header>
                                <p>
                                   {!! $event->content !!} 
                                </p>
                            </section><!-- /#course-info -->
                        </article><!-- /.course-detail -->
                    </section><!-- /.course-detail -->
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->
@endsection


