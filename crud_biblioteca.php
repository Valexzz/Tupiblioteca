<?php
require_once 'conexao_sql.php';

function recuperar_um_livro($conexao){

    $stmt = mysqli_prepare($conexao, 'SELECT g.id_cadastro_geral, g.titulo, g.autores, g.edicao, g.ano, g.codigo_barras, g.num_isbn, g.idioma, date_format(cast(g.aquisicao AS DATE), "%d/%m/%y") as aquisicao, g.assunto, g.classificacao, g.colecao_volume, g.extra, g.resenha, g.comentario, g.imagem, g.ativo_inativo,
    t.descricao AS tipo,
    e.descricao AS editora,
    ci.nome AS cidade,
    uf.uf AS uf,
    c.descricao AS categoria
    FROM 
    TBL_CADASTRO_GERAL AS g
    LEFT JOIN TBL_TIPO_CADASTRO AS t 
    ON g.cod_tipo_cadastro = t.id_tipo_cadastro
    LEFT JOIN TBL_EDITORA AS e
    ON g.cod_editora = e.id_editora	
    LEFT JOIN TBL_CIDADE AS ci
    ON g.cod_cidade = ci.id_cidade
    LEFT JOIN TBL_ESTADO AS uf
    ON ci.cod_estado = uf.id_estado
    LEFT JOIN TBL_CATEGORIA AS c
    ON g.cod_categoria = c.id_categoria
    WHERE g.ativo_inativo = "ativo" AND g.id_cadastro_geral = ? ;'
    );
    mysqli_stmt_bind_param($stmt,'i',$_GET['id']);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $um_livro = mysqli_fetch_assoc($resultado);
    return $um_livro;
}

function recuperar_catalogo($conexao){
    //coisas a serem filtradas

    $titulo = isset($_GET['titulo']) && $_GET['titulo'] != '' ? ' AND g.titulo LIKE "%'.$_GET['titulo'].'%" ' : '';
    $autor = isset($_GET['autor']) && $_GET['autor'] != '' ? ' AND g.autores LIKE "%'.$_GET['autor'].'%" ' : '';
    $tipo = isset($_GET['tipo']) && $_GET['tipo'] != 0 ? ' AND g.cod_tipo_cadastro = '.$_GET['tipo'] : '';
    $editora = isset($_GET['editora']) && $_GET['editora'] != 0 ? ' AND g.cod_editora = '.$_GET['editora'] : '';
    $categoria = isset($_GET['categoria']) && $_GET['categoria'] != 0 ? ' AND g.cod_categoria = '.$_GET['categoria'] : '';

    $stmt = mysqli_prepare($conexao, 'SELECT g.cod_tipo_cadastro, g.cod_editora, g.cod_categoria, g.id_cadastro_geral, g.titulo, g.autores, g.edicao, g.imagem, g.ativo_inativo,
    t.descricao AS tipo,
    e.descricao AS editora,
    c.descricao AS categoria
    FROM 
    TBL_CADASTRO_GERAL AS g
    LEFT JOIN TBL_TIPO_CADASTRO AS t 
    ON g.cod_tipo_cadastro = t.id_tipo_cadastro
    LEFT JOIN TBL_EDITORA AS e
    ON g.cod_editora = e.id_editora	
    LEFT JOIN TBL_CATEGORIA AS c
    ON g.cod_categoria = c.id_categoria
    WHERE g.ativo_inativo = "ativo"'.$tipo.$editora.$categoria.$autor.$titulo
    );
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $catalogo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $catalogo;
}

function recuperar_tres_livros($conexao){

    $stmt = mysqli_prepare($conexao, 'SELECT g.id_cadastro_geral, g.titulo, g.autores, g.edicao, g.ano, g.codigo_barras, g.num_isbn, g.idioma, date_format(cast(g.aquisicao AS DATE), "%d/%m/%y") as aquisicao, g.assunto, g.classificacao, g.colecao_volume, g.extra, g.resenha, g.comentario, g.imagem, g.ativo_inativo,
    t.descricao AS tipo,
    e.descricao AS editora,
    ci.nome AS cidade,
    uf.uf AS uf,
    c.descricao AS categoria
    FROM 
    TBL_CADASTRO_GERAL AS g
    LEFT JOIN TBL_TIPO_CADASTRO AS t 
    ON g.cod_tipo_cadastro = t.id_tipo_cadastro
    LEFT JOIN TBL_EDITORA AS e
    ON g.cod_editora = e.id_editora	
    LEFT JOIN TBL_CIDADE AS ci
    ON g.cod_cidade = ci.id_cidade
    LEFT JOIN TBL_ESTADO AS uf
    ON ci.cod_estado = uf.id_estado
    LEFT JOIN TBL_CATEGORIA AS c
    ON g.cod_categoria = c.id_categoria
	WHERE g.ativo_inativo = "ativo" AND NOT(g.imagem = "")
    ORDER BY RAND()
	LIMIT 0,3;
    '
    );
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $tres_livros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tres_livros;

}

