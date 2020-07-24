<?php
namespace DingTalkRobot\Message\Link;

use DingTalkRobot\Core\AbstractContent;
use DingTalkRobot\Core\Exceptions\InvalidArgumentException;

/**
 * Class Link
 * @package DingTalkRobot\Message\Link
 * @author OverNaive <overnaive20@gmail.com>
 */
class Link extends AbstractContent
{
    /**
     * @return array
     */
    public function getDefaultContent(): array
    {
        return [
            'msgtype' => 'link',
            'link' => [
                'title' => '',
                'text' => '',
                'messageUrl' => '',
                'picUrl' => '',
            ],
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function checkContent(): void
    {
        if (empty($this->content['link']['title'])) {
            throw new InvalidArgumentException('title could not be empty');
        }

        if (empty($this->content['link']['text'])) {
            throw new InvalidArgumentException('text could not be empty');
        }

        if (empty($this->content['link']['messageUrl'])) {
            throw new InvalidArgumentException('messageUrl could not be empty');
        }
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->content['link']['title'] = $title;

        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text): self
    {
        $this->content['link']['text'] = $text;

        return $this;
    }

    /**
     * @param string $messageUrl
     * @return $this
     */
    public function setMessageUrl(string $messageUrl): self
    {
        $this->content['link']['messageUrl'] = $messageUrl;

        return $this;
    }

    /**
     * @param string $picUrl
     * @return $this
     */
    public function setPicUrl(string $picUrl): self
    {
        $this->content['link']['picUrl'] = $picUrl;

        return $this;
    }
}
