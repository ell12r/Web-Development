<!DOCTYPE html>
<html lang="de">
 <head>
  <meta charset="UTF-8">
  <title></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
 </head>
<body>

<form action="mailscript.php" method="post">

<p>
 <label>Name: <input type="text" name="name" required="required"></label>
</p>

<p>
 <label>E-Mail: <input type="email" name="email" required="required"></label>
</p>

<p>
 <label>Telefon: <input type="text" name="phone"></label>
</p>

<p>
 <label>Nachricht: 
 <textarea name="message" required="required"></textarea></label>
</p>

<p>
 <button type="submit">Absenden</button>
</p>

</form>

</body>
</html>