<?php declare(strict_types=1);

namespace Frosh\Tools\Components\Health;

use Shopware\Core\Framework\Struct\Struct;

class SettingsResult extends Struct
{
    private const GREEN = 'STATE_OK';
    private const WARNING = 'STATE_WARNING';
    private const ERROR = 'STATE_ERROR';

    protected string $state;

    protected string $snippet;

    public string $current;

    public string $recommended;

    public ?string $url = null;

    public static function ok(string $snippet, string $current = '', string $recommended = '', ?string $url = null): self
    {
        $me = new self();
        $me->state = self::GREEN;
        $me->snippet = $snippet;
        $me->current = $current;
        $me->recommended = $recommended;
        $me->url = $url;

        return $me;
    }

    public static function warning(string $snippet, string $current = '', string $recommended = '', ?string $url = null): self
    {
        $me = new self();
        $me->state = self::WARNING;
        $me->snippet = $snippet;
        $me->current = $current;
        $me->recommended = $recommended;
        $me->url = $url;

        return $me;
    }

    public static function error(string $snippet, string $current = '', string $recommended = '', ?string $url = null): self
    {
        $me = new self();
        $me->state = self::ERROR;
        $me->snippet = $snippet;
        $me->current = $current;
        $me->recommended = $recommended;
        $me->url = $url;

        return $me;
    }
}
