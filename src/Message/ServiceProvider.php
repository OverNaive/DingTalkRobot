<?php
namespace DingTalkRobot\Message;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider
 * @package DingTalkRobot\Message
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
        $pimple['message'] = function ($pimple) {
            return new Message($pimple);
        };
    }
}
