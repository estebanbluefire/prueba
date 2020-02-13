<?php

namespace App;

use App\Catalog;
use App\Cart;
use DB;
use Session;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'carrito';

    protected $fillable = [
        'idcarrito', 'car_id_producto', 'cantidad', 'fecharegistro',
    ];

    public function getcar()
    {
        $car = Catalog::select('carritocompra.*')->get();
        return $car;
    }

    public function GetidCarrito()
    {
    	Session::regenerate();

    	if (Session::has('carrito_id'))
		{
		    $carrito_id = Session::get('carrito_id');
		    return $carrito_id;
		}
		else
		{
            //$tempCarrito = str_random(15);
            $tempCarrito = Str::random(15);

			$fecha = date('Y-m-d H:i:s');

			Session::put('carrito_id', $tempCarrito);
			Session::put('id_cliente', '');
			Session::put('usuario_nombre', '');
			//Session::put('usuario_password', '');
			//Session::put('usuario_email', '');
			Session::put('usuario_fecha', $fecha);
			Session::put('usuario_logged', FALSE);

			return $tempCarrito;
		}
    }

    public function getCart($cantidad, $idproducto, $control)
    {
    	$carrito = $this->GetidCarrito();

    	$fecha = date('Y-m-d H:i:s');

    	if($cantidad!=0 AND $control==FALSE)
    	{
    		$vcarrito = $this->AgregarACarrito($carrito, $idproducto, $cantidad, $fecha);
    	}

    	return $carrito;
    }

    public function AgregarACarrito($carrito, $idproducto, $cantidad, $fecha)
    {
        //$count = User::where('votes', '>', 100)->count();

            /*$car = Cart::select('carrito.*','productos.*')
        	->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
        	->where('carrito.idcarrito', $carrito)
        	->get();*/

        $result = Cart::select('carrito.*','productos.*')
            ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
            ->where('carrito.idcarrito', $carrito)
            ->where('carrito.car_id_producto', $idproducto)
            ->get();

        $control = FALSE;
        $nuevacantidad = 0;

        foreach($result as $row)
        {
            $control = TRUE;
            $nuevacantidad = $nuevacantidad + $row->cantidad;
        }

        $nuevacantidad = $nuevacantidad + $cantidad;

        if ($control==TRUE)
        {
        	//UPDATE

            //$nuevacantidad = $count + $cantidad;

            Cart::select('carrito.*','productos.*')
            ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
            ->where('carrito.idcarrito', $carrito)
            ->where('carrito.car_id_producto', $idproducto)
            ->update(['cantidad' => $nuevacantidad, 'fecharegistro' => $fecha]);

        	return $carrito;
        }
        else
        {
        	//INSERT

            DB::table('carrito')->insert(
            ['idcarrito' => $carrito, 'car_id_producto' => $idproducto, 'cantidad' => $cantidad, 
            'fecharegistro' => $fecha]);

        	return $carrito;
        }
    }

    public function MostrarCarrito($carrito_id)
    {
    	 $car = Cart::select('carrito.*','productos.*')
        	->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
        	->where('carrito.idcarrito', $carrito_id)
        	->get();

        return $car;
    }

    public function DeleteCart($carrito, $idproducto, $cantidad_delete, $fecha)
    {

        $car = Cart::select('carrito.*','productos.*')
            ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
            ->where('carrito.idcarrito', $carrito)
            ->where('carrito.car_id_producto', $idproducto)
            ->get();

        $cantidad_total=0;

       foreach($car as $row)
        {
            $control = TRUE;
            $cantidad_total = $row->cantidad;
        }

        //$cant_total = $car->cantidad;
        if(is_numeric($cantidad_total) and is_numeric($cantidad_delete))
        {
            $nueva_cantidad = $cantidad_total - $cantidad_delete;
        }else
        {
            $nueva_cantidad = 0;
        }

        if ($cantidad_delete>0)
        {
        	if($nueva_cantidad==0)
        	{
                //DELETE
                /*$result = Cart::select('carrito.*','productos.*')
                ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
                ->where('carrito.idcarrito', $carrito)
                ->where('carrito.car_id_producto', $idproducto)
                ->get();*/

                Cart::select('carrito.*','productos.*')
                ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
                ->where('carrito.idcarrito', $carrito)
                ->where('carrito.car_id_producto', $idproducto)
                ->delete();
        	}
        	else
        	{
                if($nueva_cantidad>0)
                {
            		//UPDATE
                    /*$result = Cart::select('carrito.*','productos.*')
                    ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
                    ->where('carrito.idcarrito', $carrito)
                    ->where('carrito.car_id_producto', $idproducto)
                    ->get();*/

                    Cart::select('carrito.*','productos.*')
                    ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
                    ->where('carrito.idcarrito', $carrito)
                    ->where('carrito.car_id_producto', $idproducto)
                    ->update(['cantidad' => $nueva_cantidad, 'fecharegistro' => $fecha]);
                }
        	}
        }

        return $carrito;
    }
}
