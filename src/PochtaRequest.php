<?php
/*
 * @copyright 2019-2022 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 08.01.22 17:24:58
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
    /**
     * PochtaRequest constructor.
     */
    public function __construct(
        protected PochtaAPI $api,
        array $config = []
    ) {
        parent::__construct($config);
    }

    /**
     * Метод запроса.
     */
    protected function method(): string
    {
        return 'GET';
    }

    /**
     * URL запроса.
     */
    protected function url(): string
    {
        throw new LogicException('Не реализовано');
    }

    /**
     * HTTP-запрос.
     *
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
     * @throws Exception
     */
    public function send(): mixed
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
