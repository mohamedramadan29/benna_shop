<!-- Modal -->
<div class="modal fade" id="edit_services{{ $service->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تعديل الخدمة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('service.update', $service->id) }}" method="POST" autocomplete="off">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $service->id }}">
                        <input value="{{ $service->name }}" type="text" class="form-control" name="name"
                            id="inputName" placeholder="اسم الخدمة  ">
                    </div>
                    <div class="form-group">
                        <input value="{{ $service->price }}" type="number" class="form-control" name="price"
                            id="inputName" placeholder=" السعر ">
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="" class="form-control" placeholder="وصف الخدمة "> {{ $service->description }}  </textarea>
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control" id="">
                            <option value=""> اختر الحالة </option>
                            <option {{ $service->status == 1 ? 'selected' : '' }} value="1"> فعالة </option>
                            <option {{ $service->status == 0 ? 'selected' : '' }} value="0"> غير فعالة </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-primary" type="submit"> تعديل خدمة </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
