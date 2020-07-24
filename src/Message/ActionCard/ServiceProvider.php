<?php
namespace DingTalkRobot\Message\ActionCard;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider
 * @package DingTalkRobot\Message\ActionCard
 * @author OverNaive <overnaive20@gmail.com>
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple): void
    {
        $pimple['actionCard'] = $pimple->factory(function ($pimple) {
            return new ActionCard($pimple);
        });
    }
}
