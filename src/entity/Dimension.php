<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:26:40
 */

declare(strict_types = 1);
namespace dicr\pochta\entity;

use dicr\pochta\PochtaEntity;

/**
 * Линейные размеры.
 */
class Dimension extends PochtaEntity
{
    /** Линейная высота (сантиметры) */
    public string|int|null $height = null;

    /** Линейная длина (сантиметры) */
    public string|int|null $length = null;

    /** Линейная ширина (сантиметры) */
    public string|int|null $width = null;

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            [['height', 'length', 'width'], 'default'],
            [['height', 'length', 'width'], 'integer', 'min' => 0],
            [['height', 'length', 'width'], 'filter', 'filter' => 'intval', 'skipOnEmpty' => true]
        ];
    }

    /**
     * Пустые значения.
     */
    public static function zero(): static
    {
        return new static([
            'height' => 0,
            'length' => 0,
            'width' => 0
        ]);
    }
}
