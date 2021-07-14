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
        $quotes = json_decode(file_get_contents(__DIR__ . '/../db/quotes.json'));
        $quote = $quotes[array_rand($quotes)];

        return quote::from_object($quote);
    }

}
