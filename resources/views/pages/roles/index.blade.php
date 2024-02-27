@extends('layouts.app')
@section('content')

    @can('role_show')
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>{{ __('cruds.role.title') }}</span>
            </div>

            <div class="card-body">
                @can('role_create')
                    <a href="{{ route('roles.create') }}" class="btn btn-secondary btn-sm my-2"><i
                            class="bi bi-plus-circle"></i> {{ __('global.add') }} {{ __('cruds.role.title_singular') }}</a>
                @endcan
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">{{ __('cruds.role.title_singular') }}</th>
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
                                   class="btn btn-info btn-sm"
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
                            <strong>{{ __('cruds.role.not_found') }}</strong>
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
