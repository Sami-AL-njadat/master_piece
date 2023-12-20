<?php

namespace App\Http\Controllers;

use App\DataTables\AdminsDataTable;
use App\Models\admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

use App\Traits\ImageUploadTrait;

class AdminsController extends Controller

{
    use ImageUploadTrait;




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     */


    public function indexs()
    {
        return view('Admin.dashboord');
    }



    public function index(AdminsDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'image' => ['required', 'image', 'max:4192'],
    //         'name' => ['required', 'max:20'],
    //         'email' => ['required', 'email'],
    //         'phone' => ['required', 'digits:10'],
    //         'password' => ['required'],
    //     ]);

    //     $admin = new admins();

    //     $imagePath = $this->uploadImage($request, 'image', 'uploads');

    //     $admin->image = $imagePath;
    //     $admin->name = $request->name;
    //     $admin->email = $request->email;
    //     $admin->phone = $request->phone;
    //     $admin->password = Hash::make($request->password);

    //     $admin->save();

    //     toastr('Admin Created Successfully', 'success');
    //     return redirect()->route('admins.index');
    // }



    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:4192'],
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', Rule::unique('admins')],
            'phone' => ['required', 'digits:10'],
            // 'password' => ['required'],
        ]);

        $admin = new admins();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $admin->image = $imagePath;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        // $admin->password = Hash::make($request->password);
        $admin->password = Hash::make("sami");

        try {
            $admin->save();
            toastr('Admin Created Successfully', 'success');
            return redirect()->route('admins.index');
        } catch (QueryException $e) {
            // Check if the exception is due to a unique constraint violation
            if ($e->errorInfo[1] == 1062) {
                toastr('Email already exists for admin', 'error');
                return redirect()->route('admins.index');
            } else {
                // Handle other database-related errors if needed
                toastr('Error saving admin', 'error');
                return redirect()->route('admins.index');
            }
        }
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


        if (session('loginId')) {
            // dd(session('admin_id'));
            // return 'hh';
            $id =  session('loginId');


            $admin = admins::find($id);

            // $name =  session('loginimage');
            //     dd($name);

            // dd($admin->name);
            return view('Admin.pages.profile.profile', ['admin' => $admin]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = admins::findOrFail($id);

        return view('Admin.pages.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['image', 'max:4192'],
            'name' => ['required', 'max:20'],
            'phone' => ['required', 'digits:10'],
        ]);

        $admin = admins::find($id);

        if (!$admin) {
            return redirect()->route('admins.index')->with('error', 'Admin not found');
        }

        // Check if the admin being updated is the same as the one currently logged in
        if ($admin->id !== session('loginId')) {
            return redirect()->route('admins.index')->with('error', 'Unauthorized');
        }

        // Update the admin's information
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request, 'image', 'uploads');
            $admin->image = $imagePath;
            session(['loginimage' => $imagePath]);
        }

        $admin->name = $request->name;
        session(['loginname' => $admin->name]);

        $admin->phone = $request->phone;

        $admin->save();

        toastr('Admin Updated Successfully', 'success');
        return redirect()->route('admins.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $admin = admins::findOrFail($id);
    //     $this->deleteImage($admin->image);
    //     $admin->delete();
    //     return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    // }

    public function destroy($id)
    {
         $admin = admins::find($id);
         // Check if the logged-in admin is authorized to delete
        if ($admin->id == session('loginId')) {
            // You can add additional conditions or logic if needed
            $this->deleteImage($admin->image);
            $admin->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } else {
            // return redirect()->route('admins.index')->with('error', 'Unauthorized');
            return response(['status' => 'error', 'message' => 'You Dont Have Unauthorized To Delete!']);

        }
    }






    






    public function resetPasswordPage()
    {
        return view('Admin.pages.profile.resetPassword');
    }



    public function resetPassword(Request $request)
    {

        $id =  session('loginId');


        $admin = admins::find($id);

        if (Hash::check($request->old_password, $admin->password)) {
            $admin->update([
                'password' => bcrypt($request->input('new_password'))
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Password updated successfully.');
        } else {
            return back()->with('fail', 'Old password is incorrect.');
        }
    }
}
