-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2021 às 04:20
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
-- Estrutura da tabela `sts_denuncia_anonima`
--

CREATE TABLE `sts_denuncia_anonima` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `envolvido` varchar(255) NOT NULL,
  `nome_envolvido` varchar(255) NOT NULL,
  `funcao_envolvido` varchar(255) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `imagem` varchar(220) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sts_denuncia_anonima`
--

INSERT INTO `sts_denuncia_anonima` (`id`, `titulo`, `tipo`, `descricao`, `envolvido`, `nome_envolvido`, `funcao_envolvido`, `latitude`, `longitude`, `imagem`, `created`) VALUES
(1, 'Maltrato de Animais', 'Fauna', 'O catzinho foi atropelado pelo meu vizinho que, fugiu sem prestar socorro ao pobre animal.', 'fi', 'Seu Zé', 'Aposentado e Pensionista', '-16.444962', '-51.802281', 'gatoferido.jpg', '2021-06-05 19:53:28'),
(2, 'Poluição Ambiental', 'Poluição e Outros Crimes Ambientais', 'Art. 54. Causar poluição de qualquer natureza em níveis tais que resultem ou possam resultar em danos à saúde humana, ou que provoquem a mortandade de animais ou a destruição significativa da flora: (…)', 'Pessoa Jurídica', 'João', 'Dono do Laticínio Beira Rio', '-16.444962', '-51.802281', 'poluicaoambiental.jpg', '2021-06-12 03:55:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_denuncia_comum`
--

