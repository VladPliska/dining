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
    elPrice.text(price + priceDish);
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
        elPrice.text(price - priceDish);
    }
})

$(document).on('click','.remove-dish',function(){
    $(this).parent().remove();
});

$(document).on('click','.createShow',function(){
    $('.create-new-dish').removeAttr('hidden');
    $('.all-dish-edit').attr('hidden','');
});

$(document).on('click','.editShow',function(){
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

