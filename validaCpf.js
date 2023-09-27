function validaCpf() {
    var cpf = document.getElementById('cpf').value,
    cpfSoNumero = cpf.replace('.', '').replace('.', '').replace('-', ''),
    somaDosNovePrimeirosNumeros = multiplicarNumeros(9, cpfSoNumero, 10),
    somaDosDezPrimeirosNumeros =  multiplicarNumeros(10, cpfSoNumero, 11)
    resultadoModulo1 = obterODigitoVerificador(somaDosNovePrimeirosNumeros);
    resultadoModulo2 = obterODigitoVerificador(somaDosDezPrimeirosNumeros);
    

    if((resultadoModulo1 + resultadoModulo2) === cpfSoNumero.substr(9, 2)){
        alert('CPF Válido');

    }else {
        alert('CPF Inválido');
    }
}

function obterODigitoVerificador(soma) {
    var resultado = [soma * 10] % 11;
    return resultado.toString();
    
}

function multiplicarNumeros(quantidadeNumeros, cpfSoNumero, multiplicador) {
    var primeirosNumeros = cpfSoNumero.substr(0, quantidadeNumeros), somaDosNumeros = 0;

    for (var i = 0; i < primeirosNumeros.length; i++){
        
    var numero = primeirosNumeros.substr(i, 1);
    somaDosNumeros += numero * multiplicador;
    multiplicador--;

    }
    return somaDosNumeros;
}