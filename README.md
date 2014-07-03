mujiang.info
============

这段时间陷入了迷茫，感觉前端技术积累太少、太浅。在GDG Devfest上遇到米粽，聊了很久。发现很可能是总结太少的问题，所以我觉得遵从他的建议，开始写博客了。


临时记录一条导出数据的sql
http://dev.mysql.com/doc/refman/5.1/en/load-data.html
````sql

select * from table where dateline > 1346516000 into outfile 'path_to_file' fields terminated by ',' enclosed by '"' lines terminated by '\r\n'


First Header | Second Header | Third Header
------------ | ------------- | ------------
Content Cell | Content Cell  | Content Cell
Content Cell | Content Cell  | Content Cell
