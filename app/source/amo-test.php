<?php
$subdomain = 'alekseykarpelev'; //Поддомен нужного аккаунта
$link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса

/** Соберем данные для запроса */
$data = [
    'client_id' => 'a74063f2-7826-4805-88d0-1982a69be5d0',
    'client_secret' => 'RXzgHv2L7TEwx10GkNsJJIcoPKqT3bAsIbe8KV8q4A5ULNmp0l5mjRT3fQkieZbc',
    'grant_type' => 'authorization_code',
    'code' => 'def50200693da361f60849198917fb7b4b4aac4af27e83dd4178b4f71e5f55656ce4d7acaf93e127dcf646148a3b04c02ba5f074fa7afa738e8a034e726a61403534c9a845a0d929220295b7ce7c7c61b3767f819c0358005678ef73808f336a290cf6cff62bfc6d196000c4b67b6dfc9a4bf3f7dbbf8033b4c660fa3e3829ea4f05b86dde7c1836671fb462b0261b37af6c1b7701a41e1c58f062c7b377b9a9a1cbe5ba7f63c4c3b975502b34ea949f3a7b3da218d31a8d3e4d8013a2053e7a52ca9506dcb99235844df90e19a9c8c764bb788d4380ac8d68b31a722dc39c414ca6f67c34f2e9aad8b95bfc8643e7ec403033a9e2325a305d29b45a575427d39eceafc1553e47d30ea1d28ecbfdb6e79ff3091d66205e78a8d84cf7ab3a1937dd5947ede4d2a70239ba7035a99d724c57ffaf3fc5aea281fbb6f65427a4e12785f8c5ec47a320cb05fd9eac8b52427c3ceb7143932b200392ae5f348ecd372b17cf27f7d0a2e6269ad08f5cd4dc2386211ff3067ec763ec00fb7f0d8c09cea6f2f3f9b0463ee1c4af513adfcca8fd36dd81cf59efa291a4c64e5e6785aea325029983338429ceda03cfee2586d6ab4e30882b57ea186c71ad727f370bb0e6935f80a3',
    'redirect_uri' => 'https://karpelev.com/amo/',
];

/**
 * Нам необходимо инициировать запрос к серверу.
 * Воспользуемся библиотекой cURL (поставляется в составе PHP).
 * Вы также можете использовать и кроссплатформенную программу cURL, если вы не программируете на PHP.
 */
$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
/** Устанавливаем необходимые опции для сеанса cURL  */
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
/** Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
$code = (int)$code;
$errors = [
    400 => 'Bad request',
    401 => 'Unauthorized',
    403 => 'Forbidden',
    404 => 'Not found',
    500 => 'Internal server error',
    502 => 'Bad gateway',
    503 => 'Service unavailable',
];

try
{
    /** Если код ответа не успешный - возвращаем сообщение об ошибке  */
    if ($code < 200 || $code > 204) {
        throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
    }
}
catch(\Exception $e)
{
    die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
}

/**
 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
 * нам придётся перевести ответ в формат, понятный PHP
 */
$response = json_decode($out, true);

$access_token = $response['access_token']; //Access токен
$refresh_token = $response['refresh_token']; //Refresh токен
$token_type = $response['token_type']; //Тип токена
$expires_in = $response['expires_in']; //Че
