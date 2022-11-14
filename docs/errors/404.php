<h1>Error 404 Page not found</h1>
<?php echo ' url <b>' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '</b> not exist';
echo '<br>If is an issues, email me at: <a href="mailto:' . $_SERVER['SERVER_ADMIN'] . '">' . $_SERVER['SERVER_ADMIN'] . '</a>';
echo '<hr>';
echo $_SERVER['SERVER_SIGNATURE'];