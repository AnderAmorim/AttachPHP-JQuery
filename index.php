<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Escrevendo email...</title>
    <link rel="shortcut icon" href="mailIcon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body class="ui container" >
    <header>
        <div class="ui centered grid">
            <h2 class="ui icon header">
            <i class="envelope open purple icon"></i>
            <div class="content">
                Exemplo e-mail
                <div class="sub purpleFont header">
                    Escreva seu e-mail e anexe arquivos!
                </div>
            </div>
        </h2>
        </div>
    </header>
    <main>
    <form method="POST" action="" name="myForm" class="ui form">
        <div class="field">
            <label class="purpleFont">Digite seu email:</label>
            <div class="bar">
                <label for="myInputFile">
                    <div class="ui label">
                        <i class="paperclip icon"></i> Anexa arquivo
                    </div>
                </label>
            </div>
            <input data-divapp="anexoDiv" onchange="Attach(this,'arquivos/',<?=strtotime(date('Y-m-d H:i:s'))?>)" type="file" name="myInputFile" id="myInputFile" style="display:none;" />
            <textarea></textarea>
            <div class="anexoDiv"></div>
            <button type="submit" class="ui btnSend purple ok inverted button right"><i class="paper plane icon"></i> Enviar!</button>
        </div>
    </form>

    </main>
    <!--Import JQuery-->
    <script src="jquery.js"></script>
    <!--Import Semantic-->
    <script src="semantic/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
    <!--Operation Script-->
    <script src="main.js"></script>
</body>
</html>