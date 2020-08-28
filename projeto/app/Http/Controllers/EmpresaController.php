<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use Symfony\Component\HttpFoundation\Response;

class EmpresaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $tipo = $request->tipo;
        $this->validaTipo($tipo);

        $empresas = Empresa::todasPorTipo($tipo);

        return view('empresa.index', \compact('empresas', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return View
     */
    public function create(Request $request): View
    {
        $this->validaTipo($request->tipo);

        return view('empresa.create', [
            'tipo' => $request->tipo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmpresaRequest $request
     * @return Response
     */
    public function store(EmpresaRequest $request): Response
    {
        $empresa = Empresa::create($request->all());

        return \redirect()->route('empresas.show', $empresa->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Empresa $empresa
     * @return View
     */
    public function show(Empresa $empresa): View
    {
        return view('empresa.show', \compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Empresa $empresa
<<<<<<< HEAD
     * @return View
=======
     * @return void
>>>>>>> 32b165d6fcf3a491fd4cacd9f85c9325126991c7
     */
    public function edit(Empresa $empresa): View
    {
        return view('empresa.edit', \compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmpresaRequest $request
     * @param Empresa $empresa
     * @return Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa): Response
    {
        $empresa->update($request->all());

        return \redirect()->route('empresas.show', $empresa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Empresa $empresa
     * @param Request $request
     * @return Response
     */
    public function destroy(Empresa $empresa, Request $request): Response
    {
        $this->validaTipo($request->tipo);

        $empresa->delete();
        
        return \redirect()->route('empresas.index', ['tipo'=> $request->tipo]);
    }

    /**
     * verifica o tipo se é cliente ou fornecedor
     *
     * @param string $tipo
     * @return void
     */
    private function validaTipo(string $tipo): void
    {
        if ($tipo !== 'cliente' && $tipo !== 'fornecedor') {
            \abort(404);
        }
    }
}
