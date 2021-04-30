  	<!-- CONTEUDO -->
  	<div class="conteudo-lg">
  		<div class="container padding5">
  			<!-- Caixa de texto -->
				<div class="text-box">
		  				<div class="holderelementotexto">
				  			<div class="folder-header">
                  <ul id="arvore-paginas">
                    <nav>
                      <template v-if="lonelyPage">
                        <arvore-item
                          class="item"
                          :item="treeData"
                          :folder="folder"
                          @make-folder="makeFolder"
                          @add-item="addItem"
                        ></arvore-item>
                      </template>
                    </nav>
                  </ul>
				  			</div>
                <div class="folder-content">
                  <template>
                    <div class="titulo spacebetween">
                      <div class="row"> 
                        <div id="loading">

                        </div>
                        <div id="nome_pagina">
                          <div>
                            {{ data.name }}
                            <span v-if="data.descricao">{{ " - " + data.descricao }}</span>
                          </div>
                        </div> 
                      </div>
                      <div class="editor row">
                          <div id="share"> 
                            
                          </div>
                          <?php if($permissoes): ?>
                            <a :href="editor_href" v-if="editor_href" target="_blank">
                              <i class="fa fa-edit"></i>
                            </a>
                          <?php endif; ?>
                      </div>
                    </div>
                    <div class="holderform-searchtable">
                        <div id="search" class="form-searchtable" v-if="has_busca">
                          <input type="hidden" id="dataUp" v-model="dataUp">
                          <input type="hidden" id="dataTo" v-model="dataTo">
                          <div class="holderinput-searchtable" v-if="busca.pesquisar">
                              <input type="text" placeholder=" Pesquisar " v-model="search">
                          </div>
                          <div class="holderinput-searchtable" v-if="categoria">
                              <select v-model="datacategoria">
                                <option value="" selected> Categoria </option>
                                <option :value="el" v-for="el in categoria">{{el}}</option>
                              </select>
                          </div>
                          <div class="holderinput-searchtable" v-if="cidade">
                              <select v-model="datacidade">
                                <option value="" selected> Cidade </option>
                                <option :value="el" v-for="el in cidade">{{el}}</option>
                              </select>
                          </div>
                          <div class="holderinput-searchtable" v-if="busca.datarange">
                              <input type="text" class="calendario-up inputPesquisar" placeholder=" Data de ">
                          </div>
                          <div class="holderinput-searchtable" v-if="busca.datarange">
                              <input type="text" class="calendario-to inputPesquisar" placeholder=" Data até "> 
                          </div>
                          <div class="holderinput-searchtable" v-if="yy">
                              <select v-model="datayy">
                                <option value="" selected> Ano </option>
                                <option :value="el" v-for="el in yy">{{el}}</option>
                              </select>
                          </div>
                          <div class="holderinput-searchtable" v-if="mm">
                              <select v-model="datamm">
                                <option value="" selected> Mês </option>
                                <option :value="el" v-for="el in mm">{{el}}</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="html">
                      <nav>
                        <html-item
                          :controller="this"
                          :item="data"
                          :search="search"
                          :data-up="dataUp"
                          :data-to="dataTo"
                          :datamm="datamm"
                          :datayy="datayy"
                          :categoria="datacategoria"
                          :cidade="datacidade"
                          :sort-orders="dataSortOrders"
                          ></html-item>
                      </nav>
                    </div>   
                  </template>               
                </div>
			  	</div>
				</div>
  		</div>
      <div class="container holderRoll">
        <div class="roll">
          <i class="fa fa-chevron-up up"></i>
        </div>
      </div>
  	</div>
  	<!--/CONTEUDO -->
