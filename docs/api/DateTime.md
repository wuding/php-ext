Date and Time Related Extensions
# Date/Time - Date and Time

<!-- VER 5.260208 -->

## Date/Time Functions

checkdate
date_add
date_create_from_format
date_create_immutable_from_format
date_create_immutable
date_create
date_date_set
date_default_timezone_get
date_default_timezone_set
date_diff
date_format
date_get_last_errors
date_interval_create_from_date_string
date_interval_format
date_isodate_set
date_modify
date_offset_get
date_parse_from_format
date_parse
date_sub
date_sun_info
date_sunrise
date_sunset
date_time_set
date_timestamp_get
date_timestamp_set
date_timezone_get
date_timezone_set
date
getdate
gettimeofday
gmdate
gmmktime
gmstrftime
idate
localtime
microtime
mktime
strftime
strptime
strtotime
time
timezone_abbreviations_list
timezone_identifiers_list
timezone_location_get
timezone_name_from_abbr
timezone_name_get
timezone_offset_set
timezone_open
timezone_transitions_get
timezone_version_get

## 分类

### 验证和错误

checkdate

date_get_last_errors — 别名 DateTimeImmutable::getLastErrors



### 格式化

| 函数名 | 描述 | 别名 |
| ------ | ---- | ---- |
| date   |      |      |

date_format — 别名 DateTime::format

date_interval_format — 别名 DateInterval::format

gmdate

idate

strftime



### 修改对象

#### DateTime

date_add — 别名 DateTime::add

date_create_from_format — 别名 DateTime::createFromFormat

date_date_set — 别名 DateTime::setDate

date_isodate_set — 别名 DateTime::setISODate

date_modify — 别名 DateTime::modify

date_sub — 别名 DateTime::sub

date_time_set — 别名 DateTime::setTime

date_timestamp_set — 别名 DateTime::setTimestamp

date_timezone_set — 别名 DateTime::setTimezone

#### DateTimeImmutable

date_create_immutable_from_format — 别名 DateTimeImmutable::createFromFormat







### 创建对象

#### DateTime

date_create

#### DateTimeImmutable

date_create_immutable

#### DateInterval

date_interval_create_from_date_string — 别名 DateInterval::createFromDateString

#### DateTimeZone

timezone_open — 别名 DateTimeZone::__construct



### 时区及定位

date_default_timezone_get
date_default_timezone_set

timezone_location_get — 别名 DateTimeZone::getLocation

timezone_name_from_abbr

timezone_name_get — 别名 DateTimeZone::getName



### 差值、时差

date_diff — 别名 DateTime::diff

date_offset_get — 别名 DateTime::getOffset

timezone_offset_get — 别名 DateTimeZone::getOffset



### 解析

date_parse

date_parse_from_format 



### 日出日落曙光暮色

date_sun_info
date_sunrise
date_sunset



### 获取属性

date_timestamp_get — 别名 DateTime::getTimestamp

date_timezone_get — 别名 DateTime::getTimezone

getdate

localtime

strptime

timezone_transitions_get — 别名 DateTimeZone::getTransitions



### 时间戳

| 函数名       | 描述 | 别名 |
| ------------ | ---- | ---- |
| gettimeofday |      |      |
| gmmktime     |      |      |
| gmstrftime   |      |      |
| microtime    |      |      |
| mktime       |      |      |
| strtotime    |      |      |
| time         |      |      |





### 数据库信息

timezone_abbreviations_list — 别名 DateTimeZone::listAbbreviations

timezone_identifiers_list — 别名 DateTimeZone::listIdentifiers

timezone_version_get

