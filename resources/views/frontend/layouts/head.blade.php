<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="atiec">
    <meta name="discrbtion" content="Educational">
    <meta name="discrbtion" content=" Course">
    <meta name="discrbtion" content="University">
    <meta property="og:title"         content="{{$settings->name}}" />
    <meta property="og:description"   content="{{$settings->disc}}" />

    <link rel="icon" href="{{URL::asset('assets/img/brand/cropped-favicon.png')}}" type="image/x-icon"/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/selectize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/vanillabox/vanillabox.css') }}" type="text/css">
    @yield('css')
    @if (app()->getLocale()=='en')
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/owl.carousel.css') }}" type="text/css">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/style.css') }}" type="text/css">
    @else
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/owl.carousel1.css') }}" type="text/css">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/style1.css') }}" type="text/css">
    @endif
    

    <title>{{$settings->name}}</title>

</head>


