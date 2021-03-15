# How to use git upload files
## 如何使用git上传代码
1. 选择自己要上传的代码文件保存在一个文件夹里，右键文件夹，选择 __Git bash here__ ，打开bash界面。
2. 输入git init。
>__git init__ 作用：在当前项目的目录中生成本地的Git管理，简单来说就是生成了一个Git专用的.git文件夹。（注意这个文件夹是隐藏的，需要在文件夹选项里面设置 查看->隐藏的项目 打上勾才可查看。）
3. 输入git add .。
__git add__ 作用：将项目中的所有的文件添加到仓库中，如果想添加某个特定的文件，只需把.换成这个特定的文件名,例如：git add file。
4. 添加账号信息。
  __git config --global user.email "you@example.com"__
  __git config --global user.name "Your Name"__
  将引号里面的内容替换成自己的邮箱和用户名，然后输入到命令行里面。
5. 输入git commit -m "test the upload"添加注释。
  __git commit -m "test the upload"__ 作用：表示对这次提交的注释，双引号里面的内容可以根据自己的具体内容需要进行修改。
6. 添加仓库地址。
  输入 __git remote add origin https://...__
  ...为自己的仓库url地址，这个地址就是在GitHub那里创建仓库时生成的链接地址。
7. 上传代码。
  输入 __git push -u origin master__ ，把代码上传到GitHub的仓库main下面的master分支。
8. 输入账号密码登录。
  上传连接会弹出账号密码授权登录界面，登录后代码会成功上传到库里面，此时可以打开所上传到的那个仓库里查看。
