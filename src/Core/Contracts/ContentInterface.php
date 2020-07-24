<?php
namespace DingTalkRobot\Core\Contracts;

use DingTalkRobot\Message\Message;

/**
 * Interface ContentInterface
 * @package DingTalkRobot\Core\Contracts
 * @author OverNaive <overnaive20@gmail.com>
 */
interface ContentInterface
{
    /**
     * MessageInterface constructor.
     * @param Message $message
     */
    public function __construct(Message $message);

    /**
     * @return array
     */
    public function getContent(): array ;

    /**
     * @return array
     */
    public function send(): array ;

    /**
     * @return array
     */
    public function getDefaultContent(): array ;
}
