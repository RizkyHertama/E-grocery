@extends('layouts.template')

@section('title', 'Amazing E-Grocery | Update Role')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1">
                <form class="mx-4"  action="{{url('updateRoleDetail/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                    {{-- action="/updateRoleDetail" --}}
                    {{ method_field('PUT') }}
                    @csrf

                    <div class="card">
                        <h4 class="text-center mb-3 form-title">{{ __('accmain.urole') }}</h4>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 mt-5 m-auto">

                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>{{ __('accmain.fname') }}</td>
                                                <td width="10">:</td>
                                                <td>{{ $user->first_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('accmain.lname') }}</td>
                                                <td width="10">:</td>
                                                <td>{{ $user->last_name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    {{-- Role --}}
                                    <div class="form-group row mt-4">
                                        <label
                                            for="role_id"class="col-md-2 col-form-label text-md-right">{{ __('accmain.role') }}</label>
                                        <div class="col-md-6">
                                            <select name="role_id" id="role_id">
                                                <option value="1" {{$user->role_id == '1' ? 'selected':''}}>Admin</option>
                                                <option value="2" {{$user->role_id == '2' ? 'selected':''}}>Member</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Update Button --}}
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class=" btn mt-2 mb-3"
                                            style="width: 100%; background-color : #FADF54;">{{ __('accmain.urole') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
