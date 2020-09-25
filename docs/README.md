# php-ext



## 默认模块

| 模块名称   | ini 配置前缀         | 手册地址              | 函数        | PECL     | 内建 | 7.4  | 5.6  |
| ---------- | -------------------- | --------------------- | ----------- | -------- | ---- | ---- | ---- |
| Core       | 无前缀               |                       |             |          |      |      |      |
| cli_server | cli_server           | commandline.webserver |             |          | Y    |      |      |
| date       | date                 | datetime              |             |          | Y    |      |      |
| dom        | -                    | dom                   |             |          |      |      |      |
| ereg       |                      |                       |             |          |      | N    |      |
| filter     | filter               | filter                |             |          |      |      |      |
| hash       | -                    | hash                  |             | ~~hash~~ | Y    |      |      |
| iconv      | iconv                | iconv                 |             |          |      |      |      |
| json       | -                    | json                  |             |          | Y    |      |      |
| libxml     | -                    | libxml                |             |          |      |      |      |
| mcrypt     |                      |                       |             |          |      | N    |      |
| mysqlnd    | mysqlnd              | mysqlnd               |             |          |      |      |      |
| odbc       |                      |                       |             |          |      | N    |      |
| pcre       | pcre                 | pcre                  |             |          | Y    |      |      |
| Phar       | phar                 | phar                  | Phar::      | ~~phar~~ | Y    |      |      |
| Readline   | cli                  | readline              | readline\_\* |          |      |      | N    |
| Reflection | -                    | reflection            |             |          | Y    |      |      |
| session    | session              | session               |             |          |      |      |      |
| SimpleXML  | -                    | simplexml             |             |          |      |      |      |
| SPL        | -                    | spl                   |             |          | Y    |      |      |
| standard   | assert, url_rewriter | info, filesystem      |             |          |      |      |      |
| tokenizer  | -                    | tokenizer             |             |          | Y    |      |      |
| wddx       |                      |                       |             |          |      | N    |      |
| xml        | -                    | xml                   |             |          |      |      |      |
| xmlreader  | -                    | xmlreader             |             |          |      |      |      |
| xmlwriter  | -                    | xmlwriter             |             |          |      |      |      |
| zip        | -                    | zip                   |             | zip      |      |      |      |
| mhash      |                      |                       |             |          |      | N    |      |



### Core

核心扩展库，无法排除

| 模块名称   | ini 配置前缀            | 手册地址 | 函数 |
| ---------- | ----------------------- | ----------------------- | ----------------------- |
| errorfunc | error\_ 等 | errorfunc |  |
| filesystem |                         | filesystem | file\*<br>f\* |
| info       | assert, max\_, magic\_ 等 | info     | ini\_\*<br>php\_\* |
| outcontrol | output\_ 等   | outcontrol | ob\_\*<br>output\_\* |
| phpdbg | phpdbg | phpdbg | phpdbg\_\* |



### 绑定的扩展库

编译时配置

| 名称      | ini 配置前缀 | 手册地址  | 函数 | PECL   | 内建  | 7.4    | 5.6  |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | -------- |
| BCMath     | bcmath               | bc                    | bc\*         |          | Y    |      |      |
| calendar   | -                    | calendar              |             |          | Y    |      |      |
| ctype      | -                    | ctype                 |             |          | Y    |      |      |
| ftp        |                      |                       |             |          |      | N    |      |
| PDO        | pdo                  | pdo                   |             |          |      |      |      |
| zlib       | zlib                 | zlib                  |             |          |      |      |      |



## 共享扩展

已捆绑的外部扩展库

| 名称       | ini 配置前缀 | 手册地址   | PECL         | DLL  | Max  | Min  | 函数           | 实验性        |
| ---------- | ------------ | ---------- | ------------ | ---- | ---- | ---- | -------------- | -------------- |
| Bzip2    | -            | bzip2      |              |      |      |      | bz\* |  |
| curl       | curl         | curl       |              |      |      |      |                |                |
| DBA |  |  | | | | | | |
| Exif |  |  | | | | | | |
| FFI        | ffi          | ffi        |              |      |      |      |                | Y |
| fileinfo   | -            | fileinfo   | ~~fileinfo~~ |      |      |      |                |                |
| ftp        | -            | ftp        |              |      |      |      |                |                |
| gd2        | gd           | image      |              |      |      |      |                |                |
| Gettext |  |  | | | | | | |
| GMP |  |  | | | | | | |
| intl |  |  | | | | | | |
| IMAP |  |  | | | | | | |
| mbstring |  |  | | | | | | |
| MySQLi |  |  | | | | | | |
| OCI8 |  |  | | | | | | |
| ODBC |  |  | | | | | | |
| OpenSSL |  |  | | | | | | |
| OPcache    | opcache      | opcache    | ZendOpcache  | N    | 5.4  | 5.2  |                |                |
| PostgreSQL |  |  |  |  |  |  | | |
| shmop | | | | | | | | |
| SNMP | | | | | | | | |
| SOAP | | | | | | | | |
| Sockets | | | | | | | | |
| Sodium | | | | | | | | |
| SQLite3 | | | | | | | | |
| Tidy | | | | | | | | |
| XMLRPC | | | | | | | | |
| XSL | | | | | | | | |




