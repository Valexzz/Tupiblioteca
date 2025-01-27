function validar(){
    let btn_nome = document.getElementById("usuario").value;
    let btn_senha = document.getElementById("senha").value;
    let btn = document.getElementById("botao").value;
    let texto = document.getElementById("print");
    /*let pagina = 'cadastro.html';*/
    if (btn_nome.trim() == "" || btn_senha.trim() == ""){
        mensagem = "Por favor preencha todos os campos!";
        texto.textContent = mensagem;
        return false
    }
    /*if (btn_nome.trim() != "usuario"|| btn_senha.trim() != "senha"){
        mensagem = "Usuário ou senhas estão errados!";
        texto.textContent = mensagem;
        return false
    }*/
    /*else{
        window.open(pagina)
        return true
    }*/
}