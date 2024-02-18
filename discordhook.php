<?php
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$webhookUrl = 'https://discord.com/api/webhooks/1208135966540308550/-0E80keDl9SWdmhsKSw6d251-ZncE41eGCo1vm67_zixnX--NBd-ce_ipzK5JlC9RuhD';

if (isset($_POST)) {
    $nome = $_POST['nome'];
    $ID = filter_input(INPUT_POST, 'ID');
    $data = filter_input(INPUT_POST, 'Data');
    $url = filter_input(INPUT_POST, 'URL');
    $descricao = filter_input(INPUT_POST, 'message');
    $file = $_FILES['arquivo'];

    $client = new Client();

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
                                "Descrição: {$descricao}",
                    'embeds' => [
                        [
                            'title' => 'Imagem em anexo',
                            'image' => [
                                'url' => 'attachment://arquivo'
                            ]
                        ]
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