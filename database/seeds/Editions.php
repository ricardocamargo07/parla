<?php
use App\Data\Models\Article;
use App\Data\Models\ArticleAuthor;
use App\Data\Models\ArticlePhoto;
use App\Data\Models\Edition;
use Illuminate\Database\Seeder;

class Editions extends Seeder
{
    public function run()
    {
        $edition = Edition::create([
            'year' => 2018,
            'month' => 2,
            'number' => 0,
            'published_at' => null
        ]);

        $this->createArticle1($edition);
        $this->createArticle2($edition);
        $this->createArticle3($edition);
        $this->createArticle4($edition);
        $this->createArticle5($edition);

        $edition = Edition::create([
            'year' => 2018,
            'month' => 6,
            'number' => 1,
            'published_at' => null
        ]);

        $this->createArticle6($edition); // materia 1
        $this->createArticle7($edition); // materia 2
        $this->createArticle8($edition); // materia 3
        $this->createArticle9($edition); // materia 4
    }

    private function createArticle1($edition)
    {
        $article = Article::create([
            'edition_id' => $edition->id,
            'title' => 'Alerj na folia',
            'order' => 1,
            'published_at' => '2018-06-11',
            'category' => 'Cidade',
            'subtitle' => 'Das escadarias do Palácio à Passarela do Samba',
            'lead' =>
                'Entre os dias 9 e 13 de fevereiro, o Rio de Janeiro será tomado por plumas, paetês e muito samba no pé. Para muitos funcionários da Assembleia Legislativa do Estado do Rio de Janeiro (Alerj) esta é a época do ano mais esperada. É o momento de vestir a fantasia e defender na Marques de Sapucaí as cores das suas escolas de samba do coração.',
            'body' =>
                'Este é o caso da auxiliar de serviços gerais, Daiza Maria da Conceição, de 60 anos. Moradora  de Manguinhos, na Zona Norte da cidade, Daiza  marca presença na quadra da Estação Primeira de  Mangueira e nos desfiles da escola na Sapucaí desde criança.  "Já desfilo há tanto tempo que nem lembro há quantos anos saio pela minha escola do coração",  admite Daiza, que há 26 anos trabalha nas dependências do Palácio Tiradentes e no prédio anexo da Alerj. Todas as quintas-feiras e domingos Daiza não abre mão do ensaio no Palácio do Samba, quadra da Mangueira, para no domingo de Carnaval se somar à Ala da Comunidade da escola e  fazer "bonito na avenida".
Outro apaixonado por samba é Gabriel Eleno da Conceição,  mais conhecido como Gabriel Sorriso. Operador e editor de áudio na Alerj, Sorriso dedica todo o seu tempo livre à composição de sambas. No ano passado, Sorriso teve duas alegrias: foi campeão na escolha do samba enredo da Acadêmicos do Engenho da Rainha (grupo B) e da Acadêmicos de Madureira (grupo D). "Sempre estive envolvido com a música, especialmente com o samba carioca e sua tradição. É uma paixão antiga. Participei de outras escolhas de samba-enredo, mas 2018 me deu alegria em dobro", disse ele.
## Novato na Casa, antigo no samba
Recentemente o time de compositores da Alerj ganhou mais um nome, o serralheiro Antônio Conceição. Apesar de compartilhar do mesmo sobrenome e paixão pelo samba que seus colegas, eles não são da mesma família. Ele começou a trabalhar na oficina da Casa em janeiro deste ano, mas frequenta  o mundo do samba desde 1981, quando começou a compor para blocos e escolas de samba.
Em 1992, Antônio Nick, como é conhecido, passou a interpretar sambas e só na Sapucaí, foram 15 anos em cima do carro de som de agremiações como a Inocentes de Belford Roxo e a União de Jacarepaguá. "Desde garoto sempre gostei de brincar Carnaval. Depois passei a compor e a cantar, e não consigo imaginar a minha vida sem o Carnaval", disse Nick, que este ano estará defendendo o samba da Império da Uva, agremiação de Nova Iguaçu, na Baixada Fluminense.
',
            'featured' => true
        ]);

        $article->attachTags(['cidade', 'carnaval']);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Symone Munay'
        ]);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Vanessa Schumacker'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => true,
            'url_highres' =>
                '/images/photos/gabriel-sorriso1_rafael-wallace.jpg',
            'url_lowres' =>
                '/images/photos/gabriel-sorriso1_rafael-wallace-1200x800.jpg',
            'author' => 'Rafael Wallace',
            'notes' =>
                'O operador e editor de áudio da Alerj, Gabriel Sorriso dedica todo o seu tempo livre à composição de sambas.  "É uma paixão antiga", assume.'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => false,
            'url_highres' =>
                '/images/photos/antonio-conceicao4_01_02_2018-thiago-lontra.jpg',
            'url_lowres' =>
                '/images/photos/antonio-conceicao4_01_02_2018-thiago-lontra-1200x900.jpg',
            'author' => 'Thiago Lontra',
            'notes' =>
                'O serralheiro Antonio Conceição atua como compositor e interprete'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => false,
            'url_highres' => '/images/photos/daisa-conceicao.jpg',
            'url_lowres' => '/images/photos/daisa-conceicao.jpg',
            'author' => '',
            'notes' =>
                'A auxiliar de serviços gerais, Daiza Maria, desfila pela Mangueira desde criança'
        ]);
        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => false,
            'url_highres' => '/images/photos/gabriel-sorriso.jpg',
            'url_lowres' => '/images/photos/gabriel-sorriso.jpg',
            'author' => '',
            'notes' =>
                'Sorriso já teve dois sambas-enredo escolhidos por escolas de samba dos grupos B e D'
        ]);
    }

    private function createArticle2($edition)
    {
        $article = Article::create([
            'edition_id' => $edition->id,
            'title' => 'A-la-la-ô mas que calor... Cuide-se no verão',
            'order' => 2,
            'published_at' => '2018-06-11',
            'category' => 'Saúde',
            'created_at' => '2018-02-08',
            'subtitle' =>
                'Saiba como curtir o Carnaval se protegendo do verão carioca',
            'lead' =>
                'Fevereiro chegou e com ele os dias de folia. Fantasias prontas, agenda de blocos conferida e marchinhas na ponta da língua são primordiais para quem curte o  Carnaval no Rio de Janeiro, que esse ano será do dia 9 a 13 de fevereiro. Mas no auge do verão carioca, muitos esquecem de cuidar da saúde antes de aproveitar a festa de Momo. A Riotur informou que espera seis milhões de foliões no Rio, 400 mil turistas a mais que em 2017.',
            'body' =>
                'Com o calor e tantas pessoas na rua, algumas doenças se proliferam com mais facilidade. Mononucleose, herpes e insolação são alguns casos frequentes registrados nesta época do ano. Para evitar que doenças estraguem a festa, a diretora do departamento médico da Alerj, Mônica Antun Maia, dá algumas dicas para os funcionários da Casa curtirem com tranquilidade:
- Protetor solar: é fundamental passar o protetor antes de sair de casa e reaplicá-lo ao longo do dia, mesmo com o céu nublado. A radiação ultravioleta pode causar danos como, manchas, queimaduras e envelhecimento precoce.  
- Camisinha: como já dizia a roqueira Rita Lee, “amor é bossa nova, sexo é Carnaval”. O preservativo é o melhor método para prevenir gravidez indesejada, doenças sexualmente transmissíveis, como sífilis, HPV e Aids. De acordo com as secretarias municipal e estadual de Saúde, serão distribuídas sete milhões de camisinhas
nos dias de festa. Procure um posto e garanta a sua.   
- Hidratação: “Bebeu água? Não! Tá com sede? Tô. Olha, olha, olha, olha a água mineral”. Não espere se hidratar apenas quando a sede chegar. Esse deve ser o hino dos foliões. A água ajuda a manter o corpo hidratado e previne uma possível ressaca.
- Comida: estar bem alimentado é fundamental para aguentar as horas extensas dos blocos e desfiles. Coma bem antes de sair de casa e durante o dia procure estabelecimentos, como restaurantes, padarias e lanchonetes. Evite comer na rua. Muitas pessoas acabam perdendo o restante do Carnaval ao ter uma infecção alimentar.
- O que levar: fique atento aos itens que precisam acompanhar o folião. O álcool gel é importante para fazer uma higienização rápida e evitar a contaminação. Já o repelente evita que os mosquitos transmissores da dengue, chikungunya, zika e febre amarela tenham contato com a pele do Carnavalesco. E, por fim, tenha sempre um documento de identificação.
',
            'featured' => false
        ]);

        $article->attachTags(['saúde', 'carnaval']);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Buanna Rosa'
        ]);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'David Barbosa'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => true,
            'url_highres' =>
                '/images/photos/1070-materia-saude-carnaval-rafael-wallace.jpg',
            'url_lowres' =>
                '/images/photos/1070-materia-saude-carnaval-rafael-wallace-1200x800.jpg',
            'author' => 'Rafael Wallace',
            'notes' =>
                'A diretora do departamento médico, Mônica Antun Maia, reforça a importância da aplicação frequente do protetor solar e do consumo de muito líquido para ajudar na hidratação'
        ]);
    }

    private function createArticle3($edition)
    {
        $article = Article::create([
            'edition_id' => $edition->id,
            'title' => "Cultura africana no Centro do Rio",
            'order' => 3,
            'published_at' => '2018-06-11',
            'category' => 'Cultura',
            'created_at' => '2018-02-08',
            'subtitle' =>
                'Mostra acontece no CCBB, a poucos metros da Alerj, e ficará em cartaz até o dia 26/03',
            'lead' =>
                'A representatividade dos povos africanos e a divulgação de suas identidades culturais são os temas centrais da exposição “Ex África”, que está em cartaz no Centro Cultural Banco do Brasil (CCBB) até o dia 26 de março. A mostra conta com vídeos, músicas, esculturas, fotografias e pinturas que remetem à cultura africana contemporânea. A entrada é franca e a exposição está aberta de quarta a segunda, das 9h às 21h. A poucos metros da Assembleia Legislativa do Estado do Rio de Janeiro (Alerj), o CCBB é uma ótima opção cultural para quem trabalha no Centro e está localizado na Rua Primeiro de Março, número 66.',
            'body' =>
                '
A exposição aborda desde a vida corrida nos grandes centros urbanos africanos até as desigualdades sociais presentes no continente. Entre os destaques está a sala dedicada ao Afrobeat, ritmo musical popular na cidade de Lagos, maior centro urbano da Nigéria e da África.
Outro ponto alto da mostra é o ensaio fotográfico Code Noir (Código Negro), do fotógrafo Leonce Raphael Agbodjelou, que é natural da República do Benim.  O Código Negro era um decreto francês sobre como gerenciar escravos. Agbodjelou representa de forma sensível as tristes heranças da escravidão em seu país. Ele fotografou, entre outras coisas, descendentes de escravos com fotos de seus parentes e locais que foram marcados por essa triste história, como uma quadra de basquete que em outros tempos foi um mercado de escravos.
Ao todo, Ex África conta com obras de 18 artistas africanos e dois afro-brasileiros, Arjan Martins e Dalton Paula. A curadoria da exposição é realizada por Alfons Hug, que era diretor do Instituto Goethe na cidade de Lagos, e Ade Bantu, responsável pelo Clube Lagos, que conta com um acervo de música popular da cidade africana.  
## Fique por dentro da Alerj
Para que o Estado do Rio tenha cada vez mais exposições sobre a cultura africana e sua importância na constituição do povo brasileiro, a Alerj aprovou a Lei 7.851/18, que estabelece diretrizes para a criação de um museu afro-brasileiro na capital fluminense. A norma, de autoria do deputado Geraldo Pudim (PMDB), foi sancionada pelo governador Luiz Fernando Pezão no dia 16 de janeiro.
O acervo do futuro museu será composto por objetos que possam reconstituir a contribuição cultural e histórica dos afrodescendentes. O espaço cultural também será responsável pela capacitação de professores e intelectuais para implantarem estudos sobre a escravidão e cultura africana nas instituições de ensino do Rio.
“A escravidão é o fato histórico mais relevante da história do Brasil. Seus efeitos sociais, culturais e econômicos estão em toda parte. A violência da escravidão durou mais de 300 anos, consumiu a vida de 3 milhões de africanos e de incontáveis descendentes, e deu ao país a fisionomia mestiça, injusta e desigual que ele tem até hoje”, argumentou o autor da lei.
',
            'featured' => false
        ]);

        $article->attachTags(['exposição', 'arte', 'áfrica', 'ccbb']);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Gustavo Natario'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => true,
            'url_highres' =>
                '/images/photos/ex-africa-foto-alexandre-macieira-riotur.jpg',
            'url_lowres' =>
                '/images/photos/ex-africa-foto-alexandre-macieira-riotur-1200x800.jpg',
            'author' => 'Alexandre Macieira',
            'notes' =>
                'A exposição "Ex Africa" ocupa o CCBB até o dia 26 de março com obras de 18 artistas sobre a  representatividade dos povos africanos'
        ]);
        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => false,
            'url_highres' =>
                '/images/photos/ex-africa-2-foto-alexandre-macieira-riotur.jpg',
            'url_lowres' =>
                '/images/photos/ex-africa-2-foto-alexandre-macieira-riotur-1200x800.jpg',
            'author' => 'Alexandre Macieira',
            'notes' =>
                'Outro ponto alto da mostra é o ensaio fotográfico Code Noir (Código Negro), do fotógrafo Leonce Raphael Agbodjelou'
        ]);
        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => false,
            'url_highres' =>
                '/images/photos/ex-africa-3-foto-alexandre-macieira-riotur.jpg',
            'url_lowres' =>
                '/images/photos/ex-africa-3-foto-alexandre-macieira-riotur-1200x800.jpg',
            'author' => 'Alexandre Macieira',
            'notes' =>
                'A entrada é franca e a exposição está aberta de quarta a segunda'
        ]);
    }

    private function createArticle4($edition)
    {
        $article = Article::create([
            'edition_id' => $edition->id,
            'title' => "Curiosidades do Palácio Tiradentes",
            'order' => 4,
            'published_at' => '2018-06-11',
            'category' => 'Alerj',
            'created_at' => '2018-02-08',
            'subtitle' => '',
            'lead' =>
                'Todos que circulam diariamente pelo Palácio Tiradentes sabem que há muita história a contar nesses 92 anos de existência. O prédio chama a atenção por sua beleza arquitetônica e também pela imponência. A atual sede da Assembleia Legislativa do Estado do Rio de Janeiro já foi cadeia no Brasil Colônia - onde inclusive o mártir da Inconfidência Mineira, Tiradentes, ficou preso e, já na República, foi Câmara dos Deputados.',
            'body' =>
                '
Um local de tantas histórias tem alguns detalhes que podem passar despercebidos. Você sabia, por exemplo, que onde hoje funciona um banco, no térreo, já foi um restaurante?
O restaurante, com paredes e colunas decoradas com detalhes em gesso, tinha cozinha e mobiliário para comportar até 150 pessoas. Os artistas Augusto José Marques Júnior e Genesco Murta pintaram seis painéis para decorar as paredes. Os tamanhos das pinturas variam entre 1,58m de altura por 1,54m e 2,6m de largura e representam cenas do campo e da pecuária. As telas são descritas pelos artistas como a “visão bucólica das paisagens nativas, representando poéticos cenários dos nossos crepúsculos sobre os campos lavradios”. O restaurante, no entanto, foi desativado há décadas. Desde 1984, o atual banco ocupa o espaço que guarda ainda lembranças do seu passado.
',
            'featured' => false
        ]);

        $article->attachTags(['palácio tiradentes']);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Symone Munay'
        ]);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Leon Lucius'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => true,
            'url_highres' => '/images/photos/antigo-restaurante.jpg',
            'url_lowres' => '/images/photos/antigo-restaurante-1200x800.jpg',
            'author' => '',
            'notes' =>
                'O salão no térreo hoje ocupado por uma agência bancária já foi um restaurante com capacidade para atender até 150 clientes'
        ]);
    }

    private function createArticle5($edition)
    {
        $article = Article::create([
            'edition_id' => $edition->id,
            'title' => "Onde solucionar seu problema",
            'order' => 5,
            'published_at' => null,
            'category' => 'RH',
            'created_at' => '2018-02-08',
            'subtitle' => '',
            'lead' =>
                'Sabe aquela papelada de trabalho que você precisa agilizar, mas não sabe por onde começar?  A equipe da Subdiretoria de Recursos Humanos da Alerj (RH) está a postos para ajudar a resolver tudo isso.',
            'body' =>
                '
Para começar, qualquer demanda sobre **Legislação de Pessoal**, ligue 1370. Este canal atendente a todos os servidores efetivos, requisitados e demais colaboradores da Casa.
Para casos específicos entre em contato com o setor através dos seguintes números:
Caso seja **efetivo**, o número é 1395;
Se você é **comissionado**, ligue para 1493;
Servidores **requisitados**, 1368;
Para os **estagiários**, o ramal de atendimento é 1369.
',
            'featured' => false
        ]);

        $article->attachTags(['rh', 'administrativo']);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Symone Munay'
        ]);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Leon Lucius'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => true,
            'url_highres' => '/images/photos/humano-papel-e-caneta.jpg',
            'url_lowres' => '/images/photos/humano-papel-e-caneta.jpg',
            'author' => 'Parla - Alerj',
            'notes' => ''
        ]);
    }

    private function createArticle6($edition)
    {
        $article = Article::create([
            'edition_id' => $edition->id,
            'title' => 'Elerj: diploma na mão',
            'order' => 1,
            'published_at' => '2018-06-18',
            'category' => 'Escola do Legislativo',
            'created_at' => '2018-06-18',
            'subtitle' =>
                'Primeira turma da pós-graduação se forma em outubro',
            'lead' =>
                'A primeira turma de pós-graduação da Escola do Legislativo do Estado do Rio de Janeiro (Elerj) termina o curso em outubro. Autorizada pelo Conselho Estadual de Educação (CEE-RJ) em maio de 2017, a pós de Gestão no Poder Legislativo conta com 44 alunos e, segundo a diretora a Elerj, Rosemery Borges, a criação de novas turmas já está nos planos para o próximo ano.',
            'body' =>
                'A qualificação é primordial para o Legislativo e queremos que esse projeto permaneça. Inclusive, demos entrada no Ministério de Educação (MEC), no mês de maio, solicitando autorização para a implementação do mestrado na Elerj. Um passo importante para a nossa Casa e para os funcionários que trabalham aqui”, afirmou Rosemery.

Desde outubro de 2017, o sonho de se formar em uma pós-graduação ficou mais perto para Henry Ferraz, assessor parlamentar da liderança do MDB na Assembleia Legislativa do Estado do Rio (Alerj). “Sou formado em Ciência Política pela Universidade Federal do Estado do Rio de Janeiro (Unirio) e sempre tive interesse em me especializar. Poder me qualificar na área em que eu trabalho foi uma oportunidade incrível. O curso me trouxe enriquecimento teórico para a prática que eu exerço”, afirmou Ferraz, que já está produzindo o Trabalho de Conclusão de Curso (TCC. Para se formar, os alunos terão que produzir um artigo científico e publicá-lo.

## Caminho percorrido

Para receber a permissão do CEE-RJ, a Elerj precisou atender a três requisitos: corpo docente, projeto pedagógico e instalações. "Nós avaliamos que a Elerj tinha plenas condições legais e técnicas para ministrar esses cursos", afirmou Marcelo Rosa, relator e conselheiro do CEE-RJ. Após a implementação do curso de pós, Rosemery acredita conseguir o mestrado de forma mais fácil.

O que eles falam sobre o curso:

Gabriela Rocha - Assessora Parlamentar da deputada Márcia Jeovani (DEM)
As aulas são maravilhosas. Sou publicitária e adorei as aulas de Marketing Público, o conteúdo vai me ajudar muito na aplicação do que eu já aprendi na faculdade. Outra matéria que achei muito interessante foi a de Estrutura e Funcionamento do Processo Legislativo. Aprendi mais sobre a formação da política e o agir da sociedade.

![Gabriela Rocha](/images/photos/gabriela-rocha-citacao-elerj-thiago-lontra-1200x800.jpg)

**Welberth Saddi - Consultor Orçamentário e Financeiro da Alerj**
> Como gestor de departamento, me especializar é sempre importante. A pós me ajudou a entender melhor como trabalhar com a minha equipe e conseguir melhores resultados. Trabalho no dia a dia com a área orçamentária e poder trocar o conhecimento que eu tenho com os outros alunos foi incrível também.

![Welberth Saddi](/images/photos/welberth-saddi-citacao-elerj-thiago-lontra-1200x800.jpg)


Gabriela Naegele - Assessora Parlamentar do deputado Luiz Paulo (PSDB)
O curso ampliou o meu leque de amizades na Casa. Passei a conhecer melhor pessoas que trabalham no administrativo, com quem tinha pouco contato. Além dos relacionamentos estreitados, a pós me fez relembrar algumas matérias da época da faculdade. Também aprendi sobre a qualidade do serviço público que é papel importante para um assessor parlamentar. Se o mestrado da Alerj sair do papel, com certeza, vou me matricular.

![Gabriela Naegele](/images/photos/gabriela-naegele-citacao-elerj-thiago-lontra-1200x800.jpg)

Eduardo Costa - Professor da Elerj
Sou formado em Administração e já lecionei cursos na Elerj, então para mim foi um prazer poder retornar às salas de aula da Escola do Legislativo para o curso da pós-graduação. Estou ensinando sobre a qualidade do atendimento no setor público. Esta pós é fantástica, uma oportunidade única para o colaborador, seja comissionado ou não. É um grande diferencial preparar as pessoas que vão trabalhar com você.

![Eduardo Costa](/images/photos/eduardo-costa-citacao-elerj-thiago-lontra-1200x800.jpg)',
            'featured' => true
        ]);

        $article->attachTags(['elerj', 'escola do legislativo', 'pós graduação,', 'curso', 'alunos']);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Buanna Rosa'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => true,
            'url_highres' =>
                '/images/photos/eduardo-costa-sala-de-aula-elerj-thiago-lontra.jpg',
            'url_lowres' =>
                '/images/photos/eduardo-costa-sala-de-aula-elerj-thiago-lontra-1200x800.jpg',
            'author' => 'Thiago Lontra',
            'notes' =>
                ''
        ]);
    }

    private function createArticle7($edition)
    {
        $article = Article::create([
            'edition_id' => $edition->id,
            'title' => 'Exemplo de solidariedade através do esporte',
            'order' => 2,
            'published_at' => '2018-06-18',
            'category' => '',
            'created_at' => '2018-06-18',
            'subtitle' =>
                '',
            'lead' =>
                'Ele sempre foi irrequieto, alto, e gostava de desafios. Por isso, não foi difícil perceber que aquele adolescente, então com 14 anos, tinha o biótipo e a personalidade ideais para as artes marciais. E foi a partir do convite desse amigo que Elton Moura, hoje com 34 anos, 1,80 m de altura, e 98 kg; entrou no mundo dos golpes, tatames, quimonos e faixas. E dele não saiu mais. “Na primeira aula já me identifiquei com o jiu-jitsu e, com dois meses de treino, já competia”, lembra Elton, cinegrafista da Assembleia Legislativa do Rio de Janeiro (Alerj).',
            'body' =>
                'Na equipe “Gama Filho Serginho Jiu-Jitsu”, o menino começou a mudar de faixa e a colecionar medalhas. A rápida ascensão, no entanto, foi de encontro à necessidade de ajudar a mãe que, sozinha, criou quatro filhos. “Não pude me dedicar ao esporte como gostaria porque tenho três irmãos e tive que ajudar a minha mãe a sustentá-los”, explica.

Foi justamente a necessidade econômica que trouxe Elton, aos 21 anos, para a Alerj, onde começou como assistente de cinegrafista. “Nunca tinha pensado em trabalhar em TV, mas gostei”, lembra. Depois de duas passagens pela Casa, a última começou há dez anos, foi promovido a cinegrafista, casou e se tornou pai. Mas nunca esqueceu a antiga paixão pelo esporte.

Mesmo sem competir como no início, continuou treinando e trocando de faixas: branca, azul, roxa...e agora a marrom. Conquistas que o levaram, recentemente, a ser auxiliar do seu mestre Alexssandro Feitosa, durante os treinos.

No último ano, também passou a treinar mais pesado, emagreceu e se dedicou de tal forma que ganhou o Campeonato Copa Alfa. Vitória que acabou rendendo um convite. “A diretoria da equipe GF Team, após o campeonato, fez uma seleção para convocar uma equipe mundial master de jiu-jitsu (faixa marrom), em Miami, em junho, e fui selecionado”, comemora.

Se dependesse de vontade, a mala já estaria pronta, mas Elton foi obrigado a recusar o convite: “A escolha do meu nome é fruto de muita dedicação ao esporte durante esses anos, mas falta patrocínio. A viagem é cara e não tenho como bancar os custos”, lamenta.

Como bom atleta, não deixou que essa frustração o paralisasse e, passou a pensar como poderia reverter o que aprendeu no esporte em benefício dos colegas de trabalho. Com o incentivo do apresentador do programa “Arena Esportiva" da TV Alerj, Rui Guilherme, começou a formatar um projeto para levar o jiu-jtsu para os funcionários da Casa. Rui lembra a importância da arte marcial para melhorar a relação interpessoal, a disciplina e a confraternização.

Juntos, Elton e Rui começaram a divulgar informalmente o projeto e já receberam o apoio de colegas. Ainda em busca de um nome para a ideia, o faixa-marrom ressalta o caráter sem fim lucrativo da iniciativa. Como o jiu-jitsu não utiliza armas e recorre mais à técnica do que à força, esta arte marcial tornou-se ideal como defesa pessoal. Característica que levou a subdiretora-geral de Segurança, Cristina de Vilhena Castro, a engrossar a fila dos que esperam que as aulas de jiu-jitsu venham logo e para ficar. “O jiu-jitsu é adequado para o perfil da segurança da Casa porque temos que ter uma pronta defesa contra um agressor ou invasor”, ressalta Cristina.
',
            'featured' => false
        ]);

        $article->attachTags(['', '']);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Márcia Manga'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => true,
            'url_highres' =>
                '/images/photos/elton-moura-cinegrafista-tv-alerj-thiago-lontra.jpg',
            'url_lowres' =>
                '/images/photos/elton-moura-cinegrafista-tv-alerj-thiago-lontra-1200x800.jpg',
            'author' => 'Thiago Lontra',
            'notes' =>
                'Elton Moura é cinegrafista da TV Alerj e tem no jiu jitsu sua grande paixão'
        ]);
    }

    private function createArticle8($edition)
    {
        $article = Article::create([
            'edition_id' => $edition->id,
            'title' => 'Sindalerj: associado extra-quadro número um',
            'order' => 3,
            'published_at' => '2018-06-18',
            'category' => 'Sindalerj',
            'created_at' => '2018-06-18',
            'subtitle' =>
                '',
            'lead' =>
                'O assistente parlamentar Rafael Ribeiro Riccio, 30 anos, foi o primeiro servidor extra-quadro a se cadastrar no Sindicato dos Servidores da Alerj - Sindalerj, no início deste ano, depois da alteração do estatuto da entidade e da campanha interna visando às novas filiações. Com a mudança, os funcionários comissionados ou requisitados já podem se filiar ao Sindalerj. Com uma contribuição mensal de R$ 35, o sindicato oferece convênios e diversos serviços aos seus novos associados, assim como aos 700 servidores ativos e aposentados e a seus familiares.',
            'body' =>
                '"Trabalho na Casa há 12 anos, sempre tive contato com os representantes do sindicato, acompanhei de perto várias lutas e conquistas. Assim que tive a oportunidade de me vincular à instituição, não perdi tempo. Foi assim que me tornei o extra-quadro número um do Sindalerj", disse Riccio, que ingressou na Alerj como estagiário e hoje trabalha no protocolo do Plenário, setor ligado à Secretaria da Mesa Diretora. Ele é responsável pelo recebimento dos projetos de lei, emendas e projetos de resoluções dos parlamentares.

Segundo o presidente do sindicato, Nelson Braga Moreno, a adesão dos comissionados ainda está tímida, mas ele espera alcançar resultados positivos quando todos tiverem acesso à pauta de reivindicações para 2018/2019. A realização de um concurso público para os diversos setores da Casa faz parte da lista. "Somos poucos servidores na ativa e muitos às vésperas da aposentadoria. Precisamos renovar nossos quadros", disse Moreno, que enumerou como prioridades o ajuste no auxílio-alimentação (já concedido); a criação do auxílio-saúde e o novo plano de cargos e salários.

"Lutamos por todos, seja estatutário ou não. O importante é que aqueles que trabalham na Alerj sejam comissionados ou requisitados, se sintam representados dentro das normas legais. Ser sindicalizado é se fazer ouvir", destacou o presidente.

## Filiação e benefícios

O cadastro deve ser feito através do preenchimento de uma ficha de inscrição na sede do sindicato, na Travessa do Paço, 23 - Sala 205, Centro, ao lado do Palácio Tiradentes. Mais informações podem ser obtidas pelo telefones 2253-0435 e 2203-0415 ou pelo e-mail: (nome)[mailto:sindalerj@sindalerj.com.br].

Os associados do Sindalerj contam com os benefícios exclusivos por meio das parcerias com planos de saúde, faculdades, restaurantes, farmácias e agências de viagem. Dispõem também de assistência jurídica e serviço contábil.


',
            'featured' => false
        ]);

        $article->attachTags(['sindalerj', 'servidor', 'associação', 'sindicato', 'extra-quadro']);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Symone Munay'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => true,
            'url_highres' =>
                '/images/photos/rafael-riccio-sindalerj-octacilio-barbosa.jpg',
            'url_lowres' =>
                '/images/photos/rafael-riccio-sindalerj-octacilio-barbosa-1200x800.jpg',
            'author' => 'Octacílio Barbosa',
            'notes' =>
                'Rafael Riccio trabalha na Alerj há 12 anos e desde o início deste ano integra o Sindalerj '
        ]);
    }
    private function createArticle9($edition)
    {
        $article = Article::create([
            'edition_id' => $edition->id,
            'title' => 'Você sabe',
            'order' => 4,
            'published_at' => '2018-06-18',
            'category' => 'Curiosidades do Palácio',
            'created_at' => '2018-06-18',
            'subtitle' =>
                '',
            'lead' =>
                'Todos que circulam diariamente pelo Palácio Tiradentes sabem que há muita história a contar nesses 92 anos de existência. O prédio chama a atenção por sua beleza arquitetônica e também pela imponência. A atual sede da Assembleia Legislativa do Estado do Rio de Janeiro já foi cadeia no Brasil Colônia - onde inclusive o mártir da Inconfidência Mineira, Tiradentes, ficou preso -e, já na República, foi Câmara dos Deputados.',
            'body' =>
                'Um local de tantas histórias tem alguns detalhes que podem passar despercebidos. Você sabia, por exemplo, que onde hoje funciona um banco, no térreo, já existiu um restaurante?

O espaço, com paredes e colunas decoradas com detalhes em gesso, tinha cozinha e mobiliário para comportar até 150 pessoas. Os artistas Augusto José Marques Júnior e Genesco Murta pintaram seis painéis para decorar as paredes. Os tamanhos das pinturas variam entre 1,58m de altura por 1,54m e 2,6m de largura e representam cenas do campo e da pecuária.

As telas são descritas pelos artistas como a “visão bucólica das paisagens nativas, representando poéticos cenários dos nossos crepúsculos sobre os campos lavradios”. O restaurante, no entanto, foi desativado há décadas. Desde 1984, uma agência bancária ocupa o espaço que guarda ainda lembranças do seu passado.',
            'featured' => false
        ]);

        $article->attachTags(['curiosidades', 'Palácio Tiradentes', 'história']);

        ArticleAuthor::create([
            'article_id' => $article->id,
            'name' => 'Camilla Pontes'
        ]);

        ArticlePhoto::create([
            'article_id' => $article->id,
            'main' => true,
            'url_highres' =>
                '/images/photos/antigo-restaurante.jpg',
            'url_lowres' =>
                '/images/photos/antigo-restaurante-1200x800.jpg',
            'author' => '',
            'notes' =>
                ''
        ]);
    }




    /**
     * Run the database seeds.
     *
     * @return void
     */

}
