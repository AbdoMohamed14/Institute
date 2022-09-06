<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\HomeSlider;
use App\Models\Instructor;
use App\Models\Testimonial;
use Carbon\Carbon;

class HomeController extends Controller
{

    public static function event($month) {

            $date=explode("-", $month);
            $myDate = $date[2].'/'.$date[1].'/'.$date[0];
            $date1 = Carbon::createFromFormat('m/d/Y', $myDate);
            $monthName = $date1->format('F');
            $month= substr($monthName, 0, 3);

        return $month ;
    }
    public static function day($month) {

        $date=explode("-", $month);
            $day=$date[2];
        return $day ;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {   
        $galleries = Gallery::inRandomOrder()->limit(1)->get();
        $testmonials = Testimonial::all();
        $slides = HomeSlider::orderBy('order')->get();
        $events= Event::latest()->take(3)->get();
        $instructors = Instructor::latest()->take(2)->get();
        $articles = Article::latest()->take(3)->get();
        return view('frontend.home', compact('articles', 'instructors','events', 'galleries', 'testmonials', 'slides'));
    }

}
