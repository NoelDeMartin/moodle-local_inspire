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

global $CFG;

require_once($CFG->libdir . "/externallib.php");

use external_api;
use external_description;
use external_function_parameters;
use external_single_structure;
use external_value;

/**
 * External API.
 *
 * @package local_apps
 */
class external extends external_api {

    /**
     * Returns description of method parameters for get_quote.
     *
     * @return external_function_parameters
     */
    public static function get_quote_parameters(): external_function_parameters {
        return new external_function_parameters([]);
    }

    /**
     * Get an inspirational quote.
     */
    public static function get_quote() {
        $quote = inspire::wisdom()->to_array();

        return compact('quote');
    }

    /**
     * Returns description of method result value for get_quote.
     *
     * @return external_description
     */
    public static function get_quote_returns(): external_description {
        return new external_single_structure([
            'quote' => new external_single_structure(
                [
                    'genre' => new external_value(PARAM_RAW),
                    'text' => new external_value(PARAM_RAW),
                    'author' => new external_value(PARAM_RAW),
                ],
                'An inspirational quote.'
            ),
        ], 'Wisdom.');
    }

}
