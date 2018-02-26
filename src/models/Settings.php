<?php
/**
 * Geo Cookie plugin for Craft CMS 3.x
 *
 * Collect information about a visitor's location based on their IP address and store the information as a cookie.
 *
 * @link      https://github.com/lukeyouell
 * @copyright Copyright (c) 2017 Luke Youell
 */

namespace lukeyouell\geocookie\models;

use lukeyouell\geocookie\GeoCookie;

use Craft;
use craft\base\Model;

/**
 * @author    Luke Youell
 * @package   GeoCookie
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var bool
     */
     public $anonymisation = true;

    /**
     * @var string
     */
     public $apiSourceOptions = [
       ['optgroup' => 'Key not required'],
       ['value' => 'extremeiplookup', 'label' => 'extreme-ip-lookup.com'],
       ['value' => 'freegeoip', 'label' => 'freegeoip.net'],
       ['value' => 'ipapi', 'label' => 'ipapi.co'],
       ['value' => 'ipapicom', 'label' => 'ip-api.com'],
       ['value' => 'ipfind', 'label' => 'ipfind.co'],
       ['value' => 'ipinfo', 'label' => 'ipnfo.io'],
       ['value' => 'keycdn', 'label' => 'keycdn.com'],
       ['optgroup' => 'Key required'],
       ['value' => 'dbip', 'label' => 'db-ip.com'],
     ];

    /**
     * @var string
     */
     public $apiSource = 'ipapi';

    /**
     * @var string
     */
     public $apiKey = null;

    /**
     * @var string
     */
     public $requestTimeoutOptions = [
       ['value' => 0, 'label' => 'Indefinitely (not recommended)'],
       ['value' => 1, 'label' => '1'],
       ['value' => 2, 'label' => '2'],
       ['value' => 3, 'label' => '3'],
       ['value' => 4, 'label' => '4'],
       ['value' => 5, 'label' => '5'],
       ['value' => 6, 'label' => '6'],
       ['value' => 7, 'label' => '7'],
       ['value' => 8, 'label' => '8'],
       ['value' => 9, 'label' => '9'],
       ['value' => 10, 'label' => '10'],
     ];

    /**
     * @var integer
     */
     public $requestTimeout = 5;

    /**
     * @var string
     */
     public $fallbackIp = '8.8.8.8';

    /**
     * @var string
     */
     public $cookieName = 'geoCookie';

    /**
     * @var string
     */
     public $cookieDurationOptions = [
       ['value' => 1, 'label' => '1 hour'],
       ['value' => 24, 'label' => '1 day'],
       ['value' => 168, 'label' => '1 week'],
       ['value' => 672, 'label' => '1 month'],
       ['value' => 2016, 'label' => '3 months'],
       ['value' => 4368, 'label' => '6 months'],
       ['value' => 8736, 'label' => '1 year'],
     ];

    /**
     * @var integer
     */
     public $cookieDuration = 168;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
      return [
          ['anonymisation', 'boolean'],
          [['apiSource', 'apiKey', 'fallbackIp', 'cookieName'], 'string'],
          [['requestTimeout', 'cookieDuration'], 'integer'],
          [['apiSource', 'requestTimeout', 'fallbackIp', 'cookieName', 'cookieDuration'], 'required']
      ];
    }
}
