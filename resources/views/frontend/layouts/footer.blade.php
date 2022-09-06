
<!-- Footer -->
<footer id="page-footer">
    <section id="footer-top">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-social">
                    <figure><b>{{__('static.follow us')}}</b> :</figure>
                    <div class="icons">
                        <a target="_blank" href="{{$settings->twitter}}"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="{{$settings->facebook}}"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="{{$settings->youtube}}"><i class="fa fa-youtube-play"></i></a>
                    </div><!-- /.icons -->
                </div><!-- /.social -->

            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-top -->

    <section id="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <aside class="logo">
                        <img src="{{URL::asset('app/'.$settings->logo)}}" width="360" height="88" style="max-width: 70%;" class="vertical-center">
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <header><h4>{{__('static.contact_us')}}</h4></header>
                        <address>
                            <strong>{{$settings->name}}</strong>
                            <br>
                            <span>{{$settings->place}}</span>
                            <br>
                            <abbr title="Telephone">Telephone:</abbr> {{$settings->num}}
                            <br>
                            <abbr title="Email">Email:</abbr> <a target="_block" href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                        </address>
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <header><h4>{{__('static.important links')}}</h4></header>
                        <ul class="list-links">
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Articles</a></li>
                            <li><a href="#">Professors</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="#">Research</a></li>
                        </ul>
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <header><h4>{{__('static.about_us') .' ' .$settings->name}}</h4></header>
                        <p>
                            {!! $settings->disc !!}
                        </p>
                        <div>
                            <a href="about-us" class="read-more">{{__('static.read more')}}</a>
                        </div>
                    </aside>
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="background"><img src="{{URL::asset('app/'.$settings->back)}}" alt="" style="width: 100%" height="100%"></div>
    </section><!-- /#footer-content -->

    <section id="footer-bottom">
        <div class="container">
            <div class="footer-inner">
                <div class="copyright">© All rights reserved</div><!-- /.copyright -->
            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-bottom -->

</footer>
<!-- end Footer -->

</div>
<!-- end Wrapper -->
