<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-toolbar">
                            @{{ tables.editions.length }} edições

                            <div class="btn btn-danger btn-sm pull-right" data-toggle="modal" data-target="#add-edition-modal">
                                <i class="fa fa-plus"></i>
                            </div>

                            <button :class="'pull-right btn btn-sm ' + (__currentEditionIsPublished() ? 'btn-success' : 'btn-default')" @click="__togglePublishedEdition()">
                                <span v-if="!__currentEditionIsPublished()">Publicar</span>
                                <span v-if="__currentEditionIsPublished()">Publicado</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body scrollable">
                <div class="row">
                    <div class="col-md-12">
                        <div class="div">
                            <ul class="list-group">
                                <li v-for="edition in __filteredEditions()" @click="__selectEdition(edition, true)" :class="'list-group-item cursor-pointer bg-info ' + (current.edition.id == edition.id ? 'active' : '')">
                                    <div class="row">
                                        <div class="col-xs-9">
                                            <span v-if="edition.published_at"><i class="fa fa-check"></i></span>
                                            <span v-if="!edition.published_at"><i class="fa fa-ban"></i></span>

                                            Parla @{{ edition.number }} - @{{ edition.year }}/@{{ edition.month }}
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            <span v-if="current.edition.id === edition.id && busy">
                                                <i class="fa fa-cog fa-spin"></i>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-left">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="btn btn-info" @click="__createArticle()">
                                        Novo Post
                                    </div>
                                &nbsp;</div>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon" :class="filter ? 'danger' : ''">
                                            @{{ filter ? 'Filtrado' : 'Filtrar' }}
                                        </span>

                                        <input type="text" name="filter" v-model="filter" class="form-control">

                                        <span class="input-group-addon" :class="filter ? ' danger pointer' : ''" @click="__clearFilter()">
                                                    <i :class="filter ? 'fa fa-times' : 'fa fa-search'"></i>
                                                </span>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                            <span v-if="busy" class="pull-right">
                                                <i class="fa fa-cog fa-spin fa-2x text-info"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body scrollable">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th @click="__changeOrder('order')">
                                    </th>

                                    <th @click="__changeOrder('order')">
                                        Posição

                                        <div v-show="orderBy == 'order'" class="btn btn-danger btn-xs">
                                            <i class="fa" :class="__getArrowClass()"></i>
                                        </div>
                                    </th>

                                    <th @click="__changeOrder('title')" class="">
                                        Titulo

                                        <div v-show="orderBy == 'title'" class="btn btn-danger btn-xs">
                                            <i class="fa" :class="__getArrowClass()"></i>
                                        </div>
                                    </th>

                                    <th @click="__changeOrder('category')">
                                        Categoria

                                        <div v-show="orderBy == 'category'" class="btn btn-danger btn-xs">
                                            <i class="fa" :class="__getArrowClass()"></i>
                                        </div>
                                    </th>

                                    <th @click="__changeOrder('featured')">
                                        Destaque

                                        <div v-show="orderBy == 'featured'" class="btn btn-danger btn-xs">
                                            <i class="fa" :class="__getArrowClass()"></i>
                                        </div>
                                    </th>

                                    <th @click="__changeOrder('published_at')">
                                        Visível

                                        <div v-show="orderBy == 'published_at'" class="btn btn-danger btn-xs">
                                            <i class="fa" :class="__getArrowClass()"></i>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(article, index) in __filteredArticles()" class="clickable" @click="__selectArticle(article)">
                                    <td>
                                        <div v-show="__isCurrentArticle(article)" class="btn btn-danger btn-xs">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </td>

                                    <td>
                                        <span :class="'fa fa-arrow-up ' + (__canMoveUp(article) ? 'order-arrow cursor-pointer' : 'order-arrow-disabled')" @click="__moveUp(article)"></span>

                                        @{{ article.order }}

                                        <span :class="'fa fa-arrow-down ' + (__canMoveDown(article) ? 'order-arrow cursor-pointer' : 'order-arrow-disabled')" @click="__moveDown(article)"></span>
                                    </td>

                                    <td>@{{ article.title ? article.title : 'NOVO POST' }}</td>
                                    <td>@{{ article.category }}</td>
                                    <td>@{{ article.featured ? 'sim' : 'não' }}</td>
                                    <td>@{{ article.published_at ? 'sim' : 'não' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" v-if="current.article">
    <div class="col-md-12" v-if="__currentArticle()">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <h4 class="col-md-8">
                        <span v-if="__currentArticle().title">@{{ __currentArticle().title }}</span>
                        <span v-if="!__currentArticle().title && __currentArticle().new">NOVO POST</span>
                    </h4>

                    <div class="col-md-4">
                        <div class="text-right">
                            <button :class="'btn ' + (__currentArticle().featured ? 'btn-success' : 'btn-default')" @click="__toggleCurrentFeatured()">
                                <span v-if="!__currentArticle().featured">Destacar</span>
                                <span v-if="__currentArticle().featured">Destacado</span>
                            </button>

                            <button :class="'btn ' + (__currentArticle().published_at ? 'btn-success' : 'btn-default')" @click="__toggleCurrentPublished()">
                                <span v-if="__currentArticle().published_at">Publicado</span>
                                <span v-if="! __currentArticle().published_at">Publicar</span>
                            </button>

                            <button class="btn btn-success" @click="__saveCurrent()" :disabled="__unchanged()">
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body add-margin">
                <div class="row">
                    <div class="col-md-12">
                        <form @submit.prevent>
                            <div class="row row-form">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    :value="__currentArticle().title"
                                                    @input="__updateField('title', $event.target.value)"
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Subtítulo</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    :value="__currentArticle().subtitle"
                                                    @input="__updateField('subtitle', $event.target.value)"
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    :value="__currentArticle().category"
                                                    @input="__updateField('category', $event.target.value)"
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Autores</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    :value="__currentArticle().authors_inline"
                                                    @input="__updateField('authors_inline', $event.target.value)"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-form">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2 class="text-center">Lead (em <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">markdown</a>)</h2>
                                        <textarea
                                            rows="8"
                                            class="form-control"
                                            :value="__currentArticle().lead"
                                            @input="__updateLead($event.target.value)"
                                            ref="input"
                                        >
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 bg-warning">
                                    <div class="form-group">
                                        <label></label>
                                        <div class="article-body">
                                            <p v-html="__currentArticle().lead_html"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-form">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h2 class="text-center">Corpo (em <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">markdown</a>)</h2>
                                        <textarea
                                            rows="8"
                                            class="form-control"
                                            :value="__currentArticle().body"
                                            @input="__updateBody($event.target.value)"
                                            ref="input"
                                        >
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 bg-warning">
                                    <div class="form-group">
                                        <label></label>
                                        <div class="article-body">
                                            <p v-html="__currentArticle().body_html"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <button class="btn btn-success" @click="__saveCurrent()" :disabled="__unchanged()">
                                Salvar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-edition-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nova edição</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6 text-right">
                                <label>Parla número</label>
                            </div>
                            <div class="col-xs-6">
                                <input
                                    type="text"
                                    v-model="newEdition.number"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6 text-right">
                                <label>Ano</label>
                            </div>
                            <div class="col-xs-6">
                                <input
                                    type="text"
                                    v-model="newEdition.year"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6 text-right">
                                <label>Mês</label>
                            </div>
                            <div class="col-xs-6">
                                <input
                                    type="text"
                                    v-model="newEdition.month"
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" @click="__createNewEdition()">Gravar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>
