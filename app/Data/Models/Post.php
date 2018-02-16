<?php

namespace App\Data\Models;

use App\Services\Markdown\Service;
use Illuminate\Database\Eloquent\Collection;
use Jenssegers\Date\Date as Carbon;
use PragmaRX\Coollection\Package\Coollection;

class Post
{
    protected static $posts = [
        [
            'title' => 'Alerj na folia',

            'category' => 'Cidade',

            'created_at' => '2018-02-08',

            'subtitle' => 'Das escadarias do Palácio à Passarela do Samba',

            'authors' => [
                'Symone Munay',
                'Vanessa Schumacker'
            ],

            'photos' => [
                [
                    'main' => true,
                    'url_highres' => '/images/photos/GabrielSorriso1_RafaelWallace.jpg',
                    'url_lowres' => '/images/photos/GabrielSorriso1_RafaelWallace-1200x800.jpg',
                    'author' => 'Rafael Wallace',
                    'notes' => 'O operador e editor de áudio da Alerj, Gabriel Sorriso dedica todo o seu tempo livre à composição de sambas.  "É uma paixão antiga", assume.'
                ],
                [
                    'main' => false,
                    'url_highres' => '/images/photos/AntonioConceicao4_01_02_2018-ThiagoLontra.jpg',
                    'url_lowres' => '/images/photos/AntonioConceicao4_01_02_2018-ThiagoLontra-1200x900.jpg',
                    'author' => 'Thiago Lontra',
                    'notes' => 'O serralheiro Antonio Conceição atua como compositor e interprete'
                ],
                [
                    'main' => false,
                    'url_highres' => '/images/photos/DaisaConceicao.jpg',
                    'url_lowres' => '/images/photos/DaisaConceicao.jpg',
                    'author' => '',
                    'notes' => 'A auxiliar de serviços gerais, Daiza Maria, desfila pela Mangueira desde criança',
                ],
                [
                    'main' => false,
                    'url_highres' => '/images/photos/GabrielSorriso.jpg',
                    'url_lowres' => '/images/photos/GabrielSorriso.jpg',
                    'author' => '',
                    'notes' => 'Sorriso já teve dois sambas-enredo escolhidos por escolas de samba dos grupos B e D',
                ],
            ],

            'lead' => 'Entre os dias 9 e 13 de fevereiro, o Rio de Janeiro será tomado por plumas, paetês e muito samba no pé. Para muitos funcionários da Assembleia Legislativa do Estado do Rio de Janeiro (Alerj) esta é a época do ano mais esperada. É o momento de vestir a fantasia e defender na Marques de Sapucaí as cores das suas escolas de samba do coração.',

            'body' => 'Este é o caso da auxiliar de serviços gerais, Daiza Maria da Conceição, de 60 anos. Moradora  de Manguinhos, na Zona Norte da cidade, Daiza  marca presença na quadra da Estação Primeira de  Mangueira e nos desfiles da escola na Sapucaí desde criança.  "Já desfilo há tanto tempo que nem lembro há quantos anos saio pela minha escola do coração",  admite Daiza, que há 26 anos trabalha nas dependências do Palácio Tiradentes e no prédio anexo da Alerj. Todas as quintas-feiras e domingos Daiza não abre mão do ensaio no Palácio do Samba, quadra da Mangueira, para no domingo de Carnaval se somar à Ala da Comunidade da escola e  fazer "bonito na avenida".

Outro apaixonado por samba é Gabriel Eleno da Conceição,  mais conhecido como Gabriel Sorriso. Operador e editor de áudio na Alerj, Sorriso dedica todo o seu tempo livre à composição de sambas. No ano passado, Sorriso teve duas alegrias: foi campeão na escolha do samba enredo da Acadêmicos do Engenho da Rainha (grupo B) e da Acadêmicos de Madureira (grupo D). "Sempre estive envolvido com a música, especialmente com o samba carioca e sua tradição. É uma paixão antiga. Participei de outras escolhas de samba-enredo, mas 2018 me deu alegria em dobro", disse ele.

## Novato na Casa, antigo no samba

Recentemente o time de compositores da Alerj ganhou mais um nome, o serralheiro Antônio Conceição. Apesar de compartilhar do mesmo sobrenome e paixão pelo samba que seus colegas, eles não são da mesma família. Ele começou a trabalhar na oficina da Casa em janeiro deste ano, mas frequenta  o mundo do samba desde 1981, quando começou a compor para blocos e escolas de samba.

Em 1992, Antônio Nick, como é conhecido, passou a interpretar sambas e só na Sapucaí, foram 15 anos em cima do carro de som de agremiações como a Inocentes de Belford Roxo e a União de Jacarepaguá. "Desde garoto sempre gostei de brincar Carnaval. Depois passei a compor e a cantar, e não consigo imaginar a minha vida sem o Carnaval", disse Nick, que este ano estará defendendo o samba da Império da Uva, agremiação de Nova Iguaçu, na Baixada Fluminense.
',

            'featured' => true,

            'tags' => [
                'cidade',
                'carnaval',
            ],
        ],

        [
            'title' => 'A-la-la-ô mas que calor...',

            'category' => 'Saúde',

            'created_at' => '2018-02-08',

            'subtitle' => 'Saiba como curtir o Carnaval se protegendo do verão carioca',

            'authors' => [
                'Buanna Rosa',
                'David Barbosa'
            ],

            'photos' => [
                [
                    'main' => true,
                    'url_highres' => '/images/photos/1070-Materia-saude-Carnaval-Rafael-Wallace.jpg',
                    'url_lowres' => '/images/photos/1070-Materia-saude-Carnaval-Rafael-Wallace-1200x800.jpg',
                    'author' => 'Rafael Wallace',
                    'notes' => 'A diretora do departamento médico da Alerj, Mônica Antun Maia, reforça a importância da aplicação frequente do protetor solar e também o consumo de muito líquido para ajudar na hidratação',
                ],
                [
                    'main' => false,
                    'url_highres' => '/images/photos/antigorestaurante.jpg',
                    'url_lowres' => '/images/photos/antigorestaurante-1200x800.jpg',
                    'author' => '',
                    'notes' => '',
                ]
            ],

            'lead' => 'Fevereiro chegou e com ele os dias de folia. Fantasias prontas, agenda de blocos conferida e marchinhas na ponta da língua são primordiais para quem curte o  Carnaval no Rio de Janeiro, que esse ano será do dia 9 a 13 de fevereiro. Mas no auge do verão carioca, muitos esquecem de cuidar da saúde antes de aproveitar a festa de Momo. A Riotur informou que espera seis milhões de foliões no Rio, 400 mil turistas a mais que em 2017.',

            'body' => 'Com o calor e tantas pessoas na rua, algumas doenças se proliferam com mais facilidade. Mononucleose, herpes e insolação são alguns casos frequentes registrados nesta época do ano. Para evitar que doenças estraguem a festa, a diretora do departamento médico da Alerj, Mônica Antun Maia, dá algumas dicas para os funcionários da Casa curtirem com tranquilidade:

- Protetor solar: é fundamental passar o protetor antes de sair de casa e reaplicá-lo ao longo do dia, mesmo com o céu nublado. A radiação ultravioleta pode causar danos como, manchas, queimaduras e envelhecimento precoce.  

- Camisinha: como já dizia a roqueira Rita Lee, “amor é bossa nova, sexo é Carnaval”. O preservativo é o melhor método para prevenir gravidez indesejada, doenças sexualmente transmissíveis, como sífilis, HPV e Aids. De acordo com as secretarias municipal e estadual de Saúde, serão distribuídas sete milhões de camisinhas
nos dias de festa. Procure um posto e garanta a sua.   

- Hidratação: “Bebeu água? Não! Tá com sede? Tô. Olha, olha, olha, olha a água mineral”. Não espere se hidratar apenas quando a sede chegar. Esse deve ser o hino dos foliões. A água ajuda a manter o corpo hidratado e previne uma possível ressaca.

- Comida: estar bem alimentado é fundamental para aguentar as horas extensas dos blocos e desfiles. Coma bem antes de sair de casa e durante o dia procure estabelecimentos, como restaurantes, padarias e lanchonetes. Evite comer na rua. Muitas pessoas acabam perdendo o restante do Carnaval ao ter uma infecção alimentar.

- O que levar: fique atento aos itens que precisam acompanhar o folião. O álcool gel é importante para fazer uma higienização rápida e evitar a contaminação. Já o repelente evita que os mosquitos transmissores da dengue, chikungunya, zika e febre amarela tenham contato com a pele do Carnavalesco. E, por fim, tenha sempre um documento de identificação.
',

            'featured' => false,

            'tags' => [
                'saúde',
                'carnaval',
            ],
        ],

        [
            'title' => "Exposição ‘Ex África’ leva cultura africana ao Centro do Rio.",

            'category' => 'Cultura',

            'created_at' => '2018-02-08',

            'subtitle' => 'Mostra acontece no CCBB, a poucos metros da Alerj, e ficará em cartaz até o dia 26/03',

            'authors' => [
                'Gustavo Natario',
            ],

            'photos' => [
                [
                    'main' => true,
                    'url_highres' => '/images/photos/Ex-Africa-Foto-Alexandre-Macieira-Riotur.jpg',
                    'url_lowres' => '/images/photos/Ex-Africa-Foto-Alexandre-Macieira-Riotur-1200x800.jpg',
                    'author' => 'Alexandre Macieira',
                    'notes' => 'A exposição "Ex Africa" ocupa o CCBB até o dia 26 de março com obras de 18 artistas sobre a  representatividade dos povos africanos',
                ],
                [
                    'main' => false,
                    'url_highres' => '/images/photos/Ex-Africa-2-Foto-Alexandre-Macieira-Riotur.jpg',
                    'url_lowres' => '/images/photos/Ex-Africa-2-Foto-Alexandre-Macieira-Riotur-1200x800.jpg',
                    'author' => 'Alexandre Macieira',
                    'notes' => 'Outro ponto alto da mostra é o ensaio fotográfico Code Noir (Código Negro), do fotógrafo Leonce Raphael Agbodjelou',
                ],
                [
                    'main' => false,
                    'url_highres' => '/images/photos/Ex-Africa-3-Foto-Alexandre-Macieira-Riotur.jpg',
                    'url_lowres' => '/images/photos/Ex-Africa-3-Foto-Alexandre-Macieira-Riotur-1200x800.jpg',
                    'author' => 'Alexandre Macieira',
                    'notes' => 'A entrada é franca e a exposição está aberta de quarta a segunda',
                ],
            ],

            'lead' => 'A representatividade dos povos africanos e a divulgação de suas identidades culturais são os temas centrais da exposição “Ex África”, que está em cartaz no Centro Cultural Banco do Brasil (CCBB) até o dia 26 de março. A mostra conta com vídeos, músicas, esculturas, fotografias e pinturas que remetem à cultura africana contemporânea. A entrada é franca e a exposição está aberta de quarta a segunda, das 9h às 21h. A poucos metros da Assembleia Legislativa do Estado do Rio de Janeiro (Alerj), o CCBB é uma ótima opção cultural para quem trabalha no Centro e está localizado na Rua Primeiro de Março, número 66.',

            'body' => '
A exposição aborda desde a vida corrida nos grandes centros urbanos africanos até as desigualdades sociais presentes no continente. Entre os destaques está a sala dedicada ao Afrobeat, ritmo musical popular na cidade de Lagos, maior centro urbano da Nigéria e da África.

Outro ponto alto da mostra é o ensaio fotográfico Code Noir (Código Negro), do fotógrafo Leonce Raphael Agbodjelou, que é natural da República do Benim.  O Código Negro era um decreto francês sobre como gerenciar escravos. Agbodjelou representa de forma sensível as tristes heranças da escravidão em seu país. Ele fotografou, entre outras coisas, descendentes de escravos com fotos de seus parentes e locais que foram marcados por essa triste história, como uma quadra de basquete que em outros tempos foi um mercado de escravos.

Ao todo, Ex África conta com obras de 18 artistas africanos e dois afro-brasileiros, Arjan Martins e Dalton Paula. A curadoria da exposição é realizada por Alfons Hug, que era diretor do Instituto Goethe na cidade de Lagos, e Ade Bantu, responsável pelo Clube Lagos, que conta com um acervo de música popular da cidade africana.  

## Fique por dentro da Alerj

Para que o Estado do Rio tenha cada vez mais exposições sobre a cultura africana e sua importância na constituição do povo brasileiro, a Alerj aprovou a Lei 7.851/18, que estabelece diretrizes para a criação de um museu afro-brasileiro na capital fluminense. A norma, de autoria do deputado Geraldo Pudim (PMDB), foi sancionada pelo governador Luiz Fernando Pezão no dia 16 de janeiro.

O acervo do futuro museu será composto por objetos que possam reconstituir a contribuição cultural e histórica dos afrodescendentes. O espaço cultural também será responsável pela capacitação de professores e intelectuais para implantarem estudos sobre a escravidão e cultura africana nas instituições de ensino do Rio.

“A escravidão é o fato histórico mais relevante da história do Brasil. Seus efeitos sociais, culturais e econômicos estão em toda parte. A violência da escravidão durou mais de 300 anos, consumiu a vida de 3 milhões de africanos e de incontáveis descendentes, e deu ao país a fisionomia mestiça, injusta e desigual que ele tem até hoje”, argumentou o autor da lei.
',

            'featured' => false,

            'tags' => [
                'exposição',
                'arte',
                'áfrica',
            ],
        ],

        [
            'title' => "Onde solucionar seu problema",

            'category' => 'RH',

            'created_at' => '2018-02-08',

            'subtitle' => '',

            'authors' => [
                'Symone Munay',
                'Leon Lucius',
            ],

            'photos' => [
//                [
//                    'main' => true,
//                    'url_highres' => '/images/photos/Ex-Africa-3-Foto-Alexandre-Macieira-Riotur.jpg',
//                    'url_lowres' => '/images/photos/Ex-Africa-3-Foto-Alexandre-Macieira-Riotur-1200x800.jpg',
//                    'author' => 'Alexandre Macieira',
//                    'notes' => '',
//                ]
            ],

            'lead' => 'Sabe aquela papelada de trabalho que você precisa agilizar, mas não sabe por onde começar?  A equipe da Subdiretoria de Recursos Humanos da Alerj (RH) está a postos para ajudar a resolver tudo isso.',

            'body' => '
Para começar, qualquer demanda sobre **Legislação de Pessoal**, ligue 1370. Este canal atendente a todos os servidores efetivos, requisitados e demais colaboradores da Casa.

Para casos específicos entre em contato com o setor através dos seguintes números:

Caso seja **efetivo**, o número é 1395;

Se você é **comissionado**, ligue para 1493;

Servidores **requisitados**, 1368;

Para os **estagiários**, o ramal de atendimento é 1369.
',

            'featured' => false,

            'tags' => [
                'rh',
                'administrativo',
            ],
        ],

        [
            'title' => "Curiosidades do Palácio Tiradentes",

            'category' => 'Alerj',

            'created_at' => '2018-02-08',

            'subtitle' => '',

            'authors' => [
                'Symone Munay',
                'Leon Lucius',
            ],

            'photos' => [
                [
                    'main' => true,
                    'url_highres' => '/images/photos/antigorestaurante.jpg',
                    'url_lowres' => '/images/photos/antigorestaurante-1200x800.jpg',
                    'author' => '',
                    'notes' => 'O salão no térreo hoje ocupado por uma agência bancária já foi um restaurante com capacidade para atender até 150 clientes',
                ],
            ],

            'lead' => 'Todos que circulam diariamente pelo Palácio Tiradentes sabem que há muita história a contar nesses 92 anos de existência. O prédio chama a atenção por sua beleza arquitetônica e também pela imponência. A atual sede da Assembleia Legislativa do Estado do Rio de Janeiro já foi cadeia no Brasil Colônia - onde inclusive o mártir da Inconfidência Mineira, Tiradentes, ficou preso e, já na República, foi Câmara dos Deputados.',

            'body' => '
Um local de tantas histórias tem alguns detalhes que podem passar despercebidos. Você sabia, por exemplo, que onde hoje funciona um banco, no térreo, já foi um restaurante?
 
O restaurante, com paredes e colunas decoradas com detalhes em gesso, tinha cozinha e mobiliário para comportar até 150 pessoas. Os artistas Augusto José Marques Júnior e Genesco Murta pintaram seis painéis para decorar as paredes. Os tamanhos das pinturas variam entre 1,58m de altura por 1,54m e 2,6m de largura e representam cenas do campo e da pecuária. As telas são descritas pelos artistas como a “visão bucólica das paisagens nativas, representando poéticos cenários dos nossos crepúsculos sobre os campos lavradios”. O restaurante, no entanto, foi desativado há décadas. Desde 1984, o atual banco ocupa o espaço que guarda ainda lembranças do seu passado.
',

            'featured' => false,

            'tags' => [
                'palácio tiradentes',
            ],
        ],
    ];

