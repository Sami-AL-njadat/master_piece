<?php
 
namespace App\Http\Controllers;

use App\DataTables\EventTypeDataTable;
use App\DataTables\EventsDataTable;

use Illuminate\Http\Request;
use App\Models\events;
use App\Models\event_types;

class EventController extends Controller
{
    public function index(EventTypeDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.eventsTypes.index');
    }

   



    public function create()
    {

        return view('Admin.pages.eventsTypes.create');
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
             'name' => ['required', 'max:20'],
            'description' => ['required', 'max:12000'],
        ]);

        $eventsType = new event_types();



        $eventsType->name = $request->name;
        $eventsType->description = e($request->description);
        $eventsType->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('event.index');
    }


    public function edit($id)
    {
        $eventsType = event_types::findOrFail($id);

        return view('Admin.pages.eventsTypes.edit', compact('eventsType'));
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
             'name' => ['required', 'max:20'],
            'description' => ['required', 'max:12000'],
        ]);

        $eventsType = event_types::findOrFail($id);

        $eventsType->name = $request->name;
        $eventsType->description = e($request->description);
        // $category->description = htmlspecialchars($request->description);

        // $category->image = $request->image;
        $eventsType->save();

        toastr('Updated Successfully!', 'success');


        return redirect()->route('event.index');
    }








    public function destroy($id)
    {
        $event_types = event_types::findOrFail($id);
        $event_types->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }


    public function showevents(Request $request, $id = null)
    {
        $EventType = event_types::all();
        $Event = events::all();

        return view('pagess.events.event', compact('EventType', 'Event'));
    }

    public function detail(Request $request, $id = null)
    {
        if ($id !== null) {
            $Event = events::find($id);

            if ($Event) {
                $selecteEvent = event_types::find($Event->EventTypeId);

                return view('pagess.events.eventDetail', compact('Event', 'selecteEvent'));
            }
        }

        $Event = events::all();
        return view('pagess.events.eventDetail', compact('Event'));
    }
}
