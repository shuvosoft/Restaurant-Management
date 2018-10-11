<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $categoris = Category::all();
        return view('admin.category.index', compact('categoris'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        return view('admin.category.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
//        return $request->all();
        $this->validate($request,[
            'name' => 'required'
        ]);
        $categoris = new Category();
        $categoris->name = $request->name;
        $categoris->slug = str_slug($request->name);
        $categoris->save();
        return redirect()->route('category.index')->with('successMsg','Slider Successfully Saved');


    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function show($id)
    {
        //
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function edit($id)
    {
//        $slider = Category::find($id);
//       return $slider;
        $categori = Category::find($id);

        return view('admin.category.edit',compact('categori'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request, $id)
    {
       $this->validate($request,[
           'name' => 'required'

       ]) ;
       $categoris = Category::find($id);
       $categoris->name= $request->name;
       $categoris->slug= str_slug($request->name);
       $categoris->save();
        return redirect()->route('category.index')->with('successMsg','Slider Successfully Updated');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        Category::find($id)->delete();
            return redirect()->back()->with('successMsg','Category Successfully Delete');
;    }
}
