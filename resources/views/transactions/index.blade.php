@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Report') }}
                    </div>

                    <div class="card-body bg-white">

                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>

                        <h5 class="mt-2">Sub Total</h5>
                        @foreach ($getDetail as $gd)
                        <div class="form-group">
                            <label for="Subtotal">{{ $gd->month_name }}</label>
                            <input type="text" class="form-control" id="Subtotal" name="Subtotal" value="{{ number_format($gd->Subtotal, 2, ',', '.') }}" min="0" readonly>
                        </div>
                        @endforeach
                        <h5 class="mt-2">Discount</h5>
                        @foreach ($getDetail as $gd)
                        <div class="form-group">
                            <label for="Discount">{{ $gd->month_name }}</label>
                            <input type="text" class="form-control" id="Discount" name="Discount" value="{{ number_format($gd->Discount, 2, ',', '.') }}" min="0" readonly>
                        </div>
                        @endforeach
                        <h5 class="mt-2">Total</h5>
                        @foreach ($getDetail as $gd)
                        <div class="form-group">
                            <label for="Total">{{ $gd->month_name }}</label>
                            <input type="text" class="form-control" id="Total" name="Total" value="{{ number_format($gd->Total, 2, ',', '.') }}" min="0" readonly>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        {{ __('Transactions') }}
                    </div>

                    <div class="card-body bg-white">
                        <div class="table-responsive">


                        <table class="table" id="trans_table">
                            <thead>
                                <tr class="filters">
                                    <th><input class="form-control" style="width: 80px" type="text" placeholder="Course">
                                    </th>
                                    <th><input class="form-control" style="width: 90px" type="text"
                                            placeholder="Instructor"></th>
                                    <th>Customer</th>
                                    <th><input class="form-control" style="width: 80px" type="text" placeholder="Member">
                                    </th>
                                    <th>Discount</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trans as $t)
                                    <tr>
                                        <td>{{ $t->course->CourseName }}</td>
                                        <td>{{ $t->instructor->InstructorName }}</td>
                                        <td>{{ $t->transaction->CustName }}</td>
                                        <td>{{ $t->transaction->Member }}</td>
                                        <td>{{ number_format($t->Discount, 2, ',', '.') }}</td>
                                        <td>{{ number_format($t->Price, 2, ',', '.') }}</td>
                                        <td>{{ $t->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables library -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script type="text/javascript">

    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};

    const data = {
        labels: labels,
        data: users,
    };

    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            title:{
                text: "Sales Graph"        
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "doughnut",
                dataPoints: data.labels.map(function(label, index) {
                    return {
                        label: label,
                        y: data.data[index]
                    };
                })
            }
            ]
        });
        chart.render();
    }
    </script>



<script>
    $(document).ready(function() {

        var table = $('#trans_table').DataTable();

        // Apply search to each input field
        $('.filters input').on('keyup change', function() {
            var columnIndex = $(this).closest('th').index();
            table.column(columnIndex).search(this.value).draw();
        });
    });
</script>
