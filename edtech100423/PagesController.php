<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Page;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }    

    public function index()
    {
        $pages = Page::all();
        return view('backend.pages.pages.index', compact('pages'));
    }
    public function create()
    {
        return view('backend.pages.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',       
            'content' => 'required',
            'image' => 'required|max:10000|mimes:jpg,jpeg,png',
            'slug' => 'required|max:50',
        ]);

        $page = new Page;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/backend/assets/uploads'), $filename);
            $data['image'] = $filename;
         }

         $page->title = $request->title;    
         $page->status = $request->status;
         $page->content = $request->content;
         $page->image = $data['image'];
         $page->slug = $request->slug;
         $page->save();
        
        session()->flash('success', 'Page has been created !!');
        return redirect()->route('admin.pages.index');
    }

    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('service.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized to edit any role !');
        // }

        $page = Page::find($id);
        return view('backend.pages.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'title' => 'required|max:50',       
            'content' => 'required',
            'image' => 'required|max:10000|mimes:jpg,jpeg,png',
            'slug' => 'required|max:50',

        ]);

        $page = new Page;
        if($request->file('image')){
            $file = $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/backend/assets/uploads'), $filename);
            $data['image'] = $filename;
         }

        $update = Page::where('id','=',$id)->update(['title' => $request->title, 'status' =>  $request->status, 'content' =>  $request->content, 'image' => $data['image']]);

        session()->flash('success', 'Page has been updated !!');
        return back();
    }

    public function destroy($id)
    {
        // if (is_null($this->user) || !$this->user->can('service.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized to delete any role !');
        // }

        $page = Page::find($id);
        if (!is_null($page)) {
            $page->delete();
        }

        session()->flash('success', 'Page has been deleted !!');
        return back();
    }
}
