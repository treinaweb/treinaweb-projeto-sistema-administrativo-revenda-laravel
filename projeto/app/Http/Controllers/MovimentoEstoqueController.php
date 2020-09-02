<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovimentosEstoque;

class MovimentoEstoqueController extends Controller
{
    public function destroy(int $id)
    {
        MovimentosEstoque::destroy($id);

        return \redirect()->back();
    }
}
