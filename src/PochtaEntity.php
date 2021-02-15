<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 15.02.21 05:02:07
 */

declare(strict_types = 1);
namespace dicr\pochta;

use dicr\json\JsonEntity;

/**
 * JsonEntity для Почты.
 */
abstract class PochtaEntity extends JsonEntity
{
    /**
     * @inheritDoc
     */
    public function attributeFields(string $separator = '-'): array
    {
        return parent::attributeFields($separator);
    }
}
