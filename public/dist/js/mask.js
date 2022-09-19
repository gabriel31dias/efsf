


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


    if( document.querySelector('.date')){
        var element = document.querySelector('.date');
        var momentMask = new IMask(element, {
            mask: '00/00/0000'
        });

    }

    if( document.querySelector('.pis_pasep')){
        var cpfMask = IMask(
            document.querySelector('.pis_pasep'), {
            mask: '00000000000'
        });
    }

    if( document.querySelector('.nis')){
        var cpfMask = IMask(
            document.querySelector('.nis'), {
            mask: '00000000000-00'
        });
    }

    if( document.querySelector('.nit')){
        var cpfMask = IMask(
            document.querySelector('.nit'), {
            mask: '00000000000-00'
        });
    }
})
