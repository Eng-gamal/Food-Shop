<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\ContactRequest;
use App\Http\Requests\front\SubscribeRequest;
use App\Mail\ContactMail;
use App\Mail\ReplyMail;
use App\Models\About;
use App\Models\ContactUs;
use App\Models\Feature;
use App\Models\NewsLetter;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Testimonial;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;

class HomeController extends Controller
{
    private $slider;
    private $feature;
    private $testimonial;
    private $about;
    private $page;
    private $product;

    public function __construct(Slider $slider, Feature $feature, Testimonial $testimonial, About $about, Page $page, Product $product)
    {
        $this->slider = $slider;
        $this->feature = $feature;
        $this->testimonial = $testimonial;
        $this->about = $about;
        $this->page = $page;
        $this->product = $product;
    }
    public function index()
    {
        $sliders = $this->slider->all();
        $features = $this->feature->all();
        $testimonials = $this->testimonial->all();
        $abouts = $this->about->all();
        $about_page = $this->page->where('identifier', 'about')->first();
        $products = $this->product->take(6)->get();
        return view('front.index', compact('sliders', 'features', 'testimonials', 'abouts', 'about_page', 'products'));
    }

    public function contactUs()
    {
        return view('front.pages.contact');
    }
    public function sendMail(ContactRequest $request)
    {

        try {


            $contact = ContactUs::create($request->only('name', 'lastname', 'email', 'phone', 'message'));
            $request_data = $request->only(['name', 'message']);


            Mail::to(settings()->contact_email)->send(new ContactMail($contact));

            Mail::to($request->email)->send(new ReplyMail($request_data));



            return back()->with('success', 'message.sent_successfully');
        } catch (Exception $e) {

            return back()->with('error', 'message.something_wrong');
        }

    }

    public function newsLetters(SubscribeRequest $request)
    {
        $exists = NewsLetter::where('email', $request->email)->exists();

        if ($exists) {

            return back()->with('error', 'message.something_wrong');

        }

        NewsLetter::create([
            'email' => $request->email,
        ]);
        return back()->with('success', 'message.subscribe_successfully');

    }

    public function offers()
    {
        $product = Product::whereHas('offer')->with('offer')->first();
        

        return view('front.index', compact('product'));
    }
}



