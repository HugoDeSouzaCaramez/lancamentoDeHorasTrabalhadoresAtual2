<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHour;
use App\Models\Employer;

class WorkingHourController extends Controller
{
    public function index()
    {
        $workingHours = WorkingHour::orderBy('date', 'desc')->paginate(10);
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
            'hours_worked' => 'required|integer',
        ]);

        WorkingHour::create($request->all());

            //return redirect()->back()->with('success', 'Horas trabalhadas cadastradas com sucesso!');
        return redirect()->route('working-hours.index');
    }

    public function edit($id)
    {
        $workingHour = WorkingHour::findOrFail($id);
        return view('working_hours.edit', compact('workingHour'));
    }

    public function update(Request $request, WorkingHour $workingHour)
    {
        $request->validate([
            'hours_worked' => 'required|integer',
            'date' => 'required|date',
        ]);

        $workingHour->update($request->all());

        return redirect()->route('working-hours.index')->with('success', 'Working hour updated successfully');
    }
}