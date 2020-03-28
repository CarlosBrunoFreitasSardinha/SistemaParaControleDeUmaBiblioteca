CREATE TABLE autor (
  id_autor INTEGER(11) NOT NULL,
  nome_autor VARCHAR(50) NOT NULL,
  sitacao_autor VARCHAR(30) NOT NULL,
  PRIMARY KEY(id_autor)
);

CREATE TABLE tipo_aquisicao (
  id_tipo_aquisicao INTEGER(11) NOT NULL,
  descricao_tipo_aquisicao TEXT NOT NULL,
  PRIMARY KEY(id_tipo_aquisicao)
);

CREATE TABLE acervo (
  id_acervo INTEGER(11) NOT NULL,
  titulo_acervo VARCHAR(55) NOT NULL,
  observacoes_acervo TEXT NOT NULL,
  assuntos_acervo TEXT NOT NULL,
  volume_acervo VARCHAR(40) NOT NULL,
  serie_acervo VARCHAR(20) NOT NULL,
  PRIMARY KEY(id_acervo)
);

CREATE TABLE tipo_midia (
  id_tipo_midia INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao_tipo_midia VARCHAR(50) NULL,
  PRIMARY KEY(id_tipo_midia)
);

CREATE TABLE livro (
  id_livro INTEGER(11) NOT NULL,
  id_acervo INTEGER(11) NOT NULL,
  edicao_livro INTEGER(11) NOT NULL,
  editora_livro INTEGER(11) NOT NULL,
  local_livro INTEGER(11) NOT NULL,
  ano_livro DATE NOT NULL,
  n_pagina_livro INTEGER(11) NOT NULL,
  colecao_livro VARCHAR(30) NOT NULL,
  idioma_livro VARCHAR(30) NOT NULL,
  isbn_livro INTEGER(11) NOT NULL,
  classificacao_livro INTEGER(11) NOT NULL,
  PRIMARY KEY(id_livro, id_acervo),
  FOREIGN KEY(id_acervo)
    REFERENCES acervo(id_acervo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE texto (
  id_texto INTEGER(11) NOT NULL,
  id_acervo INTEGER(11) NOT NULL,
  edicao_texto INTEGER(11) NOT NULL,
  idioma_texto VARCHAR(50) NOT NULL,
  imprenta_texto VARCHAR(50) NOT NULL,
  tipo_colecao_texto VARCHAR(50) NOT NULL,
  PRIMARY KEY(id_texto, id_acervo),
  FOREIGN KEY(id_acervo)
    REFERENCES acervo(id_acervo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE folheto (
  id_folheto INTEGER(11) NOT NULL,
  id_acervo INTEGER(11) NOT NULL,
  edicao_folheto INTEGER(11) NOT NULL,
  idioma_folheto INTEGER(11) NOT NULL,
  imprenta_folheto INTEGER(11) NOT NULL,
  tipo_colecao_folheto INTEGER(11) NOT NULL,
  PRIMARY KEY(id_folheto, id_acervo),
  FOREIGN KEY(id_acervo)
    REFERENCES acervo(id_acervo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE video (
  id_video INTEGER(11) NOT NULL,
  id_acervo INTEGER(11) NOT NULL,
  id_tipo_midia INTEGER UNSIGNED NOT NULL,
  cutter_video INTEGER(11) NOT NULL,
  idioma_video VARCHAR(25) NOT NULL,
  local_video VARCHAR(35) NOT NULL,
  editora_video VARCHAR(30) NOT NULL,
  ano_video DATE NOT NULL,
  tipo_colecao_video VARCHAR(20) NOT NULL,
  PRIMARY KEY(id_video, id_acervo),
  FOREIGN KEY(id_acervo)
    REFERENCES acervo(id_acervo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_tipo_midia)
    REFERENCES tipo_midia(id_tipo_midia)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE aquisicao (
  id_aquisicao INTEGER(11) NOT NULL,
  id_acervo INTEGER(11) NOT NULL,
  id_tipo_aquisicao INTEGER(11) NOT NULL,
  data_aquisicao DATE NOT NULL,
  quantidade_aquisicao INTEGER(11) NOT NULL,
  PRIMARY KEY(id_aquisicao),
  FOREIGN KEY(id_tipo_aquisicao)
    REFERENCES tipo_aquisicao(id_tipo_aquisicao)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_acervo)
    REFERENCES acervo(id_acervo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE autor_acervo (
  id_autor INTEGER(11) NOT NULL,
  id_acervo INTEGER(11) NOT NULL,
  PRIMARY KEY(id_autor, id_acervo),
  FOREIGN KEY(id_autor)
    REFERENCES autor(id_autor)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_acervo)
    REFERENCES acervo(id_acervo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE item_acervo (
  id_item_acervo INTEGER(11) NOT NULL,
  id_aquisicao INTEGER(11) NOT NULL,
  PRIMARY KEY(id_item_acervo),
  FOREIGN KEY(id_aquisicao)
    REFERENCES aquisicao(id_aquisicao)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE emprestimo (
  id_emprestimo INTEGER(11) NOT NULL,
  id_item_acervo INTEGER(11) NOT NULL,
  id_usuario_emprestimo INTEGER(11) NOT NULL,
  data_emprestimo DATE NOT NULL,
  prazo_emprestimo DATE NOT NULL,
  data_devolucao DATE NOT NULL,
  renovacao_emprestimo INTEGER(11) NOT NULL,
  PRIMARY KEY(id_emprestimo),
  FOREIGN KEY(id_item_acervo)
    REFERENCES item_acervo(id_item_acervo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE multa (
  id_multa INTEGER(11) NOT NULL,
  id_emprestimo INTEGER(11) NOT NULL,
  valor INTEGER(11) NOT NULL,
  pagamento_multa INTEGER(11) NOT NULL,
  PRIMARY KEY(id_multa),
  FOREIGN KEY(id_emprestimo)
    REFERENCES emprestimo(id_emprestimo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


