<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 14.02.21 22:15:04
 */

declare(strict_types = 1);
namespace dicr\pochta;

/**
 * Константы почты.
 */
interface Pochta
{
    /** @var string API Url */
    public const URL_API = 'https://otpravka-api.pochta.ru/';

    /** @var string */
    public const MAIL_CATEG_SIMPLE = 'SIMPLE';

    /** @var string */
    public const MAIL_CATEG_ORDERED = 'ORDERED';

    /** @var string */
    public const MAIL_CATEG_ORDINARY = 'ORDINARY';

    /** @var string */
    public const MAIL_CATEG_WITH_DECLARED_VALUE = 'WITH_DECLARED_VALUE';

    /** @var string */
    public const MAIL_CATEG_WITH_DECLARED_VALUE_AND_CASH_ON_DELIVERY = 'WITH_DECLARED_VALUE_AND_CASH_ON_DELIVERY';

    /** @var string */
    public const MAIL_CATEG_WITH_DECLARED_VALUE_AND_COMPULSORY_PAYMENT = 'WITH_DECLARED_VALUE_AND_COMPULSORY_PAYMENT';

    /** @var string */
    public const MAIL_CATEG_WITH_COMPULSORY_PAYMENT = 'WITH_COMPULSORY_PAYMENT';

    /** @var string */
    public const MAIL_CATEG_COMBINED = 'COMBINED';

    /**
     * @var string[] Категория РПО
     * @link https://otpravka.pochta.ru/specification#/enums-base-mail-category
     */
    public const MAIL_CATEG = [
        self::MAIL_CATEG_SIMPLE => 'Простое',
        self::MAIL_CATEG_ORDERED => 'Заказное',
        self::MAIL_CATEG_ORDINARY => 'Обыкновенное',
        self::MAIL_CATEG_WITH_DECLARED_VALUE => 'С объявленной ценностью',
        self::MAIL_CATEG_WITH_DECLARED_VALUE_AND_CASH_ON_DELIVERY => 'С объявленной ценностью и наложенным платежом',
        self::MAIL_CATEG_WITH_DECLARED_VALUE_AND_COMPULSORY_PAYMENT => 'С объявленной ценностью и обязательным платежом',
        self::MAIL_CATEG_WITH_COMPULSORY_PAYMENT => 'С обязательным платежом',
        self::MAIL_CATEG_COMBINED => 'Комбинированное'
    ];

    /** @var string */
    public const MAIL_TYPE_POSTAL_PARCEL = 'POSTAL_PARCEL';

    /** @var string */
    public const MAIL_TYPE_ONLINE_PARCEL = 'ONLINE_PARCEL';

    /** @var string */
    public const MAIL_TYPE_ONLINE_COURIER = 'ONLINE_COURIER';

    /** @var string */
    public const MAIL_TYPE_EMS = 'EMS';

    /** @var string */
    public const MAIL_TYPE_EMS_OPTIMAL = 'EMS_OPTIMAL';

    /** @var string */
    public const MAIL_TYPE_EMS_RT = 'EMS_RT';

    /** @var string */
    public const MAIL_TYPE_EMS_TENDER = 'EMS_TENDER';

    /** @var string */
    public const MAIL_TYPE_LETTER = 'LETTER';

    /** @var string */
    public const MAIL_TYPE_LETTER_CLASS_1 = 'LETTER_CLASS_1';

    /** @var string */
    public const MAIL_TYPE_BANDEROL = 'BANDEROL';

    /** @var string */
    public const MAIL_TYPE_BUSINESS_COURIER = 'BUSINESS_COURIER';

    /** @var string */
    public const MAIL_TYPE_BUSINESS_COURIER_ES = 'BUSINESS_COURIER_ES';

    /** @var string */
    public const MAIL_TYPE_PARCEL_CLASS_1 = 'PARCEL_CLASS_1';

    /** @var string */
    public const MAIL_TYPE_BANDEROL_CLASS_1 = 'BANDEROL_CLASS_1';

    /** @var string */
    public const MAIL_TYPE_VGPO_CLASS_1 = 'VGPO_CLASS_1';

    /** @var string */
    public const MAIL_TYPE_SMALL_PACKET = 'SMALL_PACKET';

    /** @var string */
    public const MAIL_TYPE_EASY_RETURN = 'EASY_RETURN';

    /** @var string */
    public const MAIL_TYPE_VSD = 'VSD';

    /** @var string */
    public const MAIL_TYPE_ECOM = 'ECOM';

    /** @var string */
    public const MAIL_TYPE_ECOM_MARKETPLACE = 'ECOM_MARKETPLACE';

    /** @var string */
    public const MAIL_TYPE_COMBINED = 'COMBINED';

