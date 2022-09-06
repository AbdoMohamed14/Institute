@include('frontend.layouts.head')
<body class="page-sub-page page-contact">
    <!-- Wrapper -->
    <div class="wrapper">
    <!-- Header -->
    <div class="navigation-wrapper">
        <div class="secondary-navigation-wrapper">
            <div class="container">
                <div class="navigation-contact pull-left">Call Us:  <span class="opacity-70">{{$settings->num}}</span></div>
                <ul class="secondary-navigation list-unstyled pull-right">
                    @if (app()->getlocale()=='en')
                    <a href="#">العربية</a>
                    @else
                    <a href="#">EN</a>
                    @endif
                    <li>Email:<a href="mailto:{{$settings->email}}"> {{$settings->email}}</a></li>
                    <li><a target="blank" href="https://api.whatsapp.com/send?phone={{$settings->num}}">WhatsApp</a>
                    <li><a href="#">Faculty & Staff</a></li>
                </ul>
            </div>
        </div><!-- /.secondary-navigation -->
@include('frontend.layouts.primary-nav')
        
        <div class="background">
            <img src="{{URL::asset('frontend/assets/img/background-city.png')}}"  alt="background">
        </div>
    </div>
    <!-- end Header -->
    @yield('content')
    @include('frontend.layouts.sidebar')
    @include('frontend.layouts.footer')
    @include('frontend.layouts.footer-scripts')
   