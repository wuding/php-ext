<?php

namespace Ext\X;

class GeoIP
{
    const VERSION = '20.240.788';

    public static $dir = null;
    public static $hostname = null;

    public function __construct($hostname = null, $path = null)
    {
        if (null !== $hostname) {
            self::$hostname = $hostname;
        }
        if (null !== $path) {
            self::$dir = self::directory($path);
        }
    }

    public static function _ip($hostname = null)
    {
        return $hostname ?: self::$hostname;
    }

    public static function directory($path = null)
    {
        return geoip_setup_custom_directory($path);
    }

    public static function asnum($hostname = null)
    {
        $hostname = $hostname ?: self::$hostname;
        return geoip_asnum_by_name($hostname);
    }

    public static function continent($hostname = null)
    {
        return geoip_continent_code_by_name(self::_ip($hostname));
    }

    public static function countryCode($hostname = null)
    {
        return geoip_country_code_by_name(self::_ip($hostname));
    }

    public static function countryCode3($hostname = null)
    {
        return geoip_country_code3_by_name(self::_ip($hostname));
    }

    public static function country($hostname = null)
    {
        return geoip_country_name_by_name(self::_ip($hostname));
    }

    public static function domain($hostname = null)
    {
        return geoip_domain_by_name(self::_ip($hostname));
    }

    public static function id($hostname = null)
    {
        return geoip_id_by_name(self::_ip($hostname));
    }

    public static function isp($hostname = null)
    {
        return geoip_isp_by_name(self::_ip($hostname));
    }

    public static function org($hostname = null)
    {
        return geoip_org_by_name(self::_ip($hostname));
    }

    public static function record($hostname = null)
    {
        return geoip_record_by_name(self::_ip($hostname));
    }

    public static function region($hostname = null)
    {
        return geoip_region_by_name(self::_ip($hostname));
    }

    public static function regionName($country_code = null, $region_code = null)
    {
        return geoip_region_name_by_code($country_code, $region_code);
    }

    public static function timezone($country_code = null, $region_code = null)
    {
        return geoip_time_zone_by_country_and_region($country_code, $region_code);
    }

    public static function netspeedcell($hostname = null)
    {
        return geoip_netspeedcell_by_name(self::_ip($hostname));
    }

    public static function database($database = GEOIP_COUNTRY_EDITION)
    {
        return geoip_database_info($database);
    }

    public static function dbAvail($database = GEOIP_COUNTRY_EDITION)
    {
        return geoip_db_avail($database);
    }

    public static function dbFilename($database = GEOIP_COUNTRY_EDITION)
    {
        return geoip_db_filename($database);
    }

    public static function db()
    {
        return geoip_db_get_all_info();
    }
}
