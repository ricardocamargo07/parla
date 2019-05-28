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
                            :value="newEdition.number"
                            @input="setNewEditionNumber($event.target.value)"
                            style="text-align:right;"
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
                            :value="newEdition.year"
                            @input="setNewEditionYear($event.target.value)"
                            style="text-align:right;"
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
                            :value="newEdition.month"
                            @input="setNewEditionMonth($event.target.value)"
                            style="text-align:right;"
                        >
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            @if ($mode == 'create')
                <button type="button" class="btn btn-default" data-dismiss="modal" @click="__createNewEdition()">Criar</button>
            @else
                <button type="button" class="btn btn-default" data-dismiss="modal" @click="__updateNewEdition()">Gravar</button>
            @endif

            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>
