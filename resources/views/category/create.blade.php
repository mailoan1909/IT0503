<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <fieldset class="form-group">
            <label>Name</label>
            <input class="form-control" name="category_name" placeholder="Nhập tên category">
            <label>Description</label>
            <input class="form-control" name="category_description" placeholder="Nhập tên category">
        </fieldset>
        <button type="submit" class="btn btn-success">Submit Button</button>
        <button type="reset" class="btn btn-primary">Reset Button</button>
    </form>

</body>
</html>
