<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
   {include file='index_template.tpl'}
   <title>base de dados de posts</title>
   <meta  http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>


<h2>Posts</h2>
<table border=4>
<tr>
  <th align=left>Post</th>
  <th align=left>Author</th>
  <th align=left>Created</th>
  <th align=left>Updated</th>
</tr>

{foreach $posts as $p}


<tr>
  <td>{$p.content}</td>
  <td align=right>{$p.name}</td>
  <td align=center>{$p.created_at}</td>
  <td>{$p.updated_at}</td>
</tr>

{/foreach}



</table>

</body>

</html>