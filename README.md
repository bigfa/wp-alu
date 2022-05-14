# wp-alu

WordPress 阿鲁表情插件

## 使用方法

如果你的主题评论表单使用的是`comment_form`则上传激活插件即可。

否则在相应的地方使用如下代码调用

`<p class="comment-form-smilies"><?php echo alu_get_wpsmiliestrans();?></p>`

[文章地址](https://fatesinger.com/77278)

## 更新日志

### 1.0.2

-   调用本地文件

### 1.0.1

-   使用原生 JS，移除 JQUERY
