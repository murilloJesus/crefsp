<!doctype html>
<html lang="en">
	<head>
		<?php require "elementos/head.php" ?>
	</head>
  	<body>
		<?php require "elementos/mobile.php" ?>

		<?php require "elementos/header.php" ?>

		<?php require "elementos/menu.php" ?>

		<?php
			$patch = array( 
						array("link" => "index.php", "nome" => "Home" ),
						array("link" => "eventos.php", "nome" => "Eventos" )
						);

			$page = isset($_GET['pag']) ? $_GET['pag'] : 'evento';
		?>
		<?php require "elementos/breadcrumbs.php" ?>

		<?php require "paginas/evento/$page.php" ?>

		<?php require "elementos/footer.php" ?>

		<?php require "elementos/foot.php" ?>

	    <script type="text/x-template" id="tree-template">
			  <li>
			    <div
			      :class="{bold: isFolder}"
			      @dblclick="makeFolder" 
			      @click="toggle">
			      <i v-if="isFolder" :class=" isOpen ? 'fa fa-chevron-right' : 'fa fa-chevron-down' "></i>
			      <a :href="item.source">{{ item.name }}</a>
			    </div>
			    <ul v-show="isOpen" v-if="isFolder">
			      <tree-item
			        class="item"
			        v-for="(child, index) in item.children"
			        :key="index"
			        :item="child"
			      ></tree-item>
			    </ul>
			  </li>
		</script>
	    <script type="text/javascript">
			// demo data
			var treeData = {
				name : 'Ciclo CREF4/SP do Conhecimento',
				root: true,
				children:[	
				{
				  name: 'Palestrantes',
				  source: '#',
				  children:[
						  {
						  name: ' Profª. Ms. Érica Verderi',
						  source: '#',
						  children:[]
						},
						{
						  name: 'Prof. Esp. Márcio Tonelli Bernardes',
						  source: '#',
						  children:[]
						},
						{
						  name: 'Prof. Dr. Ademir Testa Junior',
						  source: '#',
						  children:[]
						},
						{
						  name: 'Prof. Esp. Henrique Stelzer Nogueira',
						  source: '#',
						  children:[]
						},
						{
						  name: 'Prof. Dr. Mauro Antonio Guiselini',
						  source: '#',
						  children:[]
						},
						{
						  name: 'Prof. Ms. João Antônio Nunes',
						  source: '#',
						  children:[]
						},
						{
						  name: 'Prof. Me. Ednei Fernando dos Santos',
						  source: '#',
						  children:[]
						},
						{
						  name: 'Prof. Esp. Vladimir Juliano de Godoi',
						  source: '#',
						  children:[]
						},
						{
						  name: 'Profª Sílvia Helena Pavanato Bacci Martins',
						  source: '#',
						  children:[]
						}
					]
				},
				{
				  name: 'Programação',
				  source: 'evento.php?pag=programacao',
				  children:[]
				},
				{
				  name: 'Pré-inscrição',
				  source: 'agenda.php',
				  children:[]
				},
				{
				  name: 'Palestras Realizadas',
				  source: '#',
				  children:[
						  {
						  name: '2019',
						  source: '#',
						  children:[]
						},
						{
						  name: '2018',
						  source: '#',
						  children:[]
						},
						{
						  name: '2017',
						  source: '#',
						  children:[]
						},
						{
						  name: '2016',
						  source: '#',
						  children:[]
						},
					]
				},
				{
				  name: 'Notícias',
				  source: 'noticias.php',
				  children:[]
				}
				]
			}

			// define the tree-item component
			Vue.component('tree-item', {
			  template: '#tree-template',
			  props: {
			    item: Object
			  },
			  data: function () {
			    return {
			      isOpen: this.item.root,
			    }
			  },
			  computed: {
			    isFolder: function () {
			      return this.item.children &&
			        this.item.children.length
			    }
			  },
			  methods: {
			    toggle: function () {
			      if (this.isFolder) {
			        this.isOpen = !this.isOpen
			      }
			    },
			    makeFolder: function () {
			      if (!this.isFolder) {
			        this.isOpen = true;
			      }
			    }
			  }
			})

			// boot up the demo
			var demo = new Vue({
			  el: '#arvore-paginas',
			  data: {
			    treeData: treeData
			  },
			  methods: {
			  	makeFolder: function (item) {
			    	Vue.set(item, 'children', [])
			      this.addItem(item)
			    },
			    addItem: function (item) {
			    	item.children.push({
			        name: 'new stuff'
			      })
			    }
			  }
			})
	    </script>
      </body>
</html>