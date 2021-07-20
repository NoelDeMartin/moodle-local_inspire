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

import { Component } from '@moodlehq/moodle-app';

import template from './inspire.html';

interface Quote {
    genre: string;
    author: string;
    text: string;
}

interface WSGetQuoteResponse {
    quote: Quote;
}

@Component({
    title: translate('inspire'),
    template,
})
export default class InspirePage {

    quote: Quote | null = null;

    onInit() {
        this.refreshQuote();
    }

    async refreshQuote() {
        this.quote = null;

        const site = await CoreSitesProvider.getSite();
        const presets = { siteUrl: site.siteUrl, noLogin: true };
        const { quote } = await CoreWSProvider.callAjax<WSGetQuoteResponse>(
            'local_inspire_get_quote',
            {},
            presets,
        );

        this.quote = quote;
    }

}
