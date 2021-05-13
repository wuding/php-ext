# Info

PHP 选项和信息



## 异常

断言

| 函数名         | 描述     | 别名 | 废弃 |
| -------------- | -------- | ---- | ---- |
| assert_options | 读写设置 |      |      |
| assert         | 异常判断 |      |      |
| main           |          |      |      |



## 命令行

进程

| 函数名                | 描述 | 别名 | 废弃 |
| --------------------- | ---- | ---- | ---- |
| cli_get_process_title |      |      |      |
| cli_set_process_title |      |      |      |
| getmypid              |      |      |      |
| getopt                |      |      |      |



## 扩展

| 函数名                | 描述         | 别名 | 废弃 |
| --------------------- | ------------ | ---- | ---- |
| dl                    |              |      |      |
| extension_loaded      |              |      |      |
| get_extension_funcs   |              |      |      |
| get_loaded_extensions | 已加载的模块 |      |      |



## 垃圾回收

| 函数名            | 描述 | 别名 | 废弃 |
| ----------------- | ---- | ---- | ---- |
| gc_collect_cycles |      |      |      |
| gc_disable        |      |      |      |
| gc_enable         |      |      |      |
| gc_enabled        |      |      |      |
| gc_mem_caches     |      |      |      |
| gc_status         |      |      |      |



## 配置

INI

| 函数名                   | 描述     | 别名                 | 废弃  |
| ------------------------ | -------- | -------------------- | ----- |
| get_cfg_var              | 读取单条 |                      |       |
| get_include_path         | 读取单个 |                      |       |
| get_magic_quotes_gpc     | 读取单个 |                      |       |
| get_magic_quotes_runtime | 读取单个 |                      |       |
| ini_get_all              |          |                      |       |
| ini_get                  |          |                      |       |
| ini_restore              | 还原     |                      |       |
| ini_set                  |          | ini_alter            |       |
| php_ini_loaded_file      | 配置文件 |                      |       |
| php_ini_scanned_files    | 配置文件 |                      |       |
| restore_include_path     | 还原单个 |                      |       |
| set_include_path         | 设置单个 |                      |       |
| set_magic_quotes_runtime | 设置单个 | magic_quotes_runtime | 5.3.0 |
| set_time_limit           | 设置单个 |                      |       |
| sys_get_temp_dir         | 读取单个 |                      |       |



## 系统

文件

| 函数名           | 描述 | 别名 | 废弃 |
| ---------------- | ---- | ---- | ---- |
| get_current_user |      |      |      |
| getlastmod       |      |      |      |
| getmygid         |      |      |      |
| getmyinode       |      |      |      |
| getmyuid         |      |      |      |



## 运行时

常量、变量等

| 函数名                | 描述 | 别名               | 废弃 |
| --------------------- | ---- | ------------------ | ---- |
| get_defined_constants |      |                    |      |
| get_included_files    |      | get_required_files |      |
| get_resources         |      |                    |      |
| getrusage             |      |                    |      |
| memory_get_peak_usage |      |                    |      |
| memory_get_usage      |      |                    |      |
| php_sapi_name         |      |                    |      |
| php_uname             |      |                    |      |
| phpversion            |      |                    |      |
| zend_thread_id        |      |                    |      |



## 变量

环境

| 函数名 | 描述 | 别名 | 废弃 |
| ------ | ---- | ---- | ---- |
| getenv |      |      |      |
| putenv |      |      |      |

其它

| 函数名          | 描述 | 别名 | 废弃  |
| --------------- | ---- | ---- | ----- |
| php_logo_guid   |      |      | 5.5.0 |
| phpcredits      |      |      |       |
| phpinfo         |      |      |       |
| version_compare |      |      |       |
| zend_logo_guid  |      |      | 5.5.0 |
| zend_version    |      |      |       |

