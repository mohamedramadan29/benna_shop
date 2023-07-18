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
