// Função para calcular a idade com base na data de nascimento
function calcularIdade(dataNascimento) {
    const dataNascimentoArray = dataNascimento.split('-');
    const anoNascimento = parseInt(dataNascimentoArray[0]);
    const mesNascimento = parseInt(dataNascimentoArray[1]);
    const diaNascimento = parseInt(dataNascimentoArray[2]);
  
    const dataAtual = new Date();
    const anoAtual = dataAtual.getFullYear();
    const mesAtual = dataAtual.getMonth() + 1;
    const diaAtual = dataAtual.getDate();
  
    let idade = anoAtual - anoNascimento;
  
    if (mesAtual < mesNascimento || (mesAtual === mesNascimento && diaAtual < diaNascimento)) {
      idade--;
    }
  
    return idade;
  }
  
  // Data de nascimento fornecida pelo usuário (no formato "AAAA-MM-DD")
  const dataNascimentoUsuario = "2000-05-15"; // Substitua por sua entrada real
  
  // Idade mínima permitida (18 anos, por exemplo)
  const idadeMinima = 18;
  
  // Calcula a idade com base na data de nascimento
  const idade = calcularIdade(dataNascimentoUsuario);
  
  // Verifica se a idade é maior ou igual à idade mínima
  if (idade >= idadeMinima) {
    console.log("Você é maior de idade. Acesso permitido.");
  } else {
    idade.setCustomValidity('ffdgddsfgdfsfd')
    console.log("Desculpe, você é menor de idade. Acesso negado.");
  }
  