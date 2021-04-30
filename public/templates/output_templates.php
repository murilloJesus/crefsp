
<!-- VIZUALIZADORES -->

    <!-- TEXTO -->
    <template id="show-texto-template">
        <div class="left">
            {{formatado}}
        </div>
    </template>

	<!-- IMAGEM -->
    <template id="show-imagem-template">
        <div class="center">
        	<img :src="controller.source">
        </div>
    </template>

    <template id="show-name-imagem-template">
        <div class="left">
            <input type="hidden" v-model="id">
                <a :id="hash" v-if="source" href="#" data-toggle="popover" :data-img=source
            title="Imagem">{{ name }}</a>
                <p v-else>{{name}}</p>
        </div>
    </template>


    <!-- PAGINA -->
    <template id="show-name-pagina-template">
        <div class="left">
            <input type="hidden" v-model="id">
            <a :id="hash" :href="source" target="_blank">{{ name }}</a>
        </div>
    </template>

    <!-- CIDADE -->
    <template id="show-name-cidade-template">
        <div class="left">
            <input type="hidden" v-model="id">
            {{ name }}
        </div>
    </template>

    <!-- CATEGORIA -->
    <template id="show-name-categoria-template">
        <div class="left">
            <input type="hidden" v-model="id">
            {{ name }}
        </div>
    </template>

    <!-- EVENTO -->
    <template id="show-name-evento-template">
        <div class="left">
            <input type="hidden" v-model="id">
            {{ name }}
        </div>
    </template>

    <!-- PERMISSOES -->
    <template id="show-name-permissao-template">
        <div class="left">
            <input type="hidden" v-model="id">
            {{ name }}
        </div>
    </template>

    <!-- DATA -->
    <template id="show-data-template">
        <div class="left">
            {{output}}
        </div>
    </template>

    <!-- DATA -->
    <template id="show-server-data-template">
        <div class="left">
            {{output}}
        </div>
    </template>


    <!-- GALERIA -->
    <template id="output-galeria-template">
        <div class="row">
          <input type="hidden" v-model="id">
          <div class="col-md-4" v-for="(el, index) in amostra">
            <a :href="el.source" target="_blank"><img :src="el.source" class="img-thumbnail"></a>
          </div>
        </div>
    </template>

    <!-- VIDEO -->
    <template id="show-video-template">
        <div class="center">
            <iframe allowfullscreen="allowfullscreen" :src="video" frameborder="0"></iframe>
        </div>
    </template>

    <template id="output-agenda-inscricao-template">
        <div class="row">
            <input type="hidden" v-model="controller.inscricao_id" />
            <div :class="campo.size"  v-for="campo in layout">
                <b>{{campo.name}}</b>
                <p>{{campo.value}}</p>
            </div>
        </div>
    </template>

    <template id="output-formulario-template">
        <div class="row">
            <input type="hidden" v-model="controller.id" />
            <template v-for="campo in layout">
                <div :class="campo.size" v-if="campo.name != 'pdf' && campo.name != 'jpeg' && campo.name != 'audio' && campo.name != 'video'">
                    <b>{{campo.name}}</b>
                    <p>{{campo.value}}</p>
                </div>
                <div class="col-md-12" v-else>  
                    <p><b>{{campo.name}}</b></p>
                    <a :href="campo.source" target="_blank">{{campo.value}}</p>
                </div>
            </template>
        </div>
    </template>

