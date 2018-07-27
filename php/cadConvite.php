<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    session_start();
    $emailConvidado = $_POST['emailConvidado'];
    $descricao = $_POST['descricao'];
    $tipo =  $_POST['tipo'];
    $id_grupo = $_SESSION["id_grupo"];
    $nome = $_SESSION['nome'];
    $id_remetente = $_SESSION['id'];
    $status = 1;
            
    if(empty($emailConvidado) || empty($descricao) || empty($tipo)){
        $_SESSION['danger'] = "Por favor preencha todos os campos.";
        echo "<script type='text/javascript'>"
        . " history.go(-1);"
        . "</script>";
    } else{
        include_once 'DAO/UsuarioDAO.php';
        $objDAO = new UsuarioDAO();
        $id_convidado = $objDAO->verificarUsuario($emailConvidado);

        if($id_convidado){
            include_once 'TO/ConviteTO.php';
            $objTO2 = new ConviteTO();
            $objTO2->setidUsuario($id_convidado);
            $objTO2->setidGrupo($id_grupo);
            $objTO2->settipo($tipo);
            $objTO2->setdescricao($descricao);
            $objTO2->setstatus($status);
            include_once 'DAO/ConviteDAO.php';
            $objDAO2 = new ConviteDAO();
            
            if($objDAO2->salvarConvite($objTO2)){
                require "PHPMailer/src/PHPMailer.php";
                require "PHPMailer/src/Exception.php";
                require "PHPMailer/src/SMTP.php";
                $mail = new PHPMailer();  
                $mail->SetLanguage("br"); 
                $mail->IsSMTP(); 
                $mail->IsHTML(true); 
                $mail->SMTPDebug = 0;  
                $mail->SMTPAuth = true;     
                $mail->SMTPSecure = 'tls'; 
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->Username = 'crudzera@gmail.com';
                $mail->Password = 'crudzera123';
                $mail->CharSet = "utf-8";
                $mail->SetFrom('crudzera@gmail.com');
                $mail->addAddress('crudzera@gmail.com', 'GPA');
                $mail->addAddress($emailConvidado);     
                $mail->addReplyTo($emailConvidado);
                $mail->Subject = "Convite Participar Grupo";
                $mail->Body = $nome . " convidou você para participar de um grupo. <br>" . $descricao . '<br> <b>Clique para visualizar o convite: </b> http://localhost/gpafinal3/view/convites.php' ;
                $mail->Send();
                $_SESSION['success'] = "Convite enviado com sucesso.";
                echo "<script type='text/javascript'>"
                . " location.href = '../view/projetoGrupo.php'"
                . "</script>";
            }
            else{
                $_SESSION['danger'] = "Falha ao enviar convite.";
                echo "<script type='text/javascript'>"
                . " history.go(-1);"
                . "</script>";
            }
        }else{
             $_SESSION['danger'] = "O usuário não está cadastrado.";
            echo "<script type='text/javascript'>"
            . " history.go(-1);"
            . "</script>";
        }
    }

?>

