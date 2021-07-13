<?php

namespace local_inspire\output;

use local_inspire\inspire;

defined('MOODLE_INTERNAL') || die();

/**
 * Mobile handler.
 *
 * @package local_inspire\output
 */
class mobile {

    /**
     * Render index page.
     *
     * @return array Mobile view data.
     */
    public static function render_index() {
        global $OUTPUT;

        $quote = inspire::wisdom();

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => $OUTPUT->render_from_template('local_inspire/index', compact('quote')),
                ],
            ],
        ];
    }

}
