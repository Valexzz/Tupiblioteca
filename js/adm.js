function editar(id){
    if (id == 0){
        window.location.replace('adm.php')
    }
    else window.location.replace(`adm.php?editar=${id}`)
    /*let ajax = new XMLHttpRequest()
    ajax.onreadystatechange=function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById('formulario_cadastro').innerHTML=this.responseText
        }
    }
    ajax.open('GET', `adm.php?editar=${id}`)
    ajax.send()*/
}
function validar(titulo, cadastrar){
    
    let arquivo = document.getElementById("imagem");
    let campo = document.getElementsByClassName("campo");
    let select_campo = document.getElementsByClassName("select_campo");
    let ano = document.getElementById("ano").value
    for (let i = 0; i < campo.length; i++){
        if (campo[i].value.trim() == ''){
            alert ("Por favor preencha todos os campos!")
            return false
        }
    }
    for (let i = 0; i < select_campo.length; i++){
        if (select_campo[i].value == 0){
            alert ("Por favor escolha todos os campos!")
            return false
        }
    }
    if (cadastrar){
        if (arquivo.files.length == 0){
            alert ("Por favor escolha uma imagem!")
            return false
        }
    }
    if (ano < 1000 || ano > 9999){
        alert ("Digite um ano válido!")
        return false
    }
    if (cadastrar){
        return confirm("Tem certeza que deseja cadastrar " + titulo + '?')
    } else return confirm ("Tem certeza que deseja atualizar " + titulo + '?')


}   