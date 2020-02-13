<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use App\Catalog;
use App\Cart;

class IndexController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	protected $obj_catalog;
	protected $obj_cart;

	public function index(Request $request, Guard $auth){
		//$libros = new Catalog($request->all());

		$obj_catalog = new catalog();
		//$obj_cart = new cart();

		//$log = $obj_catalog->isloged();

		$libros = $obj_catalog->getProducts();

		//$carrito = $obj_cart->GetidCarrito();
		//da el número de productos y la suma total
		//$obj = $obj_catalog->var_item($carrito); 

    	//$items = $results[0];
        //$sumtotal = $results[1]; 

 		//return view('index', compact('libros', 'log', 'items', 'obj'));*/

 		return view('index', compact('libros'));
	}
	public function indexrelevance(Request $request, Guard $auth){

		//$libros = new Catalog($request->all());
	   $obj_catalog = new catalog();

		$libros = $obj_catalog->getProducts();

		return view('index', compact('libros'));

   }

   public function indextitle(Request $request, Guard $auth){

		$obj_catalog = new catalog();
		$libros = $obj_catalog->getLibrosOrden2();

		return view('index', compact('libros'));

   }

   public function indexlowprice(Request $request, Guard $auth){

		$obj_catalog = new catalog();
		$libros = $obj_catalog->getLibrosOrden3();

		return view('index', compact('libros'));

   }

   public function indexhighestprice(Request $request, Guard $auth){

		$obj_catalog = new catalog();
		$libros = $obj_catalog->getLibrosOrden4();

		return view('index', compact('libros'));

   }

   public function index3cheapest(Request $request, Guard $auth){

		$obj_catalog = new catalog();
		$libros = $obj_catalog->getLibrosOrden5();

		return view('index', compact('libros'));

   }

   public function indexcheck(Request $request, Guard $auth){

		$checkphp = 0;
		$checkjavascript = 0;
		$checkjava = 0;
		$libros = NULL;

		$obj_catalog = new catalog();

		if(isset($_POST['check']))
		{
			$valores = $_POST['check'];
		}else
		{
			$valores = 0;
		}

	   if(empty($valores))
	   {
		   $libros = $obj_catalog->getProducts();
	   }
	   else
	   {
		   $N = count($valores);

		   for($i=0; $i < $N; $i++)
		   {
			   if ($valores[$i] == "php")
			   {
					 $checkphp = 1;
				 }
			   if ($valores[$i] == "javascript")
			   {
					 $checkjavascript = 2;
				 }
			   if ($valores[$i] == "java")
			   {
					 $checkjava = 3;
				 }	
				 echo($valores[$i] . " ");

			 }

		   $libros = $obj_catalog->getLibrosCheck($checkphp, $checkjavascript, $checkjava);

	   }

		return view('index', compact('libros'));

   }

   public function indexdetail(Request $request, Guard $auth, $id){

		$obj_catalog = new catalog();

		$bookid = $id;

		$libro = $obj_catalog->getLibrosdetail($bookid);

		return view('indexdetail', compact('libro'));

   }
}
