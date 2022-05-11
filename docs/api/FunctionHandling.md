# Function Handling



## 分类

### 回调函数

| 方法名                 | 函数名                    | 全称 | 翻译 | 描述                   |
| ---------------------- | ------------------------- | ---- | ---- | ---------------------- |
|                        | call_user_func            |      |      | 参数回调函数           |
| callUserFuncArray      | call_user_func_array      |      |      | 数组回调函数           |
|                        | forward_static_call       |      |      | 参数回调函数和静态方法 |
| forwardStaticCallArray | forward_static_call_array |      |      | 数组回调函数和静态方法 |



### 参数列表

| 方法名      | 函数名        | 全称 | 翻译 | 描述         |
| ----------- | ------------- | ---- | ---- | ------------ |
|             | func_num_args |      |      | 参数列表数量 |
|             | func_get_arg  |      |      | 参数列表某项 |
| funcGetArgs | func_get_args |      |      | 参数列表数组 |



### 定义检测

| 方法名              | 函数名                | 全称 | 翻译 | 描述 |
| ------------------- | --------------------- | ---- | ---- | ---- |
| getDefinedFunctions | get_defined_functions |      |      |      |
| functionExists      | function_exists       |      |      |      |



### 注册注销

| 方法名                   | 函数名                     | 全称 | 翻译 | 描述               |
| ------------------------ | -------------------------- | ---- | ---- | ------------------ |
| registerShutdownFunction | register_shutdown_function |      |      | 注册中止执行函数   |
|                          | register_tick_function     |      |      | 注册 tick 执行参数 |
|                          | unregister_tick_function   |      |      | 注销 tick 执行函数 |

