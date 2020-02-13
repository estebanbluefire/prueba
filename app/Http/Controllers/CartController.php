<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use App\Cart;
use App\Catalog;

class CartController extends Controller
{
	public function indexcar(Request $request, Guard $auth, $id){
		//$libros = new Catalog($request->all());

        $obj_catalog = new catalog();
        $obj_cart = new cart();

        //$log = $obj_catalog->isloged();
        $carrito = $obj_cart->GetidCarrito();
        $vcarrito = $carrito;

        $fecha = date('Y-m-d H:i:s');

        //if($request->isMethod('POST'))
        if($id!=0)
        {
            //$idproducto = $_POST['idproducto'];
            //$cantidad = $_POST['cantidad'];
            $cantidad = 1;

            $vcarrito = $obj_cart->AgregarACarrito($carrito, $id, $cantidad, $fecha);
        }

        $car = $obj_cart->MostrarCarrito($vcarrito);

        //da el número de productos y la suma total
        $obj = $obj_catalog->var_item($carrito);

        //$items = $results[0];
        //$sumtotal = $results[1];

        return view('indexcar', compact('car', 'obj'));
	}

    public function indexcardelete(Request $request, Guard $auth){

        $obj_catalog = new catalog();
        $obj_cart = new cart();

        //$log = $obj_catalog->isloged();
        $carrito = $obj_cart->GetidCarrito();
        $vcarrito = $carrito;
        $fecha = date('Y-m-d H:i:s');

        if($_POST)
        {   
            $idproducto = $_POST['idproducto'];
            $cantidad = $_POST['cantidad'];

            $vcarrito = $obj_cart->DeleteCart($carrito, $idproducto, $cantidad, $fecha);
        }

        $car = $obj_cart->MostrarCarrito($vcarrito);

        //da el número de productos y la suma total
        $obj = $obj_catalog->var_item($vcarrito);

        //$items = $results[0];
        //$sumtotal = $results[1];

        return view('indexcar', compact('car', 'obj'));
    }
}
