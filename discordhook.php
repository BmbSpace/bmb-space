<?php
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$webhookUrl = 'https://discord.com/api/webhooks/1208135966540308550/-0E80keDl9SWdmhsKSw6d251-ZncE41eGCo1vm67_zixnX--NBd-ce_ipzK5JlC9RuhD';

$cargoId = ["1158901413133434990","1172564178544885770"]; // Insira o ID do cargo aqui

if (isset($_POST)) {
    $nome = $_POST['nome'];
    $ID = filter_input(INPUT_POST, 'ID');
    $data = filter_input(INPUT_POST, 'Data');
    $url = filter_input(INPUT_POST, 'URL');
    $descricao = filter_input(INPUT_POST, 'message');
    $file = $_FILES['arquivo'];

    

    $client = new Client();

    if ($file['error'] !== UPLOAD_ERR_OK) {
        // O upload do arquivo falhou, exiba uma mensagem de erro
        die('Erro ao enviar o arquivo');
    }

    $response = $client->request('POST', $webhookUrl, [
        'multipart' => [
            [
                'name' => 'payload_json',
                'contents' => json_encode([
                    'username' => 'Ouvidoria Space',
                    'content' => "Denúncia\n" .
                                "Nome: {$nome}\n" .
                                "ID: {$ID}\n" .
                                "Data: " . date('d/m/y', strtotime($data)) . "\n" .
                                "URL: {$url}\n" .
                                "Descrição: {$descricao}\n<@&{$cargoId[0]}> <@&{$cargoId[1]}>",
                    'embeds' => [
                        [
                            'title' => 'Imagem em anexo',
                            'image' => [
                                'url' => 'attachment://arquivo'
                            ]
                        ]
                    ],
                    'allowed_mentions' => [
                        'parse' => ['roles']
                    ]
                ])
            ],
            [
                'name' => 'arquivo',
                'contents' => fopen($file['tmp_name'], 'r'),
                'filename' => $file['name']
            ]
        ]
    ]);

    header("location:Registrado.html");
}
?>