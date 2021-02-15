# Почта API для Yii2

## Настройка

```php
$config = [
    'components' => [
        'pochta' => [
            'class' => dicr\pochta\PochtaAPI::class,
            'token' => '<токен API>',
            'login' => '<логин личного кабинета>',
            'pass' => '<пароль от личного кабинета>'
        ]
    ]       
];
```

## Использование

### Расчёт стоимости доставки

```php
/** @var dicr\pochta\PochtaAPI $api */
$api = Yii::$app->get('pochta');

/** @var dicr\pochta\request\TariffRequest $request создаем запрос */
$request = $api->tariffRequest([
    'declaredValue' => 200000, // 2 тыс руб 
    'indexFrom' => 614107, // Пермь
    'indexTo' => 105037, // Москва
    'mass' => 800, // 800 грамм
    'dimension' => ['height' => 25, 'length' => 15, 'width' => 10], // в сантиметрах
    'mailCategory' => dicr\pochta\Pochta::MAIL_CATEG_WITH_DECLARED_VALUE_AND_CASH_ON_DELIVERY,
    'mailType' => dicr\pochta\Pochta::MAIL_TYPE_ONLINE_PARCEL,
    'paymentMethod' => dicr\pochta\Pochta::PAYMENT_METHOD_CASHLESS
]);

/** @var dicr\pochta\request\TariffResponse $response отправляем запрос */
$response = $request->send();

printf("Срок: %d дней\n", $response->deliveryTime->maxDays);
printf("Стоимость %.2f руб.\n", $response->totalRate / 100);
```