function recuperar_livros($conexao){
    require_once 'verifica_sessao.php';
    $stmt = mysqli_prepare($conexao, 'SELECT g.id_cadastro_geral, g.titulo, g.autores, g.edicao, g.ano, g.codigo_barras, g.num_isbn, g.idioma, date_format(cast(g.aquisicao AS DATE), "%d/%m/%y") as aquisicao, g.assunto, g.classificacao, g.colecao_volume, g.extra, g.resenha, g.comentario, g.imagem, g.ativo_inativo,
    t.descricao AS tipo,
    e.descricao AS editora,
    ci.nome AS cidade,
    uf.uf AS uf,
    c.descricao AS categoria
    FROM 
    TBL_CADASTRO_GERAL AS g
    LEFT JOIN TBL_TIPO_CADASTRO AS t 
    ON g.cod_tipo_cadastro = t.id_tipo_cadastro
    LEFT JOIN TBL_EDITORA AS e
    ON g.cod_editora = e.id_editora	
    LEFT JOIN TBL_CIDADE AS ci
    ON g.cod_cidade = ci.id_cidade
    LEFT JOIN TBL_ESTADO AS uf
    ON ci.cod_estado = uf.id_estado
    LEFT JOIN TBL_CATEGORIA AS c
    ON g.cod_categoria = c.id_categoria
    ORDER BY ativo_inativo'
    );
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $livros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $livros;

}

function recuperar_editoras($conexao){
    $stmt = mysqli_prepare($conexao, 'SELECT * FROM TBL_EDITORA');
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $editoras = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $editoras;
}

function recuperar_cidades($conexao){
    $stmt = mysqli_prepare($conexao, 
    'SELECT * FROM TBL_CIDADE AS c
    LEFT JOIN TBL_ESTADO AS uf
    ON c.cod_estado = uf.id_estado
    ');
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $estados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $estados;
}

function recuperar_tipos($conexao){
    $stmt = mysqli_prepare($conexao, 'SELECT * FROM TBL_TIPO_CADASTRO');
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $tipos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tipos;
}

function recuperar_categorias($conexao){
    $stmt = mysqli_prepare($conexao, 'SELECT * FROM TBL_CATEGORIA');
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $categorias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $categorias;
}
function filtrar(){
    header('Location:catalogo.php?tipo='.$_POST['tipo'].'&editora='.$_POST['editora'].'&categoria='.$_POST['categoria'].'&titulo='.$_POST['titulo'].'&autor='.$_POST['autor']);
}

function editar($conexao){
    require_once 'verifica_sessao.php';
    $stmt = mysqli_prepare($conexao, 'SELECT g.id_cadastro_geral, g.titulo, g.autores, g.edicao, g.ano, g.codigo_barras, g.num_isbn, g.idioma, date_format(cast(g.aquisicao AS DATE), "%d/%m/%y") as aquisicao, g.assunto, g.classificacao, g.colecao_volume, g.extra, g.resenha, g.comentario, g.imagem, g.ativo_inativo,
    t.descricao AS tipo,
    e.descricao AS editora,
    ci.nome AS cidade,
    uf.uf AS uf,
    c.descricao AS categoria
    FROM 
    TBL_CADASTRO_GERAL AS g
    LEFT JOIN TBL_TIPO_CADASTRO AS t 
    ON g.cod_tipo_cadastro = t.id_tipo_cadastro
    LEFT JOIN TBL_EDITORA AS e
    ON g.cod_editora = e.id_editora	
    LEFT JOIN TBL_CIDADE AS ci
    ON g.cod_cidade = ci.id_cidade
    LEFT JOIN TBL_ESTADO AS uf
    ON ci.cod_estado = uf.id_estado
    LEFT JOIN TBL_CATEGORIA AS c
    ON g.cod_categoria = c.id_categoria
    WHERE g.id_cadastro_geral = ?
    ORDER BY ativo_inativo'
    );
    mysqli_stmt_bind_param($stmt, 'i', $_GET['editar']);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $cadastro = mysqli_fetch_assoc($resultado);
    return $cadastro;
}

function upload_imagem(){
    require_once 'verifica_sessao.php';
    $upload = true;
    $diretorio = "uploads/";
    $arquivo = $_FILES['imagem']['name'] != '' ? $diretorio.basename($_FILES['imagem']['name']) : $_POST['imagem_padrao'];
    if (!file_exists($arquivo)){
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
            $upload = false;
        }
        if ($upload){
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivo)) {return $arquivo;};
        } 
    }
    return $arquivo;
}

