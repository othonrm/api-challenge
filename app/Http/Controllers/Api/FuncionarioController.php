<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Funcionario;

use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();

        return response()->json($funcionarios);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nome' => ['required', 'string', 'max:255'],
            'sobrenome' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['required', 'date_format:d/m/Y','before: 6 years ago'],
            'sexo' => ['required', 'in:f,m', 'max:1'],
        ],[
            'data_nascimento.date_format' => "Data de nascimento não está no formato: dia/mês/ano ex.: 30/01/1990.",
            'data_nascimento.before' => "Data de nascimento deve ser anterior a hoje e maior que 6 anos.",
        ]);

        if ($validate->fails())
        {
            return response()->json([
                "error" => true,
                "message" => $validate->errors()
            ], 500);
        }

        $request['data_nascimento'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');

        $funcionario = new Funcionario();

        $funcionario->fill($request->all());

        $funcionario->save();

        return response()->json($funcionario, 201);
    }

    public function show($id)
    {
        $funcionario = Funcionario::find($id);

        if(!$funcionario)
        {
            return response()->json([
                'message'   => 'Funcionário não encontrado!',
            ], 404);
        }

        return response()->json($funcionario);
    }

    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);

        if(!$funcionario)
        {
            return response()->json([
                'message'   => 'Funcionário não encontrado!',
            ], 404);
        }

        $funcionario->fill($request->all());

        $funcionario->save();

        return response()->json($funcionario);
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);

        if(!$funcionario)
        {
            return response()->json([
                'message'   => 'Funcionário não encontrado!',
            ], 404);
        }

        $funcionario->delete();
    }
}
