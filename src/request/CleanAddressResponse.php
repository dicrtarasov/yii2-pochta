<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:32:12
 */

declare(strict_types = 1);
namespace dicr\pochta\request;

use dicr\pochta\Pochta;
use dicr\pochta\PochtaEntity;

use function in_array;

/**
 * Class CleanAddressResponse
 *
 * Анализируйте код качества (quality-code) и код проверки (validation-code) в ответах.
 * Код качества должен быть: GOOD, POSTAL_BOX, ON_DEMAND или UNDEF_05.
 * Код проверки должен быть: VALIDATED, OVERRIDDEN или CONFIRMED_MANUALLY.
 * Иначе нормализуемый адрес может быть неприемлем для доставки!
 *
 * @property-read bool $isOk
 *
 * @link https://otpravka.pochta.ru/specification#/nogroup-normalization_adress
 */
class CleanAddressResponse extends PochtaEntity implements Pochta
{
    /** тип адреса (ADDRESS_TYPE_*) */
    public ?string $addressType = null;

    /** район */
    public ?string $area = null;

    /** Часть здания: Строение */
    public ?string $building = null;

    /** Часть здания: Корпус */
    public ?string $corpus = null;

    /** Название гостиницы */
    public ?string $hotel = null;

    /** Часть адреса: Номер здания */
    public ?string $house = null;

    /** Идентификатор записи */
    public ?string $id = null;

    /** Почтовый индекс */
    public ?string $index = null;

    /** Часть здания: Литера */
    public ?string $letter = null;

    /** Микрорайон */
    public ?string $location = null;

    /** Номер для а/я, войсковая часть, войсковая часть ЮЯ, полевая почта */
    public ?string $numAddressType = null;

    /** Оригинальные адрес одной строкой */
    public ?string $originalAddress = null;

    /** Населенный пункт */
    public ?string $place = null;

    /** Код качества нормализации адреса (QUALITY_CODE_*) */
    public ?string $qualityCode = null;

    /** Область, регион */
    public ?string $region = null;

    /** Часть здания: Номер помещения */
    public ?string $room = null;

    /** Часть здания: Дробь */
    public ?string $slash = null;

    /** Часть адреса: Улица */
    public ?string $street = null;

    /** Код проверки нормализации адреса (VALIDATION_CODE_*) */
    public ?string $validationCode = null;

    /**
     * Проверка результата адреса на корректность.
     */
    public function getIsOk(): bool
    {
        return in_array($this->qualityCode, [
                self::QUALITY_CODE_GOOD, self::QUALITY_CODE_POSTAL_BOX, self::QUALITY_CODE_ON_DEMAND,
                self::QUALITY_CODE_UNDEF_05
            ], true) && in_array($this->validationCode, [
                self::VALIDATION_CODE_VALIDATED, self::VALIDATION_CODE_OVERRIDDEN,
                self::VALIDATION_CODE_CONFIRMED_MANUALLY
            ], true);
    }
}
