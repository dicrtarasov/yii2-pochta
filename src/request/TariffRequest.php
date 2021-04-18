<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 18.04.21 13:54:27
 */

declare(strict_types = 1);
namespace dicr\pochta\request;

use dicr\json\EntityValidator;
use dicr\pochta\entity\Dimension;
use dicr\pochta\Pochta;
use dicr\pochta\PochtaRequest;
use dicr\validate\ValidateException;

use function array_keys;
use function sprintf;

/**
 * Расчет стоимости пересылки.
 *
 * Рассчитывает стоимость пересылки в зависимости от указанных входных данных.
 * Индекс ОПС точки отправления берется из профиля клиента. Возвращаемые значения указываются в копейках.
 *
 * @link https://otpravka.pochta.ru/specification#/nogroup-rate_calculate
 */
class TariffRequest extends PochtaRequest implements Pochta
{
    /** @var ?bool Признак услуги проверки комплектности */
    public $completenessChecking;

    /** @var ?bool Признак услуги проверки вложения */
    public $contentsChecking;

    /** @var ?bool Отметка 'Курьер' */
    public $courier;

    /** @var int Объявленная ценность (требуется, мин. 100) */
    public $declaredValue;

    /** @var ?string Идентификатор пункта выдачи заказов */
    public $deliveryPointIndex;

    /** @var Dimension Линейные размеры (требуется мин. 0) */
    public $dimension;

    /** @var ?string Типоразмер (DIMENSION_TYPE_*) */
    public $dimensionType;

    /** @var ?string Категория вложения (ENTRIES_TYPE_*) */
    public $entriesType;

    /** @var ?bool Отметка 'Осторожно/Хрупко' */
    public $fragile;

    /** @var string Почтовый индекс объекта почтовой связи места приема (требуется) */
    public $indexFrom;

    /** @var string Почтовый индекс объекта почтовой связи места назначения (требуется) */
    public $indexTo;

    /** @var bool Опись вложения */
    public $inventory;

    /** @var string Категория РПО (MAIL_CATEG_*) */
    public $mailCategory;

    /**
     * @var ?int Код страны назначения
     * @link https://otpravka.pochta.ru/specification#/dictionary-countries
     */
    public $mailDirect;

    /** @var string Вид РПО (MAIL_TYPE_*) */
    public $mailType;

    /** @var int Масса отправления в граммах */
    public $mass;

    /** @var ?string Способ оплаты уведомления (PAYMENT_METHOD_*) */
    public $noticePaymentMethod;

    /** @var ?string Способ оплаты (PAYMENT_METHOD_*) */
    public $paymentMethod;

    /** @var ?int Признак услуги SMS уведомления */
    public $smsNoticeRecipient;

    /** @var ?string Вид транспортировки (TRANSPORT_TYPE) */
    public $transportType;

    /** @var ?bool Возврат сопроводительных документов */
    public $vsd;

    /** @var ?bool Отметка 'С электронным уведомлением' */
    public $withElectronicNotice;

    /** @var bool Отметка 'С заказным уведомлением' */
    public $withOrderOfNotice;

    /** @var bool */
    public $withSimpleNotice;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'dimension' => Dimension::class
        ];
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            [['completenessChecking', 'contentsChecking', 'courier'], 'default'],
            [['completenessChecking', 'contentsChecking', 'courier'], 'boolean'],
            [['completenessChecking', 'contentsChecking', 'courier'], 'filter', 'filter' => 'boolval',
                'skipOnEmpty' => true],

            ['declaredValue', 'required'],
            ['declaredValue', 'integer', 'min' => 100],
            ['declaredValue', 'filter', 'filter' => 'intval'],

            ['deliveryPointIndex', 'trim'],
            ['deliveryPointIndex', 'default'],

            ['dimension', 'default', 'value' => Dimension::zero()],
            ['dimension', EntityValidator::class],

            ['dimensionType', 'default'],
            ['dimensionType', 'in', 'range' => array_keys(self::DIMENSION_TYPE)],

            ['entriesType', 'default'],
            ['entriesType', 'in', 'range' => array_keys(self::ENTRIES_TYPE)],

            ['fragile', 'default', 'value' => false],
            ['fragile', 'boolean'],
            ['fragile', 'filter', 'filter' => 'boolval', 'skipOnEmpty' => true],

            [['indexFrom', 'indexTo'], 'trim'],
            [['indexFrom', 'indexTo'], 'required'],
            [['indexFrom', 'indexTo'], 'match', 'pattern' => '~^\d{1,6}$~',
                'message' => 'Почтовый Индекс должен состоять из 6 цифр'],
            [['indexFrom', 'indexTo'], 'filter', 'filter' => static fn($val) => sprintf('%06d', $val)],

            ['inventory', 'default'],
            ['inventory', 'boolean'],
            ['inventory', 'filter', 'filter' => 'boolval', 'skipOnEmpty' => true],

            ['mailCategory', 'required'],
            ['mailCategory', 'in', 'range' => array_keys(self::MAIL_CATEG)],

            ['mailDirect', 'default'],
            ['mailDirect', 'integer', 'min' => 1],
            ['mailDirect', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true],

            ['mailType', 'required'],
            ['mailType', 'in', 'range' => array_keys(self::MAIL_TYPE)],

            ['mass', 'required'],
            ['mass', 'integer', 'min' => 1],
            ['mass', 'filter', 'filter' => 'intval'],

            [['noticePaymentMethod', 'paymentMethod'], 'default'],
            [['noticePaymentMethod', 'paymentMethod'], 'in', 'range' => array_keys(self::PAYMENT_METHOD)],

            ['smsNoticeRecipient', 'default'],
            ['smsNoticeRecipient', 'boolean'],
            ['smsNoticeRecipient', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true],

            ['transportType', 'default'],
            ['transportType', 'in', 'range' => array_keys(self::TRANSPORT_TYPE)],

            [['vsd', 'withElectronicNotice'], 'default'],
            [['vsd', 'withElectronicNotice'], 'boolean'],
            [['vsd', 'withElectronicNotice'], 'filter', 'filter' => 'boolval', 'skipOnEmpty' => true],

            [['withOrderOfNotice', 'withSimpleNotice'], 'default', 'value' => false],
            [['withOrderOfNotice', 'withSimpleNotice'], 'boolean'],
            [['withOrderOfNotice', 'withSimpleNotice'], 'filter', 'filter' => 'boolval']
        ];
    }

    /**
     * @inheritDoc
     */
    protected function method(): string
    {
        return 'POST';
    }

    /**
     * @inheritDoc
     */
    protected function url(): string
    {
        return '/1.0/tariff';
    }

    /**
     * {@inheritDoc}
     *
     * @return TariffResponse
     */
    public function send(): TariffResponse
    {
        if (! $this->validate()) {
            throw new ValidateException($this);
        }

        // кэшируем
        $json = $this->api->cache->getOrSet(
            [__METHOD__, $this->json],
            fn(): array => parent::send(), 86400
        );

        return new TariffResponse([
            'json' => $json
        ]);
    }
}
