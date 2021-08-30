
<section id="" class="p-4"> <!-- Início Seção Nova Denúncia Anônima -->
    <div class="container">
        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>CRIAR UMA NOVA DENÚNCIA ANÔNIMA</b></h5>
        <fieldset class="the-fieldset">
            <div class="row">
                <div class="col-md-12">
                    <div class="borda-sup">
                        <h6 class="ml-2 pt-1">Dados da Denúncia</h6>
                    </div>

                    <form class="p-2" class="form" method="POST" id="formDenunciaAnonima" enctype="multipart/form-data"> <!-- Início Formulário Nova Denúncia Anônima -->

                        <h5 class="p-2 margem-titulo borda-conteudo" id="">Dados Cadastrais - Denúncia Anônima</h5><p><p>

                            <?php
                            //var_dump (isset($this->dados['form']));
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            if (isset($this->dados['form'])) {
                                $valorForm = $this->dados['form'];
                            }
                            ?>

                        <div class="form-group row alinhamento c-titulo-resp"> 
                            <label for="Titulo" class="col-sm-2 col-form-label tamanho-font alin-tit">Título&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="titulo" type="text" id="titulo" placeholder="Digite o título da denúncia"
                                       value="<?php
                                       if (isset($valorForm['titulo'])) {
                                           echo $valorForm['titulo'];
                                       }
                                       ?>">
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
                                    <option selected>Selecione o tipo da denúncia</option>
                                    <option value="Fauna">Fauna</option>
                                    <option value="Flora">Flora</option>
                                    <option value="Poluição e Outros Crimes Ambientais">Poluição e Outros Crimes Ambientais</option>
                                    <option value="Ordenamento Urbano e Patrimônio Cultural">Ordenamento Urbano e Patrimônio Cultural</option>
                                    <option value="Administração Ambiental">Administração Ambiental</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row alinhamento c-descricao-resp"> 
                            <label for="Descricao" class="col-sm-2 col-form-label tamanho-font alinhar">Descrição&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <textarea class="form-control tamanho-font tamanho-descricao" name="descricao" type="text" id="descricao" placeholder="Faça uma descrição do assunto a ser falado"><?php
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
                                    <option selected>Selecione o envolvido</option>
                                    <option value="Pessoa Física">Pessoa Física</option>
                                    <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                                </select>
                            </div>
                        </div> 

                        <div class="form-group row alinhamento c-infrator-resp"> 
                            <label for="NomeEnvolvido" class="col-sm-2 col-form-label tamanho-font al-nome-funcao">Nome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="nomeEnvolvido" type="text" id="nomeEnvolvido" placeholder="Digite o nome do envolvido"
                                       value="<?php
                                       if (isset($valorForm['nomeEnvolvido'])) {
                                           echo $valorForm['nomeEnvolvido'];
                                       }
                                       ?>">
                            </div>
                        </div> 

                        <div class="form-group row alinhamento c-funcao-infrator-resp"> 
                            <label for="FuncaoEnvolvido" class="col-sm-2 col-form-label tamanho-font al-nome-funcao">Função&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="funcaoEnvolvido" type="text" id="funcaoEnvolvido" placeholder="Digite a função do envolvido"
                                       value="<?php
                                       if (isset($valorForm['funcaoEnvolvido'])) {
                                           echo $valorForm['funcaoEnvolvido'];
                                       }
                                       ?>">
                            </div>
                        </div>


                        <div class="form-group row alinhamento c-geolocalizacao-resp"> 
                            <label for="Geolocalizacao" class="col-sm-2 col-form-label tamanho-font label-local">Geolocalização&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8 ml-2 mt-1 alin-geo">
                                <!---<button type="button" class="btn btn-success b-local" onclick="getLocation()">Gerar Coordenadas</button>!--->
                                <!---<p></p>!--->
                                
                                <input type="checkbox" id="coordenadas" class="tamanho-font" onclick="getLocation()" required>
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
                                <input class="form-control tamanho-font" name="latitude" type="text" id="latitude" placeholder="Digite a latitude"
                                       value="<?php
                                       if (isset($valorForm['latitude'])) {
                                           echo $valorForm['latitude'];
                                       }
                                       ?>">
                            </div>
                        </div> 

                        <div class="form-group row alinhamento c-funcao-infrator-resp"> 
                            <label for="longitude" class="col-sm-2 col-form-label tamanho-font al-nome-funcao alin-lon">Longitude&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8 alin-lon">
                                <input class="form-control tamanho-font" name="longitude" type="text" id="longitude" placeholder="Digite a longitude"
                                       value="<?php
                                       if (isset($valorForm['longitude'])) {
                                           echo $valorForm['longitude'];
                                       }
                                       ?>">
                            </div>
                        </div>



                        <div class="form-group row alinhamento c-anexos-resp">
                            <label for="imagem" class="col-sm-2 col-form-label tamanho-font alin-img">Imagem&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label>
                            <div class="col-sm-8 borda-imagem alin-img">
                                <input class="tamanho-font padd-inserir-imagem" name="imagem" type="file" id="imagem" onchange="previewImagem();" required>  


                                <div class="col-sm-8 padd-img img-alinhamento">
                                    <?php
                                    /* if (isset($valorForm['imagem']) AND ! empty($valorForm['imagem'])) {
                                      $imagem_antiga = URL . 'user/assets/img/uploadImagens/';
                                      } else {
                                      $imagem_antiga = URL . 'user/assets/img/uploadImagens/preview_img.png';
                                      } */

                                    $imagem_antiga = URL . 'user/assets/img/uploadImagens/preview_img.png';
                                    ?>
                                    <img src="<?php echo $imagem_antiga; ?>" alt="Imagem da Denúncia" id="preview-img" class="img-thumbnail" style="width:135px; height:135px;">
                                </div>
                            </div>
                        </div>
                        <div class="pt-3 botao-denunciar b-denunciar"><button name="cadastrarDenunciaAnonima" type="submit" value="Denunciar" class="btn btn-outline-success alin-de btn-sm">Denunciar</button></div>

                    </form> <!-- Final Formulário Nova Denúncia Anônima -->
                </div>
            </div>
        </fieldset>
    </div>
</section>

