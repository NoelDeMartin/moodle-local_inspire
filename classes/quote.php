<?php

namespace local_inspire;

defined('MOODLE_INTERNAL') || die();

/**
 * Quote.
 *
 * @package local_inspire
 */
class quote {

    /**
     * Create a quote from a plain object.
     *
     * @param object $data Object quote data.
     * @return quote
     */
    public static function from_object(object $data): quote {
        return new quote($data->genre, $data->text, $data->author);
    }

    /**
     * @var string
     */
    public $genre;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $author;

    public function __construct(string $genre, string $text, string $author) {
        $this->genre = $genre;
        $this->text = $text;
        $this->author = $author;
    }

}
