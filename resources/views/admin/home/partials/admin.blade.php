<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-toolbar">
                            @{{ editions.length }} edições

                            <div class="btn btn-danger btn-sm pull-right" data-toggle="modal" @click="__clearNewEdition()" data-target="#add-edition-modal">
                                <i class="fa fa-plus"></i>
                            </div>

                            <button :class="'pull-right btn btn-sm ' + (__currentEditionIsPublished() ? 'btn-success' : 'btn-default')" @click="__togglePublishedEdition()">
                                <span v-if="!__currentEditionIsPublished()">Publicar</span>
                                <span v-if="__currentEditionIsPublished()">Publicado</span>
                            </button>

                            <button class="pull-right btn btn-sm btn-primary" @click="__backup()">
                                Backup
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
                                <li v-for="edition in __filteredEditions()" @click="busy ? false : __selectEdition(edition, true)" :class="'list-group-item cursor-pointer bg-info ' + (currentEdition && currentEdition.id == edition.id ? 'active' : '')">
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <span v-if="edition.published_at"><i class="fa fa-check"></i></span>
                                            <span v-if="!edition.published_at"><i class="fa fa-ban"></i></span>

                                            Parla @{{ edition.number }} - @{{ edition.year }}/@{{ edition.month }}
                                        </div>

                                        <div class="col-xs-4 text-right">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <span v-if="currentEdition && currentEdition.id === edition.id && busy">
                                                        <i class="fa fa-cog fa-spin"></i>
                                                    </span>
                                                </div>

                                                <div class="col-xs-9 pull-right">
                                                    <button class="pull-right btn btn-sm btn-danger" @click="__loadNewEditionData(edition)" data-toggle="modal" data-target="#edit-edition-modal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </div>
                                            </div>
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

                                        <input
                                            type="text"
                                            :value="filter"
                                            @input="setFilter"
                                            class="form-control"
                                        >

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

<div class="row" v-if="currentArticle">
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#postPane" aria-controls="home" role="tab" data-toggle="tab">Post</a>
            </li>

            <li role="presentation">
                <a href="#photosPane" aria-controls="profile" role="tab" data-toggle="tab">Fotos</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="postPane">
                @include('admin.home.partials.post')
            </div>
            <div role="tabpanel" class="tab-pane " id="photosPane">
                @include('admin.home.partials.photos')
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-edition-modal" tabindex="-1" role="dialog">
        @include('admin.home.partials.edit-edition-modal', ['mode' => 'create'])
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit-edition-modal" tabindex="-1" role="dialog">
        @include('admin.home.partials.edit-edition-modal', ['mode' => 'edit'])
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-photo-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nova foto</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="photo-author">Autor</label>
                            <div class="col-sm-9">
                                <input
                                    class="form-control"
                                    id="photo-author"
                                    :value="newPhoto.author"
                                    @input="setNewPhotoAuthor($event.target.value)"
                                />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="photo-high">Foto em alta</label>
                            <div class="col-sm-9">
                                <input
                                    class="form-control"
                                    id="photo-high"
                                    :value="newPhoto.url_highres"
                                    @input="setNewPhotoUrlHighres($event.target.value)"
                                />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="photo-low">Foto em baixa</label>
                            <div class="col-sm-9">
                                <input
                                    class="form-control"
                                    id="photo-low"
                                    :value="newPhoto.url_lowres"
                                    @input="setNewPhotoUrlLowres($event.target.value)"
                                />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="photo-notes">Legenda</label>
                            <div class="col-sm-9">
                                <input
                                    class="form-control"
                                    id="photo-notes"
                                    :value="newPhoto.notes"
                                    @input="setNewPhotoNotes($event.target.value)"
                                />
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" @click="__createNewPhoto()" :disabled="__newPhotoUnchanged()">Gravar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>
