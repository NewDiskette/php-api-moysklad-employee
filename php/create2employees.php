<?php

include 'token.php';

$link = 'https://online.moysklad.ru/api/remap/1.2/entity/employee';

$headers = [
    'Authorization: Bearer ' . $token,
    'Content-Type: application/json'
];
$params = [
    [
        'firstName' => 'Дмитрий',
        'middleName' => 'Иванович',
        'lastName' => 'Сорокин',
        'inn' => '222490425273',
        'position' => 'Менеджер',
        'phone' => '+7(999)888-7700',
        'description' => 'Описание'
    ],
    [
        'firstName' => 'Петр',
        'middleName' => 'Александрович',
        'lastName' => 'Птицин',
        'inn' => '222490425959',
        'position' => 'Менеджер',
        'phone' => '+7(999)888-9933',
        'description' => 'Описание'
    ],
];

$jsonParams = json_encode($params, JSON_UNESCAPED_UNICODE);

/**
 * Нам необходимо инициировать запрос к серверу.
 * Воспользуемся библиотекой cURL (поставляется в составе PHP).
 * Вы также можете использовать и кроссплатформенную программу cURL, если вы не программируете на PHP.
 */
$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
/** Устанавливаем необходимые опции для сеанса cURL  */
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonParams);

curl_exec($curl); //Инициируем запрос к API
