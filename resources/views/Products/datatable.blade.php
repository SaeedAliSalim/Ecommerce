@extends('Layouts.Master')
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
</script>

<style>
    table,
    th,
    td {
        text-align: center;
    }
</style>
@section('content')
    <div class="container-fluid my-5" style="direction: rtl">

        <div class="text-right">

                <a href="/addproduct" class="btn btn-warning my-3 w-25">
                    إضافة منتج <i class="fas fa-plus ml-2"></i></a>

        </div>

        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">الاسم</th>
                    <th class="text-center">الوصف</th>
                    <th class="text-center">الكمية</th>
                    <th class="text-center">السعر</th>
                    <th class="text-center">الصورة</th>
                    <th class="text-center">.......</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="single-product.html"><img src="{{ $item->imagepath }}"
                                    style="max-height: 100px;min-height: 100px" alt=""></a>
                        </td>

                        <td>
                            <a href="/editproduct/{{ $item->id }}" class="btn btn-warning">
                                <i class="fas fa-tag ml-2 "></i>تعديل الصنف</a>

                            <a href="/removeproduct/{{ $item->id }}" class="btn btn-danger">
                                <i class="fas fa-trash-alt ml-2"></i>حذف الصنف</a>
                        </td>


                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection


<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable');
    });
</script>
