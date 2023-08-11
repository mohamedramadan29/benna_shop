<!-- Modal -->
<div class="modal fade" id="update_password{{ $doctor->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تعديل كلمة المرور </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update_password') }}" method="POST" autocomplete="off">
                    @csrf
                  
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                        <label for=" "> كلمة المرور الجديدة </label>
                        <input class="form-control" type="password" name="password" value="">
                        <label for=""> تاكيد كلمة المرور </label>
                        <input class="form-control" type="password" name="password_confirmation" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-primary" type="submit"> تعديل كلمة المرور </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
