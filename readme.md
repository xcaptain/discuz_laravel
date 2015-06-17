## 用laravel实现的discuz站点

#### 短期目标
用laravel5.1这个长期支持版本来重写一边discuz论坛的前台部分，尽量不改动dz原有的表结构以及后台功能

#### 长期目标
脱离discuz的框架，把这个应用做成一个真正的社交平台

#### 使用需求
1. php( >= 5.5.9)或hhvm(仅测试了3.7.2)
2. nginx: 测试了1.8.0版本
3. mysql: 测试了mariadb 10.0.19版本
4. redis: 测试了3.0.2版本
5. 服务器: 任意版本linux应该都可以
6. 框架: laravel 5.1

#### 为什么使用laravel
laravel是我目前看到过的代码结构最清晰最优雅，扩展性最好的一个php框架，文档和第三方库都非常丰富，这就意味着个人开发难度降低了很多。

#### 开发环境搭建
1. 克隆代码库
2. 编辑.env文件，配置模板在.env.example
3. 给storage目录加上第三方可写权限
`sudo chmod -R a+w storage`
4. 给`bootstrap/cache`目录加上第三方可写权限
`sudo chmod -R a+w bootstrap/cache`
5. 配置nginx, php, mysql, redis，并且把服务开启

#### 如何贡献
项目还处于非常初级的阶段，离可用还有很长一段距离，暂时不打算接受第三方的pr，如果有建议或者是想法可以先发issue，等站点功能稍微成熟之后我会考虑大家一起协作开发
