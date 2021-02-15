<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 15.02.21 01:08:21
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
    /** @var string тип адреса (ADDRESS_TYPE_*) */
    public $addressType;

    /** @var ?string район */
    public $area;

    /** @var ?string Часть здания: Строение */
    public $building;

    /** @var ?string Часть здания: Корпус */
    public $corpus;

    /** @var ?string Название гостиницы */
    public $hotel;

    /** @var ?string Часть адреса: Номер здания */
    public $house;

    /** @var string Идентификатор записи */
    public $id;

    /** @var string Почтовый индекс */
    public $index;

    /** @var ?string Часть здания: Литера */
    public $letter;

    /** @var ?string Микрорайон */
    public $location;

    /** @var ?string Номер для а/я, войсковая часть, войсковая часть ЮЯ, полевая почта */
    public $numAddressType;

    /** @var string Оригинальные адрес одной строкой */
    public $originalAddress;

    /** @var string Населенный пункт */
    public $place;

    /** @var string Код качества нормализации адреса (QUALITY_CODE_*) */
    public $qualityCode;

    /** @var string Область, регион */
    public $region;

    /** @var ?string Часть здания: Номер помещения */
    public $room;

    /** @var ?string Часть здания: Дробь */
    public $slash;

    /** @var ?string Часть адреса: Улица */
    public $street;

    /** @var string Код проверки нормализации адреса (VALIDATION_CODE_*) */
    public $validationCode;

    /**
     * Проверка результата адреса на корректность.
     *
     * @return bool
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
