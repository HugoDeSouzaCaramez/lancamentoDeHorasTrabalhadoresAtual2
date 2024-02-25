<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::orderBy('name', 'asc')->paginate(10);;
        return view('employers.index', ['employers' => $employers]);
    }

    public function create()
    {
        return view('employers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employers',
            'cpf' => 'required|unique:employers|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            'birth_date' => 'required|date',
        ]);

        Employer::create($request->all());

        return redirect()->route('home')->with('success', 'Colaborador cadastrado com sucesso!');
    }

    public function show(Employer $employer)
    {
        return view('employers.show', compact('employer'));
    }

    public function edit($id)
    {
        $employer = Employer::findOrFail($id);
        return view('employers.edit', compact('employer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cpf' => 'required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            'birth_date' => 'required|date',
        ]);

        $employer = Employer::findOrFail($id);

        if ($request->cpf !== $employer->cpf) {
            $request->validate([
                'cpf' => 'unique:employers,cpf',
            ]);
        }

        $employer->update($request->all());

        return redirect()->route('home')->with('success', 'Colaborador atualizado com sucesso!');;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $employers = Employer::where('name', 'like', "%$query%")->get();

        return response()->json($employers);
    }
}