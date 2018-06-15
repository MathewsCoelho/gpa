$(document).ready(function ($){
    $("input[name='btnCadastro']").on("click", function (event) {
        var nome = $('input[name="nome"]').val();
        var email = $('input[name="email"]').val();
        var senha = $('input[name="senha"]').val();
        var confSenha = $('input[name="confSenha"]').val();
        var valida = true;
                
        if (nome === "") {
        $("input[name='nome']").addClass('errou');
        valida = false;
        } else {
            $("input[name='nome']").removeClass('errou');
        }

        if (email === "") {
            $("input[name='email']").addClass('errou');
            valida = false;
        }else {
            $("input[name='email']").removeClass('errou');
        }

        if (senha === "") {
            $("input[name='senha']").addClass('errou');
            valida = false;
        } else {
            $("input[name='senha']").removeClass('errou');
        }

        if (confSenha === "") {
            $("input[name='confSenha']").addClass('errou');
            valida = false;
        } else {
            $("input[name='confSenha']").removeClass('errou');
        }

        if(senha !== confSenha || senha === ""){
            $("input[name='confSenha']").addClass('errou');
            $("input[name='senha']").addClass('errou');
            valida = false;
        } else {
            $("input[name='senha']").removeClass('errou');
            $("input[name='confSenha']").removeClass('errou');
        }

        if (valida) {
            $('form[name="cadastro"]').submit();
        }
        
        $("input[name='nome']").on("keyup", function () {
            $("input[name='nome']").removeClass('errou');
        });
        $("input[name='email']").on("keyup", function () {
            $("input[name='email']").removeClass('errou');
        });
        $("input[name='senha']").on("keyup", function () {
            $("input[name='senha']").removeClass('errou');
        });
        $("input[name='confSenha']").on("keyup", function () {
            $("input[name='confSenha']").removeClass('errou');
        });
    });
    
    $("input[name='btnLogin']").on("click", function (event){
        var email = $("input[name='email']").val();
        var senha = $("input[name='senha']").val();
        
        var valida = true;
        
        if(email === ""){
            $("input[name='email']").addClass("errou");
            valida = false;
        } else{
            $("input[name='email']").removeClass("errou");
        }
        
        if(senha === ""){
            $("input[name='senha']").addClass("errou");
            valida = false;
        } else{
            $("input[name='senha']").removeClass("errou");
        }
        
        if(valida){
               $('form[name="login"]').submit();
            }
    });
    
    $("input[name='btnCadProjeto']").on("click", function (event) {
        event.preventDefault();
        
        var nomeProjeto = $("input[name='nomeProjeto']").val();
        var descricao = $("input[name='descricao']").val();
        var dataInicio = $("input[name='dataInicio']").val();
        var dataFim = $("input[name='dataFim']").val();
        
        var valida = true;
        
        if(nomeProjeto === ""){
            $("input[name='nomeProjeto']").addClass("errou");
            valida = false;
        } else{
            $("input[name='nomeProjeto']").removeClass("errou");
        }
        
        if(descricao === ""){
            $("input[name='descricao']").addClass("errou");
            valida = false;
        } else{
            $("input[name='descricao']").removeClass("errou");
        }
        
        if(dataInicio === ""){
            $("input[name='dataInicio']").addClass("errou");
            valida = false;
        } else{
            $("input[name='dataInicio']").removeClass("errou");
        }
        
        if(dataFim < dataInicio || dataFim === ""){
            $("input[name='dataFim']").addClass("errou");
            valida = false;
        } else{
            $("input[name='dataFim']").removeClass("errou");
        }
        
        
        $("input[name='nomeProjeto']").on("keyup", function () {
            $("input[name='nomeProjeto']").removeClass('errou');
        });
        $("input[name='descricao']").on("keyup", function () {
            $("input[name='descricao']").removeClass('errou');
        });
        $("input[name='dataInicio']").on("keyup", function () {
            $("input[name='dataInicio']").removeClass('errou');
        });
        $("input[name='dataFim']").on("keyup", function () {
            $("input[name='dataFim']").removeClass('errou');
        });
        
        if(valida){
               $('form[name="cadProjeto"]').submit();
        }
    });
    
    $("input[name='btnCadTarefa']").on("click", function (event) {
        event.preventDefault();
        var nomeTarefa = $("input[name='nomeTarefa']").val();
        var descricao = $("input[name='descricao']").val();
        var dataInicio = $("input[name='dataInicio']").val();
        var dataFim = $("input[name='dataFim']").val();
        
        var valida = true;
        
        if(nomeTarefa === ""){
            $("input[name='nomeTarefa']").addClass("errou");
            valida = false;
        } else{
            $("input[name='nomeProjeto']").removeClass("errou");
        }
        
        if(descricao === ""){
            $("input[name='descricao']").addClass("errou");
            valida = false;
        } else{
            $("input[name='descricao']").removeClass("errou");
        }
        
        if(dataInicio === ""){
            $("input[name='dataInicio']").addClass("errou");
            valida = false;
        } else{
            $("input[name='dataInicio']").removeClass("errou");
        }
        
        if(dataFim < dataInicio || dataFim === ""){
            $("input[name='dataFim']").addClass("errou");
            valida = false;
        } else{
            $("input[name='dataFim']").removeClass("errou");
        }   
        
        $("input[name='nomeTarefa']").on("keyup", function () {
            $("input[name='nomeTarefa']").removeClass('errou');
        });
        $("input[name='descricao']").on("keyup", function () {
            $("input[name='descricao']").removeClass('errou');
        });
        $("input[name='dataInicio']").on("keyup", function () {
            $("input[name='dataInicio']").removeClass('errou');
        });
        $("input[name='dataFim']").on("keyup", function () {
            $("input[name='dataFim']").removeClass('errou');
        });
         
        if(valida){
               $('form[name="cadTarefa"]').submit();
        }
    });
    
    $(".btnExcluir").on("click", function (event){
        event.preventDefault();
        var href = $(this).attr('href');
        var excluir = confirm("Deseja excluir mesmo este projeto?");
        
        if(excluir){
            $.ajax({
                type: 'GET',
                url: href,
                success: function (result) {
                    location.reload();
                }
            });
        } else{
            location.reload();
        }
    });
    
    $(".btnExcluirTarefa").on("click", function (event){
        event.preventDefault();
        var href = $(this).attr('href');
        var excluir = confirm("Deseja excluir mesmo esta tarefa?");
        
        if(excluir){
            $.ajax({
                type: 'GET',
                url: href,
                success: function (result) {
                    location.reload();
                }
            });
        } else{
            location.reload();
        }
    });
    
    
    $("input[name='btnAdd']").on("click", function(event){
   
    });

    $(".andamento").on("click", function(event){
       $("#iniciada").slideToggle(); 
    });
    $(".atrasado").on("click", function(event){
       $("#atrasada").slideToggle(); 
    });
    $(".finalizado").on("click", function(event){
       $("#finalizada").slideToggle(); 
    });

    $("#btn-mensagem").click(function(){
        $("#modal-mensagem").modal();
    });

});
