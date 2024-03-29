-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Fev-2022 às 00:57
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ambiente_agora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_cads_usuarios`
--

CREATE TABLE `adms_cads_usuarios` (
  `id` int(11) NOT NULL,
  `env_email_conf` int(11) NOT NULL,
  `adms_nivel_acesso_id` int(11) NOT NULL,
  `adms_sit_usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_cads_usuarios`
--

INSERT INTO `adms_cads_usuarios` (`id`, `env_email_conf`, `adms_nivel_acesso_id`, `adms_sit_usuario_id`, `created`, `modified`) VALUES
(1, 1, 2, 3, '2021-08-04 01:36:24', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_confirmar_email`
--

CREATE TABLE `adms_confirmar_email` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `host` varchar(50) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `porta` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_confirmar_email`
--

INSERT INTO `adms_confirmar_email` (`id`, `nome`, `email`, `host`, `usuario`, `senha`, `porta`, `created`, `modified`) VALUES
(1, 'Ambiente Agora', 'jessicaalvesferreira24@gmail.com', 'smtp.mailtrap.io', 'a5a169fb92c731', '35572db7490e62', 2525, '2021-08-04 21:42:58', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_cors`
--

CREATE TABLE `adms_cors` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cor` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_cors`
--

INSERT INTO `adms_cors` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Azul', 'primary', '2021-08-16 03:41:17', NULL),
(2, 'Vermelho', 'danger', '2021-08-16 03:42:17', NULL),
(3, 'Amarelo', 'warning', '2021-08-17 00:14:51', NULL),
(4, 'Verde', 'success', '2021-08-17 00:15:13', NULL),
(5, 'Azul Claro', 'info', '2021-09-27 03:06:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_grups_pags`
--

CREATE TABLE `adms_grups_pags` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_grups_pags`
--

INSERT INTO `adms_grups_pags` (`id`, `nome`, `ordem`, `created`, `modified`) VALUES
(1, 'Listar', 1, '2021-07-13 03:22:48', NULL),
(2, 'Cadastrar', 2, '2021-07-13 03:22:48', NULL),
(3, 'Editar', 3, '2021-07-13 03:22:48', '2021-07-13 03:22:48'),
(4, 'Apagar', 4, '2021-07-13 03:22:48', '2021-07-13 03:22:48'),
(5, 'Consultar', 5, '2021-07-13 03:22:48', '2021-07-13 03:22:48'),
(6, 'Outros', 6, '2021-07-13 03:22:48', '2021-07-13 03:22:48'),
(7, 'Acesso', 7, '2021-07-13 03:22:48', '2021-07-13 03:22:48'),
(8, 'Pesquisar', 8, '2022-01-05 23:29:23', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_menus`
--

CREATE TABLE `adms_menus` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ordem` int(11) NOT NULL,
  `adms_sit_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_menus`
--

INSERT INTO `adms_menus` (`id`, `nome`, `ordem`, `adms_sit_id`, `created`, `modified`) VALUES
(1, 'Minha Conta', 1, 1, '2021-07-28 20:43:01', NULL),
(2, 'Administradores', 2, 1, '2021-07-10 23:50:33', NULL),
(3, 'Menu', 3, 1, '2021-07-10 23:50:34', NULL),
(4, 'Denúncias Realizadas', 4, 1, '2021-07-11 00:17:35', NULL),
(5, 'Dados Cadastrais', 5, 1, '2021-07-11 00:18:31', NULL),
(6, 'Sair', 6, 1, '2021-07-11 00:19:35', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_niveis_acessos`
--

CREATE TABLE `adms_niveis_acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_niveis_acessos`
--

INSERT INTO `adms_niveis_acessos` (`id`, `nome`, `ordem`, `created`, `modified`) VALUES
(1, 'Super Administrador', 1, '2021-06-26 07:00:32', '2022-01-07 00:24:20'),
(2, 'Administrador', 2, '2021-06-26 07:00:32', '2022-01-07 00:29:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_nivs_aces_pags`
--

CREATE TABLE `adms_nivs_aces_pags` (
  `id` int(11) NOT NULL,
  `permissao` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `dropdown` int(11) NOT NULL,
  `liberado_menu` int(11) NOT NULL,
  `adms_menu_id` int(11) NOT NULL,
  `adms_nivel_acess_id` int(11) NOT NULL,
  `adms_pagina_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_nivs_aces_pags`
--

INSERT INTO `adms_nivs_aces_pags` (`id`, `permissao`, `ordem`, `dropdown`, `liberado_menu`, `adms_menu_id`, `adms_nivel_acess_id`, `adms_pagina_id`, `created`, `modified`) VALUES
(1, 1, 1, 2, 1, 1, 1, 3, '2021-07-10 23:52:57', NULL),
(2, 1, 2, 1, 1, 2, 1, 8, '2021-07-10 23:54:10', NULL),
(3, 2, 3, 1, 1, 3, 1, 9, '2021-07-11 02:23:32', NULL),
(4, 1, 4, 1, 1, 4, 1, 24, '2021-07-11 02:27:12', NULL),
(5, 1, 5, 1, 1, 5, 1, 4, '2021-07-11 02:28:02', NULL),
(6, 1, 6, 2, 1, 6, 1, 5, '2021-07-28 21:32:32', NULL),
(7, 1, 7, 1, 1, 2, 1, 12, '2021-07-29 03:35:56', NULL),
(8, 2, 8, 1, 1, 3, 1, 13, '2021-07-29 03:41:30', NULL),
(9, 1, 9, 1, 1, 5, 1, 11, '2021-07-29 03:43:21', NULL),
(10, 1, 10, 2, 1, 1, 2, 3, '2021-08-12 02:26:45', NULL),
(11, 1, 11, 1, 1, 5, 2, 4, '2021-08-12 02:29:09', NULL),
(12, 1, 12, 1, 1, 5, 2, 11, '2021-08-12 02:31:41', NULL),
(13, 1, 13, 2, 1, 6, 2, 5, '2021-08-12 02:33:16', NULL),
(14, 1, 14, 2, 2, 2, 1, 15, '2021-08-14 22:15:45', NULL),
(15, 1, 15, 2, 2, 2, 1, 16, '2021-08-15 01:59:55', NULL),
(16, 1, 16, 2, 2, 2, 1, 17, '2021-08-17 01:09:31', NULL),
(17, 1, 17, 1, 1, 2, 2, 8, '2021-08-20 18:32:30', NULL),
(19, 1, 19, 2, 2, 2, 2, 15, '2021-08-20 18:39:48', NULL),
(20, 2, 20, 2, 2, 2, 2, 17, '2021-08-20 18:41:47', NULL),
(21, 1, 21, 2, 2, 2, 2, 18, '2021-08-20 18:44:32', NULL),
(22, 1, 22, 2, 2, 2, 1, 18, '2021-08-20 18:45:26', NULL),
(23, 1, 23, 2, 2, 2, 1, 21, '2021-08-22 03:14:16', NULL),
(24, 1, 24, 2, 2, 2, 1, 20, '2021-08-22 03:16:22', NULL),
(25, 1, 25, 2, 2, 2, 1, 22, '2021-08-22 03:17:44', NULL),
(26, 1, 26, 2, 2, 2, 1, 19, '2021-08-22 03:40:11', NULL),
(27, 1, 27, 2, 2, 2, 1, 23, '2021-08-22 06:10:44', NULL),
(28, 1, 28, 2, 2, 2, 1, 12, '2021-08-22 06:41:37', NULL),
(29, 1, 29, 2, 2, 2, 1, 22, '2021-08-23 01:07:30', NULL),
(30, 1, 30, 2, 2, 4, 1, 25, '2021-08-23 07:50:32', NULL),
(31, 1, 31, 2, 2, 4, 1, 26, '2021-08-23 08:17:26', NULL),
(32, 1, 32, 1, 1, 4, 1, 27, '2021-08-30 21:53:37', NULL),
(33, 1, 33, 2, 2, 4, 1, 28, '2021-08-31 04:41:52', NULL),
(34, 1, 34, 2, 2, 4, 1, 29, '2021-12-13 03:22:22', NULL),
(35, 1, 35, 1, 1, 4, 2, 24, '2021-12-13 03:32:28', NULL),
(36, 1, 36, 1, 1, 4, 2, 27, '2021-12-13 03:39:52', NULL),
(37, 1, 37, 1, 2, 4, 2, 25, '2021-12-13 03:40:47', NULL),
(38, 1, 38, 1, 2, 4, 2, 26, '2021-12-13 03:41:47', NULL),
(39, 1, 39, 1, 2, 4, 2, 28, '2021-12-13 03:42:45', NULL),
(40, 1, 40, 1, 2, 4, 2, 29, '2021-12-13 03:44:31', NULL),
(41, 1, 41, 1, 2, 2, 1, 30, '2022-01-05 23:36:08', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_pags`
--

CREATE TABLE `adms_pags` (
  `id` int(11) NOT NULL,
  `controller` varchar(60) NOT NULL,
  `metodo` varchar(80) NOT NULL,
  `menu_controller` varchar(60) NOT NULL,
  `menu_metodo` varchar(80) NOT NULL,
  `nome` varchar(170) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `liberado_bloqueado` int(11) NOT NULL DEFAULT 2,
  `adms_tipo_pag_id` int(11) NOT NULL,
  `adms_sit_pag_id` int(11) NOT NULL DEFAULT 2,
  `adms_grup_pag_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_pags`
--

INSERT INTO `adms_pags` (`id`, `controller`, `metodo`, `menu_controller`, `menu_metodo`, `nome`, `titulo`, `liberado_bloqueado`, `adms_tipo_pag_id`, `adms_sit_pag_id`, `adms_grup_pag_id`, `created`, `modified`) VALUES
(1, 'Login', 'acessoLogin', 'login', 'acesso-login', 'Página de Login do Administrador ', 'Página de Login - Ambiente Agora', 1, 1, 1, 7, '2021-06-26 06:22:51', NULL),
(2, 'Cadastro', 'cadastrarUsuario', 'cadastro', 'cadastrar-usuario', 'Página de Login do Administrador ', 'Página de Login do Administrador - Ambiente Agora', 1, 1, 1, 2, '2021-06-26 06:28:36', NULL),
(3, 'MinhaConta', 'acessoMinhaConta', 'minha-conta', 'acesso-minha-conta', 'Página de Acesso à Minha Conta do Administrador', 'Minha Conta - Ambiente Agora', 1, 2, 1, 7, '2021-06-26 06:32:57', NULL),
(4, 'ConsultarDadosCadastrais', 'consultarDadosCadastrais', 'consultar-dados-cadastrais', 'consultar-dados-cadastrais', 'Consultar', 'Minha Conta - Ambiente Agora', 2, 2, 1, 5, '2021-06-26 06:35:26', NULL),
(5, 'Login', 'logout', 'login', 'logout', 'Página de Logout', 'Página de Logout - Ambiente Agora', 2, 2, 1, 7, '2021-06-26 06:41:13', NULL),
(6, 'EsqueceuSenha', 'esqueceuSenha', 'esqueceu-senha', 'esqueceu-senha', 'Página de Esqueceu Senha', 'Página de Esqueceu Senha - Ambiente Agora', 1, 1, 1, 7, '2021-06-26 06:43:45', NULL),
(7, 'AtualSenha', 'atualSenha', 'atual-senha', 'atual-senha', 'Página de atualizar a senha', 'Página de atualizar a senha - Ambiente Agora', 1, 1, 1, 3, '2021-06-26 06:51:25', NULL),
(8, 'ListarUsuarios', 'listarUsuarios', 'listar-usuarios', 'listar-usuarios', 'Listar Administradores', 'Página para ter acesso a lista dos usuários cadastrados - Ambiente Agora', 1, 2, 1, 1, '2021-06-26 06:56:19', NULL),
(9, 'Menu', 'menu', 'menu', 'menu', 'Páginas', 'Página de Menu', 2, 2, 1, 7, '2021-07-11 01:02:32', NULL),
(10, 'DenunciasRealizadas', 'denunciasRealizadas', 'denuncias-realizadas', 'denuncias-realizadas', 'Denúncias Realizadas', 'Página de Denúncias Realizadas - Ambiente Agora', 2, 2, 1, 5, '2021-07-11 02:18:32', NULL),
(11, 'AlterarDadosCadastrais', 'alterarDadosCadastrais', 'alterar-dados-cadastrais', 'alterar-dados-cadastrais', 'Alterar ', 'Minha Conta - Ambiente Agora', 1, 2, 1, 3, '2021-07-29 01:04:35', NULL),
(12, 'ListarNiveisAcesso', 'listarNiveisAcesso', 'listar-niveis-acesso', 'listar-niveis-acesso', 'Níveis de Acesso', 'Minha Conta - Ambiente Agora', 1, 2, 1, 6, '2021-07-29 03:30:10', NULL),
(13, 'Menu', 'menu', 'menu', 'menu', 'Item de Menu', 'Minha Conta - Ambiente Agora', 1, 2, 2, 6, '2021-07-29 03:39:08', NULL),
(14, 'ConfirmarEmail', 'confirmarEmail', 'confirmar-email', 'confirmar-email', 'Página de Confirmar E-mail', 'Página de Confirmar E-mail - Ambiente Agora', 1, 1, 2, 7, '2021-08-05 03:52:20', NULL),
(15, 'ConsultarUsuario', 'consultarUsuario', 'consultar-usuario', 'consultar-usuario', 'Visualizar Usuário', 'Página para consultar dados usuário - Ambiente Agora', 2, 2, 1, 5, '2021-08-14 22:09:54', NULL),
(16, 'AlterarUsuario', 'alterarUsuario', 'alterar-usuario', 'alterar-usuario', 'Alterar Usuário', 'Página para alterar dados usuário - Ambiente Agora', 2, 2, 1, 3, '2021-08-15 01:55:07', NULL),
(17, 'ApagarUsuario', 'apagarUsuario', 'apagar-usuario', 'apagar-usuario', 'Apagar Usuário', 'Página para apagar usuário - Ambiente Agora', 2, 2, 1, 4, '2021-08-17 00:57:12', NULL),
(18, 'CadastrarUsuario', 'cadastrarUsuario', 'cadastrar-usuario', 'cadastrar-usuario', 'Cadastrar Usuário', 'Página para cadastrar usuário - Ambiente Agora', 2, 2, 1, 2, '2021-08-20 18:42:47', NULL),
(19, 'CadastrarNivelAcesso', 'cadastrarNivelAcesso', 'cadastrar-nivel-acesso', 'cadastrar-nivel-acesso', 'Cadastrar Nível Acesso', 'Página para cadastrar nível de Acesso - Ambiente Agora', 2, 2, 1, 2, '2021-08-22 01:30:01', NULL),
(20, 'AlterarNivelAcesso', 'alterarNivelAcesso', 'alterar-nivel-acesso', 'alterar-nivel-acesso', 'Alterar Nível de Acesso', 'Página para alterar nível de Acesso - Ambiente Agora', 2, 2, 1, 3, '2021-08-22 01:32:59', NULL),
(21, 'ConsultarNivelAcesso', 'consultarNivelAcesso', 'consultar-nivel-acesso', 'consultar-nivel-acesso', 'Visualizar Nível Acesso', 'Página para consultar Nível de Acesso - Ambiente Agora', 2, 2, 1, 5, '2021-08-22 01:35:04', NULL),
(22, 'ApagarNivelAcesso', 'apagarNivelAcesso', 'apagar-nivel-acesso', 'apagar-nivel-acesso', 'Apagar Nível Acesso', 'Página para apagar nível de Acesso - Ambiente Agora', 2, 2, 1, 4, '2021-08-22 01:51:15', NULL),
(23, 'AlterarOrdemNivelAcesso', 'alterarOrdemNivelAcesso', 'alterar-ordem-nivel-acesso', 'alterar-ordem-nivel-acesso', 'Alterar Ordem Nível Acesso', 'Página para alterar ordem do nível de Acesso - Ambiente Agora', 2, 2, 1, 3, '2021-08-22 01:55:22', NULL),
(24, 'ListarDenunciasComuns', 'listarDenunciasComuns', 'listar-denuncias-comuns', 'listar-denuncias-comuns', 'Listar Denúncias', 'Página de Listar Denúncias- Ambiente Agora', 1, 2, 1, 5, '2021-08-23 06:58:42', NULL),
(25, 'ConsultarDenuncia', 'consultarDenuncia', 'consultar-denuncia', 'consultar-denuncia', 'Consultar Denúncia', 'Página de Consultar Denúncia - Ambiente Agora', 1, 2, 1, 5, '2021-08-23 07:48:16', NULL),
(26, 'AvaliarDenuncia', 'avaliarDenuncia', 'avaliar-denuncia', 'avaliar-denuncia', 'Avaliar Denúncia', 'Página de Avaliar Denúncia - Ambiente Agora', 1, 2, 1, 3, '2021-08-23 08:15:54', NULL),
(27, 'ListarDenunciasAnonimas', 'listarDenunciasAnonimas', 'listar-denuncias-anonimas', 'listar-denuncias-anonimas', 'Listar Denúncias Anônimas', 'Página de Visualizar Denúncias Anônimas - Ambiente Agora', 1, 2, 1, 5, '2021-08-30 21:43:23', NULL),
(28, 'ConsultarDenunciaAnonima', 'consultarDenunciaAnonima', 'consultar-denuncia-anonima', 'consultar-denuncia-anonima', 'Consultar Denúncia Anônima', '', 1, 2, 1, 5, '2021-08-31 04:35:18', NULL),
(29, 'AvaliarDenunciaAnonima', 'avaliarDenunciaAnonima', 'avaliar-denuncia-anonima', 'avaliar-denuncia-anonima', 'Avaliar Denúncia Anônima', 'Página de Avaliar Denúncia Anônima - Ambiente Agora', 1, 2, 1, 3, '2021-09-20 04:44:51', NULL),
(30, 'PesquisarUsuarios', 'listarUsuarios', 'pesquisar-usuarios', 'listar-usuarios', 'Pesquisar Administradores', 'Página para pesquisar os administradores cadastrados - Ambiente Agora', 1, 2, 1, 8, '2022-01-05 23:22:25', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_sits`
--

CREATE TABLE `adms_sits` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_sits`
--

INSERT INTO `adms_sits` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2021-07-12 19:26:43', NULL),
(2, 'Inativo', '2021-07-12 19:26:43', NULL),
(3, 'Análise', '2021-07-12 19:26:43', '2021-07-12 19:26:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_sits_pags`
--

CREATE TABLE `adms_sits_pags` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_sits_pags`
--

INSERT INTO `adms_sits_pags` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2021-06-26 06:16:28', NULL),
(2, 'Inativo', '2021-06-26 06:16:28', NULL),
(3, 'Análise', '2021-06-26 06:16:28', '2021-06-26 06:16:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_sits_usuarios`
--

CREATE TABLE `adms_sits_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(170) NOT NULL,
  `adms_cor_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_sits_usuarios`
--

INSERT INTO `adms_sits_usuarios` (`id`, `nome`, `adms_cor_id`, `created`, `modified`) VALUES
(1, 'Ativo', 4, '2021-07-23 06:19:54', NULL),
(2, 'Inativo', 2, '2021-07-23 06:19:54', NULL),
(3, 'Aguardando Confirmação', 1, '2021-07-23 06:19:54', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_tipos_pags`
--

CREATE TABLE `adms_tipos_pags` (
  `id` int(11) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `nome` varchar(170) NOT NULL,
  `observacao` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_tipos_pags`
--

INSERT INTO `adms_tipos_pags` (`id`, `tipo`, `nome`, `observacao`, `created`, `modified`) VALUES
(1, 'adms', 'Login - Acesso', 'Página responsável por permitir que o administrador realize o login, logout, solicitar uma nova senha e atualizar sua senha no sistema.', '2021-06-26 06:03:14', NULL),
(2, 'adms', 'Minha Conta', 'Página responsável por permitir que o administrador realize: cadastro, login, listar usuários, níveis de acesso, páginas do sistema, item de menu, alterar dados cadastrais e alterar status das denúncias realizadas pelos ', '2021-07-11 01:40:02', NULL),
(3, 'adms', 'Cadastro de Administrador ', 'Página responsável por permitir que o administrador realize o cadastro de outros administradores de diferentes níveis de acesso no sistema.', '2021-07-11 01:40:02', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_usuarios`
--

CREATE TABLE `adms_usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(60) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `nome` varchar(170) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `recuperar_senha` varchar(70) DEFAULT NULL,
  `confirmar_email` varchar(70) DEFAULT NULL,
  `chave_descadastro` varchar(70) DEFAULT NULL,
  `adms_nivel_acesso_id` int(11) NOT NULL DEFAULT 1,
  `adms_sit_usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_usuarios`
--

INSERT INTO `adms_usuarios` (`id`, `login`, `senha`, `nome`, `email`, `cpf`, `recuperar_senha`, `confirmar_email`, `chave_descadastro`, `adms_nivel_acesso_id`, `adms_sit_usuario_id`, `created`, `modified`) VALUES
(1, 'jessicaalvesferreira24@ambiente.com', '$2y$10$IojX0lgUe.2En1/ALSnCGeDOHppnXunO06y.foXOT0YXJ9rZKYgwi', 'Jéssica Alves Ferreira', 'jessicaalvesferreira24@ambiente.com', '810.838.250-54', NULL, NULL, NULL, 1, 1, '2021-08-18 04:18:19', '2022-01-07 00:29:45'),
(2, 'simoneBarbosaVieira@ambiente.com', '$2y$10$bMux97mXRfNRfXw0ymecMO8auNDT.E1Lk59WCV1l2HJ2lFI/BCXlW', 'Simone Barbosa Vieira', 'simoneBarbosaVieira@ambiente.com', '153.253.610-07', NULL, NULL, NULL, 2, 1, '2022-01-04 21:03:52', '2022-01-04 21:40:52'),
(3, 'jessicaCamargoPires@hotmail.com', '$2y$10$Bu4DQJYb3zeQk9WlJdu/5.lBb/B04fgDWrcTk9mUpBU2wNO03xt4C', 'Jéssica Camargo Pires', 'jessicaCamargoPires@hotmail.com', '299.739.450-34', NULL, NULL, NULL, 2, 1, '2022-01-06 01:11:19', '2022-01-07 00:28:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_cads_usuarios`
--

CREATE TABLE `sts_cads_usuarios` (
  `id` int(11) NOT NULL,
  `env_email_conf` int(11) NOT NULL,
  `sts_perm_ace_id` int(11) NOT NULL,
  `sts_sit_usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_cads_usuarios`
--

INSERT INTO `sts_cads_usuarios` (`id`, `env_email_conf`, `sts_perm_ace_id`, `sts_sit_usuario_id`, `created`, `modified`) VALUES
(1, 1, 1, 3, '2021-08-06 06:04:10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_confirmar_email`
--

CREATE TABLE `sts_confirmar_email` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `host` varchar(50) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `porta` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_confirmar_email`
--

INSERT INTO `sts_confirmar_email` (`id`, `nome`, `email`, `host`, `usuario`, `senha`, `porta`, `created`, `modified`) VALUES
(1, 'Ambiente Agora', 'jessicaalvesferreira24@gmail.com', 'smtp.mailtrap.io', 'a5a169fb92c731', '35572db7490e62', 2525, '2021-08-06 06:00:24', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_denuncias_anonimas`
--

CREATE TABLE `sts_denuncias_anonimas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(65) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `descricao` varchar(320) NOT NULL,
  `envolvido` varchar(35) NOT NULL,
  `nome_envolvido` varchar(170) NOT NULL,
  `funcao_envolvido` varchar(120) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `parecer_tecnico` varchar(320) NOT NULL,
  `sts_status_denuncia_id` int(11) NOT NULL DEFAULT 1,
  `sts_descricao_stat_id` int(11) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_denuncias_anonimas`
--

INSERT INTO `sts_denuncias_anonimas` (`id`, `titulo`, `tipo`, `descricao`, `envolvido`, `nome_envolvido`, `funcao_envolvido`, `imagem`, `parecer_tecnico`, `sts_status_denuncia_id`, `sts_descricao_stat_id`, `created`, `modified`) VALUES
(1, 'Maltrato de Animais', 'Fauna', 'O catzinho foi atropelado pelo meu vizinho que, fugiu sem prestar socorro ao pobre animal.', 'Pessoa Física', 'Seu Zé', 'Aposentado', 'gatoferido.jpg', 'A sua denúncia anônima foi recebida pelo órgão, aguarde para novas informações.', 1, 1, '2022-01-02 03:08:18', '2022-01-07 03:37:38'),
(2, 'Maltrato de Animais Domésticos', 'Fauna', 'blá...', 'Pessoa Física', 'Josefino Marfinno', 'Jardineiro', 'duck.jpg', '', 1, 1, '2022-01-25 00:11:17', NULL),
(3, 'Maltrato de Animais Domésticos blá', 'Flora', 'blá', 'Pessoa Física', 'blá', 'blá', 'coelho.png', '', 1, 1, '2022-02-03 00:19:35', NULL),
(4, 'Maltrato de Animais Domésticos blá', 'Flora', 'blá', 'Pessoa Física', 'blá', 'blá', 'coelho.png', '', 1, 1, '2022-02-03 00:26:22', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_denuncias_comuns`
--

CREATE TABLE `sts_denuncias_comuns` (
  `id` int(11) NOT NULL,
  `sts_usuario_id` int(11) NOT NULL,
  `titulo` varchar(65) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `descricao` varchar(320) NOT NULL,
  `envolvido` varchar(35) NOT NULL,
  `nome_envolvido` varchar(170) NOT NULL,
  `funcao_envolvido` varchar(120) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `parecer_tecnico` varchar(320) NOT NULL,
  `sts_status_denuncia_id` int(11) NOT NULL DEFAULT 1,
  `sts_descricao_stat_id` int(11) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_denuncias_comuns`
--

INSERT INTO `sts_denuncias_comuns` (`id`, `sts_usuario_id`, `titulo`, `tipo`, `descricao`, `envolvido`, `nome_envolvido`, `funcao_envolvido`, `imagem`, `parecer_tecnico`, `sts_status_denuncia_id`, `sts_descricao_stat_id`, `created`, `modified`) VALUES
(1, 1, 'Maltrato de Animais Domésticos', 'Fauna', 'O catzinho foi atropelado pelo meu vizinho que, fugiu sem prestar socorro ao pobre animal.', 'Pessoa Física', 'Josefino Marfinno', 'Jardineiro', 'gatoferido.jpg', '....', 2, 2, '2022-01-18 03:20:06', '2022-01-25 00:09:50'),
(2, 2, 'Maltrato de Animais Domésticos', 'Fauna', 'O cachorro foi atropelado pelo vizinho que saiu sem prestar socorro.', 'Pessoa Física', 'José', 'Aposentado', 'doguinhoatropelado.png', '', 1, 1, '2022-01-25 00:05:25', NULL),
(3, 1, 'Maltrato de Animais Domésticos blá blá', 'Fauna', 'blá blá blá', 'Pessoa Física', 'blá', 'blá', 'coelho.png', '', 1, 1, '2022-02-03 00:30:23', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_descricoes_status_denuncias`
--

CREATE TABLE `sts_descricoes_status_denuncias` (
  `id` int(11) NOT NULL,
  `descricao` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_descricoes_status_denuncias`
--

INSERT INTO `sts_descricoes_status_denuncias` (`id`, `descricao`, `created`, `modified`) VALUES
(1, 'Uma nova denúncia foi criada', '2021-10-04 05:29:16', NULL),
(2, 'Os fiscais estão averiguando os fatos para comprovar a veracidade das informações da denúncia', '2021-10-04 05:29:16', NULL),
(3, 'O responsável foi notificado para regularizar a situação e reparar o dano causado', '2021-10-04 05:29:16', '2021-10-04 05:29:16'),
(4, 'Já que a situação não foi resolvida após a notificação, foi aberto um processo contra o responsável', '2021-10-04 05:29:16', '2021-10-04 05:29:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_grups_pags`
--

CREATE TABLE `sts_grups_pags` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_grups_pags`
--

INSERT INTO `sts_grups_pags` (`id`, `nome`, `ordem`, `created`, `modified`) VALUES
(1, 'Listar', 1, '2021-06-27 05:46:45', NULL),
(2, 'Cadastrar', 2, '2021-08-06 06:39:55', NULL),
(3, 'Editar', 3, '2021-08-06 06:39:55', NULL),
(4, 'Consultar', 4, '2021-08-06 06:39:55', NULL),
(5, 'Outros', 5, '2021-08-06 06:39:55', NULL),
(6, 'Acesso', 6, '2021-08-06 06:39:55', NULL),
(7, 'Pesquisar', 7, '2022-01-05 23:26:13', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_pags`
--

CREATE TABLE `sts_pags` (
  `id` int(11) NOT NULL,
  `controller` varchar(60) NOT NULL,
  `metodo` varchar(80) NOT NULL,
  `nome` varchar(170) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `liberado_bloqueado` int(11) NOT NULL DEFAULT 2,
  `sts_tipo_pag_id` int(11) NOT NULL,
  `sts_sit_pag_id` int(11) NOT NULL DEFAULT 2,
  `sts_grup_pag_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_pags`
--

INSERT INTO `sts_pags` (`id`, `controller`, `metodo`, `nome`, `titulo`, `liberado_bloqueado`, `sts_tipo_pag_id`, `sts_sit_pag_id`, `sts_grup_pag_id`, `created`, `modified`) VALUES
(1, 'Home', 'index', 'Página Principal', 'Página Principal - Ambiente Agora', 1, 1, 1, 5, '2021-06-27 05:25:33', NULL),
(2, 'Login', 'acessoLogin', 'Página de Login', 'Página de Login - Ambiente Agora', 1, 2, 1, 6, '2021-06-27 05:27:19', NULL),
(3, 'Cadastro', 'cadastrarDenunciante', 'Página de Cadastro', 'Página de Cadastro - Ambiente Agora', 1, 3, 1, 2, '2021-06-27 05:29:29', NULL),
(4, 'DenunciaAnonima', 'cadastrarDenunciaAnonima', 'Página de Denúncia Anônima', 'Página de Denúncia Anônima - Ambiente Agora', 1, 4, 1, 2, '2021-06-27 05:30:43', NULL),
(5, 'MinhaConta', 'acessoMinhaConta', 'Página de Acesso à Minha Conta', 'Minha Conta - Ambiente Agora', 1, 5, 1, 6, '2021-06-27 05:32:10', NULL),
(6, 'ListarDenunciasRealizadas', 'listarDenunciasRealizadas', 'Página de Listar Denúncias Realizadas', 'Minha Conta - Ambiente Agora', 1, 5, 1, 4, '2021-06-27 05:34:20', NULL),
(7, 'DenunciaComum', 'cadastrarDenunciaComum', 'Página de Denúncia Comum', 'Minha Conta - Ambiente Agora', 1, 5, 1, 2, '2021-06-27 05:36:04', NULL),
(8, 'ConsultarDadosCadastrais', 'consultarDadosCadastrais', 'Página de Consultar Dados Cadastrais', 'Minha Conta - Ambiente Agora', 1, 5, 1, 4, '2021-06-27 05:37:18', NULL),
(9, 'Login', 'logout', 'Página de Logout', 'Página de Logout - Ambiente Agora', 1, 2, 1, 6, '2021-06-27 05:37:18', NULL),
(10, 'EsqueceuSenha', 'esqueceuSenha', 'Página de Esqueceu Senha', 'Página de Esqueceu Senha - Ambiente Agora', 1, 5, 1, 5, '2021-06-27 05:39:43', NULL),
(11, 'AlterarDadosCadastrais', 'alterarDadosCadastrais', 'Página de Alterar Dados Cadastrais', 'Minha Conta - Ambiente Agora', 1, 5, 1, 3, '2021-06-27 05:39:43', NULL),
(12, 'ConsultarDadosDenuncia', 'consultarDadosDenuncia', 'Página de Consultar Dados da Denúncia Realizada', 'Minha Conta - Ambiente Agora ', 1, 5, 1, 4, '2021-06-27 05:42:16', NULL),
(13, 'AtualSenha', 'atualSenha', 'Página para Atualizar a Senha', 'Página para Atualizar a Senha - Ambiente Agora', 1, 5, 1, 5, '2021-06-27 05:42:16', NULL),
(14, 'ConfirmarEmail', 'confirmarEmail', 'Página de Confirmar E-mail', 'Página de Confirmar E-mail - Ambiente Agora', 1, 3, 1, 5, '2021-08-06 07:08:16', NULL),
(15, 'ConsultarAvaliacaoDenuncia', 'consultarAvaliacaoDenuncia', 'Página de Consultar Avaliação da Denúncia', 'Página de Consultar Avaliação da Denúncia - Ambiente Agora', 1, 5, 1, 4, '2021-09-25 03:57:56', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_perms_aces`
--

CREATE TABLE `sts_perms_aces` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_perms_aces`
--

INSERT INTO `sts_perms_aces` (`id`, `nome`, `ordem`, `created`, `modified`) VALUES
(1, 'Usuário', 1, '2021-06-27 05:11:55', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_sits_pags`
--

CREATE TABLE `sts_sits_pags` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_sits_pags`
--

INSERT INTO `sts_sits_pags` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2021-06-27 05:07:02', NULL),
(2, 'Inativo', '2021-06-27 05:07:02', NULL),
(3, 'Análise', '2021-06-27 05:07:19', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_sits_usuarios`
--

CREATE TABLE `sts_sits_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(170) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_sits_usuarios`
--

INSERT INTO `sts_sits_usuarios` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2021-06-27 05:05:00', NULL),
(2, 'Inativo', '2021-06-27 05:05:00', NULL),
(3, 'Aguardando Confirmação', '2021-06-27 05:05:29', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_status_denuncias`
--

CREATE TABLE `sts_status_denuncias` (
  `id` int(11) NOT NULL,
  `nome` varchar(170) NOT NULL,
  `adms_cor_id` int(11) NOT NULL,
  `sts_status_descricao_denun_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_status_denuncias`
--

INSERT INTO `sts_status_denuncias` (`id`, `nome`, `adms_cor_id`, `sts_status_descricao_denun_id`, `created`, `modified`) VALUES
(1, 'Aberto', 4, 1, '2021-09-02 16:25:38', NULL),
(2, 'Andamento', 3, 2, '2021-09-02 16:25:38', NULL),
(3, 'Finalizado com Notificação', 1, 3, '2021-09-02 16:25:38', NULL),
(4, 'Finalizado com Processo', 5, 4, '2021-09-27 03:00:55', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_tipos_pags`
--

CREATE TABLE `sts_tipos_pags` (
  `id` int(11) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `nome` varchar(170) NOT NULL,
  `observacao` varchar(220) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_tipos_pags`
--

INSERT INTO `sts_tipos_pags` (`id`, `tipo`, `nome`, `observacao`, `created`, `modified`) VALUES
(1, 'sts', 'Página Principal / Index', 'Página responsável por permitir que o usuário seja encaminhado para a página de login e de cadastro.', '2021-06-27 05:00:26', NULL),
(2, 'sts', 'Minha Conta', 'Página responsável por permitir que o usuário realize: cadastro, login e denúncia anônima.', '2021-06-27 05:01:45', NULL),
(3, 'sts', 'Cadastro de Usuário', 'Página responsável por permitir que o usuário realize o cadastro no sistema.', '2021-06-27 05:02:22', NULL),
(4, 'sts', 'Denúncia Anônima', 'Página responsável por permitir que o usuário realize uma denúncia anônima no sistema.', '2021-06-27 05:02:44', NULL),
(5, 'sts', 'Login / Acesso', 'Página responsável por permitir que o usuário realize o login no sistema.', '2021-06-27 05:03:15', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_usuarios`
--

CREATE TABLE `sts_usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(60) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `nome` varchar(170) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `logradouro` varchar(80) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `recuperar_senha` varchar(70) DEFAULT NULL,
  `confirmar_email` varchar(70) DEFAULT NULL,
  `chave_descadastro` varchar(70) DEFAULT NULL,
  `sts_perm_ace_id` int(11) NOT NULL DEFAULT 1,
  `sts_sit_usuario_id` int(11) NOT NULL,
  `sts_grup_pag_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_usuarios`
--

INSERT INTO `sts_usuarios` (`id`, `login`, `senha`, `nome`, `email`, `cpf`, `logradouro`, `bairro`, `recuperar_senha`, `confirmar_email`, `chave_descadastro`, `sts_perm_ace_id`, `sts_sit_usuario_id`, `sts_grup_pag_id`, `created`, `modified`) VALUES
(1, 'jessicaalvesferreira24@gmail.com', '$2y$10$WlDMZ8PkdyW6tPT5ZVIlTOgELIXigxx7rFuwbanNNXk8wLoE/kBcO', 'Jéssica Alves Ferreira', 'jessicaalvesferreira24@gmail.com', '818.361.890-10', 'Rua Joaquim', 'Santa Luzia', NULL, NULL, NULL, 1, 1, 6, '2022-01-18 03:13:05', '2022-01-18 03:13:17'),
(2, 'cleon', '$2y$10$yvw55yJgzEqhCN3/CR.8Ius9TE.yvkAphL..B12loToApYZRwiwMG', 'Cleon Xavier', 'cleon.junior@ifgoiano.edu.br', '571.353.120-15', 'Rua', 'Bairro', NULL, NULL, NULL, 1, 1, 6, '2022-01-24 23:59:34', '2022-01-25 00:03:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adms_cads_usuarios`
--
ALTER TABLE `adms_cads_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adms_niv_acesso_id_fk` (`adms_nivel_acesso_id`) USING BTREE,
  ADD KEY `adms_si_usuario_id_fk` (`adms_sit_usuario_id`) USING BTREE;

--
-- Índices para tabela `adms_confirmar_email`
--
ALTER TABLE `adms_confirmar_email`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_cors`
--
ALTER TABLE `adms_cors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_grups_pags`
--
ALTER TABLE `adms_grups_pags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_menus`
--
ALTER TABLE `adms_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adms_sit_id_fk` (`adms_sit_id`) USING BTREE;

--
-- Índices para tabela `adms_niveis_acessos`
--
ALTER TABLE `adms_niveis_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_nivs_aces_pags`
--
ALTER TABLE `adms_nivs_aces_pags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adms_menu_id_fk` (`adms_menu_id`),
  ADD KEY `adms_pagina_id_fk` (`adms_pagina_id`),
  ADD KEY `adms_nivel_acess_id_fk` (`adms_nivel_acess_id`) USING BTREE;

--
-- Índices para tabela `adms_pags`
--
ALTER TABLE `adms_pags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adms_tipo_pag_id_fk` (`adms_tipo_pag_id`) USING BTREE,
  ADD KEY `adms_sit_pag_id_fk` (`adms_sit_pag_id`) USING BTREE,
  ADD KEY `adms_grup_pag_id_fk` (`adms_grup_pag_id`) USING BTREE;

--
-- Índices para tabela `adms_sits`
--
ALTER TABLE `adms_sits`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_sits_pags`
--
ALTER TABLE `adms_sits_pags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_sits_usuarios`
--
ALTER TABLE `adms_sits_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adms_cor_id_fk` (`adms_cor_id`);

--
-- Índices para tabela `adms_tipos_pags`
--
ALTER TABLE `adms_tipos_pags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_usuarios`
--
ALTER TABLE `adms_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adms_nivel_acesso_id_fk` (`adms_nivel_acesso_id`),
  ADD KEY `adms_sit_usuario_id_fk` (`adms_sit_usuario_id`) USING BTREE;

--
-- Índices para tabela `sts_cads_usuarios`
--
ALTER TABLE `sts_cads_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sts_per_acesso_id_fk` (`sts_perm_ace_id`),
  ADD KEY `sts_si_usuario_id_fk` (`sts_sit_usuario_id`);

--
-- Índices para tabela `sts_confirmar_email`
--
ALTER TABLE `sts_confirmar_email`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_denuncias_anonimas`
--
ALTER TABLE `sts_denuncias_anonimas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sts_status_denuncia_a_id_fk` (`sts_status_denuncia_id`),
  ADD KEY `sts_status_descricao_id_fk` (`sts_descricao_stat_id`);

--
-- Índices para tabela `sts_denuncias_comuns`
--
ALTER TABLE `sts_denuncias_comuns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sts_usuario_id_fk` (`sts_usuario_id`),
  ADD KEY `sts_status_denuncia_id_fk` (`sts_status_denuncia_id`),
  ADD KEY `sts_descricao_stat_id_fk` (`sts_descricao_stat_id`);

--
-- Índices para tabela `sts_descricoes_status_denuncias`
--
ALTER TABLE `sts_descricoes_status_denuncias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_grups_pags`
--
ALTER TABLE `sts_grups_pags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_pags`
--
ALTER TABLE `sts_pags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sts_tipo_pag_id _fk` (`sts_tipo_pag_id`),
  ADD KEY `sts_sit_pag_id_fk` (`sts_sit_pag_id`),
  ADD KEY `sts_grup_pag_id_fk` (`sts_grup_pag_id`);

--
-- Índices para tabela `sts_perms_aces`
--
ALTER TABLE `sts_perms_aces`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_sits_pags`
--
ALTER TABLE `sts_sits_pags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_sits_usuarios`
--
ALTER TABLE `sts_sits_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_status_denuncias`
--
ALTER TABLE `sts_status_denuncias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adms_cores_id_fk` (`adms_cor_id`),
  ADD KEY `sts_status_descricao_denun_id_fk` (`sts_status_descricao_denun_id`);

--
-- Índices para tabela `sts_tipos_pags`
--
ALTER TABLE `sts_tipos_pags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_usuarios`
--
ALTER TABLE `sts_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sts_perm_ace_id_fk` (`sts_perm_ace_id`),
  ADD KEY `sts_sit_usuario_id_fk` (`sts_sit_usuario_id`),
  ADD KEY `sts_grup_pag_id_fk` (`sts_grup_pag_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adms_cads_usuarios`
--
ALTER TABLE `adms_cads_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `adms_confirmar_email`
--
ALTER TABLE `adms_confirmar_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `adms_cors`
--
ALTER TABLE `adms_cors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `adms_grups_pags`
--
ALTER TABLE `adms_grups_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `adms_menus`
--
ALTER TABLE `adms_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `adms_niveis_acessos`
--
ALTER TABLE `adms_niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `adms_nivs_aces_pags`
--
ALTER TABLE `adms_nivs_aces_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `adms_pags`
--
ALTER TABLE `adms_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `adms_sits`
--
ALTER TABLE `adms_sits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `adms_sits_pags`
--
ALTER TABLE `adms_sits_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `adms_sits_usuarios`
--
ALTER TABLE `adms_sits_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `adms_tipos_pags`
--
ALTER TABLE `adms_tipos_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `adms_usuarios`
--
ALTER TABLE `adms_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sts_cads_usuarios`
--
ALTER TABLE `sts_cads_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sts_confirmar_email`
--
ALTER TABLE `sts_confirmar_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sts_denuncias_anonimas`
--
ALTER TABLE `sts_denuncias_anonimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sts_denuncias_comuns`
--
ALTER TABLE `sts_denuncias_comuns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sts_descricoes_status_denuncias`
--
ALTER TABLE `sts_descricoes_status_denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sts_grups_pags`
--
ALTER TABLE `sts_grups_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `sts_pags`
--
ALTER TABLE `sts_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `sts_perms_aces`
--
ALTER TABLE `sts_perms_aces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sts_sits_pags`
--
ALTER TABLE `sts_sits_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sts_sits_usuarios`
--
ALTER TABLE `sts_sits_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sts_status_denuncias`
--
ALTER TABLE `sts_status_denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sts_tipos_pags`
--
ALTER TABLE `sts_tipos_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sts_usuarios`
--
ALTER TABLE `sts_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `adms_cads_usuarios`
--
ALTER TABLE `adms_cads_usuarios`
  ADD CONSTRAINT `adms_niv_acesso_id_fk` FOREIGN KEY (`adms_nivel_acesso_id`) REFERENCES `adms_niveis_acessos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adms_si_usuario_id_fk` FOREIGN KEY (`adms_sit_usuario_id`) REFERENCES `adms_sits_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `adms_menus`
--
ALTER TABLE `adms_menus`
  ADD CONSTRAINT `adms_sit_id_fk` FOREIGN KEY (`adms_sit_id`) REFERENCES `adms_sits` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `adms_nivs_aces_pags`
--
ALTER TABLE `adms_nivs_aces_pags`
  ADD CONSTRAINT `adms_menu_id_fk` FOREIGN KEY (`adms_menu_id`) REFERENCES `adms_menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adms_nivel_acess_id_fk` FOREIGN KEY (`adms_nivel_acess_id`) REFERENCES `adms_niveis_acessos` (`id`),
  ADD CONSTRAINT `adms_pagina_id_fk` FOREIGN KEY (`adms_pagina_id`) REFERENCES `adms_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `adms_pags`
--
ALTER TABLE `adms_pags`
  ADD CONSTRAINT `adms_grup_pag_id_fk` FOREIGN KEY (`adms_grup_pag_id`) REFERENCES `adms_grups_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adms_sit_pag_id_fk` FOREIGN KEY (`adms_sit_pag_id`) REFERENCES `adms_sits_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adms_tipo_pag_id_fk` FOREIGN KEY (`adms_tipo_pag_id`) REFERENCES `adms_tipos_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `adms_sits_usuarios`
--
ALTER TABLE `adms_sits_usuarios`
  ADD CONSTRAINT `adms_cor_id_fk` FOREIGN KEY (`adms_cor_id`) REFERENCES `adms_cors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `adms_usuarios`
--
ALTER TABLE `adms_usuarios`
  ADD CONSTRAINT `adms_nivel_acesso_id_fk` FOREIGN KEY (`adms_nivel_acesso_id`) REFERENCES `adms_niveis_acessos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adms_sit_usuario_id_fk` FOREIGN KEY (`adms_sit_usuario_id`) REFERENCES `adms_sits_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_cads_usuarios`
--
ALTER TABLE `sts_cads_usuarios`
  ADD CONSTRAINT `sts_per_acesso_id_fk` FOREIGN KEY (`sts_perm_ace_id`) REFERENCES `sts_perms_aces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_si_usuario_id_fk` FOREIGN KEY (`sts_sit_usuario_id`) REFERENCES `sts_sits_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_denuncias_anonimas`
--
ALTER TABLE `sts_denuncias_anonimas`
  ADD CONSTRAINT `sts_status_denuncia_a_id_fk` FOREIGN KEY (`sts_status_denuncia_id`) REFERENCES `sts_status_denuncias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_status_descricao_id_fk` FOREIGN KEY (`sts_descricao_stat_id`) REFERENCES `sts_descricoes_status_denuncias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_denuncias_comuns`
--
ALTER TABLE `sts_denuncias_comuns`
  ADD CONSTRAINT `sts_descricao_stat_id_fk` FOREIGN KEY (`sts_descricao_stat_id`) REFERENCES `sts_descricoes_status_denuncias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_status_denuncia_id_fk` FOREIGN KEY (`sts_status_denuncia_id`) REFERENCES `sts_status_denuncias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_usuario_id_fk` FOREIGN KEY (`sts_usuario_id`) REFERENCES `sts_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_pags`
--
ALTER TABLE `sts_pags`
  ADD CONSTRAINT `sts_grup_pag_id_fk` FOREIGN KEY (`sts_grup_pag_id`) REFERENCES `sts_grups_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_sit_pag_id_fk` FOREIGN KEY (`sts_sit_pag_id`) REFERENCES `sts_sits_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_tipo_pag_id _fk` FOREIGN KEY (`sts_tipo_pag_id`) REFERENCES `sts_tipos_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_status_denuncias`
--
ALTER TABLE `sts_status_denuncias`
  ADD CONSTRAINT `adms_cores_id_fk` FOREIGN KEY (`adms_cor_id`) REFERENCES `adms_cors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_status_descricao_denun_id_fk` FOREIGN KEY (`sts_status_descricao_denun_id`) REFERENCES `sts_descricoes_status_denuncias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_usuarios`
--
ALTER TABLE `sts_usuarios`
  ADD CONSTRAINT `sts_grup_pag_id_fk 	` FOREIGN KEY (`sts_grup_pag_id`) REFERENCES `sts_grups_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_perm_ace_id_fk` FOREIGN KEY (`sts_perm_ace_id`) REFERENCES `sts_perms_aces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_sit_usuario_id_fk` FOREIGN KEY (`sts_sit_usuario_id`) REFERENCES `sts_sits_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
