$(document).ready(function(){
    $('[name="myForm"]').submit(function(e){
        e.preventDefault();
    })

    
})
function Attach($f,diretorio,nome){
    if($f.files.length>=1){
        var f = $f.files[0];
        var reader = new FileReader();

        reader.readAsDataURL(f);
        arquivo = f;

        var dados = new FormData();
        dados.append('nome',nome);//Caso queira dar uma especificação ao arquivo
        dados.append('diretorio',diretorio);
        dados.append('arquivo',arquivo);

        var cont = $($f).attr('data-divapp');
        var $c = $(document).find('.'+cont);
        $c.show()
        if(!$c.hasClass('anexoAtivo')){
            $c.addClass('anexoAtivo');  
        }

        $(document).on('click','.deletarAnexo',function(){
            r = confirm('Tem certeza que deseja deletar o anexo?');
            $r = $(this);
            if(r){
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data:{
                        'caminho':$(this).siblings('a').attr('href'),
                    },
                    success: function(r) {
                        var res = JSON.parse(r);
                        if(res.status!='success'){
                            alert(res.callback);
                        }else{
                            $r.parents('.anexoItem').remove();
                        } 
                    },
                    error: function(data) {
                        alert('ERROR: Há um erro no arquivo de exclusão!');
                    },
                })
            }
        })

        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data:dados,
            processData: false,
            contentType: false,
            success: function(r) {
                var res = JSON.parse(r);
                if(res.status!='success'){
                    alert(r.callback);
                }else{
                    $c.append('<div class="ui anexoItem image label"><i class="file alternate icon"></i><a target="_blank" href="'+res.caminho+'">'+res.nome+'</a><i class="delete icon deletarAnexo"></i></div>');
                } 
            },
            error: function(data) {
                alert('ERROR: Há um erro no arquivo de upload!');
            },
        })
    }
}