<?php

namespace App\Http\Controllers;

use App\Check;
use App\Client;
use Illuminate\Http\Request;
use App\Product;
use App\Credit;
use Illuminate\Support\Facades\DB;

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
        $dinde = DB::select('select sum(buying_price*quantity) as total from products where category = ?', ['Dinde']);
        $ali = DB::select('select sum(buying_price*quantity) as total from products where category = ?', ['Alimentation']);
        $morta = DB::select('select sum(buying_price*quantity) as total from products where category = ?', ['Mortadelle']);
        $total = $dinde[0]->total + $ali[0]->total + $morta[0]->total;
        $checks = Check::all();
        $final_checks = [];
        foreach ($checks as $ch) {
            $datem2 = date('Y-m-d', strtotime('-2 day', strtotime($ch->date)));
            $now = date('Y-m-d');
            if ($datem2 == $now) {
                //dd($ch);
                array_push($final_checks, $ch);
            }
        }
        $credits = DB::select('select sum(credit_amount) as total from credits');
        $credits = $credits[0]->total;
        $arr = array('dinde' => $dinde[0]->total, 'ali' => $ali[0]->total, 'morta' => $morta[0]->total, 'total' => $total, 'checks' => $final_checks, 'credits' => $credits);
        return view('home', $arr);
    }

    public function ClientCredits(Request $request, $id)
    {
        $credits = Client::find($id)->credits()->get();
        $arr = array('credits' => $credits);
        return view('Credits.ClientsCredits', $arr);
    }

    public function ClientsView()
    {
        $clients = Client::all();
        $arr = array('clients' => $clients);
        return view('Credits.ClientsView', $arr);
    }

    public function AddClientProduct(Request $request)
    {

        if ($request->isMethod('post')) {
            $newclient = new Client();
            $newclient->name = $request->input('name');
            $newclient->phone = $request->input('phone');
            $newclient->save();
            return redirect('/ClientsView');
        }
        return view('Credits.addclient');
    }

    /*-----------------------------------------------------------------
                    DINDE CRUD
------------------------------------------------------------------- */


    public function addAvanceProduct(Request $request)
    {
        //DB::insert('insert into avanceProducts (category,avance) values (?, ?)', [$request->category, $request->avance]);
        $avance =
            DB::select('select * from avanceProducts where category = ?', [$request->category]);
        if (count($avance) == 0) {
            DB::table('avanceProducts')
                ->insert(['avance' => $request->avance, 'category' => $request->category]);
        } else {
            DB::table('avanceProducts')
                ->where('category', $request->category)
                ->update(['avance' => $request->avance, 'category' => $request->category]);
        }

        return redirect()->back();
    }

    public function DindeView()
    {
        $products = Product::where('category', 'Dinde')->get();
        $avance =
            DB::select('select * from avanceProducts where category = ?', ['Dinde']);
        $arr = array('products' => $products, 'avance' => $avance);
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
        $avance =
            DB::select('select * from avanceProducts where category = ?', ['Mortadelle']);
        $arr = array('products' => $products, 'avance' => $avance);
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
        $avance =
            DB::select('select * from avanceProducts where category = ?', ['Alimentation']);
        $arr = array('products' => $products, 'avance' => $avance);
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

    public function AddCredit(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $newcredit = new Credit();
            $newcredit->client_id = $id;
            $newcredit->credit_amount = $request->input('amount');
            $newcredit->credit_date = $request->input('date') == null ? date('y-m-d') : $request->input('date');
            $newcredit->save();
            return redirect('/ClientsView');
        }
        $arr = array('id' => $id);
        return view('Credits.AddCredit', $arr);
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