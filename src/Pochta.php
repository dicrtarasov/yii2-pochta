<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:20:51
 */

declare(strict_types = 1);
namespace dicr\pochta;

/**
 * Константы почты.
 */
interface Pochta
{
    /** API Url */
    public const URL_API = 'https://otpravka-api.pochta.ru/';

    public const MAIL_CATEG_SIMPLE = 'SIMPLE';

    public const MAIL_CATEG_ORDERED = 'ORDERED';

    public const MAIL_CATEG_ORDINARY = 'ORDINARY';

    public const MAIL_CATEG_WITH_DECLARED_VALUE = 'WITH_DECLARED_VALUE';

    public const MAIL_CATEG_WITH_DECLARED_VALUE_AND_CASH_ON_DELIVERY = 'WITH_DECLARED_VALUE_AND_CASH_ON_DELIVERY';

    public const MAIL_CATEG_WITH_DECLARED_VALUE_AND_COMPULSORY_PAYMENT = 'WITH_DECLARED_VALUE_AND_COMPULSORY_PAYMENT';

    public const MAIL_CATEG_WITH_COMPULSORY_PAYMENT = 'WITH_COMPULSORY_PAYMENT';

    public const MAIL_CATEG_COMBINED = 'COMBINED';

    /**
     * Категория РПО
     *
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

    public const MAIL_TYPE_POSTAL_PARCEL = 'POSTAL_PARCEL';

    public const MAIL_TYPE_ONLINE_PARCEL = 'ONLINE_PARCEL';

    public const MAIL_TYPE_ONLINE_COURIER = 'ONLINE_COURIER';

    public const MAIL_TYPE_EMS = 'EMS';

    public const MAIL_TYPE_EMS_OPTIMAL = 'EMS_OPTIMAL';

    public const MAIL_TYPE_EMS_RT = 'EMS_RT';

    public const MAIL_TYPE_EMS_TENDER = 'EMS_TENDER';

    public const MAIL_TYPE_LETTER = 'LETTER';

    public const MAIL_TYPE_LETTER_CLASS_1 = 'LETTER_CLASS_1';

    public const MAIL_TYPE_BANDEROL = 'BANDEROL';

    public const MAIL_TYPE_BUSINESS_COURIER = 'BUSINESS_COURIER';

    public const MAIL_TYPE_BUSINESS_COURIER_ES = 'BUSINESS_COURIER_ES';

    public const MAIL_TYPE_PARCEL_CLASS_1 = 'PARCEL_CLASS_1';

    public const MAIL_TYPE_BANDEROL_CLASS_1 = 'BANDEROL_CLASS_1';

    public const MAIL_TYPE_VGPO_CLASS_1 = 'VGPO_CLASS_1';

    public const MAIL_TYPE_SMALL_PACKET = 'SMALL_PACKET';

    public const MAIL_TYPE_EASY_RETURN = 'EASY_RETURN';

    public const MAIL_TYPE_VSD = 'VSD';

    public const MAIL_TYPE_ECOM = 'ECOM';

    public const MAIL_TYPE_ECOM_MARKETPLACE = 'ECOM_MARKETPLACE';

    public const MAIL_TYPE_COMBINED = 'COMBINED';

    /**
     * Вид РПО
     *
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

    public const PAYMENT_METHOD_CASHLESS = 'CASHLESS';

    public const PAYMENT_METHOD_STAMP = 'STAMP';

    public const PAYMENT_METHOD_FRANKING = 'FRANKING';

    public const PAYMENT_METHOD_TO_FRANKING = 'TO_FRANKING';

    public const PAYMENT_METHOD_ONLINE_PAYMENT_MARK = 'ONLINE_PAYMENT_MARK';

    /**
     * Способы оплаты
     *
     * @link https://otpravka.pochta.ru/specification#/enums-payment-methods
     */
    public const PAYMENT_METHOD = [
        self::PAYMENT_METHOD_CASHLESS => 'Безналичный расчет',
        self::PAYMENT_METHOD_STAMP => 'Оплата марками',
        self::PAYMENT_METHOD_FRANKING => 'Франкирование',
        self::PAYMENT_METHOD_TO_FRANKING => 'На франкировку',
        self::PAYMENT_METHOD_ONLINE_PAYMENT_MARK => 'Знак онлайн оплаты'
    ];

    /** Стандартный (улица, дом, квартира) */
    public const ADDRESS_TYPE_DEFAULT = 'DEFAULT';

    /** Абонентский ящик */
    public const ADDRESS_TYPE_PO_BOX = 'PO_BOX';

    /** До востребования */
    public const ADDRESS_TYPE_DEMAND = 'DEMAND';

    /** Для военных частей */
    public const ADDRESS_TYPE_UNIT = 'UNIT';

    /**
     * Тип адреса
     *
     * @link https://otpravka.pochta.ru/specification#/enums-base-address-type
     */
    public const ADDRESS_TYPE = [
        self::ADDRESS_TYPE_DEFAULT => 'Стандартный (улица, дом, квартира)',
        self::ADDRESS_TYPE_PO_BOX => 'Абонентский ящик',
        self::ADDRESS_TYPE_DEMAND => 'До востребования',
        self::ADDRESS_TYPE_UNIT => 'Для военных частей'
    ];

    public const QUALITY_CODE_GOOD = 'GOOD';

    public const QUALITY_CODE_ON_DEMAND = 'ON_DEMAND';

    public const QUALITY_CODE_POSTAL_BOX = 'POSTAL_BOX';

    public const QUALITY_CODE_UNDEF_01 = 'UNDEF_01';

    public const QUALITY_CODE_UNDEF_02 = 'UNDEF_02';

