<?php

/** 
 * Autores: Matheus Perger Estevão Bezerra
 * 			Matheus Menezes da Costa	
 * 
 * Sistemas Operacionais 
*/

// P0
$processos[0]['frame'] = 0;
$processos[0]['referencia'] = 260;
$processos[0]['carga'] = 230;
$processos[0]['BR'] = 1;
$processos[0]['BM'] = 0;
$processos[0]['tempo'] = 19;

// P1
$processos[1]['frame'] = 1;
$processos[1]['referencia'] = 279;
$processos[1]['carga'] = 126;
$processos[1]['BR'] = 0;
$processos[1]['BM'] = 0;
$processos[1]['tempo'] = 35;

// P2
$processos[2]['frame'] = 2;
$processos[2]['referencia'] = 280;
$processos[2]['carga'] = 160;
$processos[2]['BR'] = 1;
$processos[2]['BM'] = 1;
$processos[2]['tempo'] = 5;

// P3
$processos[3]['frame'] = 3;
$processos[3]['referencia'] = 272;
$processos[3]['carga'] = 120;
$processos[3]['BR'] = 1;
$processos[3]['BM'] = 1;
$processos[3]['tempo'] = 7;

// ALEATÓRIO
function aleatorio( $processos ) {
    $selecionado = rand(0, 3);
	formataSaida(array($processos[$selecionado]), "ALEATÓRIO");
}

// FIFO
function fifo( $processos ){
	formataSaida(array($processos[0]), "FIFO");
}

// LRU
function lru( $processos ){
	$menorValor = 0;
	$indiceMenorValor = 0;
	
	foreach($processos as $key => $value){
		if($key == 0){
			$menorValor = $value['tempo'];
			continue;
		}
		
		if($value['tempo'] < $menorValor){
			$menorValor = $value['tempo'];
			$indiceMenorValor = $key;
		}
	}
	
	formataSaida(array($processos[$indiceMenorValor]), "LRU");
}

// Função para formatar resultado (com HTML)
function formataSaida($result, $nomeRotina){

	$str = "<b>" . $nomeRotina . ":</b><br>";
	$str .= "<table border='1' style='border-collapse: collapse'>";
	$str .= "<thead><tr><td>Frame</td><td>Carga</td><td>Referência</td><td>BR</td><td>BM</td><td>Tempo</td></tr></thead>";
	foreach($result as $key => $values){
		$str .= "<tbody><tr>";
		$str .= "<td>" . $values['frame'] . "</td>";
		$str .= "<td>" . $values['referencia'] . "</td>";
		$str .= "<td>" . $values['carga'] . "</td>";
		$str .= "<td>" . $values['BR'] . "</td>";
		$str .= "<td>" . $values['BM'] . "</td>";
		$str .= "<td>" . $values['tempo'] . "</td>";
		$str .= "</tr></tbody>";
	}
	$str .= "</table>";
	$str .= "<br><br><br>";
	echo $str;
}

// IMPRIME TODOS
formataSaida($processos, "COMPLETO");

// IMPRIME ALEATÓRIO
aleatorio($processos);

// IMPRIME FIFO
fifo($processos);

// IMPRIME LRU
lru($processos);