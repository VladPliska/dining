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
<div class="create-new-dish">
    <h1 class="create-title">Створення нової страви</h1>
    <div class="main-create">

        <div class="left-content">
            <input id='add-photo' type='file' hidden  accept="image/*" >
            <img src="https://picsum.photos/450/300" alt="test" class="new-img"><br>
            <label for="add-photo" class="btnAddPhoto">Додати фотографію</label><br><br>
            <label for='name-dish'>Введіть назву страви</label><br>
            <input id="name-dish" type="text" name="name" placeholder="Введіть назву">
        </div>
        <div class="right-content">
            <div class="price">
                <label for="create-price">Вкажіть ціну</label><br>
                <input type="text" id="create-price" placeholder="Ціна">
            </div>
            <br>
            <div class="weight">
                <label for="create-weight">Вкажіть вагу порції(г)</label><br>
                <input type="text" id="create-weight" placeholder="Вага">
            </div>
            <div class="descriprion">
                <label for="create-descript">Вкажіть інгрідієнти</label><br>
                <textarea type="text" id="create-descript" placeholder="Інгрідієнти"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn createDish">Створити</button>
</div>
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
                <div class="admin-order-item">
                    <div class ="img-dish">
                        <img src="https://picsum.photos/200/130" alt="">
                    </div>
                    <div class="name-dish">Name</div>
                    <span class="description-dish" title="asdasdasd asd a sd as d as d as d as d asd as d as d asd as d as d as d asd  asdasd">Test textasdasdasdasdsadasdasd asda s asd as as dasd asd asdasd asd asd</span>
                    <div class="weight">100</div>
                    <div class="admin-remove-dish">X</div>
                </div>
                <div class="admin-order-item">
                    <div class ="img-dish">
                        <img src="https://picsum.photos/200/130" alt="">
                    </div>
                    <div class="name-dish">Name</div>
                    <span class="description-dish" title="asdasdasd asd a sd as d as d as d as d asd as d as d asd as d as d as d asd  asdasd">Test textasdasdasdasdsadasdasd asda s asd as as dasd asd asdasd asd asd</span>
                    <div class="weight">100</div>
                    <div class="admin-remove-dish">X</div>
                </div>
                <div class="admin-order-item">
                    <div class ="img-dish">
                        <img src="https://picsum.photos/200/130" alt="">
                    </div>
                    <div class="name-dish">Name</div>
                    <span class="description-dish" title="asdasdasd asd a sd as d as d as d as d asd as d as d asd as d as d as d asd  asdasd">Test textasdasdasdasdsadasdasd asda s asd as as dasd asd asdasd asd asd</span>
                    <div class="weight">100</div>
                    <div class="admin-remove-dish">X</div>
                </div>
                <div class="admin-order-item">
                    <div class ="img-dish">
                        <img src="https://picsum.photos/200/130" alt="">
                    </div>
                    <div class="name-dish">Name</div>
                    <span class="description-dish" title="asdasdasd asd a sd as d as d as d as d asd as d as d asd as d as d as d asd  asdasd">Test textasdasdasdasdsadasdasd asda s asd as as dasd asd asdasd asd asd</span>
                    <div class="weight">100</div>
                    <div class="admin-remove-dish">X</div>
                </div>
                <div class="admin-order-item">
                    <div class ="img-dish">
                        <img src="https://picsum.photos/200/130" alt="">
                    </div>
                    <div class="name-dish">Name</div>
                    <span class="description-dish" title="asdasdasd asd a sd as d as d as d as d asd as d as d asd as d as d as d asd  asdasd">Test textasdasdasdasdsadasdasd asda s asd as as dasd asd asdasd asd asd</span>
                    <div class="weight">100</div>
                    <div class="admin-remove-dish">X</div>
                </div>
                <div class="admin-order-item">
                    <div class ="img-dish">
                        <img src="https://picsum.photos/200/130" alt="">
                    </div>
                    <div class="name-dish">Name</div>
                    <span class="description-dish" title="asdasdasd asd a sd as d as d as d as d asd as d as d asd as d as d as d asd  asdasd">Test textasdasdasdasdsadasdasd asda s asd as as dasd asd asdasd asd asd</span>
                    <div class="weight">100</div>
                    <div class="admin-remove-dish">X</div>
                </div>
                <div class="admin-order-item">
                    <div class ="img-dish">
                        <img src="https://picsum.photos/200/130" alt="">
                    </div>
                    <div class="name-dish">Name</div>
                    <span class="description-dish" title="asdasdasd asd a sd as d as d as d as d asd as d as d asd as d as d as d asd  asdasd">Test textasdasdasdasdsadasdasd asda s asd as as dasd asd asdasd asd asd</span>
                    <div class="weight">100</div>
                    <div class="admin-remove-dish">X</div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes/footer')
