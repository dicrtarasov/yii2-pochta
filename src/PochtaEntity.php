<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 18.04.21 13:44:58
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
        /** @var string[] $fields кэш значения */
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
