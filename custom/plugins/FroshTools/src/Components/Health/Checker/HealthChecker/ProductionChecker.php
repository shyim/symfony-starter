<?php declare(strict_types=1);

namespace Frosh\Tools\Components\Health\Checker\HealthChecker;

use Frosh\Tools\Components\Health\Checker\CheckerInterface;
use Frosh\Tools\Components\Health\HealthCollection;
use Frosh\Tools\Components\Health\SettingsResult;

class ProductionChecker implements CheckerInterface
{
    private string $environment;

    public function __construct(string $environment)
    {
        $this->environment = $environment;
    }

    public function collect(HealthCollection $collection): void
    {
        if ($this->environment !== 'prod') {
            $collection->add(SettingsResult::error('frosh-tools.checker.not-prod'));

            return;
        }

        $collection->add(SettingsResult::ok('frosh-tools.checker.prodGood'));
    }
}
