<div class="primary-navigation-wrapper">
    <header class="navbar" id="top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand nav" id="brand">
                    <a href="/"><img src="{{URL::asset('app/'.$settings->logo)}}" alt="brand"></a>
                </div>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation"> 
                <ul class="nav navbar-nav">
                    <li class="@if(Request::route()->getName() == 'home') active  @endif">
                        <a href="/" >{{__('static.home')}}</a>
                        
                    </li>
                    <li class="@if(Request::route()->getName() == 'about-us') active  @endif">
                        <a href="{{route('about-us')}}">{{__('static.about_us')}}</a>
                    </li>

                    <li class="@if(Request::route()->getName() == 'events.index') active  @endif">
                        <a href="{{route('events.index')}}" >{{__('static.events')}}</a>
                        
                    </li>                   
                     <li class="@if(Request::route()->getName() == 'articles.index') active  @endif">
                        <a href="{{route('articles.index')}}" >{{__('static.articles')}}</a>
                        
                    </li>
                    <li class="@if(Request::route()->getName() == 'instructors.index') active  @endif">
                        <a href="{{route('instructors.index')}}" >{{__('static.instructors')}}</a>
                        
                    </li>
                 
                    <li class="@if(Request::route()->getName() == 'contact-us') active  @endif">
                        <a href="{{route('contact-us')}}">{{__('static.contact_us')}}</a>
                    </li>
                </ul>
            </nav><!-- /.navbar collapse-->
        </div><!-- /.container -->
    </header><!-- /.navbar -->
</div><!-- /.primary-navigation -->
