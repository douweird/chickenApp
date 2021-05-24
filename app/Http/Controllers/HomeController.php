<?php

namespace App\Http\Controllers;

use App\Check;
use App\Client;
use Illuminate\Http\Request;
use App\Product;
use App\Credit;
use App\kwara;
use App\Employe;
use App\Avance;
use App\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $alfinfo  = DB::table('stockAlf')->latest()->first();
        $clients = Client::all();
        $arr = array('dinde' => $dinde[0]->total, 'ali' => $ali[0]->total, 'morta' => $morta[0]->total, 'total' => $total, 'checks' => $final_checks, 'credits' => $credits, 'alfinfo' => $alfinfo, 'clients' => $clients->count());
        return view('home', $arr);
    }


    public function addalf(Request $request)
    {
        $kwara = kwara::all();
        if ($kwara->count() == 0) {
            $kwara = new kwara();
            $kwara->day = 0;
            $kwara->alf = $request->input('alf') ?? 0;
            $kwara->falos = $request->input('falos') ?? 0;
            $kwara->dead =  0;
            $kwara->sold =  0;
            $kwara->save();
            $arr = array('kwara' => $kwara);
            return redirect('/lkwaraView');
        } else {
            $kwara_last = DB::table('stockAlf')->latest()->first();
            $kwara = new kwara();
            $kwara->day = ($kwara_last->day ?? 0) + 1;
            $kwara->alf =  $kwara_last->alf - ($request->input('alf') ?? 0);
            $kwara->falos = $kwara_last->falos - ($request->input('dead') ?? 0) - ($request->input('sold')  ?? 0);
            $kwara->dead = $request->input('dead') ?? 0;
            $kwara->sold = $request->input('sold') ?? 0;
            $kwara->save();
            $arr = array('kwara' => $kwara);
            return redirect('/lkwaraView');
        }
    }
    public function deletealf($id)
    {

        $product = kwara::find($id);
        $product->delete();
        return redirect('/lkwaraView');
    }
    public function clearAlf()
    {
        kwara::query()->truncate();
        return redirect('/lkwaraView');
    }

    public function lkwaraView()
    {
        //dd($kwara_last = DB::table('stockAlf')->latest()->first());
        $kwara = kwara::all();
        //dd($kwara->count());
        if ($kwara->count() == 10) {
            $rest_alf = kwara::where('day', 0)->first()->alf;
            $rest_flales = kwara::where('day', 0)->first()->falos;
            foreach ($kwara as $k) {
                $rest_alf -= $k->alf;
                $rest_flales -= $k->dead;
                $rest_flales -= $k->sold;
                //dd($rest_flales);
            }
        }
        $arr = array('kwara' => $kwara);
        return view('lkwara.lkwaraView', $arr);
    }

    public function ClientCredits(Request $request, $id)
    {
        $credits = Client::find($id)->credits()->get();
        $arr = array('credits' => $credits);
        return view('Credits.ClientsCredits', $arr);
    }

    public function DeleteClient($id)
    {
        $credit = Client::find($id);
        $credit->credits()->delete();
        $credit->delete();
        return redirect()->back();
    }

    public function ModifyClient(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $newproduct = Client::find($id);
            $newproduct->name = $request->input('name');
            $newproduct->phone = $request->input('phone');
            $newproduct->save();
            return redirect('/ClientsView');
        }

        $product = Client::find($id);
        $arr = array('credit' => $product);
        return view('Credits.ModifyClient', $arr);
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
    public function orderCredit(Request $request, $id)
    {
        $credit = Order::where('id', $id)->get();
        $arr = array('orders' => $credit);
        return view('orders.orderCredit', $arr);
    }

    public function AddCredit(Request $request, $id)
    {

        if ($request->isMethod('post')) {

            $newcredit = new Credit();
            $newcredit->client_id = $id;
            $newcredit->credit_amount = $request->input('amount');
            $newcredit->credit_date = $request->input('date') == null ? date('y-m-d') : $request->input('date');
            $newcredit->order_id = $request->input('order_id') ?? null;
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

    public function AddEmploye(Request $request)
    {

        if ($request->isMethod('post')) {
            $newemploye = new Employe();
            $newemploye->name = $request->input('name');
            $newemploye->phone_number = $request->input('phone_number');
            $newemploye->salary = $request->input('salary');
            $newemploye->work_placement = $request->input('work_placement');
            $newemploye->date_to_pay = $request->input('date_to_pay');
            $newemploye->save();
            return redirect('/ViewEmployees');
        }
        return view('employees.AddEmploye');
    }

    public function ViewEmployees()
    {
        $employees = DB::table('employees')->leftJoin('avances', 'employees.id', '=', 'avances.employe_id')
            ->select('employees.id', 'name', 'work_placement', 'phone_number', 'date_to_pay', 'salary', DB::raw('sum(amount) as avance_totale'))
            ->groupBy('employees.id')
            ->get();
        $arr = array('employees' => $employees);
        return view('employees.ViewEmployees', $arr);
    }
    public function AddAvance(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $newavance = new Avance();
            $newavance->amount = $request->input('amount');
            $newavance->avance_date = date('y-m-d');
            $newavance->employe_id = $id;
            $newavance->save();
            return redirect('/ViewEmployees');
        }
        $arr = array('id' => $id);
        return view('employees.AddAvance', $arr);
    }

    public function ModifyEmploye(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $newemploye = Employe::find($id);
            $newemploye->name = $request->input('name');
            $newemploye->phone_number = $request->input('phone_number');
            $newemploye->work_placement = $request->input('work_placement');
            $newemploye->date_to_pay = $request->input('date_to_pay');
            $newemploye->salary = $request->input('salary');
            $newemploye->save();
            return redirect('/ViewEmployees');
        }

        $employe = Employe::find($id);
        $arr = array('employe' => $employe);
        return view('employees.ModifyEmploye', $arr);
    }
    public function DeleteEmploye($id)
    {
        $employe = Employe::find($id);
        $employe->delete();
        return redirect()->back();
    }

    public function ViewAvance($id, $name)
    {
        $avances = DB::table('avances')->Join('employees', 'employees.id', '=', 'avances.employe_id')
            ->select('avances.id', 'employees.name', 'amount', 'avance_date')
            ->where('employees.id', $id)
            ->get();
        $arr = array('avances' => $avances, 'name' => $name);
        return view('employees.ViewAvance', $arr);
    }
    public function EmployeSync($id)
    {
        $avance = Avance::Where('employe_id', $id);
        $avance->delete();
        return redirect()->back();
    }
    public function getKoriEmployees()
    {
        $employees = Employe::Where('work_placement', 'kori');
        $arr = array('employees' => $employees);
        return view('employees.ViewKori', $arr);
    }

    public function orderView(Request $request, $category)
    {
        if ($request->isMethod('post')) {

            $product = Product::where('name', $request->input('product'))->first();
            $product->quantity = $product->quantity - $request->input('quantity');
            $product->save();

            $order = new Order();
            $order->category = $category;
            $order->product = $request->input('product');
            $order->amount = $request->input('quantity');
            $order->total = ($product->selling_price - $product->buying_price) * $order->amount;
            $order->save();
            if ($request->input('client_id')) {
                return redirect('/AddCredit/' . $request->input('client_id') . '?order_id=' . $order->id);
            }

            return redirect('/orderView/Dinde');
        }
        $products = Product::where('category', $category)->get();
        $clients = Client::all();
        $date_day = Carbon::now()->startOfDay();

        $orders = Order::where('created_at', '>', $date_day)
            ->orderBy('created_at', 'desc')
            ->get();
        if ($request->input('date')) {
            //dd($request->input('date'));
            $orders = Order::whereDate('created_at', '=', $request->input('date'))->orderBy('created_at', 'desc')->get();
        }
        $arr = array('products' => $products, 'category' => $category, 'clients' => $clients, 'orders' => $orders);
        return view('orders.orderView', $arr);
    }

    public function dashboard()
    {
        $date_day = Carbon::now()->startOfDay();
        $TotaldayDinde = DB::table('orders')
            ->where('created_at', '>', $date_day)
            ->where('category', '=', 'Dinde')
            ->sum('total');
        $TotaldayAli = DB::table('orders')
            ->where('created_at', '>', $date_day)
            ->where('category', '=', 'Alimentation')
            ->sum('total');
        $TotaldayMorta = DB::table('orders')
            ->where('created_at', '>', $date_day)
            ->where('category', '=', 'Mortadelle')
            ->sum('total');

        $date_month = Carbon::now()->startOfMonth();
        $TotalMonthDinde = DB::table('orders')
            ->where('created_at', '>', $date_month)
            ->where('category', '=', 'Dinde')
            ->sum('total');
        $TotalMonthAli = DB::table('orders')
            ->where('created_at', '>', $date_month)
            ->where('category', '=', 'Alimentation')
            ->sum('total');
        $TotalMonthMorta = DB::table('orders')
            ->where('created_at', '>', $date_month)
            ->where('category', '=', 'Mortadelle')
            ->sum('total');

        $date_year = Carbon::now()->startOfYear();
        $TotalYearDinde = DB::table('orders')
            ->where('created_at', '>', $date_year)
            ->where('category', '=', 'Dinde')
            ->sum('total');
        $TotalYearAli = DB::table('orders')
            ->where('created_at', '>', $date_year)
            ->where('category', '=', 'Alimentation')
            ->sum('total');
        $TotalYearMorta = DB::table('orders')
            ->where('created_at', '>', $date_year)
            ->where('category', '=', 'Mortadelle')
            ->sum('total');



        $orders = Order::all();
        $arr = array(
            'orders' => $orders, 'dinde_day' => $TotaldayDinde, 'ali_day' => $TotaldayAli, 'morta_day' => $TotaldayMorta,
            'TotalMonthDinde' => $TotalMonthDinde, 'TotalMonthAli' => $TotalMonthAli, 'TotalMonthMorta' => $TotalMonthMorta,
            'TotalYearDinde' => $TotalYearDinde, 'TotalYearAli' => $TotalYearAli, 'TotalYearMorta' => $TotalYearMorta
        );
        return view('orders.dashboard', $arr);
    }
}