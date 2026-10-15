# Crud Navio

Sistema web em **PHP e MySQL** para cadastrar, consultar, editar e excluir registros de operações de navios, com acesso protegido por login.

## Funcionalidades

- Login com senha verificada por hash (`password_verify`)
- Páginas protegidas por sessão, com logout automático após 10 minutos sem uso
- CRUD completo na tabela `cadastro`: cadastrar, listar, visualizar, editar e excluir
- Consultas com *prepared statements* (`mysqli`), evitando SQL injection
- Interface com Bootstrap 5

## Dados de cada registro

Navio, agência, local, tipo de operação, data da operação, atracação e desatracação, início e fim do bombeio, volume, resíduo, porcentagem, saída e retorno do porto, tripulação, dado bancário e observações.

## Tecnologias

PHP · MySQL (phpMyAdmin) · HTML · CSS · Bootstrap

## Como rodar

1. Instale o XAMPP e coloque a pasta em `htdocs`.
2. No phpMyAdmin, crie um banco com as tabelas `cadastro` (campos acima) e `usuarios` (`usuario` e `senha`, esta última guardada com `password_hash`).
3. Ajuste a conexão se precisar. Por padrão ela usa `localhost`, usuário `root` e banco `test`, e aceita as variáveis de ambiente `DB_HOST`, `DB_USER`, `DB_PASS` e `DB_NAME`.
4. Abra `http://localhost/Crud-Navio/login.php`.

## Estrutura

| Arquivo | Função |
|---|---|
| `conexao.php` | Conexão com o banco |
| `login.php`, `verifica_login.php`, `logout.php` | Autenticação |
| `protecao.php` | Bloqueia páginas sem login e controla o tempo de sessão |
| `index.php`, `cadastrar.php` | Formulário e criação de registros |
| `vizualizar.php` | Listagem |
| `editar.php`, `atualizar.php` | Edição |
| `excluir.php` | Exclusão |

## Autor

Rafael Barzagli · [LinkedIn](https://www.linkedin.com/in/rafael-barzagli-7a7993294/)
