<?php

namespace local_inspire;

defined('MOODLE_INTERNAL') || die();

/**
 * Inspire.
 */
class inspire {

    /**
     * Get a random quote.
     *
     * @return object Quote.
     */
    public static function wisdom(): quote {
        return new quote(
            'Stoicisim',
            'We suffer more in imagination than in reality.',
            'Seneca'
        );
    }

}
