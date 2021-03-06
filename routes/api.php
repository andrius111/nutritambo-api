<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Cadastro e login
Route::post('login', 'LoginController@login');
Route::post('user', 'UserController@store');

Route::group(['middleware' => 'auth.jwt'], function () {
    // Logout
    Route::get('logout', 'LoginController@logout');

    // Dados do usuario
    Route::get('user', 'UserController@show');

    // UF
    Route::get('ufs', 'UfController@index');
    Route::get('ufs/{uf}', 'UfController@show');
    Route::post('ufs', 'UfController@store');
    Route::put('ufs/{uf}', 'UfController@update');
    Route::delete('ufs/{uf}', 'UfController@destroy');

    // Cidade
    Route::get('cidades', 'CidadeController@index');
    Route::get('cidades/{cidade}', 'CidadeController@show');
    Route::post('cidades', 'CidadeController@store');
    Route::put('cidades/{cidade}', 'CidadeController@update');
    Route::delete('cidades/{cidade}', 'CidadeController@destroy');

    // Atividade
    Route::get('atividades', 'AtividadeController@index');
    Route::get('atividades/{atividade}', 'AtividadeController@show');
    Route::post('atividades', 'AtividadeController@store');
    Route::put('atividades/{atividade}', 'AtividadeController@update');
    Route::delete('atividades/{atividade}', 'AtividadeController@destroy');

    // Fornecedor
    Route::get('fornecedores', 'FornecedorController@index');
    Route::get('fornecedores/{fornecedor}', 'FornecedorController@show');
    Route::post('fornecedores', 'FornecedorController@store');
    Route::put('fornecedores/{fornecedor}', 'FornecedorController@update');
    Route::delete('fornecedores/{fornecedor}', 'FornecedorController@destroy');

    // Fornecedor Contato
    Route::get('fornecedores/{cdPessoa}/contatos', 'PessoaContatoController@index');
    Route::get('fornecedores/{cdPessoa}/contatos/{cdContato}', 'PessoaContatoController@show');
    Route::post('fornecedores/{cdPessoa}/contatos', 'PessoaContatoController@store');
    Route::put('fornecedores/{cdPessoa}/contatos/{cdContato}', 'PessoaContatoController@update');
    Route::delete('fornecedores/{cdPessoa}/contatos/{cdContato}', 'PessoaContatoController@destroy');

    // Fornecedor Email
    Route::get('fornecedores/{cdPessoa}/emails', 'PessoaEmailController@index');
    Route::get('fornecedores/{cdPessoa}/emails/{cdEmail}', 'PessoaEmailController@show');
    Route::post('fornecedores/{cdPessoa}/emails', 'PessoaEmailController@store');
    Route::put('fornecedores/{cdPessoa}/emails/{cdEmail}', 'PessoaEmailController@update');
    Route::delete('fornecedores/{cdPessoa}/emails/{cdEmail}', 'PessoaEmailController@destroy');

    // Fornecedor Endereco
    Route::get('fornecedores/{cdPessoa}/enderecos', 'PessoaEnderecoController@index');
    Route::get('fornecedores/{cdPessoa}/enderecos/{cdEndereco}', 'PessoaEnderecoController@show');
    Route::post('fornecedores/{cdPessoa}/enderecos', 'PessoaEnderecoController@store');
    Route::put('fornecedores/{cdPessoa}/enderecos/{cdEndereco}', 'PessoaEnderecoController@update');
    Route::delete('fornecedores/{cdPessoa}/enderecos/{cdEndereco}', 'PessoaEnderecoController@destroy');

    // Fornecedor Telefone
    Route::get('fornecedores/{cdPessoa}/telefones', 'PessoaTelefoneController@index');
    Route::get('fornecedores/{cdPessoa}/telefones/{cdTelefone}', 'PessoaTelefoneController@show');
    Route::post('fornecedores/{cdPessoa}/telefones', 'PessoaTelefoneController@store');
    Route::put('fornecedores/{cdPessoa}/telefones/{cdTelefone}', 'PessoaTelefoneController@update');
    Route::delete('fornecedores/{cdPessoa}/telefones/{cdTelefone}', 'PessoaTelefoneController@destroy');
});

// Not found
Route::fallback(function(){
    return response()->json(['error' => 'Method Not Found'], 404);
});
