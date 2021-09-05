<div class="d-flex">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li><a href="<?php echo URL . 'user/minha-conta/acesso-minha-conta'; ?>"> Minha Conta</a></li>   
            <li><a href="<?php echo URL . 'user/denuncia-comum/cadastrar-denuncia-comum'; ?>"> Nova Denúncia</a></li>

            <li>
                <a href="#submenu1" data-toggle="collapse"> Denúncias Realizadas
                </a>

                <ul class="list-unstyled collapse" id="submenu1">
                    <li class="active"><a href="<?php echo URL . 'user/listar-denuncias-realizadas/listar-denuncias-realizadas'; ?>"> <i class="fas fa-seedling text-warning"></i> Listar Denúncias</a></li>  
                </ul>
            </li>

            <li>
                <a href="#submenu2" data-toggle="collapse"> Dados Cadastrais
                </a>

                <ul class="list-unstyled collapse" id="submenu2">
                    <li><a href="<?php echo URL . 'user/visualizar-dados-cadastrais/visualizar-dados-cadastrais'; ?>"> <i class="fas fa-seedling text-warning"></i> Visualizar Dados</a></li>  
                    <li><a href="<?php echo URL . 'user/alterar-dados-cadastrais/alterar-dados-cadastrais'; ?>"> <i class="fas fa-seedling text-warning"></i> Alterar Dados</a></li>  
                </ul>
            </li>

            <li><a href="<?php echo URL . 'user/login/logout'; ?>"> Sair</a></li>
        </ul>
    </nav>

    <section id="" class="p-4 alinhamento"> <!-- Início Seção Nova Denúncia Comum -->
        <div class="container">

            <a href="<?php echo URL . 'user/listar-denuncias-realizadas/listar-denuncias-realizadas'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-outline-success btn-sm">
                        Listar
                    </button>
                </div>
            </a>

            <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>VISUALIZAR DADOS DA DENÚNCIA</b></h5>
            <fieldset class="the-fieldset">
                <div class="row">
                    <div class="col-md-12">
                        <div class="borda-sup">
                            <h6 class="ml-2 pt-1">Dados da Denúncia</h6>
                        </div>

                        <form class="p-2" class="form" method="POST" id="formDenunciaComum" enctype="multipart/form-data"> <!-- Final Formulário Visualizar Dados da Denúncia Comum -->

                            <h5 class="p-2 margem-titulo borda-conteudo" id="">Dados Cadastrais - Denúncia</h5><p><p>

                                <?php
                                if (!empty($this->dados['dados_denuncia'][0])) {
                                    //var_dump($this->dados ['dados_denuncia'][0]);
                                    extract($this->dados ['dados_denuncia'][0]);
                                    ?>

                                <div class="form-group row alinhamento c-tipo-resp">
                                    <label for="Status" class="col-sm-2 col-form-label tamanho-font alin-tip">Status&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control tamanho-font bg-white" name="status" type="text" id="status" placeholder="<?php echo $nome_status; ?>"
                                               value="<?php
                                               if (isset($valorForm['sts_status_denuncia_id'])) {
                                                   echo $valorForm['sts_status_denuncia_id'];
                                               }
                                               ?>"
                                               readonly>
                                    </div>
                                </div>

                                <div class="form-group row alinhamento c-titulo-resp"> 
                                    <label for="Titulo" class="col-sm-2 col-form-label tamanho-font alin-tit">Título&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control tamanho-font bg-white" name="titulo" type="text" id="titulo" placeholder="<?php echo $titulo; ?>"
                                               value="<?php
                                               if (isset($valorForm['titulo'])) {
                                                   echo $valorForm['titulo'];
                                               }
                                               ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row alinhamento c-tipo-resp">
                                    <label for="Tipo" class="col-sm-2 col-form-label tamanho-font alin-tip">Tipo&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8">
                                        <select class="form-control tamanho-font-tipo bg-white" name="tipo" type="select" id="Tipo"
                                                value="<?php
                                                if (isset($valorForm['tipo'])) {
                                                    echo $valorForm['tipo'];
                                                }
                                                ?>">
                                            <option selected><?php echo $tipo; ?></option>
                                            <!--                                            <option value="Fauna">Fauna</option>
                                                                                        <option value="Flora">Flora</option>
                                                                                        <option value="Poluição e Outros Crimes Ambientais">Poluição e Outros Crimes Ambientais</option>
                                                                                        <option value="Ordenamento Urbano e Patrimônio Cultural">Ordenamento Urbano e Patrimônio Cultural</option>
                                                                                        <option value="Administração Ambiental">Administração Ambiental</option>-->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row alinhamento c-descricao-resp"> 
                                    <label for="Descricao" class="col-sm-2 col-form-label tamanho-font alinhar">Descrição&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8">
                                        <textarea readonly class="form-control tamanho-font tamanho-descricao bg-white" name="descricao" type="text" id="descricao" placeholder="<?php echo $descricao; ?>"><?php
                                            if (isset($valorForm['descricao'])) {
                                                echo $valorForm['descricao'];
                                            }
                                            ?></textarea>
                                    </div>
                                </div>   

                                <div class="form-group row alinhamento c-envolvido-resp">
                                    <label for="Envolvido" class="col-sm-2 col-form-label tamanho-font alinhar">Envolvido&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8">
                                        <select class="form-control tamanho-font-tipo tamanho bg-white" name="envolvido" type="select" id="Envolvido"
                                                value="<?php
                                                if (isset($valorForm['envolvido'])) {
                                                    echo $valorForm['envolvido'];
                                                }
                                                ?>">
                                            <option selected><?php echo $envolvido; ?></option>
                                            <!--                                            <option value="Pessoa Física">Pessoa Física</option>
                                                                                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>-->
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group row alinhamento c-infrator-resp"> 
                                    <label for="NomeEnvolvido" class="col-sm-2 col-form-label tamanho-font al-nome-funcao alin-nom">Nome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control tamanho-font bg-white" name="nomeEnvolvido" type="text" id="nomeEnvolvido" placeholder="<?php echo $nome_envolvido; ?>"
                                               value="<?php
                                               if (isset($valorForm['nomeEnvolvido'])) {
                                                   echo $valorForm['nomeEnvolvido'];
                                               }
                                               ?>" readonly>
                                    </div>
                                </div> 

                                <div class="form-group row alinhamento c-funcao-infrator-resp"> 
                                    <label for="FuncaoEnvolvido" class="col-sm-2 col-form-label tamanho-font al-nome-funcao alin-fun">Função&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control tamanho-font bg-white" name="funcaoEnvolvido" type="text" id="funcaoEnvolvido" placeholder="<?php echo $funcao_envolvido; ?>"
                                               value="<?php
                                               if (isset($valorForm['funcaoEnvolvido'])) {
                                                   echo $valorForm['funcaoEnvolvido'];
                                               }
                                               ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group row alinhamento c-geolocalizacao-resp"> 
                                    <label for="Geolocalizacao" class="col-sm-2 col-form-label tamanho-font label-local">Geolocalização&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8 ml-2 mt-1 alin-geo">
                                        <!---<button type="button" class="btn btn-success b-local" onclick="getLocation()">Gerar Coordenadas</button>!--->
                                        <!---<p></p>!--->

                                        <input type="checkbox" id="coordenadas" class="tamanho-font" checked="checked" onclick="return false;">
                                        <label for="coordenadas" class="tamanho-font font-weight-normal">Gerar Coordenadas</label>


                                        <div id="demo"></div>
                                        <div id="mapholder"></div>
                                        <script src="https://maps.google.com/maps/api/js?key=YOUR_API"></script>
                                        <script>
                                            var x = document.getElementById("demo");

                                            function getLocation() {
                                                if (navigator.geolocation) {
                                                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                                                } else {
                                                    x.innerHTML = "Seu browser não suporta Geolocalização!";
                                                }
                                            }

                                            function showPosition(position) {
                                                var lat = position.coords.latitude;
                                                var lon = position.coords.longitude;
                                                var latlon = new google.maps.LatLng(lat, lon);
                                                var mapholder = document.getElementById('mapholder');
                                                mapholder.style.height = '250px';
                                                mapholder.style.width = '100%';

                                                var myOptions = {
                                                    center: latlon, zoom: 14,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                                    mapTypeControl: false,
                                                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL}
                                                };
                                                var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);

                                                var infoWindow = new google.maps.InfoWindow;
                                                var infowincontent = document.createElement('div');
                                                var strong = document.createElement('strong');
                                                strong.textContent = ('Coordenadas Geográficas');
                                                infowincontent.appendChild(strong);
                                                infowincontent.appendChild(document.createElement('br'));

                                                var strong = document.createElement('strong');
                                                strong.textContent = ('Latitude: ');
                                                infowincontent.appendChild(strong);
                                                var text = document.createElement('text');
                                                text.textContent = lat;
                                                infowincontent.appendChild(text);
                                                infowincontent.appendChild(document.createElement('br'));

                                                var strong = document.createElement('strong');
                                                strong.textContent = ('Longitude: ');
                                                infowincontent.appendChild(strong);
                                                var text = document.createElement('text');
                                                text.textContent = lon;
                                                infowincontent.appendChild(text);

                                                var marker = new google.maps.Marker({
                                                    position: latlon,
                                                    map: map,
                                                    title: 'Clique aqui para ver as coordenadas geográficas!'
                                                });
                                                marker.addListener('click', function () {
                                                    infoWindow.setContent(infowincontent);
                                                    infoWindow.open(map, marker);
                                                });

                                                //                                        x.innerHTML = "Latitude: " + lat +
                                                //                                                "<br>Longitude: " + lon;

                                            }

                                            function showError(error)
                                            {
                                                switch (error.code)
                                                {
                                                    case error.PERMISSION_DENIED:
                                                        x.innerHTML = "<div class='alert alert-danger'>Erro: O usuário rejeitou a solicitação de Geolocalização!</div>";
                                                        break;
                                                    case error.POSITION_UNAVAILABLE:
                                                        x.innerHTML = "<div class='alert alert-danger'>Erro: Localização indisponível!</div>";
                                                        break;
                                                    case error.TIMEOUT:
                                                        x.innerHTML = "<div class='alert alert-danger'>Erro: A requisição expirou!</div>";
                                                        break;
                                                    case error.UNKNOWN_ERROR:
                                                        x.innerHTML = "<div class='alert alert-danger'>Erro: Algum erro desconhecido aconteceu!!</div>";
                                                        break;
                                                }
                                            }
                                        </script>
                                    </div>
                                </div> 


                                <div class="form-group row alinhamento c-infrator-resp"> 
                                    <label for="latitude" class="col-sm-2 col-form-label tamanho-font al-nome-funcao alin-lat">Latitude&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8 alin-lat">
                                        <input class="form-control tamanho-font bg-white" name="latitude" type="text" id="latitude" placeholder="<?php echo $latitude; ?>"
                                               value="<?php
                                               if (isset($valorForm['latitude'])) {
                                                   echo $valorForm['latitude'];
                                               }
                                               ?>" readonly>
                                    </div>
                                </div> 

                                <div class="form-group row alinhamento c-funcao-infrator-resp"> 
                                    <label for="longitude" class="col-sm-2 col-form-label tamanho-font al-nome-funcao alin-lon">Longitude&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8 alin-lon">
                                        <input class="form-control tamanho-font bg-white" name="longitude" type="text" id="longitude" placeholder="<?php echo $longitude; ?>"
                                               value="<?php
                                               if (isset($valorForm['longitude'])) {
                                                   echo $valorForm['longitude'];
                                               }
                                               ?>" readonly>
                                    </div>
                                </div>



                                <div class="form-group row alinhamento c-anexos-resp">
                                    <label for="imagem" class="col-sm-2 col-form-label tamanho-font alin-img">Imagem&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label>
                                    <div class="col-sm-8 borda-imagem alin-img">
                                        <input class="tamanho-font padd-inserir-imagem" name="imagem" type="file" id="imagem" onchange="previewImagem();" onclick="return false;" >  


                                        <div class="col-sm-8 padd-img img-alinhamento">


                                            <?php
                                            if (!empty($imagem)) {
                                                echo "<img src='" . URL . "user/assets/img/uploadImagens/denunciaComum/" . $id . "/" . $imagem . "' witdh='135' height='135'>";
                                            } else {
                                                echo "<img src='" . URL . "user/assets/img/uploadImagens/preview_img.png" . "' witdh='135' height='135'>";
                                            }
                                            ?>

                    <!--                                            <img src="" alt="Imagem da Denúncia" id="preview-img" class="img-thumbnail" style="width:135px; height:135px;">-->
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>

                            </div>

                            <!--<div class="pt-3 botao-denunciar b-denunciar"><button name="cadastrarDenunciaComum" type="submit" value="Denunciar" class="btn btn-outline-success alin-de">Denunciar</button></div>-->

                        </form> <!-- Final Formulário Visualizar Dados da Denúncia Comum -->

                    </div>
                </div>
            </fieldset>
        </div>
    </section><!-- Final Seção Nova Denúncia Comum -->
</div>





