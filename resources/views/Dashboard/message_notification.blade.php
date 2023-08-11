 @if (session()->has('add'))
     <div> تمت الاضافة بنجاح </div>
     <script>
         window.onload = function() {
             notif({
                 msg: "تمت الاضافة بنجاح",
                 type: 'success'
             })
         }
     </script>
 @endif
 @if (session()->has('success'))
     <div> تم التعديل بنجاح </div>
     <script>
         window.onload = function() {
             notif({
                 msg: "  تم التعديل بنجاح    ",
                 type: 'success'
             })
         }
     </script>
 @endif
 @if (session()->has('delete'))
     <div> تم الحذف بنجاح </div>
     <script>
         window.onload = function() {
             notif({
                 msg: "  تم الحذف  بنجاح    ",
                 type: 'success'
             })
         }
     </script>
 @endif
