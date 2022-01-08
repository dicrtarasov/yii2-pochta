<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:44:10
 */

declare(strict_types = 1);
namespace dicr\pochta\request;

use dicr\pochta\entity\DeliveryTime;
use dicr\pochta\entity\Rate;
use dicr\pochta\PochtaEntity;

/**
 * Class TariffResponse
 */
class TariffResponse extends PochtaEntity
{
    /** Плата за Авиа-пересылку */
    public array|Rate|null $aviaRate = null;

    /** Плата за 'Проверку комплектности' (коп) */
    public array|Rate|null $completenessCheckingRate = null;

    /** Плата за 'Проверку вложений' (коп) */
    public array|Rate|null $contentsCheckingRate = null;

    /** Примерные сроки доставки */
    public array|DeliveryTime|null $deliveryTime = null;

    /** Надбавка за отметку 'Осторожно/Хрупкое' */
    public array|Rate|null $fragileRate = null;

    /** Плата за пересылку (коп) */
    public array|Rate|null $groundRate = null;

    /** Плата за объявленную ценность (коп) */
    public array|Rate|null $insuranceRate = null;

    /** Плата за 'Опись вложения' (коп) */
    public array|Rate|null $inventoryRate = null;

    /** Способ оплаты уведомления (PAYMENT_METHOD_*) */
    public ?string $noticePaymentMethod = null;

    /** Надбавка за уведомление о вручении */
    public array|Rate|null $noticeRate = null;

    /** Надбавка за негабарит при весе более 10кг */
    public array|Rate|null $oversizeRate = null;

    /** Способ оплаты. (PAYMENT_METHOD_*) */
    public ?string $paymentMethod = null;

    /** Плата за 'Пакет смс получателю' (коп) */
    public array|Rate|null $smsNoticeRecipientRate = null;

    /** Плата всего (коп) */
    public string|int|null $totalRate = null;

    /** Всего НДС (коп) */
    public string|int|null $totalVat = null;

    /** Плата за 'Возврат сопроводительных документов' (коп) */
    public array|Rate|null $vsdRate = null;

    /**
     * @inheritDoc
     */
    public function attributeEntities(): array
    {
        return [
            'aviaRate' => Rate::class,
            'completenessCheckingRate' => Rate::class,
            'contentsCheckingRate' => Rate::class,
            'deliveryTime' => DeliveryTime::class,
            'fragileRate' => Rate::class,
            'groundRate' => Rate::class,
            'insuranceRate' => Rate::class,
            'inventoryRate' => Rate::class,
            'noticeRate' => Rate::class,
            'oversizeRate' => Rate::class,
            'smsNoticeRecipientRate' => Rate::class,
            'vsdRate' => Rate::class
        ];
    }
}
