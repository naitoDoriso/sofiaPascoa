<?php
    $folder = '../database/';
    $path = '../database/db.json';
    if (!is_dir($folder)) {
        mkdir($folder);
        $folder = fopen($path, 'w');
        fwrite($folder, "{\n\n}");
        fclose($folder);
    }

    function verificar($fase){
        $path = '../database/db.json';
        $json = json_decode(file_get_contents($path), true);
        if (isset($json[$fase])) return true;
    }

    function inserir($fase){
        $path = '../database/db.json';
        if (isset($_COOKIE["nome"])) {
            $json = json_decode(file_get_contents($path),true);
            $json[$fase] = $_COOKIE["nome"];
            file_put_contents($path, json_encode($json, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
            unset($_COOKIE["nome"]);
        }
        if (!verificar($fase)) {
            echo "
            <script>(function() {
                var nome = prompt('Você foi o primeiro a achar esse ovo. Coloque seu nome:');
                document.cookie = 'nome='+nome;
                location.reload();
            })()
            </script>
            ";
        }
    }
?>