@foreach($data as $k => $v)
    <div class="admin-order-item editDish" style="margin-top:25px" data-id="{{$v->id}}">
        <div class="img-dish">
            <img src="./storage/Image/{{$v->img}}" width="200" height="130" alt="">
        </div>
        <div class="name-dish">{{$v->name}}</div>
        <span class="description-dish"
              title="{{$v->ingredients}}">{{$v->ingredients}}</span>
        <div class="weight">{{$v->weight}}</div>
        <div class="admin-remove-dish">X</div>
        <span hidden class="info-{{$v->id}}">
                            {{json_encode([
                                    'name'=>$v->name,
                                    'ingredients' =>$v->ingredients,
                                    'weight'=>$v->weight,
                                    'price' => $v->price,
                                    'img'=>$v->img
                             ])}}
                        </span>
    </div>
@endforeach
