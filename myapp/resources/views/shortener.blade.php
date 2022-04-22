<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сократитель ссылок</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
</head>
<body>
<form method="post" id ="linkForm" action="{{route('generateLink')}}">
    {{csrf_field()}}
<div class="container-fluid col-6 h-100 justify-center" style="margin-top: 10%">
    <div class="row border rounded">
        <div class="col align-content-end background bg-light"><h3>Сокращение ссылки</h3></div>
        <div class="w-100"></div>
            <div class="col background bg-light">
                <input type="text" class="form-control" name="link"  placeholder="URL">
            </div>
            <div class="col-2 background bg-light">
                <button class="btn btn-success " type="submit" id ="submit" name="check">Submit</button>
            </div>
        <div class="w-100"></div>
        <div class="m-3">
            <a id="example_id" href = ""></a>
        </div>
        <div class="col-3 m-3">
            <button id = "copy" class="btn btn-success" data-copyfromid="example_id" data-from="innerHTML" type="submit" style="display: none">Копировать ссылку</button>
        </div>
    </div>
    </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>

    $(document).ready(function () {
        $('#linkForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/',
                data: $('#linkForm').serialize(),
                success: function (response) {
                    document.getElementById("copy").style.display = ''
                    document.querySelector('a').href = response.link
                    document.querySelector('a').textContent = 'http://our-domain.com/'+response.code
                },
                error: function (data) {
                    alert('неподходящая ссылка')
                }
            });
        });
    });
</script>
<script src="https://dwweb.ru/js/dw_copy.js "></script>
</body>
</html>

