<!-- Modal -->
<div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> حذف القسم </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sections.destroy', $section->id) }}" method="POST" autocomplete="off">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <h2> هل انت متاكد من حذف القسم ؟؟ </h2>
                        <input type="hidden" name="id" value="{{ $section->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-primary" type="submit"> حذف  القسم </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
