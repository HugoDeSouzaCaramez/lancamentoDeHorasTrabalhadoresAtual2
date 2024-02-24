<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    // Mostra a lista de colaboradores
    public function index()
    {
         $employers = Employer::all();
         return view('employers.index', compact('employers'));
        // Aqui você pode adicionar a lógica necessária para buscar dados da tela principal, se necessário
        // Por exemplo:
        // $data = AlgumModelo::all();

        // Em seguida, você pode passar esses dados para a view e retornar a view
        // return view('nome_da_sua_view', compact('data'));

        //return view('home'); // Supondo que sua view principal se chama "home.blade.php"
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
        $employers = Employer::all();
        return view('employers.index', compact('employers'));
    }

    // Mostra os detalhes de um colaborador específico
    public function show(Employer $employer)
    {
        return view('employers.show', compact('employer'));
    }

    // Mostra o formulário para editar um colaborador
    public function edit(Employer $employer)
    {
        return view('employers.edit', compact('employer'));
    }

    // Atualiza um colaborador no banco de dados
    public function update(Request $request, Employer $employer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employers,email,' . $employer->id,
        ]);

        $employer->update($request->all());
        return redirect()->route('employers.index');
    }

    // Remove um colaborador do banco de dados
    public function destroy(Employer $employer)
    {
        $employer->delete();
        return redirect()->route('employers.index');
    }

    // Lança o horário de entrada do colaborador
    public function checkIn(Employer $employer)
    {
        $employer->last_check_in = now();
        $employer->save();
        return redirect()->back();
    }

    // Lança o horário de saída do colaborador
    public function checkOut(Employer $employer)
    {
        $employer->last_check_out = now();
        $employer->save();
        return redirect()->back();
    }
}