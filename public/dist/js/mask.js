


document.addEventListener('turbolinks:load', () => {
    var phoneMask = IMask(
        document.querySelector('.phone'), {
        mask: '(00)00000-0000'
    });

    var cpfMask = IMask(
        document.querySelector('.cpf'), {
        mask: '000.000.000-00'
    });


})
