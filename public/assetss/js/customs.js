// =============  Data Table - (Start) ================= //

$(document).ready(function(){

    var table = $('#example').DataTable({

        buttons:['pdf', 'print'],
        searching: false,
        lengthMenu: [[-1], ["All"]]

    });


    table.buttons().container()
    .appendTo('#example_wrapper .col-md-6:eq(0)');

});


function printDocument() {
    var printContents = document.getElementById("printSection").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

function generatePDF() {
    const element = document.getElementById('content-to-pdf');
    const doc = new jspdf();
    doc.html(element);
    doc.save("document.pdf");
}


// =============  Data Table - (End) ================= //
