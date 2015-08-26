<?php

namespace SocioChat\Cron;

use Core\BaseException;
use SocioChat\DI;
use Core\Enum\Enum;

class CronEnum extends Enum
{

    protected static $names = array(
        'sessionCleaner' => ServiceSessionCleaner::class,
        'activationsCleaner' => ServiceActivationsCleaner::class,
	    'avatarCleaner' => ServiceAvatarCleaner::class,
	    'mailer' => ServiceMailer::class,
	    'onlineMonitor' => ServiceOnlineMonitor::class,
    );

    public function getServiceInstance()
    {
        $service = DI::get()->spawn($this->getName());

        if (!$service instanceof CronService) {
            throw new BaseException("Expects {$this->getName()} implements CronService interface");
        }
        return $service;
    }
}