<?php
namespace DingTalkRobot\Core\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait HasHttpRequest
 * @package DingTalkRobot\Core\Traits
 * @author OverNaive <overnaive20@gmail.com>
 */
trait HasHttpRequest
{
    /**
     * @var array
     */
    protected $defaultGuzzleOptions = [
        'timeout' => 30.0,
    ];

    /**
     * @var array
     */
    protected $guzzleOptions = [];

    /**
     * @var Client|null
     */
    protected $httpClient;

    /**
     * @param array $guzzleOptions
     * @return $this
     */
    public function setGuzzleOptions(array $guzzleOptions): self
    {
        $this->guzzleOptions = array_merge($this->defaultGuzzleOptions, $guzzleOptions);

        return $this;
    }

    /**
     * @param Client $client
     * @return $this
     */
    public function setHttpClient(Client $client): self
    {
        $this->httpClient = $client;

        return $this;
    }

    /**
     * @return Client
     */
    public function getHttpClient(): Client
    {
        if (is_null($this->httpClient)) {
            $this->httpClient = new Client($this->guzzleOptions);
        }

        return $this->httpClient;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request(string $method, string $url, array $options): ResponseInterface
    {
        return $this->getHttpClient()->request($method, $url, $options);
    }
}
