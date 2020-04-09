window.onload = function(){
    if(location.pathname === '/createNewDish' || location.pathname === '/editDish'){
        window.history.replaceState(null,null,location.origin +'/admin');
    }
}

$(document).on('click', '.dish-item', function () {
    $(this).toggleClass('active');
});

$(document).on('click', '.countUp', function () {
    let elPrice = $(this).parent().parent().find('.price');
    let el = $(this).parent().find('.count');
    let priceDish = $(this).parent().parent().find('.price').attr('data-price');
    let count = parseInt(el.text());
    let price = parseInt(elPrice.text());
    priceDish = parseInt(priceDish);
    el.text(count + 1);

    $(this).parent().find('.countVal').attr('value',count+1);
    elPrice.text(price + priceDish);
})

$(document).on('change','input[type="number"]',function(e){
    if($(this).val() <= 0 ){
        $(this).val(1);
    }
})


$(document).on('click', '.countDown', function () {
    let elPrice = $(this).parent().parent().find('.price');
    let el = $(this).parent().find('.count');
    let priceDish = $(this).parent().parent().find('.price').attr('data-price');
    let count = parseInt(el.text());
    let price = parseInt(elPrice.text());
    priceDish = parseInt(priceDish);
    if (count != 1) {
        el.text(count - 1);
        $(this).parent().find('.countVal').attr('value',count-1);
        elPrice.text(price - priceDish);
    }
})

$(document).on('click','.remove-dish',function(){
    $(this).parent().remove();
    if($('.content').children().find('form').length == 0){
        $('.submitOrder').remove();
        location.reload();
    }
});

$(document).on('click','.createShow',function(){
    if($('.create-new-dish').find('form').attr('action') == '/editDish'){
        location.reload();
    }
    $('.create-new-dish').removeAttr('hidden');
    $('.all-dish-edit').attr('hidden','');

});

$(document).on('click','.editShow',function(){
    $('.msg').attr('hidden','');
    $('.create-new-dish').attr('hidden','');
    $('.all-dish-edit').removeAttr('hidden');
})

$(document).on('click','.search-edit',function(){
    $(this).toggleClass('active');
})
    $(document).on('change','#add-photo',function(){
       let a = document.getElementById('add-photo').files[0];
       $('.new-img').attr('src',URL.createObjectURL(a));
    })

$(document).on('click','.confirm-order',function(){
    let data = $('.main').find('.active');
    if(data.length == 0){
        alert('Виберіть декілька страв для створення замовлення');
    }else{
        let dishId =[];
        for(let i of data){
            dishId.push(parseInt(i.getAttribute('data-id')));
        }
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/createOrder',
            data:{
                dishId
            },
            success:function(res){
                $('body').html(res.view);
                // document.location.href = '/order'
            }
        })
    }


});

$(document).on('click','.submitOrder',function () {
    $('.btnSubmit').trigger('click');
});

$(document).on('click','.admin-remove-dish',function (e) {

    let id = $(this).parent().attr('data-id');
    let curr = $(this).parent();
    let a = confirm('Видалити страву?');
    if(a){
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'remove-dish',
            data:{
                'id':id
            },
            success:function(res){
                if(res.removed){
                    curr.remove();
                    alert('Страву успішно видалено');
                }else{
                    alert('Помилка.Спробуйте пізніше');
                }
            }
        })
    }
});

$(document).on('click','.editDish',function(e){
   if(!$(e.target).hasClass('admin-remove-dish')){
       let id = $(this).attr('data-id');
       let data = JSON.parse($('.info-'+id).text());

       $('.create-new-dish').find('form').attr('action','/editDish');
       $('.all-dish-edit').attr('hidden','');
       $('.create-new-dish').removeAttr('hidden');

       $('.left-content').find('img').attr('src','./storage/Image/'+data.img);

       $('#name-dish').val(data.name);
       $('#create-price').val(data.price);
       $('#create-weight').val(data.weight);
       $('#create-descript').val(data.ingredients);
       $('.createDish').text('Редагувати');
       $('.id-dish').val(id);

   }
});


$(document).on('click','.startSearch',function(){
    let query = $(this).parent().find('input').val();

    $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'/search',
        data:{query},
        success:function(res){
            if(res.success){
                $('.order-content').find('.content').html(res.view);
            }else{
                $('.order-content').find('.content').html('Нічого не знайдено');
            }

        }
    });
})