CREATE TABLE `sts_denuncia_comum` (
  `id` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `envolvido` varchar(255) NOT NULL,
  `nome_envolvido` varchar(255) NOT NULL,
  `funcao_envolvido` varchar(255) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `imagem` varchar(220) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sts_denuncia_comum`
--

INSERT INTO `sts_denuncia_comum` (`id`, `id_usuario`, `titulo`, `tipo`, `descricao`, `envolvido`, `nome_envolvido`, `funcao_envolvido`, `latitude`, `longitude`, `imagem`, `status`, `created`) VALUES
(1, 1, 'Maltrato de Animais', 'Fauna', 'O dogzinho foi atropelado pelo meu vizinho que, fugiu sem prestar socorro ao pobre animal.', 'Pessoa Física', 'João', 'Aposentado', '-16.444962', '-51.802281', 'doguinhoatropelado.png', NULL, '2021-06-06 04:11:05'),
(2, 1, 'Maltrato de Animais', 'Fauna', 'O catzinho foi atropelado pelo meu vizinho que, fugiu sem prestar socorro ao pobre animal.', 'Pessoa Física', 'Josefino', 'Aposentado e Pensionista', '-16.444962', '-51.802281', 'gatoferido.jpg', NULL, '2021-06-06 04:12:37'),
(3, 4, 'Poluição Ambiental', 'Poluição e Outros Crimes Ambientais', 'Art. 54. Causar poluição de qualquer natureza em níveis tais que resultem ou possam resultar em danos à saúde humana, ou que provoquem a mortandade de animais ou a destruição significativa da flora: (…)', 'Pessoa Jurídica', 'João', 'Dono do Laticínio Beira Rio ', '-16.444962', '-51.802281', 'poluicaoambiental.jpg', NULL, '2021-06-12 03:38:15'),
(4, 4, 'Poluição Ambiental', 'Poluição e Outros Crimes Ambientais', 'poluição', 'Pessoa Jurídica', 'João', 'Dono do Laticínio Beira Rio', '-16.444962', '-51.802281', 'poluicaoambiental.jpg', NULL, '2021-06-12 03:59:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_grupo_pagina`
--

CREATE TABLE `sts_grupo_pagina` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sts_grupo_pagina`
--

INSERT INTO `sts_grupo_pagina` (`id`, `nome`, `ordem`, `created`, `modified`) VALUES
(1, 'Listar', 1, '2020-04-19 17:00:00', '2020-04-19 17:00:00'),
(2, 'Cadastrar', 2, '2020-04-19 17:00:00', NULL),
(3, 'Editar', 3, '2020-04-19 17:00:00', NULL),
(4, 'Apagar', 4, '2020-04-19 17:00:00', NULL),
(5, 'Visualizar', 5, '2020-04-19 17:00:00', NULL),
(6, 'Outros', 6, '2020-04-19 17:00:00', NULL),
(7, 'Acesso', 7, '2020-04-19 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_pagina`
--

CREATE TABLE `sts_pagina` (
  `id` bigint(20) NOT NULL,
  `controller` varchar(220) NOT NULL,
  `metodo` varchar(220) NOT NULL,
  `nome_pagina` varchar(220) NOT NULL,
  `titulo_pagina` varchar(220) NOT NULL,
  `liberado_bloqueado` int(11) NOT NULL DEFAULT 2,
  `id_tipo_pagina` bigint(20) NOT NULL,
  `id_situacao_pagina` bigint(20) NOT NULL DEFAULT 2,
  `id_grupo_pagina` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sts_pagina`
--

INSERT INTO `sts_pagina` (`id`, `controller`, `metodo`, `nome_pagina`, `titulo_pagina`, `liberado_bloqueado`, `id_tipo_pagina`, `id_situacao_pagina`, `id_grupo_pagina`, `created`, `modified`) VALUES
(1, 'Home', 'index', 'Página Inicial', 'Página Inicial - Ambiente Agora', 1, 1, 1, NULL, '2020-04-19 17:00:00', NULL),
(2, 'Login', 'acessoLogin', 'Página de Login', 'Página de Login - Ambiente Agora', 1, 2, 1, NULL, '2020-04-19 17:00:00', NULL),
(3, 'Cadastro', 'cadastrarUsuario', 'Página de Cadastro', 'Página de Cadastro - Ambiente Agora', 1, 3, 1, NULL, '2020-04-19 17:00:00', '2020-04-19 17:00:00'),
(4, 'DenunciaAnonima', 'cadastrarDenunciaAnonima', 'Página de Denúncia Anônima', 'Página de Denúncia Anônima - Ambiente Agora', 1, 4, 1, NULL, '2020-04-19 17:00:00', '2020-04-19 17:00:00'),
(5, 'MinhaConta', 'acessoMinhaConta', 'Página de Acesso à Minha Conta', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2020-04-19 17:00:00', '2020-04-19 17:00:00'),
(6, 'DenunciasRealizadas', 'visualizarDenunciasRealizadas', 'Página de Denúncias Realizadas', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2020-04-19 17:00:00', '2020-04-19 17:00:00'),
(7, 'DenunciaComum', 'cadastrarDenunciaComum', 'Página de Denúncia Comum', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2020-04-19 17:00:00', '2020-04-19 17:00:00'),
(8, 'VisualizarDadosCadastrais', 'visualizarDadosCadastrais', 'Página de Dados Cadastrais', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2020-04-19 17:00:00', '2020-04-19 17:00:00'),
(9, 'Login', 'logout', 'Página de Logout', 'Página de Logout - Ambiente Agora', 1, 2, 1, NULL, '2020-04-19 17:00:00', NULL),
(10, 'EsqueceuSenha', 'esqueceuSenha', 'Página de Esqueceu Senha', 'Página de Esqueceu Senha - Ambiente Agora', 1, 5, 1, 7, '2020-06-03 19:13:00', NULL),
(11, 'AlterarDadosCadastrais', 'alterarDadosCadastrais', 'Página de Alterar Dados Cadastrais', 'Página de Alterar Dados Cadastrais - Ambiente Agora', 1, 5, 1, NULL, '2020-11-07 00:20:00', NULL),
(12, 'VisualizarDadosDenuncia', 'visualizarDadosDenuncia', 'Página de Visualizar Dados da Denúncia Realizada', 'Minha Conta - Ambiente Agora', 1, 5, 1, NULL, '2021-05-17 02:02:50', '2021-05-17 02:02:50'),
(13, 'AtualSenha', 'atualSenha', 'Página para atualizar a senha', 'Atualizar Senha', 1, 5, 1, 7, '2021-06-10 00:13:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_permissao_acesso`
--

CREATE TABLE `sts_permissao_acesso` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sts_permissao_acesso`
--

INSERT INTO `sts_permissao_acesso` (`id`, `nome`, `ordem`, `created`, `modified`) VALUES
(1, 'Usuario', 1, '2020-03-09 15:00:00', NULL),
(2, 'Administrador', 2, '2021-05-13 22:05:56', '2021-05-13 22:05:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_situacao_pagina`
--

CREATE TABLE `sts_situacao_pagina` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sts_situacao_pagina`
--

INSERT INTO `sts_situacao_pagina` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '0000-00-00 00:00:00', NULL),
(2, 'Inativo', '0000-00-00 00:00:00', NULL),
(3, 'Analise', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_situacao_usuario`
--

CREATE TABLE `sts_situacao_usuario` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sts_situacao_usuario`
--

INSERT INTO `sts_situacao_usuario` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2020-03-09 15:30:00', NULL),
(2, 'Inativo', '2020-03-09 15:30:00', NULL),
(3, 'Aguardando confirmacao', '2020-03-09 15:30:00', NULL),
(4, 'Spam', '2020-03-09 15:30:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_tipo_pagina`
--

CREATE TABLE `sts_tipo_pagina` (
  `id` bigint(20) NOT NULL,
  `tipo` varchar(120) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `observacao` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sts_tipo_pagina`
--

INSERT INTO `sts_tipo_pagina` (`id`, `tipo`, `nome`, `observacao`, `created`, `modified`) VALUES
(1, 'sts', 'Página Principal / Index', 'Página responsável por permitir que o usuário seja encaminhado para a página de login e de cadastro.', '2020-03-08 22:45:00', NULL),
(2, 'sts', 'Minha Conta', 'Página responsável por permitir que o usuário realize: cadastro, login e denúncia anônima.', '2020-03-08 22:48:00', NULL),
(3, 'sts', 'Cadastro de Usuário', 'Página responsável por permitir que o usuário realize o cadastro no sistema.', '2020-03-08 22:48:00', NULL),
(4, 'sts', 'Denúncia Anônima', 'Página responsável por permitir que o usuário realize uma denúncia anônima no sistema.', '2020-03-08 22:48:00', NULL),
(5, 'sts', 'Login / Acesso', 'Página responsável por permitir que o usuário realize o login no sistema.', '2020-03-08 22:48:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_usuario`
--

CREATE TABLE `sts_usuario` (
  `id` bigint(20) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `logradouro` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `recuperar_senha` varchar(220) DEFAULT NULL,
  `confirmar_email` varchar(120) DEFAULT NULL,
  `id_permissao_acesso` bigint(20) DEFAULT 1,
  `chave_descadastro` varchar(220) DEFAULT NULL,
  `id_situacao` bigint(20) DEFAULT NULL,
  `id_grupo_pagina` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sts_usuario`
--

INSERT INTO `sts_usuario` (`id`, `login`, `senha`, `nome`, `email`, `telefone`, `logradouro`, `bairro`, `recuperar_senha`, `confirmar_email`, `id_permissao_acesso`, `chave_descadastro`, `id_situacao`, `id_grupo_pagina`, `created`, `modified`) VALUES
(1, 'jessicaalvesferreira24@gmail.com', '$2y$10$MQgp73R5/6BzJ2lb5d7iN.TJIbmg76jBrdEO.k75vNpuQMFAPboX2', 'Jéssica Alves Ferreira', 'jessicaalvesferreira24@gmail.com', '(64) 99962-3376', 'Rua Joaquim Eloy Leite', 'Santa Luzia', '79b9ae0e0279dac94d75dc30f036655a', '2', 1, NULL, 2, NULL, '2021-06-03 21:30:56', '2021-06-11 01:46:28'),
(2, 'jessicaalves24@hotmail.com', '$2y$10$WZsPmHatKLuOvj3tmdHDSe1glNPbm4fGd4lObe3PZbrR5Tc39lNdG', 'Jéssica Alves Ferreira', 'jessicaalves24@hotmail.com', '(64) 99999-9999', 'Rua da Solidão', 'Santa Maria', NULL, '2', 1, NULL, 2, NULL, '2021-06-12 02:05:52', '2021-06-12 02:05:52'),
(3, 'francisco1996@gmail.com', '$2y$10$1SrhLSF5J9BNAp976smDTOiEur5F9RPaq0Bf9QAXXD.qko6..baCi', 'Francisco', 'francisco1996@gmail.com', '(64) 99999-9999', 'Rua da Solidão', 'Santa Maria', NULL, '2', 1, NULL, 2, NULL, '2021-06-12 03:27:49', '2021-06-12 03:49:16'),
(4, 'nobphs@gmail.com', '$2y$10$jXXCx.x1i350AN/oqS2Gj.C.q.OgOSey5bX7gEBXReCZxaiLxKIxC', 'Nobilar Alves Moreira', 'nobphs@gmail.com', '(64) 99999-9999', 'Rua da Solidão', 'Santa Maria', NULL, '2', 1, NULL, 2, NULL, '2021-06-12 03:33:12', '2021-06-12 03:33:12'),
(5, 'nayane1993@hotmail.com', '$2y$10$zn4NFx6wjMhKoITjF7ivHuhAsiOQQkZliulfUzB88OX0iByfg69He', 'Nayane Alves Ferreira', 'nayane1993@hotmail.com', '(64) 99999-9999', 'Rua da Solidão', 'Santa Maria', NULL, '2', 1, NULL, 2, NULL, '2021-06-12 04:06:04', '2021-06-12 04:10:32');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sts_denuncia_anonima`
--
ALTER TABLE `sts_denuncia_anonima`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_denuncia_comum`
--
ALTER TABLE `sts_denuncia_comum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario_fk` (`id_usuario`) USING BTREE;

--
-- Índices para tabela `sts_grupo_pagina`
--
ALTER TABLE `sts_grupo_pagina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_pagina`
--
ALTER TABLE `sts_pagina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_situacao_pagina_fk` (`id_situacao_pagina`),
  ADD KEY `id_tipo_pagina_fk` (`id_tipo_pagina`),
  ADD KEY `id_grp_pagina_fk` (`id_grupo_pagina`) USING BTREE;

--
-- Índices para tabela `sts_permissao_acesso`
--
ALTER TABLE `sts_permissao_acesso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_situacao_pagina`
--
ALTER TABLE `sts_situacao_pagina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_situacao_usuario`
--
ALTER TABLE `sts_situacao_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_tipo_pagina`
--
ALTER TABLE `sts_tipo_pagina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sts_usuario`
--
ALTER TABLE `sts_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_permissao_acesso_fk` (`id_permissao_acesso`),
  ADD KEY `id_situacao_fk` (`id_situacao`),
  ADD KEY `id_grupo_pagina_fk` (`id_grupo_pagina`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sts_denuncia_anonima`
--
ALTER TABLE `sts_denuncia_anonima`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sts_denuncia_comum`
--
ALTER TABLE `sts_denuncia_comum`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sts_grupo_pagina`
--
ALTER TABLE `sts_grupo_pagina`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `sts_pagina`
--
ALTER TABLE `sts_pagina`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `sts_permissao_acesso`
--
ALTER TABLE `sts_permissao_acesso`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sts_situacao_pagina`
--
ALTER TABLE `sts_situacao_pagina`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sts_situacao_usuario`
--
ALTER TABLE `sts_situacao_usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sts_tipo_pagina`
--
ALTER TABLE `sts_tipo_pagina`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sts_usuario`
--
ALTER TABLE `sts_usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sts_denuncia_comum`
--
ALTER TABLE `sts_denuncia_comum`
  ADD CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `sts_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_pagina`
--
ALTER TABLE `sts_pagina`
  ADD CONSTRAINT `id_grp_pagina_fk` FOREIGN KEY (`id_grupo_pagina`) REFERENCES `sts_grupo_pagina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_situacao_pagina_fk` FOREIGN KEY (`id_situacao_pagina`) REFERENCES `sts_situacao_pagina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tipo_pagina_fk` FOREIGN KEY (`id_tipo_pagina`) REFERENCES `sts_tipo_pagina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_usuario`
--
ALTER TABLE `sts_usuario`
  ADD CONSTRAINT `id_grupo_pagina_fk` FOREIGN KEY (`id_grupo_pagina`) REFERENCES `sts_grupo_pagina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_permissao_acesso_fk` FOREIGN KEY (`id_permissao_acesso`) REFERENCES `sts_permissao_acesso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_situacao_fk` FOREIGN KEY (`id_situacao`) REFERENCES `sts_situacao_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
