INSERT INTO tb_tipo_user(
            id, nome, descricao)
    VALUES (1, 'Pessoa Fisica', 'Cadastro de Pessoa Fisica');
INSERT INTO tb_tipo_user(
            id, nome, descricao)
    VALUES (2, 'Pessoa Jurídica', 'Cadastro de Pessoa Jurídica');

INSERT INTO tb_user(
        id, id_tipo, nome, email, senha)
VALUES (1, 1, 'Admin', 'admin@teste.com.br', 'abcd1234');
