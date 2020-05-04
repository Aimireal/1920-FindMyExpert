<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

@extends('layouts.app')
@section('content')
    <div class="container">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Error! </strong>{{$error}}
                </div>
            @endforeach
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">View Expert</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('update', $expert->id)}}" method="POST">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="form-group">
                            <label for="category_filter" class="col-md-2 control-label">Business Type</label>

                            <div class="col-md-10">
                                <select name="companyType" id="companyType" class="form-control" readonly="true" disabled>
                                    <option value="">Select Business Type</option>
                                    @foreach($category as $row)
                                        <option value="{{$row->category_id}}"{{($expert->company_type == $row->category_id) ? ' selected': ''}}>{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="companyName" class="col-md-2 control-label">Business Name</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$expert->company_name}}"name="companyName" placeholder="Company Name" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location" class="col-md-2 control-label">Location</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="location"
                                       id="search_input" placeholder="Location" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstName" class="col-md-2 control-label">First Name</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$expert->first_name}}" name="firstName" placeholder="First Name" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastName" class="col-md-2 control-label">Last Name</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$expert->last_name}}"name="lastName" placeholder="Last Name" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-md-2 control-label">Contact Email</label>

                            <div class="col-md-10">
                                <input type="email" class="form-control" value="{{$expert->email}}"name="email" id="inputEmail" placeholder="Email" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-2 control-label">Phone Number</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$expert->phone}}"name="phone" placeholder="Phone Number" readonly>
                            </div>
                        </div>

                        <div>
                            <div id="wpac-rating"></div>
                            <script type="text/javascript">
                                wpac_init = window.wpac_init || [];
                                wpac_init.push({widget: 'Rating', id: 24993});
                                (function() {
                                    if ('WIDGETPACK_LOADED' in window) return;
                                    WIDGETPACK_LOADED = true;
                                    var mc = document.createElement('script');
                                    mc.type = 'text/javascript';
                                    mc.async = true;
                                    mc.src = 'https://embed.widgetpack.com/widget.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
                                })();
                            </script>
                        </div>

                        <div class="form-group">
                            <div id="disqus_thread"></div>
                            <script>
                                var disqus_config = function () {
                                this.page.url = '{{Request::url()}}';
                                this.page.identifier = '{{$expert->id}}';
                                };
                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = 'https://findmyexpert.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection