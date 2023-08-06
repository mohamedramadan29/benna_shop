<!-- Modal -->
<div class="modal fade" id="delete_select" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> حذف الدكتور </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('doctors.destroy', 'test') }}" method="POST" autocomplete="off">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <h6> حذف مجموعه من الاطباء </h6>
                        <input type="text" name="delete_select_id" id="delete_select_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-danger" type="submit"> حذف الاطباء </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
