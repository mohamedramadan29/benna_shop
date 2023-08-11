<!-- Modal -->
<div class="modal fade" id="add_services" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">أضافة خدمة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('service.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="inputName"
                            placeholder="اسم الخدمة  ">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="price" id="inputName" placeholder=" السعر ">
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="" class="form-control" placeholder="وصف الخدمة "></textarea>
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control" id="">
                            <option value=""> اختر الحالة </option>
                            <option value="1"> فعالة </option>
                            <option value="0"> غير فعالة </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-primary" type="submit"> اضافة خدمة </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
