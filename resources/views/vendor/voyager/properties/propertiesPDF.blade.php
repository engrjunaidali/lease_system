

{{-- <link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" /> --}}
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="container">
    {{-- <button id="exportButton" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-pdf-o"></span> Export to PDF</button> --}}
    <h1>Properties</h1>
    <table id="exportTable" class="table table-hover">
        <thead>
            <tr>
                <th>Unit No</th>
                <th>Location</th>
                <th>Price</th>
                <th>Area</th>
                <th>Purpose</th>
                <th>Type</th>
                <th>Baths</th>
                <th>Bedrooms</th>
                <th>Stories</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $item)

            <tr>
                {{-- {{$item}} --}}
                <td>{{$item->unit_no;}}</td>
                <td>{{$item->location;}}</td>
                <td>{{$item->price;}}</td>
                <td>{{$item->area;}}</td>
                <td>{{$item->purpose;}}</td>
                <td>{{$item->type;}}</td>
                <td>{{$item->baths;}}</td>
                <td>{{$item->bedrooms;}}</td>
                <td>{{$item->stories;}}</td>
            </tr>

            
            @endforeach

            
        </tbody>
    </table>
</div>

<!-- you need to include the shieldui css and js assets in order for the components to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                        unit_no: { type: String },
                        location: { type: Number },
                        price: { type: String }
                        area: { type: String }
                        purpose: { type: String }
                        type: { type: String }
                        baths: { type: String }
                        bedrooms: { type: String }
                        stories: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to PDF
            dataSource.read().then(function (data) {
                var pdf = new shield.exp.PDFDocument({
                    author: "PrepBootstrap",
                    created: new Date()
                });

                pdf.addPage("a4", "portrait");

                pdf.table(
                    50,
                    50,
                    data,
                    [
                        { field: "unit_no", title: "Person Name", width: 200 },
                        { field: "Age", title: "Age", width: 50 },
                        { field: "Email", title: "Email Address", width: 200 }
                    ],
                    {
                        margins: {
                            top: 50,
                            left: 50
                        }
                    }
                );

                pdf.saveAs({
                    fileName: "PrepBootstrapPDF"
                });
            });
        });
    });
</script>

<style>
    #exportButton {
        border-radius: 0;
    }
</style>