<!-- Modal -->
<div class="modal fade" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تعديل القسم </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" autocomplete="off">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                        <input type="text" class="form-control" name="name" id="inputName"
                            placeholder="اسم القسم " value="{{ $doctor->name }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-primary" type="submit"> تعديل القسم </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
