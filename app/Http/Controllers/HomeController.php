<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

/*-----------------------------------------------------------------
                    DINDE CRUD
------------------------------------------------------------------- */

    public function DindeView(){
        $products = Product::where('category','Dinde')->get();
        $arr = array('products' => $products);
        $category="Dinde";
        return view('products.ProductView', $arr,compact('category'));
    }

    public function AddDindeProduct(Request $request){

        if($request->isMethod('post')){
            $newproduct = new Product();
            $newproduct->name=$request->input('name');
            $newproduct->category="Dinde";
            $newproduct->buying_price=$request->input('buying_price');
            $newproduct->selling_price=$request->input('selling_price');
            $newproduct->unite=$request->input('unite');
            $newproduct->quantity=$request->input('quantity');
            $newproduct->save();
            return redirect('/DindeView');
        }
        return view('products.AddDindeProduct');
    }
/*-----------------------------------------------------------------
                   END OF DINDE CRUD
------------------------------------------------------------------- */

/*-----------------------------------------------------------------
                    Mortadelle CRUD
------------------------------------------------------------------- */

public function MortadelleView(){
    $products = Product::where('category','Mortadelle')->get();
    $arr = array('products' => $products);
    $category="Mortadelle";
    return view('products.ProductView', $arr ,compact('category'));
}

public function AddMortadelleProduct(Request $request){

    if($request->isMethod('post')){
        $newproduct = new Product();
        $newproduct->name=$request->input('name');
        $newproduct->category="Mortadelle";
        $newproduct->buying_price=$request->input('buying_price');
        $newproduct->selling_price=$request->input('selling_price');
        $newproduct->unite=$request->input('unite');
        $newproduct->quantity=$request->input('quantity');
        $newproduct->save();
        return redirect('/MortadelleView');
    }
    return view('products.AddMortadelleProduct');
}
/*-----------------------------------------------------------------
               END OF Mortadelle CRUD
------------------------------------------------------------------- */

/*-----------------------------------------------------------------
                    Alimentation CRUD
------------------------------------------------------------------- */

public function AlimentationView(){
    $products = Product::where('category','Alimentation')->get();
    $arr = array('products' => $products);
    $category="Alimentation";
    return view('products.ProductView', $arr ,compact('category'));
}

public function AddAlimentationProduct(Request $request){

    if($request->isMethod('post')){
        $newproduct = new Product();
        $newproduct->name=$request->input('name');
        $newproduct->category="Alimentation";
        $newproduct->buying_price=$request->input('buying_price');
        $newproduct->selling_price=$request->input('selling_price');
        $newproduct->unite=$request->input('unite');
        $newproduct->quantity=$request->input('quantity');
        $newproduct->save();
        return redirect('/AlimentationView');
    }
    return view('products.AddAlimentationProduct');
}
/*-----------------------------------------------------------------
               END OF Alimentation CRUD
------------------------------------------------------------------- */

    public function DeleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function ModifyProduct(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $newproduct = Product::find($id);
            $newproduct->name = $request->input('name');
            $newproduct->category = $request->input('category');
            $newproduct->buying_price = $request->input('buying_price');
            $newproduct->selling_price = $request->input('selling_price');
            $newproduct->unite = $request->input('unite');
            $newproduct->quantity = $request->input('quantity');
            $newproduct->save();
            return redirect("/".$request->input('category')."View");
        }

        $product = Product::find($id);
        $arr = array('product' => $product);
        return view('products.ModifyProduct', $arr);
    }

}
