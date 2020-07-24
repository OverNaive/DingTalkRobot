<?php
namespace DingTalkRobot\Message\ActionCard;

use DingTalkRobot\Core\AbstractContent;
use DingTalkRobot\Core\Exceptions\InvalidArgumentException;

/**
 * Class ActionCard
 * @package DingTalkRobot\Message\ActionCard
 * @author OverNaive <overnaive20@gmail.com>
 */
class ActionCard extends AbstractContent
{
    /**
     * @return array
     */
    public function getDefaultContent(): array
    {
        return [
            'msgtype' => 'actionCard',
            'actionCard' => [
                'title' => '',
                'text' => '',
                'btnOrientation' => 0,
                'btns' => [],
            ],
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function checkContent(): void
    {
        if (empty($this->content['actionCard']['title'])) {
            throw new InvalidArgumentException('title could not be empty');
        }

        if (empty($this->content['actionCard']['text'])) {
            throw new InvalidArgumentException('text could not be empty');
        }

        if (count($this->content['actionCard']['btns']) === 0) {
            throw new InvalidArgumentException('btns could not be empty');
        }

        if (count($this->content['actionCard']['btns']) === 1) {
            $this->content['actionCard']['singleTitle'] = $this->content['actionCard']['btns'][0]['title'];
            $this->content['actionCard']['singleURL'] = $this->content['actionCard']['btns'][0]['actionURL'];
            unset($this->content['actionCard']['btns']);
        }
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->content['actionCard']['title'] = $title;

        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text): self
    {
        $this->content['actionCard']['text'] = $text;

        return $this;
    }

    /**
     * @param int $btnOrientation 0-按钮竖直排列，1-按钮横向排列
     * @return $this
     */
    public function setBtnOrientation(int $btnOrientation): self
    {
        $this->content['actionCard']['btnOrientation'] = $btnOrientation;

        return $this;
    }

    /**
     * @return $this
     */
    public function verticalBtn(): self
    {
        $this->setBtnOrientation(0);

        return $this;
    }

    /**
     * @return $this
     */
    public function horizontalBtn(): self
    {
        $this->setBtnOrientation(1);

        return $this;
    }

    /**
     * @param string $title
     * @param string $actionUrl
     * @return $this
     */
    public function addBtn(string $title, string $actionUrl): self
    {
        array_push($this->content['actionCard']['btns'], [
            'title' => $title,
            'actionURL' => $actionUrl,
        ]);

        return $this;
    }

    /**
     * @param array $btns
     * @return $this
     */
    public function addBtns(array $btns): self
    {
        $this->content['actionCard']['btns'] = $btns;

        return $this;
    }
}
