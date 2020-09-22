<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/test" method="post">
    @csrf
    <input type="text" name="id_user">
    <input type="text" name="total_price">
    <input type="text" name="ordername">
    <input type="text" name="id_table">
    <input type="text" name="status_order">
    <button type="submit">send</button>
    </form>
</body>
</html>