    /**
     * @var string[] Вид РПО
     * @link https://otpravka.pochta.ru/specification#/enums-base-mail-type
     */
    public const MAIL_TYPE = [
        self::MAIL_TYPE_POSTAL_PARCEL => 'Посылка "нестандартная"',
        self::MAIL_TYPE_ONLINE_PARCEL => 'Посылка "онлайн"',
        self::MAIL_TYPE_ONLINE_COURIER => 'Курьер "онлайн"',
        self::MAIL_TYPE_EMS => 'Отправление EMS',
        self::MAIL_TYPE_EMS_OPTIMAL => 'EMS оптимальное',
        self::MAIL_TYPE_EMS_RT => 'EMS РТ',
        self::MAIL_TYPE_EMS_TENDER => 'EMS тендер',
        self::MAIL_TYPE_LETTER => 'Письмо',
        self::MAIL_TYPE_LETTER_CLASS_1 => 'Письмо 1-го класса',
        self::MAIL_TYPE_BANDEROL => 'Бандероль',
        self::MAIL_TYPE_BUSINESS_COURIER => 'Бизнес курьер',
        self::MAIL_TYPE_BUSINESS_COURIER_ES => 'Бизнес курьер экспресс',
        self::MAIL_TYPE_PARCEL_CLASS_1 => 'Посылка 1-го класса',
        self::MAIL_TYPE_BANDEROL_CLASS_1 => 'Бандероль 1-го класса',
        self::MAIL_TYPE_VGPO_CLASS_1 => 'ВГПО 1-го класса',
        self::MAIL_TYPE_SMALL_PACKET => 'Мелкий пакет',
        self::MAIL_TYPE_EASY_RETURN => 'Легкий возврат',
        self::MAIL_TYPE_VSD => 'Отправление ВСД',
        self::MAIL_TYPE_ECOM => 'ЕКОМ',
        self::MAIL_TYPE_ECOM_MARKETPLACE => 'ЕКОМ Маркетплейс',
        self::MAIL_TYPE_COMBINED => 'Комбинированное'
    ];

    /** @var string */
    public const PAYMENT_METHOD_CASHLESS = 'CASHLESS';

    /** @var string */
    public const PAYMENT_METHOD_STAMP = 'STAMP';

    /** @var string */
    public const PAYMENT_METHOD_FRANKING = 'FRANKING';

    /** @var string */
    public const PAYMENT_METHOD_TO_FRANKING = 'TO_FRANKING';

    /** @var string */
    public const PAYMENT_METHOD_ONLINE_PAYMENT_MARK = 'ONLINE_PAYMENT_MARK';

    /**
     * @var string[] Способы оплаты
     * @link https://otpravka.pochta.ru/specification#/enums-payment-methods
     */
    public const PAYMENT_METHOD = [
        self::PAYMENT_METHOD_CASHLESS => 'Безналичный расчет',
        self::PAYMENT_METHOD_STAMP => 'Оплата марками',
        self::PAYMENT_METHOD_FRANKING => 'Франкирование',
        self::PAYMENT_METHOD_TO_FRANKING => 'На франкировку',
        self::PAYMENT_METHOD_ONLINE_PAYMENT_MARK => 'Знак онлайн оплаты'
    ];

    /** @var string Стандартный (улица, дом, квартира) */
    public const ADDRESS_TYPE_DEFAULT = 'DEFAULT';

    /** @var string Абонентский ящик */
    public const ADDRESS_TYPE_PO_BOX = 'PO_BOX';

    /** @var string До востребования */
    public const ADDRESS_TYPE_DEMAND = 'DEMAND';

    /** @var string Для военных частей */
    public const ADDRESS_TYPE_UNIT = 'UNIT';

    /**
     * @var array Тип адреса
     * @link https://otpravka.pochta.ru/specification#/enums-base-address-type
     */
    public const ADDRESS_TYPE = [
        self::ADDRESS_TYPE_DEFAULT => 'Стандартный (улица, дом, квартира)',
        self::ADDRESS_TYPE_PO_BOX => 'Абонентский ящик',
        self::ADDRESS_TYPE_DEMAND => 'До востребования',
        self::ADDRESS_TYPE_UNIT => 'Для военных частей'
    ];

    /** @var string */
    public const QUALITY_CODE_GOOD = 'GOOD';

    /** @var string */
    public const QUALITY_CODE_ON_DEMAND = 'ON_DEMAND';

    /** @var string */
    public const QUALITY_CODE_POSTAL_BOX = 'POSTAL_BOX';

    /** @var string */
    public const QUALITY_CODE_UNDEF_01 = 'UNDEF_01';

