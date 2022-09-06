<body class="page-homepage-carousel">
    <!-- Wrapper -->
    <div class="wrapper">
    <!-- Header -->
    <div class="navigation-wrapper">
        <div class="secondary-navigation-wrapper">
            <div class="container">
                <div class="navigation-contact pull-left">Call Us:  <span class="opacity-90">{{$settings->num}}</span></div>
                <ul class="secondary-navigation list-unstyled">
                    @if (app()->getlocale()=='en')
                    <a href="{{route('set_locale', 'ar')}}">العربية</a>
                    @else
                    <a href="{{route('set_locale', 'en')}}">EN</a>
                    @endif
                    <li>Email:<a href="mailto:{{$settings->email}}"> {{$settings->email}}</a></li>
                    <li><a target="blank" href="https://api.whatsapp.com/send?phone={{$settings->num}}">WhatsApp</a>
                    </li>
                    <li><a href="#">Faculty & Staff</a></li>
                </ul>
            </div>
        </div><!-- /.secondary-navigation -->
    


        