    public const QUALITY_CODE_UNDEF_03 = 'UNDEF_03';

    public const QUALITY_CODE_UNDEF_04 = 'UNDEF_04';

    public const QUALITY_CODE_UNDEF_05 = 'UNDEF_05';

    public const QUALITY_CODE_UNDEF_06 = 'UNDEF_06';

    public const QUALITY_CODE_UNDEF_07 = 'UNDEF_07';

    /**
     * Код качества нормализации адреса
     *
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

    public const VALIDATION_CODE_CONFIRMED_MANUALLY = 'CONFIRMED_MANUALLY';

    public const VALIDATION_CODE_VALIDATED = 'VALIDATED';

    public const VALIDATION_CODE_OVERRIDDEN = 'OVERRIDDEN';

    public const VALIDATION_CODE_NOT_VALIDATED_HAS_UNPARSED_PARTS = 'NOT_VALIDATED_HAS_UNPARSED_PARTS';

    public const VALIDATION_CODE_NOT_VALIDATED_HAS_ASSUMPTION = 'NOT_VALIDATED_HAS_ASSUMPTION';

    public const VALIDATION_CODE_NOT_VALIDATED_HAS_NO_MAIN_POINTS = 'NOT_VALIDATED_HAS_NO_MAIN_POINTS';

    public const VALIDATION_CODE_NOT_VALIDATED_HAS_NUMBER_STREET_ASSUMPTION = 'NOT_VALIDATED_HAS_NUMBER_STREET_ASSUMPTION';

    public const VALIDATION_CODE_NOT_VALIDATED_HAS_NO_KLADR_RECORD = 'NOT_VALIDATED_HAS_NO_KLADR_RECORD';

    public const VALIDATION_CODE_NOT_VALIDATED_HOUSE_WITHOUT_STREET_OR_NP = 'NOT_VALIDATED_HOUSE_WITHOUT_STREET_OR_NP';

    public const VALIDATION_CODE_NOT_VALIDATED_HOUSE_EXTENSION_WITHOUT_HOUSE = 'NOT_VALIDATED_HOUSE_EXTENSION_WITHOUT_HOUSE';

    public const VALIDATION_CODE_NOT_VALIDATED_HAS_AMBI = 'NOT_VALIDATED_HAS_AMBI';

    public const VALIDATION_CODE_NOT_VALIDATED_EXCEDED_HOUSE_NUMBER = 'NOT_VALIDATED_EXCEDED_HOUSE_NUMBER';

    public const VALIDATION_CODE_NOT_VALIDATED_INCORRECT_HOUSE = 'NOT_VALIDATED_INCORRECT_HOUSE';

    public const VALIDATION_CODE_NOT_VALIDATED_INCORRECT_HOUSE_EXTENSION = 'NOT_VALIDATED_INCORRECT_HOUSE_EXTENSION';

    public const VALIDATION_CODE_NOT_VALIDATED_FOREIGN = 'NOT_VALIDATED_FOREIGN';

    public const VALIDATION_CODE_NOT_VALIDATED_DICTIONARY = 'NOT_VALIDATED_DICTIONARY';

    /**
     * Код проверки нормализации адреса
     *
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

    public const DIMENSION_TYPE_S = 'S';

    public const DIMENSION_TYPE_M = 'M';

    public const DIMENSION_TYPE_L = 'L';

    public const DIMENSION_TYPE_XL = 'XL';

    public const DIMENSION_TYPE_OVERSIZED = 'OVERSIZED';

    /**
     * Типоразмер.
     *
     * @link https://otpravka.pochta.ru/specification#/enums-dimension-type
     */
    public const DIMENSION_TYPE = [
        self::DIMENSION_TYPE_S => 'до 260х170х80 мм',
        self::DIMENSION_TYPE_M => 'до 300х200х150 мм',
        self::DIMENSION_TYPE_L => 'до 400х270х180 мм',
        self::DIMENSION_TYPE_XL => '530х260х220 мм',
        self::DIMENSION_TYPE_OVERSIZED => 'Негабарит (сумма сторон не более 1400 мм, сторона не более 600 мм)'
    ];

    public const ENTRIES_TYPE_GIFT = 'GIFT';

    public const ENTRIES_TYPE_DOCUMENT = 'DOCUMENT';

    public const ENTRIES_TYPE_SALE_OF_GOODS = 'SALE_OF_GOODS';

    public const ENTRIES_TYPE_COMMERCIAL_SAMPLE = 'COMMERCIAL_SAMPLE';

    public const ENTRIES_TYPE_OTHER = 'OTHER';

    /**
     * Категория вложения
     *
     * @link https://otpravka.pochta.ru/specification#/enums-base-entries-type
     */
    public const ENTRIES_TYPE = [
        self::ENTRIES_TYPE_GIFT => 'Подарок',
        self::ENTRIES_TYPE_DOCUMENT => 'Документы',
        self::ENTRIES_TYPE_SALE_OF_GOODS => 'Продажа товара',
        self::ENTRIES_TYPE_COMMERCIAL_SAMPLE => 'Коммерческий образец',
        self::ENTRIES_TYPE_OTHER => 'Прочее',
    ];

    public const TRANSPORT_TYPE_SURFACE = 'SURFACE';

    public const TRANSPORT_TYPE_AVIA = 'AVIA';

    public const TRANSPORT_TYPE_COMBINED = 'COMBINED';

    public const TRANSPORT_TYPE_EXPRESS = 'EXPRESS';

    public const TRANSPORT_TYPE_STANDARD = 'STANDARD';

    /**
     * Вид транспортировки
     *
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
