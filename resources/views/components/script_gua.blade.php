<script>
        (function(jQuery) {
            "use strict";
            
            var table_product_type = jQuery('#table_product_type').DataTable({
              processing:false,
              serverSide:false,
              order : [[ 0, "asc" ]],
              ajax: "{{ route('getProductType.consumer') }}",
              columns: [
                {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'product.p_name', name :'product.p_name'},
                {data:'jumlah', name :'jumlah'}
              ],
              columnDefs: [
                { className: 'text-center', targets: [0] },
                { render: jQuery.fn.dataTable.render.number(".", ".", 0,),  targets: [2] },
                {"targets": '_all', "defaultContent": ""},
              ],
              // dom: 'lBfrtip',

            });


            var table_location_stat_city = jQuery('#table_location_stat_city').DataTable({
              processing:false,
              serverSide:false,
              order : [[ 0, "asc" ]],
              ajax: "{{ route('getCity.consumer') }}",
              columns: [
                {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'location.regency', name :'location.regency'},
                {data:'jumlah', name :'jumlah'}
              ],
              columnDefs: [
                { className: 'text-center', targets: [0] },
                { render: jQuery.fn.dataTable.render.number(".", ".", 0,),  targets: [2] },
                {"targets": '_all', "defaultContent": ""},
              ],
              // dom: 'lBfrtip',

            });


            var table_location_stat_district = jQuery('#table_location_stat_district').DataTable({
              processing:false,
              serverSide:false,
              order : [[ 0, "asc" ]],
              ajax: "{{ route('getDistrict.consumer') }}",
              columns: [
                {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'location.regency', name :'location.regency'},
                {data:'jumlah', name :'jumlah'}
              ],
              columnDefs: [
                { className: 'text-center', targets: [0] },
                { render: jQuery.fn.dataTable.render.number(".", ".", 0,),  targets: [2] },
                {"targets": '_all', "defaultContent": ""},
              ],
              // dom: 'lBfrtip',

            });

            var table_location_by_ktp = jQuery('#table_location_by_ktp').DataTable({
              processing:false,
              serverSide:false,
              order : [[ 3, "dsc" ]],
              ajax: "{{ route('getKtp') }}",
              columns: [
              {data:'DT_RowIndex', name:'DT_RowIndex'},
              {data:'code', name :'code'},
              {data:'name', name:'name'},
              {data:'count', name :'count'}
              ],
              columnDefs: [
              { className: 'text-center', targets: [0] },
              { render: jQuery.fn.dataTable.render.number(".", ".", 0,), targets: [2] },
              {"targets": '_all', "defaultContent": ""},
              ],
            });
            
        })(jQuery);
</script>