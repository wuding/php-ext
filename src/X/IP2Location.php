<?php

namespace Ext\X;

class IP2Location
{
    const VERSION = '20.240.806';

    public static $ip = null;
    public static $mem = null;
    public static $db = null;

    public function __construct($ip = null, $db = null, $memory = IP2LOCATION_FILE_IO)
    {
        self::ipAddress($ip);
        $db = self::db($db);
        if (null !== $db) {
            self::open($db);
        }
        if (null !== $memory) {
            self::mem($memory);
        }
    }

    public static function _ip($ip = null)
    {
        return $ip ?: self::$ip;
    }

    public static function _db($db = null)
    {
        return $db ?: (self::$db ?: get_cfg_var('ip2location.db'));
    }

    public static function open($db = null)
    {
        return ip2location_open($db);
    }

    // IP2LOCATION_CACHE_MEMORY IP2LOCATION_SHARED_MEMORY
    public static function mem($type = IP2LOCATION_FILE_IO)
    {
        self::$mem = $type;
        return ip2location_open_mem($type);
    }

    public static function shm()
    {
        return ip2location_delete_shm();
    }

    public static function close()
    {
        ip2location_close();
        if (IP2LOCATION_SHARED_MEMORY === self::$mem) {
            self::shm();
        }
    }

    public static function country($ip = null)
    {
        return ip2location_get_country_short(self::_ip($ip));
    }

    public static function countryCode($ip = null)
    {
        return self::country($ip);
    }

    public static function countryName($ip = null)
    {
        return ip2location_get_country_long(self::_ip($ip));
    }

    public static function region($ip = null)
    {
        return ip2location_get_region(self::_ip($ip));
    }

    public static function regionName($ip = null)
    {
        return self::region($ip);
    }

    public static function city($ip = null)
    {
        return ip2location_get_city(self::_ip($ip));
    }

    public static function cityName($ip = null)
    {
        return self::city($ip);
    }

    public static function isp($ip = null)
    {
        return ip2location_get_isp(self::_ip($ip));
    }

    public static function latitude($ip = null)
    {
        return ip2location_get_latitude(self::_ip($ip));
    }

    public static function longitude($ip = null)
    {
        return ip2location_get_longitude(self::_ip($ip));
    }

    public static function domain($ip = null)
    {
        return ip2location_get_domain(self::_ip($ip));
    }

    public static function domainName($ip = null)
    {
        return self::domain($ip);
    }

    public static function zipCode($ip = null)
    {
        return ip2location_get_zipcode(self::_ip($ip));
    }

    public static function timeZone($ip = null)
    {
        return ip2location_get_timezone(self::_ip($ip));
    }

    public static function netSpeed($ip = null)
    {
        return ip2location_get_netspeed(self::_ip($ip));
    }

    public static function iddCode($ip = null)
    {
        return ip2location_get_iddcode(self::_ip($ip));
    }

    public static function areaCode($ip = null)
    {
        return ip2location_get_areacode(self::_ip($ip));
    }

    public static function weatherStationCode($ip = null)
    {
        return ip2location_get_weatherstationcode(self::_ip($ip));
    }

    public static function weatherStation($ip = null)
    {
        return ip2location_get_weatherstationname(self::_ip($ip));
    }

    public static function weatherStationName($ip = null)
    {
        return self::weatherStation($ip);
    }

    public static function mcc($ip = null)
    {
        return ip2location_get_mcc(self::_ip($ip));
    }

    public static function mnc($ip = null)
    {
        return ip2location_get_mnc(self::_ip($ip));
    }

    public static function mobileBrand($ip = null)
    {
        return ip2location_get_mobilebrand(self::_ip($ip));
    }

    public static function mobileCarrierName($ip = null)
    {
        return self::mobileBrand($ip);
    }

    public static function elevation($ip = null)
    {
        return ip2location_get_elevation(self::_ip($ip));
    }

    public static function usageType($ip = null)
    {
        return ip2location_get_usagetype(self::_ip($ip));
    }

    public static function ipNumber($ip = null)
    {
        $ip = self::_ip($ip);
        $ipv4 = explode('.', $ip);
        return $ip2num = 256 * 256 * 256 * $ipv4[0] + 256 * 256 * $ipv4[1] + 256 * $ipv4[2] + $ipv4[3];
    }

    public static function db($db = null)
    {
        if (null !== $db) {
            self::$db = $db;
        }
        return self::_db($db);
    }

    public static function ipAddress($ip = null)
    {
        if (null !== $ip) {
            self::$ip = $ip;
        }
        return self::_ip($ip);
    }

    public static function ipVersion($ip = null)
    {
        $ip = self::_ip($ip);
        return $version = false !== strpos($ip, '.') ? 4 : 6;
    }

    public static function lookup($ip = null)
    {
        $db = self::_db();
        if (!$db) {
            print_r(['no ip2location.db', __FILE__, __LINE__]);
            return $db;
        }
        self::ipAddress($ip);
        $arr = [];
        $string = 'ipNumber,ipVersion,ipAddress,mcc,mnc,mobileCarrierName,weatherStationName,weatherStationCode,iddCode,areaCode,latitude,longitude,countryName,countryCode,usageType,elevation,netSpeed,timeZone,zipCode,domainName,isp,cityName,regionName';
        $variable = explode(',', $string);
        foreach ($variable as $fn) {
            $arr[$fn] = self::$fn();
        }
        return $arr;
    }
}
