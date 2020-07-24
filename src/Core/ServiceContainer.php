<?php
namespace DingTalkRobot\Core;

use Pimple\Container;

/**
 * Class ServiceContainer
 * @package DingTalkRobot\Core
 * @author OverNaive <overnaive20@gmail.com>
 */
class ServiceContainer extends Container
{
    /**
     * @var array
     */
    protected $serviceProviders = [];

    /**
     * ServiceContainer constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->registerProviders();
    }

    /**
     * Registers services
     */
    protected function registerProviders(): void
    {
        foreach ($this->serviceProviders as $serviceProvider) {
            $this->register(new $serviceProvider());
        }
    }

    /**
     * Magic get access.
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    /**
     * Magic set access.
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, mixed $value): void
    {
        $this->offsetSet($name, $value);
    }
}
