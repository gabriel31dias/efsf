function passwordExpiredChangModal(id_user){
    const value =  Swal.fire({
    title: 'Digite a nova senha.',
    input: 'password',
    confirmButtonText: 'Salvar',
    showCancelButton: true,
    inputPlaceholder: '',
    inputAttributes: {
        maxlength: 10,
        autocapitalize: 'off',
        autocorrect: 'off'
    },
    inputValidator: (value) => {
        if (!value) return 'A senha não pode fircar em branco.'

        if (!value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#=-])[0-9a-zA-Z$*&@#=-]{8,}$/)) return 'A senha deve conter letras maiúsculas, minúsculas, número e símbolos'

    }
    }).then((result) => {
        if (result.isConfirmed) {
            modalChang(result)
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })

}
