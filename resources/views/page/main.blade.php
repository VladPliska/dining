@include('includes/head')

@include('includes/header')
@if($auth)
    <div class="setting">
        <a href="/admin">
            <i class="fas fa-cog"></i>
            Налаштування
        </a>
    </div>
@endif
@if(count($data)==0)
    <h2 class='ce'>Меню порожнє</h2>
@else
    <h1 class="menu-title">Меню</h1>

    <div class="main">
        @foreach($data as $v)
            <span title="Інгрідієнти:{{$v->ingredients}}">
        <div class="dish-item" data-id="{{$v->id}}">
            <div class="content-item">
                <img src="./storage/Image/{{$v->img}}" alt="Фото страви" class="img-dish">
                <div class="about-dish">{{$v->name}}</div>
                <div class="price-dish">{{$v->price}} грн.</div>
            </div>
        </div>
    </span>
        @endforeach
    </div>
    <div class="confirm-order btn">
        Замовити
    </div>
@endif



@include('includes/footer')
