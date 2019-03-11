<?php
//função para subistituir um ou um conjunto do mesmo elemento
function substitui_onde_quero($termo, $novo, $string, $posicao="") {
    //se não mandar a posição em que deseja alterar, alterar todas como no str_replace
    if (empty($posicao)) {
        $junto = str_replace($termo, $novo, $string);
    } else {
        //se a var posicao não for array, torne-a array
        if (!is_array($posicao)) {
            $posicao = array($posicao);
        }
        //explode a string na ocorrencia desejada
        $separado = explode($termo, $string);
        //define valor default
        $junto = "";
        //Percorre os elementos concatenando o valor antigo como defatult
        //E o valor novo quando a posição estiver no array de posições passado no parametro
        foreach ($separado as $chave => $elemento) {
            if (!$chave > 0) {
                $junto .= $elemento;
            }else if (in_array($chave, $posicao)) {
                $junto .= $novo . $elemento;
            } else {
                $junto .= $termo . $elemento;
            }
        }
    }
	//retorna a string formatada
	return $junto;
}

//Recebe uma lista de pessoas
$pessoas = ["vitão", "bruno", "ighor"];
//Relaciona todas numa string
$pessoas = join(", ",$pessoas);
//Exibe a chamada da função recebendo o antigo valor, o novo valor, a string e a posição da ocorrencia do antigo valor na string.
print_r(substitui_onde_quero(","," e",$pessoas,1));
