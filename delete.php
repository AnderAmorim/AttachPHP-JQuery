<?

    if(!isset($_POST['caminho'])){ 
        echo json_encode(array('status'=>'error','callback'=>'Caminho não especificado'));
        return null;
    }

    if(unlink($_POST['caminho'])){
        echo json_encode(array('status'=>'success'));
        return null;
    }else{
        echo json_encode(array('status'=>'Erro ao excluir arquivo'));
        return null;
    }

?>