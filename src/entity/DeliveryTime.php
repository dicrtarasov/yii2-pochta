<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 15.02.21 04:17:39
 */

declare(strict_types = 1);
namespace dicr\pochta\entity;

use dicr\pochta\PochtaEntity;

/**
 * Срок доставки.
 */
class DeliveryTime extends PochtaEntity
{
    /** @var ?int Минимальное время доставки (дни) */
    public $minDays;

    /** @var int Максимальное время доставки (дни) */
    public $maxDays;

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            ['minDays', 'default'],
            ['minDays', 'integer', 'min' => 0],
            ['minDays', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true],

            ['maxDays', 'required'],
            ['maxDays', 'integer', 'min' => 0],
            ['maxDays', 'filter', 'filter' => 'intval']
        ];
    }
}
