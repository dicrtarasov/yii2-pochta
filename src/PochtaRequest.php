<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 18.04.21 13:47:05
 */

declare(strict_types = 1);
namespace dicr\pochta;

use dicr\helper\Log;
use dicr\validate\ValidateException;
use LogicException;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\httpclient\Client;
use yii\httpclient\Request;

use function strtoupper;

/**
 * Абстрактный запрос.
 */
abstract class PochtaRequest extends PochtaEntity
{
    /** @var PochtaAPI */
    protected $api;

    /**
     * PochtaRequest constructor.
     *
     * @param PochtaAPI $api
     * @param array $config
     */
    public function __construct(PochtaAPI $api, array $config = [])
    {
        parent::__construct($config);

        $this->api = $api;
    }

    /**
     * Метод запроса.
     *
     * @return string
     */
    protected function method(): string
    {
        return 'GET';
    }

    /**
     * URL запроса.
     *
     * @return string
     */
    protected function url(): string
    {
        throw new LogicException('Не реализовано');
    }

    /**
     * HTTP-запрос.
     *
     * @return Request
     * @throws InvalidConfigException
     */
    protected function request(): Request
    {
        $method = strtoupper($this->method());
        $url = $this->url();
        $data = $this->getJson();

        $request = $this->api
            ->httpClient
            ->createRequest()
            ->setMethod($method);

        if ($method === 'GET') {
            $request->setUrl([$url] + $data);
        } else {
            $request->setUrl($url)->setData($data);
        }

        return $request;
    }

    /**
     * Отправка запроса.
     *
     * @return array данные json
     * @throws Exception
     * @noinspection PhpMissingReturnTypeInspection
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function send()
    {
        if (! $this->validate()) {
            throw new ValidateException($this);
        }

        $request = $this->request();
        Log::debug('Запрос: ' . $request->toString(), __METHOD__);

        $response = $request->send();
        Log::debug('Ответ: ' . $response->toString(), __METHOD__);

        if (! $response->isOk) {
            throw new Exception('HTTP-error: ' . $response->statusCode);
        }

        $response->format = Client::FORMAT_JSON;

        return $response->data;
    }
}