## PECL 扩展库

### 影响 PHP 行为的扩展

| 名称      | ini 配置前缀 | 手册地址  | PECL   | DLL  | Max      | Min      | 函数     | 实验性  |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | ------------------- | ------------------- |
| APD       | apd          | apd       | ~~apd~~                                                | N    |          |          |                     |                     |
| bcompiler | -            | bcompiler | ~~bcompiler~~                                          | N    |          |          |                     |                     |
| BLENC     | blenc        | blenc     | ~~BLENC~~                                              |      | 5.6      | 5.3      |                     |                     |
| Componere | -            | componere | componere                                              |      | 7.4      | 7.0      |                     |                     |
| htscanner | htscanner    | htscanner | ~~htscanner~~                                          |      | 5.6      | 5.3      | N                   |                    |
| Memtrack  | memtrack     | memtrack  | ~~memtrack~~                                           | N    |          |          |                     | Y |
| runkit    | runkit       | runkit    | ~~runkit~~                                             |      | 5.6      | 5.5      | runkit\_\*           |            |
| runkit7   | runkit       | runkit7   | runkit7                                                |      | 7.4      | 7.1      | runkit7\_\*          |           |
| scream    | scream       | scream    | ~~scream~~                                             |      | 5.6      | 5.3      | N                   |                    |
| uopz      | uopz         | uopz      | uopz                                                   |      | 7.4      | 5.4      | uopz\_\*             |              |



#### 基准测试

| 名称      | ini 配置前缀 | 手册地址  | PECL   | DLL  | Max      | Min      | 函数     |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | ------------------- |
| inclued   | inclued      | inclued   | ~~inclued~~                                            |      | 5.4      | 5.3      |                     |



#### 结构

| 名称      | ini 配置前缀 | 手册地址  | PECL   | DLL  | Max      | Min      | 函数     |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | ------------------- |
| Weakref   | -            | weakref   | ~~weakref~~                                            |      | 7.2      | 5.3      | WeakRef::<br>WeakMap:: |



### 内存缓存

| 名称      | ini 配置前缀 | 手册地址  | PECL                                                   | DLL  | Max      | Min      | 函数                |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | ------------------- |
| APC       | apc          | apc       | ~~APC~~, apcu_bc                                       |      | 5.4, 7.4 | 5.3, 7.0 |                     |
| APCu      | apc          | apcu      | APCu                                                   |      | 7.4      | 5.3      |                     |
| WinCache  | wincache     | wincache  | [WinCache](https://sourceforge.net/projects/wincache/) |      | 5.4, 7.4 | 5.3      | wincache\_\*         |
| Yac       | yac          | yac       | yac                                                    |      | 7.4      | 5.3      | Yac::               |



### 身份认证服务

| 名称      | ini 配置前缀 | 手册地址  | PECL   | DLL  | Max      | Min      | 函数     |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | ------------------- |
| KADM5     | -            | kadm5     | ~~kadm5~~                                              | N    |          |          | kadm5\_\*            |
| Radius    | -            | radius    | radius                                                 |      | 7.4      | 5.3      | radius\_\*           |




### 控制台

#### 针对命令行的扩展

| 名称      | ini 配置前缀 | 手册地址  | PECL   | DLL  | Max      | Min      | 函数     |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | ------------------- |
| Ncurses   | -            | ncurses   | ncurses                                                |      | 5.6      | 5.5      | ncurses\_\*          |
| Newt      | -            | newt      | ~~newt~~                                               | N    |          |          | newt\_\*             |



### 文件格式

#### 音频格式操作

| 名称      | ini 配置前缀 | 手册地址  | PECL   | DLL  | Max      | Min      | 函数     |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | ------------------- |
| ID3       | -            | id3       | ~~id3~~                                                | N    |          |          | id3\_\*              |
| KTaglib   | -            | ktaglib   | ~~KTaglib~~                                            | N    |          |          | KTaglib\_\*::        |
| oggvorbis | -            | oggvorbis | ~~oggvorbis~~                                          | N    |          |          | N                   |
| OpenAL    | -            | openal    | openal                                                 | N    |          |          | openal\_\*           |



#### 压缩与归档扩展

| 名称      | ini 配置前缀 | 手册地址  | PECL   | DLL  | Max      | Min      | 函数     |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | ------------------- |
| LZF       | -            | lzf       | lzf                                                    |      | 7.4      | 5.3      | lzf\_\*              |
| Rar       | -            | rar       | rar                                                    |      | 7.2      | 5.3      | Rar\*::              |



### 实用工具

| 名称      | ini 配置前缀 | 手册地址  | PECL   | DLL  | Max      | Min      | 函数     |
| --------- | ------------ | --------- | ------------------------------------------------------ | ---- | -------- | -------- | ------------------- |
| Xhprof    | xhprof       | xhprof    | xhprof                                                 |      | 7.4      | 7.2      | xhprof\_\*           |