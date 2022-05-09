# EXEC

https://www.php.net/manual/zh/book.exec.php



## System program execution

系统程序执行



### Program execution Functions

程序执行函数



#### escapeshellarg

##### Escape a string  to be used as a shell argument

把字符串转码为可以在 shell 命令里使用的参数



#### escapeshellcmd

##### Escape shell metacharacters

shell 元字符转义



#### exec

##### Execute an external program

执行一个外部程序



#### passthru

##### Execute an external program and display raw output

执行外部程序并且显示原始输出



#### proc_close

##### Close a process opened by proc_open and return the exit code of that process

关闭由 proc_open 打开的进程并且返回进程退出码



#### proc_get_status

##### Get information about a process opened by proc_open

获取由 proc_open 函数打开的进程的信息



#### proc_nice

##### Change the priority of the current process

修改当前进程的优先级



#### proc_open

##### Execute a command and open file pointers for input/output

执行一个命令，并且打开用来输入/输出的文件指针



#### proc_terminate

##### Kills a process opened by proc_open

杀除由 proc_open 打开的进程



#### shell_exec

##### Execute command via shell and return the complete output as a string

通过 shell 环境执行命令，并且将完整的输出以字符串的方式返回



#### system

##### Execute an external program and display the output

执行外部程序，并且显示输出