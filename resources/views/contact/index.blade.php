@extends('layouts.main')

@section('contents')
    <section class="contact">
        <div class="container">
            <div class="row">
                <form id="contact-form" method="post" action="contact.php" role="form" class="contact-form">
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1> Fale Conosco </h1>
                                {{--<p class="bd-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in dictum sapien, et mollis neque. Quisque luctus quam quis mattis ultrices. Nam a felis quis neque pretium laoreet. Phasellus sed felis placerat, fermentum elit at, vulputate velit. In facilisis enim at nibh tempus, at blandit mi euismod. Nam blandit molestie mi, tempus consequat odio pulvinar quis. Mauris malesuada orci vel lectus elementum efficitur. Sed porta consequat diam, sed placerat est. Sed egestas lobortis risus sit amet tincidunt. Phasellus at sapien et quam sagittis bibendum et sit amet libero. In erat justo, vestibulum in turpis vitae, convallis feugiat nisi.</p>--}}
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Nome *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Seu nome *" required="required" data-error="Nome é um campo obrigatório.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Sobrenome *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Seu sobrenome *" required="required" data-error="Sobrenome é um campo obrigatório.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Seu email *" required="required" data-error="É necessário a inserção de um endereço de email válido.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_phone">Telefone</label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Seu telefone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Mensagem *</label>
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Escreva aqui a sua mensagem *" rows="4" required="required" data-error="Por favor, escreva aqui a sua mensagem."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="ENVIAR">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted"><strong>*</strong> Campos Obrigatórios. </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@stop
