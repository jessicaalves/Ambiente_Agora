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

    public function renderizarHome() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoHome.php';
            include 'app/sts/Views/include/menu/menuHome.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeHome.php';
        } else {
            echo "Erro ao carregar a página Principal: {$this->nome}!";
        }
    }

    public function renderizarCadastro() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoCadastro.php';
            include 'app/sts/Views/include/menu/menuComum.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeCadastro.php';
        } else {
            echo "Erro ao carregar a página de Cadastro: {$this->nome}!";
        }
    }

    public function renderizarLogin() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoLogin.php';
            include 'app/sts/Views/include/menu/menuLogin.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeComum.php';
        } else {
            echo "Erro ao carregar a página de Login: {$this->nome}!";
        }
    }

    public function renderizarAtualSenha() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoAtualizarSenha.php';
            include 'app/sts/Views/include/menu/menuComum.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeComum.php';
        } else {
            echo "Erro ao carregar a página de Atualizar Senha: {$this->nome}!";
        }
    }
    
    public function renderizarEsqueceuSenha() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoEsqueceuSenha.php';
            include 'app/sts/Views/include/menu/menuComum.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeComum.php';
        } else {
            echo "Erro ao carregar a página de Esqueceu Senha: {$this->nome}!";
        }
    }

    public function renderizarDenunciaAnonima() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoDenunciaAnonima.php';
            include 'app/sts/Views/include/menu/menuComum.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeComum.php';
        } else {
            echo "Erro ao carregar a página de Denúncia Anônima: {$this->nome}!";
        }
    }

    public function renderizarMinhaConta() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoMinhaConta.php';
            include 'app/sts/Views/include/menu/menuMinhaConta.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Minha Conta: {$this->nome}!";
        }
    }

    public function renderizarDenunciaComum() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoDenunciaComum.php';
            include 'app/sts/Views/include/menu/menuDenunciaComum.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Nova Denúncia Comum: {$this->nome}!";
        }
    }

    public function renderizarListarDenunciasRealizadas() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoListarDenunciasRealizadas.php';
            include 'app/sts/Views/include/menu/menuListarDenunciasRealizadas.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Listar Denúncias Realizadas: {$this->nome}!";
        }
    }

    public function renderizarDadosCadastrais() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoVisualizarDadosCadastrais.php';
            include 'app/sts/Views/include/menu/menuDadosCadastrais.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Dados Cadastrais: {$this->nome}!";
        }
    }

    public function renderizarAlterarDadosCadastrais() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoAlterarDadosCadastrais.php';
            include 'app/sts/Views/include/menu/menuDadosCadastrais.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeMinhaConta.php';
        }else{
            echo "Erro ao carregar a página de Alterar Dados Cadastrais: {$this->nome}!";
        }
    }

    public function renderizarDadosDenuncia() {
       if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/sts/Views/include/cabecalho/cabecalhoVisualizarDadosDenuncia.php';
            include 'app/sts/Views/include/menu/menuListarDenunciasRealizadas.php';
            include 'app/' . $this->nome . '.php';
            include 'app/sts/Views/include/rodape/rodapeMinhaConta.php';
        } else {
            echo "Erro ao carregar a página de Denúncias Realizadas: {$this->nome}!";
        }
    }

}
