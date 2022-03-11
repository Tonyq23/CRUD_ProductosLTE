<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Producto extends BaseController
{
    public function index()
    {
        $model = model(ProductoModel::class);

        $buscarPor = $this->request->getVar('buscar_por') ?? '';
        $buscar = $this->request->getVar('buscar') ?? '';

        if (!empty($buscarPor) && !empty($buscar)) {

            $productos = $model->select('id, nombre, sku, precio, stock')
                ->where([$buscarPor => $buscar])
                ->paginate(10);

            $data = [
                'productos' => $productos,
                'pager' => $model->pager,
            ];
    
            return view('productos/index', $data);

        } else {

            $productos = $model->paginate(10);
            $data = [
                'productos' => $productos,
                'pager' => $model->pager,
            ];
    
            return view('productos/index', $data);

        }
    }

    public function vistaAgregar() {
        return view('productos/agregar');
    }

    public function guardar() {

        $producto = model(ProductoModel::class);

        $nombre = $this->request->getPost('nombre');
        $descripcion = $this->request->getPost('descripcion');
        $sku = $this->request->getPost('sku');
        $precio = $this->request->getPost('precio');
        $stock = $this->request->getPost('stock');

        $datos = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'sku' => $sku,
            'precio' => $precio,
            'stock' => $stock,
        ];

        if ($producto->save($datos) === false) {
            return view('productos/agregar', ['errores' => $producto->errors()]);
        } else {
            return redirect()->to('/productos/agregar')->with('mensaje', 'Datos guardados satisfactoriamente!');
        }

    }

    public function vistaEditar($id) {

        $producto = model(ProductoModel::class);
        $datos = $producto->find($id);

        return view('productos/editar', ['producto' => $datos]);

    }

    public function editar($id) {

        $producto = model(ProductoModel::class);

        $nombre = $this->request->getPost('nombre');
        $descripcion = $this->request->getPost('descripcion');
        $sku = $this->request->getPost('sku');
        $precio = $this->request->getPost('precio');
        $stock = $this->request->getPost('stock');

        $datos = [
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'sku' => $sku,
            'precio' => $precio,
            'stock' => $stock,
        ];

        if ($producto->update($id, $datos) === false) {
            return view('productos/editar', ['errores' => $producto->errors(), 'producto' => $datos]);
        } else {
            return redirect()->to('/productos')->with('mensaje', 'Datos actualizados satisfactoriamente!');
        }

    }

    public function borrar($id) {

        $producto = model(ProductoModel::class);
        $datos = $producto->delete($id);

        return redirect()->to('/productos')->with('mensaje', 'Datos eliminados satisfactoriamente!');

    }
}
