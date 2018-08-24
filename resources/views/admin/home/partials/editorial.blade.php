<div style="margin-top: 25px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="btn-toolbar">
                Editorial
            </div>
        </div>
        <div class="panel-body scrollable">
            <textarea v-model="editorial" cols="30" rows="20" class="form-control"></textarea>

            <div @click="__saveEditorial()" :class="'pull-right btn btn-sm ' + (editorial == editorialCopy ? 'btn-default' : 'btn-primary')" style="margin-top: 25px;">
                <span v-if="editorial == editorialCopy">
                    Gravado
                </span>

                <span v-else>
                    Gravar
                </span>
            </div>
        </div>
    </div>
</div>
