<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:28:38
 */

declare(strict_types = 1);
namespace dicr\pochta\request;

use dicr\pochta\PochtaRequest;
use yii\base\Exception;

use function is_array;

/**
 * Нормализация адреса.
 *
 * Разделяет и помещает сущности переданных адресов (город, улица) в соответствующие поля возвращаемого объекта.
 * Параметр id (идентификатор записи) используется для установления соответствия переданных и полученных записей,
 * так как порядок сортировки возвращаемых записей не гарантируется. Метод автоматически ищет и возвращает индекс
 * близлежащего ОПС по указанному адресу.
 * Адрес считается корректным к отправке, если в ответе запроса:
 * quality-code=GOOD, POSTAL_BOX, ON_DEMAND или UNDEF_05;
 * validation-code=VALIDATED, OVERRIDDEN или CONFIRMED_MANUALLY.
 *
 * @link https://otpravka.pochta.ru/specification#/nogroup-normalization_adress
 */
class CleanAddressRequest extends PochtaRequest
{
    /** Идентификатор записи */
    public ?string $id = null;

    /** Оригинальный адрес одной строкой */
    public ?string $originalAddress = null;

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            [['id', 'originalAddress'], 'trim'],
            [['id', 'originalAddress'], 'required']
        ];
    }

    /**
     * @inheritDoc
     */
    public function getJson(): array
    {
        $json = parent::getJson();

        return [$json];
    }

    /**
     * @inheritDoc
     */
    protected function method(): string
    {
        return 'POST';
    }

    /**
     * @inheritDoc
     */
    protected function url(): string
    {
        return '/1.0/clean/address';
    }

    /**
     * @inheritDoc
     */
    public function send(): CleanAddressResponse
    {
        $data = parent::send();

        if (! isset($data[0]) || ! is_array($data[0])) {
            throw new Exception('Не найдены данные в ответе');
        }

        return new CleanAddressResponse([
            'json' => $data[0]
        ]);
    }
}
