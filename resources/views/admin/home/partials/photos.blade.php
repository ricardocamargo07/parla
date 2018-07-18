<br>

<div class="row" v-if="currentArticle && currentArticle.photos">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-toolbar">
                            @{{ !currentArticle ? 0 : currentArticle.photos.length }} fotos

                            <div class="btn btn-danger btn-sm pull-right" data-toggle="modal" data-target="#add-photo-modal">
                                <i class="fa fa-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body scrollable">
                <div class="row">
                    <div class="col-md-12">
                        <div class="div">
                            <ul class="list-group">
                                <li v-for="photo in __orderedPhotos()" @click="__selectPhoto(photo)" :class="'list-group-item cursor-pointer bg-info ' + (currentPhotoId == photo.id ? 'active' : '')">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            @{{ photo.author }} (id @{{ photo.id }})
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

    <div class="col-md-9" v-if="currentPhoto">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <h4 class="col-md-8">
                        <span>Fotografia @{{ currentPhoto.id }}</span>
                    </h4>

                    <div class="col-md-4">
                        <div class="text-right">
                            <button :class="'btn ' + (currentPhoto.main ? 'btn-success' : 'btn-default')" @click="__toggleCurrentPhotoMain()">
                                <span v-if="currentPhoto.main">Esta é a principal</span>
                                <span v-if="!currentPhoto.main">Marcar como principal</span>
                            </button>

                            <button class="btn btn-success" @click="__saveCurrentPhoto()" :disabled="__photoUnchanged()">
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
                                                <label>Autor</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    :value="currentPhoto.author"
                                                    @input="__updatePhotoField('author', $event.target.value)"
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>URL para foto em alta resolução</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    :value="currentPhoto.url_highres"
                                                    @input="__updatePhotoField('url_highres', $event.target.value)"
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>URL para a foto em baixa resolução</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    :value="currentPhoto.url_lowres"
                                                    @input="__updatePhotoField('url_lowres', $event.target.value)"
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Legenda</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    :value="currentPhoto.notes"
                                                    @input="__updatePhotoField('notes', $event.target.value)"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div v-if="currentPhoto.url_highres">
                                        <p>Em alta</p>
                                        <img :src="currentPhoto.url_highres" alt="" width="300px">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div v-if="currentPhoto.url_lowres">
                                        <p>Em baixa</p>
                                        <img :src="currentPhoto.url_lowres" alt="" width="300px">
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
</div>
