@extends('frontend/layouts/page-master')
@section('content')
<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">{{__('static.home')}}</a></li>
        <li class="active">{{__('static.contact_us')}}</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<!-- Page Content -->
@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
					<button type="button" class="close" data-dismiss = 'alert'>x</button>
				</div>
				@endif
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            
            <div class="col-md-8">
                <div id="page-main">
                    <section id="contact">
                        <header><h1>{{__('static.contact_us')}}</h1></header>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <h3>{{$settings->name}}</h3>
                                    <br>
                                    <span>{{$settings->place}}</span>
                                    
                                    <br>
                                    <abbr title="Telephone">Telephone:</abbr> {{$settings->num}}
                                    <br>
                                    <abbr title="Email">Email:</abbr> <a target="_block" href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                                </address>
                                <div class="icons">
                                    <a target="blank" href="{{$settings->twitter}}"><i class="fa fa-twitter"></i></a>
                                    <a target="blank" href="{{$settings->facebook}}"><i class="fa fa-facebook"></i></a>
                                    <a target="blank" href="{{$settings->youtube}}"><i class="fa fa-youtube-play"></i></a>
                                </div><!-- /.icons -->
                                <hr>
                                <p>
                                    {{$settings->disc}}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="map-wrapper">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.5250987843697!2d31.471186314599354!3d30.279109614404657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145805bed9b8923b%3A0x41b5ccabb7c832c2!2sObour%20Institutes!5e0!3m2!1sen!2sus!4v1661382099625!5m2!1sen!2sus" width="100%" height="350" frameborder="0" style="border:0"></iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="contact-form" class="clearfix">
                        <header><h2>{{__('static.send message for us')}}</h2></header>
                        <form class="contact-form" id="contactform" method="post" action="{{route('dashboard.contacts.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="name">{{__('static.your name')}}</label>
                                            <input type="text" name="name" id="name" required>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><!-- /.controls -->
                                    </div>
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="name">{{__('static.phone')}}</label>
                                            <input type="text" name="phone_num" id="name" required>
                                            @error('phone_num')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><!-- /.controls -->
                                    </div>
                                    <!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="email">{{__('static.email')}}</label>
                                            <input type="email" name="email" id="email" required>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="message">{{__('static.your message')}}</label>
                                            <textarea name="message" id="message" required></textarea>
                                            @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                            <div class="pull-right">
                                <input type="submit" class="btn btn-color-primary"  value="Send a Message">
                            </div><!-- /.form-actions -->
                            <div id="form-status"></div>
                        </form><!-- /.footer-form -->
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->
@endsection