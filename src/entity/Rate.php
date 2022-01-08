<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:27:11
 */

declare(strict_types = 1);
namespace dicr\pochta\entity;

use dicr\pochta\PochtaEntity;

/**
 * Стоимость.
 */
class Rate extends PochtaEntity
{
    /** Тариф без НДС (коп) */
    public string|int|null $rate = null;

    /** НДС (коп) */
    public string|int|null $vat = null;

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            ['rate', 'required'],
            ['rate', 'integer', 'min' => 0],
            ['rate', 'filter', 'filter' => 'intval'],

            ['vat', 'default'],
            ['vat', 'integer', 'min' => 0],
            ['vat', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true]
        ];
    }
}
