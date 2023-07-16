https://www.php.net/manual/en/refs.basic.session.php
Session Extensions

https://www.php.net/manual/en/book.session.php
# Session - Session Handling

<!-- VER 23.7.16 REV 2 -->

https://www.php.net/manual/en/ref.session.php
## Session Functions

session_abort
session_cache_expire
session_cache_limiter
session_commit
session_create_id
session_decode
session_destroy
session_encode
session_gc
session_get_cookie_params
session_id
session_module_name
session_name
session_regenerate_id
session_register_shutdown
session_reset
session_save_path
session_set_cookie_params
session_set_save_handler
session_start
session_status
session_unset
session_write_close


## 分类

### save

session_save_path
session_set_save_handler

### initial

session_start

session_name

### cookie

session_get_cookie_params
session_set_cookie_params

### 子类

| 方法名  | 函数名                 | 别名  | 全称        | 翻译 | 描述  |
| ------ | --------------------- | ---- | ---------- | ---- | ---- |
|        |                       |      |            |      |      |



## 读写

### 读或写

session_save_path(?string $path = null): string|false
