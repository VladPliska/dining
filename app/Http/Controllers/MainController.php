<?php

namespace App\Http\Controllers;

use App\models\Orders;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use PHPUnit\Exception;
use Symfony\Component\Console\Input\Input;
use Barryvdh\DomPDF\Facade as PDF;


class MainController extends Controller
{
    public function addDish(Request $req)
    {
        $name = $req->get('name');
        $img = $req->file('img');
        $ingrid = $req->get('ingrid');
        $price = $req->get('price');
        $weight = $req->get('weight');

        if (empty($name)) {
            return back()->withErrors(['Введіть назву']);
        }
        if (empty($img)) {
            return back()->withErrors(['Завантажте картинку']);
        }
        if (empty($ingrid)) {
            return back()->withErrors(['Введіть інгрідієнти']);
        }
        if (empty($price)) {
            return back()->withErrors(['Введіть ціну']);
        }
        if (empty($weight)) {
            return back()->withErrors(['Введіть вагу порції']);
        }

        Storage::disk('local')->put('public/Image', $img);

        Menu::create([
            'name' => $name,
            'img' => $img->hashName(),
            'ingredients' => $ingrid,
            'price' => $price,
            'weight' => $weight
        ]);

        $allMenu = Menu::all();

        return view('page/admin', ['success' => true, 'allMenu' => $allMenu]);


    }

    public function index(Request $req)
    {
        $data = Menu::all();

        return view('page/main', compact('data'));
    }

    public function createOrder(Request $req)
    {

        $data = $req->get('dishId');

        $order = Menu::whereIn('id', $data)->get();

        $view = view('page.order', compact('order'))->render();

        return response()->json([
            'view' => $view
        ]);
    }

    public function submitOrder(Request $req)
    {
        $allData = $req->input();
        $data = [];
        $count = [];
        $info = [];
        $allPrice = 0;
        $everyoneOneDishPrice = [];


        foreach ($allData as $k => $v) {
            if ($k == '_token') {
                continue;
            }
            if ($k[0] == 'd') {
                array_push($data, $v);
            }
            if ($k[0] == 'c') {
                array_push($count, $v);
            }
        }


        $allDish = Menu::whereIn('id', $data)->get();

        foreach ($allDish as $k => $v) {
            $price = $v->price * $count[$k];
            array_push($everyoneOneDishPrice, $price);
        }

        foreach ($everyoneOneDishPrice as $val) {
            $allPrice += $val;
        }

        $ordersId = Orders::orderBy('order_id', 'desc')->limit(1)->get();
        if (count($ordersId) == 0) {
            $ordersId = 1;
        } else {
            $ordersId = $ordersId[0]->order_id + 1;
        }

        $now = Carbon::now('EEST');

        foreach ($allDish as $k => $v) {
            array_push($info,
                [
                    'menu_id' => $data[$k],
                    'count' => $count[$k],
                    'order_id' => $ordersId,
                    'created_at' => $now,
                    'updated_at' => $now

                ]);
        }

        $order = Orders::insert($info);

        $orderInfo = Orders::where('order_id', $ordersId)->get();

//        $pdfBody = view('pdf',compact($data))->render();

        $data = [
            'title' => 'Чек - Їдальня кам\'яницької школи',
            'num' => $ordersId,
            'date' => $now,
            'content' => $orderInfo,
            'count' => $count,
            'price' => $allPrice,
        ];

        $pdf = PDF::loadView('pdf_view', ['data' => $data]);
        return $pdf->download('Чек #' . $ordersId . '.pdf');
    }

    public function admin(Request $req)
    {

        $allMenu = Menu::all();

        return view('page/admin', compact('allMenu'));

    }

    public function removeDish(Request $req)
    {

        $id = $req->get('id');
        $dish = Menu::where('id', $id)->get();

        try {
            Orders::where('menu_id', $id)->delete(); ///////NEED FIX
            Menu::where('id', $id)->delete();
            Storage::disk('local')->delete('public/Image/' . $dish[0]->img);
            return response()->json([
                'removed' => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                'removed' => false
            ]);
        }

    }

    public function editDish(Request $req)
    {
        $name = $req->get('name');
        $img = $req->file('img');
        $ingrid = $req->get('ingrid');
        $price = $req->get('price');
        $weight = $req->get('weight');
        $id = $req->get('id');


        if (empty($name)) {
            return back()->withErrors(['Введіть назву']);
        }
        if (empty($ingrid)) {
            return back()->withErrors(['Введіть інгрідієнти']);
        }
        if (empty($price)) {
            return back()->withErrors(['Введіть ціну']);
        }
        if (empty($weight)) {
            return back()->withErrors(['Введіть вагу порції']);
        }

        $data = Menu::where('id', $id)->first();
        $updateArray = [];

        if ($data->name != $name) {
            $updateArray['name'] = $name;
        }
        if ($data->ingredients != $ingrid) {
            $updateArray['ingredients'] = $ingrid;
        }
        if ($data->weight != $weight) {
            $updateArray['weight'] = $weight;
        }
        if ($data->price != $price) {
            $updateArray['price'] = $price;
        }
        if ($img != null) {
            Storage::disk('local')->delete('public/Image/' . $data->img);
            Storage::disk('local')->put('public/Image', $img);
            $updateArray['img'] = $img->hashName();

        }
        if (count($updateArray)) {
            try {
                Menu::where('id', $id)->update($updateArray);
            } catch (Exception $e) {
                dd('errr');
            }
            $allMenu = Menu::all();
            return view('page/admin', ['success' => true, 'allMenu' => $allMenu]);
        } else {
            //Nothing to update
        }
    }

    public function searchDish(Request $req)
    {

        $query = $req->get('query');
//        dd($query);

        $data = Menu::where('name', 'ilike', '%' . $query . '%')->get();

        if(count($data)){
            $view = view('includes/edit-item', compact('data'))->render();

            return response()->json([
                'success' => true,
                'view' => $view
            ]);
        }else{
            return response()->json([
                'success' => false,
                'view' => null
            ]);
        }
    }

    public function auth(Request $req){

        $username = $req->get('username');
        $pass = $req->get('pass');

        $pass = hash('md5',$pass);

        $user = User::where('name',$username)->where('password',$pass)->get();

        if(count($user) != 0){
            $rand = rand(mb_strlen($user[0]->email),200);
            $authToken = hash('md5',$rand);
            $user[0]->update(['remember_token'=>$authToken]);

            Cookie::queue('auth',$authToken, 60*30 );
        }else{
            /// ERR
        }
            return redirect('/admin');
    }
}

