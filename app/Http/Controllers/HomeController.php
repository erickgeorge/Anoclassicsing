<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\property;
use App\Models\propimage;
use App\Models\message;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;


use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function categories()
    {
        $categ = category::where('status',1)->get();
        return view('categories',['categ' => $categ]);
    }

    public function messages()
    {
        $message = message::get();
        return view('message',['message' => $message]);
    }


    public function delete_category($id)
    {
        $categ = category::where('id',$id)->first();
        $categ->status = 2;
        $categ->save();
        return redirect()->back()->with(['message' => 'Category Deleted' ]);
    }

    public function postmessage(request $request)
    {
        $message = new message();
        $message->name = $request['name'];
        $message->email = $request['email'];
        $message->message = $request['message'];
        $message->save();
        return redirect()->back()->with(['message' => 'Your Message Received Successifully. Thanks for contacting Us.' ]);
    }

    public function edit_category(request $request, $id)
    {
        $categ = category::where('id',$id)->first();
        $categ->name = $request['name'];
        $categ->save();
        return redirect()->back()->with(['message' => 'Category Edited' ]);
    }


    public function add_category()
    {
        return view('addcategory');
    }

    public function post_category(request $request)
    {
        $category = new category();
        $category->name = $request['name'];
        $category->save();
        return redirect()->route('categories')->with(['message' => 'New Category Added' ]);
    }


    public function properties()
    {
        $prop = property::where('status',1)->get();
        return view('properties',['prop' => $prop]);
    }

    public function add_property()
    {
        $categ = category::where('status',1)->get();
        return view('addproperty',['categ' => $categ]);
    }


    public function post_property(request $request)
    {
        $prop = new property();
        $prop->name = $request['name'];
        $prop->description = $request['desc'];
        $prop->size = $request['size'];
        $prop->rate = $request['rate'];
        $prop->price = $request['price'];
        $prop->quantity = $request['quantity'];
        $prop->color = $request['color'];
        $prop->category = $request['categ'];

       if ($request['coverphoto'] !='' ) {

        $this->validate($request, [
            'coverphoto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       $imageName = time().'.'.request()->coverphoto->getClientOriginalExtension();
       request()->coverphoto->move(('erick'), $imageName);
      }

        $prop->coverphoto = $imageName;
        $prop->save();
        return redirect()->route('properties')->with(['message' => 'New Property Added' ]);
    }

    public function delete_property($id)
    {
        $prop = property::where('id',$id)->first();
        $prop->delete();
        return redirect()->back()->with(['message' => 'Property Deleted' ]);
    }

    public function view_property($id)
    {
        $ids = Crypt::decrypt($id);
        $categ = category::where('status',1)->get();
        $vprop = property::where('id',$ids)->first();
        $picture = propimage::where('prop_id',$ids)->get();
        return view('viewprop',['prop' => $vprop , 'categ' => $categ , 'ids' => $ids , 'picture' => $picture]);
    }


    public function post_photo(request $request , $id)
    {
        $prop = new propimage();

       if ($request['coverphoto'] !='' ) {

        $this->validate($request, [
            'coverphoto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       $imageName = time().'.'.request()->coverphoto->getClientOriginalExtension();
       request()->coverphoto->move(('erick'), $imageName);
      }

        $prop->name = $imageName;
        $prop->prop_id = $id;
        $prop->save();
        return redirect()->back()->with(['message' => 'New Photo Added' ]);
    }


    public function delete_photo($id)
    {
        $image = propimage::where('id',$id)->first();
        $image->delete();
        return redirect()->back()->with(['message' => 'Image Deleted' ]);
    }


    public function post_edit_property(request $request , $id)
    {
        $prop = property::where('id',$id)->first();
        $prop->name = $request['name'];
        $prop->description = $request['desc'];
        $prop->size = $request['size'];
        $prop->rate = $request['rate'];
        $prop->price = $request['price'];
        $prop->quantity = $request['quantity'];
        $prop->color = $request['color'];
        $prop->category = $request['categ'];

       if ($request['coverphoto'] !='' ) {

        $this->validate($request, [
            'coverphoto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       $imageName = time().'.'.request()->coverphoto->getClientOriginalExtension();
       request()->coverphoto->move(('erick'), $imageName);
      }

        $prop->coverphoto = $imageName;
        $prop->save();
        return redirect()->back()->with(['message' => 'Property Edited' ]);
    }


}
