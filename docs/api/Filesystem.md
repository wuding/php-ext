# Filesystem



## 解析查找

参数：文件名或路径，通配符，字符串

| 函数名           | 描述     |
| ---------------- | -------- |
| basename         | 文件名   |
| dirname          | 目录路径 |
| glob             | 数组     |
| parse_ini_file   | 数组     |
| parse_ini_string | 数组     |
| pathinfo         | 数组     |
| realpath         | 绝对路径 |



## 判断

参数：文件或目录的路径，通配符

| 函数名           | 描述 | 别名         |
| ---------------- | ---- | ------------ |
| file_exists      | 布尔 |              |
| filetype         | 枚举 |              |
| fnmatch          | 布尔 |              |
| is_dir           | 布尔 |              |
| is_executable    | 布尔 |              |
| is_file          | 布尔 |              |
| is_link          | 布尔 |              |
| is_readable      | 布尔 |              |
| is_uploaded_file | 布尔 |              |
| is_writable      | 布尔 | is_writeable |



## 权限

参数：文件名

| 函数名    | 描述   |
| --------- | ------ |
| chgrp     | 组     |
| chmod     | 模式   |
| chown     | 所有者 |
| filegroup | 组     |
| fileinode | inode  |
| fileowner | 所有者 |
| fileperms | 权限   |
| lchgrp    | 组     |
| lchown    | 所有者 |
| umask     | umask  |



## 缓存

参数：无

| 函数名              | 描述 | 别名            |
| ------------------- | ---- | --------------- |
| clearstatcache      | 清除 |                 |
| realpath_cache_get  | 数组 |                 |
| realpath_cache_size | 整数 |                 |
|                     |      | set_file_buffer |



## 读写操作

参数：文件名或路径，目录

| 函数名             | 描述       | 别名   |
| ------------------ | ---------- | ------ |
| copy               | 复制       |        |
| file_get_contents  | 读         |        |
| file_put_contents  | 写         |        |
| file               | 读         |        |
| link               | 写         |        |
| mkdir              | 新建       |        |
| move_uploaded_file | 移动       |        |
| readfile           | 读取并输出 |        |
| readlink           | 读         |        |
| rename             | 移动       |        |
| rmdir              | 删除       |        |
| symlink            | 写         |        |
| tempnam            | 新建       |        |
| tmpfile            | 新建       |        |
| unlink             | 删除       | delete |



## 信息

参数：目录或文件路径

| 函数名           | 描述       | 别名          |
| ---------------- | ---------- | ------------- |
| disk_free_space  | 可用空间   | diskfreespace |
| disk_total_space | 总大小     |               |
| fileatime        | 访问时间   |               |
| filectime        | 修改时间   |               |
| filemtime        | 修改时间   |               |
| filesize         | 文件大小   |               |
| linkinfo         | 连接的信息 |               |
| lstat            | 数组       |               |
| stat             | 数组       |               |
| touch            | 设定时间   |               |



## 指针

参数：文件指针，文件名

| 函数名    | 描述           | 别名  |
| --------- | -------------- | ----- |
| fclose    | 关闭           |       |
| feof      | 是否结束       |       |
| fflush    | 输出           |       |
| fgetc     | 读取字符       |       |
| fgetcsv   | 读行 CSV       |       |
| fgets     | 读取一行       |       |
| fgetss    | 读取一行并过滤 |       |
| flock     | 锁定           |       |
| fopen     | 打开           |       |
| fpassthru | 输出剩余       |       |
| fputcsv   | 写行 CSV       |       |
| fread     | 读取文件       |       |
| fscanf    | 格式化         |       |
| fseek     | 定位           |       |
| fstat     | 信息           |       |
| ftell     | 位置           |       |
| ftruncate | 截断           |       |
| fwrite    | 写入文件       | fputs |
| pclose    | 关闭进程       |       |
| popen     | 打开进程       |       |
| rewind    | 倒回位置       |       |
