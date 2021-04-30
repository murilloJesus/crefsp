<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Cidade;

class FaculdadeController extends Controller
{
    public function dump()
    {   
        $faculdades = $this->data();
        foreach ($faculdades as $faculdade) {

            $faculdade['pagina_id'] = 540;
            $faculdade['cidade'] = $this->cidade($faculdade['cidade'])->id;
            $faculdade['endereco'] = $faculdade['endereco'] . " - " . $faculdade['bairro'] . ", " . $faculdade['cep'];
            unset($faculdade['bairro']);
            unset($faculdade['cep']);

            Item::create($faculdade);
        }

        return ['status' => '200'];
    }

    private function cidade($name)
    {
        return Cidade::where('name', $name)->get('id')->first();
    }

    private function data()
    {
        return [
                    [
                        "cidade" => "Adamantina",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITÁRIO DE ADAMANTINA - UNIFAI",
                        "endereco" => "Rua Nove de Julho, 730",
                        "bairro" => "Centro",
                        "cep" => "17800-000",
                        "site" => "www.fai.com.br",
                        "telefone" => "(18) 3502-7010"
                    ],
                    [
                        "cidade" => "Americana",
                        "type" => "editorial",
                        "name" => "FACULDADE DE AMERICANA - FAM",
                        "endereco" => "Av Joaquim Boer, 733",
                        "bairro" => "Jd. Luciene",
                        "cep" => "13477-360",
                        "site" => "www.fam.br",
                        "telefone" => "(19) 3465-8100"
                    ],
                    [
                        "cidade" => "Amparo",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. AMPARENSE - UNIFIA/UNISEPE",
                        "endereco" => "Rodovia João Beira SP 95 - Km 46,5",
                        "bairro" => "Modelo",
                        "cep" => "13905-529",
                        "site" => "www.unifia.edu.br",
                        "telefone" => "(19) 3907-9870"
                    ],
                    [
                        "cidade" => "Andradina",
                        "type" => "editorial",
                        "name" => "FAC. INT. STELLA MARIS DE ANDRADINA - FISMA ",
                        "endereco" => "R. Amazonas, 571",
                        "bairro" => "Stella Maris",
                        "cep" => "16901-160",
                        "site" => "www.fea.br",
                        "telefone" => "(18) 3702-3702 / 99694-5369"
                    ],
                    [
                        "cidade" => "Araçatuba",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV.CAT. SALES. AUXILIUM - UNISALESIANO ARAÇATUBA",
                        "endereco" => "Rodovia Teotônio Vilela nº 3.821",
                        "bairro" => "Jardim Alvorada",
                        "cep" => "16016-500 ",
                        "site" => "www.unisalesiano.edu.br",
                        "telefone" => "(18) 3636-5252"
                    ],
                    [
                        "cidade" => "Araçatuba",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO TOLEDO - UNITOLEDO",
                        "endereco" => "R. Antônio Afonso de Toledo, 595",
                        "bairro" => "Jd. Sumaré",
                        "cep" => "16015-270",
                        "site" => "www.toledo.br",
                        "telefone" => " (18) 3636-7000/7064"
                    ],
                    [
                        "cidade" => "Araraquara",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO DE ARARAQUARA - UNIARA",
                        "endereco" => "Rua Carlos Gomes, 1338",
                        "bairro" => "Centro",
                        "cep" => "14802-165",
                        "site" => "www.uniara.com.br",
                        "telefone" => "(16) 3301-7100 / 0800 55 65 88"
                    ],
                    [
                        "cidade" => "Araraquara",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP ARARAQUARA",
                        "endereco" => "Av. Alberto Benassi, 200",
                        "bairro" => "Pq. Das Laranjeiras",
                        "cep" => "14804-300",
                        "site" => "www.unip.br",
                        "telefone" => " (16) 3336-1800"
                    ],
                    [
                        "cidade" => "Araras",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. HERMINIO OMETTO ARARAS-UNIARARAS",
                        "endereco" => "Av. Dr. Maximiliano Baruto, 500",
                        "bairro" => "Jd. Universitário",
                        "cep" => "13607-339",
                        "site" => "www.uniararas.br",
                        "telefone" => "(19) 3543-1400 (r. 206)"
                    ],
                    [
                        "cidade" => "Assis",
                        "type" => "editorial",
                        "name" => "INSTITUTO EDUCACIONAL DE ASSIS - IEDA - UNiesP",
                        "endereco" => "Av. Dr. Dória, 260",
                        "bairro" => "V. Ouro Verde",
                        "cep" => "19816-230",
                        "site" => "www.ieda.edu.br",
                        "telefone" => "(18) 3302-1230"
                    ],
                    [
                        "cidade" => "Avaré",
                        "type" => "editorial",
                        "name" => "FAC. INTEGRADAS REGIONAIS DE AVARE - FIRA",
                        "endereco" => "Pç. Prefeito Romeu Bretas, 163",
                        "bairro" => "Centro",
                        "cep" => "18700-902",
                        "site" => "www.fira.edu.br",
                        "telefone" => "(14) 3711-1828 (r. 1835)"
                    ],
                    [
                        "cidade" => "Avaré",
                        "type" => "editorial",
                        "name" => "FACULDADE SUDOESTE PAULISTA - FSP",
                        "endereco" => "Av. Prof Celso Ferreira da Silva, 1001",
                        "bairro" => "Jd. Europa",
                        "cep" => "18707-150",
                        "site" => "http://unifsp.edu.br/",
                        "telefone" => "(14) 3711-4020"
                    ],
                    [
                        "cidade" => "Barra Bonita",
                        "type" => "editorial",
                        "name" => "FIP - FAEFI - (antiga Fundação Educ. de Barra Bonita)",
                        "endereco" => "R. João Gerin, 275",
                        "bairro" => "Vila Operária",
                        "cep" => "17340-000",
                        "site" => "https://www.fipfaefi.com.br",
                        "telefone" => "(14) 3642-1300"
                    ],
                    [
                        "cidade" => "Barretos",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. DA FUND. EDUC. BARRETOS - UNIFEB (Lic.)",
                        "endereco" => "Av. Prof.ºRoberto Frade Monte, 389",
                        "bairro" => "B. Aeroporto",
                        "cep" => "14783-226",
                        "site" => "www.unifeb.edu.br",
                        "telefone" => "(17) 3321-6411"
                    ],
                    [
                        "cidade" => "Barretos",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. DA FUND. EDUC. BARRETOS - UNIFEB (Bach.)",
                        "endereco" => "Av. Prof.ºRoberto Frade Monte, 389",
                        "bairro" => "B. Aeroporto",
                        "cep" => "14783-226",
                        "site" => "www.unifeb.edu.br",
                        "telefone" => "(17) 3321-6411"
                    ],
                    [
                        "cidade" => "Barueri",
                        "type" => "editorial",
                        "name" => "UNIV. PRESBITERIANA MACKENZIE - MACKENZIE",
                        "endereco" => "Av. Mackenzie, 905",
                        "bairro" => "Tamboré",
                        "cep" => "06460-130",
                        "site" => "www.mackenzie.br",
                        "telefone" => "(11)2114-8000\r\n (11) 3555-2181\r\n(11) 3555-2131 "
                    ],
                    [
                        "cidade" => "Batatais",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO CLARETIANO - CEUCLAR (Licenciatura)",
                        "endereco" => "R. Dom Bosco, 466",
                        "bairro" => "Castelo",
                        "cep" => "14300-172",
                        "site" => "www.claretiano.edu.br",
                        "telefone" => "(16) 3660-1777"
                    ],
                    [
                        "cidade" => "Batatais",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO CLARETIANO - CEUCLAR (Bacharelado)",
                        "endereco" => "R. Dom Bosco, 466",
                        "bairro" => "Castelo",
                        "cep" => "14300-172",
                        "site" => "www.claretiano.edu.br",
                        "telefone" => "(16) 3660-1777"
                    ],
                    [
                        "cidade" => "Bauru",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE ESTADUAL PAULISTA - UNESP BAURU",
                        "endereco" => "Av. Eng. Luiz Edmundo Carrijo Coube, 14 - 01",
                        "bairro" => "Vargem Limpa",
                        "cep" => "17033-360",
                        "site" => "www.fc.unesp.br",
                        "telefone" => "(14) 3103-9437"
                    ],
                    [
                        "cidade" => "Bauru",
                        "type" => "editorial",
                        "name" => "FACULDADES INTEGRADAS DE BAURU - FIB",
                        "endereco" => "Rua José Santiago, Quadra 15",
                        "bairro" => "Jardim Ferraz",
                        "cep" => "17056-100",
                        "site" => "www.fibbauru.br",
                        "telefone" => "(14) 99822-3829\r\n(14) 2109-6200"
                    ],
                    [
                        "cidade" => "Bauru",
                        "type" => "editorial",
                        "name" => "FACULDADE ANHANGUERA DE BAURU",
                        "endereco" => "Rua Moussa Nakhl Tobias, nº 3-33",
                        "bairro" => "Pq. São Geraldo",
                        "cep" => "17021-005",
                        "site" => "www.anhanguera.com",
                        "telefone" => "(14) 3109-4103"
                    ],
                    [
                        "cidade" => "Bebedouro",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITÁRIO UNIFAFIBE",
                        "endereco" => "Rua Prof.º Orlando França de Carvalho, 325",
                        "bairro" => "Centro",
                        "cep" => "14701-070",
                        "site" => "www.unifafibe.com.br",
                        "telefone" => "(17) 3344-7100"
                    ],
                    [
                        "cidade" => "Birigui",
                        "type" => "editorial",
                        "name" => "FACULDADE BIRIGUI - FABI",
                        "endereco" => "Rua João Escanhuela, 133",
                        "bairro" => "Jardim Capuano",
                        "cep" => "16204-142",
                        "site" => "http://uniesp.edu.br/sites/birigui/",
                        "telefone" => "(18) 3643-3880"
                    ],
                    [
                        "cidade" => "Botucatu",
                        "type" => "editorial",
                        "name" => "FACULDADES INTEGRADAS DE BOTUCATU - UNIFAC",
                        "endereco" => "Av. Leonardo Villas Boas, 351",
                        "bairro" => "V. N. Botucatu",
                        "cep" => "18608-227",
                        "site" => "www.unifac.com.br",
                        "telefone" => "(14) 3815-2500"
                    ],
                    [
                        "cidade" => "Bragança Paulista",
                        "type" => "editorial",
                        "name" => "FAC. DE CIEN. E LET. DE BRAGANCA PAULISTA - FESB (Licenciatura)",
                        "endereco" => "Avenida Francisco Samuel Luchesi Filho, 770",
                        "bairro" => "Penha",
                        "cep" => "12929-600",
                        "site" => "www.fesb.br",
                        "telefone" => "(11) 4035-7800"
                    ],
                    [
                        "cidade" => "Bragança Paulista",
                        "type" => "editorial",
                        "name" => "FAC. DE CIEN. E LET. DE BRAGANCA PAULISTA - FESB (Bacharelado)",
                        "endereco" => "Avenida Francisco Samuel Luchesi Filho, 770",
                        "bairro" => "Penha",
                        "cep" => "12929-600",
                        "site" => "www.fesb.br",
                        "telefone" => "(11) 4035-7800"
                    ],
                    [
                        "cidade" => "Campinas",
                        "type" => "editorial",
                        "name" => "GRUPO IBMEC EDUCACIONAL SA - CENTRO UNIVERSITÁRIO UNIMETROCAMP / WYDEN",
                        "endereco" => "Rua Dr. Sales de Oliveira, 1661",
                        "bairro" => "Vila Industrial",
                        "cep" => "13035-270",
                        "site" => "www.wyden.com.br/unimetrocamp",
                        "telefone" => "(19) 4501-2615 / 4501-2644"
                    ],
                    [
                        "cidade" => "Campinas",
                        "type" => "editorial",
                        "name" => "PONTIFICIA UNIV. CAT. DE CAMPINAS - PUC CAMPINAS",
                        "endereco" => "Rua Prof. Dr. Euryclides de Jesus Zerbini, nº 1.516",
                        "bairro" => "Parque Rural / Fazenda Santa Cândida",
                        "cep" => "13087-571",
                        "site" => "www.puc-campinas.edu.br",
                        "telefone" => "(19) 3343-7000"
                    ],
                    [
                        "cidade" => "Campinas",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE ESTADUAL DE CAMPINAS - UNICAMP",
                        "endereco" => "Av. Érico Veríssimo, 701  ",
                        "bairro" => "Cid. Univ. Zeferino Vaz",
                        "cep" => "13083-851",
                        "site" => "www.fef.unicamp.br",
                        "telefone" => "(19) 3521-6608 / 6607"
                    ],
                    [
                        "cidade" => "Campinas",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP CAMPINAS",
                        "endereco" => "Av. Comendador Enzo Ferrari, 280",
                        "bairro" => "Swift",
                        "cep" => "13045-770",
                        "site" => "www.unip.br",
                        "telefone" => "(19) 3776-4039 / (19) 3776-4000"
                    ],
                    [
                        "cidade" => "Campinas",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITÁRIO SALESIANO DE SÃO PAULO - UNISAL",
                        "endereco" => "Rua Baronesa Geraldo de Rezende, 330",
                        "bairro" => "Guanabara",
                        "cep" => "13075-270",
                        "site" => "www.unisal.br",
                        "telefone" => "(19) 3744-6800"
                    ],
                    [
                        "cidade" => "Campinas",
                        "type" => "editorial",
                        "name" => "FACULDADE ANHANGUERA DE CAMPINAS - Unidade IV",
                        "endereco" => "Av Emília Stefanelli Ceregatti, 100",
                        "bairro" => "Jardim Morumbi",
                        "cep" => "13052-126",
                        "site" => "www.anhanguera.com",
                        "telefone" => "(19) 3512-3316"
                    ],
                    [
                        "cidade" => "Caraguatatuba",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO MODULO - MODULO",
                        "endereco" => "Av. Frei Pacífico Wagner, 653",
                        "bairro" => "Centro",
                        "cep" => "11660-280",
                        "site" => "www.modulo.br",
                        "telefone" => "0800 721 5844"
                    ],
                    [
                        "cidade" => "Carapicuíba",
                        "type" => "editorial",
                        "name" => "FACULDADE NOSSA CIDADE - FNC",
                        "endereco" => "Av. Francisco Pignatari, 630",
                        "bairro" => "Vila Gustavo Correa",
                        "cep" => "06310-390",
                        "site" => "www.faculdadefnc.com.br",
                        "telefone" => "(11) 4185-8410"
                    ],
                    [
                        "cidade" => "Catanduva",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITÁRIO PADRE ALBINO - UNIFIPA (LICENCIATURA)",
                        "endereco" => "Rua dos Estudantes, 225",
                        "bairro" => "Parque Iracema",
                        "cep" => "15809-144   ",
                        "site" => "www.unifipa.com.br",
                        "telefone" => "(17) 3311-3328"
                    ],
                    [
                        "cidade" => "Catanduva",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITÁRIO PADRE ALBINO - UNIFIPA (BACHARELADO)",
                        "endereco" => "Rua dos Estudantes, 225",
                        "bairro" => "Parque Iracema",
                        "cep" => "15809-144   ",
                        "site" => "www.unifipa.com.br",
                        "telefone" => "(17) 3311-3328"
                    ],
                    [
                        "cidade" => "Cotia",
                        "type" => "editorial",
                        "name" => "Faculdade Estácio Euro- Panamericana de Humanidades e Tecnologias - ESTÁCIO EUROPAN",
                        "endereco" => "Rua Howard Archibald Acheson Junior, 393",
                        "bairro" => "Granja Viana",
                        "cep" => "06711-280",
                        "site" => "www.estacio.br",
                        "telefone" => "(11) 5212-6103 "
                    ],
                    [
                        "cidade" => "Cotia",
                        "type" => "editorial",
                        "name" => "FACULDADE MARIO SCHENBERG - FMS",
                        "endereco" => "Estrada Municipal Walter Steurer, 1413",
                        "bairro" => "Granja Viana",
                        "cep" => "06710-500 ",
                        "site" => "www.fms.edu.br",
                        "telefone" => "(11) 4613-6200"
                    ],
                    [
                        "cidade" => "Cruzeiro",
                        "type" => "editorial",
                        "name" => "ESCOLA SUPERIOR DE CRUZEIRO - ESEFIC",
                        "endereco" => "R. Dr. José Rodrigues A. Sobrinho,191",
                        "bairro" => "Vila Suely",
                        "cep" => "12711-690",
                        "site" => "http://www.esccultural.com.br/site",
                        "telefone" => "(12) 3145-1155"
                    ],
                    [
                        "cidade" => "Descalvado",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE BRASIL - CAMPUS DESCALVADO/SP",
                        "endereco" => "Av. Hilário de Silva Passos, 950",
                        "bairro" => "Parque Universitário",
                        "cep" => "13690-000",
                        "site" => "https://novo.universidadebrasil.edu.br/",
                        "telefone" => "(19) 3593-8500"
                    ],
                    [
                        "cidade" => "Diadema",
                        "type" => "editorial",
                        "name" => "FAULDADE DIADEMA - FAD - UNiesP",
                        "endereco" => "Av. Alda, 831",
                        "bairro" => "Pq. 7 de Setembro",
                        "cep" => "09910-170",
                        "site" => "uniesp.edu.br/sites/diadema/",
                        "telefone" => "(11) 4055-5224"
                    ],
                    [
                        "cidade" => "Dracena",
                        "type" => "editorial",
                        "name" => "FACULDADES DE DRACENA - FUNDEC/FADRA",
                        "endereco" => "Rua Bahia, 332",
                        "bairro" => "bairro Metrópole",
                        "cep" => "17900-000",
                        "site" => "www.fundec.edu.br/unifadra",
                        "telefone" => "(18) 3821-9000\r\n Ramal: 9055"
                    ],
                    [
                        "cidade" => "Espírito Santo do Pinhal",
                        "type" => "editorial",
                        "name" => "CENTRO REG.UNIV.ESP.SANTO DO PINHAL-UNIPINHAL",
                        "endereco" => "Av. Hélio Vergueiro Leite, s/n°",
                        "bairro" => "Jd. Universitário",
                        "cep" => "13990-000",
                        "site" => "www.unipinhal.edu.br",
                        "telefone" => "(19) 3651-9600/3651-9605"
                    ],
                    [
                        "cidade" => "Fernandópolis",
                        "type" => "editorial",
                        "name" => "FACULDADES INTEGRADAS DE FERNANDOPOLIS - FIFE/FEF",
                        "endereco" => "Av. Teotonio Vilela, s/n°",
                        "bairro" => "Campus Universitário",
                        "cep" => "15600-000",
                        "site" => "www.fef.br",
                        "telefone" => "(17) 3465-0011"
                    ],
                    [
                        "cidade" => "Franca",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE FRANCA - UNIFRAN",
                        "endereco" => "Av. Dr. Armando Salles Oliveira, 201",
                        "bairro" => "Parque Universitário",
                        "cep" => "14404-600",
                        "site" => "www.unifran.edu.br",
                        "telefone" => "(16) 3711-8912 / (16) 3711-8888"
                    ],
                    [
                        "cidade" => "Guarujá",
                        "type" => "editorial",
                        "name" => "UNIV. DE RIBEIRAO PRETO - UNAERP GUARUJA",
                        "endereco" => "Av. Dom Pedro I, 3.300",
                        "bairro" => "Enseada",
                        "cep" => "11440-003",
                        "site" => "www.unaerp.br",
                        "telefone" => "(13) 3398-1000"
                    ],
                    [
                        "cidade" => "Guarulhos",
                        "type" => "editorial",
                        "name" => "FACULDADE ANHANGUERA DE GUARULHOS",
                        "endereco" => "Av. Papa Pio XII, 291",
                        "bairro" => "Macedo",
                        "cep" => "07113-000",
                        "site" => "www.anhanguera.com",
                        "telefone" => "(11) 2107-1900"
                    ],
                    [
                        "cidade" => "Guarulhos",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE UNIVERSUS VERITAS GUARULHOS - UNIVERITAS UNG",
                        "endereco" => "R. Eng. Prestes Maia, 88 ",
                        "bairro" => "Centro",
                        "cep" => "07023-070",
                        "site" => "www.univeritas.com/tags/centro-universitario-universus-veritas",
                        "telefone" => "(11) 2464-2700"
                    ],
                    [
                        "cidade" => "Guarulhos",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. MET. DE S. PAULO-UNIFIG/UNIMESP",
                        "endereco" => "Av São Luiz, 315",
                        "bairro" => "Vila Rosalia",
                        "cep" => "07072-000",
                        "site" => "www.unimespfig.com.br",
                        "telefone" => "(11) 3544-0333"
                    ],
                    [
                        "cidade" => "Hortolândia",
                        "type" => "editorial",
                        "name" => "FACULDADE ADVENTISTA DE HORTOLANDIA",
                        "endereco" => "Rua Pastor Hugo Gegembauer, 265",
                        "bairro" => "Pq. Ortolândia",
                        "cep" => "13184-010",
                        "site" => "www.unasp.br",
                        "telefone" => "(19) 2118-8151/8000/3865-1237/99943-3847"
                    ],
                    [
                        "cidade" => "Indaiatuba",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERCITÁRIO MAX PLANCK - UNIMAX",
                        "endereco" => "Av. 9 de dezembro, 460",
                        "bairro" => "Jd. Pedroso",
                        "cep" => "13330-000",
                        "site" => "www.faculdademax.edu.br",
                        "telefone" => "(19) 3885-9900"
                    ],
                    [
                        "cidade" => "Itapetininga",
                        "type" => "editorial",
                        "name" => "FACULDADES INTEGRADAS DE ITAPETININGA - FII",
                        "endereco" => "Rodovia Raposo Tavares, Km 162",
                        "bairro" => "Nova Itapetininga",
                        "cep" => "18203-340",
                        "site" => "www.fkb.br",
                        "telefone" => "(15) 3376-9300"
                    ],
                    [
                        "cidade" => "Itapeva",
                        "type" => "editorial",
                        "name" => "FACULDADES DE CIÊNCIAS SOCIAIS E AGRÁRIAS DE ITAPEVA-FAIT",
                        "endereco" => "Rodovia Francisco Alves Negrão, SP 258, km 285 ",
                        "bairro" => "Pilão D'Água",
                        "cep" => "18412-000",
                        "site" => "www.fait.edu.br",
                        "telefone" => "(15) 99157-4431\r\n(15) 3526-8888"
                    ],
                    [
                        "cidade" => "Itapira",
                        "type" => "editorial",
                        "name" => "UNiesI - CENTRO UNIVERSITÁRIO DE ITAPIRA",
                        "endereco" => "Av. Rio Branco, 99",
                        "bairro" => "Centro",
                        "cep" => "13970-070",
                        "site" => "http://www.uniesi.edu.br/index.asp",
                        "telefone" => " (19) 3863-5510 (19) 3863-5595\r\n \r\n"
                    ],
                    [
                        "cidade" => "Itararé",
                        "type" => "editorial",
                        "name" => "FACULDADES INTEGRADAS DE ITARARE",
                        "endereco" => "Rua João Batista Veiga, 1725",
                        "bairro" => "Cruzeiro",
                        "cep" => "18460-000",
                        "site" => "http://www.fafit.com.br/",
                        "telefone" => "(15) 3531-8484 (r. 8448)"
                    ],
                    [
                        "cidade" => "Itu",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. NOSSA SENHORA DO PATROCINIO - CEUNSP",
                        "endereco" => "Rua do Patrocínio, 716",
                        "bairro" => "Centro",
                        "cep" => "13300-200",
                        "site" => "www.ceunsp.edu.br",
                        "telefone" => "(11) 4013-9900"
                    ],
                    [
                        "cidade" => "Jaboticabal",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. MOURA LACERDA - CUML JABOTICABAL",
                        "endereco" => "Av. Amador Zardim, 55 ",
                        "bairro" => "Jardim Eldorado",
                        "cep" => "14870-000 ",
                        "site" => "www.portalmouralacerda.com.br",
                        "telefone" => "(16) 3202-2882\r\n08007071010"
                    ],
                    [
                        "cidade" => "Jaguariúna",
                        "type" => "editorial",
                        "name" => "FACULDADE DE JAGUARIUNA - FAJ",
                        "endereco" => "Rodovia Adhemar de Barros, Km 127 ",
                        "bairro" => "Tanquinho Velho",
                        "cep" => "13820-000",
                        "site" => "www.faj.br/",
                        "telefone" => "(19) 3837-8500 R.571"
                    ],
                    [
                        "cidade" => "Jales",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO DE JALES - UNIJALES",
                        "endereco" => "Av. Francisco Jalles, nº 1851",
                        "bairro" => "Centro",
                        "cep" => "15703-200",
                        "site" => "www.unijales.edu.br",
                        "telefone" => "(17) 3622-1629 ou 1620"
                    ],
                    [
                        "cidade" => "Jundiaí",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP JUNDIAÍ",
                        "endereco" => "Av. Armando Giassetti, 577",
                        "bairro" => "Vila Hortolândia",
                        "cep" => "13214-525",
                        "site" => "www.unip.br",
                        "telefone" => "(11) 4815-2333"
                    ],
                    [
                        "cidade" => "Jundiaí",
                        "type" => "editorial",
                        "name" => "ESC. SUP. DE EDUC. FISICA DE JUNDIAI - ESEFJ",
                        "endereco" => "Rua Dr. Rodrigo Soares de Oliveira, s/n°",
                        "bairro" => "Anhangabaú",
                        "cep" => "13208-120",
                        "site" => "www.esef.br",
                        "telefone" => "(11) 4805-7955"
                    ],
                    [
                        "cidade" => "Jundiaí",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. PADRE ANCHIETA - UNIANCHIETA",
                        "endereco" => "Av. Dr Adoniro Ladeira, 94",
                        "bairro" => "Jundiainópolis",
                        "cep" => "13210-800",
                        "site" => "www.anchieta.br/unianchieta/",
                        "telefone" => "(11) 4527-3444 (r. 4563)"
                    ],
                    [
                        "cidade" => "Leme",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. ANHANGUERA - UNIFIAN LEME",
                        "endereco" => "Rua Waldemar Selenci, 340",
                        "bairro" => "cidade Jardim",
                        "cep" => "13614-370",
                        "site" => "www.anhanguera.com",
                        "telefone" => "(19) 3573-8600"
                    ],
                    [
                        "cidade" => "Lençóis Paulista",
                        "type" => "editorial",
                        "name" => "INST. SUP. DE EDUC. ORIGENES LESSA - ISEOL",
                        "endereco" => "Rodovia Osni Matheus, Km 108 + 100m",
                        "bairro" => "São Judas Tadeu",
                        "cep" => "18683-900",
                        "site" => "http://www.facol.br/",
                        "telefone" => "(14) 3269-3800"
                    ],
                    [
                        "cidade" => "Limeira",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE ESTADUAL DE CAMPINAS - UNICAMP LIMEIRA",
                        "endereco" => "Rua Pedro Zaccaria, 1300",
                        "bairro" => "Jd. Paulista",
                        "cep" => "13484-350",
                        "site" => "www.fca.unicamp.br",
                        "telefone" => "(19) 3701-6687"
                    ],
                    [
                        "cidade" => "Limeira",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP LIMEIRA",
                        "endereco" => "Rua Miguel Guidotti, 405 ",
                        "bairro" => "Registro Ragazzo",
                        "cep" => "13485-342",
                        "site" => "www.unip.br",
                        "telefone" => "(19) 3701-7000"
                    ],
                    [
                        "cidade" => "Limeira",
                        "type" => "editorial",
                        "name" => "FACULDADES INT. EINSTEIN DE LIMEIRA - FIEL",
                        "endereco" => "Rua Raul Machado, 134 ",
                        "bairro" => "Vila Queiroz",
                        "cep" => "13485-024",
                        "site" => "www.einsteinlimeira.com.br",
                        "telefone" => " (19) 3404.9594 "
                    ],
                    [
                        "cidade" => "Lins",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV.CAT. SALES. AUXILIUM - UNISALESIANO LINS",
                        "endereco" => "Rua Dom Bosco, 265",
                        "bairro" => "Vila Alta",
                        "cep" => "16400-505",
                        "site" => "www.unisalesiano.edu.br",
                        "telefone" => "(14) 3533-5000"
                    ],
                    [
                        "cidade" => "Mairiporã",
                        "type" => "editorial",
                        "name" => "FACULDADE DE CIÊNCIAS HUMANAS - FCH",
                        "endereco" => "Av. Leonor de Oliveira, 283",
                        "bairro" => "Centro",
                        "cep" => "07600-000",
                        "site" => "www.faculdadefch.com.br",
                        "telefone" => "(11) 4604-8693"
                    ],
                    [
                        "cidade" => "Marília",
                        "type" => "editorial",
                        "name" => "FACULDADE DE ENSINO SUPERIOR DO INTERIOR PAULISTA - FAIP",
                        "endereco" => "Av. Antonieta Altenfelder, 65",
                        "bairro" => "Jardim Santa Antonieta",
                        "cep" => "17512-130",
                        "site" => "www.faip.edu.br",
                        "telefone" => "(14) 3408-2200 / (14) 99850-1292"
                    ],
                    [
                        "cidade" => "Marília",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE MARILIA - UNIMAR",
                        "endereco" => "Av. Higyno Muzzi Filho, 1001",
                        "bairro" => "Campus Universitário",
                        "cep" => "17525-902",
                        "site" => "www.unimar.br",
                        "telefone" => "(14) 2105-4055 / 4058"
                    ],
                    [
                        "cidade" => "Mauá",
                        "type" => "editorial",
                        "name" => "FACULDADE DE MAUÁ - FAMA",
                        "endereco" => "Rua Vitorino Dell Antonia, 349",
                        "bairro" => "Vila Noêmia",
                        "cep" => "09370-570",
                        "site" => "www.facmaua.edu.br",
                        "telefone" => "(11) 4512-6100"
                    ],
                    [
                        "cidade" => "Mirassol",
                        "type" => "editorial",
                        "name" => "UNIAO DAS ESC. DO GRUPO FAIMI DE EDUC.- FAIMI",
                        "endereco" => "Avenida Luis Fernando Moreira, 1005",
                        "bairro" => "Jd. São José",
                        "cep" => " 15130-258",
                        "site" => "http://uniesp.edu.br/sites/mirassol",
                        "telefone" => "(17) 3243-7150 / (17) 3222-0150"
                    ],
                    [
                        "cidade" => "Mogi das Cruzes",
                        "type" => "editorial",
                        "name" => "FACULDADE DO CLUBE NAUTICO MOGIANO - FCNM",
                        "endereco" => "R. Cabo Diogo Oliver, 758 ",
                        "bairro" => "Mogilar",
                        "cep" => "08773-000",
                        "site" => "www.nautico.edu.br",
                        "telefone" => "(11) 4791-7100 / 7102"
                    ],
                    [
                        "cidade" => "Mogi das Cruzes",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE MOGI DAS CRUZES - UMC",
                        "endereco" => "Av. Dr. Cândido Xavier de Almeida e Souza, 200",
                        "bairro" => "Centro Cívico",
                        "cep" => "08780-911",
                        "site" => "www.umc.br",
                        "telefone" => "(11) 4798-7000\r\n(11) 4798-5233"
                    ],
                    [
                        "cidade" => "Mogi-Guaçu",
                        "type" => "editorial",
                        "name" => "FACULDADE MOGIANA DO ESTADO DE SÃO PAULO - FMG ",
                        "endereco" => "Avenida Padre Jaime, 2600",
                        "bairro" => "Jd. Serra Dourada",
                        "cep" => "13844-070",
                        "site" => "www.fmg.edu.br",
                        "telefone" => "(19) 3831-3080"
                    ],
                    [
                        "cidade" => "Nova Odessa",
                        "type" => "editorial",
                        "name" => "FACULDADE NETWORK - NWK",
                        "endereco" => "Av. Ampélio Gazzeta, 200",
                        "bairro" => "Lopes Iglesias",
                        "cep" => "13460-000",
                        "site" => "www.nwk.edu.br",
                        "telefone" => "(19) 3476-7676"
                    ],
                    [
                        "cidade" => "Osasco",
                        "type" => "editorial",
                        "name" => "UNIV. ANHANGUERA DE S. PAULO - ANHANGUERA OSASCO",
                        "endereco" => "Av. dos Autonomistas, 1.325",
                        "bairro" => "Vila Yara",
                        "cep" => "06020-015",
                        "site" => "www.anhanguera.br",
                        "telefone" => "(11) 3699-9016"
                    ],
                    [
                        "cidade" => "Osasco",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO FIEO - UNIFIEO -  CAMPUS VILA YARA",
                        "endereco" => "Av. Franz Voegeli, 300",
                        "bairro" => "Continental",
                        "cep" => "06020-190 ",
                        "site" => "www.unifieo.br",
                        "telefone" => "(11) 3681-6000"
                    ],
                    [
                        "cidade" => "Ourinhos",
                        "type" => "editorial",
                        "name" => "FACULDADE ESTACIO DE SA DE OURINHOS - FAESO",
                        "endereco" => "Avenida Luis Saldanha Rodrigues, s/nº - Quadra C1A",
                        "bairro" => "Nova Ourinhos",
                        "cep" => "19907-510",
                        "site" => "www.estacio.br/faeso",
                        "telefone" => "(14) 2100-5001/5021"
                    ],
                    [
                        "cidade" => "Peruíbe",
                        "type" => "editorial",
                        "name" => "FACULDADE PERUIBE - FPBE",
                        "endereco" => "Av. Darcy Fonseca, 530",
                        "bairro" => "Jardim dos Prados",
                        "cep" => "11750-000",
                        "site" => "www.faculdadeperuibe.com.br",
                        "telefone" => "(13) 3456-2979 / 3055"
                    ],
                    [
                        "cidade" => "Pindamonhangaba",
                        "type" => "editorial",
                        "name" => "FACULDADE DE PINDAMONHANGABA - FAPI/FUNVIC",
                        "endereco" => "Estrada Radialista Percy Lacerda, 1000",
                        "bairro" => "Pinhão do Borba",
                        "cep" => "12422-970",
                        "site" => "https://www.funvicpinda.org.br",
                        "telefone" => "(12) 3648-8323 "
                    ],
                    [
                        "cidade" => "Piracicaba",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE METODISTA DE PIRACICABA - UNIMEP",
                        "endereco" => "Rodovia do Açúcar, Km 156 (SP-308)",
                        "bairro" => "Taquaral",
                        "cep" => "13423-170",
                        "site" => "unimep.edu.br",
                        "telefone" => "(19) 3124-1582"
                    ],
                    [
                        "cidade" => "Porto Ferreira",
                        "type" => "editorial",
                        "name" => "FACULDADES ASSER",
                        "endereco" => "Rua Padre Nestor C. Maranhão, 40",
                        "bairro" => "Jd. Aeroporto",
                        "cep" => "13660-000",
                        "site" => "http://www.asser.edu.br/portoferreira/",
                        "telefone" => " (19) 3585-6111\r\n(19) 3585-0650"
                    ],
                    [
                        "cidade" => "Praia Grande",
                        "type" => "editorial",
                        "name" => "FACULDADE PRAIA GRANDE - FPG",
                        "endereco" => "Av. Presidente Kennedy, 4000",
                        "bairro" => "Aviação",
                        "cep" => "11703-200",
                        "site" => "www.fpg.edu.br",
                        "telefone" => "(13) 3476-8888"
                    ],
                    [
                        "cidade" => "Presidente Prudente",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DO OESTE PAULISTA - UNOESTE",
                        "endereco" => "Rodovia Raposo Tavares, Km 572",
                        "bairro" => "Limoeiro",
                        "cep" => "19067-175",
                        "site" => "www.unoeste.br",
                        "telefone" => "(18) 3229-3241"
                    ],
                    [
                        "cidade" => "Presidente Prudente",
                        "type" => "editorial",
                        "name" => "UNIV. EST. PAULISTA - UNESP PRES. PRUDENTE",
                        "endereco" => "R. Roberto Simonsen, 305",
                        "bairro" => "Centro Educacional",
                        "cep" => "19060-900",
                        "site" => "www.fct.unesp.br",
                        "telefone" => "(18) 3229-5345"
                    ],
                    [
                        "cidade" => "Presidente Prudente",
                        "type" => "editorial",
                        "name" => "FACULDADE DE PRESIDENTE PRUDENTE - FAPEPE",
                        "endereco" => "Av. Presidente Prudente, 6093",
                        "bairro" => "Jd. Aeroporto",
                        "cep" => "19053-210",
                        "site" => "http://uniesp.edu.br/sites/presidenteprudente/",
                        "telefone" => "(18) 3918-4700"
                    ],
                    [
                        "cidade" => "Presidente Venceslau",
                        "type" => "editorial",
                        "name" => "FACULDADE DE PRESIDENTE VENCESLAU - FAPREV - UNIVERSIDADE BRASIL ",
                        "endereco" => "Rua Piracicaba, 47",
                        "bairro" => "Jd. Coroados",
                        "cep" => "19400-000",
                        "site" => "http://uniesp.edu.br/sites/faprev/",
                        "telefone" => "(18) 3272-9440"
                    ],
                    [
                        "cidade" => "Registro",
                        "type" => "editorial",
                        "name" => "FAC. INT. DO VALE DO RIBEIRA - FVR/UNISEPE",
                        "endereco" => "Rua Oscar Yoshiaki Magário, 185",
                        "bairro" => "Jardim das Palmeiras",
                        "cep" => "11900-000",
                        "site" => "http://portal.unisepe.com.br/fvr/",
                        "telefone" => "(13) 3828-2840"
                    ],
                    [
                        "cidade" => "Ribeirão Pires",
                        "type" => "editorial",
                        "name" => "FAC. INT. DE RIBEIRAO PIRES - FIRP",
                        "endereco" => "Rua Coronel Oliveira Lima, 3345",
                        "bairro" => "Parque Aliança",
                        "cep" => "09404-100",
                        "site" => "uniesp.edu.br/sites/ribeiraopires/",
                        "telefone" => "(11) 4822-7850\r\n"
                    ],
                    [
                        "cidade" => "Ribeirão Preto",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP RIBEIRÃO PRETO",
                        "endereco" => "Av. Carlos Consoni, 10",
                        "bairro" => "Jardim Canadá",
                        "cep" => "14024-270",
                        "site" => "www.unip.br",
                        "telefone" => "(16) 3602-6712 / (16) 3602-6700"
                    ],
                    [
                        "cidade" => "Ribeirão Preto",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE SÃO PAULO - USP RIBEIRÃO PRETO",
                        "endereco" => "Av. Bandeirantes, 3900",
                        "bairro" => "Monte Alegre",
                        "cep" => "14040-907",
                        "site" => "www.eeferp.usp.br",
                        "telefone" => "(16) 3315-0529\r\n(16) 3315-0523"
                    ],
                    [
                        "cidade" => "Ribeirão Preto",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. MOURA LACERDA - CUML RIB. PRETO",
                        "endereco" => "Av. Dr. Oscar de Moura Lacerda, 1520",
                        "bairro" => "Jd. Independência",
                        "cep" => "14076-510",
                        "site" => "www.portalmouralacerda.com.br",
                        "telefone" => "(16) 2101-1010"
                    ],
                    [
                        "cidade" => "Ribeirão Preto",
                        "type" => "editorial",
                        "name" => "UNIV. DE RIBEIRAO PRETO - UNAERP RIB. PRETO",
                        "endereco" => "Av. Costábile Romano, 2.201",
                        "bairro" => "Ribeirânia",
                        "cep" => "14096-900",
                        "site" => "www.unaerp.br",
                        "telefone" => "(16) 3603-6736"
                    ],
                    [
                        "cidade" => "Ribeirão Preto",
                        "type" => "editorial",
                        "name" => "UNIAO DE CURSOS SUPERIORES COC - UNISEB",
                        "endereco" => "Rua Abrahão Issa Halack, 980",
                        "bairro" => "Ribeirânia",
                        "cep" => "14096-160",
                        "site" => "www.uniseb.com.br",
                        "telefone" => "(16) 3603-9395"
                    ],
                    [
                        "cidade" => "Rio Claro",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO CLARETIANO-CEUCLAR RIO CLARO",
                        "endereco" => "Av. Sto. Antônio Maria Claret, 1724",
                        "bairro" => "cidade Claret",
                        "cep" => "13503-250",
                        "site" => "www.claretianorc.com.br",
                        "telefone" => "(19) 2111-6000"
                    ],
                    [
                        "cidade" => "Rio Claro",
                        "type" => "editorial",
                        "name" => "UNIV. ESTADUAL PAULISTA - UNESP RIO CLARO",
                        "endereco" => "Avenida Vinte e Quatro A, 1515",
                        "bairro" => "Bela Vista",
                        "cep" => "13506-900",
                        "site" => "http://ib.rc.unesp.br/",
                        "telefone" => "(19) 3526-4320 / 4100"
                    ],
                    [
                        "cidade" => "Rio Claro",
                        "type" => "editorial",
                        "name" => "ESC. SUP. DE TECN. E EDUC. DE RIO CLARO - ASSER",
                        "endereco" => "Rua 7, 1193",
                        "bairro" => "Centro",
                        "cep" => "13500-200",
                        "site" => "www.asser.edu.br",
                        "telefone" => "(19) 3525-2945\r\n(19) 3523-2001"
                    ],
                    [
                        "cidade" => "Rio Claro",
                        "type" => "editorial",
                        "name" => "FACULDADES INTEGRADAS CLARETIANAS - FIC",
                        "endereco" => "Av. Sto. Antônio Maria Claret, 1724",
                        "bairro" => "cidade Claret",
                        "cep" => "13503-257",
                        "site" => "www.claretiano.edu.br",
                        "telefone" => "(19) 2111-6000"
                    ],
                    [
                        "cidade" => "Santa Bárbara d'Oeste",
                        "type" => "editorial",
                        "name" => "FACULDADE POLITEC - FAP",
                        "endereco" => "Av. Santa bárbara, 4000",
                        "bairro" => "Jd Souza Queiroz",
                        "cep" => "13454-005",
                        "site" => "http://uniesp.edu.br/sites/politec/",
                        "telefone" => "(19) 3459-1000"
                    ],
                    [
                        "cidade" => "Santa Fé do Sul",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITÁRIO DE SANTA FÉ DO SUL – UNIFUNEC",
                        "endereco" => "Av. Paulo Nunes, 95",
                        "bairro" => "Centro Sul",
                        "cep" => "15775-000",
                        "site" => "www.funecsantafe.edu.br",
                        "telefone" => "(17) 3641-9000"
                    ],
                    [
                        "cidade" => "Santana de Parnaíba",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP ALPHAVILLE",
                        "endereco" => "Av. Yojiro Takaoka, 3500",
                        "bairro" => "Santana de Parnaíba",
                        "cep" => "06500-000",
                        "site" => "www.unip.br",
                        "telefone" => "(11) 4152-8892 \r\n(11) 4152-8888"
                    ],
                    [
                        "cidade" => "Santo André",
                        "type" => "editorial",
                        "name" => "UNIV. ANHANGUERA DE S. PAULO - SANTO ANDRÉ (Antiga UniABC)",
                        "endereco" => "Av. Industrial, 3330",
                        "bairro" => "bairro Campestre",
                        "cep" => "09080-501",
                        "site" => "http://www.anhanguera.com",
                        "telefone" => "(11) 4991-9800"
                    ],
                    [
                        "cidade" => "Santos",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP SANTOS RANGEL",
                        "endereco" => "Av. Francisco Manoel, s/n",
                        "bairro" => "Vila Mathias",
                        "cep" => "11045-300",
                        "site" => "www.unip.br",
                        "telefone" => "(13) 4009-2000"
                    ],
                    [
                        "cidade" => "Santos",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE METROPOLITANA DE SANTOS - UNIMES",
                        "endereco" => "Av. Conselheiro Nébias, 536",
                        "bairro" => "Encruzilhada",
                        "cep" => "11045-002",
                        "site" => "www.unimes.br",
                        "telefone" => "(13) 3228-3400"
                    ],
                    [
                        "cidade" => "Santos",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE FEDERAL DE SAO PAULO - UNIFESP",
                        "endereco" => "Rua Silva Jardim, 136",
                        "bairro" => "Vila Mathias",
                        "cep" => "11015-020",
                        "site" => "http://www.unifesp.br/campus/san7/",
                        "telefone" => "(13) 3229-0100/(13) 3229-0171"
                    ],
                    [
                        "cidade" => "Santos",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE SANTA CECILIA - UNISANTA",
                        "endereco" => "Rua Oswaldo Cruz, 277",
                        "bairro" => "Boqueirão",
                        "cep" => "11045-907",
                        "site" => "www.unisanta.br",
                        "telefone" => "(13) 3202-7150 / (13) 3202-7100"
                    ],
                    [
                        "cidade" => "São Bernardo do Campo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE METODISTA DE SAO PAULO - UMESP",
                        "endereco" => "Rua do Sacramento, 230",
                        "bairro" => "Rudge Ramos",
                        "cep" => "09640-000",
                        "site" => "www.metodista.br",
                        "telefone" => "(11) 4366-5552"
                    ],
                    [
                        "cidade" => "São Bernardo do Campo",
                        "type" => "editorial",
                        "name" => "UNIV. ANHANGUERA DE S. PAULO - ANHANGUERA ABC",
                        "endereco" => "Av. Dr. Rudge Ramos, 1501 ",
                        "bairro" => "Rudge Ramos",
                        "cep" => "09638-000",
                        "site" => "www.anhanguera.com",
                        "telefone" => "(11) 4362-9004"
                    ],
                    [
                        "cidade" => "São Caetano do Sul",
                        "type" => "editorial",
                        "name" => "UNIV. MUNICIPAL DE SAO CAETANO DO SUL - USCS",
                        "endereco" => "Rua Santo Antônio, 50",
                        "bairro" => "Centro",
                        "cep" => "09521-160",
                        "site" => "www.uscs.edu.br",
                        "telefone" => "(11) 4239-3200 / 3311"
                    ],
                    [
                        "cidade" => "São Carlos",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE FEDERAL DE SAO CARLOS - UFSCAR",
                        "endereco" => "Rod. Washington Luis, Km 235 - SP-310",
                        "bairro" => "Monjolinho",
                        "cep" => "13565-905",
                        "site" => "www.ufscar.br",
                        "telefone" => "(16) 3351-8379"
                    ],
                    [
                        "cidade" => "São Carlos",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. CENTRAL PAULISTA - UNIcep",
                        "endereco" => "Rua Miguel Petroni, 5111",
                        "bairro" => "Jardim Centenário",
                        "cep" => "13563-470",
                        "site" => "www.unicep.edu.br",
                        "telefone" => "(16) 3362-2111"
                    ],
                    [
                        "cidade" => "São João da Boa Vista",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. DAS FAC. ASSOC. DE ENS. - UNIFAE",
                        "endereco" => "Largo Eng. Paulo Almeida Sandeville, 15",
                        "bairro" => "Santo André ",
                        "cep" => "13870-377",
                        "site" => "www.fae.br",
                        "telefone" => "(19)3638-0240/3623-3022"
                    ],
                    [
                        "cidade" => "São José do Rio Pardo",
                        "type" => "editorial",
                        "name" => "FAC. FILOS., CIÊNCIAS E LETRAS SÃO JOSÉ DO RIO PARDO - FFCL (FEUC-RIO PARDO)",
                        "endereco" => "Rua Jorge Tibiriça, 451",
                        "bairro" => "Centro",
                        "cep" => "13720-000",
                        "site" => "www.feucriopardo.edu.br",
                        "telefone" => "(19) 3608-4704 / (11) 3681-3088"
                    ],
                    [
                        "cidade" => "São José do Rio Pardo",
                        "type" => "editorial",
                        "name" => "UNIV. PAULISTA - UNIP SAO JOSE DO RIO PARDO",
                        "endereco" => "R. Santa Teresinha, 160",
                        "bairro" => "Centro",
                        "cep" => "13720-000",
                        "site" => "www.unip.br",
                        "telefone" => "(19) 3681-2655"
                    ],
                    [
                        "cidade" => "São José do Rio Preto",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP SAO JOSE DO RIO PRETO",
                        "endereco" => "Av. Pres. Juscelino Kubitschek de Oliveira, s/nº",
                        "bairro" => "Jd. Tarraf II",
                        "cep" => "15092-415",
                        "site" => "www.unip.br",
                        "telefone" => "(17) 2137-5000"
                    ],
                    [
                        "cidade" => "São José do Rio Preto",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. DO NORTE PAULISTA - UNORP",
                        "endereco" => "Rua Ipiranga, 3460",
                        "bairro" => "Jd Alto Rio Preto",
                        "cep" => "15020-040",
                        "site" => "www.unorp.br",
                        "telefone" => "(17) 3203-2500 / 2554"
                    ],
                    [
                        "cidade" => "São José do Rio Preto",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO DE RIO PRETO - UNIRP",
                        "endereco" => "Rua Yvete Gabriel Atique, 45",
                        "bairro" => "Boa Vista",
                        "cep" => "15025-400",
                        "site" => "www.unirp.edu.br",
                        "telefone" => "(17) 3211-3000 / 3197"
                    ],
                    [
                        "cidade" => "São José do Rio Preto",
                        "type" => "editorial",
                        "name" => "UNIAO DAS FAC. DOS GRANDES LAGOS - UNILAGO",
                        "endereco" => "Rua Eduardo Nielsen, 960",
                        "bairro" => "Jd. Aeroporto",
                        "cep" => "15030-070",
                        "site" => "www.unilago.edu.br",
                        "telefone" => "(17) 3354-6000"
                    ],
                    [
                        "cidade" => "São José dos Campos",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DO VALE DO PARAÍBA - UNIVAP",
                        "endereco" => "Avenida Shishima Hifumi, 2.911",
                        "bairro" => "bairro Urbanova",
                        "cep" => "12244-000",
                        "site" => "www.univap.br",
                        "telefone" => "(12) 3947-1008"
                    ],
                    [
                        "cidade" => "São José dos Campos",
                        "type" => "editorial",
                        "name" => "UNIV. PAULISTA - UNIP SAO JOSE DOS CAMPOS",
                        "endereco" => "Rod. Presidente Dutra, Km 157,5 Pista Sul",
                        "bairro" => "Limoeiro",
                        "cep" => "12240-420",
                        "site" => "www.unip.br",
                        "telefone" => "(12) 2136-9000"
                    ],
                    [
                        "cidade" => "São Manuel",
                        "type" => "editorial",
                        "name" => "FACULDADE MARECHAL RONDON - FMR",
                        "endereco" => "Rodovia Viscinal Nilo Lisboa Chavasco 5000",
                        "bairro" => "Caixa Postal 19",
                        "cep" => "18650-000",
                        "site" => "https://fmr.edu.br/",
                        "telefone" => "(14) 3842-2000"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIV. ANHANGUERA DE S. PAULO - ANHANGUERA M. CANDIDA",
                        "endereco" => "Rua Maria Cândida, 1813",
                        "bairro" => "Vila Guilherme",
                        "cep" => "02071-013",
                        "site" => "www.anhanguera.com",
                        "telefone" => "(11) 2967-9009 / 9127"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIV. CAMILO CAST.BRANCO - UNICASTELO SAO PAULO (UNIVERSIDADE BRASIL)",
                        "endereco" => "Rua Carolina Fonseca, 584",
                        "bairro" => "Itaquera",
                        "cep" => "08230-030",
                        "site" => "www.universidadebrasil.edu.br",
                        "telefone" => "(11) 2070-0215 / (11) 2070-0000"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "ESCOLA DE EDUCACAO FISICA DA POLICIA MILITAR",
                        "endereco" => "Av. Cruzeiro do Sul, 548",
                        "bairro" => "Caninde",
                        "cep" => "01109-100",
                        "site" => "http://www.policiamilitar.sp.gov.br",
                        "telefone" => "(11) 3229-3622"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO SANTANNA - UNISANTANNA",
                        "endereco" => "Rua Voluntários da Pátria, 257",
                        "bairro" => "Santana",
                        "cep" => "02011-000",
                        "site" => "www.unisantanna.br",
                        "telefone" => "(11) 2175-8000"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP TATUAPE",
                        "endereco" => "R. Antonio de Macedo, 505",
                        "bairro" => "Tatuapé",
                        "cep" => "03087-010",
                        "site" => "www.unip.br",
                        "telefone" => "(11) 2090-4500"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP NORTE",
                        "endereco" => "R. Amazonas da Silva, 737",
                        "bairro" => "V. Guilherme",
                        "cep" => "02051-001",
                        "site" => "www.unip.br",
                        "telefone" => "(11) 2790-1550 / (11) 2790-1588"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP MARQUES - Manhã",
                        "endereco" => "Av. Marquês de São Vicente, 3001",
                        "bairro" => "Água Branca",
                        "cep" => "05036-040",
                        "site" => "www.unip.br",
                        "telefone" => "(11) 3613-7094 / 7042"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP MARQUES - Noite",
                        "endereco" => "Av. Marquês de São Vicente, 3001",
                        "bairro" => "Água Branca",
                        "cep" => "05036-040",
                        "site" => "www.unip.br",
                        "telefone" => "(11) 3613-7094 / 7042"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITÁRIO SANTA RITA DE CÁSSIA  - UNISANTA RITA",
                        "endereco" => "Av. Jaçanã, 648",
                        "bairro" => "Jaçanã",
                        "cep" => "02273-001",
                        "site" => "https://santarita.br",
                        "telefone" => "(11) 2241-0777"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIV. PAULISTA - UNIP PARAISO/VERGUEIRO",
                        "endereco" => "Rua Vergueiro, nº 1211",
                        "bairro" => "Paraíso",
                        "cep" => "01504-001",
                        "site" => "www.unip.br",
                        "telefone" => "(11) 2166-1000/ 2166-1032"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "FACULDADE FLAMINGO",
                        "endereco" => "Rua George Smith, nº 122",
                        "bairro" => "Lapa",
                        "cep" => "05074-010",
                        "site" => "www.faculdadeflamingo.com.br",
                        "telefone" => "(11) 3833-3000"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. ITALO BRASILEIRO - UNIITALO",
                        "endereco" => "Av. João Dias , 2046",
                        "bairro" => "Santo Amaro",
                        "cep" => "04724-003",
                        "site" => "www.italo.com.br",
                        "telefone" => "(11) 5645-0099"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE CRUZEIRO DO SUL - UNICSUL",
                        "endereco" => "Av. Dr. Ussiel Cirilo, 225 ",
                        "bairro" => "São Miguel",
                        "cep" => "08060-070 ",
                        "site" => "www.cruzeirodosul.edu.br",
                        "telefone" => "(11) 2037-5700"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "FACULDADE DE SÃO PAULO - UNiesP (Presencial/EAD)",
                        "endereco" => "Rua Alvares Penteado, 139",
                        "bairro" => "Centro",
                        "cep" => "01012-000",
                        "site" => "http://uniesp.edu.br/sites/centrovelho/index.php",
                        "telefone" => "(11)3111-8900"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP ANCHIETA",
                        "endereco" => "R. Francisco Bautista, 300 - km 12 da Via Anchieta",
                        "bairro" => "Liviero",
                        "cep" => "04182-020",
                        "site" => "www.unip.br",
                        "telefone" => "(11) 2332-1311 / 0800010900"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "ESCOLA DE ARTES, CIÊNCIAS E HUMANIDADES - EACH/USP",
                        "endereco" => "Rua Arlindo Béttio, 1000 Sala 302-C (1)",
                        "bairro" => "Ermelino Matarazzo",
                        "cep" => "03828-000",
                        "site" => "www.each.usp.br",
                        "telefone" => "(11) 3091-1004"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE SANTO AMARO - UNISA",
                        "endereco" => "Rua Dr. Eneas  de Siqueira Neto, 340",
                        "bairro" => "Jd. das Imbuias",
                        "cep" => "04829-300",
                        "site" => "www.unisa.br",
                        "telefone" => "0800 17 17 96\r\n(11) 2141-8555"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIV. NOVE DE JULHO - UNINOVE VILA MARIA",
                        "endereco" => "Rua Guaranésia, 425",
                        "bairro" => "Vila Maria",
                        "cep" => "02112-000",
                        "site" => "www.uninove.br",
                        "telefone" => "(11) 2633-9000"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIV. PAULISTA - UNIP CHAC. SANTO ANTONIO III",
                        "endereco" => "R. Cancioneiro Popular, 210",
                        "bairro" => "Chác. Santo Antônio",
                        "cep" => "04710-000",
                        "site" => "www.unip.br",
                        "telefone" => "(11) 5181-4055\r\n(11) 2114-4000"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE ANHEMBI MORUMBI - UAM",
                        "endereco" => "Rua Dr. Almeida Lima, 1134",
                        "bairro" => "Mooca (Centro)",
                        "cep" => "03164-000",
                        "site" => "www.anhembi.br",
                        "telefone" => "(11) 4007-1192"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITÁRIO ANHANGUERA DE SÃO PAULO - CAMPO LIMPO",
                        "endereco" => "Estrada do Campo Limpo, 3677",
                        "bairro" => "Jd. Campo Limpo",
                        "cep" => "05787-001",
                        "site" => "www.anhanguera.com",
                        "telefone" => " (11) 5843-4444"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERS. ESTÁCIO RADIAL DE SP - ESTÁCIO DE SÁ -INTERLAGOS",
                        "endereco" => "Av. Jangadeiro, 111",
                        "bairro" => "Interlagos",
                        "cep" => "04815-020",
                        "site" => "www.estacio.br",
                        "telefone" => " (11) 4003-6767"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE SAO PAULO - USP BUTANTA - Bacharelado",
                        "endereco" => "Av. Professor Mello Moraes, 65 ",
                        "bairro" => "cidade Universitária",
                        "cep" => "05508-030",
                        "site" => "www.usp.br/eef",
                        "telefone" => "(11) 3091-3166"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE SAO PAULO - USP BUTANTA - Esporte",
                        "endereco" => "Av. Professor Mello Moraes, 65 ",
                        "bairro" => "cidade Universitária",
                        "cep" => "05508-030",
                        "site" => "www.usp.br/eef",
                        "telefone" => "(11)3091-8783"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE SAO PAULO - USP BUTANTA - Licenciatura",
                        "endereco" => "Av. Professor Mello Moraes, 65 ",
                        "bairro" => "cidade Universitária",
                        "cep" => "05508-030",
                        "site" => "www.usp.br/eef",
                        "telefone" => "(11)3091-3135"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. DAS FAC. MET. UNIDAS - FMU",
                        "endereco" => "Av. Liberdade, 899",
                        "bairro" => "Liberdade",
                        "cep" => "01503-001",
                        "site" => "www.fmu.br",
                        "telefone" => "(11)3132-3000\r\n(11) 3346-6266/6275"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "CENTRO UNIV. ADVENTISTA DE SAO PAULO - UNASP",
                        "endereco" => "Est. de Itapecerica, 5859",
                        "bairro" => "Jardim IAE",
                        "cep" => "05858-001",
                        "site" => "www.unasp.edu.br",
                        "telefone" => "(11)2128-6000/6387"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIV. ANHANGUERA DE S. PAULO - ANHANGUERA BELENZINHO",
                        "endereco" => "Rua Siqueira Bueno, 929",
                        "bairro" => "Belenzinho",
                        "cep" => "03172-010",
                        "site" => "www.anhanguera.com",
                        "telefone" => "(11) 3133-7900"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE CIDADE DE SAO PAULO - UNICID",
                        "endereco" => "Rua Cesário Galeno, 448/475",
                        "bairro" => "Tatuapé",
                        "cep" => "03071-000",
                        "site" => "www.unicid.edu.br",
                        "telefone" => "(11) 2178-1200 / 1287"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE SÃO JUDAS TADEU - USJT",
                        "endereco" => "R. Taquari, 546 ",
                        "bairro" => "Mooca",
                        "cep" => "03166-000",
                        "site" => "www.usjt.br",
                        "telefone" => "(11) 2799-1865 / 1677"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE IBIRAPUERA - UNIB",
                        "endereco" => "Av. Interlagos, 1329",
                        "bairro" => "ChácaraFlora",
                        "cep" => "04661-100",
                        "site" => "www.ibirapuera.br",
                        "telefone" => "(11) 5694-7900"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "FACULDADE DE EDUCAÇÃO E TECNOLOGIA IRACEMA",
                        "endereco" => "Rua Airi, 20",
                        "bairro" => "Vila Gomes Cardim",
                        "cep" => "03310-010",
                        "site" => "https://faeti.edu.br/",
                        "telefone" => "(11) 2841-2411 / 2546-7326"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITÁRIO FAM ",
                        "endereco" => "Rua Augusta, 1508",
                        "bairro" => "Consolação",
                        "cep" => "01304-001",
                        "site" => "https://vemprafam.com.br/",
                        "telefone" => "(11) 3469-7600"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "UNIV. NOVE DE JULHO - UNINOVE MEMORIAL",
                        "endereco" => "Av. Dr. Adolpho Pinto, 109 ",
                        "bairro" => "Barra Funda",
                        "cep" => "01156-050",
                        "site" => "www.uninove.br",
                        "telefone" => "(11) 2633-9000"
                    ],
                    [
                        "cidade" => "São Paulo",
                        "type" => "editorial",
                        "name" => "FACULDADE CARLOS DRUMMOND DE ANDRADE - FCDA",
                        "endereco" => "Rua Prof. Pedreira de Freitas, 415",
                        "bairro" => "Tatuapé",
                        "cep" => "03401-001",
                        "site" => "www.drummond.com.br",
                        "telefone" => "(11) 2942-1488"
                    ],
                    [
                        "cidade" => "São Roque",
                        "type" => "editorial",
                        "name" => "FACULDADE SÃO ROQUE",
                        "endereco" => "Rua Sotero de Souza, 104",
                        "bairro" => "Centro",
                        "cep" => "18130-200",
                        "site" => "https://unisaoroque.edu.br/unidade/sao-roque-2/",
                        "telefone" => "(11) 4719-9300"
                    ],
                    [
                        "cidade" => "São Sebastião",
                        "type" => "editorial",
                        "name" => "INSTITUTO DE ENSINO SÃO SEBASTIÃO",
                        "endereco" => "Rua Agripino José do Nascimento, 177",
                        "bairro" => "Vila Amélia",
                        "cep" => "11609-012",
                        "site" => "https://www.fass.edu.br/",
                        "telefone" => "(12) 3893-3100"
                    ],
                    [
                        "cidade" => "São Vicente",
                        "type" => "editorial",
                        "name" => "FACULDADE DE SÃO VICENTE - UNIBR",
                        "endereco" => "Av. Capitão Mor Aguiar, 798",
                        "bairro" => "Centro",
                        "cep" => "11310-200",
                        "site" => "http://www.unibr.com.br",
                        "telefone" => "(13) 3569-8200"
                    ],
                    [
                        "cidade" => "São Vicente",
                        "type" => "editorial",
                        "name" => "UNIÃO BRASILEIRA EDUCACIONAL LTDA - UNIBR",
                        "endereco" => "Av. Capitão Mor Aguiar, 798",
                        "bairro" => "Centro",
                        "cep" => "11310-200",
                        "site" => "www.unibr.com.br",
                        "telefone" => "(13)3569-8200"
                    ],
                    [
                        "cidade" => "Sorocaba",
                        "type" => "editorial",
                        "name" => "FAC. DE EDUC. FIS. ACM DE SOROCABA - FEFISO",
                        "endereco" => "Rua da Penha, 680",
                        "bairro" => "Centro",
                        "cep" => "18010-002",
                        "site" => "www.fefiso.edu.br",
                        "telefone" => "(15) 3234-9115"
                    ],
                    [
                        "cidade" => "Sorocaba",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE PAULISTA - UNIP SOROCABA",
                        "endereco" => "Av. Independência, 210",
                        "bairro" => "Éden",
                        "cep" => "18087-101",
                        "site" => "www.unip.br",
                        "telefone" => "(15) 3412-1000"
                    ],
                    [
                        "cidade" => "Sorocaba",
                        "type" => "editorial",
                        "name" => "FACULDADE ANHANGUERA DE SOROCABA",
                        "endereco" => "Av. Dr. Armando Pannunzio, 1478",
                        "bairro" => "Jd. Vera Cruz",
                        "cep" => "18050-000",
                        "site" => "www.anhanguera.com",
                        "telefone" => "(15) 3031-9300"
                    ],
                    [
                        "cidade" => "Sorocaba",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE SOROCABA - UNISO ",
                        "endereco" => "Rod. Raposo Tavares, km 92.5",
                        "bairro" => "Vila Artura",
                        "cep" => "18023-000",
                        "site" => "www.uniso.br",
                        "telefone" => "(15) 2101-7045 / 7040"
                    ],
                    [
                        "cidade" => "Suzano",
                        "type" => "editorial",
                        "name" => "FACULDADE UNIDA DE SUZANO - UNISUZ",
                        "endereco" => "Rua José Correia Gonçalvez, 57",
                        "bairro" => "Centro",
                        "cep" => "08675-130",
                        "site" => "www.universidadebrasil.edu.br/suzano",
                        "telefone" => "(11) 4746-7300"
                    ],
                    [
                        "cidade" => "Suzano",
                        "type" => "editorial",
                        "name" => "FACULDADE PIAGET - FAC PIAGET",
                        "endereco" => "Av. Mogi das Cruzes, 1001",
                        "bairro" => "Jd. Imperador",
                        "cep" => "08673-010",
                        "site" => "www.faculdadepiaget.com.br",
                        "telefone" => "(11) 4746-7090"
                    ],
                    [
                        "cidade" => "Taboão da Serra",
                        "type" => "editorial",
                        "name" => "FACULDADE ANHANGUERA DE TABOÃO DA SERRA",
                        "endereco" => "Rodovia Régis Bittencourt, 199",
                        "bairro" => "Centro",
                        "cep" => "06764-000",
                        "site" => "https://www.anhanguera.com/home/;",
                        "telefone" => "\r\n(11) 4097-6050"
                    ],
                    [
                        "cidade" => "Taquaritinga",
                        "type" => "editorial",
                        "name" => "FACULDADE DE TAQUARITINGA - UNiesP",
                        "endereco" => "Fazenda Contendas, Caixa Postal 171",
                        "bairro" => "Zona Rural",
                        "cep" => "15900-000",
                        "site" => "www.faculdadedetaquaritinga.edu.br",
                        "telefone" => "(16) 3253-8660"
                    ],
                    [
                        "cidade" => "Taubaté",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE TAUBATE - UNITAU",
                        "endereco" => "Avenida Tiradentes, 500",
                        "bairro" => "Bom Conselho",
                        "cep" => "12030-180",
                        "site" => "www.unitau.br",
                        "telefone" => "(12) 3625-4275 \r\n(12) 3629-7479"
                    ],
                    [
                        "cidade" => "Tietê",
                        "type" => "editorial",
                        "name" => "FACULDADE DE TIETÊ UNiesP S/A",
                        "endereco" => "Rua Santa Terezinha, 425",
                        "bairro" => "Belvedere",
                        "cep" => "18530-010",
                        "site" => "http://uniesp.edu.br/sites/tiete",
                        "telefone" => "(15) 3282-7548"
                    ],
                    [
                        "cidade" => "Tupã",
                        "type" => "editorial",
                        "name" => "FACULDADES ESEFAP - TUPA",
                        "endereco" => "Rua Mandaguaris, 274",
                        "bairro" => "Centro",
                        "cep" => "17600-050",
                        "site" => "http://uniesp.edu.br/sites/tupa/",
                        "telefone" => "(14) 3495-1080"
                    ],
                    [
                        "cidade" => "Ubatuba",
                        "type" => "editorial",
                        "name" => "UNIVERSIDADE DE TAUBATE - UNITAU UBATUBA (EAD)",
                        "endereco" => "Av. Castro Alves, 392",
                        "bairro" => "Itaguá",
                        "cep" => "11680-000",
                        "site" => "www.unitau.br",
                        "telefone" => "(12) 3629-7479 / 0800 55 7255"
                    ],
                    [
                        "cidade" => "Votuporanga",
                        "type" => "editorial",
                        "name" => "CENTRO UNIVERSITARIO DE VOTUPORANGA - UNIFEV",
                        "endereco" => "Rua Pernambuco, 4196",
                        "bairro" => "Centro",
                        "cep" => "15500-006",
                        "site" => "www.unifev.edu.br",
                        "telefone" => "(17) 3405-9999(r. 862)"
                    ]
        
            ];
    }
}
