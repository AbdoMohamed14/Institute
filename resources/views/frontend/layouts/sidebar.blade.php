            @php
            // get current languge . 
            $lang = app()->getLocale();

            $slug = ($lang == 'en')?"":"_ar";

            $title_atrr = "title".$slug;

            @endphp


            <!--SIDEBAR Content-->
            <div class="col-md-4">
                <div id="page-sidebar" class="sidebar">
                    <aside class="news-small" id="news-small">
                        <header>
                            <h2>{{__('static.articles')}}</h2>
                        </header>
                        <div class="section-content">
                            @foreach ($articles_s as $article)
                            <article>
                                <figure class="date"><i class="fa fa-file-o"></i>{{$article->created_at}}</figure>
                                <header><a href="{{route('articles.show',$article->id)}}">{{$article->$title_atrr}}</a></header>
                            </article><!-- /article -->
                            @endforeach
                            <a href="{{route('articles.index')}}" class="read-more">{{__('static.all articles')}}</a>
                        </div><!-- /.section-content -->
                    </aside><!-- /.news-small -->
                    <aside id="archive">
                        <header>
                            <h2>{{__('static.events')}}</h2>
                            <ul class="list-links">
                                @foreach ($events as $event)
                                <li><a href="{{route('events.show', $event->id)}}">{{$event->$title_atrr}}</a></li>
                                @endforeach
                            </ul>
                            <div>
                                <a href="{{route('events.index')}}" class="read-more">{{__('static.all events')}}</a>
                            </div>
                        </header>
                    </aside><!-- /archive -->
                </div><!-- /#sidebar -->
            </div><!-- /.col-md-4 -->
            <!-- end SIDEBAR Content-->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
