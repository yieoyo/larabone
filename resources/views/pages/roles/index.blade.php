@extends('layouts.app', ['pageName' => config('pages.roles.index')])
@section('content')

    @can('role_create')
        <div class="d-flex justify-content-end">
            <a href="{{ route('roles.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> {{ __('global.add') }} {{ __('pages.roles.title_singular') }}</a>
        </div>
    @endcan
    @can('role_show')
        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">{{ __('pages.roles.title_singular') }}</th>
                        <th scope="col" style="width: 250px;">{{ __('global.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('roles.show', $role->id) }}"
                                       class="btn btn-primary btn-sm"
                                       title="{{ __('global.show') }}">
                                        <i class="bi bi-eye" data-bs-title="Default tooltip"></i>
                                    </a>
                                    @can('role_edit')
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                           class="btn btn-warning btn-sm"
                                           title="{{ __('global.edit') }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('role_delete')
                                        <a href="{{ route('roles.destroy', $role->id) }}"
                                           class="btn btn-danger btn-sm"
                                           title="{{ __('global.delete') }}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td colspan="3">
                        <span class="text-danger">
                            <strong>{{ __('pages.roles.not_found') }}</strong>
                        </span>
                        </td>
                    @endforelse
                    </tbody>
                </table>

                {{ $roles->links() }}

            </div>
        </div>
    @endcan
@endsection
