<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 15.02.21 06:31:37
 */

declare(strict_types = 1);
namespace dicr\pochta;

use dicr\json\JsonEntity;
use yii\helpers\Inflector;

/**
 * JsonEntity для Почты.
 */
abstract class PochtaEntity extends JsonEntity
{
    /**
     * @inheritDoc
     */
    public function attributeFields(): array
    {
        /** @var string[] $fields кжш значения */
        static $fields = [];

        $class = static::class;
        if (! isset($fields[$class])) {
            $fields[$class] = [];

            foreach ($this->attributes() as $attribute) {
                $field = Inflector::camel2id($attribute);
                if ($field !== $attribute) {
                    $fields[$class][$attribute] = $field;
                }
            }
        }

        return $fields[$class];
    }
}
