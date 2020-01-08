<head>
    <title>Testing</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br />
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="expert_table">
            <thead>
            <tr>
                <th>Business Name</th>
                <th>
                    <select name="category_filter" id="category_filter" class="form-control">
                        <option value="">Select Business Type</option>
                        @foreach($category as $row)
                            <option value="{{$row->id}}">{{$row->category_name}}</option>
                        @endforeach
                    </select>
                </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
</body>

<script>
    $(document).ready(function(){
        fetch_data();

        function fetch_data(category = '')
        {
            $('#expert_table').DataTable({
                processing:true,
                serverSide:true,
                ajax:{
                    url:"{{route('column-searching.index')}}",
                    data: {category:category}
                },
                columns:[
                    {
                        data: 'company_name', name: 'company_name',
                    },
                    {
                        data: 'category_name', name: 'category_name',
                    },
                    {
                        data: 'first_name', name: 'first_name',
                    },
                    {
                        data: 'last_name', name: 'last_name',
                    },
                    {
                        data: 'email', name: 'email',
                    },
                    {
                        data: 'phone', name: 'phone',
                    }
                ]
            });
        }

        $('#category_filter').change(function(){
            var category_id = $('#category_filter').val();
            $('#expert_table').DataTable().destroy();
            fetch_data(category_id);
        });
    });
</script>