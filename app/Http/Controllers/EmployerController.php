<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    // Mostra a lista de colaboradores
    public function index()
    {
        $employers = Employer::orderBy('name', 'asc')->paginate(10);;
        return view('employers.index', ['employers' => $employers]);
    }

    // Mostra o formulário para criar um novo colaborador
    public function create()
    {
        return view('employers.create');
    }

    // Salva um novo colaborador no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employers',
        ]);

        Employer::create($request->all());

        return redirect()->route('home')->with('success', 'Colaborador cadastrado com sucesso!');
    }

    // Mostra os detalhes de um colaborador específico
    public function show(Employer $employer)
    {
        return view('employers.show', compact('employer'));
    }

    // Mostra o formulário para editar um colaborador
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
        ]);

        $employer = Employer::findOrFail($id);
        $employer->update($request->all());

        //return redirect()->route('employers.index')->with('success', 'Employer atualizado com sucesso!');
        return redirect()->route('home')->with('success', 'Colaborador atualizado com sucesso!');;
    }

    // Remove um colaborador do banco de dados
    public function destroy(Employer $employer)
    {
        $employer->delete();
        return redirect()->route('home');
    }
}