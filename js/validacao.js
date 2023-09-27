function validar() {
    //pegando o valor do nome pelos names
    var nome = formulario.nome;

    //verificar se o nome está vazio
    if (nome.value == "") {
        alert("Nome não informado");

        //Deixa o input com o focus
        nome.focus();
    }
}