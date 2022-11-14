<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CrudEvents;

class CalenderController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = CrudEvents::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);
             return response()->json($data);
        }
        return view('calender.calander');
    }

    public function calendarEvents(Request $request)
    {

        switch ($request->type) {
           case 'create':
              $event = CrudEvents::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

           case 'show':
              $event = array(
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
                  'id' => $request->id,
              );

              return response()->json($event);
             break;

             case 'edit':
              $event = CrudEvents::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

           default:
             # ...
             break;
        }
    }

    public function show(Request $request, $id)
    {
        $event = CrudEvents::where('id', $id)->first();

        return view('calender.show', compact('event'));
    }

    public function edit(Request $request, $id)
    {
        $event = CrudEvents::where('id', $id)->first();
        return view('calender.edit',compact('event'));
    }

    public function store(Request $request, $id)
    {
        CrudEvents::where('id', $id)->update([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        $event = CrudEvents::where('id', $id)->first();
        return view('calender.show',compact('event'));
    }

    public function destroy(Request $request, $id)
    {
        CrudEvents::where('id', $id)->delete();

        return redirect('calendar');
    }



}
