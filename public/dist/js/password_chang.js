
    async function passwordChangModal(){
        const { value: password } = await Swal.fire({
        title: 'Digite a nova senha',
        input: 'password',
        confirmButtonText: 'Salvar',
        inputPlaceholder: '',
        inputAttributes: {
            maxlength: 10,
            autocapitalize: 'off',
            autocorrect: 'off'
        }
        })

        if (password) {
            Swal.fire(
                'Senha Alterado',
                '',
                'success'
              )
        }
    }



