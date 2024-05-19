<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Pos Form</h1>
    <form action="/postSave" method="post">
        @csrf
        <label for="tile">Title: </label>
        <input type="text" name="title" id="title">
        <label for="Author">Author: </label>
        <input type="text" name="author" id="author">
        <label for="content">Content: </label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>