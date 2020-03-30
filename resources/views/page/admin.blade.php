@include('includes/head')
@include('includes/header')

<div class="toggleButton">
    <div class="create-icon-block">
        <i class="fas fa-plus create-icon createShow"></i>
        <h2 class="create-icon createShow">Створити страву</h2>
        <div class="break"></div>
        <i class="fas fa-edit editShow"></i>
        <h2 class="create-icon editShow">Редагувати страву</h2>
    </div>
</div>
{{--@dd($errors->all()[0])--}}
<div class="create-new-dish">
    <form action="/createNewDish" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="create-title">Створення нової страви</h1>
        <input type="hidden" value="null" class="id-dish" name="id">
        <div class="main-create">
            <div class="left-content">
                <input id='add-photo' type='file' hidden accept="image/*" name="img">
                <img src="https://picsum.photos/450/300" alt="test" class="new-img"><br>
                <label for="add-photo" class="btnAddPhoto">Додати фотографію</label><br><br>
                <label for='name-dish'>Введіть назву страви</label><br>
                <input id="name-dish" type="text" name="name" placeholder="Введіть назву">
            </div>
            <div class="right-content">
                <div class="price">
                    <label for="create-price">Вкажіть ціну</label><br>
                    <input type="number" id="create-price" placeholder="Ціна" name="price">
                </div>
                <br>
                <div class="weight">
                    <label for="create-weight">Вкажіть вагу порції(г)</label><br>
                    <input type="number" id="create-weight" placeholder="Вага" name="weight">
                </div>
                <div class="descriprion">
                    <label for="create-descript">Вкажіть інгрідієнти</label><br>
                    <textarea type="text" id="create-descript" name='ingrid' placeholder="Інгрідієнти"></textarea>
                </div>
            </div>
        </div>
            <button type="submit" class="btn createDish">Створити</button>
    </form>
</div>
@if(!empty($errors->all()))
    <h2 class="err-msg msg">{{$errors->all()[0]}}</h2>
@endif
@if(!empty($success))
    <h2 class="success msg">Страву успішно додано</h2>
@endif
<div class="all-dish-edit" hidden>
    <div class="search-edit">
        <input type="text" class="searchInEdit" placeholder="Введіть назву страви для пошуку">
        <i class="fas fa-search"></i>
    </div>
    <div class="order-content">
        <div class="orders">
            <div class="admin-title-orders">
                <div class="img-title">Фото</div>
                <div class="name-title">Назва страви</div>
                <div class="discription-title">Інгрідієнти</div>
                <div class="weight-title">Вага порції(г)</div>
                <div class="remove-title">Видалити страву</div>
            </div>
            <div class="content">
                @foreach($allMenu as $k =>$v)
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



            </div>
        </div>
    </div>
</div>

@include('includes/footer')