function cadastrar($conexao){
    require_once 'verifica_sessao.php';
    $imagem = upload_imagem();
    echo $imagem;
    echo '<pre>';
    echo var_dump($_POST);
    echo '</pre>';
    $stmt = mysqli_prepare($conexao, 'INSERT INTO TBL_CADASTRO_GERAL
    (cod_tipo_cadastro, titulo, autores, cod_editora, edicao, ano, codigo_barras, num_isbn, cod_cidade, idioma, cod_categoria, assunto, classificacao, colecao_volume, extra, resenha, comentario, imagem)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?, ?, ?, ?)'); 
    mysqli_stmt_bind_param($stmt, 'issiiissisisssssss',
    $_POST['tipo'],
    $_POST['titulo'],
    $_POST['autor'],
    $_POST['editora'],
    $_POST['edicao'],
    $_POST['ano'],
    $_POST['barras'],
    $_POST['isbn'],
    $_POST['cidade'], 
    $_POST['idioma'],
    $_POST['categoria'],
    $_POST['assunto'],
    $_POST['classificacao'],
    $_POST['volume'],
    $_POST['extra'],
    $_POST['resenha'],
    $_POST['comentario'],
    $imagem
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    header('Location:adm.php');
}

function atualizar($conexao){
    require_once 'verifica_sessao.php';
    $imagem = upload_imagem();
    echo $imagem;
    $stmt = mysqli_prepare($conexao, 'UPDATE TBL_CADASTRO_GERAL AS g
    SET g.cod_tipo_cadastro = ?,
    g.titulo = ?, 
    g.autores = ?, 
    g.cod_editora = ?,
    g.edicao = ?, 
    g.ano = ?, 
    g.codigo_barras = ?, 
    g.num_isbn = ?, 
    g.cod_cidade = ?,
    g.idioma = ?, 
    g.cod_categoria = ?,
    g.assunto = ?, 
    g.classificacao = ?,
    g.colecao_volume = ?, 
    g.extra = ?, 
    g.resenha = ?, 
    g.comentario = ?,
    g.imagem = ?
    WHERE g.id_cadastro_geral = ?;'
    );
    mysqli_stmt_bind_param($stmt, 'issiiissisisssssssi',
    $_POST['tipo'],
    $_POST['titulo'],
    $_POST['autor'],
    $_POST['editora'],
    $_POST['edicao'],
    $_POST['ano'],
    $_POST['barras'],
    $_POST['isbn'],
    $_POST['cidade'], 
    $_POST['idioma'],
    $_POST['categoria'],
    $_POST['assunto'],
    $_POST['classificacao'],
    $_POST['volume'],
    $_POST['extra'],
    $_POST['resenha'],
    $_POST['comentario'],
    $imagem,
    $_POST['id']
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    header('Location:adm.php');
}

function ativar_desativar($conexao, $acao){
    require_once 'verifica_sessao.php';
    echo $acao;
    $stmt = mysqli_prepare($conexao, 
    'UPDATE TBL_CADASTRO_GERAL 
    SET ativo_inativo = ? 
    WHERE id_cadastro_geral = ?;'
    );
    mysqli_stmt_bind_param($stmt, 'si', $acao, $_GET['id']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    header('Location:adm.php#registro '.$_GET['id']);
}

if ($recuperar_dados_adm){
    $livros = recuperar_livros($conexao);
    $editoras = recuperar_editoras($conexao);
    $cidades = recuperar_cidades($conexao);
    $tipos = recuperar_tipos($conexao);
    $categorias = recuperar_categorias($conexao);
    $tres_livros = recuperar_tres_livros($conexao);
    $catalogo = recuperar_catalogo($conexao);
    $um_livro = recuperar_um_livro($conexao);
}
else if ($recuperar_dados_tres_livros){
    $tres_livros = recuperar_tres_livros($conexao);
}
else if ($recuperar_dados_catalogo){
    $editoras = recuperar_editoras($conexao);
    $cidades = recuperar_cidades($conexao);
    $tipos = recuperar_tipos($conexao);
    $categorias = recuperar_categorias($conexao);
    $catalogo = recuperar_catalogo($conexao);
}
else if ($recuperar_dados_pagina_livro){
    $um_livro = recuperar_um_livro($conexao);
}
if(isset($_GET['editar'])){
    $cadastro = editar($conexao);
}

if (isset($_POST['cadastrar'])){
    cadastrar($conexao);
}

else if (isset($_POST['atualizar'])){
    atualizar($conexao);
}
else if (isset($_POST['Desativar'])){
    $acao = 'inativo';
    ativar_desativar($conexao, $acao);
}

else if (isset($_POST['Ativar'])){
    $acao = 'ativo';
    ativar_desativar($conexao, $acao);
}
if (isset($_POST['filtrar'])){
    filtrar();
}
?>