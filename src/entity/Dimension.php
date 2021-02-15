<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 15.02.21 01:54:09
 */

declare(strict_types = 1);
namespace dicr\pochta\entity;

use dicr\pochta\PochtaEntity;

/**
 * Линейные размеры.
 */
class Dimension extends PochtaEntity
{
    /** @var ?int Линейная высота (сантиметры) */
    public $height;

    /** @var ?int Линейная длина (сантиметры) */
    public $length;

    /** @var ?int Линейная ширина (сантиметры) */
    public $width;

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
     *
     * @return static
     */
    public static function zero(): self
    {
        return new self([
            'height' => 0,
            'length' => 0,
            'width' => 0
        ]);
    }
}
