<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:39:41
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
    public ?Rate $aviaRate = null;

    /** Плата за 'Проверку комплектности' (коп) */
    public ?Rate $completenessCheckingRate = null;

    /** Плата за 'Проверку вложений' (коп) */
    public ?Rate $contentsCheckingRate = null;

    /** Примерные сроки доставки */
    public ?DeliveryTime $deliveryTime = null;

    /** Надбавка за отметку 'Осторожно/Хрупкое' */
    public ?Rate $fragileRate = null;

    /** Плата за пересылку (коп) */
    public ?Rate $groundRate = null;

    /** Плата за объявленную ценность (коп) */
    public ?Rate $insuranceRate = null;

    /** Плата за 'Опись вложения' (коп) */
    public ?Rate $inventoryRate = null;

    /** Способ оплаты уведомления (PAYMENT_METHOD_*) */
    public ?string $noticePaymentMethod = null;

    /** Надбавка за уведомление о вручении */
    public ?Rate $noticeRate = null;

    /** Надбавка за негабарит при весе более 10кг */
    public ?Rate $oversizeRate = null;

    /** Способ оплаты. (PAYMENT_METHOD_*) */
    public ?string $paymentMethod = null;

    /** Плата за 'Пакет смс получателю' (коп) */
    public ?Rate $smsNoticeRecipientRate = null;

    /** Плата всего (коп) */
    public string|int|null $totalRate = null;

    /** Всего НДС (коп) */
    public string|int|null $totalVat = null;

    /** Плата за 'Возврат сопроводительных документов' (коп) */
    public ?Rate $vsdRate = null;

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
