<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\events;
use App\Models\event_types;
use App\DataTables\EventsDataTable;
use App\Traits\ImageUploadTrait;


class EventesController extends Controller
{
    use ImageUploadTrait;

    public function index(EventsDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.event.index');
    }




    public function create()
    {
        $event = event_types::all();
        return view('Admin.pages.event.create', compact('event'));
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
            'EventTypeId' => ['required',],
            'name' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'clientRequest' => ['required', 'max:1000'],
            'idea' => ['required', 'max:1000'],
            'aboutProject' => ['required', 'max:1000'],
            'image1' => ['required', 'image', 'max:4192'],
            'image2' => ['required', 'image', 'max:4192'],
            'image3' => ['required', 'image', 'max:4192'],
            'beginning' => ['required', 'date'],
            'ending' => ['required', 'date', 'after_or_equal:beginning'],
            'clientName' => ['required', 'max:255'],
            'contractValue' => ['required', 'numeric', 'min:0'],
        ]);

        // Handle image uploads and save the product
        $events = new events();

        $events->fill($request->only([
            'EventTypeId',
            'name',
            'title',
            'clientRequest',
            'idea',
            'aboutProject',
            'beginning',
            'ending',
            'clientName',
            'contractValue',
        ]));

        // Handle image uploads and save image paths
        $events->image1 = $this->uploadImage($request, 'image1', 'uploads');
        $events->image2 = $this->uploadImage($request, 'image2', 'uploads');
        $events->image3 = $this->uploadImage($request, 'image3', 'uploads');

        $events->save();

        toastr('Product Created Successfully!', 'success');

        return redirect()->route('eventes.index');
    }





    public function edit($id)
    {
        $eventTypes = event_types::all();
        $event = events::findOrFail($id);
        return view('Admin.pages.event.edit', compact('event', 'eventTypes'));
    }








    public function update(Request $request, $id)
    {
        $request->validate([
            'EventTypeId' => ['required', 'integer'],
            'name' => ['required', 'max:255'],
            'title' => ['max:255'],
            'clientRequest' => ['max:1000'],
            'aboutProject' => ['max:1000'],
            'idea' => ['max:1000'],
            'beginning' => ['required', 'date'],
            'ending' => ['required', 'date', 'after_or_equal:beginning'],
            'clientName' => ['max:255'],
            'contractValue' => ['numeric', 'min:0'],
            'image1' => ['image', 'max:4192'], // Validate the image file
            'image2' => ['image', 'max:4192'], // Validate the image file
            'image3' => ['image', 'max:4192'], // Validate the image file
        ]);

        $event = events::findOrFail($id);

        // Update the event properties
        $event->EventTypeId = $request->input('EventTypeId');
        $event->name = $request->input('name');
        $event->title = $request->input('title');
        $event->clientRequest = $request->input('clientRequest');
        $event->aboutProject = $request->input('aboutProject');
        $event->idea = $request->input('idea');
        $event->beginning = $request->input('beginning');
        $event->ending = $request->input('ending');
        $event->clientName = $request->input('clientName');
        $event->contractValue = $request->input('contractValue');

        // Update image1 if a new image is provided
        if ($request->hasFile('image1')) {
            $image1Path = $this->uploadImage($request, 'image1', 'event_images');
            $this->deleteImage($event->image1);
            $event->image1 = $image1Path;
        }

        // Update image2 if a new image is provided
        if ($request->hasFile('image2')) {
            $image2Path = $this->uploadImage($request, 'image2', 'event_images');
            $this->deleteImage($event->image2);
            $event->image2 = $image2Path;
        }

        // Update image3 if a new image is provided
        if ($request->hasFile('image3')) {
            $image3Path = $this->uploadImage($request, 'image3', 'event_images');
            $this->deleteImage($event->image3);
            $event->image3 = $image3Path;
        }

        $event->save();

        toastr('Updated Successfully!', 'success');

        return redirect()->route('eventes.index'); // Assuming you have an index route for events


    }



    public function destroy($id)

    {


        $events = events::findOrFail($id);
        $events->delete();
        $this->deleteImage($events->image1, $events->image2, $events->image3);

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }




    public function show($id)
    {
        $event = events::findOrFail($id);



        return view('Admin.pages.event.show', compact('event'));
    }
}
