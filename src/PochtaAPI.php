<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license MIT
 * @version 18.04.21 13:50:43
 */

declare(strict_types = 1);
namespace dicr\pochta;

use dicr\pochta\request\TariffRequest;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\caching\CacheInterface;
use yii\di\Instance;
use yii\httpclient\Client;
use yii\httpclient\CurlTransport;

use function array_merge;
use function base64_encode;

/**
 * Компонент API.
 *
 * @property-read Client $httpClient
 *
 * @link https://otpravka.pochta.ru/specification#/main
 */
class PochtaAPI extends Component implements Pochta
{
    /** @var string базовый URL */
    public $url = self::URL_API;

    /** @var string логин пользователя в личном кабинете */
    public $login;

    /** @var string пароль пользователя в личном кабинете */
    public $pass;

    /** @var string токен авторизации API */
    public $token;

    /** @var ?array конфиг HTTP-клиента */
    public $httpClientConfig;

    /** @var ?array конфиг TariffRequest */
    public $tariffRequestConfig;

    /** @var CacheInterface */
    public $cache = 'cache';

    /**
     * @inheritDoc
     * @throws InvalidConfigException
     */
    public function init(): void
    {
        parent::init();

        if (empty($this->login)) {
            throw new InvalidConfigException('login');
        }

        if (empty($this->pass)) {
            throw new InvalidConfigException('pass');
        }

        if (empty($this->token)) {
            throw new InvalidConfigException('token');
        }

        $this->cache = Instance::ensure($this->cache, CacheInterface::class);
    }

    /** @var Client */
    private $_httpClient;

    /**
     * HTTP-клиент.
     *
     * @return Client
     */
    public function getHttpClient(): Client
    {
        if ($this->_httpClient === null) {
            $this->_httpClient = new Client(array_merge([
                'transport' => CurlTransport::class,
                'baseUrl' => $this->url,
                'requestConfig' => [
                    'format' => Client::FORMAT_JSON,
                    'headers' => [
                        'Authorization' => 'AccessToken ' . $this->token,
                        'X-User-Authorization' => 'Basic ' . base64_encode($this->login . ':' . $this->pass),
                        'Content-Type' => 'application/json;charset=UTF-8',
                        'Accept' => 'application/json',
                        'Accept-Charset' => 'UTF-8'
                    ],
                    'options' => [
                        'timeout' => 10,
                        'sslVerifyPeer' => false,
                        CURLOPT_ENCODING => ''
                    ]
                ],
                'responseConfig' => [
                    'format' => Client::FORMAT_JSON
                ],
            ], $this->httpClientConfig ?: []));
        }

        return $this->_httpClient;
    }

    /**
     * Создает запрос.
     *
     * @param array $config
     * @return PochtaRequest
     * @throws InvalidConfigException
     */
    public function request(array $config): PochtaRequest
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return Yii::createObject($config, [$this]);
    }

    /**
     * Запрос TariffRequest.
     *
     * @param array $config
     * @return TariffRequest
     * @throws InvalidConfigException
     */
    public function tariffRequest(array $config = []): TariffRequest
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->request(array_merge(
            ['class' => TariffRequest::class], $this->tariffRequestConfig ?: [], $config
        ));
    }
}
