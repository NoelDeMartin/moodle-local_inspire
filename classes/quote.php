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
