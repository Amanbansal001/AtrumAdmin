<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/jszip/jszip.min.js"></script>
<script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="/assets/dist/js/api.js"></script>
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->

<script>
    function ddmmyyyy(date, delimitor = "-"){
        var today = new Date(date);
        var dd = today.getDate();

        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }
        //today = mm + '-' + dd + '-' + yyyy;
        //console.log(today);
        today = `${dd}${delimitor}${mm}${delimitor}${yyyy}`;
        //console.log(today);
        //today = dd + '-' + mm + '-' + yyyy;
        //console.log(today);
        //today = dd + '/' + mm + '/' + yyyy;
        //console.log(today);

        return today;
    }

    __ajax_http("notifications?userId=-1&sortBy=desc", ``, [], "GET", "notifications", function(res) {
        let n = res.data.fetch;
        var html = "";
        n.forEach(e => {
            let d = ddmmyyyy(e.createdAt);
            let orderId = e.orderId!=0 ? ` #ORD${String(e.orderId).padStart(6, '0')} `:'';
            let link = e.orderId!=0 ?"/order/detail.php?id="+e.orderId+"":"#";
            html += '<a href='+link+' class="dropdown-item">' +
                '<i class="fas fa-envelope mr-2"></i>' + e.message + orderId +
                '<span class="float-right text-muted text-sm">' + d + '</span>' +
                '</a>';
        })

        if (n.length == 0) {
            html = '<a href="#" class="dropdown-item">' +
                '<i class=""></i>No new notifications' +
                '' +
                '</a>';
        }

        $("#notifications").html(html);
    });
</script>