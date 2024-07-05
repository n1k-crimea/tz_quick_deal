<?php

declare(strict_types=1);

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static TaskStatus PENDING()
 * @method static TaskStatus IN_PROGRESS()
 * @method static TaskStatus DONE()
 */
class TaskStatus extends Enum
{
    private const PENDING = 0;
    private const IN_PROGRESS = 1;
    private const DONE = 2;

    private const PENDING_LABEL = 'pending';
    private const IN_PROGRESS_LABEL = 'in_progress';
    private const DONE_LABEL = 'done';

    public static function toArray(): array
    {
        return [
            self::PENDING_LABEL => self::PENDING,
            self::IN_PROGRESS_LABEL => self::IN_PROGRESS,
            self::DONE_LABEL => self::DONE,
        ];
    }

    public static function fromLabel(string $key): self
    {
        return new self(self::toArray()[$key]);
    }
}
