<?php

namespace QCubed\Plugin\Event;

use QCubed\Event\EventBase;

/**
 * Class ImageRefresh
 *
 * Identifies a recording event that occurs when a cropped image is sent to recording.
 *
 */

class ChangeObject extends EventBase {

    const EVENT_NAME = 'changeobject';
    const JS_RETURN_PARAM = 'ui';
}
