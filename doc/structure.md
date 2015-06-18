## 这是站点结构

app: 应用代码目录

    - Http: web相关代码目录
    - Models: 模型文件目录，访问db
    - Console: 控制台相关文件，比如crontab
    - Helpers: 帮助类

vendor: 第三方库存放目录

    - 代码通过composer.json来引入
    - vendor/composer/autoload_classmap.php 定义命名空间和代码路径关系

public: 公共目录，外界可访问的唯一目录

    - index.php: 入口文件

resources: 资源目录，存放样式，js，语言包

    - lang: 语言包
    - assets: 资产文件，js，css，scss等
    - views: 模板目录
      - layouts: 页面布局
      - 每个控制器对应的模板目录

database: 数据库目录

    - migrations: 数据库迁移文件
    - seeds: 种子文件，生成测试用的假数据

config: 配置目录

    - app.php: 服务提供器
    - database.php 数据库配置
    - cache.php 缓存配置
