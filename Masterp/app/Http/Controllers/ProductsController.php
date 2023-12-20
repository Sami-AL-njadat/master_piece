<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use App\Models\categories;
use App\DataTables\ProductDataTable;
use App\Models\carts;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\File; 


class ProductsController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all();
         return view('Admin.pages.product.create', compact('categories'));

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
            'name' => ['required', 'max:255'],
            'Sdescription' => ['required', 'max:22000'],
            'Ldescription' => ['required', 'max:22000'],
            'price' => ['required', 'min:0', 'max:500'],
            'stockqty' => ['required','min:0', 'max:500'],
            'status' => ['string'], // Assuming status can be 0 or 1
            'categoryId' => ['required', 'integer'],
            'image1' => ['required','image', 'max:4192'],
            'image2' => ['required', 'image', 'max:4192'],
            'image3' => ['required', 'image', 'max:4192'],
        ]);

        // Handle image uploads and save the product
        $product = new Products();

        $product->productName = $request->name;
        $product->Sdescription = $request->Sdescription;
        $product->Ldescription = $request->Ldescription;
        $product->price = $request->price;
        $product->stockqty = $request->stockqty;
        $product->status = $request->status;
        $product->categoryId = $request->categoryId;

        // Handle image uploads and save image paths
        $product->image1 = $this->uploadImage($request, 'image1', 'uploads');
        $product->image2 = $this->uploadImage($request, 'image2', 'uploads');
        $product->image3 = $this->uploadImage($request, 'image3', 'uploads');

        $product->save();

        toastr('Product Created Successfully!', 'success');

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = products::findOrFail($id);
        return view('Admin.pages.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = products::findOrFail($id);

        $categories = categories::all();
 
        return view('Admin.pages.product.edit', compact('product', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'Sdescription' => ['required', 'max:22000'],
            'Ldescription' => ['required', 'max:22000'],
            'price' => ['required', 'numeric', 'min:0'],
            'stockqty' => ['required', 'integer', 'min:0'],
            'status' => ['required','string'], // Assuming status can be 0 or 1
            'categoryId' => ['required', 'integer'],
            'image1' => ['image', 'max:4192'], // Validate the image file
            'image2' => ['image', 'max:4192'], // Validate the image file
            'image3' => ['image', 'max:4192'], // Validate the image file
        ]);

        $product = products::findOrFail($id);

        // Update the product properties
        $product->productName = $request->input('name');
        $product->Sdescription = $request->input('Sdescription');
        $product->Ldescription = $request->input('Ldescription');
        $product->price = $request->input('price');
        $product->stockqty = $request->input('stockqty');
        $product->status = $request->input('status');
        $product->categoryId = $request->input('categoryId');

        // Update image1 if a new image is provided
        if ($request->hasFile('image1')) {
            $image1Path = $this->uploadImage($request, 'image1', 'uploads');
            $this->deleteImage($product->image1);
            $product->image1 = $image1Path;
        }

        // Update image2 if a new image is provided
        if ($request->hasFile('image2')) {
            $image2Path = $this->uploadImage($request, 'image2', 'uploads');
            $this->deleteImage($product->image2);
            $product->image2 = $image2Path;
        }

        // Update image3 if a new image is provided
        if ($request->hasFile('image3')) {
            $image3Path = $this->uploadImage($request, 'image3', 'uploads');
            $this->deleteImage($product->image3);
            $product->image3 = $image3Path;
        }

        $product->save();

        toastr('Updated Successfully!', 'success');

        return redirect()->route('product.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        carts::where('productId', $id)->delete();


        $product = products::findOrFail($id);
        $product->delete();
        $this->deleteImage($product->image1, $product->image2, $product->image3);

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }


  



}
