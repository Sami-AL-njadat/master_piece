<?php

namespace App\Http\Controllers;

use App\Models\Contactt;

use App\DataTables\messageDataTable;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\DataTables\MessagesDataTable;

use function Ramsey\Uuid\v1;

class ContactController extends Controller



{
    // public function shoow()
    // {

    //     return view('pagess.contact.contact');
    // }

    public function index(messageDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.messages.index');
    }


    public function showContact()
    {

        return view('pagess.contact.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contactt::create($request->all());



        toastr('Thank you for contacting us. We will contact you shortly.', 'success');


        return redirect()->route('show.contact');
    }

 


    public function destroy($id)
    {
        $admin = Contactt::findOrFail($id);
        $admin->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