    private static function all()
    {
        $markdown = new Service();

        return collect(static::$posts)->mapWithKeys(/**
         * @param $post
         * @return array
         */
            function($post) use ($markdown) {
            $slug = str_slug($post['title']);

            $date = Carbon::parse($post['created_at']);

            $post['featured'] = isset($post['featured']) ? $post['featured'] : false;

            $post['link'] = route('posts.show', ['year' => $date->year, 'month' => $date->month, 'day' => $date->day, 'slug' => $slug]);

            $post['authors_string'] = static::makeAuthorsString($post['authors']);

            $post['slug'] = $slug;

            $post['created_at'] = $date;

            $post['date'] = Carbon::parse($post['created_at'])->format('j F Y');

            $post['main_photo'] = static::makePhotosCollection($post['photos'])->where('main', true)->first();

            $post['other_photos'] = static::makePhotosCollection($post['photos'])->where('main', false);

            $post['lead_limited'] = $markdown->convert(str_limit($post['lead'], 200));

            $post['lead'] = $markdown->convert($post['lead']);

            $post['body'] = $markdown->convert($post['body']);

            return [$slug => $post];
        });
    }

    public static function featured()
    {
        return static::all()->where('featured', true);
    }

    private static function makeAuthorsString($authors)
    {
        return join(' e ', array_filter(array_merge(array(join(', ', array_slice($authors, 0, -1))), array_slice($authors, -1)), 'strlen'));
    }

    public static function nonFeatured()
    {
        return static::all()->where('featured', false);
    }

    public static function findBySlug($slug)
    {
        return new Coollection(static::all()->where('slug', $slug)->first());
    }

    public static function makePhotosCollection($photos)
    {
        return coollect($photos)->map(function ($photo) {
            $author = $photo['author'];

            $notes = $photo['notes'];

            $photo['notes_and_author'] = $notes . (!empty($notes) && !empty($author) ? " (Foto: $author)" : '');

            return $photo;
        });
    }
}
