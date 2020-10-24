<div class="modal fade bs-confirm-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p class="text-left">Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button id="delete-confirm" type="button" class="btn btn-danger waves-effect text-left">Yes</button>
                <button type="button" class="btn btn-secondary waves-effect text-left" data-dismiss="modal">No</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@section('js')
<script>
    let form = '';
    $('.bs-confirm-modal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        form = button.data('value');
    });

    $('#delete-confirm').click(()=>{
        $('#'+form).submit();
    });
</script>
@endsection
