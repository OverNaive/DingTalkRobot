<?php
namespace DingTalkRobot\Message;

use GuzzleHttp\Exception\GuzzleException;
use DingTalkRobot\Core\ServiceContainer;
use DingTalkRobot\Core\Traits\HasHttpRequest;
use DingTalkRobot\DingTalkRobot;

/**
 * @property Text\Text $text
 * @property Link\Link $link
 * @property Markdown\Markdown $markdown
 * @property ActionCard\ActionCard $actionCard
 * @property FeedCard\FeedCard $feedCard
 *
 * 消息类型详细请见：
 * @link https://ding-doc.dingtalk.com/doc#/serverapi2/qf2nxq/d535db33
 *
 * Class Message
 * @package DingTalkRobot\Message
 * @author OverNaive <overnaive20@gmail.com>
 */
class Message extends ServiceContainer
{
    use HasHttpRequest;

    /**
     * @var array
     */
    protected $serviceProviders = [
        Text\ServiceProvider::class,
        Link\ServiceProvider::class,
        Markdown\ServiceProvider::class,
        ActionCard\ServiceProvider::class,
        FeedCard\ServiceProvider::class,
    ];

    /**
     * @var DingTalkRobot
     */
    private $dingTalkRobot;

    /**
     * Message constructor.
     * @param DingTalkRobot $dingTalkRobot
     */
    public function __construct(DingTalkRobot $dingTalkRobot)
    {
        $this->dingTalkRobot = $dingTalkRobot;

        parent::__construct();
    }

    /**
     * @param array $content
     * @return array
     * @throws GuzzleException
     */
    public function send(array $content): array
    {
        $this->setGuzzleOptions($this->dingTalkRobot['config']['guzzle_options']);

        $response = $this->request('post', $this->getUrl(), [
            'json' => $content,
        ]);

        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return string
     */
    private function getUrl(): string
    {
        $query = array_merge($this->dingTalkRobot->sign->getSignArray(), [
            'access_token' => $this->dingTalkRobot['config']['access_token'],
        ]);

        return $this->dingTalkRobot['config']['gateway'] . '?' . http_build_query($query);
    }
}
