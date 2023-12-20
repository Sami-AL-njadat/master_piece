<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\carts;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageUploadTrait;
use App\Rules\StartsWithZero;

use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;


class UsersController extends Controller
{
    use ImageUploadTrait;

    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.users.create');
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
            'name' => ['required', 'max:40'],
            'email' => ['required', 'email', Rule::unique('users')],
            'phone' => ['required', 'digits:10', new StartsWithZero],
        ]);

        $users = new User();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $users->name = $request->name;
        $users->email = $request->email;
        $users->image = $imagePath;
        $users->phone = $request->phone;
        $users->password = Hash::make('password');

        try {
            $users->save();
            toastr('Updated Successfully', 'success');
            return redirect()->route('users.index');
        } catch (QueryException $e) {
            // Check if the exception is due to a unique constraint violation
            if ($e->errorInfo[1] == 1062) {
                toastr('Email already exists', 'error');
                return redirect()->route('users.index');
            } else {
                // Handle other database-related errors if needed
                toastr('Error saving user', 'error');
                return redirect()->route('users.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(user $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('Admin.pages.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {

    //     $request->validate([
    //         'image' => ['image', 'max:4192'],
    //         'name' => ['required', 'max:20'],
    //         'email' => ['required', 'email'],
    //         'phone' => ['required', 'digits:10'],

    //     ]);

    //     $users =  User::findOrFail($id)->first();
    //     $users->name = $request->name;
    //     $users->email = $request->email;
    //     $users->save();
    //     return redirect()->route('users.index');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['image', 'max:4192'],
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'digits:10', new StartsWithZero],
  
        ]);

        // Check if the admin with the given email already exists
        $users = User::where('id', $id)->first();

        // If an users with the email exists, it's an update; otherwise, create a new users
        if ($users) {
            // Perform update
            if ($request->hasFile('image')) {
                // Update image if a new one is provided
                $imagePath = $this->uploadImage($request, 'image', 'uploads');
                $users->image = $imagePath;
            }

            $users->name = $request->name;
            $users->phone = $request->phone;

            // You can update the password if needed
            // $admin->password = Hash::make($request->password);
        } else {
            // Perform create
            $imagePath = $this->uploadImage($request, 'image', 'uploads');

            $users = new User();
            $users->image = $imagePath;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phone = $request->phone;
        }

        $users->save();

        toastr('users' . ($users ? 'Updated' : 'Created') . ' Successfully', 'success');
        return redirect()->route('users.index');
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        carts::where('customerId', $id)->delete();

        $users = User::findOrFail($id);
        if ($users->image >= 1)
            $this->deleteImage($users->image);
        $users->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
