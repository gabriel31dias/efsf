
     function passwordChangModal(id_user){
        const value =  Swal.fire({
        title: 'Digite a nova senha',
        input: 'password',
        confirmButtonText: 'Salvar',
        showCancelButton: true,
        inputPlaceholder: '',
        inputAttributes: {
            maxlength: 10,
            autocapitalize: 'off',
            autocorrect: 'off'
        }
        }).then((result) => {

            alert(result['value'])
            if (result.isConfirmed) {
                this.saveNewPassword(id_user, result['value'])
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
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

    function  saveNewPassword(id_user, password){
        Livewire.emit('updatePassword',{
            user_id: id_user,
            new_password: password
        })
    }