    /** @var string */
    public const QUALITY_CODE_UNDEF_02 = 'UNDEF_02';

    /** @var string */
    public const QUALITY_CODE_UNDEF_03 = 'UNDEF_03';

    /** @var string */
    public const QUALITY_CODE_UNDEF_04 = 'UNDEF_04';

    /** @var string */
    public const QUALITY_CODE_UNDEF_05 = 'UNDEF_05';

    /** @var string */
    public const QUALITY_CODE_UNDEF_06 = 'UNDEF_06';

    /** @var string */
    public const QUALITY_CODE_UNDEF_07 = 'UNDEF_07';

    /**
     * @var string[] Код качества нормализации адреса
     * @link https://otpravka.pochta.ru/specification#/enums-clean-address-quality
     */
    public const QUALITY_CODE = [
        self::QUALITY_CODE_GOOD => 'Пригоден для почтовой рассылки',
        self::QUALITY_CODE_ON_DEMAND => 'До востребования',
        self::QUALITY_CODE_POSTAL_BOX => 'Абонентский ящик',
        self::QUALITY_CODE_UNDEF_01 => 'Не определен регион',
        self::QUALITY_CODE_UNDEF_02 => 'Не определен город или населенный пункт',
        self::QUALITY_CODE_UNDEF_03 => 'Не определена улица',
        self::QUALITY_CODE_UNDEF_04 => 'Не определен номер дома',
        self::QUALITY_CODE_UNDEF_05 => 'Не определена квартира/офис',
        self::QUALITY_CODE_UNDEF_06 => 'Не определен',
        self::QUALITY_CODE_UNDEF_07 => 'Иностранный адрес',
    ];

    /** @var string */
    public const VALIDATION_CODE_CONFIRMED_MANUALLY = 'CONFIRMED_MANUALLY';

    /** @var string */
    public const VALIDATION_CODE_VALIDATED = 'VALIDATED';

    /** @var string */
    public const VALIDATION_CODE_OVERRIDDEN = 'OVERRIDDEN';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_HAS_UNPARSED_PARTS = 'NOT_VALIDATED_HAS_UNPARSED_PARTS';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_HAS_ASSUMPTION = 'NOT_VALIDATED_HAS_ASSUMPTION';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_HAS_NO_MAIN_POINTS = 'NOT_VALIDATED_HAS_NO_MAIN_POINTS';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_HAS_NUMBER_STREET_ASSUMPTION = 'NOT_VALIDATED_HAS_NUMBER_STREET_ASSUMPTION';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_HAS_NO_KLADR_RECORD = 'NOT_VALIDATED_HAS_NO_KLADR_RECORD';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_HOUSE_WITHOUT_STREET_OR_NP = 'NOT_VALIDATED_HOUSE_WITHOUT_STREET_OR_NP';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_HOUSE_EXTENSION_WITHOUT_HOUSE = 'NOT_VALIDATED_HOUSE_EXTENSION_WITHOUT_HOUSE';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_HAS_AMBI = 'NOT_VALIDATED_HAS_AMBI';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_EXCEDED_HOUSE_NUMBER = 'NOT_VALIDATED_EXCEDED_HOUSE_NUMBER';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_INCORRECT_HOUSE = 'NOT_VALIDATED_INCORRECT_HOUSE';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_INCORRECT_HOUSE_EXTENSION = 'NOT_VALIDATED_INCORRECT_HOUSE_EXTENSION';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_FOREIGN = 'NOT_VALIDATED_FOREIGN';

    /** @var string */
    public const VALIDATION_CODE_NOT_VALIDATED_DICTIONARY = 'NOT_VALIDATED_DICTIONARY';

