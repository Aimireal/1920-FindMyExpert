<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />


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
                            <option value="{{$row->category_id}}">{{$row->category_name}}</option>
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
                        data: 'company_name', name: 'company_name'
                    },
                    {
                        data: 'category_name', name: 'category_name', orderable: false
                    },
                    {
                        data: 'first_name', name: 'first_name'
                    },
                    {
                        data: 'last_name', name: 'last_name'
                    },
                    {
                        data: 'email', name: 'email'
                    },
                    {
                        data: 'phone', name: 'phone'
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