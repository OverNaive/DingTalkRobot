<?php
namespace DingTalkRobot\Core;

use DingTalkRobot\Core\Contracts\ContentInterface;
use DingTalkRobot\Core\Exceptions\InvalidArgumentException;
use DingTalkRobot\Message\Message;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class AbstractContent
 * @package DingTalkRobot\Core
 * @author OverNaive <overnaive20@gmail.com>
 */
abstract class AbstractContent implements ContentInterface
{
    /**
     * @var Message
     */
    protected $message;

    /**
     * @var array
     */
    protected $content = [];

    /**
     * AbstractMessage constructor.
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;

        $this->content = $this->getDefaultContent();
    }

    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public function getContent(): array
    {
        $this->checkContent();

        return $this->content;
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function send(): array
    {
        return $this->message->send($this->getContent());
    }

    /**
     * @throws InvalidArgumentException
     */
    abstract protected function checkContent(): void ;
}
