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
