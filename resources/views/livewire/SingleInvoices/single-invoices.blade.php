<div>

    @if($invoice_saved)
        <div class="alert alert-success"> تم حفظ الفاتورة بنجاح  </div>
    @endif
    @if($invoice_update)
        <div class="alert alert-success"> تم تعديل الفاتورة بنجاح </div>
    @endif

    @if($show_table)
        @include('livewire.SingleInvoices.table')
        @else
        add table

    @endif
</div>
