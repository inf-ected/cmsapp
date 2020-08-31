<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags= tag::orderby('id','desc')->paginate(5);
        return view('tagsPages.main', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new tag();
        // $page->published = 0;
        $title = 'Create New Tag';
        return view('tagsPages.ViewModel', compact('tag','title'));
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
            'name' => 'required|max:255',
        ]);
        tag::create($request->all());
        return redirect()->route('tag.index')->with('info', 'tag added!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $tag = tag::where($where)->first();
        $title='Edit Existing Tag';

        return view('tagsPages.ViewModel',compact('tag','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        tag::where('id',$id)->update([
            'name'=> request('name'),
        ]);

        return redirect()->route('tag.index')->with('info', 'tag updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tag::where('id',$id)->delete();

        return redirect()->route('tag.index')->with('info', 'tag deleted !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = tag::findOrFail($id);
        $title = 'Show Tag';
        return view('tagsPages.ViewModel', compact('tag', 'title'));
    }

}
