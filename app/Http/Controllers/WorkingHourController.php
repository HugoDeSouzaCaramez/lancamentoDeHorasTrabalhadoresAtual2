<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHour;
use App\Models\Employer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class WorkingHourController extends Controller
{
    public function index()
    {
        $workingHours = WorkingHour::orderBy('date', 'desc')->paginate(10);

        foreach ($workingHours as $workingHour) {
            $workingHour->date = Carbon::parse($workingHour->date)->format('d-m-Y');
        }
        
        return view('working_hours.index', ['workingHours' => $workingHours]);
    }
    public function create()
    {
        $employers = Employer::all();
        return view('working_hours.create', compact('employers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employer_id' => 'required',
            'date' => 'required|date|unique:working_hours,date,NULL,id,employer_id,' . $request->employer_id,
            'hours_worked' => 'required|integer|min:0',
        ]);

        WorkingHour::create($request->all());

        return redirect()->route('working-hours.index')->with('success', 'Hora lançada com sucesso!');
    }

    public function edit($id)
    {
        $workingHour = WorkingHour::findOrFail($id);
        return view('working_hours.edit', compact('workingHour'));
    }

    public function update(Request $request, WorkingHour $workingHour)
    {
        $request->validate([
            'hours_worked' => 'required|integer|min:0',
            'date' => 'required|date',
        ]);

        $workingHour->update($request->all());

        return redirect()->route('working-hours.index')->with('success', 'Hora lançada com sucesso!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $dates = DB::table('working_hours')
                ->where(DB::raw('DATE_FORMAT(date, "%Y-%m-%d")'), 'LIKE', '%' . $query . '%')
                ->get();

        return response()->json($dates);
    }
}