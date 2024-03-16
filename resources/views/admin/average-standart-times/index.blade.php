@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Rata Rata Waktu Baku</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" style="vertical-align : middle;text-align:center;">Element Kerja</th>
                            <th colspan="4">Waktu Baku</th>
                        </tr>
                        <tr>
                            <th>X1</th>
                            <th>X2</th>
                            <th>X3</th>
                            <th>Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workElements as $workElement)
                            <tr>
                                <td colspan="5" class="table-primary text-start"><b>{{ $workElement->name }}</b></td>
                            </tr>
                            @foreach ($workElement->subWorkElements as $subWorkElement)
                                <tr>
                                    <td colspan="5">{{ $subWorkElement->order }}. {{ $subWorkElement->name }}</td>
                                </tr>
                                @foreach ($subWorkElement->detailElements as $detailElement)
                                    <tr class="text-center">
                                        <td class="text-start">
                                            <p class="">
                                                {{ $detailElement->name }}
                                            </p>
                                        </td>
                                        @foreach ($detailElement->standartTimeCalculations->where('order', 1) as $standartTimeCalculation)
                                            <td>{{ $standartTimeCalculation->standard_time }}</td>
                                        @endforeach
                                        @foreach ($detailElement->standartTimeCalculations->where('order', 2) as $standartTimeCalculation)
                                            <td>{{ $standartTimeCalculation->standard_time }}</td>
                                        @endforeach
                                        @foreach ($detailElement->standartTimeCalculations->where('order', 3) as $standartTimeCalculation)
                                            <td>{{ $standartTimeCalculation->standard_time }}</td>
                                        @endforeach
                                        <td>{{ $detailElement->average }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script> --}}
@endsection
