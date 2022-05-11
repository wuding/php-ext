# cURL

Client URL 库



| 函数名    | 描述 | 别名 |
| --------- | ---- | ---- |
| curl_init |      |      |
|           |      |      |
|           |      |      |



## 选项



### bool

| 选项                   | 值    | 备注                                         |
| ---------------------- | ----- | -------------------------------------------- |
| CURLOPT_AUTOREFERER    |       | header 中的 Referer                          |
| CURLOPT_HEADER         |       |                                              |
| CURLOPT_POST           |       | POST 请求，application/x-www-form-urlencoded |
| CURLOPT_SAFE_UPLOAD    | false | PHP 5.5 默认 false 5.6 true 7.0 CURLFile     |
| CURLOPT_SSL_VERIFYPEER | true  | 验证对等证书                                 |



### integer

| 选项 | 值   | 备注 |
| ---- | ---- | ---- |
|      |      |      |
|      |      |      |
|      |      |      |



### string

| 选项               | 值                                | 备注                         |
| ------------------ | --------------------------------- | ---------------------------- |
| CURLOPT_URL        |                                   |                              |
| CURLOPT_POSTFIELDS | array('file' => '@/user/tes.png') | CURLOPT_SAFE_UPLOAD 为 false |
|                    |                                   |                              |



### array

| 选项               | 值                                | 备注 |
| ------------------ | --------------------------------- | ---- |
| CURLOPT_HTTPHEADER | array('Content-type: text/plain') |      |
|                    |                                   |      |
|                    |                                   |      |





## Usage

### 获取 HTTP 头信息

```php
array(
    'option' => array(
        CURLOPT_HEADER => true,
        CURLINFO_HEADER_OUT => true,
    ),
)
```

