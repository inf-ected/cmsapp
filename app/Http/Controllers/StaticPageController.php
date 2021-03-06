<?php

namespace App\Http\Controllers;

use App\static_page;
use App\tag;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //самый простой способ
        // $pages = static_page::all();
        // способ с сортировокой
        // $pages = static_page::orderBy('id','desc')-get();
        // способ с пагинацией
        // $pages = static_page::orderBy('id','desc')-paginate(5);
        
        $pages= static_page::orderby('id','desc')->paginate(5);

        return view('staticPages.main', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page = new static_page();
        $page->published = 0;
        $title = 'Create New Static Page';
        $all_tags = tag::all()->pluck('name','id');

        return view('staticPages.ViewModel', compact('page','title','all_tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'content' => 'required',
            'published' => 'required'
        ]);

        // static_page::create([
        //     'title'=> $request->input('title'),
        //     'url'=>$request->input('url'),
        //     'content'=> $request->input('content'),
        //     'published'=> $request->input('published')
        // ]);
        static_page::create($request->all());

        return redirect()->route('stpage.index')->with('info', 'page added!');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\static_page  $static_page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //
        $where = array('id' => $id);
        $page = static_page::where($where)->first();
        $title='Edit Existing Page';
        $all_tags = tag::all()->pluck('name','id');

        return view('staticPages.ViewModel',compact('page','title','all_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\static_page  $static_page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->tags);

        //
        $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'content' => 'required',
            'published' => 'required'
        ]);
        static_page::where('id',$id)->update([
            'title'=> request('title'),
            'url' => request('url'),
            'content' => request('content'),
            'published' =>request('published') 
        ]);

        // $page=static_page::where('id',$id)->get(); //dd($page);
        // foreach($request->tags as $tagId){
        //     dump($tagId);
        //      $tag=tag::findOrFail($tagId);
        //     dump($tag);
        //     // $tag = new Tag([
        //     //     'id'=>$tagKey,
        //     //     'name'=>$tagName
        //     // ]);
        //     //  $page->tags()->attach($tag);
        // }
            

        // $page->tags()->update([
        //     $request->tags
        // ]);
           // dd($request->tags);
        //    dd($page->tags());
        //    dd($request->input('tags'));
        //dd($request->tags);
            $tagArr=[];// = new array();
        foreach($request->tags as $tagId){
            $tagArr[$tagId]=array( 'content_type' => static_page::class );
        }

         $page=static_page::findOrFail($id);
         //$page->tags()->sync((array)$request->input('tags'));
         $page->tags()->sync($tagArr);

            // $page->tags()->sync((array)$request->input('tags'));//,['content_type'=>static_page::class]);
            // dd(' ');
        return redirect()->route('stpage.index')->with('info', 'page updated !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\static_page  $static_page
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {

        $page = static_page::findOrFail($id);
        $title = 'Show Page';
         //dd($page->tags);
        // dd(static_page::class, tag::class);
        $all_tags = tag::all()->pluck('name','id');
        return view('staticPages.ViewModel', compact('page', 'title','all_tags'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\static_page  $static_page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // static_page::where('id',$id)->delete();


        return redirect()->route('stpage.index')->with('info', 'page deleted !');

    }

}
