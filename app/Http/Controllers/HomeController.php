<?php

namespace App\Http\Controllers;

use App\Check;
use Illuminate\Http\Request;
use App\Product;
use App\Credit;

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

    public function DindeView()
    {
        $products = Product::where('category', 'Dinde')->get();
        $arr = array('products' => $products);
        $category = "Dinde";
        return view('products.ProductView', $arr, compact('category'));
    }

    public function AddDindeProduct(Request $request)
    {

        if ($request->isMethod('post')) {
            $newproduct = new Product();
            $newproduct->name = $request->input('name');
            $newproduct->category = "Dinde";
            $newproduct->buying_price = $request->input('buying_price');
            $newproduct->selling_price = $request->input('selling_price');
            $newproduct->unite = $request->input('unite');
            $newproduct->quantity = $request->input('quantity');
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

    public function MortadelleView()
    {
        $products = Product::where('category', 'Mortadelle')->get();
        $arr = array('products' => $products);
        $category = "Mortadelle";
        return view('products.ProductView', $arr, compact('category'));
    }

    public function AddMortadelleProduct(Request $request)
    {

        if ($request->isMethod('post')) {
            $newproduct = new Product();
            $newproduct->name = $request->input('name');
            $newproduct->category = "Mortadelle";
            $newproduct->buying_price = $request->input('buying_price');
            $newproduct->selling_price = $request->input('selling_price');
            $newproduct->unite = $request->input('unite');
            $newproduct->quantity = $request->input('quantity');
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

    public function AlimentationView()
    {
        $products = Product::where('category', 'Alimentation')->get();
        $arr = array('products' => $products);
        $category = "Alimentation";
        return view('products.ProductView', $arr, compact('category'));
    }

    public function AddAlimentationProduct(Request $request)
    {

        if ($request->isMethod('post')) {
            $newproduct = new Product();
            $newproduct->name = $request->input('name');
            $newproduct->category = "Alimentation";
            $newproduct->buying_price = $request->input('buying_price');
            $newproduct->selling_price = $request->input('selling_price');
            $newproduct->unite = $request->input('unite');
            $newproduct->quantity = $request->input('quantity');
            $newproduct->save();
            return redirect('/AlimentationView');
        }
        return view('products.AddAlimentationProduct');
    }
    /*-----------------------------------------------------------------
               END OF Alimentation CRUD
------------------------------------------------------------------- */
    /*-----------------------------------------------------------------
                    Credit CRUD
------------------------------------------------------------------- */

    public function ViewCredit()
    {
        $credit = Credit::all();
        $arr = array('credit' => $credit);
        return view('Credits.CreditView', $arr);
    }

    public function AddCredit(Request $request)
    {

        if ($request->isMethod('post')) {
            $newcredit = new Credit();
            $newcredit->name = $request->input('name');
            $newcredit->amount = $request->input('amount');
            $newcredit->date = date('y-m-d');
            $newcredit->save();
            return redirect('/ViewCredit');
        }
        return view('Credits.AddCredit');
    }
    public function DeleteCredit($id)
    {
        $credit = Credit::find($id);
        $credit->delete();
        return redirect()->back();
    }
    public function ModifyCredit(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $newcredit = Credit::find($id);
            $newcredit->name = $request->input('name');
            $newcredit->amount = $request->input('amount');
            $newcredit->date = date('y-m-d');
            $newcredit->save();
            return redirect("/ViewCredit");
        }

        $credit = Credit::find($id);
        $arr = array('credit' => $credit);
        return view('Credits.ModifyCredit', $arr);
    }

    /*-----------------------------------------------------------------
               END OF Credit CRUD
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
            return redirect("/" . $request->input('category') . "View");
        }

        $product = Product::find($id);
        $arr = array('product' => $product);
        return view('products.ModifyProduct', $arr);
    }

    public function addCheck(Request $request)
    {

        if ($request->isMethod('post')) {
            $newproduct = new Check();
            $newproduct->name = $request->input('name');
            $newproduct->type = $request->input('type');
            $newproduct->amount = $request->input('amount');
            $newproduct->date = $request->input('date');
            $newproduct->save();
            return redirect('/CheckView');
        }
        return view('check.addcheck');
    }
    public function CheckView()
    {
        $products = Check::all();
        $arr = array('products' => $products);
        $category = "Dinde";
        return view('check.checkView', $arr, compact('category'));
    }

    public function DeleteCheck($id)
    {
        $product = Check::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function ModifyCheck(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $newproduct = Check::find($id);
            $newproduct->name = $request->input('name');
            $newproduct->amount = $request->input('amount');
            $newproduct->date = $request->input('date');
            $newproduct->type = $request->input('type');
            $newproduct->save();
            return redirect("/CheckView");
        }

        $product = Check::find($id);
        $arr = array('product' => $product);
        return view('check.ModifyCheck', $arr);
    }
}