<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Feature;
use App\Models\Page;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $feature;
    private $about;
    private $page;
    private $testimonial;
    public function __construct(Feature $feature, About $about, Page $page, Testimonial $testimonial)
    {
        $this->feature = $feature;
        $this->about = $about;
        $this->testimonial = $testimonial;
        $this->page = $page;
        // dd($about->description);
    }
    public function index()
    {
        $features = $this->feature->all();
        $abouts = $this->about->all();
        $about_page = $this->page->where('identifier', 'about')->first();

        $testimonials = $this->testimonial->all();
        return view('front.pages.about', compact('features', 'abouts', 'about_page', 'testimonials'));
    }
}
