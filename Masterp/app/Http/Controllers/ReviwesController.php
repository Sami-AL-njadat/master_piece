<?php

namespace App\Http\Controllers;

use App\Models\reviwes;
use App\Models\User;
use App\Models\admins;
use App\Models\products;
use App\Models\orders;
use Illuminate\Http\Request;
use App\DataTables\ReviewsDataTable;

class ReviwesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReviewsDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.review.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }



    // public function product($product_id)
    // {
    //     $product = product::where('id', $product_id)->first();

    //     $user = auth::user();
    //     $hasBeenBought = false;
    //     $Reviews = Review::where('product_id', $product_id)->get();
    //     if ($user) {
    //         foreach ($user->Order as $order) {
    //             foreach ($order->OrderItem as $item) {
    //                 if ($item->product_id == $product_id) {
    //                     $hasBeenBought = true;
    //                 }
    //             }
    //         }
    //     };
    //     $category = Category::where('id', $product->category_id)->first();
    //     return view('pages.single-product', compact('product', 'category', 'hasBeenBought', 'Reviews'));
    // }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $review = $request->all();
        $review['customerId'] = auth()->user()->id;
        $review['productId']  = $id;

        reviwes::create($review);
        session()->flash('success', 'review successfully added!');

        return redirect()->back();
    }







    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reviwes  $reviwes
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $ordersCount = orders::whereNotNull('id')->count();
        $usersCount = User::whereNotNull('id')->count();
        $reviewCount = reviwes::whereNotNull('id')->count();
        $productsCount = products::whereNotNull('id')->count();
        $incomeCount = orders::sum('totalPrice');






        // Get the last 3 reviews from the database
        $reviews = reviwes::latest()->take(5)->get();

        // Create an empty array to store review data
        $data = [];

        // Loop through the reviews and retrieve user data for each review
        foreach ($reviews as $review) {
            $user = $review->user;

            $reviewData = [
                'name' => $user->name,
                'image' => $user->image  ?? 'N/A',
                'review' => $review->review,
                // 'rating' => $review->rating,
                // 'reason' => $review->reason,
            ];

            $data[] = $reviewData;
        }

        // Return the "pagee.aboutus" view with the data
        return view('pagess.aboutUs.aboutus', compact('data', 'reviewCount', 'productsCount', 'usersCount', 'incomeCount', 'ordersCount'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reviwes  $reviwes
     * @return \Illuminate\Http\Response
     */
    public function edit(reviwes $reviwes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reviwes  $reviwes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reviwes $reviwes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reviwes  $reviwes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = reviwes::findOrFail($id);

        $review->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
