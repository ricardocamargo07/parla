<br>

<div class="col-md-12" v-if="currentArticle">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h4 class="col-md-8">
                    <span v-if="currentArticle.title">@{{ currentArticle.title }}</span>
                    <span v-if="!currentArticle.title && currentArticle.new">NOVO POST</span>
                </h4>

                <div class="col-md-4">
                    <div class="text-right">
                        <button :class="'btn ' + (currentArticle.featured ? 'btn-success' : 'btn-default')" @click="__toggleCurrentFeatured()">
                            <span v-if="!currentArticle.featured">Destacar</span>
                            <span v-if="currentArticle.featured">Destacado</span>
                        </button>

                        <button :class="'btn ' + (currentArticle.published_at ? 'btn-success' : 'btn-default')" @click="__toggleCurrentPublished()">
                            <span v-if="currentArticle.published_at">Publicado</span>
                            <span v-if="! currentArticle.published_at">Publicar</span>
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
                                                    :value="currentArticle.title"
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
                                                    :value="currentArticle.subtitle"
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
                                                    :value="currentArticle.category"
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
                                                    :value="currentArticle.authors_inline"
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
                                            :value="currentArticle.lead"
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
                                        <p v-html="currentArticle.body_html"></p>
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
