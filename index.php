<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Excel parser</title>
    <link rel="stylesheet" type="text/css" href="./Etc/general.css">
</head>
<body>
    <div class="wrapper">
        <div class="bloc left">
            <div class="bloc-head">Выберите файл</div>
            <div class="bloc-body">
                <form name="main_form" enctype="multipart/form-data">
                    <input type="file" name="document" accept=".xlsx">
                    <input type="submit" value="Отправить">
                </form>
            </div>
        </div>

        <div class="bloc right">
            <div class="bloc-head">Содержимое файла</div>
            <div class="bloc-body">
                <div class="table">
                    <p>Здесь будет содержимое файла.</p>
                    <p>Но для того, чтобы это произошло, вам нужно его загрузить.</p>
                    <p>форму загрузки можно увидеть вверху</p>
                </div>
            </div>
        </div>
    </div>

    <script src="./Etc/jquery.js"></script>
    <script src="./Etc/general.js"></script>
</body>
</html>