<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    

    public function index(Request $request)
    {
        $filtros = $request->validate([
            'buscar' => ['nullable', 'string', 'max:255'],
            'precio_min' => ['nullable', 'numeric', 'min:0'],
            'precio_max' => ['nullable', 'numeric', 'min:0'],
        ]);

        $busqueda = $filtros['buscar'] ?? null;
        $precioMinimo = $filtros['precio_min'] ?? null;
        $precioMaximo = $filtros['precio_max'] ?? null;

        if (
            $precioMinimo !== null &&
            $precioMaximo !== null &&
            $precioMaximo < $precioMinimo
        ) {
            return back()
                ->withErrors([
                    'precio_max' => 'El precio máximo debe ser mayor o igual al precio mínimo.',
                ])
                ->withInput();
        }

        $productos = Producto::query()
            ->when($busqueda, function ($query, $busqueda) {
                $query->where(function ($subquery) use ($busqueda) {
                    $subquery->where('nombre', 'like', "%{$busqueda}%")
                        ->orWhere('descripcion', 'like', "%{$busqueda}%");
                });
            })
            ->when($precioMinimo !== null && $precioMinimo !== '', function ($query) use ($precioMinimo) {
                $query->where('precio', '>=', $precioMinimo);
            })
            ->when($precioMaximo !== null && $precioMaximo !== '', function ($query) use ($precioMaximo) {
                $query->where('precio', '<=', $precioMaximo);
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('productos.index', compact(
            'productos',
            'busqueda',
            'precioMinimo',
            'precioMaximo'
        ));
    }



    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
        ]);

        Producto::create($datos);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto registrado correctamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
        ]);

        $producto->update($datos);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}
