## PHP 连接 MsSQL
>PHP版本7.0、文件编码UTF-8

### Windows
> php/ext/sqlsrv.dll

- 参考
  - http://php.net/manual/en/ref.pdo-sqlsrv.connection.php
- 下载PHP SQLServer扩展
  - https://www.microsoft.com/en-us/download/details.aspx?id=20098
- 解压扩展，拷贝对应文件到php/ext
- 编写php.ini，加入对应扩展
```ini
extension=php_sqlsrv_7_ts_x86.dll
extension=php_pdo_sqlsrv_7_ts_x86.dll
```
- PDO连接MsSQL
```php
$c = new PDO("sqlsrv:Server=localhost,1521;Database=testdb", "UserName", "Password");
$c = new PDO("sqlsrv:Server=12345abcde.database.windows.net;Database=testdb", "UserName@12345abcde", "Password");
```


### CentOS
> FreeTDS ODBC

```sh
# 安装EPEL
wget http://mirrors.aliyun.com/epel/epel-release-latest-7.noarch.rpm
rpm -ivh epel-release-latest-7.noarch.rpm
# 安装freeTDS
yum install freetds
# 编写配置文件
vi /etc/freetds.conf
vi /etc/odbc.ini
```

```ini
# unixODBC odbc.ini
[ODBC Data Sources]
MsSQL = Microsoft SQLServer

[MsSQL]
Driver          = /usr/local/freetds/lib/libtdsodbc.so
Description     = ODBC for Microsoft SQLServer
Trace           = No
Server          = 
Database        = pubs2
Port            = 4444
TDS_Version     = 5.0

[Default]
Driver          = /usr/local/freetds/lib/libtdsodbc.so
```

```ini
# FreeTDS freetds.conf
[global]
tds version = 4.2
debug flag = 0xffff
dump file = /tmp/freetds.log
timeout = 10
connect timeout = 10
text size = 64512

[MsSQL2014]
host = 192.168.1.2
port = 1433
tds version = 7.4
client charset = UTF-8
```

Linux下连接MS Sql server -- 使用ODBC/FreeTDS组合(详细)
最近工作上需要，了解了下相关内容，网上资料较散，逻辑也不够清晰，这里总结了一下，算是比较全面的（部分内容来自网络）。
在Linux下连接MSSql server，可以使用ODBC/FreeTDS组合。
TDS is Tabular DataStream protocol, used for connecting to MS SQL and Sybase servers over TCP/IP.
FreeTDS is an implementation of TDS.It provide the odbc driver for TDS named tdsodbc. 

安装unixODBC和freeTDS
unixODBC是Linux下的ODBC驱动管理器，使用`yum install unixODBC*` 安装unixODBC。
freeTDS提供Linux下连接Sybase或MSSql Server的ODBC驱动tdsodbc，使用`yum install freetds*` 安装freetds。（Ubuntu下使用aptitude install tdsodbc 直接安装freetds提供的tdsodbc驱动）
tsql是对应于freetds的连接数据库的命令行工具，用来调试是否连接数据库成功（Ubuntu下使用$aptitude install freetds-bin安装）

配置freeTDS
Freetds配置文件在/etc/freetds/freetds.conf 或 /etc/freetds.conf
编辑配置文件，增加一个数据库连接段落：

```ini
[MY_MS_SQL]
host = 192.168.2.104
port = 1433
tds version = 7.0
```

上面MY_MS_SQL是SqlserverName，可以是自己取的有意义名字。host为sqlserver所在主机IP地址或域名。
配置完后，可以使用tsql测试，tsql -S MY_MS_SQL -U username -P password，看到1>提示符就是成功。
如果连接不成功，可以先在数据库服务器上的SQL Server配置管理器上的网络配置看TCP/IP协议是否启用，然后看在服务器上telnet1433端口，看是否端口开放。
需要注意服务器的防火墙配置，可在客户机telnet 1433端口看连接成功否。
以上是直接使用freeTDS自带的tsql工具连接MS SQL数据库测试tdsodbc驱动是否安装正确的方法。
 

下面我们来配置unixODBC来管理tdsodbc驱动，并调用tdsodbc来连接MS SQL数据库

a）向unixODBC注册tdsodbc驱动
在任意处创建一个文件tds.driver.template eg：/var/tds.driver.template，内容如下：
```ini
[FreeTDS] 
Description     = v0.63 with protocol v8.0 
Driver          = /usr/local/freetds/lib/libtdsodbc.so
```

使用命令 `odbcinst -i -d -f /var/tds.driver.template` 注册驱动
以上Driver地址根据实际位置修改
此处亦可以直接vi编辑/etc/odbcinst.ini添加
 

b）配置ODBC数据源，即配置DSN
配置有三种方法：DSN-less，ODBC-only，ODBC-combined
可参见Preparing ODBC。http://www.freetds.org/userguide/prepodbc.htm
同上，创建一个文件tds.datasource.template内容如下：
```ini
[MY_MS_SQL_DSN]
Driver          = FreeTDS
Description     = ODBC connection via FreeTDS
Trace           = No
Servername      = MY_MS_SQL
Database        = ACUMEN
```

使用命令odbcinst -i -s -f /var/tds.datasource.template 添加数据源到/etc/odbc.ini
Servername为Freedts配置文件中的SqlserverName；Driver为odbcinst.ini中注册的驱动名称；Database 为使用的数据库。
最后用isql测试：isql MY_MS_SQL username password，如果出现SQL>提示符就说明配置成功

> 方跃明