    /**
     * @var string[] Код проверки нормализации адреса
     * @link https://otpravka.pochta.ru/specification#/enums-clean-address-validation
     */
    public const VALIDATION_CODE = [
        self::VALIDATION_CODE_CONFIRMED_MANUALLY => 'Подтверждено контролером',
        self::VALIDATION_CODE_VALIDATED => 'Уверенное распознавание',
        self::VALIDATION_CODE_OVERRIDDEN => 'Распознан: адрес был перезаписан в справочнике',
        self::VALIDATION_CODE_NOT_VALIDATED_HAS_UNPARSED_PARTS => 'На проверку, неразобранные части',
        self::VALIDATION_CODE_NOT_VALIDATED_HAS_ASSUMPTION => 'На проверку, предположение',
        self::VALIDATION_CODE_NOT_VALIDATED_HAS_NO_MAIN_POINTS => 'На проверку, нет основных частей',
        self::VALIDATION_CODE_NOT_VALIDATED_HAS_NUMBER_STREET_ASSUMPTION => 'На проверку, предположение по улице',
        self::VALIDATION_CODE_NOT_VALIDATED_HAS_NO_KLADR_RECORD => 'На проверку, нет в КЛАДР',
        self::VALIDATION_CODE_NOT_VALIDATED_HOUSE_WITHOUT_STREET_OR_NP => 'На проверку, нет улицы или населенного пункта',
        self::VALIDATION_CODE_NOT_VALIDATED_HOUSE_EXTENSION_WITHOUT_HOUSE => 'На проверку, нет дома',
        self::VALIDATION_CODE_NOT_VALIDATED_HAS_AMBI => 'На проверку, неоднозначность',
        self::VALIDATION_CODE_NOT_VALIDATED_EXCEDED_HOUSE_NUMBER => 'На проверку, большой номер дома',
        self::VALIDATION_CODE_NOT_VALIDATED_INCORRECT_HOUSE => 'На проверку, некорректный дом',
        self::VALIDATION_CODE_NOT_VALIDATED_INCORRECT_HOUSE_EXTENSION => 'На проверку, некорректное расширение дома',
        self::VALIDATION_CODE_NOT_VALIDATED_FOREIGN => 'Иностранный адрес',
        self::VALIDATION_CODE_NOT_VALIDATED_DICTIONARY => 'На проверку, не по справочнику',
    ];

    /** @var string */
    public const DIMENSION_TYPE_S = 'S';

    /** @var string */
    public const DIMENSION_TYPE_M = 'M';

    /** @var string */
    public const DIMENSION_TYPE_L = 'L';

    /** @var string */
    public const DIMENSION_TYPE_XL = 'XL';

    /** @var string */
    public const DIMENSION_TYPE_OVERSIZED = 'OVERSIZED';

    /**
     * @var string[] Типоразмер
     * @link https://otpravka.pochta.ru/specification#/enums-dimension-type
     */
    public const DIMENSION_TYPE = [
        self::DIMENSION_TYPE_S => 'до 260х170х80 мм',
        self::DIMENSION_TYPE_M => 'до 300х200х150 мм',
        self::DIMENSION_TYPE_L => 'до 400х270х180 мм',
        self::DIMENSION_TYPE_XL => '530х260х220 мм',
        self::DIMENSION_TYPE_OVERSIZED => 'Негабарит (сумма сторон не более 1400 мм, сторона не более 600 мм)'
    ];

    /** @var string */
    public const ENTRIES_TYPE_GIFT = 'GIFT';

    /** @var string */
    public const ENTRIES_TYPE_DOCUMENT = 'DOCUMENT';

    /** @var string */
    public const ENTRIES_TYPE_SALE_OF_GOODS = 'SALE_OF_GOODS';

    /** @var string */
    public const ENTRIES_TYPE_COMMERCIAL_SAMPLE = 'COMMERCIAL_SAMPLE';

    /** @var string */
    public const ENTRIES_TYPE_OTHER = 'OTHER';

    /**
     * @var string[] Категория вложения
     * @link https://otpravka.pochta.ru/specification#/enums-base-entries-type
     */
    public const ENTRIES_TYPE = [
        self::ENTRIES_TYPE_GIFT => 'Подарок',
        self::ENTRIES_TYPE_DOCUMENT => 'Документы',
        self::ENTRIES_TYPE_SALE_OF_GOODS => 'Продажа товара',
        self::ENTRIES_TYPE_COMMERCIAL_SAMPLE => 'Коммерческий образец',
        self::ENTRIES_TYPE_OTHER => 'Прочее',
    ];

    /** @var string */
    public const TRANSPORT_TYPE_SURFACE = 'SURFACE';

    /** @var string */
    public const TRANSPORT_TYPE_AVIA = 'AVIA';

    /** @var string */
    public const TRANSPORT_TYPE_COMBINED = 'COMBINED';

    /** @var string */
    public const TRANSPORT_TYPE_EXPRESS = 'EXPRESS';

    /** @var string */
    public const TRANSPORT_TYPE_STANDARD = 'STANDARD';

    /**
     * @var string[] Вид транспортировки
     * @link https://otpravka.pochta.ru/specification#/enums-base-transport-type
     */
    public const TRANSPORT_TYPE = [
        self::TRANSPORT_TYPE_SURFACE => 'Наземный',
        self::TRANSPORT_TYPE_AVIA => 'Авиа',
        self::TRANSPORT_TYPE_COMBINED => 'Комбинированный',
        self::TRANSPORT_TYPE_EXPRESS => 'Системой ускоренной почты',
        self::TRANSPORT_TYPE_STANDARD => 'Используется для отправлений "EMS Оптимальное"',
    ];
}
