-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2021 às 03:31
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
-- Estrutura da tabela `sts_denuncias_anonimas`
--

CREATE TABLE `sts_denuncias_anonimas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `envolvido` varchar(220) NOT NULL,
  `nome_envolvido` varchar(220) NOT NULL,
  `funcao_envolvido` varchar(220) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `imagem` varchar(220) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_denuncias_anonimas`
--

INSERT INTO `sts_denuncias_anonimas` (`id`, `titulo`, `tipo`, `descricao`, `envolvido`, `nome_envolvido`, `funcao_envolvido`, `latitude`, `longitude`, `imagem`, `created`) VALUES
(1, 'Maltrato de Animais', 'Fauna', 'O catzinho foi atropelado pelo meu vizinho que, fugiu sem prestar socorro ao pobre animal.', 'Pessoa Física', 'Seu Zé', 'Aposentado e Pensionista', '-16.444962', '-51.802281', 'gatoferido.jpg', '2021-06-28 19:09:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_denuncias_comuns`
--

CREATE TABLE `sts_denuncias_comuns` (
  `id` int(11) NOT NULL,
  `sts_usuario_id` int(11) NOT NULL,
  `titulo` varchar(220) NOT NULL,
  `tipo` varchar(220) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `envolvido` varchar(220) NOT NULL,
  `nome_envolvido` varchar(220) NOT NULL,
  `funcao_envolvido` varchar(220) NOT NULL,
  `latitude` varchar(40) NOT NULL,
  `longitude` varchar(40) NOT NULL,
  `imagem` varchar(220) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_denuncias_comuns`
--

INSERT INTO `sts_denuncias_comuns` (`id`, `sts_usuario_id`, `titulo`, `tipo`, `descricao`, `envolvido`, `nome_envolvido`, `funcao_envolvido`, `latitude`, `longitude`, `imagem`, `status`, `created`) VALUES
(1, 1, 'Maltrato de Animais', 'Fauna', 'O catzinho foi atropelado pelo meu vizinho que, fugiu sem prestar socorro ao pobre animal.', 'Pessoa Física', 'Seu Zé', 'Aposentado', '-16.444962', '-51.802281', 'gatoferido.jpg', NULL, '2021-06-28 19:15:13'),
(2, 1, 'Maltrato de Animais', 'Fauna', 'O dogzinho foi atropelado pelo meu vizinho que, fugiu sem prestar socorro ao pobre animal.', 'Pessoa Física', 'Josefino', 'Aposentado e Pensionista', '-16.444962', '-51.802281', 'doguinhoatropelado.png', NULL, '2021-06-28 21:03:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_grups_pags`
--

CREATE TABLE `sts_grups_pags` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_grups_pags`
--

INSERT INTO `sts_grups_pags` (`id`, `nome`, `ordem`, `created`, `modified`) VALUES
(1, 'Acesso', 1, '2021-06-27 05:46:45', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_pags`
--

CREATE TABLE `sts_pags` (
  `id` int(11) NOT NULL,
  `controller` varchar(220) NOT NULL,
  `metodo` varchar(220) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `titulo` varchar(220) NOT NULL,
  `liberado_bloqueado` int(11) NOT NULL DEFAULT 2,
  `sts_tipo_pag_id` int(11) NOT NULL,
  `sts_sit_pag_id` int(11) NOT NULL DEFAULT 2,
  `sts_grup_pag_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_pags`
--

INSERT INTO `sts_pags` (`id`, `controller`, `metodo`, `nome`, `titulo`, `liberado_bloqueado`, `sts_tipo_pag_id`, `sts_sit_pag_id`, `sts_grup_pag_id`, `created`, `modified`) VALUES
(1, 'Home', 'index', 'Página Principal', 'Página Principal - Ambiente Agora', 1, 1, 1, NULL, '2021-06-27 05:25:33', NULL),
(2, 'Login', 'acessoLogin', 'Página de Login', 'Página de Login - Ambiente Agora', 1, 2, 1, NULL, '2021-06-27 05:27:19', NULL),
(3, 'Cadastro', 'cadastrarUsuario', 'Página de Cadastro', 'Página de Cadastro - Ambiente Agora', 1, 3, 1, NULL, '2021-06-27 05:29:29', NULL),
(4, 'DenunciaAnonima', 'cadastrarDenunciaAnonima', 'Página de Denúncia Anônima', 'Página de Denúncia Anônima - Ambiente Agora', 1, 4, 1, NULL, '2021-06-27 05:30:43', NULL),
(5, 'MinhaConta', 'acessoMinhaConta', 'Página de Acesso à Minha Conta', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2021-06-27 05:32:10', NULL),
(6, 'DenunciasRealizadas', 'visualizarDenunciasRealizadas', 'Página de Denúncias Realizadas', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2021-06-27 05:34:20', NULL),
(7, 'DenunciaComum', 'cadastrarDenunciaComum', 'Página de Denúncia Comum', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2021-06-27 05:36:04', NULL),
(8, 'VisualizarDadosCadastrais', 'visualizarDadosCadastrais', 'Página de Dados Cadastrais', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2021-06-27 05:37:18', NULL),
(9, 'Login', 'logout', 'Página de Logout', 'Página de Logout - Ambiente Agora', 1, 2, 1, NULL, '2021-06-27 05:37:18', NULL),
(10, 'EsqueceuSenha', 'esqueceuSenha', 'Página de Esqueceu Senha', 'Página de Esqueceu Senha - Ambiente Agora', 1, 5, 1, NULL, '2021-06-27 05:39:43', NULL),
(11, 'AlterarDadosCadastrais', 'alterarDadosCadastrais', 'Página de Alterar Dados Cadastrais', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2021-06-27 05:39:43', NULL),
(12, 'VisualizarDadosDenuncia', 'visualizarDadosDenuncia', 'Página de Visualizar Dados da Denúncia Realizada', 'Minha Conta - Ambiente Agora ', 1, 5, 1, NULL, '2021-06-27 05:42:16', NULL),
(13, 'AtualSenha', 'atualSenha', 'Página para Atualizar a Senha', 'Página para Atualizar a Senha - Ambiente Agora', 1, 5, 1, NULL, '2021-06-27 05:42:16', NULL);

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
(1, 'Usuario', 1, '2021-06-27 05:11:55', NULL);

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
(3, 'Analise', '2021-06-27 05:07:19', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_sits_usuarios`
--

CREATE TABLE `sts_sits_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_sits_usuarios`
--

INSERT INTO `sts_sits_usuarios` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2021-06-27 05:05:00', NULL),
(2, 'Inativo', '2021-06-27 05:05:00', NULL),
(3, 'Aguardando Confirmacao', '2021-06-27 05:05:29', NULL),
(4, 'Spam', '2021-06-27 05:05:29', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_tipos_pags`
--

CREATE TABLE `sts_tipos_pags` (
  `id` int(11) NOT NULL,
  `tipo` varchar(120) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `observacao` text NOT NULL,
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
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `logradouro` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `recuperar_senha` varchar(220) DEFAULT NULL,
  `confirmar_email` varchar(120) DEFAULT NULL,
  `chave_descadastro` varchar(220) DEFAULT NULL,
  `sts_perm_ace_id` int(11) NOT NULL DEFAULT 1,
  `sts_sit_usuario_id` int(11) DEFAULT NULL,
  `sts_grup_pag_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sts_usuarios`
--

INSERT INTO `sts_usuarios` (`id`, `login`, `senha`, `nome`, `email`, `telefone`, `logradouro`, `bairro`, `recuperar_senha`, `confirmar_email`, `chave_descadastro`, `sts_perm_ace_id`, `sts_sit_usuario_id`, `sts_grup_pag_id`, `created`, `modified`) VALUES
(1, 'jessicaalvesferreira24@gmail.com', '$2y$10$ovw1wB31LEbx6J9TeGKnZOG8vqW7qmKEzc4qwSsWqhbCFswszFGQy', 'Jéssica Alves Ferreira', 'jessicaalvesferreira24@gmail.com', '(64) 99962-3376', 'Rua da Solidão', 'Santa Maria', NULL, '2', NULL, 1, NULL, NULL, '2021-06-28 18:50:11', '2021-06-28 20:09:52');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sts_denuncias_anonimas`
--
ALTER TABLE `sts_denuncias_anonimas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_denuncias_comuns`
--
ALTER TABLE `sts_denuncias_comuns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sts_usuario_id_fk` (`sts_usuario_id`);

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
-- AUTO_INCREMENT de tabela `sts_denuncias_anonimas`
--
ALTER TABLE `sts_denuncias_anonimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sts_denuncias_comuns`
--
ALTER TABLE `sts_denuncias_comuns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sts_grups_pags`
--
ALTER TABLE `sts_grups_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sts_pags`
--
ALTER TABLE `sts_pags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sts_denuncias_comuns`
--
ALTER TABLE `sts_denuncias_comuns`
  ADD CONSTRAINT `sts_usuario_id_fk` FOREIGN KEY (`sts_usuario_id`) REFERENCES `sts_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_pags`
--
ALTER TABLE `sts_pags`
  ADD CONSTRAINT `sts_grup_pag_id_fk` FOREIGN KEY (`sts_grup_pag_id`) REFERENCES `sts_grups_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_sit_pag_id_fk` FOREIGN KEY (`sts_sit_pag_id`) REFERENCES `sts_sits_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sts_tipo_pag_id _fk` FOREIGN KEY (`sts_tipo_pag_id`) REFERENCES `sts_tipos_pags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
