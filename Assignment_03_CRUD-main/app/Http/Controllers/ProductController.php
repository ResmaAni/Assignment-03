<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Product;
use Storage;
use File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('product_id', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('price', 'like', "%$search%");
        }

        if ($request->has('sort')) {
            $query->orderBy($request->input('sort'), $request->input('direction', 'asc'));
        }

        
        $products = $query->paginate(5);
        return view('products.index', compact('products'));
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'image' => 'nullable|image',
                'description' => 'string',
                'stock' => 'numeric|nullable',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                
                $imagepath = $request->file('image')->store('products', 'public');

                
            } else {
                $imagepath = null;
            }

          
            Product::create([
                'product_id' => $request->product_id,
                'name' => $request->name,
                'price' => $request->price,
                'image' => $imagepath,  
                'description' => $request->description,
                'stock'=>$request->stock,
            ]);

            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show($id)
    {
        // Show a particular product by id
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        // Perform edit
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'description' => 'string',
            'stock'=>'nullable|numeric',
        ]);

        $updateData = $request->only(['name', 'price', 'image','description', 'stock']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagepath = $request->file('image')->store('products', 'public');
            if($product->image){
                Storage::disk('public')->delete('products/' . $product->image);
            }
            $updateData['image'] = $imagepath;

            
        } else {
            $imagepath = null;
        }

        // Update the product
        $product->update($updateData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the image file if it exists
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
