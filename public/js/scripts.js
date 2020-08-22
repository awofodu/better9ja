$(document).ready(function(){
//     $('.menu-item').click(()=>{
//         if($(this).prop('id', window.location.href))
//         {
//             $(this).prop('class', 'menu-item menu-item-active');
//         }
//         // console.log(window.location)
//     });

    $('.next-register').click(()=>{
        let full_name = $('input.full-name').val();
        let email = $('input.email').val();
        let phone = $('input.phone').val();
        let address = $('input.address').val();
        let state = $('input.state').val();
        let country = $('select.country option:selected');

        $('form.register-form').find('div.full-name').html(full_name);
        $('form.register-form').find('div.email').html(email);
        $('form.register-form').find('div.phone').html(phone);
        $('form.register-form').find('div.address').html(address);
        $('form.register-form').find('div.state').html(state);
        $('form.register-form').find('div.country').html(country);
    })

});