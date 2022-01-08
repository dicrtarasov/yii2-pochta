<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:25:30
 */

declare(strict_types = 1);
namespace dicr\pochta\entity;

use dicr\pochta\PochtaEntity;

/**
 * Срок доставки.
 */
class DeliveryTime extends PochtaEntity
{
    /** Минимальное время доставки (дни) */
    public string|int|null $minDays = null;

    /** Максимальное время доставки (дни) */
    public string|int|null $maxDays = null;

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
