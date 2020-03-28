@include('.includes/header')

<div class="order-content">
    <div class="orders">
        <div class="title-orders">
            <div class="img-title">Фото</div>
            <div class="name-title">Назва страви</div>
            <div class="discription-title">Інгрідієнти</div>
            <div class="count-title">Кількість порцій</div>
            <div class="price-title">Ціна</div>
            <div class="remove-title">Видалити страву</div>
        </div>
        <div class="content">
            <form action="/submitOrder" method="POST">
                @csrf
                @foreach($order as $v)
                    <div class="order-item">
                        <input type="text" hidden value="{{$v->id}}" name="data-{{$v->id}}">
                        <div class="img-dish">
                            <img src="./storage/Image/{{$v->img}}" alt="Фото страви">
                        </div>
                        <div class="name-dish">{{$v->name}}</div>
                        <span class="description-dish" title="{{$v->ingredients}}">{{$v->ingredients}}</span>
                        <div class="count-dish" onmousedown="return false" onselectstart="return false">
                            <span class="countUp">+</span>
                            <span class="count">1</span>
                            <span class="countDown">-</span>
                            <input type="number" class="countVal" hidden name='count-{{$v->id}}' value="1">
                        </div>
                        <div class="price" data-price={{$v->price}}>{{$v->price}}</div>
                        <div class="remove-dish">X</div>
                    </div>
                @endforeach
                <input type="submit" class="btnSubmit" style="display:none">
            </form>

        </div>

    </div>
</div>
<div class="btn submitOrder">
    Підтвердити замовлення
</div>

@include('.includes/footer')
