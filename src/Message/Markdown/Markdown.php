<?php
namespace DingTalkRobot\Message\Markdown;

use DingTalkRobot\Core\AbstractContent;
use DingTalkRobot\Core\Exceptions\InvalidArgumentException;

/**
 * Class Markdown
 * @package DingTalkRobot\Message\Markdown
 * @author OverNaive <overnaive20@gmail.com>
 */
class Markdown extends AbstractContent
{
    /**
     * @return array
     */
    public function getDefaultContent(): array
    {
        return [
            'msgtype' => 'markdown',
            'markdown' => [
                'title' => '',
                'text' => '',
            ],
            'at' => [
                'atMobiles' => [],
                'isAtAll' => false,
            ],
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function checkContent(): void
    {
        if (empty($this->content['markdown']['title'])) {
            throw new InvalidArgumentException('title could not be empty');
        }

        if (empty($this->content['markdown']['text'])) {
            throw new InvalidArgumentException('text could not be empty');
        }
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->content['markdown']['title'] = $title;

        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text): self
    {
        $this->content['markdown']['text'] = $text;

        return $this;
    }

    /**
     * @param string $mobile
     * @return $this
     */
    public function addAtMobile(string $mobile): self
    {
        array_push($this->content['at']['atMobiles'], $mobile);

        return $this;
    }

    /**
     * @param array $mobiles
     * @return $this
     */
    public function addAtMobiles(array $mobiles): self
    {
        $this->content['at']['atMobiles'] = $mobiles;

        return $this;
    }

    /**
     * @return $this
     */
    public function atAll(): self
    {
        $this->content['at']['isAtAll'] = true;

        return $this;
    }
}
