
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['xmlFile'])) {
    $xmlFile = $_FILES['xmlFile']['tmp_name'];
    
    if (file_exists($xmlFile)) {
        $xml = simplexml_load_file($xmlFile);
        $namespaces = $xml->getNamespaces(true);
        $xml->registerXPathNamespace('nfe', $namespaces['']);

        $produtos = $xml->xpath('//nfe:det/nfe:prod');

        if ($produtos) {
            echo "<h2>Produtos no XML</h2>";
            echo "<table class='table'>";
            echo "<tr><th>Código</th><th>Descrição</th><th>Quantidade</th><th>Valor Unitário</th><th>Valor Total</th></tr>";
            
            foreach ($produtos as $produto) {
                echo "<tr>";
                echo "<td>" . $produto->cProd . "</td>";
                echo "<td>" . $produto->xProd . "</td>";
                echo "<td>" . $produto->qCom . "</td>";
                echo "<td>" . $produto->vUnCom . "</td>";
                echo "<td>" . $produto->vProd . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum produto encontrado no XML.";
        }
    } else {
        echo "Erro ao carregar o arquivo XML.";
    }
} else {
    echo "Método de requisição inválido ou arquivo XML não enviado.";
}
?>
