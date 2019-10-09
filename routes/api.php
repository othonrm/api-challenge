<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return "API Challenge Home";
});

Route::apiResource('funcionarios', 'Api\FuncionarioController');

Route::get('relatorios', 'Api\RelatorioController@index');
