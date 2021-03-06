/**
 * Copyright 2015-2017 info@neomerx.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
import { ErrorResponseCodes } from './ErrorResponseCodes';
/**
 * OAuth 2.0 token error description.
 *
 * @link https://tools.ietf.org/html/rfc6749#section-5.2
 */
export interface ErrorResponseInterface {
    /**
     * Error code.
     */
    readonly error: ErrorResponseCodes;
    /**
     * Human-readable text providing additional information.
     */
    readonly error_description?: string;
    /**
     * A URI identifying a human-readable web page with information about the error.
     */
    readonly error_uri?: string;
}
