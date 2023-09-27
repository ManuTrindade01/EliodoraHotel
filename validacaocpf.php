<?php

class Validar 
{
    function ValidaCpf($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verificar se o CPF tem 11 dígitos
        if (strlen($cpf) !== 11) {
            return false;
        }

        // Verificar CPF repetido
        if (preg_match('/^(\d)\1*$/', $cpf)) {
            return false;
        }

        // Cálculo do primeiro dígito verificador
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += $cpf[$i] * (10 - $i);
        }
        $resto = $soma % 11;
        $digitoVerificador1 = ($resto < 2) ? 0 : 11 - $resto;

        // Verificação do primeiro dígito verificador
        if ($cpf[9] != $digitoVerificador1) {
            return false;
        }

        // Cálculo do segundo dígito verificador
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += $cpf[$i] * (11 - $i);
        }
        $resto = $soma % 11;
        $digitoVerificador2 = ($resto < 2) ? 0 : 11 - $resto;

        // Verificação do segundo dígito verificador
        if ($cpf[10] != $digitoVerificador2) {
            return false;
        }

        return true;
    }   
}
?>
