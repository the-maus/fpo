<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertProcedimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedimentos = [
            ['codigo_procedimento' => '9900000001', 'descricao' => 'DUPLEX SCAN VENOSO MEM INF UNILATERAL', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101010010', 'descricao' => 'ATIVIDADE EDUCATIVA / ORIENTACAO EM GRUPO NA ATENCAO BASICA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101010028', 'descricao' => 'ATIVIDADE EDUCATIVA / ORIENTACAO EM GRUPO NA ATENCAO ESPECIALIZADA', 'valor_unitario' => 1.7],
            ['codigo_procedimento' => '0101010036', 'descricao' => 'PRATICA CORPORAL / ATIVIDADE FISICA EM GRUPO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101010044', 'descricao' => 'PRATICAS CORPORAIS EM MEDICINA TRADICIONAL CHINESA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101010052', 'descricao' => 'TERAPIA COMUNITARIA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101010060', 'descricao' => 'DANCA CIRCULAR/BIODANCA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101010079', 'descricao' => 'YOGA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101010087', 'descricao' => 'OFICINA DE MASSAGEM/ AUTO-MASSAGEM', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101020015', 'descricao' => 'ACAO COLETIVA DE APLICACAO TOPICA DE FLUOR GEL', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101020023', 'descricao' => 'ACAO COLETIVA DE BOCHECHO FLUORADO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101020031', 'descricao' => 'ACAO COLETIVA DE ESCOVACAO DENTAL SUPERVISIONADA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101020040', 'descricao' => 'ACAO COLETIVA DE EXAME BUCAL COM FINALIDADE EPIDEMIOLOGICA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101020058', 'descricao' => 'APLICACAO DE CARIOSTATICO (POR DENTE)', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101020066', 'descricao' => 'APLICACAO DE SELANTE (POR DENTE)', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101020074', 'descricao' => 'APLICACAO TOPICA DE FLUOR (INDIVIDUAL POR SESSAO)', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101020082', 'descricao' => 'EVIDENCIACAO DE PLACA BACTERIANA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101020090', 'descricao' => 'SELAMENTO PROVISORIO DE CAVIDADE DENTARIA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101030010', 'descricao' => 'VISITA DOMICILIAR POR PROFISSIONAL DE NIVEL MEDIO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101030029', 'descricao' => 'VISITA DOMICILIAR/INSTITUCIONAL POR PROFISSIONAL DE NIVEL SUPERIOR', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101040024', 'descricao' => 'AVALIACAO ANTROPOMETRICA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101040032', 'descricao' => 'COLETA EXTERNA DE LEITE MATERNO (POR DOADORA)', 'valor_unitario' => 3],
            ['codigo_procedimento' => '0101040040', 'descricao' => 'PASTEURIZACAO DO LEITE HUMANO (CADA 5 LITROS)', 'valor_unitario' => 11.06],
            ['codigo_procedimento' => '0101040059', 'descricao' => 'ADMINISTRACAO DE VITAMINA A', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0101040067', 'descricao' => 'APLICACAO DE SUPLEMENTOS DE MICRONUTRIENTES', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010056', 'descricao' => 'ATIVIDADES EDUCATIVAS PARA O SETOR REGULADO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010064', 'descricao' => 'ANALISE DE PROJETOS BASICOS DE ARQUITETURA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010072', 'descricao' => 'CADASTRO DE ESTABELECIMENTOS SUJEITOS A VIGILANCIA SANITARIA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010145', 'descricao' => 'INSPECAO SANITARIA DE HOSPITAIS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010153', 'descricao' => 'INVESTIGACAO DE EVENTOS ADVERSOS E/OU QUEIXAS TECNICAS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010161', 'descricao' => 'EXCLUSAO DE CADASTRO DE ESTABELECIMENTOS SUJEITOS A VIGILANCIA SANITARIA COM ATIVIDADES ENCERRADAS.', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010170', 'descricao' => 'INSPECAO DOS ESTABELECIMENTOS SUJEITOS A VIGILANCIA SANITARIA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010188', 'descricao' => 'LICENCIAMENTO DOS ESTABELECIMENTOS SUJEITOS A VIGILANCIA SANITARIA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010196', 'descricao' => 'APROVACAO DE PROJETOS BASICOS DE ARQUITETURA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010200', 'descricao' => 'INVESTIGACAO DE SURTOS DE DOENCAS TRANSMITIDAS POR ALIMENTOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010218', 'descricao' => 'INVESTIGACAO DE SURTOS DE INFECCAO EM SERVICOS DE SAUDE', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010226', 'descricao' => 'ATIVIDADE EDUCATIVA PARA A POPULACAO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010234', 'descricao' => 'RECEBIMENTO DE DENUNCIAS/RECLAMACOES', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010242', 'descricao' => 'ATENDIMENTO A DENUNCIAS/RECLAMACOES', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010250', 'descricao' => 'CADASTRO DE HOSPITAIS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010269', 'descricao' => 'LICENCIAMENTO SANITARIO DE HOSPITAIS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010277', 'descricao' => 'CADASTRO DE INSTITUICOES DE LONGA PERMANENCIA PARA IDOSOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010285', 'descricao' => 'INSPECAO SANITARIA DE INSTITUICOES DE LONGA PERMANENCIA PARA IDOSOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010293', 'descricao' => 'LICENCIAMENTO SANITARIO DE INSTITUICOES DE LONGA PERMANENCIA PARA IDOSOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010307', 'descricao' => 'CADASTRO DE INDUSTRIAS DE MEDICAMENTOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010315', 'descricao' => 'INSPECAO SANITARIA DE INDUSTRIA DE MEDICAMENTOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010323', 'descricao' => 'LICENCIAMENTO SANITARIO DE INDUSTRIAS DE MEDICAMENTOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010331', 'descricao' => 'CADASTRO DE SERVICOS DE DIAGNOSTICO E TRATAMENTO DO CANCER DE COLO DE UTERO E MAMA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010340', 'descricao' => 'INSPECAO SANITARIA DE SERVICOS DE DIAGNOSTICO E TRATAMENTO DO CANCER DE COLO DE UTERO E MAMA.', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010358', 'descricao' => 'LICENCIAMENTO SANITARIO DE SERVICOS DE DIAGNOSTICO E TRATAMENTO DO CANCER DE COLO DE UTERO E MAMA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010366', 'descricao' => 'CADASTRO DE SERVICOS HOSPITALARES DE ATENCAO AO PARTO E A CRIANCA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010374', 'descricao' => 'INSPECAO SANITARIA DE SERVICOS HOSPITALARES DE ATENCAO AO PARTO E A CRIANCA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010382', 'descricao' => 'LICENCIAMENTO SANITARIO DE SERVICOS HOSPITALARES DE ATENCAO AO PARTO E A CRIANCA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010390', 'descricao' => 'CADASTRO DE SERVICOS DE HEMOTERAPIA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010404', 'descricao' => 'INSPECAO SANITARIA DE SERVICOS DE HEMOTERAPIA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010412', 'descricao' => 'LICENCIAMENTO SANITARIO DE SERVICOS DE HEMOTERAPIA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010420', 'descricao' => 'CADASTRO DE SERVICOS DE TERAPIA RENAL SUBSTITUTIVA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010439', 'descricao' => 'INSPECAO SANITARIA DE SERVICOS DE TERAPIA RENAL SUBSTITUTIVA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010447', 'descricao' => 'LICENCIAMENTO SANITARIO DE SERVICOS DE TERAPIA RENAL SUBSTITUTIVA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010455', 'descricao' => 'CADASTRO DE SERVICOS DE ALIMENTACAO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010463', 'descricao' => 'INSPECAO SANITARIA DE SERVICOS DE ALIMENTACAO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010471', 'descricao' => 'LICENCIAMENTO SANITARIO DE SERVICOS DE ALIMENTACAO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010480', 'descricao' => 'FISCALIZACAO DO USO DE PRODUTOS FUMIGENOS DERIVADOS DO TABACO EM AMBIENTES COLETIVOS FECHADOS, PUBLICOS OU PRIVADOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010498', 'descricao' => 'LAUDO DE ANALISE LABORATORIAL DO PROGRAMA DE MONITORAMENTO DE ALIMENTOS RECEBIDOS PELA VIGILANCIA SANITARIA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010501', 'descricao' => 'ATIVIDADES EDUCATIVAS SOBRE A TEMATICA DA DENGUE,REALIZADAS PARA A POPULACAO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010510', 'descricao' => 'ATIVIDADES EDUCATIVAS,COM RELACAO AO CONSUMO DE SODIO, ACUCAR E GORDURAS, REALIZADAS PARA O SETOR REGULADO E A POPULACAO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010528', 'descricao' => 'INSTAURACAO DE PROCESSO ADMINISTRATIVO SANITARIO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010536', 'descricao' => 'CONCLUSAO DE PROCESSO ADMINISTRATIVO SANITARIO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010544', 'descricao' => 'CADASTRO DE INDUSTRIAS DE INSUMOS FARMACEUTICOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010552', 'descricao' => 'CADASTRO DE INDUSTRIAS DE PRODUTOS PARA SAUDE', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010560', 'descricao' => 'INSPECAO SANITARIA DE INDUSTRIAS DE INSUMOS FARMACEUTICOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010579', 'descricao' => 'INSPECAO SANITARIA DE INDUSTRIAS DE PRODUTOS PARA SAUDE', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010587', 'descricao' => 'IMPLEMENTACAO DE PROCEDIMENTOS (POPS) HARMONIZADOS EM NIVEL TRIPARTITE RELACIONADOS A INSPECAO EM ESTABELECIMENTOS FABRICANTES DE MEDICAMENTOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010595', 'descricao' => 'IMPLEMENTACAO DE PROCEDIMENTOS (POPS) HARMONIZADOS EM NIVEL TRIPARTITE RELACIONADOS A INSPECAO EM ESTABELECIMENTOS FABRICANTES DE INSUMOS FARMACEUTICOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010609', 'descricao' => 'IMPLEMENTACAO DE PROCEDIMENTOS (POPS) HARMONIZADOS EM NIVEL TRIPARTITE RELACIONADOS A INSPECAO EM ESTABELECIMENTOS FABRICANTES DE PRODUTOS PARA SAUDE', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010617', 'descricao' => 'ENVIO DE RELATORIOS DE INSPECAO DE ESTABELECIMENTOS FABRICANTES DE MEDICAMENTOS A ANVISA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010625', 'descricao' => 'ENVIO DE RELATORIOS DE INSPECAO DE ESTABELECIMENTOS FABRICANTES DE INSUMOS FARMACEUTICOS A ANVISA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010633', 'descricao' => 'ENVIO DE RELATORIOS DE INSPECAO DE ESTABELECIMENTOS FABRICANTES DE PRODUTOS PARA SAUDE A ANVISA', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010641', 'descricao' => 'AUDITORIAS INTERNAS REALIZADAS NO DEPARTAMENTO RESPONSAVEL PELAS ATIVIDADES DE INSPECAO DE ESTABELECIMENTOS FABRICANTES DE MEDICAMENTOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010650', 'descricao' => 'AUDITORIAS INTERNAS REALIZADAS NO DEPARTAMENTO RESPONSAVEL PELAS ATIVIDADES DE INSPECAO DE ESTABELECIMENTOS FABRICANTES DE INSUMOS FARMACEUTICOS', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102010668', 'descricao' => 'AUDITORIAS INTERNAS REALIZADAS NO DEPARTAMENTO RESPONSAVEL PELAS ATIVIDADES DE INSPECAO DE ESTABELECIMENTOS FABRICANTES DE PRODUTOS PARA SAUDE', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102020019', 'descricao' => 'VIGILANCIA DA SITUACAO DE SAUDE DOS TRABALHADORES', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102020027', 'descricao' => 'ATIVIDADE EDUCATIVA EM SAUDE DO TRABALHADOR', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0102020035', 'descricao' => 'INSPECAO SANITARIA EM SAUDE DO TRABALHADOR', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0201010011', 'descricao' => 'AMNIOCENTESE', 'valor_unitario' => 2.2],
            ['codigo_procedimento' => '0201010020', 'descricao' => 'BIOPSIA / PUNCAO DE TUMOR SUPERFICIAL DA PELE', 'valor_unitario' => 14.1],
            ['codigo_procedimento' => '0201010038', 'descricao' => 'BIOPSIA CIRURGICA DE TIREOIDE', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0201010046', 'descricao' => 'BIOPSIA DE ANUS E CANAL ANAL', 'valor_unitario' => 18.46],
            ['codigo_procedimento' => '0201010054', 'descricao' => 'BIOPSIA DE BACO POR PUNCAO / ASPIRACAO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0201010062', 'descricao' => 'BIOPSIA DE BEXIGA', 'valor_unitario' => 41.68],
            ['codigo_procedimento' => '0201010070', 'descricao' => 'BIOPSIA DE BOLSA ESCROTAL', 'valor_unitario' => 18.33],
            ['codigo_procedimento' => '0201010089', 'descricao' => 'BIOPSIA DE CONDUTO AUDITIVO EXTERNO', 'valor_unitario' => 19.06],
            ['codigo_procedimento' => '0201010097', 'descricao' => 'BIOPSIA DE CONJUNTIVA', 'valor_unitario' => 31.1],
            ['codigo_procedimento' => '0201010100', 'descricao' => 'BIOPSIA DE CORDAO ESPERMATICO (UNILATERAL)', 'valor_unitario' => 46.19],
            ['codigo_procedimento' => '0201010119', 'descricao' => 'BIOPSIA DE CORNEA', 'valor_unitario' => 68.62],
            ['codigo_procedimento' => '0201010127', 'descricao' => 'BIOPSIA DE CORPO VERTEBRAL A CEU ABERTO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0201010135', 'descricao' => 'BIOPSIA DE CORPO VERTEBRAL LAMINA E PEDICULO VERTEBRAL (POR DISPOSITIVO GUIADO)', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0201010143', 'descricao' => 'BIOPSIA DE ENDOCARDIO / MIOCARDIO', 'valor_unitario' => 1],
            ['codigo_procedimento' => '0201010151', 'descricao' => 'BIOPSIA DE ENDOMETRIO', 'valor_unitario' => 18.33],
        ];

        foreach ($procedimentos as $procedimento) {
            DB::table('procedimentos')->insert($procedimento);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('procedimentos')->delete();
    }
}
