@extends('layouts.admin')

@section('content')
    <div class="container-fluid" id="vue-admin">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                @{{ tables.editions.length }} edições
                            </div>
                        </div>
                    </div>

                    <div class="panel-body scrollable">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="div">
                                    <ul class="list-group">
                                        <li v-for="edition in tables.editions" @click="__selectEdition(edition)" :class="'list-group-item cursor-pointer bg-info ' + (currentEdition.number == edition.number ? 'active' : '')">
                                            <div class="row">
                                                <div class="col-xs-10">
                                                    Parla @{{ edition.number }}
                                                </div>
                                                <div class="col-xs-2 text-right">
                                                    <span v-if="currentEdition.number === edition.number && loading.articles" class="text-right">
                                                        ...
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

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="text-left">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="btn btn-success" @click="__createArticle()">
                                                Novo Artigo
                                            </div>
                                        &nbsp;</div>

                                        <div class="col-md-8 pull-right">
                                            <div class="input-group">
                                                <span class="input-group-addon" :class="search ? 'danger' : ''">
                                                    @{{ search ? 'Filtrado' : 'Filtrar' }}
                                                </span>

                                                <input type="text" name="search" v-model="search" class="form-control">

                                                <span class="input-group-addon" :class="search ? 'danger pointer' : ''" @click="__clearFilter()">
                                                    <i :class="search ? 'fa fa-times' : 'fa fa-search'"></i>
                                                </span>
                                            </div>
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
                                                ordem

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

                                            <th @click="__changeOrder('published_at')">
                                                Visível

                                                <div v-show="orderBy == 'published_at'" class="btn btn-danger btn-xs">
                                                    <i class="fa" :class="__getArrowClass()"></i>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(article, index) in tables.articles" class="clickable" @click="__selectArticle(article)">
                                            <td>
                                                <div v-show="__isCurrentArticle(article)" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-arrow-right"></i>
                                                </div>
                                            </td>

                                            <td>@{{ article.order }}</td>
                                            <td>@{{ article.title }}</td>
                                            <td>@{{ article.category }}</td>
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

        <div class="row" v-if="currentArticle">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <h4 class="col-md-8">
                                <span v-if="currentArticle.title">@{{ currentArticle.title }}</span>
                                <span v-if="!currentArticle.title && currentArticle.new">NOVO ARTIGO</span>
                            </h4>

                            <div class="col-md-4">
                                <div class="text-right">
                                    <button type="text" class="btn" :class="currentArticle.is_published ? 'btn-success' : 'btn-default'" @click="__publishCurrent()">
                                        <span v-if="currentArticle.published_at">Publicado</span>
                                        <span v-if="! currentArticle.published_at">Publicar</span>
                                    </button>

                                    <button type="text" class="btn btn-primary" @click="__saveCurrent()" :disabled="__unchanged()">
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
                                                        <input type="text" class="form-control" v-model="currentArticle.title">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Subtítulo</label>
                                                        <input type="text" class="form-control" v-model="currentArticle.subtitle">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Categoria</label>
                                                        <input type="text" class="form-control" v-model="currentArticle.category">
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
                                                    :value="currentArticle.lead"
                                                    @input="__updateLead(currentArticle, $event.target.value)"
                                                    ref="input"
                                                >
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 bg-warning">
                                            <div class="form-group">
                                                <label></label>
                                                <div class="article-body">
                                                    <p v-html="currentArticle.lead_html"></p>
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
                                                        :value="currentArticle.body"
                                                        @input="__updateBody(currentArticle, $event.target.value)"
                                                        ref="input"
                                                >
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 bg-warning">
                                            <div class="form-group">
                                                <label></label>
                                                <div class="article-body">
                                                    <p v-html="currentArticle.body_html"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <button type="text" class="btn btn-primary" @click="__saveCurrent()" :disabled="__unchanged()">Salvar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
