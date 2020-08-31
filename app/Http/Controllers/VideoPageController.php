<?php

namespace App\Http\Controllers;

use App\video_page;
use Illuminate\Http\Request;

class VideoPageController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pages= video_page::orderby('id','desc')->paginate(5);
        return view('videoPages.main', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new video_page();
        $page->published = 0;
        $title = 'Create New Video Page';
        return view('videoPages.ViewModel', compact('page','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'description' => 'required',
            'published' => 'required'
        ]);
        video_page::create($request->all());
        return redirect()->route('videopage.index')->with('info', 'page added!');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\video_page  $video_page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $page = video_page::where($where)->first();
        $title='Edit Existing Video Page';
        return view('videoPages.ViewModel',compact('page','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\video_page  $video_page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'description' => 'required',
            'published' => 'required'
        ]);
        video_page::where('id',$id)->update([
            'title'=> request('title'),
            'url' => request('url'),
            'description' => request('description'),
            'published' =>request('published') 
        ]);
        return redirect()->route('videopage.index')->with('info', 'page updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\video_page  $video_page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        video_page::where('id',$id)->delete();
        return redirect()->route('videopage.index')->with('info', 'page deleted !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\video_page  $video_page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = video_page::findOrFail($id);
        $title = 'Show Video Page';
        return view('videoPages.ViewModel', compact('page', 'title'));
    }
}
