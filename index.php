<?php
require_once 'vendor/autoload.php';

use \DiscordWebhooks\Client;
use \DiscordWebhooks\Embed;

$webhooks = new Client('https://discord.com/api/webhooks/1208135966540308550/-0E80keDl9SWdmhsKSw6d251-ZncE41eGCo1vm67_zixnX--NBd-ce_ipzK5JlC9RuhD');
$message = new Embed();

if (isset($_POST)) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $ID = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    $message->description(
        "Nome: {$nome}<br>" .
        "ID: {$ID}<br>" .
        "Data: {$data}<br>" .
        "Descrição: {$descricao}"
    );
}

$webhooks->username('Bot_Ouvidoria Space')->message('Denuncia')->embed($message)->send();
?>