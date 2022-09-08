function passwordExpiredChangModal(id_user){

    const value =  Swal.fire({
    title: 'Atualize sua senha, digite sua senha atual.',
    input: 'password',
    imageUrl: '../dist/img/pass.png',
    imageWidth: 300,
    imageHeight: 200,
    confirmButtonText: 'Avançar',
    showCancelButton: false,
    inputPlaceholder: '',
    inputAttributes: {
        maxlength: 10,
        autocapitalize: 'off',
        autocorrect: 'off'
    },
    allowOutsideClick: false,
    inputValidator:  (value) => {
        if (!value) return 'A senha não pode fircar em branco.'

        if (!value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#=-])[0-9a-zA-Z$*&@#=-]{8,}$/)) return 'A senha deve conter letras maiúsculas, minúsculas, número e símbolos'


    }
    }).then((result) => {
        if (result.isConfirmed) {
            setNewPassword(id_user)
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })

}


function setNewPassword(id_user){
    const value =  Swal.fire({

        title: 'Digite a nova senha',
        input: 'password',
        imageUrl: '../dist/img/pass.png',
        imageWidth: 300,
        imageHeight: 200,
        confirmButtonText: 'Avançar',
        showCancelButton: false,
        inputPlaceholder: '',
        inputAttributes: {
            maxlength: 10,
            autocapitalize: 'off',
            autocorrect: 'off'
        },
        allowOutsideClick: false,
        inputValidator: async (value) => {

            if (!value) return 'A senha não pode fircar em branco.'

            if (!value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#=-])[0-9a-zA-Z$*&@#=-]{8,}$/)) return 'A senha deve conter letras maiúsculas, minúsculas, número e símbolos'

            let checkPassword =  await axios.post('/checkequalpassword',{
                user_id: id_user,
                password: value
            });

            if(checkPassword.data.is_correct == false)  return 'A senha atual esta errada.'
        }
        }).then((result) => {
            if (result.isConfirmed) {
                confirmNewPassword(id_user, result.value)
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
}

function confirmNewPassword(id_user, password){
    const value =  Swal.fire({
        title: 'Confirme a nova senha',
        input: 'password',
        imageUrl: '../dist/img/pass.png',
        imageWidth: 300,
        imageHeight: 200,
        confirmButtonText: 'Avançar',
        showCancelButton: false,
        inputPlaceholder: '',
        inputAttributes: {
            maxlength: 10,
            autocapitalize: 'off',
            autocorrect: 'off'
        },
        allowOutsideClick: false,
        inputValidator: async (value) => {

            if (!value) return 'A senha não pode fircar em branco.'

            if (value !== password) return 'A senha não esta igual á primeira.'

            if (!value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#=-])[0-9a-zA-Z$*&@#=-]{8,}$/)) return 'A senha deve conter letras maiúsculas, minúsculas, número e símbolos'


            let savePassword =  await axios.post('/savepassword',{
                user_id: id_user,
                password: value
            });

            if(savePassword.data.result == true){
                Swal.fire('Changes are not saved', '', 'success')
            }
        }
        }).then((result) => {
            if (result.isConfirmed) {

            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
}

