
<div style="margin-left: 400px; margin-top: 200px">
<?php
$valor = 5;
echo "Valor compra: " . number_format($valor, 2, ',', '.') . "<br>";
$parcelas = 3;
echo "Parcelas: " . $parcelas  . "<br><br>";

$valor_parcela = $valor / $parcelas;

$controle = 1;
$soma_valor_parcela = 0;

while($controle <= $parcelas){

    for ($i = 1; $i <= $parcelas; $i++){
        if ($controle == $parcelas) {
            $valor_ultima_parcela = $valor - $soma_valor_parcela;

            echo "Valor parcela $i/$parcelas: ". number_format($valor_ultima_parcela, 2, ',', '.') . "<br>";
            $soma_valor_parcela += number_format($valor_ultima_parcela, 2, '.', '');  
        } else {
        
            echo "Valor parcela $i/$parcelas: ". number_format($valor_parcela, 2, ',', '.') . "<br>";
            $soma_valor_parcela += number_format($valor_parcela, 2, '.', '');            
        }
        $controle++;
    }

}
echo "VALOR TOTAL: " . number_format($soma_valor_parcela, 2, '.', '.');


?>
</div>