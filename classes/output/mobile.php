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
     * Render static inspire page.
     *
     * @return array View data.
     */
    public static function render_inspire_static() {
        global $OUTPUT;

        $quote = inspire::wisdom();

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => $OUTPUT->render_from_template('local_inspire/inspire_static', compact('quote')),
                ],
            ],
        ];
    }

    /**
     * Initialize javascript.
     *
     * @return array Javascript data.
     */
    public static function init_javascript() {
        $javascript = file_get_contents(__DIR__ . '/../../js/dist/main.js');
        $javascript = "with (this) { $javascript }";

        return [
            'templates' => [],
            'javascript' => $javascript,
            'otherdata' => '',
            'files' => [],
        ];
    }

}
