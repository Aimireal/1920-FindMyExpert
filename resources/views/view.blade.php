@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('successMsg'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Well done!</strong> {{session('successMsg')}}
            </div>
        @endif
    </div>

    <div class="form-group col-md-3">
        <label for="dropdown">Business Type</label>
        <select id="dropdown" class="form-control">
            <option value="">Select a business type...</option>
            <option value="Accounting">Accounting</option>
            <option value="Administration">Administration</option>
            <option value="Architecture">Architecture</option>
            <option value="Agriculture">Agriculture</option>
            <option value="Banking">Banking</option>
            <option value="Charity">Charity</option>
            <option value="Communications">Communications</option>
            <option value="Banking">Banking</option>
            <option value="Construction">Construction</option>
            <option value="Creative">Creative</option>
            <option value="Customer Service">Customer Service</option>

            <option value="Editorial">Editorial</option>
            <option value="Education">Education</option>
            <option value="Engineering">Engineering</option>
            <option value="Environmental">Environmental</option>
            <option value="Finance">Finance</option>
            <option value="Headhunting">Headhunting</option>
            <option value="Healthcare">Healthcare</option>
            <option value="Hospitality">Hospitality</option>
            <option value="Human Resources">Human Resources</option>
            <option value="Insurance">Insurance</option>

            <option value="IT/Computing">IT/Computing</option>
            <option value="Legal">Legal</option>
            <option value="Leisure">Leisure</option>
            <option value="Maintenance">Maintenance</option>
            <option value="Management">Management</option>
            <option value="Manufacturing/Executive">Manufacturing/Executive</option>
            <option value="Marketing">Marketing</option>
            <option value="Mechanical">Mechanical</option>
            <option value="Operations/Logistics">Operations/Logistics</option>
            <option value="Project Management">Project Management</option>

            <option value="Public Sector">Public Sector</option>
            <option value="Quality Assurance">Quality Assurance</option>
            <option value="Retail">Retail</option>
            <option value="Sales">Sales</option>
            <option value="Science">Science</option>
            <option value="Security">Security</option>
            <option value="Social">Social</option>
            <option value="Sport">Sport</option>
            <option value="Support">Support</option>
            <option value="Training">Training</option>

            <option value="Other/Not Listed">Other/Not Listed</option>
        </select>
    </div>

    <div class="form-group">
        <label for="companyType" class="col-md-2 control-label">Business Type</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="companyType" placeholder="Company Type">
        </div>
    </div>

@endsection