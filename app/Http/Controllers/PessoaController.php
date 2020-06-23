<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class PessoaController extends Controller
{

    /**
     * @var Pessoa
     */
    private $pessoa;

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function index()
    {
        $pessoas = $this->pessoa->all();

        return response()->json($pessoas);
    }


    public function store(Request $request)
    {
        if($this->pessoa->create($request->all())) {
            return response('OK', 200)
                ->header('Content-Type', 'text/plain');
        }

        return response('ERRO', 500)
                ->header('Content-Type', 'text/plain');
    }


    public function show($id)
    {
        $pessoa = $this->pessoa->find($id);

        return response('OK', 200)
            ->header('Content-Type', 'text/plain');
    }


    public function update(Request $request, $id)
    {
        $pessoa = $this->pessoa->find($id);
        if($pessoa->update($request->all())) {
            return response('OK', 200)
                ->header('Content-Type', 'text/plain');
        }
        else {
            return response('ERRO', 500)
                ->header('Content-Type', 'text/plain');
        }

    }

    public function destroy($id)
    {
        $pessoa = $this->pessoa->find($id);
        $pessoa->delete();

        return response('OK', 200)
            ->header('Content-Type', 'text/plain');
    }
}
