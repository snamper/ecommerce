# 更新程序介绍
此更新程序是采取的是在线下载官方补丁的的方式来更新程序。适用于标准版用户。


##  基本步骤
1. 将这个版本和上个版本的`差异化文件`以及需要的`sql`打包成补丁(补丁命名规则R年月日 形如`R20160718`),解压后具体目录结构如下

    ├─R20160718             根目录（形如R年月日）
    │  ├─upload             更新文件文件夹
    │  │  ├─source
    │  │  └─ ...
    │  │
    │  ├─upgrade            其他文件文件夹
    │  │  ├─import.sql        ` 数据迁移sql文件`
    │  │  ├─upgrade.php       `upgrade文件`
    │  │  ├─version.php       ` 版本文件`
    │  │  └─ ...
2. 打包好后上传到官网服务器(`现行的方法是本地更新`，在客户服务器mobile/data/下新建upgrade文件夹，将补丁包放进去)
3. 升级时，登录后台，访问http(s)://wwww.xxxxxx.com/mobile/index.php?r=upgrade  进行升级
4. 注意存放补丁包的文件夹mobile/data/upgrade/里面的某个补丁的版本必须和客户`当前版本相符`

## 升级说明
1. 程序需要mobile的写权限
2. 对于`非新增模版文件（dwt、lbi、html、htm）`文件，提供可覆盖可不覆盖的选项（默认覆盖）

## 程序逻辑
1. 判断mobile的权限
2. 通过当前版本号获取在这个版本号之后的第一个补丁，下载zip补丁包到 data/caches/upgrade 目录，解压到当前文件夹
3. 添加和覆盖对应的文件夹和文件
4. 执行import.sql文件
5. 修改版本号为该补丁版本号
6. 如果有下一个版本补丁则继续从2的步骤开始，如果成为最新版本则升级成功退出