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

/* CoreMainMenu */

export interface CoreMainMenuHandlerData {
    page: string;
    title: string;
    icon: string;
}

export interface CoreMainMenuHandler {
    name: string;
    isEnabled(): Promise<boolean>;
    getDisplayData(): CoreMainMenuHandlerData;
}

export declare class CoreMainMenuDelegateService {
    registerHandler(handler: CoreMainMenuHandler): void;
}

/* CoreWS */

export type CoreWSAjaxPreSets = {
    siteUrl: string;
    noLogin?: boolean;
};

export declare class CoreWSProvider {
    callAjax<T = unknown>(method: string, data: Record<string, unknown>, preSets: CoreWSAjaxPreSets): Promise<T>;
}

/* CoreSite */

export declare class CoreSite {
    siteUrl: string;
}

/* CoreSites */

export declare class CoreSitesProvider {
    getSite(siteId?: string): Promise<CoreSite>;
}
