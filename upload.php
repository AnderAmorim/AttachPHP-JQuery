<?
    if(!isset($_POST['diretorio'])){ 
        echo json_encode(array('status'=>'error','callback'=>'Diretorio não especificado'));
        return null;
    }
    if(!isset($_POST['nome'])) {
        echo json_encode(array('status'=>'error','callback'=>'Nome do arquivo não especificado'));
        return null;
    }

    if(isset($_FILES["arquivo"])){
        $arquivo = $_FILES["arquivo"];
    }else{
        echo json_encode(array('status'=>'error','callback'=>'Arquivo não encontrado'));
        return null;
    }

    $array = explode('.', $_FILES['arquivo']['name']);
    $ext = end($array);

    if(!is_null($arquivo)){
        
        //Caso queira dar um nome especifico
        $file = $_POST['diretorio'].$_POST['nome'].'.'.$ext;

        //Tenha certeza de que sua pasta de destino esteja com a permissão de nível 777
        if(move_uploaded_file($arquivo['tmp_name'], $file)){
            echo json_encode(array('status'=>'success','caminho'=>$file,'nome'=>$_FILES['arquivo']['name']));
            return null;
        }else{
            echo json_encode(array('status'=>'Erro ao fazer upload de arquivo'));
            return null;
        }

    }else{
        echo json_encode(array('status'=>'error','callback'=>'Não foi possível fazer o upload do arquivo, verifique as permissões da pasta de destino.'));
        return null;    
    }
?>