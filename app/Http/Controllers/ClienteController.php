<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use Throwable;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    public function findByplate(Request $request){

        $resultado = Cliente::where('placa', $request->numero)
        ->orWhere('placa', 'like', '%' . $request->numero . '%')->get();

        return $resultado;
    }

    public function findCliente(Request $request) {

        try {

            $clientes = Cliente::findOrFail($request->id);

        } catch (Throwable $exception) {

            return back()->withError($exception->getMessage())->withInput();

        }
        return $clientes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();

        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->cpf = $request->cpf;
        $cliente->placa = $request->placa;

        $cliente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cliente = Cliente::findOrFail($request->id);

        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->cpf = $request->cpf;
        $cliente->placa = $request->placa;

        $cliente->save();

        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cliente = Cliente::destroy($request->id);

        return $cliente;
    }
}
