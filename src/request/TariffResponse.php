<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 15.02.21 01:46:44
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
    /** @var ?Rate Плата за Авиа-пересылку */
    public $aviaRate;

    /** @var ?Rate Плата за 'Проверку комплектности' (коп) */
    public $completenessCheckingRate;

    /** @var ?Rate Плата за 'Проверку вложений' (коп) */
    public $contentsCheckingRate;

    /** @var ?DeliveryTime Примерные сроки доставки */
    public $deliveryTime;

    /** @var ?Rate Надбавка за отметку 'Осторожно/Хрупкое' */
    public $fragileRate;

    /** @var ?Rate Плата за пересылку (коп) */
    public $groundRate;

    /** @var ?Rate Плата за объявленную ценность (коп) */
    public $insuranceRate;

    /** @var ?Rate Плата за 'Опись вложения' (коп) */
    public $inventoryRate;

    /** @var ?string Способ оплаты уведомления (PAYMENT_METHOD_*) */
    public $noticePaymentMethod;

    /** @var ?Rate Надбавка за уведомление о вручении */
    public $noticeRate;

    /** @var ?Rate Надбавка за негабарит при весе более 10кг */
    public $oversizeRate;

    /** @var ?string Способ оплаты. (PAYMENT_METHOD_*) */
    public $paymentMethod;

    /** @var ?Rate Плата за 'Пакет смс получателю' (коп) */
    public $smsNoticeRecipientRate;

    /** @var int Плата всего (коп) */
    public $totalRate;

    /** @var int Всего НДС (коп) */
    public $totalVat;

    /** @var Rate Плата за 'Возврат сопроводительных документов' (коп) */
    public $vsdRate;

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
