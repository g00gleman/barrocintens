<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\productCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function getproduct()
    {
        $categories = productCategories::all();
        $products = products::all();
        return view('product.overzicht', compact('products','categories'));
    }

    public function gethomeproduct()
    {
        $categories = productCategories::all();
        $products = products::all();
        return view('product', compact('products','categories'));
    }

    public function getcreate()
    {
        $categories = productCategories::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);


        products::create([
            'name' => $request->input('name'),
            '+price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'category_id' => $request->input('selcategories'),
            'image_path' => $newImageName,
            
        ]);

        return redirect('/product/overzicht')
            ->with('message', 'Jouw post is gemaakt!');
    }

    public function show()
    {
        $url = URL::current();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $products = products::all()->where('id', $id)->first();
        return view('product.show', ['products' => $products]);
    }
    public function shows()
    {
        $url = URL::current();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $products = products::all()->where('id', $id)->first();
        return view('product.shows', ['products' => $products]);
    }

    public function getedit()
    {

            $url = URL::current();
            $parts = Explode('/', $url);
            $id = $parts[count($parts) - 1];

            $products = products::all()->where('id', $id)->first();

            return view('product.edit', ['products' => $products]);
        
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'brand' => 'required',
        ]);

            $url = URL::previous();
            $parts = Explode('/', $url);
            $id = $parts[count($parts) - 1];
            
            $products = products::all()->where('id', $id)->first();

            $products->name = $request->input('name');
            $products->description = $request->input('description');
            $products->price = $request->input('price');
            $products->brand = $request->input('brand');
            $products->save();
            return redirect('product/overzicht');
        
    }

    public function destroy($id)
    {
        $post = products::where('id', $id);
        $post->delete();

        return redirect('product/overzicht');
    }

    public function postcategory(Request $request)
    {
        $productCategories = new productCategories();
        $request->validate([
            'name' => 'required|min:3',
        ]);
        
        $productCategories->name = $request->input('name');
        $productCategories->is_employee_only = 0;
        $productCategories->save();

        $products = products::all();
        $categories = productCategories::all();
        return view('product.overzicht', compact('products','categories'));
        
    }
    public function destroycategory($id)
    {
        $post = productCategories::where('id', $id);
        $post->delete();
        $products = products::all();
        $categories = productCategories::all();

        return view('product.overzicht', compact('products','categories'));
    }
}