<!-- Modal -->
<div class="modal fade" id="delete{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> حذف الخدمة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('service.destroy', $service->id) }}" method="POST" autocomplete="off">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <h6> هل انت متاكد من حذف الخدمة ؟؟ </h6>
                        <input type="hidden" name="id" value="{{ $service->id }}">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-primary" type="submit"> حذف الخدمة </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
