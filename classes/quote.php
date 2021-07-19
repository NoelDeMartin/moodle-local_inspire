<?php
// (C) Copyright 2021 Moodle Pty Ltd.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

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

    /**
     * Convert to array.
     *
     * @return array Array quote data.
     */
    public function to_array(): array {
        return [
            'genre' => $this->genre,
            'text' => $this->text,
            'author' => $this->author,
        ];
    }

}
