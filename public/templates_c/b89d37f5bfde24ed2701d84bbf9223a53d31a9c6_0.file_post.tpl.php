<?php
/* Smarty version 5.4.3, created on 2025-04-06 22:43:40
  from 'file:post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67f2e77c4cc469_40175417',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b89d37f5bfde24ed2701d84bbf9223a53d31a9c6' => 
    array (
      0 => 'post.tpl',
      1 => 1743972179,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67f2e77c4cc469_40175417 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Php_examples\\Rack_Forest\\templates';
?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->getValue('post')['title'];?>
</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $_smarty_tpl->getValue('post')['title'];?>
</h1>
        <p><small>Írta: <?php echo $_smarty_tpl->getValue('author')['id'];?>
 - Publikálva: <?php echo $_smarty_tpl->getValue('post')['publish_at'];?>
</small></p>
        <div class="content">
            <p><?php echo $_smarty_tpl->getValue('post')['content'];?>
</p>
        </div>
        <a href="index.php" class="btn btn-secondary">Vissza a főoldalra</a>
    </div>
</body>
</html>
<?php }
}
