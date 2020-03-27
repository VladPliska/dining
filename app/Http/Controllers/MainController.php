<?php

namespace App\Http\Controllers;

use App\models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
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
        $id = [];
        $allPrice = 0;

        foreach($allData as $k => $v){
          if($k == '_token'){
              continue;
          }
            array_push($id,$v);
        }

        $allDish = Menu::whereIn('id',$id)->get();

        foreach($allDish as $val){
            $allPrice += $val->price;
        }

        $order = Orders::create([
            'dish_id' =>$allDish[0]->id,
            'count' => $allPrice
        ]);

        $pdfBody = view('includes/for-pdf',['content'=>$allDish])->render();

        $data = [
            'title' => 'Чек - Їдальня кам\'яницької школи',
            'header' => 'Чек #' . $order->id .'Термін дії'.$order->created_at,
            'content' => $pdfBody,
            'price' =>$allPrice,
            ];

        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('Чек #'.$order->id.'.pdf');

//        dd($allPrice);
//
//        return view('page.main');
    }
}

