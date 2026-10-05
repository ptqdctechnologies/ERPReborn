<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\NetworkSecurity;

class FirewallEndpointWildfireSettingsWildfireInlineCloudAnalysisSettings extends \Google\Model
{
  /**
   * WildFire inline cloud analysis timeout action not specified.
   */
  public const TIMEOUT_ACTION_WILDFIRE_INLINE_CLOUD_ANALYSIS_TIMEOUT_ACTION_UNSPECIFIED = 'WILDFIRE_INLINE_CLOUD_ANALYSIS_TIMEOUT_ACTION_UNSPECIFIED';
  /**
   * The files that timed out will be allowed to transmit.
   */
  public const TIMEOUT_ACTION_ALLOW = 'ALLOW';
  /**
   * The files that timed out will be denied to transmit.
   */
  public const TIMEOUT_ACTION_DENY = 'DENY';
  /**
   * Optional. Timeout in milliseconds on a file being held while WildFire
   * inline cloud analysis is performed. Value between 1 to 240000 is valid.
   * Default value is 30000.
   *
   * @var string
   */
  public $maxAnalysisDuration;
  /**
   * Optional. Whether to disable WildFire submission log generation for files
   * that timeout during WildFire inline cloud analysis.
   *
   * @var bool
   */
  public $submissionTimeoutLoggingDisabled;
  /**
   * Optional. Action to take when WildFire inline cloud analysis times out.
   * Default value is ALLOW.
   *
   * @var string
   */
  public $timeoutAction;

  /**
   * Optional. Timeout in milliseconds on a file being held while WildFire
   * inline cloud analysis is performed. Value between 1 to 240000 is valid.
   * Default value is 30000.
   *
   * @param string $maxAnalysisDuration
   */
  public function setMaxAnalysisDuration($maxAnalysisDuration)
  {
    $this->maxAnalysisDuration = $maxAnalysisDuration;
  }
  /**
   * @return string
   */
  public function getMaxAnalysisDuration()
  {
    return $this->maxAnalysisDuration;
  }
  /**
   * Optional. Whether to disable WildFire submission log generation for files
   * that timeout during WildFire inline cloud analysis.
   *
   * @param bool $submissionTimeoutLoggingDisabled
   */
  public function setSubmissionTimeoutLoggingDisabled($submissionTimeoutLoggingDisabled)
  {
    $this->submissionTimeoutLoggingDisabled = $submissionTimeoutLoggingDisabled;
  }
  /**
   * @return bool
   */
  public function getSubmissionTimeoutLoggingDisabled()
  {
    return $this->submissionTimeoutLoggingDisabled;
  }
  /**
   * Optional. Action to take when WildFire inline cloud analysis times out.
   * Default value is ALLOW.
   *
   * Accepted values: WILDFIRE_INLINE_CLOUD_ANALYSIS_TIMEOUT_ACTION_UNSPECIFIED,
   * ALLOW, DENY
   *
   * @param self::TIMEOUT_ACTION_* $timeoutAction
   */
  public function setTimeoutAction($timeoutAction)
  {
    $this->timeoutAction = $timeoutAction;
  }
  /**
   * @return self::TIMEOUT_ACTION_*
   */
  public function getTimeoutAction()
  {
    return $this->timeoutAction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirewallEndpointWildfireSettingsWildfireInlineCloudAnalysisSettings::class, 'Google_Service_NetworkSecurity_FirewallEndpointWildfireSettingsWildfireInlineCloudAnalysisSettings');
