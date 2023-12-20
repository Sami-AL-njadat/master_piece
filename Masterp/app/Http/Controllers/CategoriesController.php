<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\reviwes;
use App\Models\User;
use App\Models\orders;
use App\Traits\ImageUploadTrait;
use App\DataTables\CategoryDataTable;
use App\Models\coupons;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

use function Pest\Laravel\get;

class CategoriesController extends Controller
{
    use ImageUploadTrait;


    // public function showProducts(Request $request, $id = null)
    // {
    //     $perPage = $request->input('per_page', 6);
    //     $allcategory = categories::orderBy('categoryName', 'ASC')->get();
    //     $counts = products::count();
    //     // $categoryes = Products::where('categoryName')->count();

    //     $category = categories::all();

    //     // Check if the request has filter parameters
    //     $minPrice = $request->input('min_price');
    //     $maxPrice = $request->input('max_price');

    //     $query = Products::query();

    //     // Apply price filter if values are provided
    //     if ($minPrice !== null && $maxPrice !== null) {
    //         $query->whereBetween('price', [$minPrice, $maxPrice]);
    //         session()->flash('success', 'parice change ');
    //     }

    //     // Apply category filter if $id is provided
    //     if ($id !== null) {
    //         $query->where('categoryId', $id);
    //     }

    //     $sort = $request->input('sort', 'az');

    //     if ($sort === 'az') {
    //         $query->orderBy('productName', 'asc');
    //     } elseif ($sort === 'za') {
    //         $query->orderBy('productName', 'desc');
    //     } elseif ($sort === 'high_price') {
    //         $query->orderBy('price', 'desc');
    //     } elseif ($sort === 'low_price') {
    //         $query->orderBy('price', 'asc');
    //     }

    //     $newproducts = products::orderBy('created_at', 'desc')->take(3)->get();

    //     $product = $query->paginate($perPage);

    //     return view('pagess.shop.shop', compact('product', 'counts', 'category', 'allcategory', 'newproducts'));
    // }


    public function showProducts(Request $request, $id = null)
    {
        $perPage = $request->input('per_page', 6);
        $allcategory = categories::orderBy('categoryName', 'ASC')->get();
        $counts = products::count();
        $counts = products::count();

        $category = categories::all();

        $maxPrices = products::max('price');
        $minPrices = products::min('price');

        // Check if the request has filter parameters
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $searchTerm = $request->input('search');

        $query = Products::query();

        // Apply price filter if values are provided
        if ($minPrice !== null && $maxPrice !== null) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
            session()->flash('success', 'Price changed');
        }

        // Apply category filter if $id is provided
        if ($id !== null) {
            $query->where('categoryId', $id);
        }

        // Apply search filter if search term is provided
        if ($searchTerm !== null) {
            $query->where('productName', 'LIKE', "%$searchTerm%");
        }

        $sort = $request->input('sort', 'az');

