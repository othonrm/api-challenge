<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Funcionario;

class RelatorioController extends Controller
{
    public function index()
    {
        try
        {
            $contagem_masculino = Funcionario::where('sexo', '=', 'm')->count();

            $contagem_feminino = Funcionario::where('sexo', '=', 'f')->count();

            $idade_media = intval(number_format(Funcionario::get('data_nascimento')->avg('idade'), 0));

            $idade_mais_velha = Funcionario::get()->sortBy('idade')->first()->idade;

            $idade_mais_nova = Funcionario::get('data_nascimento')->sortByDesc('idade')->first()->idade;

            return response()->json([
                "message" => "Relatórios retornados com sucesso!",
                "contagem_funcionarios" => [
                    "masculino" => $contagem_masculino,
                    "feminino" => $contagem_feminino
                ],
                "idade_media" => $idade_media,
                "idade_mais_velha" => $idade_mais_velha,
                "idade_mais_nova" => $idade_mais_nova,
                "error" => false,
            ], 200);
        }
        catch (\Exception $exception)
        {
            return response()->json([
                "error" => true,
                "message" => $exception->getMessage()
            ], 500);
        }
    }
}
