<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:44:45
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
    /** Признак услуги проверки комплектности */
    public ?bool $completenessChecking = null;

    /** Признак услуги проверки вложения */
    public ?bool $contentsChecking = null;

    /** Отметка 'Курьер' */
    public ?bool $courier = null;

    /** Объявленная ценность (требуется, мин. 100) */
    public ?int $declaredValue = null;

    /** Идентификатор пункта выдачи заказов */
    public ?string $deliveryPointIndex = null;

    /** Линейные размеры (требуется мин. 0) */
    public Dimension|array|null $dimension = null;

    /** Типоразмер (DIMENSION_TYPE_*) */
    public ?string $dimensionType = null;

    /** Категория вложения (ENTRIES_TYPE_*) */
    public ?string $entriesType = null;

    /** Отметка 'Осторожно/Хрупко' */
    public ?bool $fragile = null;

    /** Почтовый индекс объекта почтовой связи места приема (требуется) */
    public string|int|null $indexFrom = null;

    /** Почтовый индекс объекта почтовой связи места назначения (требуется) */
    public string|int|null $indexTo = null;

    /** Опись вложения */
    public ?bool $inventory = null;

    /** Категория РПО (MAIL_CATEG_*) */
    public ?string $mailCategory = null;

    /**
     * Код страны назначения
     *
     * @link https://otpravka.pochta.ru/specification#/dictionary-countries
     */
    public ?int $mailDirect = null;

    /** Вид РПО (MAIL_TYPE_*) */
    public ?string $mailType = null;

    /** Масса отправления в граммах */
    public ?int $mass = null;

    /** Способ оплаты уведомления (PAYMENT_METHOD_*) */
    public ?string $noticePaymentMethod = null;

    /** Способ оплаты (PAYMENT_METHOD_*) */
    public ?string $paymentMethod = null;

    /** Признак услуги SMS уведомления */
    public ?int $smsNoticeRecipient = null;

    /** Вид транспортировки (TRANSPORT_TYPE) */
    public ?string $transportType = null;

    /** Возврат сопроводительных документов */
    public ?bool $vsd = null;

    /** Отметка 'С электронным уведомлением' */
    public ?bool $withElectronicNotice = null;

    /** Отметка 'С заказным уведомлением' */
    public ?bool $withOrderOfNotice = null;

    public ?bool $withSimpleNotice = null;

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
