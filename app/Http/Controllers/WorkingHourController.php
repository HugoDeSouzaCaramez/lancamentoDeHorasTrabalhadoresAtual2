<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHour;
use App\Models\Employer;

class WorkingHourController extends Controller
{
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
        $employers = Employer::all();
        return view('employers.index', compact('employers'));
    }
}