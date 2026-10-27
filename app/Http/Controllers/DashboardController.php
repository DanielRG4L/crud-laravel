<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProductos = Producto::count();

        $precioPromedio = Producto::avg('precio') ?? 0;

        $precioMaximo = Producto::max('precio') ?? 0;

        $ultimoProducto = Producto::latest()->first();

        return view('dashboard', compact(
            'totalProductos',
            'precioPromedio',
            'precioMaximo',
            'ultimoProducto'
        ));
    }
}
