<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 14.02.21 06:45:51
 */

declare(strict_types = 1);
namespace dicr\tests;

use dicr\pochta\Pochta;
use dicr\pochta\PochtaAPI;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;

/**
 * Class TariffRequestTest
 */
class TariffRequestTest extends TestCase
{
    /**
     * Модуль.
     *
     * @return PochtaAPI
     * @throws InvalidConfigException
     */
    private static function api(): PochtaAPI
    {
        return Yii::$app->get('pochta');
    }

    /**
     * @throws Exception
     * @noinspection PhpUnitMissingTargetForTestInspection
     */
    public function testRequest(): void
    {
        $request = self::api()->tariffRequest([
            'declaredValue' => 200000,
            'indexFrom' => 614107, // Пермь
            'indexTo' => 105037, // Москва
            'mass' => 800,
            'dimension' => ['height' => 25, 'length' => 15, 'width' => 10],
            'mailCategory' => Pochta::MAIL_CATEG_WITH_DECLARED_VALUE_AND_CASH_ON_DELIVERY,
            'mailType' => Pochta::MAIL_TYPE_ONLINE_PARCEL,
            'paymentMethod' => Pochta::PAYMENT_METHOD_CASHLESS
        ]);

        $response = $request->send();
        self::assertIsNumeric($response->deliveryTime->maxDays);
        printf("Срок: %d дней\n", $response->deliveryTime->maxDays);

        self::assertIsNumeric($response->totalRate);
        printf("Стоимость %.2f руб.\n", $response->totalRate / 100);
    }
}
