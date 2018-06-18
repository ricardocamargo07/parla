{{--
<nav class="flex items-center justify-between flex-wrap bg-red-dark p-6">
    <div class="flex items-center flex-no-shrink text-white mr-6">
                    <span class="text-3xl tracking-tight">
                        <title>{{ config('app.name') }}</title>
                    </span>
    </div>
</nav>
--}}


<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="#">Project name</a>--}}
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Capa</a></li>
                {{--<li><a href="#">Outras Edições</a></li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Outras Edições <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="#">Edição nº157</a></li>--}}
                        {{--<li><a href="#">Edição nº158</a></li>--}}
                        {{--<li><a href="#">Edição nº159</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li class="dropdown-header">Nav header</li>--}}
                        {{--<li><a href="#">Separated link</a></li>--}}
                        {{--<li><a href="#">One more separated link</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="{{ Request::is('contact') ? 'active' : '' }}">--}}
                    {{--<a href="/contact">Fale Conosco</a>--}}
                {{--</li>--}}
            </ul>

            <ul class="nav navbar-nav navbar-right">
                {{--<li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
                <li><a href="../navbar-static-top/">Static top</a></li>
                <li><a href="../navbar-fixed-top/">Fixed top</a></li>--}}

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control pull-right nav-search"
                            placeholder="Procurar"
                            v-model="search"
                        >
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search">
									<span class="sr-only">Procurar</span>
								</span>
                            </button>
						</span>
                    </div>
                </form>

            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

