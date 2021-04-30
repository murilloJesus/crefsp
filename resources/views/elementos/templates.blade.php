@extends('elementos.menu')

@section('templates')

@csrf()					

<?php include "public/templates/input_templates.php"  ?>
<?php include "public/templates/input_selectors_templates.php"  ?>

<?php include "public/templates/output_templates.php"  ?>

<?php include "public/templates/form_templates.php"  ?>
<?php include "public/templates/form_pagina_templates.php"  ?>
<?php include "public/templates/form_filho_templates.php"  ?>
<?php include "public/templates/form_link_templates.php"  ?>
<?php include "public/templates/form_search_templates.php"  ?>
<?php include "public/templates/form_upload_templates.php"  ?>

<?php include "public/templates/gerenciador_templates.php"  ?>
<?php include "public/templates/gerenciador_filhos_templates.php"  ?>
<?php include "public/templates/gerenciador_pagina_templates.php"  ?>

<?php include "public/templates/datapresent_templates.php"  ?>

@stop