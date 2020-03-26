@include('.includes/head')
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
            <div class="order-item">
                <div class ="img-dish">
                    <img src="https://picsum.photos/200/130" alt="">
                </div>
                <div class="name-dish">Name</div>
                <span class="description-dish" title="asdasdasd asd a sd as d as d as d as d asd as d as d asd as d as d as d asd  asdasd">Test textasdasdasdasdsadasdasd asda s asd as as dasd asd asdasd asd asd</span>
                <div class="count-dish" onmousedown="return false" onselectstart="return false">
                    <span class="countUp">+</span>
                    <span class="count">1</span>
                    <span class="countDown">-</span>
                </div>
                <div class="price" data-price='100'>100</div>
                <div class="remove-dish">X</div>
            </div>
            <div class="order-item">
                <div class ="img-dish">
                    <img src="https://picsum.photos/200/130" alt="">
                </div>
                <div class="name-dish">Name</div>
                <span class="description-dish" title="asdasdasd asd a sd as d as d as d as d asd as d as d asd as d as d as d asd  asdasd">Test textasdasdasdasdsadasdasd asda s asd as as dasd asd asdasd asd asd</span>
                <div class="count-dish" onmousedown="return false" onselectstart="return false">
                    <span class="countUp">+</span>
                    <span class="count">1</span>
                    <span class="countDown">-</span>
                </div>
                <div class="price" data-price='100'>100</div>
                <div class="remove-dish">X</div>
            </div>
        </div>

</div>
</div>
<div class="btn submitOrder">
        Підтвердити замовлення
</div>

@include('.includes/footer')
