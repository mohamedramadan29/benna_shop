<!-- Modal -->
<div class="modal fade" id="edit{{ $insurance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="{{ route('insurance_company.update', $insurance->id) }}" method="POST" autocomplete="off">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $insurance->id }}">
                        <input value="{{ $insurance->insurance_code }}" autofocus name="insurance_code" type="text" class="form-control" id="inputName"
                            placeholder=" كود الشركة ">
                    </div>
                    <div class="form-group">
                        <input value="{{ $insurance->name }}" name="name" type="text" class="form-control" id="inputName"
                            placeholder="الاسم ">
                    </div>
                    <div class="form-group">
                        <input value="{{ $insurance->discount_percentage }}" name="discount_percentage" type="number" class="form-control" id="inputName"
                            placeholder="نسبة تحمل المريض  %">
                    </div>
                    <div class="form-group">
                        <input value="{{ $insurance->company_rate }}" name="company_rate" type="number" class="form-control" id="inputName"
                            placeholder=" نسبة تحمل شركة التامين % ">
                    </div>
                    <div class="form-group">
                        <textarea placeholder="ملاحظات" name="notes" id="" class="form-control">{{ $insurance->notes }}</textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option {{ $insurance->status == 1 ? "selected":"" }} value="1"> مفعل </option>
                            <option {{ $insurance->status == 0 ? "selected":"" }}  value="0"> غير مفعل </option>
                        </select>
                    </div>
                     
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> اغلاق </button>
                        <button class="btn btn-primary" type="submit"> تعديل الشركة  </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
