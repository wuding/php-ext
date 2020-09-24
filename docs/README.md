# php-ext



## 默认模块

| 模块名称   | ini 配置前缀         | 手册地址              | PECL     | 默认启用 | 内建 | 内核组件 | 核心（扩展） | 7.4  | 5.6  |
| ---------- | -------------------- | --------------------- | -------- | -------- | ---- | -------- | ------------ | ---- | ---- |
| Core       | 无前缀               |                       |          |          |      |          |              |      |      |
| bcmath     | bcmath               | bc                    |          |          | Y    |          |              |      |      |
| calendar   | -                    | calendar              |          |          | Y    |          |              |      |      |
| ctype      | -                    | ctype                 |          |          | Y    |          |              |      |      |
| date       | date                 | datetime              |          |          |      |          | Y            |      |      |
| ereg       |                      |                       |          |          |      |          |              | N    |      |
| filter     | filter               | filter                |          | Y        |      |          |              |      |      |
| ftp        |                      |                       |          |          |      |          |              | N    |      |
| hash       | -                    | hash                  | ~~hash~~ |          |      |          | Y            |      |      |
| iconv      | iconv                | iconv                 |          | Y        |      |          |              |      |      |
| json       | -                    | json                  |          |          | Y    |          |              |      |      |
| mcrypt     |                      |                       |          |          |      |          |              | N    |      |
| SPL        | -                    | spl                   |          |          |      | Y        |              |      |      |
| odbc       |                      |                       |          |          |      |          |              | N    |      |
| pcre       | pcre                 | pcre                  |          |          |      |          | Y            |      |      |
| readline   | cli                  | readline              |          |          |      |          |              |      | N    |
| Reflection | -                    | reflection            |          |          |      |          | Y            |      |      |
| session    | session              | session               |          | Y        |      |          |              |      |      |
| standard   | assert, url_rewriter | info, filesystem      |          |          |      |          |              |      |      |
| mysqlnd    | mysqlnd              | mysqlnd               |          | Y        |      |          |              |      |      |
| tokenizer  | -                    | tokenizer             |          |          | Y    |          |              |      |      |
| zip        | -                    | zip                   | zip      |          |      |          |              |      |      |
| zlib       | zlib                 | zlib                  |          | Y        |      |          |              |      |      |
| libxml     | -                    | libxml                |          | Y        |      |          |              |      |      |
| dom        | -                    | dom                   |          | Y        |      |          |              |      |      |
| PDO        | pdo                  | pdo                   |          |          |      |          |              |      |      |
| Phar       | phar                 | phar                  | ~~phar~~ |          | Y    |          |              |      |      |
| SimpleXML  | -                    | simplexml             |          | Y        |      |          |              |      |      |
| wddx       |                      |                       |          |          |      |          |              | N    |      |
| xml        | -                    | xml                   |          | Y        |      |          |              |      |      |
| xmlreader  | -                    | xmlreader             |          | Y        |      |          |              |      |      |
| xmlwriter  | -                    | xmlwriter             |          | Y        |      |          |              |      |      |
| cli_server | cli_server           | commandline.webserver |          |          | Y    |          |              |      |      |
| mhash      |                      |                       |          |          |      |          |              | N    |      |



## Core

| 模块名称   | ini 配置前缀            | 手册地址 |
| ---------- | ----------------------- | -------- |
| info       | assert, max\_, magic\_ 等 | info     |
| filesystem |                         |          |
|            |                         |          |



## 共享扩展

| 名称     | ini 配置前缀 | 手册地址 | PECL         | 实验性 |
| -------- | ------------ | -------- | ------------ | ------ |
| bz2      | -            | bzip2    |              |        |
| curl     | curl         | curl     |              |        |
| ffi      | ffi          | ffi      |              | Y      |
| ftp      | -            | ftp      |              |        |
| fileinfo | -            | fileinfo | ~~fileinfo~~ |        |
| gd2      | gd           | image    |              |        |

