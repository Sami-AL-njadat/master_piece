<?php

namespace App\Http\Controllers;


use App\Models\admins;
use App\Models\categories;
use App\Models\orders;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use session;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Project;









class AdminLoginController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     // $this->middleware('custom_middleware')->except(['create', 'store']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('Admin.pages.login.loginAdmin');
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $admin = admins::where('email', $request->email)->first();

        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('loginId', $admin->id);
                session()->put('loginname', $admin->name);
                session()->put('loginimage', $admin->image);

                return redirect()->route('admin.dashboard');
            } else {
                return back()->with('fail', 'Password incorrect');
            }
        } else {
            return back()->with('fail', 'This email is not registered');
        }
    }


    public function dashboard()
    {
        $admin = array();

        if (Session::has('loginId')) {
            $admin = admins::where('id', Session::get('loginId'))->first();

            // Count the number of users
            $usersCount = User::whereNotNull('id')->count();
            // Count the number of admins
            $adminsCount = admins::whereNotNull('id')->count();
            $categoriesCount = categories::whereNotNull('id')->count();
            // Count the number of projects
            $productsCount = products::whereNotNull('id')->count();
            $ordersCount = orders::whereNotNull('id')->count();
            
            $incomeCount =orders::sum('totalPrice');

            $projects = products::whereNotNull('id')->get(); // Get all projects with a valid 'id'
            //  $budgetsArray = $projects->pluck('budget')->toArray();

            //  $totalBudget = array_sum($budgetsArray);
              return view('Admin.dashboord', compact('admin', 'usersCount', 'adminsCount','productsCount','incomeCount','categoriesCount', 'ordersCount'));
        }
    }




    // public function noe(Request $request, $id)
    // {

    //     // Find the user with the specified ID
    //     $admin = admins::find($id);

    //     if ($admin) {
    //         // Log out the user
    //         // Auth::guard()->logout();
    //         $this->guard()->logout();


    //         // Invalidate the session
    //         $request->session()->invalidate();

    //         // Redirect to the login page
    //         return $this->loggedOut($request) ?: redirect('admin/login');
    //     } else {
    //         // User with the specified ID not found, handle the error
    //         // You can return a response or redirect to an error page
    //         // Example:
    //         return redirect()->back()->with('error', 'User not found.');
    //     }
    // }

    // public function logout(Request $request)
    // {

    //     if (Session::has('loginId')) {
    //         session::pull('loginId');
    //         return redirect('admin/login');
    //     }
    // }


    public function logout(Request $request)
    {
        if (Session::has('loginId')) {
            Session::forget(['loginId', 'loginname', 'loginimage']);
        }

        return redirect()->route('admin.login');
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
