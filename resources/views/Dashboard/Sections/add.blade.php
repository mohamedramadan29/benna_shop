<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">أضافة قسم </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sections.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="inputName"
                            placeholder="اسم القسم ">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-primary" type="submit"> اضافة قسم </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
