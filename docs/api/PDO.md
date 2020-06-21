# PDO

PHP Data Objects

### PDO

|                     | 相关          | 方法重载 | 使用到 |
| ------------------- | ------------- | -------- | ------ |
| __construct         | getDbh        |          | Y      |
| beginTransaction    |               | Y        |        |
| commit              |               | Y        |        |
| errorCode           |               | Y        | Y      |
| errorInfo           |               | Y        | Y      |
| exec                |               | N        | Y      |
| getAttribute        | getAttributes | Y        | Y      |
| getAvailableDrivers |               | Y        |        |
| inTransaction       |               | Y        |        |
| lastInsertId        |               | Y        | Y      |
| prepare             |               | Y        | Y      |
| query               |               | N        | Y      |
| quote               |               | Y        |        |
| rollBack            |               | Y        |        |
| setAttribute        |               | Y        | Y      |

### PDOStatement
|                 |      |      |      |
| --------------- | ---- | ---- | ---- |
| bindColumn      |      |      |      |
| bindParam       |      |      |      |
| bindValue       |      |      |      |
| closeCursor     |      |      |      |
| columnCount     |      |      |      |
| debugDumpParams |      |      |      |
| errorCode       |      |      | Y    |
| errorInfo       |      |      | Y    |
| execute         |      |      | Y    |
| fetch           |      |      |      |
| fetchAll        |      |      | Y    |
| fetchColumn     |      |      |      |
| fetchObject     |      |      | Y    |
| getAttribute    |      |      |      |
| getColumnMeta   |      |      |      |
| nextRowset      |      |      |      |
| rowCount        |      |      |      |
| setAttribute    |      |      |      |
| setFetchMode    |      |      |      |

### PhpPdo

| #          |               | 已实现 |
| ---------- | ------------- | ------ |
| 基本       |               |        |
|            | __construct   |        |
|            | __call        |        |
|            | init          |        |
|            | setVar        |        |
|            | getDsn        |        |
|            | getDbh        |        |
| 覆盖       |               |        |
|            | exec          |        |
|            | query         |        |
| 附加       |               |        |
|            | getAttributes |        |
| CRUD       |               |        |
|            | insert        |        |
|            | select        |        |
|            | update        | N      |
|            | delete        |        |
| 批量或其他 |               |        |
|            | into          | N      |
|            | get           |        |
|            | find          | N      |
|            | set           | N      |
|            | del           | N      |
| 依赖       |               |        |
|            | sth           |        |
| 补充       |               |        |
|            | errorReport   |        |

### PDO Drivers

| 已支持 | extension  | Data Source Name                              |
| ------ | ---------- | --------------------------------------------- |
| Y      | pdo_mysql  | mysql:host=;port=;dbname=;charset=utf8mb4     |
|        |            | mysql:unix_socket=/tmp/mysql.sock;dbname=test |
| Y      | pdo_sqlite | sqlite:/opt/databases/mydb.sq3                |
| N      |            | sqlite2::memory:                              |
|        | pdo_pgsql  | pgsql:host=;port=;dbname=;user=;password=     |
|        | pdo_sqlsrv | sqlsrv:Server=localhost,1521;Database=testdb  |

