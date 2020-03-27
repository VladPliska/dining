@foreach($content as $k => $v)
    <div class="dish">
        <div class="number">{{$k}}</div>
        <div class="name">{{$v->name}}</div>
        <div class="ingredients">{{$v->ingredients}}</div>
        <div class="size">{{$v->weight}}</div>
        <div class="count">1</div>
        <div class="price">{{$v->price}}</div>
    </div>
@endforeach
