function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
if(document.getElementById('rua')){
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");

}
}

function callback(conteudo) {
if ("erro" in conteudo && conteudo.erro == true) {
    Toast.fire({
        icon: 'error',
        title: 'Cep não encontrado.'
    })
}

if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    Livewire.emit('updateInfoIbge',{
        logradouro: conteudo.logradouro,
        bairro: conteudo.bairro,
        cidade: conteudo.localidade,
        uf: conteudo.uf
    })

} //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

var cep = valor.replace(/\D/g, '');
if (cep != "") {

    var validacep = /^[0-9]{8}$/;

    if(validacep.test(cep)) {

        document.getElementById('rua').value="...";
        document.getElementById('bairro').value="...";
        cidade = document.getElementById('cidade');
        if (cidade) cidade.value = "..."; 
        uf = document.getElementById('uf');
        if (uf) uf.value = "..."; 

        var script = document.createElement('script');

        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=callback';

        document.body.appendChild(script);

    }
    else {
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
}
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
};