        if ($sort === 'az') {
            $query->orderBy('productName', 'asc');
        } elseif ($sort === 'za') {
            $query->orderBy('productName', 'desc');
        } elseif ($sort === 'high_price') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'low_price') {
            $query->orderBy('price', 'asc');
        }

        $newproducts = products::orderBy('created_at', 'desc')->take(3)->get();

        $product = $query->paginate($perPage);

        return  response()->view('pagess.shop.shop', compact('product', 'counts', 'category', 'allcategory', 'newproducts', 'id', 'minPrice', 'maxPrice', 'maxPrices', 'minPrices', 'searchTerm'));
    }


    // public function searchProducts(Request $request, $id = null)
    // {
    //     $query = $request->input('query');

    //     $products = products::where('productName', 'like', "%$query%")
    //     ->when($id, function ($query, $id) {
    //         return $query->where('categoryId', $id);
    //     })
    //         ->get();

    //     return response()->json(['products' => $products]);
    // }



    // function shopdetai(Request $request, $id=null)
    // {    $allcategory = categories::orderBy('categoryName', 'ASC')->get();



    //     if ($id!==null) {
    //         $product = Products::find($id);
    //     }else{
    //         $product = Products::all();

    //     }
    //     $reproduct = Products::where('categoryId', $product->categoryId)->inRandomOrder()->limit(4)->get();

    //     return view('pagess.shop.shopDetailes',compact('product' , 'allcategory' , 'reproduct'));
    //   }




    function shopdetai(Request $request, $id = null)
    {
        

        $allcategory = Categories::orderBy('categoryName', 'ASC')->get();

        if ($id !== null) {
            $product = products::find($id);
            $review = reviwes::where('productId', $id)->get();
      
            // Retrieve the category name of the selected product
            $selectedCategory = Categories::find($product->categoryId);

            $reproduct = Products::where('categoryId', $product->categoryId)
                ->inRandomOrder()->get();

            $user = auth()->user();
            $hasBeenBought = false;

            if ($user) {
                $userOrderItems = $user->orderItems;
                foreach ($userOrderItems as $orderItem) {
                    if ($orderItem->productId == $id) {
                        $hasBeenBought = true;
                        break;
                    }
                }
            }
            return view('pagess.shop.shopDetailes', compact('product', 'allcategory', 'reproduct', 'selectedCategory' ,"review", 'hasBeenBought'));
        } else {
            $product = products::all();
            $reproduct = products::inRandomOrder()->limit(4)->get();
            return view('pagess.shop.shopDetailes', compact('product', 'allcategory', 'reproduct'));
        }
    }





            
 
 
    
 


    public function checkout()
    {

        // session()->flash('success', 'Product successfully removed!');

        return view('pagess.shop.checkOut');
    }

    function indexCategory(CategoryDataTable $dataTable)
    {
        // $product= products::all();
        // dd($product[0]->Category->categoryName );
        return $dataTable->render('Admin.pages.category.index');
    }



    function index()
    {
        $firstCoupon = coupons::where('couponName', '!=', '')->first();

        $ordersCount = orders::whereNotNull('id')->count();
        $usersCount = User::whereNotNull('id')->count();
        $reviewCount = reviwes::whereNotNull('id')->count();
        $productsCount = products::whereNotNull('id')->count();
        $incomeCount = orders::sum('totalPrice');



        $reviews = reviwes::latest()->take(5)->get();

        // Create an empty array to store review data
        $data = [];

        // Loop through the reviews and retrieve user data for each review
        foreach ($reviews as $review) {
            $user = $review->user;

            $reviewData = [
                'name' => $user->name  ?? 'N/A',
                'image' => $user->image  ?? 'N/A',
                'review' => $review->review  ?? 'N/A',
                // 'rating' => $review->rating,
                // 'reason' => $review->reason,
            ];

            $data[] = $reviewData;
        }
        $categories = categories::all();
 



        $product = products::orderBy('created_at', 'desc')->take(4)->get();
        return view('pagess.home.home', compact('categories', 'product','data', 'reviewCount', 'productsCount', 'usersCount', 'incomeCount', "ordersCount" , 'firstCoupon'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('Admin.pages.category.create');
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
            'image' => ['required', 'image', 'max:4192'],
            'name' => ['required', 'max:20'],
            'description' => ['required', 'max:12000'],
        ]);

        $category = new categories();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $category->image =  $imagePath;
        $category->categoryName = $request->name;
        $category->description = e($request->description);
        $category->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('indexxxs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    // public function show(categories $categories)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = categories::findOrFail($id);

        return view('Admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['image', 'max:4192'],
            'name' => ['required', 'max:20'],
            'description' => ['required', 'max:12000'],
        ]);

        $category = categories::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads', $category->image);

        $category->image = empty(!$imagePath) ? $imagePath : $category->image;
        $category->categoryName = $request->name;
        $category->description = e($request->description);
                // $category->description = htmlspecialchars($request->description);

        // $category->image = $request->image;
        $category->save();

        toastr('Updated Successfully!', 'success');


        return redirect()->route('indexxxs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        products::where('categoryId', $id)->delete();

        $category = categories::findOrFail($id);
        $this->deleteImage($category->image);
        $category->delete();

       

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}

