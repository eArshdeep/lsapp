<!-- Modal Button -->
<button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#confirm-delete">
  Delete
</button>

<!-- Modal Structure -->
<div class="modal fade" tabindex="-1" id="confirm-delete" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
            <div class="modal-header">
                <p id="modal-header">Delete Page?</p>
            </div>
            <div class="modal-body">
                <p>Think before you act. This cannot be undone!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Nevermind</button>
                @include('inc.pageDeleteBtn')
            </div>
    </div>
  </div>
</div>

{{ Html::style('css/deleteModal.css') }}