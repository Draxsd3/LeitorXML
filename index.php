<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload e Processamento de XML</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <div class="container flex-fill">
            <h1 class="my-4">Carregar e Processar XML</h1>
            <form id="uploadForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="xmlFile">Escolha um arquivo XML:</label>
                    <input type="file" class="form-control-file" id="xmlFile" name="xmlFile" accept=".xml" required>
                </div>
                <button type="submit" class="btn btn-primary">Carregar XML</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </form>

            <div id="result" class="mt-4"></div>
        </div>

        <footer class="footer mt-auto py-3 ">
            <div class="container">
                <span class="text-muted">© 2024 Direitos reservados para Renan Ramos.</span>
            </div>
        </footer>
    </div>

    <script>
        $(document).ready(function(){
            $('#uploadForm').on('submit', function(e){
                e.preventDefault(); 
                var formData = new FormData(this);
                
                $.ajax({
                    url: 'processar_xml.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#result').html(response); 
                    },
                    error: function(){
                        $('#result').html('<div class="alert alert-danger" role="alert">Erro ao processar o arquivo XML.</div>');
                    }
                });
            });
        });
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
