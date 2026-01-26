<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Info;
use App\Models\Job;
use App\Models\Like;
use App\Models\Location;
use App\Models\Message;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::with('media')
            ->orderBy('id', 'desc') // الترتيب من الأخير للأول
            ->take(8)
            ->get();
        $jobs=Job::with('media')->get() ;
        $partners=Partner::with('media')->get();
        $likes=Like::with('product.media')->get();
        $categories=Category::all();
        $banner=Info::where('type',1)->get();
        $we=Info::where('type',2)->with('media')->first();
        $whereWe=Info::with('media')->where('type',3)->first();
        $branches=Location::with('media')->get();
        $services=Service::with('media')->get();
        $messages=Message::where('approved',1)->get();


        return view('welcome',[
            'categories'=>$categories
            ,'jobs'=>$jobs
            ,'partners'=>$partners
            ,'banner'=>$banner
            ,'we'=>$we
            ,'whereWe'=>$whereWe
            ,'likes'=>$likes
            ,'branches'=>$branches
            ,'products'=>$products
            ,'services'=>$services
            ,'messages'=>$messages
        ]);
    }

    public  function addMessage(Request $request)
    {
        $validated = $request->validate([
            'email'   => 'nullable',
            'content' => 'required|string|max:5000',
            'sender' => 'nullable|string|max:5000',
        ]);
        Message::create($validated);
        return redirect()->back()->with('success', 'تم إرسال الرسالة بنجاح ✅');
    }
    public function tester()
    {
        return view('tester');
    }
}
