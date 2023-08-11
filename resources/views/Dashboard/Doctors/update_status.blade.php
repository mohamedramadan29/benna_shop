<!-- Modal -->
<div class="modal fade" id="update_status{{ $doctor->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تعديل حالة الدكتور </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update_status') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                        <select name="status" class="form-control" id="">
                            <option {{ $doctor->status == 1 ? 'selected' : '' }} value="1"> مفعل </option>
                            <option {{ $doctor->status == 0 ? 'selected' : '' }} value="0"> غير مفعل </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-primary" type="submit"> تعديل الحالة </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
