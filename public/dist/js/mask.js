


document.addEventListener('turbolinks:load', () => {

    if(document.querySelector('.phone')){
        var phoneMask = IMask(
            document.querySelector('.phone'), {
            mask: '(00)00000-0000'
        });
    }

    if( document.querySelector('.cpf')){
        var cpfMask = IMask(
            document.querySelector('.cpf'), {
            mask: '000.000.000-00'
        });
    }

})
