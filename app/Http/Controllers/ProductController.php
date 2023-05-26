<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',['categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //lưu vào database
        if ($request->hasFile('imageProduct')) {
            $img = $request->file('imageProduct');
            $path = public_path('image');
            $fileName = time() . '_' . $img->getClientOriginalName();
            $img->move($path, $fileName);
        } else {
            $fileName = 'noname.jpg';
        }
        if ($request->hasFile('audioProduct')) {
            $audio = $request->file('audioProduct');
            $path = public_path('audio');
            $fileAudio = time() . '_' . $audio->getClientOriginalName();
            $audio->move($path, $fileAudio);
        }
        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        $newProduct->image = $fileName;
        $newProduct->audio = $fileAudio;
        $newProduct->category_id = $request->category;
        $newProduct->singer = $request->singer;
        $newProduct->save();
        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
