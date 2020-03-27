<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use App\Models\Menu;

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
}

