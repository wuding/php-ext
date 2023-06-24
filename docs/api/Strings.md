# Strings

字符串

<!-- VER 23.6.23 REV 3  -->

## 格式化 9

| 方法名  | 函数名        | 描述 |
| ------- | ------------- | ---- |
|         | printf        |      |
| fPrintF | fprintf       |      |
|         | sprintf       |      |
|         | vprintf       |      |
|         | vfprintf      |      |
|         | vsprintf      |      |
|         | number_format |      |
|         | fscanf        |      |
|         | sscanf        |      |



### 修剪 3 + 1

| 函数名 | 描述            | 别名 |
| ------ | --------------- | ---- |
| trim   | " \t\n\r\0\x0B" |      |
| ltrim  |                 |      |
| rtrim  |                 | chop |



### 大小写 5

| 函数名     | 描述 |      |
| ---------- | ---- | ---- |
| lcfirst    |      |      |
| ucfirst    |      |      |
| strtolower |      |      |
| strtoupper |      |      |
| ucwords    |      |      |



### 本地化 4

| 函数名       | 描述 |      |
| ------------ | ---- | ---- |
| localeconv   |      |      |
| setlocale    |      |      |
| money_format |      |      |
| nl_langinfo  |      |      |



## ASCII、字符集 5

| Deprecated | 方法名              | 函数名              | 描述 |
| -----------| ------------------ | ------------------ | ---- |
|            | ~                  | chr                |      |
|            |                    | ord                |      |
| -          | convertCyr         | convert_cyr_string |      |
|            |                    | hebrev             |      |
| -          |                    | hebrevc            |      |




## 编码解码 6 - 2

| 方法名   | 函数名                  | 描述 |
| -------- | ----------------------- | ---- |
| uuDecode | convert_uudecode        |      |
| uuEncode | convert_uuencode        |      |
|          | metaphone               |      |
|          | soundex                 |      |
|          | quoted_printable_decode |      |
|          | quoted_printable_encode |      |

23.6.23 11:
| Deprecated | 方法名              | 函数名              | 描述 |
| -----------| ------------------ | ------------------ | ---- |
| -          |                    | utf8_decode        |      |
| -          |                    | utf8_encode        |      |



### 转义 5

加减反斜杠

| 方法名      | 函数名        | 描述                  |
| ----------- | ------------- | --------------------- |
| addCSlashes | addcslashes   |                       |
| addSlashes  | addslashes    |                       |
|             | stripcslashes |                       |
|             | stripslashes  |                       |
|             | quotemeta     | + \ . ? * ( ) [ ] ^ $ |



### 进制 2

| 方法名  | 函数名  | 描述    |
| ------- | ------- | ------- |
| bin2Hex | bin2hex | 2 => 16 |
| hex2Bin | hex2bin | 16 => 2 |



### 散列值 6

| 方法名 | 函数名    | 描述 |
| ------ | --------- | ---- |
| ~      | crc32     |      |
|        | md5       |      |
|        | md5_file  |      |
|        | sha1      |      |
|        | sha1_file |      |
| ~      | crypt     |      |



### HTML 7

字符变换、移除

| 方法名                  | 函数名                     | 描述 |
| ----------------------- | -------------------------- | ---- |
|                         | html_entity_decode         |      |
|                         | htmlentities               |      |
|                         | htmlspecialchars           |      |
|                         | htmlspecialchars_decode    |      |
| getHtmlTranslationTable | get_html_translation_table |      |
|                         | nl2br                      |      |
|                         | strip_tags                 |      |



## 解析、查找、替换 17 + 1 - 3

|                |      | 别名   |
| -------------- | ---- | ------ |
| parse_str      |      |        |
| str_getcsv     |      |        |
| str_replace    |      |        |
| str_ireplace   |      |        |
| substr_replace |      |        |
| strtr          |      |        |
| str_rot13      |      |        |
| strrchr        |      |        |
| strstr         |      | strchr |
| stristr        |      |        |
| strpos         |      |        |
| stripos        |      |        |
| strrpos        |      |        |
| strripos       |      |        |
| strpbrk        |      |        |
| strrev         |      |        |
| substr         |      |        |

Migrating from PHP 7.4.x to PHP 8.0.x
23.6.23 10:
| 方法名      | 函数名           | 描述 |
| ---------- | --------------- | ---- |
|            | str_contains    |      |
|            | str_ends_with   |      |
|            | str_starts_with |      |




## 计数、位置、比较 15

| 方法名      | 函数名          | 描述                                             |                               |
| ---------- | -------------- | ------------------------------------------------ | ----------------------------- |
| countChars | count_chars    |                                                  |                               |
|            | str_word_count |                                                  |                               |
|            | substr_count   |                                                  |                               |
|            | levenshtein    |                                                  |                               |
|            | similar_text   |                                                  |                               |
|            | strcmp         |                                                  |                               |
|            | strcasecmp     |                                                  |                               |
|            | strnatcmp      |                                                  |                               |
|            | strnatcasecmp  |                                                  |                               |
|            | strncmp        |                                                  |                               |
|            | substr_compare |                                                  |                               |
|            | strcoll        |                                                  |                               |
|            | strspn         | Find length of initial segment not matching mask | 获取不匹配遮罩的起始子字符串的长度 |
|            | strcspn        |                                                  |                               |
|            | strlen         |                                                  |                               |



## 分割、合并、填充 9 + 1

| 方法名     | 函数名      | 描述 | 别名 |
| ---------- | ----------- | ---- | ---- |
| chunkSplit | chunk_split |      |      |
|            | str_split   |      |      |
| ~          | explode     |      |      |
|            | implode     |      | join |
|            | wordwrap    |      |      |
|            | strtok      |      |      |
|            | str_pad     |      |      |
|            | str_reapt   |      |      |
|            | str_shuffle |      |      |



## 语言结构 2

| 方法名 | 函数名 | 描述 |
| ------ | ------ | ---- |
| ~      | echo   |      |
|        | print  |      |

