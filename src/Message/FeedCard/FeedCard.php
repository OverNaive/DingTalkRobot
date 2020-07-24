<?php
namespace DingTalkRobot\Message\FeedCard;

use DingTalkRobot\Core\AbstractContent;
use DingTalkRobot\Core\Exceptions\InvalidArgumentException;

/**
 * Class FeedCard
 * @package DingTalkRobot\Message\FeedCard
 * @author OverNaive <overnaive20@gmail.com>
 */
class FeedCard extends AbstractContent
{
    /**
     * @return array
     */
    public function getDefaultContent(): array
    {
        return [
            'msgtype' => 'feedCard',
            'feedCard' => [
                'links' => [],
            ],
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function checkContent(): void
    {
        if (count($this->content['feedCard']['links']) === 0) {
            throw new InvalidArgumentException('links could not be empty');
        }
    }

    /**
     * @param string $title
     * @param string $messageUrl
     * @param string $picUrl
     * @return $this
     */
    public function addLink(string $title, string $messageUrl, string $picUrl): self
    {
        array_push($this->content['feedCard']['links'], [
            'title' => $title,
            'messageURL' => $messageUrl,
            'picURL' => $picUrl,
        ]);

        return $this;
    }

    /**
     * @param array $links
     * @return $this
     */
    public function addLinks(array $links): self
    {
        $this->content['feedCard']['links'] = $links;

        return $this;
    }
}
