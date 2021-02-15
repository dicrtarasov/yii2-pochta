<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 15.02.21 06:31:50
 */

declare(strict_types = 1);
namespace dicr\pochta\entity;

use dicr\pochta\PochtaEntity;

/**
 * Стоимость.
 */
class Rate extends PochtaEntity
{
    /** @var int Тариф без НДС (коп) */
    public $rate;

    /** @var ?int НДС (коп) */
    public $vat;

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
