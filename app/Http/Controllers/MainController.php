<?php

namespace App\Http\Controllers;

use App\models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
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


        return view('page/admin',['success'=>true]);


    }

    public function index(Request $req){
        $data = Menu::all();
        return view('page/main',compact('data'));
    }
    public function createOrder(Request $req){

        $data = $req->get('dishId');

        $order = Menu::whereIn('id',$data)->get();

        $view = view('page.order',compact('order'))->render();

         return response()->json([
             'view'=>$view
         ]);
    }

    public function submitOrder(Request $req){
        $allData =$req->input();
        $data =[];
        $count = [];
        $info = [];
        $allPrice = 0;
        $everyoneOneDishPrice = [];


        foreach ($allData as $k =>$v){
            if($k == '_token'){
                continue;
            }
            if($k[0] == 'd'){
                array_push($data,$v);
            }
            if($k[0] == 'c'){
                array_push($count,$v);
            }
        }


        $allDish = Menu::whereIn('id',$data)->get();

        foreach($allDish as $k => $v){
            $price = $v->price * $count[$k];
            array_push($everyoneOneDishPrice,$price);
        }

            foreach($everyoneOneDishPrice as $val){
                $allPrice += $val;
            }

        $ordersId = Orders::orderBy('order_id','desc')->limit(1)->get();
        if(count($ordersId) == 0){
           $ordersId = 1;
        }else {
            $ordersId = $ordersId[0]->order_id + 1;
        }

        $now = Carbon::now('EEST');

        foreach($allDish as $k => $v){
                array_push($info,
                    [
                   'menu_id' => $data[$k],
                   'count' =>$count[$k],
                   'order_id' => $ordersId,
                   'created_at' => $now,
                   'updated_at' => $now

               ]);
        }

        $order = Orders::insert($info);

        $orderInfo = Orders::where('order_id',$ordersId)->get();

//        $pdfBody = view('pdf',compact($data))->render();

        $data = [
            'title' => 'Чек - Їдальня кам\'яницької школи',
            'num' => $ordersId,
            'date' => $now,
            'content' => $orderInfo,
            'count' =>$count,
            'price' =>$allPrice,
            ];

        $pdf = PDF::loadView('pdf_view', ['data' => $data]);
        return $pdf->download('Чек #'.$ordersId.'.pdf');

//        dd($allPrice);
//
//        return view('page.main');
    }
}

