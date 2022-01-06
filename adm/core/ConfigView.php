<?php

/* @author jessica */

namespace Core;

class ConfigView {

    private $nome;
    private $dados;

    public function __construct($nome, array $dados = null) {
        $this->nome = (string) $nome;
        $this->dados = $dados;
    }

    public function renderizarLogin() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoLogin.php';
            include 'app/adms/Views/include/menu/menuLogin.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeComum.php';
        } else {
            echo "Erro ao carregar a página de Login: {$this->nome}!";
        }
    }

    public function renderizarCadastro() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoCadastro.php';
            include 'app/adms/Views/include/menu/menuComum.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeCadastro.php';
        } else {
            echo "Erro ao carregar a página de Cadastro: {$this->nome}!";
        }
    }

    public function renderizarEsqueceuSenha() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoEsqueceuSenha.php';
            include 'app/adms/Views/include/menu/menuComum.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeComum.php';
        } else {
            echo "Erro ao carregar a página de Esqueceu Senha: {$this->nome}!";
        }
    }

    public function renderizarAtualSenha() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoAtualizarSenha.php';
            include 'app/adms/Views/include/menu/menuComum.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeComum.php';
        } else {
            echo "Erro ao carregar a página de Atualizar Senha: {$this->nome}!";
        }
    }

    public function renderizarMinhaConta() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoMinhaConta.php';
            include 'app/adms/Views/include/menu/menuMinhaConta.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Minha Conta: {$this->nome}!";
        }
    }

    public function renderizarListarUsuarios() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoListarUsuarios.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Listar Usuários: {$this->nome}!";
        }
    }

    public function renderizarConsultarUsuario() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoConsultarUsuario.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Consultar Usuário: {$this->nome}!";
        }
    }

    public function renderizarAlterarUsuario() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoAlterarUsuario.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Visualizar Usuário: {$this->nome}!";
        }
    }

    public function renderizarConsultarDadosCadastrais() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoConsultarDadosCadastrais.php';
            include 'app/adms/Views/include/menu/menuDadosCadastrais.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Consultar Dados Cadastrais: {$this->nome}!";
        }
    }

    public function renderizarAlterarDadosCadastrais() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoAlterarDadosCadastrais.php';
            include 'app/adms/Views/include/menu/menuDadosCadastrais.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Alterar Dados Cadastrais: {$this->nome}!";
        }
    }

    public function renderizarCadastrarUsuario() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoCadastrarUsuario.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Cadastrar Usuário: {$this->nome}!";
        }
    }

    public function renderizarListarNiveisAcesso() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoListarNiveisAcesso.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeNivelAcesso.php';
        } else {
            echo "Erro ao carregar a página de Listar Níveis de Acesso: {$this->nome}!";
        }
    }

    public function renderizarCadastrarNivelAcesso() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoCadastrarNiveisAcesso.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Cadastrar Nível de Acesso: {$this->nome}!";
        }
    }

    public function renderizarConsultarNivelAcesso() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoConsultarNiveisAcesso.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Consultar Nível de Acesso: {$this->nome}!";
        }
    }

    public function renderizarAlterarNivelAcesso() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoAlterarNiveisAcesso.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Alterar Nível de Acesso: {$this->nome}!";
        }
    }

    public function renderizarListarDenunciasComuns() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoListarDenuncias.php';
            include 'app/adms/Views/include/menu/menuDenunciasRealizadas.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Listar Denúncias: {$this->nome}!";
        }
    }

    public function renderizarConsultarDenuncia() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoConsultarDenuncia.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Consultar Denúncia: {$this->nome}!";
        }
    }

    public function renderizarAvaliarDenuncia() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoAvaliarDenuncia.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Avaliar Denúncia: {$this->nome}!";
        }
    }

    public function renderizarListarDenunciasAnonimas() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoListarDenunciasAnonimas.php';
            include 'app/adms/Views/include/menu/menuDenunciasRealizadas.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Listar Denúncias Anônimas: {$this->nome}!";
        }
    }

    public function renderizarConsultarDenunciaAnonima() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoConsultarDenunciaAnonima.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Consultar Denúncia Anônima: {$this->nome}!";
        }
    }

    public function renderizarAvaliarDenunciaAnonima() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoAvaliarDenunciaAnonima.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Avaliar Denúncia Anônima: {$this->nome}!";
        }
    }

    public function renderizarPesquisarUsuarios() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/adms/Views/include/cabecalho/cabecalhoListarUsuarios.php';
            include 'app/adms/Views/include/menu/menuListarUsuarios.php';
            include 'app/adms/Views/include/sidebar/sidebarAcessoMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/adms/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Pesquisar Usuários: {$this->nome}!";
        }
    }

}
